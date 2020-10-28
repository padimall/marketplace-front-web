<?php
$data_agent = Requests::post($api_endpoint . "agent/detail", $header);
// $register_agent_status = $register_agent->success;

$data_agent = json_decode($data_agent->body, TRUE);
$data_agent = $data_agent['data'];

//check apakah agent sudah diverif atau tidak
$agent_status = $data_agent['status'];

if ($agent_status == 0) {
?>
<div class="text-center">
    <img alt="" class="img-fluid" src="./assets/images/business.png" style="width:70%">
    <h3 class="pt-2 text-secondary" style="color: #353535">Registrasi Agen anda sedang diproses, mohon menunggu</h3>
</div>


<?php
} elseif ($agent_status == 1) {
    if (isset($_GET['edit-profile'])) {
        include("edit_profile.php");
    } elseif (isset($_GET['supplier-list'])) {
        include("supplier-list.php");
    } else {
        include("beranda.php");
    }
}