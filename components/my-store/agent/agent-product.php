<?php
$product_agent = Requests::post($api_endpoint . "product/agent" . $target, $header);
$product_agent = json_decode($product_agent->body, TRUE);

if ($product_agent['status'] != 1) {
    //tidak ada product agent
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center col-grid-box">
    <img alt="" class="img-fluid" src="./assets/images/no-product.png" width="50%">
    <h4 class="mt-2">Maaf, kamu belum memiliki produk</h4>
</div>
<?php
} else {
    //ada product supplier
    $product_agent_data = $product_agent['data'];
?>
<div class="box-account box-info">
    <h5 class="text-left mb-3" style="color: #272727;">Daftar Produk</h5>

    <div class="row review-block mt-4">
        <?php
            foreach ($product_agent_data as $pad) {
                if (is_null($pad['image'])) {
                    $pad_image = "./assets/images/no-picture.jpg";
                } else {
                    $pad_image = $pad['image'][0]['url'];
                }
                $pad_price = "Rp " . number_format($pad['price'], 0, ',', '.');
            ?>

        <div class="col-md-4 col-lg-4 col-sm-12">
            <a href="?product-detail&target=<?= $pad['id'] ?>">
                <div class="card" style="border-radius: 25px;">
                    <img class="card-img-top" src="<?= $pad_image ?>" alt="<?= $pad['name'] ?>"
                        style="border-radius: 25px 25px 0px 0px">
                    <div class="card-body">
                        <div class="product-detail detail-center1">
                            <span
                                class="detail-price text-secondary font-weight-bold float-left"><?= limit_string($pad['name'], 15) ?>
                            </span>
                            <span class="detail-price text-success font-weight-bold float-right"><?= $pad_price ?>
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