<?php
if ($getInvoicesListOrder->success) {
    $getInvoicesList = json_decode($getInvoicesListOrder->body, TRUE);
    $getInvoicesList = $getInvoicesList['invoice_groups'];
    foreach ($getInvoicesList as $inv) {
        if ($inv['status'] === 2) {

?>
<div class="col-md-12 mt-3">
    <div class="card rounded">
        <div class="card-header">
            <span
                class="float-left badge badge-secondary p-1 ">INV-<?= limit_string_inv(strtoupper($inv['id']), 13) ?></span>
            <span class="float-right"><?= $inv['created_at'] ?></span>
        </div>

        <?php
                    foreach ($inv['invoices'] as $inv_stuff) {
                    ?>
        <div class="card-body">
            <h5 class="mb-2 text-theme-orange">
                <?= $inv_stuff['agent_name'] ?>
            </h5>
            <?php
                            foreach ($inv_stuff['products'] as $inv_stuff_products) {
                            ?>
            <div class="row ratio_square">
                <div class="rounded ml-3">
                    <img src="<?= $inv_stuff_products['image'] ?>" alt="<?= $inv_stuff_products['name'] ?>"
                        class="img-thumbnail-invoices">
                </div>
                <div class="ml-2">
                    <h4> <?= $inv_stuff_products['name'] ?>
                    </h4>
                    <p>Jumlah :
                        <?= string_number($inv_stuff_products['quantity']) ?>
                    </p>
                    </p>
                </div>
            </div>
            <?php
                            }
                            ?>
        </div>
        <?php
                    }
                    ?>
        <div class="card-body mt--5">
            <h4 class="text-secondary float-left">Total
                Pesanan :
                <span class="text-success font-weight-bolder"><?= rupiah($inv['amount']) ?></span>
            </h4>
            <?php
                        if ($inv['status'] === 0) {
                            echo '<a href="#" class="btn btn-theme-orange btn-sm float-right">Bayar sekarang</a>';
                        } elseif ($inv['status'] === 1) {
                            echo '<a href="#" class="btn btn-info btn-sm float-right">Sedang dikemas</a>';
                        } elseif ($inv['status'] === 2) {
                            echo '<a href="#" class="btn btn-theme-orange btn-sm float-right">Dalam pengiriman</a>';
                        } elseif ($inv['status'] === 3) {
                            echo '<a href="#" class="btn btn-danger btn-sm float-right">Pesanan dibatalkan</a>';
                        } elseif ($inv['status'] === 4) {
                            echo '<a href="#" class="btn btn-theme-orange btn-sm float-right">Pesanan dibatalkan</a>';
                        }
                        ?>
        </div>
    </div>
</div>
<?php
        }
    }
}
?>