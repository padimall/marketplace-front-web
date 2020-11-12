<?php
$product_agent = Requests::post($api_endpoint . "product/agent" . $target, $header);
$product_agent = json_decode($product_agent->body, TRUE);


if ($product_agent['status'] != 1) {
    //tidak ada product agent
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center col-grid-box">
    <img alt="" class="img-fluid" src="./assets/images/no-product.png" width="50%">
    <h4 class="mt-2">Maaf, kamu belum memiliki produk</h4>
</div>
<?php
} else {
    //ada product supplier
    $product_agent_data = $product_agent['data'];
?>
<div class="box-account box-info">
    <div class="row">
        <div class="col">
            <h5 class="text-left float-left mb-3 mt-1" style="color: #272727;">Daftar Produk </h5>
            <a href="" class="btn btn-sm btn-theme-green text-right float-right"> + Tambah Produk</a>
        </div>
    </div>

    <div class="row review-block mt-4">
        <?php
            foreach ($product_agent_data as $pad) {
                if (is_null($pad['image'][0]['url'])) {
                    $pad_image = "./assets/images/no-picture.jpg";
                } else {
                    $pad_image = $pad['image'][0]['url'];
                }
                $pad_price = "Rp " . number_format($pad['price'], 0, ',', '.');
            ?>

        <div class="col-md-4 col-lg-4 col-sm-12 mb-2">
            <div class="card" style="border-radius: 12px;">
                <img class="img-agent-product" src="<?= $pad_image ?>" alt="<?= $pad['name'] ?>"
                    style='border-radius: 12px 12px 0px 0px'>
                <div class="card-body">
                    <div class="product-detail detail-center1" style="display: flow-root;">
                        <span
                            class="detail-price text-secondary font-weight-bold float-left"><?= limit_string($pad['name'], 12) ?>
                        </span>
                        <span
                            class="detail-price text-success font-weight-bold float-right"><?= limit_string($pad_price, 12) ?>
                        </span>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -25px;">
                    <a href="?product-detail&target=<?= $pad['id'] ?>" class="btn-secondary btn-sm float-left">
                        <i class="ti-eye" aria-hidden="true"></i>
                        Lihat
                    </a>
                    <a href="#" data-href="?agent-product&action=delete&target=<?= $pad['id'] ?>" data-toggle="modal"
                        data-target="#confirm-delete" class="btn btn-danger btn-sm float-right">
                        <i class="ti-trash" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-info btn-sm float-right mr-2">
                        <i class="ti-pencil" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-justify">Apakah anda yakin ingin menghapus produk ini ? Jika anda menghapus produk ini,
                    maka produk ini tidak
                    akan dapat dilihat oleh pembeli dan juga anda</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok">Hapus Produk</a>
            </div>
        </div>
    </div>
</div>
<?php
}

// untuk proses pelemparan functionnya dari modal, bisa dilihat di script.php 
?>