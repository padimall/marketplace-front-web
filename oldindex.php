<?php
include('controller/product.php');
$productView = new Product();

$dataProduct = $productView->view_product();
$dataProduct = $dataProduct["result"]['data'];
// // var_dump($dataProduct["result"]['data']);

$dataProduct_categories = $productView->view_product_categories();
$dataProduct_categories = $dataProduct_categories["result"]['data'];
// var_dump($dataProduct_categories);
?>
<!DOCTYPE html>
<html lang="en">

<!-- header start -->
<?php include 'template/head.php' ?>
<!-- header end -->

<body class="bg-light">

    <!-- loader start -->
    <?php include 'template/loader.php' ?>
    <!-- loader end -->

    <!-- header start -->
    <?php include 'template/header.php' ?>
    <!-- header end -->

    <!--slider start-->
    <section class="section-pb-space b-g-white">
        <section class="theme-slider">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide-1 no-arrow">
                            <div>
                                <div class="slider-banner slide-banner-2 p-center">
                                    <div class="slider-img">
                                        <img src="https://wallpaperaccess.com/full/1306571.jpg" class="img-fluid"
                                            alt="slider">
                                    </div>
                                    <div class="slider-banner-contain">
                                        <div class="sub-contain">
                                            <h4>Discount 50% off</h4>
                                            <h1>Nama Banner</h1>
                                            <span>Nama Sale / Harga </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="slider-banner slide-banner-2 p-center">
                                    <div class="slider-img">
                                        <img src="https://images.alphacoders.com/768/thumb-1920-76811.jpg"
                                            class="img-fluid" alt="slider">
                                    </div>
                                    <div class="slider-banner-contain">
                                        <div class="sub-contain">
                                            <h4>Discount 50% off</h4>
                                            <h1>Nama Banner</h1>
                                            <span>Nama Sale / Harga </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--slider end-->

    <!--rounded category start-->
    <section class="rounded-category vagitable-category  section-mt-space">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-6 no-arrow ">
                        <?php
                        foreach ($dataProduct_categories as $listProduct) {
                        ?>
                        <div>
                            <div class="category-contain">
                                <a href="#">
                                    <div class="img-wrapper">
                                        <img src="http://api.padimall.id/<?= $listProduct['image'] ?>" class="img-fluid"
                                            alt="product">
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

    <!--title start-->
    <div class="title4 section-my-space">
        <h4>Mari <span>Belanja</span></h4>
    </div>
    <!--title end-->

    <!--product box start -->
    <section class=" ratio_asos product  section-big-pb-space">
        <div class="custom-container  addtocart_count ">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 no-arrow">
                        <?php
                        foreach ($dataProduct as $row) {
                            //cek apakah image ada atau tidak
                            if ($row['image'] == NULL) {
                                $imagePoduct = "product/image.jpg";
                            } else {
                                $imagePoduct = $row['image'][0];
                            }
                        ?>
                        <div>
                            <div class="product-box">
                                <div class="product-imgbox">
                                    <div class="product-front">
                                        <img src="http://api.padimall.id/<?= $imagePoduct ?>" class="img-fluid  "
                                            alt="product">
                                    </div>
                                    <div class="product-icon icon-center">
                                        <div>
                                            <a href="#" data-toggle="modal" data-target="#quick-view"
                                                title="Quick View">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detail detail-inline detail-inverse">
                                    <div class="detail-title">
                                        <div class="detail-left">
                                            <a href="produk-detail">
                                                <h3 class="product-title-modified">
                                                    <?= $row['name'] ?>
                                                </h3>
                                            </a>
                                            <a href="toko-detail">
                                                <h6 class="price-title text-left">
                                                    Nama Toko
                                                </h6>
                                            </a>
                                        </div>
                                        <div class="detail-right">
                                            <!-- <div class="check-price">
                                                <?= $row['price'] ?>
                                            </div> -->
                                            <div class="price">
                                                <div class="price">
                                                    Rp. <?= $row['price'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product box end-->

    <!--contact banner start-->
    <section class="contact-banner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="contact-banner-contain">
                        <div class="contact-banner-img"><img src="assets/images/layout-1/call-img.png" class="img-fluid"
                                alt="call-banner"></div>
                        <div>
                            <h3>Jika kamu memiliki pertanyaan, silahkan hubungi kami di</h3>
                        </div>
                        <div>
                            <h2>123-456-7890</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact banner end-->


    <!--footer start-->
    <?php include 'template/footer.php' ?>
    <!--footer end-->


    <!-- tap to top -->
    <div class="tap-top bg-white">
        <div>
            <img src="assets/images/icon/tap-top.png" class="img-fluid" alt="tap top" />
        </div>
    </div>
    <!-- tap to top End -->

    <!-- Add to cart bar -->
    <div id="cart_side" class=" add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>Keranjang Saya</h3>
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
                                <img alt="" class="mr-3" src="assets/images/layout-6/product/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Nama Produk</h4>
                                </a>
                                <h4>
                                    <span>Rp. 0.000.000</span>
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
                                <img alt="" class="mr-3" src="assets/images/layout-6/product/5.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Nama Produk</h4>
                                </a>
                                <h4>
                                    <span>Rp. 0.000.000</span>
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
                            <a href="#"><img alt="" class="mr-3" src="assets/images/layout-6/product/1.jpg"></a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Nama Produk</h4>
                                </a>
                                <h4>
                                    <span>Rp. 0.000.000</span>
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
                            <h5>Jumlah Total : <span>Rp. 0.000.000</span></h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="keranjang" class="btn btn-normal btn-xs view-cart">Lihat Keranjang</a>
                            <a href="checkout" class="btn btn-normal btn-xs checkout">Checkout</a>
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
                            <div class="quick-view-img"><img src="assets/images/layout-6/product/a6.jpg" alt="quick"
                                    class="img-fluid "></div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>Nama Product</h2>
                                <h3>Rp. 0.000.000</h3>
                                <div class="border-product">
                                    <h6 class="product-title">Deskripsi Produk</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium. Sed ut perspiciatis, unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium. Sed ut perspiciatis, unde omnis
                                        iste natus error sit voluptatem accusantium doloremque laudantium</p>
                                </div>
                                <div class="border-product">
                                    <h6 class="product-title">Stok Produk</h6>
                                    <p>1800 Kg Tersedia</p>
                                </div>
                                <div class="product-buttons">
                                    <a href="#" class="btn btn-normal">Tambah Keranjang</a>
                                    <a href="#" class="btn btn-normal">Lihat Detail</a>
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
                <h3>Akun Saya</h3>
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
                    <input type="password" class="form-control" id="review" placeholder="Masukkan password" required="">
                </div>
                <div class="form-group">
                    <a href="#" class="btn btn-rounded btn-block ">Masuk</a>
                </div>
                <div>
                    <h5 class="forget-class">
                        <a href="#" class="d-block">Lupa Password</a>
                    </h5>
                    <h6 class="forget-class">
                        <a href="register" class="d-block">Belum punya akun ? <b>Daftar Sekarang</b>
                        </a>
                    </h6>
                </div>
            </form>
        </div>
    </div> <!-- Add to account bar end-->

    <!-- script js-->
    <?php include 'template/script.php' ?>
    <!-- script js-->

</body>

</html>