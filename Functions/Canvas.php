<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-24
 * Time: 下午9:23
 */

namespace Functions;


class Canvas
{
    private $data = [];
    function init($width = 20,$height = 10){
        for ($i=0;$i<$width;$i++){
            for ($j=0;$j<$height;$j++){
                $this->data[$i] .= '*';
            }
        }

    }

    function draw(){
        foreach ($this->data as $d){
            echo $d . PHP_EOL;
        }
    }
}