<?php

class Database
{
    private static $instance;

    private function __construct() 
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new Database();
        return self::$instance;
    }

    public function getQuery()
    {
        return 'SELECT * FROM some_table';
    }
}


echo 'With Singleton' . PHP_EOL;

$db  = Database::getInstance();
$db2 = Database::getInstance();
$db3 = Database::getInstance();
echo $db->getQuery() . PHP_EOL;

var_dump($db);
var_dump($db2); // Same instance as $db
var_dump($db3); // Same instance as $db

echo PHP_EOL;
echo 'Wihtout Singleton' . PHP_EOL;
class DB {}

$db  = new DB();
$db2 = new DB();
$db3 = new DB();

var_dump($db);
var_dump($db2); // Same instance as $db
var_dump($db3); // Same instance as $db