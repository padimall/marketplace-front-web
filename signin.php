<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php');
session_start();

//jika button signin di tekan
if (isset($_POST['btn-login'])) {

    $data = array('email' => $_POST['email'], 'password' => $_POST['password'], 'device_id' => "web", 'remember_me' => true);

    $signin_api = Requests::post($api_endpoint . "login", $header, json_encode($data));
    $signin_status = $signin_api->success;
    $signin_api_data = json_decode($signin_api->body, TRUE);

    //jika berhasil masuk
    if ($signin_status == true) {
        exit();
    } else {
        $_SESSION['signinMessage'] = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-color: #f15937">
                    <span class="text-secondary">Maaf, data pengguna tidak ditemukan</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="color: #523838">&times;</span>
                    </button>
                </div>';
        header("Location: signin");
        exit();
    }
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

    <!--section start-->
    <section class="login-page section-big-py-space bg-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                    <div class="theme-card rounded">
                        <h3 class="text-center">Masuk</h3>
                        <?php
                        if (isset($_SESSION['signinMessage'])) {
                            echo $_SESSION['signinMessage'];
                            unset($_SESSION['signinMessage']);
                        }
                        ?>
                        <form class="theme-form" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label for="review">Kata Sandi</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan kata sandi" required="">
                            </div>
                            <button name="btn-login" class="btn btn-normal">Masuk</button>
                            <a class="float-right txt-default mt-2" href="#">Lupa Kata Sandi</a>
                        </form>
                        <!-- <p class="mt-3">Sign up for a free account at our store. Registration is quick and easy. It
                            allows you to be able to order from our shop. To start shopping click register.</p> -->
                        <div class="mt-2">
                            Belum punya akun? <a href="signup" class="txt-default pt-3">Buat Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

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