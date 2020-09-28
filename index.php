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

    $category_api = Requests::post($api_endpoint . "product/all/", $header);
    $category_status = $category_api->success;
    $category_api_data = json_decode($category_api->body, TRUE);
    $category_api_data = $category_api_data['data'];

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
                                        <div class="product-box">
                                            <div class="product-imgbox">
                                                <div class="product-front">
                                                    <img src=<?= $tab_product_data_view_image ?>
                                                        class="img-fluid bg-img" alt="product">
                                                </div>
                                            </div>
                                            <div class="product-detail detail-center1 pt-3">
                                                <h4><?= $tab_product_data_view_name ?></h4>
                                                <span class="detail-price"><?= $tab_product_data_view_price; ?></span>
                                            </div>
                                        </div>
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

    <!-- Add to cart bar -->
    <div id="cart_side" class=" add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my cart</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeCart()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="./assets/images/layout-4/product/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>item name</h4>
                                </a>
                                <h4>
                                    <span>1 x $ 299.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="./assets/images/layout-4/product/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>item name</h4>
                                </a>
                                <h4>
                                    <span>1 x $ 299.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="#"><img alt="" class="mr-3" src="./assets/images/layout-4/product/3.jpg"></a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>item name</h4>
                                </a>
                                <h4><span>1 x $ 299.00</span></h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total">
                    <li>
                        <div class="total">
                            <h5>subtotal : <span>$299.00</span></h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="cart.html" class="btn btn-normal btn-xs view-cart">view cart</a>
                            <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Add to cart bar end-->

    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img"><img src="./assets/images/layout-4/product/3.jpg" alt="quick"
                                    class="img-fluid "></div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>Women Pink Shirt</h2>
                                <h3>$32.96</h3>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            <li class="active"><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1"> <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons"><a href="#" class="btn btn-normal">add to cart</a> <a
                                        href="#" class="btn btn-normal">view detail</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->

    <!-- My account bar start-->
    <div id="myAccount" class="add_to_cart right account-bar">
        <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my account</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeAccount()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <form class="theme-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label for="review">Password</label>
                    <input type="password" class="form-control" id="review" placeholder="Enter your password"
                        required="">
                </div>
                <div class="form-group">
                    <a href="#" class="btn btn-rounded btn-block ">Login</a>
                </div>
                <div>
                    <h5 class="forget-class"><a href="forget-pwd.html" class="d-block">forget password?</a></h5>
                    <h6 class="forget-class"><a href="register.html" class="d-block">new to store? Signup now</a></h6>
                </div>
            </form>
        </div>
    </div>
    <!-- Add to account bar end-->

    <!-- Add to wishlist bar -->
    <div id="wishlist_side" class="add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my wishlist</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeWishlist()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="./assets/images/layout-1/media-banner/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>item name</h4>
                                </a>
                                <h4>
                                    <span>sm</span>
                                    <span>, blue</span>
                                </h4>
                                <h4>
                                    <span>$ 299.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="./assets/images/layout-1/media-banner/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>item name</h4>
                                </a>
                                <h4>
                                    <span>sm</span>
                                    <span>, blue</span>
                                </h4>
                                <h4>
                                    <span>$ 299.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="#"><img alt="" class="mr-3" src="./assets/images/layout-1/media-banner/3.jpg"></a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>item name</h4>
                                </a>
                                <h4>
                                    <span>sm</span>
                                    <span>, blue</span>
                                </h4>
                                <h4><span>$ 299.00</span></h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total">
                    <li>
                        <div class="total">
                            <h5>subtotal : <span>$299.00</span></h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="wishlist.html" class="btn btn-normal btn-block  view-cart">view wislist</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Add to wishlist bar end-->

    <?php include('template/script.php') ?>

</body>

</html>