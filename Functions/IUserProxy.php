<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午10:34
 */

namespace Functions;


interface IUserProxy
{
    function getUserName($id);
    function setUserName($id,$value);
}