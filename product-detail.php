<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');
searchProduct();

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

<body class="bg-light ">

    <!-- loader start -->
    <div class="loader-wrapper">
        <div>
            <img src="./assets/images/loader.gif" alt="loader">
        </div>
    </div>
    <!-- loader end -->

    <!--header start-->
    <?php
    include('template/header.php');

    ?>
    <!--header end-->

    <!-- section start -->
    <section class="ratio_square section-big-pt-space bg-light">
        <div class="collection-wrapper mb-4">
            <div class="custom-container">
                <div class="row">
                    <?php
                    if (is_null($product_detail_image)) {
                    ?>
                    <div class="col-lg-4">
                        <div class="product-slick no-arrow">
                            <div>
                                <img src="./assets/images/no-picture.jpg" alt=""
                                    class="img-fluid image_zoom_cls-0 rounded">
                            </div>
                        </div>
                    </div>
                    <?php
                    } else {
                    ?>
                    <div class="col-lg-4">
                        <div class="product-slick no-arrow">
                            <?php
                                foreach ($product_detail_image as $product_detail_image_view) {
                                    $product_detail_image_view_url = $product_detail_image_view['url'];
                                    $product_detail_image_view_id = $product_detail_image_view['id'];
                                ?>
                            <div>
                                <img src="<?= $product_detail_image_view_url ?>" alt=""
                                    class="img-fluid bg-img image_zoom_cls-<?= $product_detail_image_view_id ?> rounded">
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
                                            class="img-fluid bg-img image_zoom_cls-<?= $product_detail_image_view_id ?>">
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
                            <h3><?= $product_detail_price ?></h3>
                            <div class="product-buttons">
                                <a href="#" data-toggle="modal" data-target="#addtocart"
                                    class="btn btn-normal rounded">Tambah
                                    ke Keranjang</a>
                                <a href="#" class="btn btn-normal btn-outline rounded">Beli Sekarang</a>
                            </div>
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
                                                    <p class="float-right">
                                                        <?= string_number($product_detail_weight) ?>Kg</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="float-left font-weight-bold">Stok </p>
                                                    <p class="float-right"><?= string_number($product_detail_stock) ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="float-left font-weight-bold">Minimal Pemesanan </p>
                                                    <p class="float-right">
                                                        <?= string_number($product_detail_min_order) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="product-agent?target_id=<?= $product_detail_data['agent']['id'] ?>">
                                <div class="border-product">
                                    <?php
                                    if (is_null($product_detail_data['agent']['image'])) {
                                        $agent_profile_image = "./assets/images/no-picture.jpg";
                                    } else {
                                        $agent_profile_image = $product_detail_data['agent']['image'];
                                    }
                                    ?>
                                    <div class="row rounded-circle float-right">
                                        <div class="review-box" style="padding: 10px">
                                            <img class="img-fluid float-left rounded-circle"
                                                src="<?= $agent_profile_image ?>"
                                                alt="<?= $product_detail_data['agent']['name'] ?>">
                                            <h5 class="float-right pl-2"><?= $product_detail_data['agent']['name'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <!-- Section ends -->

    <!--footer-start-->
    <?php include('./template/footer.php') ?>
    <!--footer-end-->

    <!-- tap to top -->
    <div class="tap-top">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top End -->

    <?php include('template/script.php') ?>

</body>

</html>