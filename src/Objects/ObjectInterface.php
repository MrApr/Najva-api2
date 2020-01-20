<?php


namespace Najva\Src\Objects;


interface ObjectInterface
{
    public function __set(string $name,string $value);

    public function __get(string $name);

    public function setApiKey(string $api_key): ObjectInterface;

    public function setTitle(string $title): ObjectInterface;

    public function setBody(string $body): ObjectInterface;

    public function setUrl(string $url): ObjectInterface;

    public function setTime(string $time): ObjectInterface;
}