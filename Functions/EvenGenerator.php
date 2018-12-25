<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午9:06
 */

namespace Functions;


abstract class EvenGenerator
{
    private $observers = [];
    function addObserver(Observer $observer){
        $this->observers[] = $observer;
    }
    function notify(){
        foreach ($this->observers as $observer){
            $observer->update();
        }
    }
}