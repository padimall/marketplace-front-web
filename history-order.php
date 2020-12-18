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
                                            <div id="tab-1" class="tab-content active default">
                                                <?php
                                                $getInvoicesList = Requests::post($api_endpoint . "invoice/list", $header);
                                                if ($getInvoicesList->success) {
                                                    $getInvoicesList = json_decode($getInvoicesList->body, TRUE);
                                                    $getInvoicesList = $getInvoicesList['invoice_groups'];
                                                    foreach ($getInvoicesList as $inv) {
                                                ?>
                                                <div class="col-md-12 mt-3">
                                                    <div class="card rounded">
                                                        <div class="card-header">
                                                            <span
                                                                class="float-left badge badge-secondary p-1 ">INV-<?= limit_string_inv(strtoupper($inv['id']), 13) ?></span>
                                                            <span class="float-right"><?= $inv['created_at'] ?></span>
                                                        </div>

                                                        <?php
                                                                foreach ($inv['invoices'] as $inv_stuff) {
                                                                ?>
                                                        <div class="card-body">
                                                            <h5 class="mb-2 text-theme-orange">
                                                                <?= $inv_stuff['agent_name'] ?>
                                                            </h5>
                                                            <?php
                                                                        foreach ($inv_stuff['products'] as $inv_stuff_products) {
                                                                        ?>
                                                            <div class="row ratio_square">
                                                                <div class="rounded ml-3">
                                                                    <img src="<?= $inv_stuff_products['image'] ?>"
                                                                        alt="<?= $inv_stuff_products['name'] ?>"
                                                                        class="img-thumbnail-invoices">
                                                                </div>
                                                                <div class="ml-2">
                                                                    <h4> <?= $inv_stuff_products['name'] ?>
                                                                    </h4>
                                                                    <p>Jumlah :
                                                                        <?= string_number($inv_stuff_products['quantity']) ?>
                                                                    </p>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                        }
                                                                        ?>
                                                        </div>
                                                        <?php
                                                                }
                                                                ?>
                                                        <div class="card-body mt--5">
                                                            <h4 class="text-secondary float-left">Total
                                                                Pesanan :
                                                                <span
                                                                    class="text-success font-weight-bolder"><?= rupiah($inv['amount']) ?></span>
                                                            </h4>
                                                            <?php
                                                                    if ($inv['status'] === 0) {
                                                                        echo 23;
                                                                    }

                                                                    ?>
                                                            <a href="#"
                                                                class="btn btn-theme-orange btn-sm float-right">Bayar
                                                                Sekarang</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div id="tab-2" class="tab-content">
                                                <h5 class="text-center">- coming soon -</h5>
                                            </div>
                                            <div id="tab-3" class="tab-content">
                                                <h5 class="text-center">- coming soon -</h5>
                                            </div>
                                            <div id="tab-4" class="tab-content">
                                                <h5 class="text-center">- coming soon -</h5>
                                            </div>
                                            <div id="tab-5" class="tab-content">
                                                <h5 class="text-center">- coming soon -</h5>
                                            </div>
                                            <div id="tab-6" class="tab-content">
                                                <h5 class="text-center">- coming soon -</h5>
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