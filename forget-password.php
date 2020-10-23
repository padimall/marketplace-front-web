<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php');

//jika button signin di tekan
if (isset($_POST['btn-forget-pwd'])) {
    $email = htmlentities($_POST['email']);

    $forget_pwd = Requests::post($api_endpoint . "password/forgot?email=" . $email, $header);
    $forget_pwd_status = $forget_pwd->success;
    $forget_pwd_data = json_decode($forget_pwd->body, TRUE);
    if ($forget_pwd_status) {
        message_success("Silahkan cek email untuk langkah selanjutnya");
        header("Location: signin");
        exit();
    } else {
        message_failed("Maaf, email tidak terdaftar");
        header("Location: forget-password");
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
    <section class="login-page pwd-page section-big-py-space bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="theme-card">
                        <h3>Lupa Kata Sandi</h3>
                        <?php
                        message_check();
                        ?>
                        <form class="theme-form" method="POST">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control rounded" id="email"
                                            placeholder="Masukkan email anda" required="">
                                    </div>
                                </div>
                                <button name="btn-forget-pwd" class="btn btn-normal rounded">Submit</button>
                            </div>
                        </form>
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

    <script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
    </script>
    <!-- tap to top End -->
    <?php include('template/script.php') ?>

</body>

</html>