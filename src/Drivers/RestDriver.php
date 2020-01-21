<?php


namespace Najva\Src\Drivers;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Najva\Src\Formatter\ObjectFormatterInterface;

class RestDriver implements ObjectFormatterInterface
{
    private $base_url = "https://app.najva.com/api/v1/";
    private $data;
    private $token;
    private $result;

    public function sendToAllRequest(array $data, string $token)
    {
        $this->data = $data;
        $this->token = $token;

        $this->callApi('POST','notifications');
    }

    public function sendLimitedRequest(array $data, string $token)
    {
        $this->data = $data;
        $this->token = $token;

        $this->callApi('POST','notifications');
    }

    public function getSegments(string $token, string $api_key)
    {
        $this->token =$token;
        $this->callApi('GET',"/websites/{$api_key}/segments/");
    }

    public function getOneSignalSegments(string $token)
    {
        $this->token = $token;
        $this->callApi("GET",'one-signals');
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
            $options['json'] = (is_array($this->data)) ?  json_encode($this->data,true) : $this->data;
        }

        try{
            $response = $client->request($method,$uri,$options);
        }catch (RequestException $e)
        {
            $response = $e->getMessage();
        }
        $status_code = $response->getStatusCode();
        $result = $response->getBody()->getContents();
        $this->result = array('status' => $status_code,'body' => $result);
    }

    public function prepareData()
    {
        return $this->result;
    }
}