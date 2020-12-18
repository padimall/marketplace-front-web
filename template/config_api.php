<?php
date_default_timezone_set("Asia/Bangkok");
include('./vendor/rmccue/requests/library/Requests.php');
include('./controller/General.php');
error_reporting(1);
session_start();

require 'vendor/autoload.php';

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Client;

Requests::register_autoloader();

//$api_endpoint = "https://api.padimall.id/api/v1/";
$api_endpoint = "https://dev-api.padimall.id/api/v1/";
$api_image = "https://api.padimall.id/";

if (isset($_SESSION['bearerKey'])) {
    $bearerKey = $_SESSION['bearerKey'];
} else {
    $bearerKey = "";
}

$header = array(
    "Content-Type" => "application/json",
    "X-Requested-With" => " XMLHttpRequest",
    "Authorization" => " Bearer $bearerKey"
);

$headers_guzzle = [
    'Authorization' => 'Bearer ' . $bearerKey
];

$client = new \GuzzleHttp\Client([
    'base_uri' => $api_endpoint,
    'defaults' => [
        'exceptions' => false
    ]
]);

global $client;