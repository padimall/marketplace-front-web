<?php

include('template/config_api.php');
require 'vendor/autoload.php';

if (isset($_POST['tambah'])) {
    $name = $_POST['name'];
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

    $add_product = Requests::post($api_endpoint . "product/store?" . $inputan_string, $header, json_encode($data));
    if ($add_product->success) {
        echo 1;
    } else {
        echo 0;
    }

    // var_dump($_FILES);
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
        <input type="text" name="name" placeholder="name">
        <br>
        <input type="text" name="price" placeholder="price">
        <br>
        <input type="text" name="weight" placeholder="weight">
        <br>
        <input type="text" name="description" placeholder="description">
        <br>
        <input type="text" name="category" placeholder="category">
        <br>
        <input type="text" name="stock" placeholder="stock">
        <br>
        <input type="text" name="min_order" placeholder="min_order">
        <br>
        <input type="file" name="image1">
        <br>

        <button name="tambah">Tambah Produk</button>
    </form>

</body>

</html>