<style>
#formdiv {
    text-align: center;
}

#file {
    color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5;
}

#img {
    width: 17px;
    border: none;
    height: 17px;
    margin-left: -20px;
    margin-bottom: 191px;
}

.upload {
    width: 100%;
    height: 30px;
}

.abcd {
    text-align: center;
    position: relative;
}

.abcd img {
    height: 200px;
    width: 200px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
}

.delete {
    color: red;
    font-weight: bold;
    position: absolute;
    top: 0;
    cursor: pointer
}
</style>
<form class="theme-form" method="POST" enctype="multipart/form-data">
    <h4 class="text-center">- Tambah Produk -</h4>
    <div class="form-row">
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