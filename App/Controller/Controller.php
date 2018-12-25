<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 上午11:48
 */

namespace App\Controller;


use Functions\Decorator\Decorator;
use Functions\Observer\Observable;
use Functions\Observer\Observer;

class Controller implements Observable
{
    protected $decorator = []; // 所有装饰
    protected $observer = []; // 所有观察者

    public function __construct(){
        $dec_arr = $GLOBALS['config']['controller']['controller']['home']['decorator'];
        if (!empty($dec_arr)) {
            foreach ($dec_arr as $decorator) {
                $this->addDDecorator(new $decorator);
            }
            $this->beforeAction();
        }
    }

    public function __destruct(){
        $this->afterAction();
    }

    // 装饰器 可以动态地添加修改类的功能
    function beforeAction(){
        foreach ($this->decorator as $decorator){
            $decorator->before();
        }
    }
    // 装饰器 可以动态地添加修改类的功能
    function afterAction(){
        $decorator_arr = array_reverse($this->decorator);
        foreach ($decorator_arr as $decorator){
            $decorator->after();
        }
    }

    function addDDecorator(Decorator $decorator){
        $this->decorator[] = $decorator;
    }

    // 观察者模式
    public function attach(Observer $observer)
    {
        $this->observer[] = $observer;
    }

    public function detach(Observer $observer)
    {
        unset($this->observer[$observer]);
    }

    public function notify()
    {
        foreach($this->observer as $observer){
            $observer->update();
        }
    }

    public function trigger(){

    }
}