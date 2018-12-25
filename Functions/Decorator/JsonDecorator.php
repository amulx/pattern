<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 下午3:16
 */

namespace Functions\Decorator;


class JsonDecorator implements Decorator
{

    function before()
    {
        echo 'JsonDecorator before<br/>';
    }

    function after()
    {
        echo 'JsonDecorator after<br/>';
    }
}