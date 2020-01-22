<?php

use \PHPUnit\Framework\TestCase;

class NajvaAPITest extends TestCase
{
    public function testSendToALLTest()
    {
        $najva_object = new \Najva\Src\Objects\NajvaObject();
        $najva_object->setToken("c8464549c8b2d3cad397a82766eefbb380ea7972")
            ->setApiKey("7b0b9e68-4afe-4c2d-b490-477dbd8dc35d")
            ->setTitle("aaaa")
            ->setBody("awawa")
            ->setTime(\Carbon\Carbon::now()->addMinute(280))
            ->setUrl("https://marketingshop.ir");
        $najva = new \Najva\Src\Najva($najva_object,new \Najva\Src\Drivers\RestDriver());
        $this->assertEquals($najva->sendToAllRequest()['status'],201);
    }
}