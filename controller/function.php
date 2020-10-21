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