<?php
class Api_request
{
    public function __construct()
    {
        include('./vendor/rmccue/requests/library/Requests.php');
        Requests::register_autoloader();
        //get class Api_config to get api details
        include('./config/api_config.php');

        $key = new Api_config;
        $api_key = $key->getKey();
        $bearerKey = $api_key["bearer_key"];

        $header = array(
            "Content-Type" => "application/json",
            "X-Requested-With" => " XMLHttpRequest",
            "Authorization" => " Bearer $bearerKey"
        );

        $this->header = $header;
        $this->api_endpoint = $api_key["api_address"];
        $this->api_version = $api_key["version"];
    }

    public function request_post($api_endpoint_request, $params)
    {
        //menyatukan link api dengan link end point yang di inginkan
        $api_endpoint = $this->api_endpoint . $this->api_version . $api_endpoint_request . "?" . $params;

        $response = Requests::post($api_endpoint, $this->header);
        $status = $response->success;
        $result = $response->body;

        return array(
            "status" => $status,
            "result" => $result
        );
    }

    public function request_get($api_endpoint_request, $params)
    {
        //menyatukan link api dengan link end point yang di inginkan
        $api_endpoint = $this->api_endpoint . $this->api_version . $api_endpoint_request . "?" . $params;

        $response = Requests::get($api_endpoint, $this->header);
        $status = $response->status_code;
        $result = $response->body;

        return array(
            "status" => $status,
            "result" => $result
        );
    }
}