<?php


namespace Najva\Src\Drivers;


interface DriverInterface
{
    public function sendToAllRequest(array $data, string $token);
    public function sendLimitedRequest(array $data, string $token);
    public function getSegments(string $token, string $api_key);
    public function getOneSignalSegments(string $token);
    public function callApi(string $method, string $uri);
}