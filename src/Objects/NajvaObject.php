<?php


namespace Najva\Src\Objects;


use Carbon\Carbon;
use Najva\Src\Formatter\ObjectFormatterInterface;

class NajvaObject implements ObjectInterface,ObjectFormatterInterface
{
    private $api_key;
    private $title;
    private $body;
    private $url;
    private $sent_time;

    protected $extra_properties = array();

    public function __set(string $name,string $value)
    {
        $this->extra_properties[$name] = $value;
    }

    public function __get(string $name)
    {
        if(isset($this->extra_properties[$name])) {
            return $this->extra_properties[$name];
        }
    }

    public function setApiKey(string $api_key): ObjectInterface
    {
        $this->api_key = $api_key;
        return $this;
    }

    public function setTitle(string $title): ObjectInterface
    {
        $this->title = $title;
        return $this;
    }

    public function setBody(string $body): ObjectInterface
    {
        $this->body = $body;
        return $this;
    }

    public function setUrl(string $url): ObjectInterface
    {
        $this->url = $url;
        return $this;
    }

    public function setTime(string $time): ObjectInterface
    {
        $this->sent_time = $time;
        return $this;
    }

    public function prepareData()
    {
        $data = $this->extra_properties;
        $class_properties = get_object_vars($this);
        if(count($class_properties)) {
            foreach ($class_properties as $property_key => $property_value){
                if($property_key != "extra_properties" && !empty($property_value) && !is_null($property_value)){
                    $data[$property_key] = $property_value;
                }
            }
        }
        return (array)$data;
    }
}