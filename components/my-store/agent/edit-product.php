<style>
.file-upload {
    background-color: #ffffff;
    margin: 0 auto;
    padding: 20px;
}

.file-upload-btn {
    /* width: 100%; */
    margin: 0;
    color: #fff;
    background: #84B214;
    border: none;
    padding: 5px;
    border-radius: 4px;
    /* border-bottom: 4px solid #84B214; */
    transition: all .2s ease;
    outline: none;
    /* text-transform: uppercase; */
    font-weight: 300;
}

.file-upload-btn:hover {
    background: #F97C2D;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
}

.file-upload-btn:active {
    border: 0;
    transition: all .2s ease;
}

.file-upload-content {
    text-align: center;
    display: none;
}

.file-upload-input {
    position: absolute;
    margin: 0;
    padding: 0;
    /* width: 100%;
    height: 100%; */
    outline: none;
    opacity: 0;
    cursor: pointer;
}

.image-upload-wrap {
    margin-top: 20px;
    border: 4px dashed #84B214;
    position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
    background-color: #f2f2f2;
    border: 4px dashed #84B214;
}

.image-title-wrap {
    /* padding: 0 15px 15px 15px; */
    color: #222;
}

.drag-text {
    text-align: center;
}

.drag-text h5 {
    font-weight: 100;
    /* text-transform: uppercase; */
    color: grey;
    padding: 20px 0;
}

.file-upload-image {
    max-height: 200px;
    /* max-width: 200px; */
    margin: auto;
    padding: 20px;
}

.remove-image {
    /* width: 200px; */
    margin: 0;
    color: #fff;
    background: #cd4535;
    border: none;
    padding: 4px;
    border-radius: 4px;
    /* border-bottom: 4px solid #b02818; */
    transition: all .2s ease;
    outline: none;
    /* text-transform: uppercase; */
    font-weight: 700;
}

.remove-image:hover {
    background: #c13b2a;
    color: #ffffff;
    transition: all .2s ease;
    cursor: pointer;
}

.remove-image:active {
    border: 0;
    transition: all .2s ease;
}
</style>

<?php
$product_detail = Requests::post($api_endpoint . "product/detail?target_id=" . $_GET['target'], $header);
$product_detail = json_decode($product_detail->body, TRUE);
$pd = $product_detail['data'];
// var_dump($pd);
?>

<form class="theme-form" method="POST" enctype="multipart/form-data">
    <h4 class="text-center">- Ubah Produk -</h4>
    <div class="form-row">
        <div class="col-md-12 border-1">
            <div class="row">
                <?php
                $pd_image = $pd['image'];
                for($i=0; $i<4; $i++) {
                    $src = '#';
                    $up_dis = '';
                    $img_dis = '';
                    $name = 'image[]';
                    $exist = '';
                    if(isset($pd_image[$i])){
                        $src = $pd_image[$i]['url'];
                        $up_dis = 'display : none';
                        $img_dis = 'display : inline';
                        $exist = $pd_image[$i]['id'];
                        $name = '';
                    }
                ?>
                <div class="col-md-3">
                    <div class="file-upload">
                        <div style = "<?= $up_dis?>" class="image-upload-wrap" id="wrap<?= $i ?>">
                            <input class="file-upload-input" id="input<?= $i ?>" data-exist="<?= $exist?>" data-count="<?= $i ?>" name="<?= $name?>"
                                type='file' onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                                <h5><i class="fa fa-plus"></i> Gambar</h5>
                            </div>
                        </div>
                        <div style="<?= $img_dis?>" class="file-upload-content" id="content<?= $i ?>">
                            <img src="<?= $src?>" class="file-upload-image img-fluid" id="show<?= $i ?>" src="#" alt="your image" />
                            <div class="image-title-wrap text-center">
                                <button type="button" onclick="removeUpload(this)" data-delete="<?= $i ?>"
                                    class="remove-image text-center rounded">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>

        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" value="<?= $pd['name'] ?>"
                    placeholder="Tuliskan nama produk Anda" required="">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="category">Kategori</label>
                <?php
                $product_category = Requests::post($api_endpoint . "product-category/all", $header);
                $product_category = json_decode($product_category->body, TRUE);
                $product_category = $product_category['data'];
                ?>
                <select class="form-control selectpicker" name="category" data-live-search="true" size="1" required>
                    <?php
                    //ku perbaiki ya ki
                    // echo "<option value='" . $pd['category'] . "' data-tokens='" . $pc['name'] . "'>" . $pc['name'] . "</option>";
                    foreach ($product_category as $pc) {
                        $selected = '';
                        if($pc['id'] == $pd['category'])
                            $selected = 'selected';
                        echo "<option value='" . $pc['id']. "' data-tokens='" . $pc['name'] . "'".$selected.">" . $pc['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" placeholder="Tuliskan deskripsi produk anda" rows="5" spellcheck="false"
                    name="description" required><?= $pd['description'] ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" name="price" class="form-control numberFormat text-right" value="<?= $pd['price'] ?>"
                    required="">
                <small class="float-right text-muted mt-1">Satuan dalam Rp.</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="weight">Berat</label>
                <input type="text" name="weight" class="form-control numberFormat text-right"
                    value="<?= $pd['weight'] ?>" required="">
                <small class="float-right text-muted mt-1">Satuan dalam Kg</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="text" name="stock" class="form-control numberFormat text-right" value="<?= $pd['stock'] ?>"
                    required="">
                <small class="float-right text-muted mt-1">Satuan dalam Kg</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="order">Min. Order</label>
                <input type="text" name="min_order" class="form-control numberFormat text-right"
                    value="<?= $pd['min_order'] ?>" required="">
                <small class="float-right text-muted mt-1">Satuan dalam Kg</small>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <input type="hidden" name="target" value="<?= $_GET['target'] ?>">
            <input type="hidden" id="del_img" name="del_img" value="">
            <button name="btn-edit-product" class="btn btn-rounded black-btn float-right">
                Simpan Perubahan
            </button>
        </div>
    </div>
</form>