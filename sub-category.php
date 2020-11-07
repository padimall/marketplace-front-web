<!DOCTYPE html>
<html lang="en">

<?php
include('template/head.php');
searchProduct();
?>

<body class="bg-light ">

    <!-- loader start -->
    <div class="loader-wrapper">
        <div>
            <img src="./assets/images/loader.gif" alt="loader">
        </div>
    </div>
    <!-- loader end -->

    <!--header start-->
    <?php
    include('template/header.php');
    ?>
    <!--header end-->

    <?php
    $main_category = Requests::post($api_endpoint . "main-category/all", $header);
    $main_category_status = $main_category->success;
    $main_category_data = json_decode($main_category->body, TRUE);
    $main_category_data = $main_category_data['data'];

    foreach ($main_category_data as $mcd) {
        $mcd_id = $mcd['id'];
        if ($mcd_id == htmlentities($_GET['target'])) {
            $mcd_count = $mcd['count_category'];
            if (!is_null($mcd_count)) {
                //jika ada sub category didalamnya
    ?>

    <!--box category start-->
    <section class="box-category section-pt-space">
        <div class="container-fluid ">
            <div class="row">
                <div class="col pl-0">
                    <div class="slide-10 no-arrow">
                        <?php
                                    $main_category_id = htmlentities($_GET['target']);
                                    $sub_category_product = Requests::post($api_endpoint . "product-category/all", $header);
                                    $sub_category_product_status = $sub_category_product->success;
                                    $sub_category_product_data = json_decode($sub_category_product->body, TRUE);
                                    $sub_category_product_data = $sub_category_product_data['data'];

                                    //untuk menampung array yang akan di looping di show product dibawah
                                    $array_sub_category = [];

                                    foreach ($sub_category_product_data as $show_sub_category) {
                                        //hanya tampilkan yang sesuai dengan main category id
                                        if ($show_sub_category['main_category_id'] == $main_category_id) {
                                            array_push($array_sub_category, $show_sub_category['id']);
                                    ?>
                        <div>
                            <a
                                href="product-category?name=<?= $show_sub_category['name'] ?>&target=<?= $show_sub_category['id'] ?>">
                                <div class="box-category-contain rounded"
                                    style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?= $show_sub_category['image'] ?>');background-size:cover;background-repeat: no-repeat">
                                    <h4>
                                        <?= $show_sub_category['name'] ?>
                                    </h4>

                                </div>
                            </a>
                        </div>
                        <?php }
                                    }
                                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--box category end-->

    <!-- product list start -->
    <section class="section-big-pt-space ratio_square bg-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-wrapper-grid mb-4">
                                            <div class="row">
                                                <?php
                                                            //array push yang sudah ditampung diatas, jadi acuan untuk looping product yang dibawah
                                                            foreach ($array_sub_category as $sub_category_id) {
                                                                $product_category = Requests::post($api_endpoint . "product/all", $header);
                                                                $product_category = json_decode($product_category->body, TRUE);
                                                                $product_category = $product_category['data'];

                                                                foreach ($product_category as $show_product_category) {
                                                                    $category = $show_product_category['category'];
                                                                    if ($sub_category_id == $category) {
                                                                        if (empty($show_product_category['image'])) {
                                                                            $show_product_category_image = "./assets/images/no-picture.jpg";
                                                                        } else {
                                                                            $show_product_category_image = $show_product_category['image'][0]['url'];
                                                                        }
                                                            ?>
                                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                    <a
                                                        href="product-detail?name=<?= $show_product_category['name'] ?>&target=<?= $show_product_category['id'] ?>">
                                                        <div class="product">
                                                            <div class="product-box ">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front">
                                                                        <img src="<?= $show_product_category_image ?>"
                                                                            class="img-fluid bg-img" alt="product">
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail detail-center1 pt-2">
                                                                    <h6
                                                                        class="text-secondary font-weight-bold float-left">
                                                                        <?= limit_string($show_product_category['name'], 15) ?>
                                                                    </h6>
                                                                    <span
                                                                        class="detail-price text-success float-right"><?= rupiah($show_product_category['price']) ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- productlist End -->

    <?php
            } else {
                //jika tidak ada sub category di dalamnya
            ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center col-grid-box mt-4 mb-4">
        <img alt="" class="img-fluid" src="./assets/images/no-product.png">
        <h3 class="mt-3">Maaf, untuk saat ini belum ada produk di kategori ini</h3>
    </div>
    <?php
            }
        }
    }
    ?>

    <!--footer-start-->
    <?php include('./template/footer.php') ?>
    <!--footer-end-->

    <!-- tap to top -->
    <div class="tap-top">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top End -->

    <?php include('template/script.php') ?>

</body>

</html>