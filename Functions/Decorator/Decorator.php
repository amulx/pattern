<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午10:09
 */
namespace Functions\Decorator;

interface Decorator
{
    function before();
    function after();
}