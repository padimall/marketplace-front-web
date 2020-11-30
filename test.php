<?php

// function sortByPriceAscending(string $jsonString)
// {
//     $data = json_decode($jsonString, TRUE);
//     $price = array();
//     foreach ($data as $key => $row) {
//         $price[$key] = $row['price'];
//     }
//     return json_encode(array_multisort($price, SORT_DESC, $data));
// }

$jsonData = '[{"name":"eggs","price":1},{"name":"coffee","price":9.99},{"name":"rice","price":4.04}]';
$data = json_decode($jsonData, TRUE);

$price = array_column($data, 'price');
$name = array_column($data, 'name');

array_multisort($price, SORT_ASC, $data);

return json_encode($data);


// echo sortByPriceAscending('[{"name":"eggs","price":1},{"name":"coffee","price":9.99},{"name":"rice","price":4.04}]');