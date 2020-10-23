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

    <!--box categroy start-->
    <section class="box-category section-pt-space">
        <div class="container-fluid ">
            <div class="row">
                <div class="col pl-0">
                    <div class="slide-10 no-arrow">
                        <?php
                        $main_category_id = htmlentities($_GET['target']);
                        $sub_category_product = Requests::post($api_endpoint . "product-category/all", $header);
                        $sub_category_product_status = $sub_category_product->success;
                        $sub_category_product_data = json_decode($sub_category_product->body, TRUE);

                        $sub_category_product_data = $sub_category_product_data['data'];

                        //untuk menampung array yang akan di looping di show product dibawah
                        $array_sub_category = [];

                        foreach ($sub_category_product_data as $show_sub_category) {
                            //hanya tampilkan yang sesuai dengan main category id
                            if ($show_sub_category['main_category_id'] == $main_category_id) {
                                array_push($array_sub_category, $show_sub_category['id']);

                        ?>
                        <div>
                            <a href="product-category?name=<?= $show_sub_category['name'] ?>">
                                <div class="box-category-contain rounded"
                                    style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?= $show_sub_category['image'] ?>');background-size:cover;background-repeat: no-repeat">
                                    <h4>
                                        <?= $show_sub_category['name'] ?>
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--box category end-->

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
                                                //array push yang sudah ditampung diatas, jadi acuan untuk looping product yang dibawah
                                                foreach ($array_sub_category as $sub_category_id) {
                                                    $product_category = Requests::post($api_endpoint . "product/all", $header);
                                                    $product_category = json_decode($product_category->body, TRUE);
                                                    $product_category = $product_category['data'];

                                                    foreach ($product_category as $show_product_category) {
                                                        $category = $show_product_category['category'];
                                                        if ($sub_category_id == $category) {
                                                            if (empty($show_product_category['image'])) {
                                                                $show_product_category_image = "./assets/images/layout-4/product/1.jpg";
                                                            } else {
                                                                $show_product_category_image = $show_product_category['image'][0]['url'];
                                                            }
                                                ?>
                                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                    <a
                                                        href="product-detail?name=<?= $show_product_category['name'] ?>&target=<?= $show_product_category['id'] ?>">
                                                        <div class="product">
                                                            <div class="product-box ">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front">
                                                                        <img src="<?= $show_product_category_image ?>"
                                                                            class="img-fluid bg-img" alt="product">
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail detail-center1 pt-2">
                                                                    <h6 class="text-secondary font-weight-bold">
                                                                        <?= $show_product_category['name'] ?>
                                                                    </h6>
                                                                    <span
                                                                        class="detail-price text-success"><?= rupiah($show_product_category['price']) ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                                        }
                                                    }
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

    <?php
    // echo 223;
    // var_dump($array_sub_category);
    ?>
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
                                    <span>1 x $
                                        299.00</span>
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
                                    <span>1 x $
                                        299.00</span>
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
                                <h4><span>1 x $
                                        299.00</span>
                                </h4>
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
                            <h5>subtotal :
                                <span>$299.00</span>
                            </h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="cart.html" class="btn btn-normal btn-xs view-cart">view
                                cart</a>
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
                            <div class="quick-view-img">
                                <img src="./assets/images/layout-4/product/3.jpg" alt="quick" class="img-fluid ">
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>Women Pink Shirt
                                </h2>
                                <h3>$32.96</h3>
                                <ul class="color-variant">
                                    <li class="bg-light0">
                                    </li>
                                    <li class="bg-light1">
                                    </li>
                                    <li class="bg-light2">
                                    </li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">
                                        product details
                                    </h6>
                                    <p>Sed ut
                                        perspiciatis,
                                        unde omnis iste
                                        natus error sit
                                        voluptatem
                                        accusantium
                                        doloremque
                                        laudantium</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            <li class="active">
                                                <a href="#">s</a>
                                            </li>
                                            <li><a href="#">m</a>
                                            </li>
                                            <li><a href="#">l</a>
                                            </li>
                                            <li><a href="#">xl</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">
                                        quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1">
                                            <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <a href="#" class="btn btn-normal">add
                                        to cart</a> <a href="#" class="btn btn-normal">view
                                        detail</a>
                                </div>
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
                    <h5 class="forget-class"><a href="forget-pwd.html" class="d-block">forget
                            password?</a></h5>
                    <h6 class="forget-class"><a href="register.html" class="d-block">new to
                            store? Signup now</a></h6>
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
                                    <span>$
                                        299.00</span>
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
                                    <span>$
                                        299.00</span>
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
                                <h4><span>$
                                        299.00</span>
                                </h4>
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
                            <h5>subtotal :
                                <span>$299.00</span>
                            </h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="wishlist.html" class="btn btn-normal btn-block  view-cart">view
                                wislist</a>
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