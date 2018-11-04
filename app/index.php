<?php

require_once("./vendor/autoload.php");
require_once("./config/config.php");

// Check MySQL
$database_check=false;
try {	
    $database_check=true;
    $mysqli = new mysqli(TEST_DB_HOST, TEST_DB_USER, TEST_DB_PASS, TEST_DB_NAME);
    if ($mysqli->connect_errno) {
        $database_check=false;    
    }
} catch (Exception $e) {
    $database_check=false;    
}

// Check Redis
$redis_check=false;
try {	
    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => TEST_REDIS_HOST,
        "port" => TEST_REDIS_PORT
    ));	
    $redis->set("foo", "bar");
    $value = $redis->get("foo");
    $redis_check=true;
}
catch (Exception $e) {
    $redis_check=false;
}

// Check Memcached
$memcached_check=false;
try {	
    $memcached_check=true;
    $memcached = new Memcached;
    $memcached->addServer(TEST_MEMCACHE_HOST, TEST_MEMCACHE_PORT) or $memcached_check=false;
    if (! $memcached->add("mystr","this is a memcache test!",3600)) {
        $memcached_check=false;
    }
}
catch (Exception $e) {
    $memcached_check=false;
}


if ($database_check) {
    echo "MySQL connect: TRUE<br/>";
} else {
    echo "MySQL connect: FALSE<br/>";
}

if ($redis_check) {
    echo "Redis connect: TRUE<br/>";
} else {
    echo "Redis connect: FALSE<br/>";
}

if ($memcached_check) {
    echo "Memcached connect: TRUE<br/>";
} else {
    echo "Memcached connect: FALSE<br/>";
}
