#include "ext_mongo_hphp.h"
#include "extension.h"

#include <endian.h>

#define INT_32 4
#define INT_64 8
#define DOUBLE_64 8
#define BYTE_8 1

#define PHP_MONGO_SERIALIZE_KEY(type)                                 \
	php_mongo_set_type(buf, type);                                \
	php_mongo_serialize_key(buf, name, name_len, prep);

using namespace HPHP;

enum BsonType
{
	BsonDouble = 1,
	BsonString = 2,
	BsonObject = 3,
	BsonArray = 4,
	BsonBinary = 5,
	BsonUndef = 6,
	BsonOid = 7,
	BsonBool = 8,
	BsonDate = 9,
	BsonNull = 10,
	BsonRegex = 11,
	BsonDBRef = 12,
	BsonCode_D = 13,
	BsonSymbol = 14,
	BsonCode = 15,
	BsonInt = 16,
	BsonTimestamp = 17,
	BsonLong = 18,
	BsonMinkey = -1,
	BsonMaxkey = 127
};

const int OidSize = 12;

/* BSON global functions */

inline bool invalidStringLength(int length)
{
	return (length < 0 || length > (64*1024*1024));
}

char *bsonDecode(Array &container, char *bson)
{
	if (!bson))
		return NULL;
	char *buf_start = bson;
	char *buf = buf_start;
	char type;
	
	// for size
	buf += INT_32;
	while ((type = *buf++) != 0)
	{
		char *name = buf;
		Variant value;
		
		// get past field name
		buf += strlen(buf) + 1;
		// get value
		switch(type)
		{
			case BsonOid:
				{
					String id(buf, CopyString);
					c_MongoId *_id = NEWOBJ(c_MongoId)();
					_id->t___construct(id);
					value = Object(_id);
					buf += OidSize;
					break;
				}
			case BsonDouble:
				{
					double d = *(double*)buf;
					int64_t i;
					int64_t *iPtr = &i;
					memcpy(iPtr, &d, DOUBLE_64);
					i = le64toh(i);
					memcpy(&d, iPtr, DOUBLE_64);
					value = d;
					buf += DOUBLE_64;
					break;
				}
			case BsonSymbol:
			case BsonString:
				{
					// len includes \0
					int len = le32toh(*((int*)buf));
					if (invalidStringLength(len))
						throw std::exception(); // TODO real CursorException should be thrown: "invalid string length for key \"%s\": %d", name, len
					buf += INT_32;
					value = String(buf, len - 1, CopyString);
					buf += len;
					break;
				}
			case BsonObject:
			case BsonArray:
				{
					Array a;
					buf = bsonDecode(a, buf);
					value = a;
					break;
				}
			case BsonBinary:
				{
					char btype;
					int len = le32toh(*((int*)buf));
					if (invalidStringLength(len))
						throw std::exception(); // TODO real CursorException should be thrown: "invalid binary length for key \"%s\": %d", name, len
					buf += INT_32;
					btype = *buf++;
					/* If the type is 2, check if the binary data
					 * is prefixed by its length.
					 * 
					 * There is an infinitesimally small chance that
					 * the first four bytes will happen to be the
					 * length of the rest of the string.  In this
					 * case, the data will be corrupted.
					 */
					if ((int)btype == 2)
					{
						int len2 = le32toh(*((int*)buf));
						/* if the lengths match, the data is to spec,
						 * so we use len2 as the true length.
						 */
						if (len2 == len - 4)
						{
							len = len2;
							buf += INT32;
						}
					}
					c_MongoBinData *d = NEWOBJ(c_MongoBinData)();
					d->t___construct(String(buf, len, CopyString), btype);
					value = Object(d);
					buf += len;
					break;
				}
			case BsonBool:
				{
					char d = *buf++;
					value = (bool)d;
					break;
				}
			case BsonUndef:
			case BsonNull:
				{
					value.setNull();
					break;
				}
			case BsonInt:
				{
					value = le32toh(*((int*)buf));
					buf += INT_32;
					break;
				}
			case BsonLong:
				{
					if(MonGlo(long_as_object))
					{
						char *buffer;
						spprintf(&buffer, 0, "%lld", (long long int)le64toh(*((int64_t*)buf)));
						c_MongoInt64 *v = NEWOBJ(c_MongoInt64)();
						v->t___construct(buffer);
						value = Object(v);
						free(buffer);
					}
					else
					{
						if(MonGlo(native_long))
						{
#if sizeof(long int) == 4
							throw std::exception(); // TODO MongoCursorException: "Can not natively represent the long %llu on this platform", (int64_t)MONGO_64(*((int64_t*)buf))
#else
#if sizeof(long int) == 8
							value = (long int)le64toh(*((int64_t*)buf));
#else
#  error The PHP number size is neither 4 or 8 bytes; no clue what to do with that!
#endif
						}
						else
							value = (double)le64toh(*((int64_t*)buf));
					}
					buf += INT_64;
					break;
				}
			case BsonDate:
				{
					int64_t d = le64toh(*((int64_t*)buf));
					buf += INT_64;
					
					c_MongoDate *date = NEWOBJ(c_MongoDate)();
					date->t___construct((long)(d/1000), (long)((d*1000)%1000000));
					break;
				}
			case BsonRegex:
				{
					char *regex = buf;
					int regexLen = strlen(buf);
					buf += regexLen + 1;
					
					char *flags = buf;
					int flagsLen = strlen(buf);
					buf += flagsLen + 1;
					
					c_MongoRegex *re = NEWOBJ(c_MongoRegex)();
					re->m_regex = String(regex, regexLen, CopyString);
					re->m_flags = String(flags, flagsLen, CopyString);
					value = Object(re);					
					break;
				}
			case BsonCode:
				// CODE has a useless total size field
				buf += INT_32; // Note, that we don't break here
			case BsonCode_D:
				{
					// length of code (includes \0)
					int codeLen = le32toh(*(int*)buf);
					if (invalidStringLength(codeLen))
						throw std::exception(); // TODO MongoCursorException: "invalid code length for key \"%s\": %d", name, code_len
					buf += INT_32;
					
					char *code = buf;
					buf += codeLen;
					
					Array z;
					if (type == BsonCode)
						buf = bsonDecode(z, buf);
					c_MongoCode *c = NEWOBJ(c_MongoCode)();
					c->t___construct(String(code, codeLen-1, CopyString), z);
					value = Object(c);
					break;
				}
				/* DEPRECATED
				 * database reference (12)
				 *   - 4 bytes ns length (includes trailing \0)
				 *   - ns + \0
				 *   - 12 bytes MongoId
				 * This converts the deprecated, old-style db ref type
				 * into the new type (array('$ref' => ..., $id => ...)).
				 */
			case BsonDBRef:
				{
					int nsLen = *(int*)buf;
					if (invalidStringLength(nsLen))
						throw std::exception(); // TODO MongoCursorException: "invalid dbref length for key \"%s\": %d", name, ns_len
					buf += INT_32;
					char *ns = buf;
					buf += nsLen;

					c_MongoId *id = NEWOBJ(c_MongoId)();
					id->t___construct(String(buf, OidSize, CopyString));
					buf += OidSize;
					
					Array a;
					a.set("ref", String(ns, nsLen-1, CopyString));
					a.set("id", Object(id));
					value = a;
					break;
				}
				/* MongoTimestamp (17)
				 * 8 bytes total:
				 *  - sec: 4 bytes
				 *  - inc: 4 bytes
				 */
			case BsonTimestamp:
				{
					c_MongoTimestamp *c = NEWOBJ(c_MongoTimestamp)();
					long int inc = le32toh(*(int*)buf);
					buf += INT_32;
					long int sec = le32toh(*(int*)buf);
					c->t___construct(sec, inc);
					buf += INT_32;
					value = Object(c);
					break;
				}
				/* min key (0)
				 * max and min keys are used only for sharding, and
				 * cannot be resaved to the database at the moment
				 */
			case BsonMinkey:
				{
					value = Object(NEWOBJ(c_MongoMinKey)());
					break;
				}
				/* max key (127) */
			case BsonMaxkey:
				{
					value = Object(NEWOBJ(c_MongoMaxKey)());
					break;
				}
			default:
				{
					/* if we run into a type we don't recognize, there's
					 * either been some corruption or we've messed up on
					 * the parsing.  Either way, it's helpful to know the
					 * situation that led us here, so this dumps the
					 * buffer up to this point to stdout and returns.
					 *
					 * We can't dump any more of the buffer, unfortunately,
					 * because we don't keep track of the size.  Besides,
					 * if it is corrupt, the size might be messed up, too.
					 */
					/* TODO MongoException with the code below: throw MongoException(17, msg);
					char *template = "type 0x00 not supported:";
					// each byte is " xx" (3 chars)
					int width = 3;
					int len = (buf - buf_start) * width;
					char *msg = (char*)malloc(strlen(template)+len+1);
					memcpy(msg, template, strlen(template));
					char *pos = msg + 7;
					sprintf(pos++, "%x", t/16);
					unsigned char t = type%16;
					sprintf(pos++, "%x", t);
					// remove '\0' added by sprintf
					*pos = ' ';
					
					// jump to end of template
					pos = msg + strlen(template);
					for (i = 0; i < buf - buf_start; i++)
					{
						sprintf(pos, " %02x", (unsigned char)buf_start[i]);
						pos += width;
					}
					// sprintf 0-terminates the string
					free(msg);
					*/
					throw std::exception();
				}
		}
		container.set(String(name, CopyString), value);
	}
	return buf;
}

Variant f_bson_decode(CStrRef bson)
{
	Array res;
	bsonDecode(res, bson);
	return res;
}

inline String serializeDate(const c_MongoDate &d)
{
	int64_t ms = (int64_t)d.m_sec*1000 + d.m_usec/1000;
	return String(htole64(ms));
}

inline String serializeRegex(const c_MongoRegex &r)
{
	return r.m_regex + r.m_flags;
}

inline String serializeKey(BsonType type, String name, bool prep)
{
	String resp;
	if (name[0] == '\0' && !MonGlo(allow_empty_keys))
		throw std::exception(); // TODO MongoException "zero-length keys are not allowed, did you use $ with double quotes?"
	if (prep && name.find('.') != String::npos)
		throw std::exception(); // TODO MongoException "'.' not allowed in key: %s", name
	if (MonGlo(cmd_char) && name.find(MonGlo(cmd_char)[0]) == 0)
	{
		resp += '$';
		resp += name.substr(1);
	}
	else
		resp += name;
	resp += '\0';
	return resp;
}

inline String serializeElement

inline String serializeArray(const Array &v, bool prep)
{
	Array _v(v);
	int num = 0;
	if (_v.size())
	{
		if (prep)
		{
			prepareForDb(_v);
			++num;
		}
		ArrayIter it(_v.getArrayData());
		while (!it.end())
		{
			
			it.next();
			++num;			
		}
	}
}

inline String serializeCode(const c_MongoCode &c)
{
	String res = String(htole32(c.m_code.size() + 1)) + c.m_code + '\0' + serializeArray(c.m_scope, false);
	return String(htole32(res.size())) + res;
}

String f_bson_encode(CVarRef anything)
{
	switch(anything.getType())
	{
		case KindOfNull:
			return String("", 1, CopyString);
		case KindOfInt32:
			return String(htole32(anything.toInt32()));
		case KindOfInt64:
			return String(htole64(anything.toInt64()));
		case KindOfDouble:
			double i = anything.toDouble();
			uint64_t *iPtr = (uint64_t*)&i;
			*iPtr = htole64(*iPtr);
			String dRes((char*)iPtr, 8, CopyString);
			return dRes;
		case KindOfBoolean:
			if (anything.toBoolean())
				return String("\x01", 1, CopyString);
			else
				return String("\x00", 1, CopyString);
		case KindOfString:
			return anything.toString();
		case KindOfObject:
			Object o = anything.toObject();
			if (o.is<c_MongoId>())
				return o.getTyped<c_MongoId>()->m_id;
			else if (o.is<c_MongoDate>())
				return serializeDate(o.getTyped<c_MongoDate>());
			else if (o.is<c_MongoRegex>())
				return serializeRegex(o.getTyped<c_MongoRegex>());
			else if (o.is<c_MongoCode>())
				return serializeCode(o.getTyped<c_MongoCode>());
	}
  throw NotImplementedException(__func__);
}
