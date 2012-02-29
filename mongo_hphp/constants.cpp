#include "ext_mongo_hphp.h"

using namespace HPHP;

/* Mongo class */
const StaticString q_Mongo_VERSION = "1.0-HPHP";
const StaticString q_Mongo_DEFAULT_HOST = "localhost";
const int q_Mongo_DEFAULT_PORT = 27017;

/* MongoDB class */
const int q_MongoDB_PROFILING_OFF = 0;
const int q_MongoDB_PROFILING_SLOW = 1;
const int q_MongoDB_PROFILING_ON = 2;

/* MongoCollection class */
const int q_MongoCollection_ASCENDING = 1;
const int q_MongoCollection_DESCENDING = -1;

/* MongoBinData class */
const int q_MongoBinData_FUNC = 1;
const int q_MongoBinData_BYTE_ARRAY = 2;
const int q_MongoBinData_UUID = 3;
const int q_MongoBinData_MD5 = 5;
const int q_MongoBinData_CUSTOM = 128;

