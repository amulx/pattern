<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午2:30
 */

namespace Functions;


class Objects
{
    protected $arr = array();

    // 设置类的属性
    function __set($key, $value)
    {
        $this->arr[$key] = $value;
    }

    function __get($key)
    {
        var_dump(__METHOD__);
        return $this->arr[$key];
    }

    //设置类的方法
    function __call($func, $arguments)
    {
        return $func.json_encode($arguments);
    }

    function __callStatic(){

    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return __CLASS__;
    }

    //把对象当前函数来调用时执行
    function __invoke($param)
    {
        // TODO: Implement __invoke() method.
        return 'invoke';
    }
}