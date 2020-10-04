<?php
date_default_timezone_set("Asia/Bangkok");

$date1 = "2020-10-09 16:26:43";
$date2 = date("Y-m-d h:i:s");

// $date1 = date_create($date1);
// $date2 = date_create($date2);

if ($date1 > $date2) {
    echo " token kadaluarsa";
} else {
    echo "token masih bisa digunakan";
}

echo $date2;