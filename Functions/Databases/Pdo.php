<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午4:18
 */

namespace Functions\Databases;


class Pdo implements IDatabase
{
    private static $db;

    private function __construct()
    {
    }

    function connect($host, $user, $passwd, $dbname)
    {
        $this->getInstance($host, $user, $passwd, $dbname);
    }

    static function getInstance($host, $user, $passwd, $dbname){
        if (self::$db){
            return self::$db;
        } else {
            self::$db = new \PDO('mysql:host='.$host.';port=3306;dbname='.$dbname,$user,$passwd);
            return self::$db;
        }
    }

    function query($sql)
    {
        return self::$db->query($sql);
    }

    function close()
    {
        self::$db = null;
    }

    private function __clone()
    {
    }
}