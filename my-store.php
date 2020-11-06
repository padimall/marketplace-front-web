<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');

//semua aksi ada disini
include('controller/MyStore.php');
searchProduct();
//check session
checkSessionValid();
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
                            <?php message_check() ?>
                            <div id="message_js"></div>
                            <h3 class="mb-3">Toko Saya</h3>
                            <hr>
                            <?php
                            if (!checkAgentOrSupplier($api_endpoint . "agent/detail", $header) && !checkAgentOrSupplier($api_endpoint . "supplier/detail", $header)) {
                                //bukan agent & bukan supplier

                                if (isset($_GET['register-supplier'])) {
                                    //daftar supplier
                                    include("components/my-store/supplier/register.php");
                                } elseif (isset($_GET['register-agent'])) {
                                    //daftar agent
                                    include("components/my-store/agent/register.php");
                                } else {
                                    echo '
                                    <div class="text-center">
                                        <img alt="" class="img-fluid" src="./assets/images/business.png" style="width:70%">
                                        <h3 class="pt-2 text-secondary" style="color: #353535">Ayo, mari bergabung dengan PadiMall</h3>
                                        <div class="pt-2">
                                            <a href="?register-supplier" class="btn btn-success">Jadi Supplier</a>
                                            <a href="?register-agent" class="btn btn-outline-info">Jadi Agent</a>
                                        </div>
                                    </div>';
                                }
                            } elseif (checkAgentOrSupplier($api_endpoint . "supplier/detail", $header)) {
                                //supplier
                                include("components/my-store/supplier/index.php");
                            } elseif (checkAgentOrSupplier($api_endpoint . "agent/detail", $header)) {
                                //agent
                                include("components/my-store/agent/index.php");
                            }
                            ?>
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

    <script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
    </script>

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