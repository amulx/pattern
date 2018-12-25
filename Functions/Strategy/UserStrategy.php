<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午4:37
 */

namespace Functions\Strategy;


interface UserStrategy
{
    function showAd();
    function showCategory();
}