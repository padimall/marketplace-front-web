<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php');
searchProduct();
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
    <section class="section-big-pt-space ratio_square bg-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-wrapper-grid mb-4">
                                            <div class="row">
                                                <?php
                                                $search_product = Requests::post($api_endpoint . "product/agent-id?target_id=" . htmlentities($_GET['target_id']), $header);
                                                $search_product_status = $search_product->success;
                                                $search_product = json_decode($search_product->body, TRUE);
                                                $search_product_data = $search_product['data'];

                                                if ($search_product_status) {
                                                    if ($search_product['status'] == 1) {
                                                        //ada hasil pencariannya
                                                        foreach ($search_product_data as $sp) {
                                                            $sp_image = $sp['image'];
                                                            if (empty($sp_image)) {
                                                                $sp_image = "./assets/images/no-picture.jpg";
                                                            } else {
                                                                $sp_image = $sp_image[0]['url'];
                                                            }
                                                ?>
                                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                    <a
                                                        href="product-detail?name=<?= $sp['name'] ?>&target=<?= $sp['id'] ?>">
                                                        <div class="product">
                                                            <div class="product-box ">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front">
                                                                        <img src="<?= $sp_image ?>"
                                                                            class="img-fluid bg-img" alt="product">
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail detail-center1 pt-2">
                                                                    <h6
                                                                        class="text-secondary font-weight-bold card-product-title">
                                                                        <?= limit_string($sp['name'], 37) ?>
                                                                    </h6>
                                                                    <span
                                                                        class="detail-price text-success"><?= limit_string(rupiah($sp['price']), 15) ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                                        }
                                                    } else {
                                                        //tidak ada hasil pencariannya
                                                        ?>
                                                <div
                                                    class="col-xl-12 col-lg-12 col-md-12 col-12 text-center col-grid-box">
                                                    <img alt="" class="img-fluid" src="./assets/images/no-product.png">
                                                    <h3 class="mt-2">Maaf, untuk saat ini belum ada produk yang anda
                                                        cari</h3>
                                                </div>
                                                <?php
                                                    }
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
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
    <!-- section End -->

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