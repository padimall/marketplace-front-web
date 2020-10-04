<!DOCTYPE html>
<html lang="en">

<?php include('template/head.php');
if (isset($_POST['btn-profile'])) {
}

$profile_api = Requests::post($api_endpoint . "user", $header);
$profile_api_status = $profile_api->success;
$profile_api_data = json_decode($profile_api->body, TRUE);

if ($profile_api_status) {
    $profile_api_data_name = $profile_api_data['name'];
    $profile_api_data_email = $profile_api_data['email'];
    $profile_api_data_address = $profile_api_data['address'];
    $profile_api_data_phone = $profile_api_data['phone'];
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
                            <h3 class="mb-3">Informasi Akun</h3>
                            <form class="theme-form" method="POST">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="name"
                                                placeholder="Nama" required="" value="<?= $profile_api_data_name ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">No. Handphone</label>
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                placeholder="No. Handphone" required=""
                                                value="<?= $profile_api_data_phone ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    placeholder="Email" required=""
                                                    value="<?= $profile_api_data_email ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Alamat Lengkap</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="Alamat lengkap" required=""
                                                value="<?= $profile_api_data_address ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button name="btn-profile"
                                            class="btn btn-rounded black-btn float-right">Perbaharui Data</button>
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
    </script>
    <!-- tap to top End -->
    <?php include('template/script.php') ?>

</body>

</html>