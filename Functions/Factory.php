<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午3:25
 */

namespace Functions;


class Factory
{
    static function createDatabase(){
        $db = Database::getInstance();
        Register::set('db1',$db);// 存入注册树
        // return $db;
    }
}