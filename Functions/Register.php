<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午3:59
 */

namespace Functions;


class Register
{
    protected static $objects;

    public static function set($alias,$object){
        self::$objects[$alias] = $object;
    }

    public static function _unset($alias){
        unset(self::$objects[$alias]);
    }

    public static function get($alias){
        return self::$objects[$alias];
    }

}