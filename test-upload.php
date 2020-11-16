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

// $client = new \GuzzleHttp\Client(["base_uri" => "https://api.padimall.id/api/v1/"]);
$client = new \GuzzleHttp\Client([
    'base_uri' => 'https://api.padimall.id/api/v1/',
    'defaults' => [
        'exceptions' => false
    ]
]);
// $response = $client->post("agent/detail", $header);
// $response = json_decode($response->getBody(), TRUE);
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

    // $headers = [
    //     'Accept' => 'application/json',
    //     'X-Requested-With' => 'XMLHttpRequest',
    //     'Authorization' => 'Bearer ' . $bearerKey
    // ];

    $headers = [
        'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MWRiNmI2ZC0xMzc3LTRjN2MtOWE2OS04MjJlNTIxNzQ5YWYiLCJqdGkiOiJiY2ZlMzNjZjQ1ZjJhZjZkNDM2ZWVmMTkyN2JjMWIxNWFmYmM4MGE0MGE0MjUwYWZhYzExODEyY2I1MjcxMGEwN2NiZjEyNTg0ZDU2NjQxNSIsImlhdCI6MTYwNDYzOTYyMSwibmJmIjoxNjA0NjM5NjIxLCJleHAiOjE2MzYxNzU2MjEsInN1YiI6Ijk3YTAzYjNmLTM3NzQtNGU2YS05ZTVkLWRiY2Q4Y2JmMzdhYSIsInNjb3BlcyI6WyJ1c2VyLXRva2VuIl19.0AjR5c7LDPHj26iltx9Dqi6Fi4IM_YoX8vGrX3-MqQncRa68ItCS-0ChQV9RQs6CwiP-4k_W7VgM9V9YlmMCgvxD0IaGKKVSFwE82YoKNlFhv-unxLwI0pR4yBegdcevb0nThnQAaaiWoSgUjfhxbl0sGhR9_o-ROXJBp1cHoYyt1rDEiVuBwP_jhsnLZcUNvy8uviqqmzAFYVVayl-oeSPgEg2zXpj6vFonI85X6DGkRJDXM8fWt_OqlUyUj4ZFkR9-Clnsk-soPX_iN3jRRCM7uZxqZWPUpbyoNO8YnC6uMHLRIQtTU7bj2hg3oYSZsQIoOhQLgOBzzDPhGWxfvFbA4onZEI9xx4FxSoUSEGsvOr6IhE4BAYVyeOkmUIyrHzU74QYByA8BM0ej3Rv6yDFwomjux4EyKVnJILvnymHAXMuFN2-ln2McCiSryCd6HqnwfEgikWn-80sqTbOd0kJcHy-Z09XTEW-RwFXAPOUR9lQIJrdxuIcNyVQW2O7u_uDRrexZF60iZxsF2hKM15v0SedcowPwUj-rKob4ybSH2VzeoplvrhlvmhRKYpdng75O1i21XLBuTg-cZyPlyYXE3jhGQ3NLCCp7nPbQlHLpu2MvW4yQaFQqJXcBwekw0-k_lJofMNokXdL3oy41rhATrt6zWFToXUH05U3KnCM'
    ];

    $multipart_contain = array();

    $multipart = array(
        'name'     => 'image[]',
        'contents' => fopen($image_temp, 'r'),
        'filename' => $image_name
    );

    // mencoba perulangan upload banyak gambar
    for ($i = 0; $i < 3; $i++) {
        array_push($multipart_contain, $multipart);
    }

    // var_dump($multipart_contain);
    array_push($multipart_contain, $multipart);


    //this is the magic
    $test = [];
    for ($i = 0; $i < 3; $i++) {
        $test[] = [
            'name'     => 'image[]',
            'contents' => fopen($image_temp, 'r'),
            'filename' => $image_name
        ];
    }



    $response = $client->request('POST', 'product/store?' . $inputan_string, [
        'headers' => $headers,
        'multipart' => $test
    ]);

    $response = json_decode($response->getBody(), TRUE);
    var_dump(($response));
    echo "<br>";
    // var_dump($multipart_contain);
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
        <input type="text" name="name" placeholder="name" value="Rudi test">
        <br>
        <input type="text" name="price" placeholder="price" value="10928">
        <br>
        <input type="text" name="weight" placeholder="weight" value="23">
        <br>
        <input type="text" name="description" placeholder="description" value="ini deskripsi">
        <br>
        <input type="text" name="category" placeholder="category" value="cf379a8c-11dd-4640-82ab-dd7e90f09319">
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
<script></script>

</html>