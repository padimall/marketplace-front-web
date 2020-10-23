<?php

$category_list_api = Requests::post($api_endpoint . "main-category/all/", $header);
$category_list_api_status = $category_list_api->success;
$category_list_api_data = json_decode($category_list_api->body, TRUE);
$category_list_api_data = $category_list_api_data['data'];
// var_dump($category_list_api_data);   
?>
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-5 col-md-7 col-sm-6">
                    <div class="top-header-left">
                        <div class="app-link">
                            <h6>
                                Download App
                            </h6>
                            <ul>
                                <li><a><i class="fa fa-apple"></i></a></li>
                                <li><a><i class="fa fa-android"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-5 col-sm-6">
                    <div class="top-header-right">
                        <div class="top-menu-block">
                            <!-- <ul>
                                <li><a href="#">gift cards</a></li>
                                <li><a href="#">Notifications</a></li>
                                <li><a href="#">help & contact</a></li>
                                <li><a href="#">todays deal</a></li>
                                <li><a href="#">track order</a></li>
                                <li><a href="#">shipping </a></li>
                                <li><a href="#">easy returns</a></li>
                            </ul> -->
                        </div>
                        <!-- <div class="language-block">
                            <div class="language-dropdown">
                                <span class="language-dropdown-click">
                                    English <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                                <ul class="language-dropdown-open">
                                    <li><a href="#">Indonesia</a></li>
                            </div>
                            <div class="curroncy-dropdown">
                                <span class="curroncy-dropdown-click">
                                    IDR<i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                                <ul class="curroncy-dropdown-open">
                                    <li><a href="#"><i class="fa fa-idr"></i>IDR</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-header4">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="contact-block">
                        <div class="sm-nav-block">
                            <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                            <ul class="nav-slide">
                                <li>
                                    <div class="nav-sm-back">
                                        Kembali <i class="fa fa-angle-right pl-2"></i>
                                    </div>
                                </li>
                                <?php
                                foreach ($category_list_api_data as $listProduct) {
                                ?>
                                <li>
                                    <a
                                        href="sub-category?name=<?= $listProduct['name'] ?>&target=<?= $listProduct['id'] ?>">
                                        <?= $listProduct['name'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="desc-nav-block">
                            <i class="fa fa-volume-control-phone tell" aria-hidden="true"></i>
                            <span class="contact-item">
                                call us
                                <span>+62 822 7466 0962</span>
                            </span>
                            <div class="onhover-dropdown ">
                                <?php
                                $linkSign = "signin";
                                if (isset($_SESSION['bearerKey'])) {
                                    if (isset($_SESSION['login-status-expired'])) {
                                        $dateExpired = $_SESSION['login-status-expired'];
                                        $dateNow = date("Y-m-d h:i:s");

                                        if ($dateNow > $dateExpired) {
                                            $linkSign = "signin";
                                        } else {
                                            $linkSign = "profile";
                                        }
                                    }
                                } else {
                                    $linkSign = "signin";
                                }
                                ?>
                                <a href="<?= $linkSign ?>">
                                    <i class="icon-user mobile-user ">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="logo-block">
                        <a href="./">
                            <img src="./assets/images/padimall_logo.png" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="icon-block">
                        <ul>
                            <li class="mobile-user onhover-dropdown">
                                <a href="<?= $linkSign ?>"><i class="icon-user"></i>
                                </a>

                            </li>
                            <li class="mobile-search">
                                <a href="#">
                                    <i class="icon-search"></i>
                                </a>
                                <div class="search-overlay">
                                    <div>
                                        <span class="close-mobile-search">×</span>
                                        <div class="overlay-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <form method="GET">
                                                            <div class="form-group">
                                                                <input type="text" name="search-product"
                                                                    class="form-control" id="exampleInputPassword1"
                                                                    placeholder="Cari produk disini">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fa fa-search"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mobile-cart cart-hover-div">
                                <a href="#">
                                    <i class="icon-shopping-cart "></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category-header-4">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="navbar-menu">
                        <div class="category-left">
                            <div class=" nav-block">
                                <div class="nav-left">
                                    <nav class="navbar" data-toggle="collapse"
                                        data-target="#navbarToggleExternalContent">
                                        <button class="navbar-toggler" type="button">
                                            <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                        </button>
                                        <h5 class="mb-0  text-white title-font">Berdasarkan Kategori</h5>
                                    </nav>
                                    <div class="collapse nav-desk" id="navbarToggleExternalContent">
                                        <ul class="nav-cat title-font">
                                            <?php
                                            foreach ($category_list_api_data as $listProduct) {
                                            ?>
                                            <li>
                                                <a
                                                    href="sub-category?name=<?= $listProduct['name'] ?>&target=<?= $listProduct['id'] ?>">
                                                    <?= $listProduct['name'] ?>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-block">
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Kembali<i class="fa fa-angle-right pl-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        <!--Beranda-->
                                        <li>
                                            <a href="./" class="light-menu-item">Beranda</a>
                                        </li>
                                        <!--Beranda END-->

                                        <!--Tentang-->
                                        <li>
                                            <a href="about" class="light-menu-item">Tentang Padi Mall</a>
                                        </li>
                                        <!--Tentang END-->
                                        <!--Contact start-->
                                        <li class="mega">
                                            <a href="contact" class="light-menu-item">
                                                Hubungi Kami
                                            </a>
                                        </li>
                                        <!--Contact end-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="category-right">
                            <div class="input-block">
                                <form class="big-deal-form" method="GET">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="search"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Cari produk disini"
                                            name="search-product">
                                    </div>
                                </form>
                            </div>
                            <div class="sm-nav-block">
                                <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>