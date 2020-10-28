<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');
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

    <!--slider banner start-->
    <?php include("components/banner-slider.php") ?>
    <!--slider banner end-->

    <!--rounded category start-->
    <section class="rounded-category rounded-category-inverse mt-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-6 no-arrow">
                        <?php
                        foreach ($category_list_api_data as $listProduct) {
                        ?>
                        <div>
                            <div class="category-contain">
                                <a
                                    href="sub-category?name=<?= $listProduct['name'] ?>&target=<?= $listProduct['id'] ?>">
                                    <div class="img-wrapper">
                                        <img src="<?= $listProduct['image'] ?>" alt="category" class="img-fluid"
                                            style="width:110px; height: 97px">
                                    </div>
                                    <div>
                                        <div class="btn-rounded">
                                            <?= $listProduct['name'] ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--rounded category end-->

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
                                        <div class="product-wrapper-grid">
                                            <div class="row">
                                                <?php
                                                $product_category = Requests::post($api_endpoint . "product/limit?limit=18", $header);
                                                // $product_category_status = $product_category->success;
                                                $product_category_data = json_decode($product_category->body, TRUE);
                                                $product_category_data = $product_category_data['data'];
                                                foreach ($product_category_data as $product_show) {
                                                    if (empty($product_show['image'][0])) {
                                                        $product_show_image = "./assets/images/layout-4/product/1.jpg";
                                                    } else {
                                                        $product_show_image = $product_show['image'][0]['url'];
                                                    }
                                                ?>
                                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                    <a
                                                        href="product-detail?name=<?= $product_show['name'] ?>&target=<?= $product_show['id'] ?>">
                                                        <div class="product">
                                                            <div class="product-box ">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front">
                                                                        <img src="<?= $product_show_image ?>"
                                                                            class="img-fluid bg-img" alt="product">
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail detail-center1 pt-2">
                                                                    <h6 class="text-secondary font-weight-bold">
                                                                        <?= $product_show['name'] ?></h6>
                                                                    <span
                                                                        class="detail-price text-success"><?= rupiah($product_show['price']) ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php } ?>
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