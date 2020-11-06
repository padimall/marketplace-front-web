<?php

//register agent
if (isset($_POST['btn-register-agent'])) {
    $name = htmlentities($_POST['name']);
    $phone = htmlentities($_POST['phone']);

    $register_agent = Requests::post($api_endpoint . "agent/store?name=" . $name . "&phone=" . $phone, $header);
    // $register_agent_status = $register_agent->success;
    $register_agent_data = json_decode($register_agent->body, TRUE);
}

if (isset($_POST['btn-register-supplier'])) {
    $name = htmlentities($_POST['name']);
    $phone = htmlentities($_POST['phone']);
    $nib = htmlentities($_POST['nib']);
    $alamat = htmlentities($_POST['alamat']);
    $kode_agen = htmlentities(($_POST['kode_agen']));

    $register_supplier = Requests::post($api_endpoint . "supplier/store?name=" . $name . "&phone=" . $phone . "&nib=" . $nib . "&agent_code=" . $kode_agen . "&address=" . $alamat, $header);
    // $register_agent_status = $register_agent->success;
    $register_supplier_data = json_decode($register_supplier->body, TRUE);
}

if (isset($_POST['btn-update-agent-profile'])) {
    $name = htmlentities($_POST['name']);
    $phone = htmlentities($_POST['phone']);

    $name_verif = htmlentities($_POST['name_verif']);
    $phone_verif = htmlentities($_POST['phone_verif']);

    if ($name === $name_verif && $phone === $phone_verif) {
        message_badge_success("Tidak ada data yang diperbaharui");
    } elseif ($name != $name_verif && $phone === $phone_verif) {
        //ganti nama
        $end_point = "agent/update?name=" . $name;
    } elseif ($name === $name_verif && $phone != $phone_verif) {
        //ganti no hp
        $end_point = "agent/update?phone=" . $phone;
    } else {
        //ganti nama dan no hp
        $end_point = "agent/update?name=" . $name . "&phone=" . $phone;
    }

    if (isset($end_point)) {
        $update_agent_profile = Requests::post($api_endpoint . $end_point, $header);
        $update_agent_profile_status = $update_agent_profile->success;
        $update_agent_profile_data = json_decode($update_agent_profile->body, TRUE);

        if ($update_agent_profile_status) {
            if ($update_agent_profile_data['status'] == 1) {
                //berhasil mengupdate profile agen
                message_badge_success("Berhasil memperbaharui data");
            } else {
                //gagal mengupdate
                message_badge_failed("Gagal memperbaharui data");
            }
        } else {
            //gagal mengupdate
            message_badge_failed("Gagal memperbaharui data");
        }
    }
}

if (isset($_GET['action']) == "delete") {
    $productID = htmlentities($_GET['target']);

    $product_delete = Requests::post($api_endpoint . "product/delete?target_id=" . $productID, $header);
    $product_delete = json_decode($product_delete->body, TRUE);

    if ($product_delete['status'] == 1) {
        //berhasil menghapus
        message_badge_success("Berhasil menghapus produk");
        if (isset($_GET['supplier'])) {
            header("Location: my-store?product");
        } else {
            header("Location: my-store?agent-product");
        }
        exit();
    } else {
        //gagal menghapus
        message_badge_failed("Gagal menghapus produk");
        if (isset($_GET['supplier'])) {
            header("Location: my-store?product");
        } else {
            header("Location: my-store?agent-product");
        }
        exit();
    }
}