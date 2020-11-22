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
    display: none;
    text-align: center;
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

<form class="theme-form" method="POST" enctype="multipart/form-data">
    <h4 class="text-center">- Tambah Produk -</h4>
    <div class="form-row">
        <div class="col-md-12 border-1">
            <div class="row">
                <?php
                for ($i = 0; $i < 4; $i++) {
                ?>
                <div class="col-md-3">
                    <div class="file-upload">
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" name="image[]" type='file' onchange="readURL(this);"
                                accept="image/*" />
                            <div class="drag-text">
                                <h5><i class="fa fa-plus"></i> Gambar</h5>
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image img-fluid" src="#" alt="your image" />
                            <div class="image-title-wrap text-center">
                                <button type="button" onclick="removeUpload()" class="remove-image text-center rounded">
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
                <input type="text" name="name" class="form-control" id="name" placeholder="Tuliskan nama produk Anda"
                    required="">
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
                    foreach ($product_category as $pc) {
                        echo "<option value='" . $pc['id'] . "' data-tokens='" . $pc['name'] . "'>" . $pc['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" placeholder="Tuliskan deskripsi produk anda" rows="5" spellcheck="false"
                    name="description" required></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" class="form-control format-rupiah" id="rupiah" required="">
                <small class="float-right text-muted mt-1">Satuan dalam Rp.</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="weight">Berat</label>
                <input type="number" name="weight" class="form-control format-rupiah" id="rupiah" required="">
                <small class="float-right text-muted mt-1">Satuan dalam Kg</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" name="stock" class="form-control format-rupiah" id="rupiah" required="">
                <small class="float-right text-muted mt-1">Satuan dalam Kg</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="order">Min. Order</label>
                <input type="number" name="min_order" class="form-control format-rupiah" id="rupiah" required="">
                <small class="float-right text-muted mt-1">Satuan dalam Kg</small>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <button name="btn-add-product" class="btn btn-rounded black-btn float-right">
                Tambah Produk
            </button>
        </div>
    </div>
</form>