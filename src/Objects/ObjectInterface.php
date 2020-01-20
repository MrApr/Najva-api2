<?php


namespace Najva\Src\Objects;


interface ObjectInterface
{
    public function __construct(string $api_key, string $title, string $body, string $url, string $sent_time);

    public function __set(string $name,string $value);

    public function __get(string $name);
}