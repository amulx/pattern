<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午2:23
 */
define('BASEDIR',__DIR__);
include BASEDIR . '/Functions/Loader.php';
// error_reporting(3);
spl_autoload_register('\\Functions\\Loader::autoload');
$config = new \configs\Config(BASEDIR.'/configs');
/*
$staff = new \App\Controller\Home\Index();
$staff->attach(new \Functions\Observer\HrObserver());
$staff->attach(new \Functions\Observer\BossObserver());
$staff->attach(new \Functions\Observer\CaptainObserver());
$staff->notify();
print_r($staff->Index());
*/
$chain = new \Functions\Chain();
echo $chain->from("testTable")->where("id=1")->order("id DESC")->limit(10)->select();