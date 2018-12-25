<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 上午10:37
 */
$config = array(
    'home' => array(
        'decorator' => array(
            'Functions\Decorator\HtmlDecorator',
            'Functions\Decorator\JsonDecorator'
        )
    ),
    'defaultName' =>'php study'
);
return $config;