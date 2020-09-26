<?php

include_once('Api_request.php');
class Product extends Api_request
{
    public function __construct()
    {
        include_once('Api_request.php');
        $api_request = new Api_request();
        $this->api_request = $api_request;
    }

    public function view_product()
    {
        $api_endpoint = "/product/all";
        $params = "request_type=1";
        $api_request = $this->api_request;
        $request = $api_request->request_post($api_endpoint, $params);

        return array(
            "status" => $request['status'], //memberitahukan status true/false
            "result" => json_decode($request['result'], TRUE)
        );
    }

    public function view_product_categories()
    {
        $api_endpoint = "/product-category/all";
        $params = "request_type=1";
        $api_request = $this->api_request;
        $request = $api_request->request_post($api_endpoint, $params);

        return array(
            "status" => $request['status'], //memberitahukan status true/false
            "result" => json_decode($request['result'], TRUE)
        );
    }
}