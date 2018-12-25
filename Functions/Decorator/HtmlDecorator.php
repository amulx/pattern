<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 下午3:16
 */

namespace Functions\Decorator;


class HtmlDecorator implements Decorator
{

    function before()
    {
        echo 'HtmlDecorator before<br/>';
    }

    function after()
    {
        echo 'HtmlDecorator after<br/>';
    }
}