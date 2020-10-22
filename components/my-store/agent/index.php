<?php

$check_agent = Requests::post($api_endpoint . "agent/detail", $header);
// $register_agent_status = $register_agent->success;
$check_agent_data = json_decode($check_agent->body, TRUE);

//check apakah agent sudah diverif atau tidak
$agent_status = $check_agent_data['data']['status'];

if ($agent_status == 0) {
?>
<div class="text-center">
    <img alt="" class="img-fluid" src="./assets/images/business.png" style="width:70%">
    <h3 class="pt-2 text-secondary" style="color: #353535">Registrasi Agen anda sedang diproses, mohon menunggu</h3>
</div>
<?php
} else {
?>
asdasd
<?php
}