<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 下午3:02
 */

namespace Functions\Observer;

// 被观察者
interface Observable
{
    // 添加/注册观察者
    public function attach(Observer $observer);
    // 删除观察者
    public function detach(Observer $observer);
    // 触发通知
    public function notify();
}