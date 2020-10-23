<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');
searchProduct();

$profile_api = Requests::post($api_endpoint . "user", $header);
$profile_api_status = $profile_api->success;
$profile_api_data = json_decode($profile_api->body, TRUE);

if ($profile_api_status) {
    $profile_api_data_name = $profile_api_data['name'];
    $profile_api_data_email = $profile_api_data['email'];
    $profile_api_data_address = $profile_api_data['address'];
    $profile_api_data_phone = $profile_api_data['phone'];
}

if (isset($_POST['btn-profile'])) {

    if ($_POST['email'] == $profile_api_data_email && $_POST['phone'] == $profile_api_data_phone) {
        //email dan phone tidak diubah
        $inputan = "name=" . $_POST['name'] . "&address=" . $_POST['address'];
    } elseif ($_POST['email'] == $profile_api_data_email && $_POST['phone'] != $profile_api_data_phone) {
        //phone diubah, email tidak
        $inputan = "name=" . $_POST['name'] . "&address=" . $_POST['address'] . "&phone=" . $_POST['phone'];
    } elseif ($_POST['email'] != $profile_api_data_email && $_POST['phone'] == $profile_api_data_phone) {
        //email diubah, phone tidak
        $inputan = "name=" . $_POST['name'] . "&address=" . $_POST['address'] . "&email=" . $_POST['email'];
    } else {
        // email dan phone diubah
        $inputan = "name=" . $_POST['name'] . "&address=" . $_POST['address'] . "&phone=" . $_POST['phone'] . "&email=" . $_POST['email'];
    }

    $profile_update_api = Requests::post($api_endpoint . "user/update?" . $inputan, $header);
    $profile_update_status = $profile_update_api->success;
    $profile_update_api_data = json_decode($profile_update_api->body, TRUE);
    if ($profile_update_status) {
        //berhasil mengubah data
        $_SESSION['profileMessage'] = '<span class="float-right badge badge-success p-1 mt-1">Berhasil memperbaharui data</span>';
        header("Location: profile?success");
        exit();
    } else {
        $_SESSION['profileMessage'] = '<span class="float-right badge badge-danger p-1 mt-1">Gagal memperbaharui data</span>';
        header("Location: profile?failed");
        exit();
    }
}

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
                            <?php
                            if (isset($_SESSION['profileMessage'])) {
                                echo $_SESSION['profileMessage'];
                                unset($_SESSION['profileMessage']);
                            }
                            ?>
                            <h3 class="mb-3">Informasi Akun</h3>
                            <hr>

                            <form class="theme-form" method="POST">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Nama" required="" value="<?= $profile_api_data_name ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">No. Handphone</label>
                                            <input type="number" min="0" name="phone" class="form-control" id="phone"
                                                placeholder="No. Handphone" required=""
                                                value="<?= $profile_api_data_phone ?>"
                                                onkeypress="return AvoidSpace(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    placeholder="Email" required=""
                                                    value="<?= $profile_api_data_email ?>"
                                                    onkeypress="return AvoidSpace(event)">
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
                                        <button name="btn-profile" class="btn btn-rounded black-btn float-right">
                                            Perbaharui Data
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
    </script>
    <!-- tap to top End -->
    <?php include('template/script.php') ?>

</body>

</html>