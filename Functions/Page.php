<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午4:42
 */

namespace Functions;


use Functions\Strategy\UserStrategy;

class Page
{
    protected $stategy;
    function index(){
        echo $this->stategy->showAd();
        echo '<br/>';
        echo $this->stategy->showCategory();
    }
    function setStategy(UserStrategy $strategy){
        $this->stategy = $strategy;
    }
}