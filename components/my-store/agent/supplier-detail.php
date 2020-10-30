<?php
$target = htmlentities($_GET['target']);
$product_supplier = Requests::post($api_endpoint . "product/my-supplier?target_id=" . $target, $header);
$product_supplier = json_decode($product_supplier->body, TRUE);

if ($product_supplier['status'] != 1) {
    //tidak ada product supplier
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center col-grid-box">
    <img alt="" class="img-fluid" src="./assets/images/no-product.png" width="50%">
    <h4 class="mt-2">Maaf, supplier ini belum memiliki produk</h4>
</div>
<?php
} else {
    //ada product supplier
    $product_supplier_data = $product_supplier['data'];
?>
<div class="box-account box-info">
    <h5 class="text-left mb-3" style="color: #272727;">Daftar Product Supplier</h5>
    <!-- <section class="search-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form class="form-header">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari produk supplier">
                            <div class="input-group-append">
                                <button class="btn btn-normal">
                                    <i class="fa fa-search"></i>Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
    <div class="row review-block mt-4">
        <?php
            foreach ($product_supplier_data as $psd) {
                if (is_null($psd['image'])) {
                    $psd_image = "./assets/images/no-picture.jpg";
                } else {
                    $psd_image = $psd['image'][0]['url'];
                }
                $psd_price = "Rp " . number_format($psd['price'], 0, ',', '.');
            ?>

        <div class="col-md-4 col-lg-4 col-sm-12">
            <a href="?supplier-product-detail&target=<?= $psd['id'] ?>">
                <div class="card" style="border-radius: 25px;">
                    <img class="card-img-top" src="<?= $psd_image ?>" alt="<?= $psd['name'] ?>"
                        style="border-radius: 25px 25px 0px 0px">
                    <div class="card-body">
                        <div class="product-detail detail-center1">
                            <span
                                class="detail-price text-secondary font-weight-bold float-left"><?= limit_string($psd['name'], 15) ?>
                            </span>
                            <span class="detail-price text-success font-weight-bold float-right"><?= $psd_price ?>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <?php } ?>
    </div>
</div>
<?php
}
?>