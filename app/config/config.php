<?php

define("TEST_DB_NAME",getenv("DB_NAME"));
define("TEST_DB_USER",getenv("DB_USER"));
define("TEST_DB_PASS",getenv("DB_PASS"));
define("TEST_DB_HOST",getenv("DB_HOST"));
define("TEST_DB_PORT",getenv("DB_PORT"));

define("TEST_REDIS_HOST", getenv("REDIS_HOST"));
define("TEST_REDIS_PORT", getenv("REDIS_PORT"));

define("TEST_MEMCACHE_HOST", getenv("MEMCACHE_HOST"));
define("TEST_MEMCACHE_PORT", getenv("MEMCACHE_PORT"));
