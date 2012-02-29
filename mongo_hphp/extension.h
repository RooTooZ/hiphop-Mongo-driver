#ifndef EXTENSION_LIXM8L50
#define EXTENSION_LIXM8L50

class MongoGlobals : public RequestEventHandler
{
	public:
		std::string default_host;
		bool auto_reconnect;
		bool allow_persistent;
		long int default_port;
		long int request_id;
		long int chunk_size;
		long int max_send_size;
		long int pool_size;
		std::string cmd_char;
		bool utf8;
		long int inc;
		long int response_num;
		long int errmsg;
		bool native_long;
		bool long_as_object;
		bool allow_empty_keys;
		long int no_id;
		unsigned long int machine;
		long int ts_inc;
		
		MongoGlobals();
		
		static bool ini_on_update_default_host(CStrRef value, void *p);
		virtual void requestInit();
		
		virtual void requestShutdown();
};


DECLARE_EXTERN_REQUEST_LOCAL(MongoGlobals, s_mongo_globals);
#define MonGlo(name) s_mongo_globals->name

#endif /* end of include guard: EXTENSION_LIXM8L50 */

