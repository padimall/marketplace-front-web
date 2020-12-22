<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');
searchProduct();

//check session
if (isset($_SESSION['bearerKey'])) {
    if (isset($_SESSION['login-status-expired'])) {
        $dateExpired = $_SESSION['login-status-expired'];
        $dateNow = date("Y-m-d h:i:s");

        if ($dateNow > $dateExpired) {
            unset($_SESSION['bearerKey']);
            unset($_SESSION['login-status-expired']);
            header("Location: signup");
            exit();
        }
    }
} else {
    unset($_SESSION['bearerKey']);
    unset($_SESSION['login-status-expired']);
    header("Location: signup");
    exit();
}

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
    <?php include('template/header.php') ?>
    <!--header end-->

    <!-- section start -->
    <section class="section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <?php include('components/account_menu.php') ?>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="theme-tab">
                                        <ul class="tabs tab-title">
                                            <li class="current"><a href="tab-1" class="">Semua
                                                    Pemesanan</a></li>
                                            <li class=""><a href="tab-2">Belum Dibayar</a></li>
                                            <li class=""><a href="tab-3">Dikemas</a></li>
                                            <li class=""><a href="tab-4">Dikirim</a></li>
                                            <li class=""><a href="tab-5">Pesanan Selesai</a></li>
                                            <li class=""><a href="tab-6">Pesanan Dibatalkan</a></li>
                                        </ul>
                                        <hr>
                                        <div class="tab-content-cls product">
                                            <?php
                                            //sekali request untuk efisiensi 
                                            $getInvoicesListOrder = Requests::post($api_endpoint . "invoice/list", $header);
                                            ?>
                                            <div id="tab-1" class="tab-content active default">
                                                <?php include("components/history-order-components/all-order.php") ?>
                                            </div>
                                            <div id="tab-2" class="tab-content">
                                                <?php include("components/history-order-components/waiting-payment.php") ?>
                                            </div>
                                            <div id="tab-3" class="tab-content">
                                                <?php include("components/history-order-components/packaging.php") ?>
                                            </div>
                                            <div id="tab-4" class="tab-content">
                                                <?php include("components/history-order-components/on-deliver.php") ?>
                                            </div>
                                            <div id="tab-5" class="tab-content">
                                                <?php include("components/history-order-components/received.php") ?>
                                            </div>
                                            <div id="tab-6" class="tab-content">
                                                <?php include("components/history-order-components/canceled-order.php") ?>
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
    <!-- section end -->

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