<div class="box-account box-info">
    <h5 class="text-left mb-3" style="color: #272727;">Daftar Supplier</h5>
    <section class="search-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form class="form-header">
                        <div class="input-group">
                            <input type="text" class="form-control" name="supplier-search" placeholder="Cari supplier"
                                value="<?= $_GET['supplier-search'] ?>">
                            <div class="input-group-append">
                                <button class="btn btn-normal">
                                    <i class="fa fa-search"></i>Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    $data_agent_supplier = $data_agent['supplier'];
    if (isset($_GET['supplier-search']) != "") {
        $search_string = htmlentities($_GET['supplier-search']);
        foreach ($data_agent_supplier as $das) {
            // echo $das['name'];
            if (is_null($das['image'])) {
                $das_image = "./assets/images/no-picture.jpg";
            } else {
                $das_image = $das['image'];
            }
            if (stristr($das['name'], $search_string)) {
    ?>
    <div class="col-md-3 col-lg-3">
        <div class="review-box" style="border-radius: 15px;">
            <img class="img-fluid" src="<?= $das_image ?>" alt="<?= $das['name'] ?>">
            <h5><?= $das['name'] ?></h5>
            <div class="review-message mt-2">
                <!-- <p>
                        <?= $das['phone'] ?>
                    </p> -->
                <a href="?supplier-detail&target=<?= $das['id'] ?>" class="btn btn-sm btn-theme-green mt-2">Produk</a>
            </div>
        </div>
    </div>
    <?php
            } else {
                //produk tidak ditemukan
            }
        }
    } else {
        ?>
    <div class="row review-block mt-4">
        <?php
            foreach ($data_agent_supplier as $das) {
                if (is_null($das['image'])) {
                    $das_image = "./assets/images/no-picture.jpg";
                } else {
                    $das_image = $das['image'];
                }
            ?>
        <div class="col-md-3 col-lg-3">
            <div class="review-box" style="border-radius: 15px;">
                <img class="img-fluid" src="<?= $das_image ?>" alt="<?= $das['name'] ?>">
                <h5><?= $das['name'] ?></h5>
                <div class="review-message mt-2">
                    <!-- <p>
                        <?= $das['phone'] ?>
                    </p> -->
                    <a href="?supplier-detail&target=<?= $das['id'] ?>"
                        class="btn btn-sm btn-theme-green mt-2">Produk</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php
    }
    ?>
</div>