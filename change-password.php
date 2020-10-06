<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php');

if (isset($_POST['btn-change-password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_password_confirm'];

    if ($new_password_confirm == $new_password_confirm) {
        $inputan = "password=" . $new_password . "&old_password=" . $old_password;
        $change_password_api = Requests::post($api_endpoint . "user/change-password?" . $inputan, $header);

        $change_password_api_response = json_decode($change_password_api->body, TRUE);
        $change_password_api_status = $change_password_api_response['status'];

        if ($change_password_api_status == 1) {
            //jika berhasil diubah
            $_SESSION['changePasswordMessage'] = '<span class="float-right badge badge-success p-1 mt-1">Berhasil memperbaharui kata sandi</span>';
            header("Location: change-password?success");
            exit();
        } else {
            //gagal diubah
            $_SESSION['changePasswordMessage'] = '<span class="float-right badge badge-danger p-1 mt-1">Kata sandi lama anda tidak sesuai</span>';
            header("Location: change-password?failed");
            exit();
        }
    } else {
        // password dan password confirm tidak sama
        $_SESSION['changePasswordMessage'] = '<span class="float-right badge badge-danger p-1 mt-1">Periksa kembali inputan anda</span>';
        header("Location: change-password?failed");
        exit();
    }
}

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
                            <?php
                            if (isset($_SESSION['changePasswordMessage'])) {
                                echo $_SESSION['changePasswordMessage'];
                                unset($_SESSION['changePasswordMessage']);
                            }
                            ?>
                            <h3 class="mb-3">Ubah Kata Sandi</h3>

                            <form class="theme-form" method="POST">
                                <div class="form-row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kata Sandi Lama</label>
                                                <input type="password" name="old_password" class="form-control"
                                                    id="old_password" required="" onchange="check_pass()"
                                                    onkeypress="return AvoidSpace(event)">
                                                <small>Masukkan kata sandi PadiMall Anda, bukan kata sandi dari akun
                                                    aplikasi lain (Google / Facebook).
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Masukkan Kata Sandi Baru</label>
                                                <input type="password" name="new_password" onchange="check_pass()"
                                                    class="form-control" id="new_password" required=""
                                                    onkeypress="return AvoidSpace(event)">
                                                <small id="message" class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Ulangi Kata Sandi Baru</label>
                                                <input type="password" name="new_password_confirm" class="form-control"
                                                    id="new_password_confirm" required=""
                                                    onkeypress="return AvoidSpace(event)" onchange="check_pass()">
                                                <small id="message" class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button name="btn-change-password" id="btn-change-password"
                                            class="btn btn-rounded black-btn float-right">
                                            Ubah Kata Sandi
                                        </button>
                                    </div>
                                </div>
                            </form>
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

    <script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
    document.getElementById('btn-change-password').disabled = true;

    function check_pass() {

        if (document.getElementById('new_password').value == document.getElementById('new_password_confirm').value) {
            document.getElementById('btn-change-password').disabled = false;
            document.getElementById('message').innerHTML = "";
        } else {
            document.getElementById('btn-change-password').disabled = true;
            document.getElementById('message').innerHTML = "Kata sandi anda belum sesuai, silahkan periksa kembali";
        }
    }
    </script>
    <!-- tap to top End -->
    <?php include('template/script.php') ?>

</body>

</html>