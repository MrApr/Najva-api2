<?php


namespace Najva\Src;


use Najva\Src\Drivers\DriverInterface;
use Najva\Src\Drivers\RestDriver;
use Najva\Src\Formatter\ArrayFormatter;
use Najva\Src\Formatter\Formatter;
use Najva\Src\Formatter\ObjectFormatterInterface;

class Najva
{
    protected $driver;
    protected $data;

    public function __construct(ObjectFormatterInterface $data,DriverInterface $driver = null)
    {
        $this->data = Formatter::format(new ArrayFormatter($data));
        if(empty($driver) || is_null($driver)) {
            $driver = new RestDriver();
        }
        $this->driver = $driver;
    }

    public function sendToAllRequest()
    {
        $token = $this->data['token'];
        if(isset($this->data['token']))
        {
            unset($this->data['token']);
        }
        return $this->driver->sendToAllRequest($this->data,$token);
    }

    public function sendLimitedRequest()
    {
        $token = $this->data['token'];
        if(isset($this->data['token']))
        {
            unset($this->data['token']);
        }
        return $this->driver->sendLimitedRequest($this->data,$token);
    }

    public function getSegments()
    {
        $token = $this->data['token'];
        $api_key = $this->data['api_key'];
        if(isset($this->data['token'])){
            unset($this->data['token']);
        }
        if(isset($this->data['api_key'])){
            unset($this->data['api_key']);
        }

        return $this->driver->getSegments($token,$api_key);
    }

    public function getOneSignalSegments()
    {
        $token = $this->data['token'];
        if(isset($this->data['token'])){
            unset($this->data['token']);
        }
        return $this->driver->getOneSignalSegments($token);
    }
}