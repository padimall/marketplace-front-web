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
    <!--header end-->

    <!-- about section start -->
    <section class="about-page section-big-py-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-section">
                        <img src="https://padimall.id/old/img/ainun.png" class="img-fluid w-auto" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <h4>CEO Padi Mall
                    </h4>
                    <p class="mb-2"> Sed ut perspiciatis unde omnis iste natus <b>error sit</b> voluptatem accusantium
                        doloremque laudantium,</p>
                    <p class="mb-2"> On the other hand, we denounce with righteous indignation and dislike men who are
                        so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that
                        they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to
                        those who fail in their duty through weakness of will, which is the same as saying through
                        shrinking from toil and pain.</p>
                    <p class="mb-2"> These <b>cases</b> are perfectly simple and easy to distinguish. In a free hour,
                        when our power of choice is untrammelled and when nothing prevents our</p>
                    <p> being able to do what we like best, every pleasure is to be <b>welcomed</b> and every pain
                        avoided. But in certain circumstances and owing to the claims of duty or the obligations of
                        business it will frequently occur that pleasures have to be repudiated and annoyances accepted.
                        The wise man therefore always holds in these matters to this principle of selection: he rejects
                        pleasures to secure other greater pleasures, or else he endures pains to avoid <b>worse</b>
                        pains.</p>
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