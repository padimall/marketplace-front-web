<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php');
session_start();
//jika button signup di tekan
if (isset($_POST['btn-signup'])) {
    if (isset($_POST['name']) && isset($_POST['nohp']) && isset($_POST['alamat']) && isset($_POST['email']) && isset($_POST['email']) && isset($_POST['katasandi']) && isset($_POST['katasandi_konfirmasi'])) {
        $inputan = "name=" . $_POST['name'] . "&address=" . $_POST['alamat'] . "&phone=" . $_POST['nohp'] . "&email=" . $_POST['email'] . "&password=" . $_POST['katasandi'] . "&password_confirmation=" . $_POST['katasandi_konfirmasi'];

        $signup_api = Requests::post($api_endpoint . "signup?" . $inputan, $header);
        $signup_status = $signup_api->success;
        $signup_api_data = json_decode($signup_api->body, TRUE);
        if ($signup_status) {
            $_SESSION['signupMessage'] = '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="text-secondary">Berhasil mendaftar, silahkan masuk untuk melanjutkan</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            header("Location: signup?success");
            exit();
        } else {
            $signup_api_data_error = $signup_api_data['errors'];
            //hitung jumlah error message dari API
            $countError = count($signup_api_data_error);
            if ($countError == 2) {
                $emailError = $signup_api_data_error['email'][0];
                $phoneError =  $signup_api_data_error['phone'][0];
                $_SESSION['signupMessage'] = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-color: #f15937">
                    <span class="text-secondary">Maaf, email dan no hp sudah digunakan.</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="color: #523838">&times;</span>
                    </button>
                </div>';
                header("Location: signup");
                exit();
            } elseif ($countError == 1) {
                if (isset($signup_api_data_error['email'][0])) {

                    $_SESSION['signupMessage'] = '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-color: #f15937">
                        <span class="text-secondary">Maaf, email sudah pernah digunakan. Silahkan gunakan email yang berbeda</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: #523838">&times;</span>
                        </button>
                        </div>';
                    header("Location: signup");
                    exit();
                    //echo "emailnya sudah dipake";
                }
                if (isset($signup_api_data_error['phone'][0])) {
                    $_SESSION['signupMessage'] = '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="border-color: #f15937">
                        <span class="text-secondary">Maaf, no hp sudah digunakan. Mohon gunakan nomor lainnya</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: #523838">&times;</span>
                        </button>
                    </div>';
                    header("Location: signup");
                    exit();
                    //echo "phone number sudah dipake";
                }
            }
            // var_dump($signup_api_data_error);
        }
    } else {
        //warning bahwa inputannya belum lengkap
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
                        if (isset($_SESSION['signupMessage'])) {
                            echo $_SESSION['signupMessage'];
                            unset($_SESSION['signupMessage']);
                        }
                        ?>
                        <form class="theme-form" method="POST" action="">
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nama Lengkap" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="nohp">No Handphone</label>
                                    <input type="number" class="form-control" id="nohp" name="nohp"
                                        placeholder="No Handphone" min="0" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat Lengkap" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control" id="password" name="katasandi"
                                        placeholder="Kata Sandi" required="" onchange="check_pass()">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="katasandi_konfirmasi" placeholder="Konfirmasi Kata Sandi" required=""
                                        onchange="check_pass()">
                                    <small id="message" class="text-danger"></small>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button name="btn-signup" class="btn btn-normal btn-block rounded" id="btnSign">Buat
                                        Akun</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 ">
                                    <p>Sudah punya akun? <a href="signin" class="txt-default">Klik</a> disini
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
    </script>
    <?php include('template/script.php') ?>

</body>

</html>