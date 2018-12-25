<?php
/**
 * Created by PhpStorm.
 * User: amu
 * Date: 18-12-25
 * Time: 上午10:31
 */

namespace configs;


class Config implements \ArrayAccess
{
    protected $path;
    protected $configs = array();

    function __construct($path){
        $this->path = $path;
    }


    public function offsetExists($offset)
    {
        return isset($this->configs[$offset]);
    }

    public function offsetGet($offset)
    {
        if (empty($this->configs[$offset])){
            $file_path = $this->path.'/'.$offset.'.php';
            $config = require $file_path;
            $this->configs[$offset] = $config;
        }
        return $this->configs;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->configs[] = $value;
        } else {
            $this->configs[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        return isset($this->configs[$offset]) ? $this->configs[$offset] : null;
    }
}