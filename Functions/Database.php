<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午3:03
 */

namespace Functions;


class Database
{
    private static $db;
    private function __construct(){

    }

    static function getInstance(){
        if (self::$db){
            return self::$db;
        } else {
            self::$db = new self();
            return self::$db;
        }
    }
    function where($where){
        return $this;
    }

    function order($order){
        return $this;
    }

    function select($select){
        return $this;
    }
}