#include "ext_mongo_hphp.h"
#include "extensions.h"

using namespace HPHP;

static class mongo_hphpExtension : public Extension {
	public:
		mongo_hphpExtension() : Extension("mongo") {}

		virtual void moduleInit() {
			IniSetting::SetGlobalDefault("mongo.auto_reconnect", "1");
			IniSetting::SetGlobalDefault("mongo.allow_persistent", "1");
			IniSetting::SetGlobalDefault("mongo.default_host", "localhost");
			IniSetting::SetGlobalDefault("mongo.default_port", "27017");
			IniSetting::SetGlobalDefault("mongo.request_id", "3");
			IniSetting::SetGlobalDefault("mongo.chunk_size", "262144");
			IniSetting::SetGlobalDefault("mongo.max_send_size", "67108864"); // 64*1024*1024
			IniSetting::SetGlobalDefault("mongo.pool_size", "-1");
			IniSetting::SetGlobalDefault("mongo.cmd", "$");
			IniSetting::SetGlobalDefault("mongo.cmd_char", "$");
			IniSetting::SetGlobalDefault("mongo.utf8", "1");
			IniSetting::SetGlobalDefault("mongo.inc", "0");
			IniSetting::SetGlobalDefault("mongo.response_num", "0");
			IniSetting::SetGlobalDefault("mongo.errmsg", "0");
			IniSetting::SetGlobalDefault("mongo.native_long", "0");
			IniSetting::SetGlobalDefault("mongo.long_as_object", "0");
			IniSetting::SetGlobalDefault("mongo.allow_empty_keys", "0");
			IniSetting::SetGlobalDefault("mongo.no_id", "0");
		}

} s_mbstring_extension;

MongoGlobals::MongoGlobals()
{
}

void MongoGlobals::requestInit()
{
	char host_start[256];
	int len, len_max = 256;
	char *hostname = host_start; 
	gethostname(hostname, len_max);
	len = strlen(hostname);
	register unsigned long hash = 5381;
	/* from zend_hash.h */
	/* variant with the hash unrolled eight times */
	for (; len >= 8; len -= 8)
	{
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
		hash = ((hash << 5) + hash) + *hostname++;
	}
	switch (len)
	{
		case 7: hash = ((hash << 5) + hash) + *hostname++; /* fallthrough... */
		case 6: hash = ((hash << 5) + hash) + *hostname++; /* fallthrough... */
		case 5: hash = ((hash << 5) + hash) + *hostname++; /* fallthrough... */
		case 4: hash = ((hash << 5) + hash) + *hostname++; /* fallthrough... */
		case 3: hash = ((hash << 5) + hash) + *hostname++; /* fallthrough... */
		case 2: hash = ((hash << 5) + hash) + *hostname++; /* fallthrough... */
		case 1: hash = ((hash << 5) + hash) + *hostname++; break;
		case 0: break; 
	}
	machine = hash;
	ts_inc = 0;
	request_id = 3;
	errmsg = 0;
	  
	IniSetting::Bind("mongo.default_host", "localhost", ini_on_update_string_non_empty, &default_host);
	IniSetting::Bind("mongo.auto_reconnect", "1", ini_on_update_bool, &auto_reconnect);
	IniSetting::Bind("mongo.allow_persistent", "1", ini_on_update_bool, &allow_persistent);
	IniSetting::Bind("mongo.default_port", "27017", ini_on_update_long, &default_port);
	IniSetting::Bind("mongo.chunk_size", "262144", ini_on_update_long, &chunk_size);
	IniSetting::Bind("mongo.max_send_size", "67108864", ini_on_update_long,&max_send_size);
	IniSetting::Bind("mongo.pool_size", "-1", ini_on_update_long, &pool_size);
	IniSetting::Bind("mongo.cmd", "$", ini_on_update_string, &cmd);
	IniSetting::Bind("mongo.cmd_char", "$", ini_on_update_string, &cmd_char);
	IniSetting::Bind("mongo.utf8", "1", ini_on_update_bool, &utf8);
	IniSetting::Bind("mongo.inc", "0", ini_on_update_long, &inc);
	IniSetting::Bind("mongo.response_num", "0", ini_on_update_long, &response_num);
	IniSetting::Bind("mongo.native_long", "0", ini_on_update_bool, &native_long);
	IniSetting::Bind("mongo.long_as_object", "0", ini_on_update_bool, &long_as_object);
	IniSetting::Bind("mongo.allow_empty_keys", "0", ini_on_update_bool, &allow_empty_keys);
	IniSetting::Bind("mongo.no_id", "0", ini_on_update_long, &no_id);
}

void MongoGlobals::requestShutdown()
{
}

IMPLEMENT_REQUEST_LOCAL(MongoGlobals, s_mongo_globals);
