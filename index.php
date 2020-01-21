<?php
require_once  __DIR__."/vendor/autoload.php";

$najva_object = new \Najva\Src\Objects\NajvaObject();
$najva_object->setTitle("aaaa")->setBody("awawa")->setTime("merer")->setApiKey("awksadksadk")->setUrl("asdksadksa");
$najva_object->name = "mamad";
$najva_object->dick_size = 20;

$najva = new \Najva\Src\Drivers\RestDriver();
die(print_r($najva->sendToAllRequest()));
//die(print_r(\Najva\Src\Formatter\Formatter::format(new \Najva\Src\Formatter\JsonFormat($najva_object))));