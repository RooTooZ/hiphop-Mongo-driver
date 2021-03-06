/*
   +----------------------------------------------------------------------+
   | HipHop for PHP                                                       |
   +----------------------------------------------------------------------+
   | Copyright (c) 2010- Facebook, Inc. (http://www.facebook.com)         |
   | Copyright (c) 1997-2010 The PHP Group                                |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
*/

#ifndef __SEPEXT_MONGO_HPHP_H__
#define __SEPEXT_MONGO_HPHP_H__

// >>>>>> Generated by idl.php. Do NOT modify. <<<<<<

#include <runtime/base/base_includes.h>

namespace HPHP {
///////////////////////////////////////////////////////////////////////////////

Variant f_bson_decode(CStrRef bson);
String f_bson_encode(CVarRef anything);
extern const StaticString q_Mongo_VERSION;
extern const StaticString q_Mongo_DEFAULT_HOST;
extern const int q_Mongo_DEFAULT_PORT;

///////////////////////////////////////////////////////////////////////////////
// class Mongo

FORWARD_DECLARE_CLASS_BUILTIN(Mongo);
class c_Mongo : public ExtObjectDataFlags<ObjectData::UseGet> {
 public:
  DECLARE_CLASS(Mongo, Mongo, ObjectData)

  // properties
  public: bool m_connected;
  public: String m_status;
  public: String m_server;
  public: bool m_persistent;

  // need to implement
  public: c_Mongo();
  public: ~c_Mongo();
  public: void t___construct(CStrRef server = "mongodb://localhost:27017", CVarRef options = null);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: bool t_connect();
  DECLARE_METHOD_INVOKE_HELPERS(connect);
  public: bool t_close();
  DECLARE_METHOD_INVOKE_HELPERS(close);
  protected: bool t_connectutil(CStrRef dbname);
  DECLARE_METHOD_INVOKE_HELPERS(connectutil);
  public: Variant t___get(Variant val);
  DECLARE_METHOD_INVOKE_HELPERS(__get);
  public: Variant t_gethosts();
  DECLARE_METHOD_INVOKE_HELPERS(gethosts);
  public: String t_getslave();
  DECLARE_METHOD_INVOKE_HELPERS(getslave);
  public: bool t_getslaveokay();
  DECLARE_METHOD_INVOKE_HELPERS(getslaveokay);
  public: Variant t_listdbs();
  DECLARE_METHOD_INVOKE_HELPERS(listdbs);
  public: Object t_selectcollection(CStrRef db, CStrRef collection);
  DECLARE_METHOD_INVOKE_HELPERS(selectcollection);
  public: Object t_selectdb(CStrRef name);
  DECLARE_METHOD_INVOKE_HELPERS(selectdb);
  public: bool t_setslaveokay(bool ok = true);
  DECLARE_METHOD_INVOKE_HELPERS(setslaveokay);
  public: String t_switchslave();
  DECLARE_METHOD_INVOKE_HELPERS(switchslave);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_Mongo *create(String server = "mongodb://localhost:27017", Variant options = null);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};
extern const int q_MongoDB_PROFILING_OFF;
extern const int q_MongoDB_PROFILING_SLOW;
extern const int q_MongoDB_PROFILING_ON;

///////////////////////////////////////////////////////////////////////////////
// class MongoDB

FORWARD_DECLARE_CLASS_BUILTIN(MongoDB);
class c_MongoDB : public ExtObjectDataFlags<ObjectData::UseGet> {
 public:
  DECLARE_CLASS(MongoDB, MongoDB, ObjectData)

  // properties
  public: int m_w;
  public: int64 m_wtimeout;

  // need to implement
  public: c_MongoDB();
  public: ~c_MongoDB();
  public: void t___construct(CObjRef conn, CStrRef name);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: Array t_authenticate(CStrRef username, CStrRef password);
  DECLARE_METHOD_INVOKE_HELPERS(authenticate);
  public: Array t_command(CArrRef command, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(command);
  public: Object t_createcollection(CStrRef name, bool capped = false, int64 size = 0, int64 max = 0);
  DECLARE_METHOD_INVOKE_HELPERS(createcollection);
  public: Array t_createdbref(CStrRef collection, CVarRef a);
  DECLARE_METHOD_INVOKE_HELPERS(createdbref);
  public: Array t_drop();
  DECLARE_METHOD_INVOKE_HELPERS(drop);
  public: Array t_execute(CVarRef code, CArrRef args = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(execute);
  public: Variant t___get(Variant name);
  DECLARE_METHOD_INVOKE_HELPERS(__get);
  public: bool t_forceerror();
  DECLARE_METHOD_INVOKE_HELPERS(forceerror);
  public: Array t_getdbref(CArrRef ref);
  DECLARE_METHOD_INVOKE_HELPERS(getdbref);
  public: Object t_getgridfs(CStrRef prefix = "fs");
  DECLARE_METHOD_INVOKE_HELPERS(getgridfs);
  public: int t_getprofilinglevel();
  DECLARE_METHOD_INVOKE_HELPERS(getprofilinglevel);
  public: bool t_getslaveokay();
  DECLARE_METHOD_INVOKE_HELPERS(getslaveokay);
  public: Array t_lasterror();
  DECLARE_METHOD_INVOKE_HELPERS(lasterror);
  public: Array t_listcollections();
  DECLARE_METHOD_INVOKE_HELPERS(listcollections);
  public: Array t_preverror();
  DECLARE_METHOD_INVOKE_HELPERS(preverror);
  public: Array t_repair(bool preserve_cloned_files = false, bool backup_original_files = false);
  DECLARE_METHOD_INVOKE_HELPERS(repair);
  public: Array t_reseterror();
  DECLARE_METHOD_INVOKE_HELPERS(reseterror);
  public: Object t_selectcollection(CStrRef name);
  DECLARE_METHOD_INVOKE_HELPERS(selectcollection);
  public: int t_setprofilinglevel(int level);
  DECLARE_METHOD_INVOKE_HELPERS(setprofilinglevel);
  public: bool t_setslaveokay(bool ok = true);
  DECLARE_METHOD_INVOKE_HELPERS(setslaveokay);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoDB *create(Object conn, String name);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};
extern const int q_MongoCollection_ASCENDING;
extern const int q_MongoCollection_DESCENDING;

///////////////////////////////////////////////////////////////////////////////
// class MongoCollection

FORWARD_DECLARE_CLASS_BUILTIN(MongoCollection);
class c_MongoCollection : public ExtObjectDataFlags<ObjectData::UseGet> {
 public:
  DECLARE_CLASS(MongoCollection, MongoCollection, ObjectData)

  // properties
  public: Object m_db;
  public: int m_w;
  public: int64 m_wtimeout;

  // need to implement
  public: c_MongoCollection();
  public: ~c_MongoCollection();
  public: void t___construct(CObjRef db, CStrRef name);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: Variant t_batchinsert(CVarRef a, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(batchinsert);
  public: int64 t_count(CArrRef query = null_array, int limit = 0, int64 skip = 0);
  DECLARE_METHOD_INVOKE_HELPERS(count);
  public: Array t_createdbref(CVarRef a);
  DECLARE_METHOD_INVOKE_HELPERS(createdbref);
  public: Array t_deleteindex(CVarRef keys);
  DECLARE_METHOD_INVOKE_HELPERS(deleteindex);
  public: Array t_deleteindexes();
  DECLARE_METHOD_INVOKE_HELPERS(deleteindexes);
  public: Array t_drop();
  DECLARE_METHOD_INVOKE_HELPERS(drop);
  public: Array t_ensureindex(CArrRef keys, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(ensureindex);
  public: Object t_find(CArrRef query = null_array, CArrRef fields = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(find);
  public: Variant t_findone(CArrRef query = null_array, CArrRef fields = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(findone);
  public: Variant t___get(Variant name);
  DECLARE_METHOD_INVOKE_HELPERS(__get);
  public: Array t_getdbref(CArrRef ref);
  DECLARE_METHOD_INVOKE_HELPERS(getdbref);
  public: Sequence t_getindexinfo();
  DECLARE_METHOD_INVOKE_HELPERS(getindexinfo);
  public: String t_getname();
  DECLARE_METHOD_INVOKE_HELPERS(getname);
  public: bool t_getslaveokay();
  DECLARE_METHOD_INVOKE_HELPERS(getslaveokay);
  public: Sequence t_group(CVarRef keys, CArrRef initial, CObjRef reduce, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(group);
  public: Variant t_insert(CArrRef a, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(insert);
  public: Variant t_remove(CArrRef criteria = null_array, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(remove);
  public: Variant t_save(CArrRef a, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(save);
  public: bool t_setslaveokay(bool ok = true);
  DECLARE_METHOD_INVOKE_HELPERS(setslaveokay);
  protected: static String ti_toindexstring(const char* cls , CVarRef keys);
  public: static String t_toindexstring(CVarRef keys) {
    return ti_toindexstring("mongocollection", keys);
  }
  DECLARE_METHOD_INVOKE_HELPERS(toindexstring);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: bool t_update(CArrRef criteria, CArrRef newobj, CArrRef options = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(update);
  public: Array t_validate(bool scan_data = false);
  DECLARE_METHOD_INVOKE_HELPERS(validate);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoCollection *create(Object db, String name);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoCursor

FORWARD_DECLARE_CLASS_BUILTIN(MongoCursor);
class c_MongoCursor : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoCursor, MongoCursor, ObjectData)

  // properties
  public: bool m_slaveOkay;
  public: int64 m_timeout;

  // need to implement
  public: c_MongoCursor();
  public: ~c_MongoCursor();
  public: void t___construct(CObjRef connection, CStrRef ns, CArrRef query = null_array, CArrRef fields = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: Object t_addoption(CStrRef key, CVarRef value);
  DECLARE_METHOD_INVOKE_HELPERS(addoption);
  public: Object t_batchsize(int64 num);
  DECLARE_METHOD_INVOKE_HELPERS(batchsize);
  public: int64 t_count(bool foundOnly);
  DECLARE_METHOD_INVOKE_HELPERS(count);
  public: Array t_current();
  DECLARE_METHOD_INVOKE_HELPERS(current);
  public: bool t_dead();
  DECLARE_METHOD_INVOKE_HELPERS(dead);
  protected: void t_doquery();
  DECLARE_METHOD_INVOKE_HELPERS(doquery);
  public: Array t_explain();
  DECLARE_METHOD_INVOKE_HELPERS(explain);
  public: Object t_fields(CArrRef f);
  DECLARE_METHOD_INVOKE_HELPERS(fields);
  public: Array t_getnext();
  DECLARE_METHOD_INVOKE_HELPERS(getnext);
  public: bool t_hasnext();
  DECLARE_METHOD_INVOKE_HELPERS(hasnext);
  public: Object t_hint(CArrRef key_pattern);
  DECLARE_METHOD_INVOKE_HELPERS(hint);
  public: Object t_immortal(bool liveForever = true);
  DECLARE_METHOD_INVOKE_HELPERS(immortal);
  public: Array t_info();
  DECLARE_METHOD_INVOKE_HELPERS(info);
  public: String t_key();
  DECLARE_METHOD_INVOKE_HELPERS(key);
  public: Object t_limit(int64 num);
  DECLARE_METHOD_INVOKE_HELPERS(limit);
  public: void t_next();
  DECLARE_METHOD_INVOKE_HELPERS(next);
  public: Object t_partial(bool okay = true);
  DECLARE_METHOD_INVOKE_HELPERS(partial);
  public: void t_reset();
  DECLARE_METHOD_INVOKE_HELPERS(reset);
  public: void t_rewind();
  DECLARE_METHOD_INVOKE_HELPERS(rewind);
  public: Object t_skip(int64 num);
  DECLARE_METHOD_INVOKE_HELPERS(skip);
  public: Object t_slaveokay(bool okay = true);
  DECLARE_METHOD_INVOKE_HELPERS(slaveokay);
  public: Object t_snapshot();
  DECLARE_METHOD_INVOKE_HELPERS(snapshot);
  public: Object t_sort(CArrRef fields);
  DECLARE_METHOD_INVOKE_HELPERS(sort);
  public: Object t_tailable(bool tail = true);
  DECLARE_METHOD_INVOKE_HELPERS(tailable);
  public: Object t_timeout(int64 ms);
  DECLARE_METHOD_INVOKE_HELPERS(timeout);
  public: bool t_valid();
  DECLARE_METHOD_INVOKE_HELPERS(valid);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoCursor *create(Object connection, String ns, Array query = null_array, Array fields = null_array);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoId

FORWARD_DECLARE_CLASS_BUILTIN(MongoId);
class c_MongoId : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoId, MongoId, ObjectData)

  // properties
  public: String m_id;

  // need to implement
  public: c_MongoId();
  public: ~c_MongoId();
  public: void t___construct(CStrRef id = null_string);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: static String ti_gethostname(const char* cls );
  public: static String t_gethostname() {
    return ti_gethostname("mongoid");
  }
  DECLARE_METHOD_INVOKE_HELPERS(gethostname);
  public: int64 t_getinc();
  DECLARE_METHOD_INVOKE_HELPERS(getinc);
  public: int t_getpid();
  DECLARE_METHOD_INVOKE_HELPERS(getpid);
  public: int64 t_gettimestamp();
  DECLARE_METHOD_INVOKE_HELPERS(gettimestamp);
  public: static Object ti___set_state(const char* cls , CArrRef props);
  public: static Object t___set_state(CArrRef props) {
    return ti___set_state("mongoid", props);
  }
  DECLARE_METHOD_INVOKE_HELPERS(__set_state);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoId *create(String id = null_string);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoCode

FORWARD_DECLARE_CLASS_BUILTIN(MongoCode);
class c_MongoCode : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoCode, MongoCode, ObjectData)

  // need to implement
  public: c_MongoCode();
  public: ~c_MongoCode();
  public: void t___construct(CStrRef code, CArrRef scope = null_array);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoCode *create(String code, Array scope = null_array);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoDate

FORWARD_DECLARE_CLASS_BUILTIN(MongoDate);
class c_MongoDate : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoDate, MongoDate, ObjectData)

  // properties
  public: int64 m_sec;
  public: int64 m_usec;

  // need to implement
  public: c_MongoDate();
  public: ~c_MongoDate();
  public: void t___construct(int64 sec = 0, int64 usec = 0);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoDate *create(int64 sec = 0, int64 usec = 0);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoRegex

FORWARD_DECLARE_CLASS_BUILTIN(MongoRegex);
class c_MongoRegex : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoRegex, MongoRegex, ObjectData)

  // properties
  public: String m_regex;
  public: String m_flags;

  // need to implement
  public: c_MongoRegex();
  public: ~c_MongoRegex();
  public: void t___construct(CStrRef regex);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoRegex *create(String regex);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};
extern const int q_MongoBinData_FUNC;
extern const int q_MongoBinData_BYTE_ARRAY;
extern const int q_MongoBinData_UUID;
extern const int q_MongoBinData_MD5;
extern const int q_MongoBinData_CUSTOM;

///////////////////////////////////////////////////////////////////////////////
// class MongoBinData

FORWARD_DECLARE_CLASS_BUILTIN(MongoBinData);
class c_MongoBinData : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoBinData, MongoBinData, ObjectData)

  // properties
  public: String m_bin;
  public: int m_type;

  // need to implement
  public: c_MongoBinData();
  public: ~c_MongoBinData();
  public: void t___construct(CStrRef data, int type = 2);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoBinData *create(String data, int type = 2);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoInt32

FORWARD_DECLARE_CLASS_BUILTIN(MongoInt32);
class c_MongoInt32 : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoInt32, MongoInt32, ObjectData)

  // properties
  public: String m_value;

  // need to implement
  public: c_MongoInt32();
  public: ~c_MongoInt32();
  public: void t___construct(CStrRef value);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoInt32 *create(String value);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoInt64

FORWARD_DECLARE_CLASS_BUILTIN(MongoInt64);
class c_MongoInt64 : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoInt64, MongoInt64, ObjectData)

  // properties
  public: String m_value;

  // need to implement
  public: c_MongoInt64();
  public: ~c_MongoInt64();
  public: void t___construct(CStrRef value);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoInt64 *create(String value);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoDBRef

FORWARD_DECLARE_CLASS_BUILTIN(MongoDBRef);
class c_MongoDBRef : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoDBRef, MongoDBRef, ObjectData)

  // need to implement
  public: c_MongoDBRef();
  public: ~c_MongoDBRef();
  private: void t___construct();
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: static Array ti_create(const char* cls , CStrRef collection, CVarRef id, CStrRef database = null_string);
  public: static Array t_create(CStrRef collection, CVarRef id, CStrRef database = null_string) {
    return ti_create("mongodbref", collection, id, database);
  }
  DECLARE_METHOD_INVOKE_HELPERS(create);
  public: static Variant ti_get(const char* cls , CObjRef db, CArrRef ref);
  public: static Variant t_get(CObjRef db, CArrRef ref) {
    return ti_get("mongodbref", db, ref);
  }
  DECLARE_METHOD_INVOKE_HELPERS(get);
  public: static bool ti_isref(const char* cls , CVarRef ref);
  public: static bool t_isref(CVarRef ref) {
    return ti_isref("mongodbref", ref);
  }
  DECLARE_METHOD_INVOKE_HELPERS(isref);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoDBRef *create();
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoMinKey

FORWARD_DECLARE_CLASS_BUILTIN(MongoMinKey);
class c_MongoMinKey : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoMinKey, MongoMinKey, ObjectData)

  // need to implement
  public: c_MongoMinKey();
  public: ~c_MongoMinKey();
  public: void t___construct();
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoMinKey *create();
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoMaxKey

FORWARD_DECLARE_CLASS_BUILTIN(MongoMaxKey);
class c_MongoMaxKey : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoMaxKey, MongoMaxKey, ObjectData)

  // need to implement
  public: c_MongoMaxKey();
  public: ~c_MongoMaxKey();
  public: void t___construct();
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoMaxKey *create();
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
// class MongoTimestamp

FORWARD_DECLARE_CLASS_BUILTIN(MongoTimestamp);
class c_MongoTimestamp : public ExtObjectData {
 public:
  DECLARE_CLASS(MongoTimestamp, MongoTimestamp, ObjectData)

  // properties
  public: int64 m_sec;
  public: int64 m_inc;

  // need to implement
  public: c_MongoTimestamp();
  public: ~c_MongoTimestamp();
  public: void t___construct(int64 sec = 0, int64 inc = 0);
  DECLARE_METHOD_INVOKE_HELPERS(__construct);
  public: String t___tostring();
  DECLARE_METHOD_INVOKE_HELPERS(__tostring);
  public: Variant t___destruct();
  DECLARE_METHOD_INVOKE_HELPERS(__destruct);

  // implemented by HPHP
  public: c_MongoTimestamp *create(int64 sec = 0, int64 inc = 0);
  public: void dynConstruct(CArrRef Params);
  public: void getConstructor(MethodCallPackage &mcp);

};

///////////////////////////////////////////////////////////////////////////////
}

#endif // __SEPEXT_MONGO_HPHP_H__
