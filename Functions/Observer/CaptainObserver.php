<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 下午3:13
 */

namespace Functions\Observer;


class CaptainObserver implements Observer
{

    function update($event_info = null)
    {
        echo '可以分配任务给这家伙了<br/>';
    }
}