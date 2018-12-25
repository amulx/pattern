<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午2:32
 */

namespace App\Controller\Home;


use App\Controller\Controller;
use Functions\Decorator\HrDecorator;

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index(){

    }

    public static function test(){
        echo 'App_test';
    }
}