<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午2:34
 */

namespace Functions;


class Loader
{
    public static function autoload($class){
        require BASEDIR . DIRECTORY_SEPARATOR . str_replace('\\','/',$class) . '.php';
    }
}