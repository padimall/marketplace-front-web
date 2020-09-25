<?php

include_once('Api_request.php');
class Sign extends Api_request
{
    public function __construct()
    {
        $api_request = new Api_request();
        $this->api_request = $api_request;
    }

    public function sign_up($name, $address, $phone, $email, $password, $password_confirmation)
    {
        $name = htmlentities($name);
        $address = htmlentities($address);
        $phone = htmlentities($phone);
        $email = htmlentities($email);
        $password = htmlentities($password);
        $password_confirmation = htmlentities($password_confirmation);

        //cek ulang apakah password sudah beneran sama, manatau di client side ada terjadi hijacking code
        if ($password_confirmation === $password) {
            $api_endpoint = "signup";
            $params = "name=" . $name . "&address=" . $address . "&phone=" . $phone . "&email=" . $email . "&password=" . $password . "&password_confirmation=" . $password_confirmation;
            $api_request = $this->api_request;
            $request = $api_request->request_post($api_endpoint, $params);

            // $request = json_decode($request, TRUE);

            return $request;
        }


        $api_endpoint = "/product/all";
        $params = "request_type=1";
        $api_request = $this->api_request;
        $request = $api_request->request_post($api_endpoint, $params);

        return array(
            "status" => $request['status'], //memberitahukan status true/false
            "result" => json_decode($request['result'], TRUE)
        );
    }
}