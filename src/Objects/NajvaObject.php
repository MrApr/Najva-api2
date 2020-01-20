<?php


namespace Najva\Src\Objects;


use Carbon\Carbon;

class NajvaObject implements ObjectInterface
{
    private $api_key;
    private $title;
    private $body;
    private $url;
    private $sent_time;

    protected $extra_properties = array();

    public function __construct(string $api_key, string $title, string $body, string $url, string $sent_time)
    {
        $this->api_key = $api_key;
        $this->title = $title;
        $this->body = $body;
        $this->url = $url;
        $this->sent_time = $sent_time;
    }

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

    protected function formatData()
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
        return $data;
    }

    public function getAllData(string $type = null)
    {
        $data = $this->formatData();

        if($type == "object"){
            return (object)$data;
        }

        return $data;
    }
}