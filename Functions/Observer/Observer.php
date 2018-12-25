<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午9:07
 */

namespace Functions\Observer;

//观察者
Interface Observer
{
    function update($event_info = null);
}