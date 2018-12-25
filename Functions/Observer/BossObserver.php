<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 下午3:12
 */

namespace Functions\Observer;


class BossObserver implements Observer
{

    function update($event_info = null)
    {
        echo '知道招了某某人了<br/>';
    }
}