<?php

BeginClass(
  array(
    "name"   => "Mongo",
    "desc"   => "A connection between PHP and MongoDB. ",
    "flags"  => HasDocComment,
    "footer" => "",
  ));

DefineProperty(
  array(
    "name"  => "connected",
    "type"  => Boolean,
    "value" => "false",
  ));

DefineProperty(
  array(
    "name"  => "status",
    "type"  => String,
    "value" => "null_string",
  ));

DefineProperty(
  array(
    "name"  => "server",
    "type"  => String,
    "value" => "null_string",
    "flags" => IsProtected,
  ));

DefineProperty(
  array(
    "name"  => "persistent",
    "type"  => Boolean,
    "value" => "false",
    "flags" => IsProtected,
  ));

DefineConstant(
  array(
    "name"   => "VERSION",
    "type"   => String,
  ));

DefineConstant(
  array(
    "name"   => "DEFAULT_HOST",
    "type"   => String,
  ));

DefineConstant(
  array(
    "name"   => "DEFAULT_PORT",
    "type"   => Int32,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"  => array(
      array(
        "name"  => "server",
        "type"  => String,
        "value" => "\"mongodb://localhost:27017\"",
        "desc"  => "string in the following form: mongodb://[username:password@]host1[:port1][,host2[:port2:],...]/db",
      ),
      array(
        "name"  => "options",
        "type"  => Variant,
        "desc"  => "destination address",
        "value" => "null",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "connect",
    "flags"  => HasDocComment,
    "desc"   => "connects to a database server",
    "return" => array(
      "type"   => Boolean,
    ),
  ));

DefineFunction(
  array(
    "name"   => "close",
    "flags"  => HasDocComment,
    "desc"   => "closes this connection",
    "return" => array(
      "type"   => Boolean,
    ),
  ));

DefineFunction(
  array(
    "name"   => "connectUtil",
    "flags"  => HasDocComment | IsProtected,
    "desc"   => "connects with a database server",
    "return" => array(
      "type"   => Boolean,
    ),
    "args"   => array(
      array(
        "name" => "dbname",
        "type" => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__get",
    "flags"  => HasDocComment,
    "desc"   => "gets a database",
    "return" => array(
      "type"   => Variant,
    ),
    "args"  => array(
      array(
        "name" => "val",
        "type" => Variant,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getHosts",
    "flags"  => HasDocComment,
    "desc"   => "updates status for all hosts associated with this",
    "return" => array(
      "type"   => Variant,
    ),
  ));

DefineFunction(
  array(
    "name"   => "getSlave",
    "flags"  => HasDocComment,
    "desc"   => "returns the address being used by this for slaveOkay reads",
    "return" => array(
      "type"   => String,
    ),
  ));

DefineFunction(
  array(
    "name"   => "getSlaveOkay",
    "flags"  => HasDocComment,
    "desc"   => "get slaveOkay setting for this connection",
    "return" => array(
      "type"   => Boolean,
    ),
  ));

DefineFunction(
  array(
    "name"   => "listDBs",
    "flags"  => HasDocComment,
    "desc"   => "lists all of the databases available",
    "return" => array(
      "type"   => Variant,
    ),
  ));

DefineFunction(
  array(
    "name"   => "selectCollection",
    "flags"  => HasDocComment,
    "desc"   => "gets a database collection",
    "return" => array(
      "type"   => Object,
    ),
    "args"  => array(
      array(
        "name" => "db",
        "type" => String,
      ),
      array(
        "name" => "collection",
        "type" => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "selectDB",
    "flags"  => HasDocComment,
    "desc"   => "gets a database",
    "return" => array(
      "type"   => Object,
    ),
    "args"  => array(
      array(
        "name" => "name",
        "type" => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "setSlaveOkay",
    "flags"  => HasDocComment,
    "desc"   => "change slaveOkay setting for this connection",
    "return" => array(
      "type"   => Boolean,
    ),
    "args"  => array(
      array(
        "name" => "ok",
        "type" => Boolean,
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "switchSlave",
    "flags"  => HasDocComment,
    "desc"   => "choose a new slave for slaveOkay reads",
    "return" => array(
      "type"   => String,
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "flags"  => HasDocComment,
    "desc"   => "string representation of this connection",
    "return" => array(
      "type"   => String,
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoDB",
    "desc"   => "Instances of this class are used to interact with a database",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name"  => "w",
    "type"  => Int32,
    "value" => "1",
  ));

DefineProperty(
  array(
    "name"  => "wtimeout",
    "type"  => Int64,
    "value" => "10000",
  ));

DefineConstant(
  array(
    "name"   => "PROFILING_OFF",
    "type"   => Int32,
  ));

DefineConstant(
  array(
    "name"   => "PROFILING_SLOW",
    "type"   => Int32,
  ));

DefineConstant(
  array(
    "name"   => "PROFILING_ON",
    "type"   => Int32,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "desc"   => "Construct a new simple ZMQ socket",
    "return" => array(
      "type"   => null,
    ),
    "args"  => array(
      array(
        "name"  => "conn",
        "type"  => Object,
        "desc"  => "database connection",
      ),
      array(
        "name"  => "name",
        "type"  => String,
        "desc"  => "database name",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "authenticate",
    "desc"   => "log in to this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "database response",
    ),
    "args"   => array(
      array(
        "name"  => "username",
        "type"  => String,
      ),
      array(
        "name"  => "password",
        "type"  => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "command",
    "desc"   => "execute database command",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "database response",
    ),
    "args"   => array(
      array(
        "name"  => "command",
        "type"  => VariantMap,
        "desc"  => "query to send",
      ),
      array(
        "name"  => "options",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "associative array of values",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "createCollection",
    "desc"   => "creates a collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "collection created",
    ),
    "args"   => array(
      array(
        "name"  => "name",
        "type"  => String,
        "desc"  => "collection name",
      ),
      array(
        "name"  => "capped",
        "type"  => Boolean,
        "value" => "false",
        "desc"  => "if the collection should be a fixed size",
      ),
      array(
        "name"  => "size",
        "type"  => Int64,
        "value" => "0",
        "desc"  => "if the collection is fixed size, its size in bytes",
      ),
      array(
        "name"  => "max",
        "type"  => Int64,
        "value" => "0",
        "desc"  => "if the collection is fixed size, the maximum number of elements to store in the collection",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "createDBRef",
    "desc"   => "creates a database reference",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "a database reference array",
    ),
    "args"   => array(
      array(
        "name"  => "collection",
        "type"  => String,
        "desc"  => "the collection to which the database reference will point",
      ),
      array(
        "name"  => "a",
        "type"  => Variant,
        "desc"  => "Object or _id to which to create a reference. If an object or associative array is given, this will create a reference, using the _id field",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "drop",
    "desc"   => "drops the database currently being used",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the database response",
    ),
  ));

DefineFunction(
  array(
    "name"   => "execute",
    "desc"   => "runs JavaScript code on the database server",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the database response",
    ),
    "args"  => array(
      array(
        "name" => "code",
        "type" => Variant,
      ),
      array(
        "name" => "args",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__get",
    "desc"   => "gets a collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "the collection",
    ),
    "args"   => array(
      array(
        "name" => "name",
        "type" => Variant,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "forceError",
    "desc"   => "creates a database error",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "the database response",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getDBRef",
    "desc"   => "fetches the document pointed to by a database reference",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the document pointed to by the reference",
    ),
    "args"   => array(
      array(
        "name" => "ref",
        "type" => VariantMap,
        "desc" => "a database reference",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getGridFS",
    "desc"   => "fetches toolkit for dealing with files stored in this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "a new gridfs object for this database",
    ),
    "args"   => array(
      array(
        "name" => "prefix",
        "type" => String,
        "value" => "\"fs\"",
        "desc" => "the prefix for the files and chunks collections",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getProfilingLevel",
    "desc"   => "gets this database's profiling level",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int32,
        "desc" => "the profiling level",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getSlaveOkay",
    "desc"   => "get slaveOkay setting for this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "returns the value of slaveOkay for this instance",
    ),
  ));

DefineFunction(
  array(
    "name"   => "lastError",
    "desc"   => "check if there was an error on the most recent db operation performed",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the error, if there was one",
    ),
  ));

DefineFunction(
  array(
    "name"   => "listCollections",
    "desc"   => "get a list of collections in this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "a list of MongoCollections",
    ),
  ));

DefineFunction(
  array(
    "name"   => "prevError",
    "desc"   => "checks for the last error thrown during a database operation",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "returns the error and the number of operations ago it occurred. ",
    ),
  ));

DefineFunction(
  array(
    "name"   => "repair",
    "desc"   => "repairs and compacts this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "db response",
    ),
    "args"   => array(
      array(
        "name" => "preserve_cloned_files",
        "type" => Boolean,
        "value" => "false",
        "desc" => "if cloned files should be kept if the repair fails",
      ),
      array(
        "name" => "backup_original_files",
        "type" => Boolean,
        "value" => "false",
        "desc" => "if original files should be backed up",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "resetError",
    "desc"   => "clears any flagged errors on the database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the database response",
    ),
  ));

DefineFunction(
  array(
    "name"   => "selectCollection",
    "desc"   => "gets a collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "the collection",
    ),
    "args"   => array(
      array(
        "name" => "name",
        "type" => String,
        "desc" => "the name of the collection",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "setProfilingLevel",
    "desc"   => "sets this database's profiling level",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int32,
        "desc" => "the previous profiling level",
    ),
    "args"   => array(
      array(
        "name" => "level",
        "type" => Int32,
        "desc" => "profiling level",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "setSlaveOkay",
    "desc"   => "change slaveOkay setting for this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "the former value of slaveOkay for this instance",
    ),
    "args"   => array(
      array(
        "name" => "ok",
        "type" => Boolean,
        "desc" => "if reads should be sent to secondary members of a replica set for all possible queries using this MongoDB instance",
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "the name of this database",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this database's name",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoCollection",
    "desc"   => "a database collection",
    "flags"  => HasDocComment,
  ));

DefineConstant(
  array(
    "name"  => "ASCENDING",
    "type"  => Int32,
  ));

DefineConstant(
  array(
    "name"  => "DESCENDING",
    "type"  => Int32,
  ));

DefineProperty(
  array(
    "name"  => "db",
    "type"  => Object,
    "value" => "null_object",
  ));

DefineProperty(
  array(
    "name"  => "w",
    "type"  => Int32,
  ));

DefineProperty(
  array(
    "name"  => "wtimeout",
    "type"  => Int64,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "desc"   => "creates a new collection",
    "return" => array(
      "type"   => null,
    ),
    "args"  => array(
      array(
        "name"  => "db",
        "type"  => Object,
        "desc"  => "parent database",
      ),
      array(
        "name"  => "name",
        "type"  => String,
        "desc"  => "name for this collection",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "batchInsert",
    "desc"   => "inserts multiple documents into this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "if \"safe\" is set, returns an associative array with the status of the inserts (\"ok\") and any error that may have occured (\"err\"). Otherwise, returns TRUE if the batch insert was successfully sent, FALSE otherwise.",
    ),
    "args"   => array(
      array(
        "name"  => "a",
        "type"  => Sequence,
        "desc"  => "an array of arrays",
      ),
      array(
        "name"  => "options",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "Options for the inserts",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "count",
    "desc"   => "counts the number of documents in this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int64,
        "desc" => "the number of documents matching the query",
    ),
    "args"   => array(
      array(
        "name"  => "query",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "associative array or object with fields to match",
      ),
      array(
        "name"  => "limit",
        "type"  => Int32,
        "value" => "0",
        "desc"  => "specifies an upper limit to the number returned",
      ),
      array(
        "name"  => "skip",
        "type"  => Int64,
        "value" => "0",
        "desc"  => "specifies a number of results to skip before starting the count",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "createDBRef",
    "desc"   => "creates a database reference",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "a database reference array",
    ),
    "args"   => array(
      array(
        "name"  => "a",
        "type"  => Variant,
        "desc"  => "Object to which to create a reference",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "deleteIndex",
    "desc"   => "deletes an index from this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "database response",
    ),
    "args"   => array(
      array(
        "name"  => "keys",
        "type"  => Variant,
        "desc"  => "field or fields from which to delete the index",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "deleteIndexes",
    "desc"   => "deletes all indices for this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "database response",
    ),
  ));

DefineFunction(
  array(
    "name"   => "drop",
    "desc"   => "drop this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the database response",
    ),
  ));

DefineFunction(
  array(
    "name"   => "ensureIndex",
    "desc"   => "creates an index on the given field(s), or does nothing if the index already exists",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the database response",
    ),
    "args"   => array(
      array(
        "name"  => "keys",
        "type"  => VariantMap,
      ),
      array(
        "name"  => "options",
        "type"  => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "find",
    "desc"   => "query this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "a cursor for the search results",
    ),
    "args"   => array(
      array(
        "name"  => "query",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "the fields for which to search",
      ),
      array(
        "name"  => "fields",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "fields of the results to return",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "findOne",
    "desc"   => "query this collection, returning a single element",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "record matching the query or null",
    ),
    "args"   => array(
      array(
        "name"  => "query",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "the fields for which to search",
      ),
      array(
        "name"  => "fields",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "fields of the results to return",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__get",
    "desc"   => "gets a collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "the collection",
    ),
    "args"   => array(
      array(
        "name"  => "name",
        "type"  => Variant,
        "desc"  => "the next string in the collection name",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getDBRef",
    "desc"   => "fetches the document pointed to by a database reference",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the document pointed to by the reference",
    ),
    "args"   => array(
      array(
        "name" => "ref",
        "type" => VariantMap,
        "desc" => "a database reference",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getIndexInfo",
    "desc"   => "returns an array of index names for this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Sequence,
        "desc" => "a list of index names",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getName",
    "desc"   => "this collection's name",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this collection's name",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getSlaveOkay",
    "desc"   => "get slaveOkay setting for this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "returns the value of slaveOkay for this instance",
    ),
  ));

DefineFunction(
  array(
    "name"   => "group",
    "desc"   => "performs an operation similar to SQL's GROUP BY command",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Sequence,
        "desc" => "an array containing the result",
    ),
    "args"   => array(
      array(
        "name" => "keys",
        "type" => Variant,
      ),
      array(
        "name" => "initial",
        "type" => VariantMap,
      ),
      array(
        "name" => "reduce",
        "type" => Object,
      ),
      array(
        "name" => "options",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "insert",
    "desc"   => "inserts an array into the collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "if safe was set, returns an array containing the status of the insert. Otherwise, returns a boolean representing if the array was not empty (an empty array will not be inserted). ",
    ),
    "args"   => array(
      array(
        "name" => "a",
        "type" => VariantMap,
      ),
      array(
        "name" => "options",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "remove",
    "desc"   => "remove records from this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "if \"safe\" is set, returns an associative array with the status of the remove (\"ok\"), the number of items removed (\"n\"), and any error that may have occured (\"err\"). Otherwise, returns TRUE if the remove was successfully sent, FALSE otherwise.",
    ),
    "args"   => array(
      array(
        "name" => "criteria",
        "type" => VariantMap,
        "desc" => "description of records to remove",
        "value" => "null_array",
      ),
      array(
        "name" => "options",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "save",
    "desc"   => "saves an object to this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Variant,
        "desc" => "If safe was set, returns an array containing the status of the save. Otherwise, returns a boolean representing if the array was not empty (an empty array will not be inserted)",
    ),
    "args"   => array(
      array(
        "name" => "a",
        "type" => VariantMap,
        "desc" => "array to save",
      ),
      array(
        "name" => "options",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "setSlaveOkay",
    "desc"   => "change slaveOkay setting for this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "the former value of slaveOkay for this instance",
    ),
    "args"   => array(
      array(
        "name" => "ok",
        "type" => Boolean,
        "desc" => "if reads should be sent to secondary members of a replica set for all possible queries using this MongoCollection instance",
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "toIndexString",
    "desc"   => "converts keys specifying an index to its identifying string",
    "flags"  => HasDocComment | IsStatic | IsProtected,
    "return" => array(
        "type" => String,
        "desc" => "a string that describes the index",
    ),
    "args"   => array(
      array(
        "name" => "keys",
        "type" => Variant,
        "desc" => "field or fields to convert to the identifying string",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "the name of this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this collection's name",
    ),
  ));

DefineFunction(
  array(
    "name"   => "update",
    "desc"   => "update records based on a given criteria",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "if the update was successfully sent to the database",
    ),
    "args"   => array(
      array(
        "name" => "criteria",
        "type" => VariantMap,
      ),
      array(
        "name" => "newobj",
        "type" => VariantMap,
      ),
      array(
        "name" => "options",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "validate",
    "desc"   => "validates this collection",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the database's evaluation of this object",
    ),
    "args"   => array(
      array(
        "name" => "scan_data",
        "type" => Boolean,
        "value" => "false",
        "desc" => "only validate indices, not the base collection",
      ),
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoCursor",
    "desc"   => "A cursor is used to iterate through the results of a database query",
    "ifaces" => array("Iterator"),
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name"  => "slaveOkay",
    "type"  => Boolean,
    "value" => "false",
    "flags" => IsStatic,
  ));

DefineProperty(
  array(
    "name"  => "timeout",
    "type"  => Int64,
    "value" => 20000,
    "flags" => IsStatic,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "desc"   => "Create new cursor",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"  => array(
      array(
        "name"  => "connection",
        "type"  => Object,
        "desc"  => "database connection",
      ),
      array(
        "name"  => "ns",
        "type"  => String,
        "desc"  => "full name of database and collection",
      ),
      array(
        "name"  => "query",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "database query",
      ),
      array(
        "name"  => "fields",
        "type"  => VariantMap,
        "value" => "null_array",
        "desc"  => "fields to return",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "addOption",
    "desc"   => "adds a top-level key/value pair to a query",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "key",
        "type" => String,
        "desc" => "fieldname to add",
      ),
      array(
        "name" => "value",
        "type" => Variant,
        "desc" => "value to add",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "batchSize",
    "desc"   => "sets the number of results returned per result set",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "num",
        "type" => Int64,
        "desc" => "the number of results to return in the next batch",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "count",
    "desc"   => "counts the number of results for this query",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int64,
        "desc" => "the number of documents returned by this cursor's query",
    ),
    "args"   => array(
      array(
        "name" => "foundOnly",
        "type" => Boolean,
        "desc" => "send cursor limit and skip information to the count function, if applicable",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "current",
    "desc"   => "returns the current element",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the current result as an associative array",
    ),
  ));

DefineFunction(
  array(
    "name"   => "dead",
    "desc"   => "checks if there are documents that have not been sent yet from the database for this cursor",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "if there are more results that have not been sent to the client, yet",
    ),
  ));

DefineFunction(
  array(
    "name"   => "doQuery",
    "desc"   => "execute the query",
    "flags"  => HasDocComment | IsProtected,
    "return" => array(
        "type" => null,
    ),
  ));

DefineFunction(
  array(
    "name"   => "explain",
    "desc"   => "return an explanation of the query, often useful for optimization and debugging",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "an explanation of the query",
    ),
  ));

DefineFunction(
  array(
    "name"   => "fields",
    "desc"   => "sets the fields for a query",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args" => array(
      array(
        "name" => "f",
        "type" => VariantMap,
        "desc" => "fields to return (or not return)",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getNext",
    "desc"   => "return the next object to which this cursor points, and advance the cursor",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the next object",
    ),
  ));

DefineFunction(
  array(
    "name"   => "hasNext",
    "desc"   => "checks if there are any more elements in this cursor",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "if there is another element",
    ),
  ));

DefineFunction(
  array(
    "name"   => "hint",
    "desc"   => "gives the database a hint about the query",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "key_pattern",
        "type" => VariantMap,
        "desc" => "indexes to use for the query",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "immortal",
    "desc"   => "sets whether this cursor will timeout",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "liveForever",
        "type" => Boolean,
        "desc" => "if the cursor should be immortal",
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "info",
    "desc"   => "gets the query, fields, limit, and skip for this cursor",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => VariantMap,
        "desc" => "the namespace, limit, skip, query, and fields for this cursor",
    ),
  ));

DefineFunction(
  array(
    "name"   => "key",
    "desc"   => "the current result's _id",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "the current result's _id as a string",
    ),
  ));

DefineFunction(
  array(
    "name"   => "limit",
    "desc"   => "limits the number of results returned",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "num",
        "type" => Int64,
        "desc" => "the number of results to return",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "next",
    "desc"   => "advances the cursor to the next result",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => null,
    ),
  ));

DefineFunction(
  array(
    "name"   => "partial",
    "desc"   => "if this query should fetch partial results from mongos if a shard is down",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "okay",
        "type" => Boolean,
        "desc" => "if receiving partial results is okay",
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "reset",
    "desc"   => "clears the cursor",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => null,
    ),
  ));

DefineFunction(
  array(
    "name"   => "rewind",
    "desc"   => "returns the cursor to the beginning of the result set",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => null,
    ),
  ));

DefineFunction(
  array(
    "name"   => "skip",
    "desc"   => "skips a number of results",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "num",
        "type" => Int64,
        "desc" => "the number of results to skip",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "slaveOkay",
    "desc"   => "sets whether this query can be done on a slave",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "okay",
        "type" => Boolean,
        "desc" => "if it is okay to query the slave",
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "snapshot",
    "desc"   => "use snapshot mode for the query",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
  ));

DefineFunction(
  array(
    "name"   => "sort",
    "desc"   => "sorts the results by given fields",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "fields",
        "type" => VariantMap,
        "desc" => "the fields by which to sort",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "tailable",
    "desc"   => "sets whether this cursor will be left open after fetching the last results",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "tail",
        "type" => Boolean,
        "desc" => "if the cursor should be tailable",
        "value" => "true",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "timeout",
    "desc"   => "sets a client-side timeout for this query",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Object,
        "desc" => "this cursor",
    ),
    "args"   => array(
      array(
        "name" => "ms",
        "type" => Int64,
        "desc" => "the number of milliseconds for the cursor to wait for a response. By default, the cursor will wait forever",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "valid",
    "desc"   => "checks if the cursor is reading a valid result",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Boolean,
        "desc" => "if the current result is not null",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoId",
    "desc"   => "A unique identifier created for database objects.",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name"  => "id",
    "type"  => String,
    "value" => "null_string",
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "id",
        "type" => String,
        "value" => "null_string",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "getHostname",
    "desc"   => "gets the hostname being used for this machine's ids",
    "flags"  => HasDocComment | IsStatic,
    "return" => array(
        "type" => String,
        "desc" => "the hostname",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getInc",
    "desc"   => "gets the incremented value to create this id",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int64,
        "desc" => "the incremented value used to create this MongoId",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getPID",
    "desc"   => "gets the process id used to create this",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int32,
        "desc" => "the PID used to create this MongoId",
    ),
  ));

DefineFunction(
  array(
    "name"   => "getTimestamp",
    "desc"   => "gets the number of seconds since the epoch that this id was created",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => Int64,
        "desc" => "the number of seconds since the epoch that this id was created. There are only four bytes of timestamp stored, so MongoDate is a better choice for storing exact or wide-ranging times",
    ),
  ));

DefineFunction(
  array(
    "name"   => "__set_state",
    "desc"   => "create a dummy MongoId",
    "flags"  => HasDocComment | IsStatic,
    "return" => array(
        "type" => Object,
        "desc" => "A new id with the value \"000000000000000000000000\"",
    ),
    "args"   => array(
      array(
        "name" => "props",
        "type" => VariantMap,
        "desc" => "unused",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "returns a hexidecimal representation of this id",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this Id",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoCode",
    "desc"   => "Represents JavaScript code for the database.",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name"   => "code",
    "type"   => String,
  ));

DefineProperty(
  array(
    "name"   => "scope",
    "type"   => VariantMap,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "code",
        "type" => String,
      ),
      array(
        "name" => "scope",
        "type" => VariantMap,
        "value" => "null_array",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "returns this code as a string",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this code, the scope is not returned",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoDate",
    "desc"   => "Represents date objects for the database.",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name" => "sec",
    "type" => Int64,
  ));

DefineProperty(
  array(
    "name" => "usec",
    "type" => Int64,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "sec",
        "type" => Int64,
        "value" => "0",
      ),
      array(
        "name" => "usec",
        "type" => Int64,
        "value" => "0",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "returns a string representation of this date, similar to the representation returned by microtime().",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this date",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoRegex",
    "desc"   => "This class can be used to create regular expressions.",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name" => "regex",
    "type" => String,
  ));

DefineProperty(
  array(
    "name" => "flags",
    "type" => String,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "regex",
        "type" => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "string representation of this regular expression",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "this regular expression in the form \"/expr/flags\"",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoBinData",
    "desc"   => "An object that can be used to store or retrieve binary data from the database.",
    "flags"  => HasDocComment,
  ));

DefineConstant(
  array(
    "name"  => "FUNC",
    "type"  => Int32,
  ));

DefineConstant(
  array(
    "name"  => "BYTE_ARRAY",
    "type"  => Int32,
  ));

DefineConstant(
  array(
    "name"  => "UUID",
    "type"  => Int32,
  ));

DefineConstant(
  array(
    "name"  => "MD5",
    "type"  => Int32,
  ));

DefineConstant(
  array(
    "name"  => "CUSTOM",
    "type"  => Int32,
  ));

DefineProperty(
  array(
    "name" => "bin",
    "type" => String,
  ));

DefineProperty(
  array(
    "name" => "type",
    "type" => Int32,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "data",
        "type" => String,
      ),
      array(
        "name" => "type",
        "type" => Int32,
        "value" => "2",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "string representation of this binary data object",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "the string \"<Mongo Binary Data>\". To access the contents of a MongoBinData, use the bin field.",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoInt32",
    "desc"   => "The class can be used to save 32-bit integers to the database on a 64-bit system.",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name" => "value",
    "type" => String,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "value",
        "type" => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "string representation of this 32-bit integer",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "the string representation of this integer",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoInt64",
    "desc"   => "The class can be used to save 64-bit integers to the database on a 32-bit system.",
    "flags"  => HasDocComment,
  ));

DefineProperty(
  array(
    "name" => "value",
    "type" => String,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "value",
        "type" => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "desc"   => "string representation of this 64-bit integer",
    "flags"  => HasDocComment,
    "return" => array(
        "type" => String,
        "desc" => "the string representation of this integer",
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoDBRef",
    "desc"   => "This class can be used to create lightweight links between objects in different collections.",
    "flags"  => HasDocComment,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment | IsPrivate,
    "return" => array(
      "type"   => null,
    ),
  ));

DefineFunction(
  array(
    "name"   => "create",
    "desc"   => "creates a new database reference",
    "flags"  => HasDocComment | IsStatic,
    "return" => array(
      "desc" => "the reference",
      "type" => VariantMap,
    ),
    "args"   => array(
      array(
        "name" => "collection",
        "type" => String,
      ),
      array(
        "name" => "id",
        "type" => Variant,
      ),
      array(
        "name" => "database",
        "type" => String,
        "value" => "null_string",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "get",
    "desc"   => "fetches the object pointed to by a reference",
    "flags"  => HasDocComment | IsStatic,
    "return" => array(
      "desc" => "the document to which the reference refers or NULL if the document does not exist (the reference is broken).",
      "type" => Variant,
    ),
    "args"   => array(
      array(
        "name" => "db",
        "type" => Object,
      ),
      array(
        "name" => "ref",
        "type" => VariantMap,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "isRef",
    "desc"   => "checks if an array is a database reference",
    "flags"  => HasDocComment | IsStatic,
    "return" => array(
      "desc" => "if ref is a reference",
      "type" => Boolean,
    ),
    "args"   => array(
      array(
        "name" => "ref",
        "type" => Variant,
      ),
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoMinKey",
    "desc"   => "MongoMinKey is a special type used by the database that evaluates to less than any other type.",
    "flags"  => HasDocComment,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"   => "MongoMaxKey",
    "desc"   => "MongoMaxKey is a special type used by the database that evaluates to greater than any other type.",
    "flags"  => HasDocComment,
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
  ));

EndClass();

BeginClass(
  array(
    "name"    => "MongoTimestamp",
    "desc"    => "is used by sharding. If you're not looking to write sharding tools, what you probably want is MongoDate",
    "flags"   => HasDocComment,
  ));

DefineProperty(
  array(
    "name" => "sec",
    "type" => Int64,
    "value" => "0",
  ));

DefineProperty(
  array(
    "name" => "inc",
    "type" => Int64,
    "value" => "0",
  ));

DefineFunction(
  array(
    "name"   => "__construct",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => null,
    ),
    "args"   => array(
      array(
        "name" => "sec",
        "type" => Int64,
        "value" => "0",
      ),
      array(
        "name" => "inc",
        "type" => Int64,
        "value" => "0",
      ),
    ),
  ));

DefineFunction(
  array(
    "name"   => "__toString",
    "flags"  => HasDocComment,
    "return" => array(
      "type"   => String,
    ),
  ));

EndClass();

DefineFunction(
  array(
    "name"  => "bson_decode",
    "flags" => HasDocComment,
    "return"=> array(
      "type" => Variant,
    ),
    "args"  => array(
      array(
        "name"  => "bson",
        "type"  => String,
      ),
    ),
  ));

DefineFunction(
  array(
    "name"  => "bson_encode",
    "flags" => HasDocComment,
    "return"=> array(
      "type" => String,
    ),
    "args"  => array(
      array(
        "name"  => "anything",
        "type"  => Variant,
      ),
    ),
  ));

