<?php
//buat request untuk ambil data detail product
$product_detail_request = Requests::post($api_endpoint . "product/detail?target_id=" . $_GET['target'], $header);
$product_detail_request_status = $product_detail_request->success;
$product_detail_data = json_decode($product_detail_request->body, TRUE);
$product_detail_data = $product_detail_data['data'];

$product_detail_name = $product_detail_data['name'];
$product_detail_price = rupiah($product_detail_data['price']);
$product_detail_description = $product_detail_data['description'];
$product_detail_weight = $product_detail_data['weight'];
$product_detail_stock = $product_detail_data['stock'];
$product_detail_min_order = $product_detail_data['min_order'];
$product_detail_image = $product_detail_data['image'];
?>

<!-- section start -->
<section class="section-big-pt-space rounded ">
    <div class="collection-wrapper mb-4">
        <div class="custom-container">
            <div class="row">
                <?php
                if (is_null($product_detail_image)) {
                ?>
                <div class="col-lg-4">
                    <div class="product-slick no-arrow">
                        <div>
                            <img src="./assets/images/no-picture.jpg" alt="" class="img-fluid image_zoom_cls-0">
                        </div>
                    </div>
                </div>
                <?php
                } else {
                ?>
                <div class="col-lg-4">
                    <div class="product-slick no-arrow">
                        sads
                        <?php
                            foreach ($product_detail_image as $product_detail_image_view) {
                                $product_detail_image_view_url = $product_detail_image_view['url'];
                                $product_detail_image_view_id = $product_detail_image_view['id'];
                            ?>
                        <div>
                            <img src="<?= $product_detail_image_view_url ?>" alt=""
                                class="img-fluid  image_zoom_cls-<?= $product_detail_image_view_id ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                <?php
                                    foreach ($product_detail_image as $product_detail_image_view) {
                                        $product_detail_image_view_url = $product_detail_image_view['url'];
                                        $product_detail_image_view_id = $product_detail_image_view['id'];
                                    ?>
                                <div>
                                    <img src="<?= $product_detail_image_view_url ?>" alt=""
                                        class="img-fluid  image_zoom_cls-<?= $product_detail_image_view_id ?>">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

                <div class="col-lg-8 rtl-text">
                    <div class="product-right">
                        <h2><?= $product_detail_name ?></h2>
                        <h3 class="text-success"><?= $product_detail_price ?></h3>
                        <div class="border-product">
                            <h6 class="product-title">Deskripsi Produk</h6>
                            <p class="text-justify"><?= $product_detail_description ?></p>
                        </div>
                        <div class="border-product">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="product-title">Info Produk</h6>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="float-left font-weight-bold">Berat </p>
                                                <p class="float-right"><?= $product_detail_weight ?>Kg</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="float-left font-weight-bold">Stok </p>
                                                <p class="float-right"><?= $product_detail_stock ?>Kg</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="float-left font-weight-bold">Min. Order </p>
                                                <p class="float-right"><?= $product_detail_min_order ?>Kg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Section ends -->