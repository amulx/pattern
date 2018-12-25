<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午4:39
 */

namespace Functions\Strategy;


class MaleUserStrategy implements UserStrategy
{

    function showAd()
    {
        return 'MaleUserStrategy showAd';
    }

    function showCategory()
    {
        return 'MaleUserStrategy showCategory';
    }
}