<?php
include('./vendor/rmccue/requests/library/Requests.php');

Requests::register_autoloader();

$api_endpoint = "https://api.padimall.id/api/v1/";

$bearerKey = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MThhZDgxOS02YjZjLTQwYzktYmY1Yy0yNjJlNDU1MGVjNzEiLCJqdGkiOiI1NWZlNzA5YWE2ZWE2ZmUwNzVlMDUzNjBmYzUzNzAyMTIwYTRiYWI5ZGFiNzQ4YjViOWZhZDgxMjA5YTRiOWY3MGFjZTIzNzY1ZjQzZWRmMiIsImlhdCI6MTYwMDY1MjY0MiwibmJmIjoxNjAwNjUyNjQyLCJleHAiOjE2MzIxODg2NDIsInN1YiI6IjEyNGNmMzkzLWI1MTItNDM4MS05YTNjLTUzY2NlN2I0OGRlZSIsInNjb3BlcyI6WyJzeXN0ZW0tdG9rZW4iXX0.BwICDnZ9iwEs_BD1XS3PNY222QPLlpXnIprOSLlEO5u601Zy_kbc0yB1O_8WVgf00eM07mx_9HXIZmdqMLruojVoPYHMq8JvRQcwnAfimWs78udw_E7LhlEdovgwpOQNavVYABMr9m_fhzLVqyU9ooeCeeboYINxQL_DCfLnHTqHWGKCzb-o8FC6BHptE0uU00BuGcbU1kef5KQcfROFAnhHuszgDibegV_E5bpxPwBNzCrh6-28dRS0ebJAXqe2VVlBrl2f6YxxvqVcO0jBXxrytdTnYEyGmlODGcix3zQytzx7IiCwG2jXq39d-D5fA977DjnL4Ik27AfmScYUk4zEMhAWhNTuxORYNHDtghwoLIFI39YdRXyI8wAxzM6SBKXS5znKubu9DJBG4LOZ5LiH2PHwnzV7mCJf3y32ylkouVjJWoWGHN-EGgBND6QuWuTjN9g5q8on5pgX8kv8mRzi-68gwjja98-0JHW22gN4Pms3lBs4JH3hR-Ky892DYZMDge5j_qrWus_OhwvhFMRI_oVgbqJnEiRgTNnyHMgDTjIfT_CVEdU-MUOfZhzA0G7Hm4mY22rvOlapMYXV7i1-dRGxlk7lpedcFof3ED-JgrZfjeg3khHjZklVC1Ha1mdR7yYB_XIsaUmxIOo7yvHD6stPz4XO8EG5SRKBmK8";

$header = array(
    "Content-Type" => "application/json",
    "X-Requested-With" => " XMLHttpRequest",
    "Authorization" => " Bearer $bearerKey"
);
?>

<head>
    <title>PT. Padi Mall INA Marketplace</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="big-deal">
    <meta name="keywords" content="big-deal">
    <meta name="author" content="big-deal">
    <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/themify.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/slick-theme.css">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="./assets/css/animate.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/color4.css" media="screen" id="color">

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>