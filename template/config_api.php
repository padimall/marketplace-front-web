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

$api_endpoint = "https://api.padimall.id/api/v1/";
$api_image = "https://api.padimall.id/";

if (isset($_SESSION['bearerKey'])) {
    $bearerKey = $_SESSION['bearerKey'];
} else {
    $bearerKey = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MWRiNmI2ZC0xMzc3LTRjN2MtOWE2OS04MjJlNTIxNzQ5YWYiLCJqdGkiOiJmNzk2MDYwYWMyNDk4NzliMWZhMjQwNTQ4OGE5NDU4MDlmMTViNDVmYzJhOTZiMDRlMTBlODQ1MjlmNWM2Mjg3MjFkODE5ZjJmNmE3OGRkZiIsImlhdCI6MTYwMzcxOTU0MiwibmJmIjoxNjAzNzE5NTQyLCJleHAiOjE2MzUyNTU1NDIsInN1YiI6ImM2OGZkZTIwLTg0YTktNDk2Yy05NDQwLTdmZWU2ZWNjNjZmMSIsInNjb3BlcyI6WyJzeXN0ZW0tdG9rZW4iXX0.e_sTHxbOMxvKIVofWtJQsbzMpTGgBP2UiCjY8c-bHZYuXKNerpqsgYZibNBWkWDxTQa9UL4OnnUVJQ3-V54eoIbtNtfV0N06h3G6BpebBBqGgpD58ok7fQ5pmAache7jzKs4g4Yb1Dx24xlWedB--HeccRlRQEB_Ab7C70wv9WpJl-O9rkbSLDSBhnMbqpN3VW9odudfZsEkTml7C6a6TGVifJU_AXGGrCPjmIzuGjloXUhVAzjhVqrplSYWW0k0N8SLwFGf_0y7jIoPMjvTLoDpXAGYbZe0DcV5KxqSpY1b-Pj-joIvscj9xzHyybx6iuKJ0xaR7l3-wBXW3q-YKTqI-d9qy2cWAtnpuCuA4HmpTp-vjsB_ptxneU6sUI_z9VNMv8AsaJ6_vcerG8mR407Ft4QNgSZp7deGpxClNjMfxlEiS85DpvUfVcRfmvZCSIfmvMBFXCJuynXCPw3cDcZ9tC603QQT2qHf4MUxEXuANb9YCA8SWADTWciFQiNuoY2zbcmCbIi8rt7Pav2LEe5ZJnZixrfwCEVaPoZbxgbA01QpAeQHGSNMuMvaE1TlM90bpBLbu5ptQnNA_MwF3lboFRsq5E3TEp7hqgi3u2T4U2WHDfhqFA3U-03pwE_BjoBroF-GIm-St2xTuV5cQP6edxXkjOBzbwGUakRBJa4";
}

$header = array(
    "Content-Type" => "application/json",
    "X-Requested-With" => " XMLHttpRequest",
    "Authorization" => " Bearer $bearerKey"
);