<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php') ?>

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

    <!--slider start-->
    <section class="theme-slider section-py-space">
        <div class="custom-container">
            <div class="row slider-layout">
                <div class="col-12 slider-slide ">
                    <div class="slide-1 no-arrow">
                        <div>
                            <div class="slider-banner slide-banner-3">
                                <div class="slider-img">
                                    <ul class="layout4-slide-1">
                                        <li id="img-1"><img src="./assets/images/layout-4/slider/1.1.png"
                                                class="img-fluid" alt="slider"></li>
                                    </ul>
                                </div>
                                <div class="slider-banner-contain">
                                    <div>
                                        <h5>last chance to Grab</h5>
                                        <h3>headphones</h3>
                                        <h1>new earphones</h1>
                                        <h2>wireless headphone only $99</h2>
                                        <a class="btn btn-normal">
                                            shop now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-banner slide-banner-3">
                                <div class="slider-img">
                                    <ul class="layout4-slide-2">
                                        <li id="img-2"><img src="./assets/images/layout-4/slider/1.2.png"
                                                class="img-fluid" alt="slider"></li>
                                    </ul>
                                </div>
                                <div class="slider-banner-contain">
                                    <div>
                                        <h5>exclusive launch offer</h5>
                                        <h3>new range off</h3>
                                        <h1>philips headephone</h1>
                                        <h2>with rich bass</h2>
                                        <a class="btn btn-normal">
                                            shop now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="slider-banner slide-banner-3">
                                <div class="slider-img">
                                    <ul class="layout4-slide-3 ">
                                        <li id="img-3" class="slide-center"><img
                                                src="./assets/images/layout-4/slider/1.3.png" class="img-fluid"
                                                alt="slider"></li>
                                    </ul>
                                </div>
                                <div class="slider-banner-contain">
                                    <div>
                                        <h5>providing customized</h5>
                                        <h3>samsung CCTV</h3>
                                        <h1>full hd solution</h1>
                                        <h2>strength your sequrity</h2>
                                        <a class="btn btn-normal">
                                            shop now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider end-->

    <!--tab product-->
    <section class="section-pt-space">
        <div class="tab-product-main">
            <div class="tab-prodcut-contain">
                <ul class="tabs tab-title">
                    <?php
                    foreach ($category_list_api_data as $listProduct) {
                        $jumlahProductCategory = $listProduct['count_product'];
                        if (is_null($jumlahProductCategory)) {
                        } else {
                    ?>
                    <li class="">
                        <a href="tab-<?= $listProduct['name'] ?>">
                            <?= $listProduct['name'] ?>
                        </a>
                    </li>
                    <?php
                        }
                        ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
    <!--tab product-->

    <!-- product tab  -->
    <section class="ratio_asos section-big-py-space">
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="theme-tab product no-arrow">
                        <div class="tab-content-cls ">
                            <!-- looping tab -->
                            <?php
                            //checkpoint untuk memberi class active default tab
                            $checkPoint = 0;
                            foreach ($category_list_api_data as $productTabList) {
                                $dataProductName = $productTabList['name'];
                                if ($checkPoint == 0) {
                                    $tabActive = " active default";
                                } else {
                                    $tabActive = "";
                                }
                                $checkPoint++;

                            ?>
                            <div id="tab-<?= $dataProductName ?>" class="tab-content <?= $tabActive ?>">
                                <div class="product-slide-6 product-m no-arrow product">
                                    <?php
                                        $tab_product_per_category_api = Requests::post($api_endpoint . "product/category?name=" . $dataProductName, $header);
                                        $tab_product_status = $tab_product_per_category_api->success;
                                        $tab_product_data = json_decode($tab_product_per_category_api->body, TRUE);
                                        $tab_product_data = $tab_product_data['data'];
                                        foreach ($tab_product_data as $tab_product_data_view) {
                                            // var_dump($tab_product_data_view);
                                            $tab_product_data_view_name = $tab_product_data_view['name'];
                                            $tab_product_data_view_price = "Rp " . number_format($tab_product_data_view['price'], 0, ',', '.');
                                            $tab_product_data_view_image = $tab_product_data_view['image'];
                                            if (empty($tab_product_data_view_image)) {
                                                $tab_product_data_view_image = "./assets/images/layout-4/product/1.jpg";
                                            } else {
                                                $tab_product_data_view_image = "https://api.padimall.id/" . $tab_product_data_view_image[0];
                                            }
                                        ?>
                                    <div>
                                        <a
                                            href="product-detail?name=<?= $tab_product_data_view_name ?>&target=<?= $tab_product_data_view['id'] ?>">
                                            <div class="product-box">
                                                <div class="product-imgbox">
                                                    <div class="product-front">
                                                        <img src=<?= $tab_product_data_view_image ?>
                                                            class="img-fluid bg-img" alt="product">
                                                    </div>
                                                </div>
                                                <div class="product-detail detail-center1 pt-3">
                                                    <h4 class="text-success" style="text-decoration: none;">
                                                        <?= $tab_product_data_view_name ?></h4>
                                                    <span
                                                        class="detail-price"><?= $tab_product_data_view_price; ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product tab end -->

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
                                <a href="product-category?name=<?= $listProduct['name'] ?>">
                                    <div class="img-wrapper">
                                        <img src="http://api.padimall.id/<?= $listProduct['image'] ?>" alt="category"
                                            class="img-fluid" style="width:110px; height: 97px">
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