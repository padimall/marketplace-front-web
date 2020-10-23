<?php

function encodeURL($url)
{
    return urlencode(base64_encode($url));
}

function decodeURL($url)
{
    return base64_decode(urldecode($url));
}

function message_success($message)
{
    $_SESSION['message'] = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="text-secondary">' . $message . '</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
    return $_SESSION['message'];
}

function message_failed($message)
{
    $_SESSION['message'] = '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #f8d7da !important; border-color: #f5c6cb !important ">
                        <span class="text-secondary">' . $message . '</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
    return $_SESSION['message'];
}

function message_check()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function rupiah($string)
{
    return "Rp " . number_format($string, 0, ',', '.');
}

function checkIfSupplier($api_endpoint, $header)
{
    $checkSupplier = Requests::post($api_endpoint, $header);
    $checkSupplier = json_decode($checkSupplier->body, TRUE);
    if ($checkSupplier['status'] == 1) {
        return true;
    } else {
        return false;
    }
}

function checkAgentOrSupplier($api_endpoint, $header)
{
    $check = Requests::post($api_endpoint, $header);
    $check = json_decode($check->body, TRUE);
    if ($check['status'] == 1) {
        return true;
    } else {
        return false;
    }
}

function checkSessionValid()
{
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
}

function searchProduct()
{
    if (isset($_GET['search-product'])) {
        header("Location: search-product?q=" . htmlentities($_GET['search-product']));
        exit();
    }
}