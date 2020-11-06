<?php
$data_supplier = Requests::post($api_endpoint . "supplier/detail", $header);
// $register_agent_status = $register_agent->success;

$data_supplier = json_decode($data_supplier->body, TRUE);
$data_supplier = $data_supplier['data'];
?>

<!-- <div class="mb-3">
    <span class="badge badge-primary p-1">
        <a href="#" class="text-white">Produk Anda</a>
    </span>
    <span class="badge badge-info p-1">
        <a href="#" class="text-white">Riwayat Penjualan</a>
    </span>
    <span class="badge badge-success p-1">
        <a href="#" class="text-white">Tambah Produk</a>
    </span>
</div> -->

<?php
if (isset($_GET['product'])) {
    include("product-list.php");
} elseif (isset($_GET['product-detail'])) {
    include("detail.php");
} else {
    include("beranda.php");
}

?>