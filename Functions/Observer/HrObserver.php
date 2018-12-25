<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 下午3:12
 */

namespace Functions\Observer;


class HrObserver implements Observer
{

    function update($event_info = null)
    {
        echo '员工信息入库<br/>';
    }
}