<?php

include('template/config_api.php');
require 'vendor/autoload.php';

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Client;
use GuzzleHttp\Post\PostFile;

$header = [
    'headers' => [
        'Content-Type' => 'application/json',
        'X-Requested-With' => 'XMLHttpRequest',
        'Authorization' => 'Bearer ' . $bearerKey
    ]
];

$client = new \GuzzleHttp\Client(["base_uri" => "https://api.padimall.id/api/v1/"]);
$response = $client->post("agent/detail", $header);
$response = json_decode($response->getBody(), TRUE);
// var_dump($response);

if (isset($_POST['tambah'])) {
    $name = $_POST['name'] . rand(0, 10000);
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $min_order = $_POST['min_order'];

    $inputan_string = "name=" . $name . "&price=" . $price . "&weight=" . $weight . "&description=" . $description . "&category=" . $category . "&stock=" . $stock . "&min_order=" . $min_order;

    $image_name = $_FILES['image1']['name'];
    $image_temp = $_FILES['image1']['tmp_name'];

    $data = array('image[]' => $image_name);

    //using guzzle
    // $response = $client->post("product/store?" . $inputan_string, [
    //     'headers' => [
    //         'Content-Type' => 'application/json',
    //         'X-Requested-With' => 'XMLHttpRequest',
    //         'Authorization' => 'Bearer ' . $bearerKey
    //     ]
    // ]);

    // $response = json_decode($response->getBody(), TRUE);
    // if ($response['status']) {
    //     echo "berhasil";
    // } else {
    //     echo "gagal";
    // }

    // //test menggunakan body untuk pengganti params
    // $response = $client->request('POST', 'login', [
    //     'form_params' => [
    //         'email_or_phone' => 'rickyjulpiter14@gmail.com',
    //         'password' => 'Halodunia1!',
    //         'device_id' => 'web',
    //         'remember_me' => true
    //     ]
    // ]);

    // $response = json_decode($response->getBody(), TRUE);
    // var_dump($response);

    $inputan_string = "name=" . $name . "&price=" . $price . "&weight=" . $weight . "&description=" . $description . "&category=" . $category . "&stock=" . $stock . "&min_order=" . $min_order;


    //test menggunakan multipart
    // $response = $client->request('POST', 'product/store', [
    //     'form_params' => [
    //         'name' => $name,
    //         'price' => $price,
    //         'weight' => $weight,
    //         'description' => $description,
    //         'category' => $category,
    //         'stock' => $stock,
    //         'min_order' => $min_order
    //     ],
    //     'headers' => [
    //         'Content-Type' => 'application/json',
    //         'X-Requested-With' => 'XMLHttpRequest',
    //         'Authorization' => 'Bearer ' . $bearerKey
    //     ]
    // ]);

    //mengguankan headers dan work
    // $headers = [
    //     'Content-Type' => 'application/json',
    //     'X-Requested-With' => 'XMLHttpRequest',
    //     'Authorization' => 'Bearer ' . $bearerKey
    // ];

    // $response = $client->request('POST', 'agent/detail', [
    //     'headers' => $headers,
    // ]);
    // $response = json_decode($response->getBody(), TRUE);
    // var_dump($response);

    // work use headers and form-params
    // $headers = [
    //     'Accept' => 'application/json',
    //     'X-Requested-With' => 'XMLHttpRequest',
    //     'Authorization' => 'Bearer ' . $bearerKey
    // ];

    // $form_params = [
    //     'name' => $name,
    //     'price' => $price,
    //     'weight' => $weight,
    //     'description' => $description,
    //     'category' => $category,
    //     'stock' => $stock,
    //     'min_order' => $min_order
    // ];

    // $response = $client->request('POST', 'product/store', [
    //     'headers' => $headers,
    //     'form_params' => $form_params
    // ]);

    // $response = json_decode($response->getBody(), TRUE);
    // var_dump($response);

    // $response = json_decode($response->getBody(), TRUE);
    // var_dump($response);

    // $headers = [
    //     'Accept' => 'application/json',
    //     'X-Requested-With' => 'XMLHttpRequest',
    //     'Authorization' => 'Bearer ' . $bearerKey
    // ];

    // $form_params = [
    //     'name' => $name,
    //     'price' => $price,
    //     'weight' => $weight,
    //     'description' => $description,
    //     'category' => $category,
    //     'stock' => $stock,
    //     'min_order' => $min_order
    // ];

    // $response = $client->request('POST', 'product/store', [
    //     'headers' => $headers,
    //     'form_params' => $form_params
    // ]);

    // $response = json_decode($response->getBody(), TRUE);
    // var_dump($response);

    $inputan_string = "name=" . $name . "&price=" . $price . "&weight=" . $weight . "&description=" . $description . "&category=" . $category . "&stock=" . $stock . "&min_order=" . $min_order;

    $headers = [
        'Accept' => 'application/json',
        'X-Requested-With' => 'XMLHttpRequest',
        'Authorization' => 'Bearer ' . $bearerKey
    ];

    $response = $client->request('POST', 'product/store?' . $inputan_string, [
        'headers' => $headers,
        'multipart' => [
            [
                'name'     => 'image[]',
                'contents' => fopen($image_temp, 'r'),
                'filename' => $image_name
            ]
        ]
    ]);

    $response = json_decode($response->getBody(), TRUE);

    var_dump($response);

    // var_dump(fopen($image_temp, 'r'));

    // var_dump(file_get_contents($image_name . $image_temp));
    // $image_name = $_FILES['image1']['name'];
    // $image_temp = $_FILES['image1']['tmp_name'];
    // var_dump($image_name . $image_temp);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="name" value="check">
        <br>
        <input type="text" name="price" placeholder="price" value="10928">
        <br>
        <input type="text" name="weight" placeholder="weight" value="23">
        <br>
        <input type="text" name="description" placeholder="description" value="ini deskripsi">
        <br>
        <input type="text" name="category" placeholder="category" value="48f64301-774b-4215-8bc8-509c80a5537e">
        <br>
        <input type="text" name="stock" placeholder="stock" value="23">
        <br>
        <input type="text" name="min_order" placeholder="min_order" value="2333">
        <br>
        <input type="file" name="image1">
        <br>

        <button name="tambah">Tambah Produk</button>
    </form>

</body>

</html>