<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午4:38
 */

namespace Functions\Strategy;


class FemaleUserStrategy implements UserStrategy
{

    function showAd()
    {
        return 'FemaleUserStrategy showAd';
    }

    function showCategory()
    {
        return 'FemaleUserStrategy showCategory';
    }
}