<?php

include('template/config_api.php');

//update status product client --> show atau tidaknya
if (isset($_POST['target']) && isset($_POST['target']) && isset($_POST['status'])) {
    $target_id = htmlentities($_POST['target']);
    $status = htmlentities($_POST['status']);

    $product_status = Requests::post($api_endpoint . "product/update?target_id=" . $target_id . "&status=" . $status, $header);
    $product_status = json_decode($product_status->body, TRUE);

    if ($product_status['status'] == 1) {
        echo 1;
    } else {
        echo 0;
    }
}