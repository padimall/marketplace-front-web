<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');

if (isset($_POST['btn-reset-password'])) {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $confirm_password = htmlentities($_POST['confirm_password']);
    $token = htmlentities($_GET['token']);

    if ($password === $confirm_password) {
        $end_point = "password/reset?token=" . $token . "&email=" . $email . "&password=" . $password . "&password_confirmation=" . $confirm_password;

        $reset_pwd = Requests::post($api_endpoint . $end_point, $header);
        $reset_pwd_status = $reset_pwd->success;
        $reset_pwd_data = json_decode($reset_pwd->body, TRUE);

        if ($reset_pwd_status) {
            message_success("Berhasil memperbaharui kata sandi anda");
            header("Location: signin");
            exit();
        } else {
            //gagal
        }
    } else {
        message_failed("Mohon periksa kembali inputan anda");
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
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">Buat Akun</h3>
                        <?php
                        message_check();
                        ?>
                        <form class="theme-form" method="POST" action="">
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required="" value="<?= $_GET['email'] ?>" onkeypress="return AvoidSpace(event)"
                                        readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Kata Sandi" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Konfirmasi Kata Sandi" required=""
                                        onchange="check_pass()">
                                    <small id="message" class="text-danger"></small>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button name="btn-reset-password" class="btn btn-normal btn-block rounded"
                                        id="btnSign">Perbaharui Sandi</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 ">
                                    <p>Sudah punya akun? Klik disini
                                        untuk&nbsp;<a href="signin" class="txt-default">Masuk</a></p>
                                </div>
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
    <!-- tap to top End -->
    <script>
    function check_pass() {
        if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
            document.getElementById('btnSign').disabled = false;
            document.getElementById('message').innerHTML = "";
        } else {
            document.getElementById('btnSign').disabled = true;
            document.getElementById('message').innerHTML = "Kata sandi anda belum sesuai, silahkan periksa kembali";
        }
    }

    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
    </script>
    <?php include('template/script.php') ?>

</body>

</html>