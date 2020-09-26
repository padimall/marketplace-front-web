<?php
include('../controller/controller.php');
if (isset($_POST['btn-signup'])) {
    if (isset($_POST['name']) && isset($_POST['nohp']) && isset($_POST['alamat']) && isset($_POST['email']) && isset($_POST['email']) && isset($_POST['katasandi']) && isset($_POST['katasandi_konfirmasi'])) {
        //jika semua sudah ada
        $signUp = new Sign();
        $signProcess = $signUp->sign_up($_POST['name'], $_POST['alamat'], $_POST['nohp'], $_POST['email'], $_POST['katasandi'], $_POST['katasandi_konfirmasi']);
        var_dump($signProcess);
    } else {
        //check inputan apakah sudah masuk semua atau tidak
    }
} else {
    // echo BASE_URL;
}