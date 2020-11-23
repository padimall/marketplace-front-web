<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');
searchProduct();
?>

<body class="bg-light ">

    <!-- loader start -->
    <!-- <div class="loader-wrapper">
        <div>
            <img src="./assets/images/loader.gif" alt="loader">
        </div>
    </div> -->
    <!-- loader end -->

    <!--header start-->
    <?php
    include('template/header.php');
    ?>

    <style>
    .li-about {
        display: list-item;
        text-align: justify;
        font-size: calc(14px + (16 - 14) * ((100vw - 320px) / (1920 - 320)));
    }
    </style>
    <!--header end-->

    <?php
    $statistic = Requests::post("https://api.padimall.id/api/total", $header);
    $statistic = json_decode($statistic->body, TRUE);
    $statistic = $statistic['total'];
    // var_dump($statistic);
    ?>

    <section class="about-page section-big-py-space">
        <div class="custom-container">
            <!-- <h2 class="text-center text-secondary">Statistik</h2> -->
            <h1 class="text-center text-success" style="color: #84B214 !important"> PT. Padimall INA</h1>

            <div class="row mt-4">

                <!-- produk -->
                <div class="col-md-3">
                    <div class="card" style="border-radius:15px;border: none">
                        <div class="card-body">
                            <h3 class="text-center text-success float-right count" id="shiva">
                                <?= $statistic['product'] ?>
                            </h3>
                            <h3 class="text-secondary">Total Produk</h3>
                        </div>
                    </div>
                </div>

                <!-- agen -->
                <div class="col-md-3">
                    <div class="card" style="border-radius:15px;border: none">
                        <div class="card-body">
                            <h3 class="text-center text-success float-right count" id="shiva">
                                <?= $statistic['agent'] ?>
                            </h3>
                            <h3 class="text-secondary text-warning">Total Agen</h3>
                        </div>
                    </div>
                </div>

                <!-- supplier -->
                <div class="col-md-3">
                    <div class="card" style="border-radius:15px;border: none">
                        <div class="card-body">
                            <h3 class="text-center text-success float-right count" id="shiva">
                                <?= $statistic['supplier'] ?>
                            </h3>
                            <h3 class="text-secondary text-info">Total Supplier</h3>
                        </div>
                    </div>
                </div>

                <!-- user -->
                <div class="col-md-3">
                    <div class="card" style="border-radius:15px;border: none">
                        <div class="card-body">
                            <h3 class="text-center text-success float-right count" id="shiva">
                                <?= $statistic['user'] ?>
                            </h3>
                            <h3 class="text-secondary text-primary">Total Pengguna</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- agent padimall -->
            <h3 class="text-left text-secondary mt-5">Pengguna Padimall yang tersebar diseluruh Dunia</h3>
            <div id="load_component"></div>
        </div>
    </section>

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

    <script>
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 17000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    </script>

    <script type="text/javascript">
    var auto_refresh = setInterval(
        function() {
            $('#load_component').load('statistik_component.php').fadeIn("slow");
        }, 1000); // refresh setiap 10000 milliseconds
    </script>
</body>

</html>