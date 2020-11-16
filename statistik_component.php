<div class="row mt-4">
    <?php
    include('template/config_api.php');
    $agent_list = Requests::post("https://api.padimall.id/api/register-logs", $header);
    $agent_list = json_decode($agent_list->body, TRUE);
    $agent_list = $agent_list['data'];
    foreach ($agent_list as $al) {
    ?>
    <div class="col-md-3">
        <div class="card" style="border: none;">
            <div class="card-body">
                <h3 class="text-center text-secondary"><?= $al['user'] ?></h3>
                <h5 class="text-center text-success mt-3"><?= $al['city'] ?></h5>
            </div>
        </div>
    </div>
    <?php } ?>
</div>