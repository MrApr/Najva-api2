<?php


namespace Najva\Src\Objects;


class NajvaObject implements ObjectInterface
{
    protected $extra_properties = array();

    public function __set($name, $value)
    {
        $this->extra_properties[$name] = $value;
    }

    public function __get($name)
    {
        if(isset($this->extra_properties[$name])) {
            return $this->extra_properties[$name];
        }
    }
}