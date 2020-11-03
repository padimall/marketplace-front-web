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

    <style>
    .li-about {
        display: list-item;
        text-align: justify;
        font-size: calc(14px + (16 - 14) * ((100vw - 320px) / (1920 - 320)));
    }
    </style>
    <!--header end-->

    <!-- about section start -->
    <section class="about-page section-big-py-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-section">
                        <img src="https://padimall.id/old/img/ainun.png" class="img-fluid w-auto" alt="">
                        <h3 class="text-center mt-3">Hajah Nurainun Syahril</h3>
                        <p class="text-center mt-2 mb-5">CEO of PADIMALL</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h4>CEO PADI MALL
                    </h4>
                    <p class="mb-2 text-justify"> Padimall adalah platform pemasaran (marketplace) yang menjembatani dan
                        membimbing
                        pelaku usaha kecil dan menengah dalam merintis, menjalankan dan memasarkan produk-produk hasil
                        produksi UMKM baik secara lokal maupun international.</p>
                    <p class="mb-2 text-justify"> Padimall juga beroperasi dengan platform online store, marketplace
                        berbasis
                        Website dan Aplikasi Mobile. Sebagai market place bagi produk UKM dan komoditi eksport,
                        beroperasi di berbagai jaringan dan wilayah Indonesia dengan kemitraan 550 kota dan kabupaten
                        serta memasarkan 1 juta produk UKM. Menjadi Mitra BumDes/Industri rumahan (Home Industry)/
                        Pesantren di desa dan kecamatan. Menyediakan layanan pengiriman berdasarkan kesiapan produsen
                        dalam jangka waktu 3-7 hari waktu eksor.</p>

                    <h4>Visi</h4>
                    <p class="mb-2 text-justify"> Meningkatkan perekonomian Negara secara digital baik lokal maupun
                        international melalui industri Usaha Kecil dan Menengah (UKM).</p>

                    <h4>Misi</h4>
                    <ol style="list-style-type:decimal;padding-left:10px">
                        <li class="li-about">Meningkatkan industri usaha kecil dan menengah secara lokal dan
                            international dengan
                            memasarkan produk- produk unggulan secara digital.</li>
                        <li class="li-about">Meningkatkan kualitas produk dengan kreativitas dan inovasi dalam
                            menciptakan produk baru
                            yang berpotensi dan berdaya saing di pasar international.</li>
                        <li class="li-about">Meningkatkan evolusi teknologi "supply chain" dengan negara-negara yang
                            berpotensi sebagai
                            tujuan ekspor.</li>
                        <li class="li-about">Menjadi Hub Ekspor produk unggulan.</li>
                        <li class="li-about">Membangun Network Komunitas ekspor.</li>
                        <li class="li-about">Menjadi pusat kewirausahaan sosial (Social Enterpreneur).</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

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