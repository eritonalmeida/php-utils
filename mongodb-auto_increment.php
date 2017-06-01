<?php
/**
 * require mongo-php-library https://github.com/mongodb/mongo-php-library
 */
require "vendor/autoload.php";

$db = new MongoDB\Client();
$database = 'my_database';
$db->selectDatabase($database);

$counters = $db->selectCollection('my_counters', $database);
$filter = array('id' => 'users');
$update = array('$inc' => array('counter' => 1));
$options = array('returnDocument' => 2, 'upsert' => true);

//get new id
$result = $counters->findOneAndUpdate($filter, $update, $options);

//save new user
$users = $db->selectCollection('users', $database);
$data = array(
    'id' => $result->counter,
    'name' => 'Test'
);

$users->insertOne($data);
