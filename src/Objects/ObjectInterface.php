<?php


namespace Najva\Src\Objects;


interface ObjectInterface
{
    public function __set($name, $value);

    public function __get($name);
}