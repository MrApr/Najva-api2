<?php


namespace Najva\Src\Drivers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RestDriver implements DriverInterface
{
    private $base_url = "https://app.najva.com/";
    private $base_api_uri = 'api/v1/';
    private $data;
    private $token;

    public function sendToAllRequest(array $data, string $token)
    {
        $this->data = $data;
        $this->token = $token;

        return $this->callApi('POST',$this->base_api_uri.'notifications');
    }

    public function sendLimitedRequest(array $data, string $token)
    {
        $this->data = $data;
        $this->token = $token;

        return $this->callApi('POST','notification/'.$this->base_api_uri.'notifications');
    }

    public function getSegments(string $token, string $api_key)
    {
        $this->token =$token;
        return $this->callApi('GET',$this->base_api_uri."websites/{$api_key}/segments");
    }

    public function getOneSignalSegments(string $token)
    {
        $this->token = $token;
        return $this->callApi("GET",$this->base_api_uri.'one-signals');
    }

    public function callApi(string $method, string $uri)
    {
        $client = new Client(['base_uri' => $this->base_url]);

        $options = [
            'headers' => [
                "Authorization" =>  "Token {$this->token}"
            ]
        ];
        if(!empty($this->data) && !is_null($this->data))
        {
            $options['json'] = $this->data;
        }

        try{
            $response = $client->request($method,$uri,$options);
            $status_code = $response->getStatusCode();
            $result = $response->getBody()->getContents();
        }catch (RequestException $e)
        {
            $response = $e->getMessage();
            $status_code = -99;
            $result = $response;
        }
        return array('status' => $status_code,'body' => $result);
    }
}