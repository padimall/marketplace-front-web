<style>
/* The switch - the box around the slider */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

/* The slider */
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #84B214;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>

<?php
$target = htmlentities($_GET['target']);
$product_supplier = Requests::post($api_endpoint . "product/my-supplier?target_id=" . $target, $header);
$product_supplier = json_decode($product_supplier->body, TRUE);

if ($product_supplier['status'] != 1) {
    //tidak ada product supplier
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center col-grid-box">
    <img alt="" class="img-fluid" src="./assets/images/no-product.png" width="50%">
    <h4 class="mt-2">Maaf, supplier ini belum memiliki produk</h4>
</div>
<?php
} else {
    //ada product supplier
    $product_supplier_data = $product_supplier['data'];
?>
<div class="box-account box-info">
    <h5 class="text-left mb-3" style="color: #272727;">Daftar Product Supplier</h5>
    <!-- <section class="search-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form class="form-header">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari produk supplier">
                            <div class="input-group-append">
                                <button class="btn btn-normal">
                                    <i class="fa fa-search"></i>Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
    <div class="row review-block mt-4">
        <?php
            foreach ($product_supplier_data as $psd) {
                // echo $psd['image'];
                if (is_null($psd['image'][0]['url'])) {
                    $psd_image = "./assets/images/no-picture.jpg";
                } else {
                    $psd_image = $psd['image'][0]['url'];
                }

                $psd_price = "Rp " . number_format($psd['price'], 0, ',', '.');


            ?>

        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card" style="border-radius: 12px;">
                <img class="img-agent-product" src="<?= $psd_image ?>" alt="<?= $psd['name'] ?>"
                    style='border-radius: 12px 12px 0px 0px'>
                <div class="card-body">
                    <div class="product-detail detail-center1">
                        <span
                            class="detail-price text-secondary font-weight-bold float-left"><?= limit_string($psd['name'], 10) ?>
                        </span>
                        <span
                            class="detail-price text-success font-weight-bold float-right"><?= limit_string($psd_price, 8) ?>
                        </span>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -25px;">
                    <!-- Rounded switch -->

                    <?php
                            if ($psd['status'] == 1) {
                                $status = "checked";
                            } else {
                                $status = '';
                            }
                            ?>
                    <!-- <label class="switch float-right">
                        <input type="checkbox" class="" name="checkbox" id="inputToogle" onclick="toogle(this.value)"
                            value="<?= $psd['id'] ?>" <?= $status ?>>
                        <span class="slider round"></span>
                    </label> -->

                    <label class="switch float-right">
                        <input type="checkbox" class="inputToggle" id="inputToggle" name="checkbox"
                            value="<?= $psd['id'] ?>" <?= $status ?>>
                        <span class="slider round"></span>
                    </label>

                    <a href="?product-detail&target=<?= $psd['id'] ?>"
                        class="btn btn-secondary btn-sm float-left mr-2 rounded">
                        <i class="ti-eye" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
}
?>

<script>
// function toogle(value) {
//     var checkvalid = document.getElementById("inputToogle").checked;
//     var targetID = value;

//     if (checkvalid === true) {
//         var status = 1
//     } else {
//         var status = 0
//     }

//     $.ajax({
//         url: 'ajaxRequests.php',
//         type: 'POST',
//         data: 'target=' + targetID + '&status=' + status,
//         success: function(hasil) {
//             if (hasil == 1) {
//                 console.log("Berhasil memperbaharui");
//                 if (status == 1) {
//                     document.getElementById("message_js").innerHTML =
//                         `<span class="float-right badge badge-success p-1 mt-1">Berhasil menampilkan produk</span>`;
//                 } else {
//                     document.getElementById("message_js").innerHTML =
//                         `<span class="float-right badge badge-success p-1 mt-1">Berhasil menonaktifkan produk</span>`;
//                 }

//             } else {
//                 console.log(hasil)
//                 console.log("Gagal memperbaharui");
//                 document.getElementById("message_js").innerHTML =
//                     `<span class="float-right badge badge-danger p-1 mt-1">Gagal memperbaharui status</span>`;
//             }
//         }
//     });


// }
</script>