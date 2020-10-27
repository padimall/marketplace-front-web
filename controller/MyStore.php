<?php

//register agent
if (isset($_POST['btn-register-agent'])) {
    $name = htmlentities($_POST['name']);
    $phone = htmlentities($_POST['phone']);

    $register_agent = Requests::post($api_endpoint . "agent/store?name=" . $name . "&phone=" . $phone, $header);
    // $register_agent_status = $register_agent->success;
    $register_agent_data = json_decode($register_agent->body, TRUE);
}