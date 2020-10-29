<div class="box-account box-info">
    <h5 class="text-left mb-3" style="color: #272727;">Daftar Supplier</h5>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-hover" id="agent-supplier-list">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIB</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data_agent_supplier = $data_agent['supplier'];
                    $no = 1;
                    foreach ($data_agent_supplier as $das) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $das['name'] ?></td>
                        <td><?= $das['nib'] ?></td>
                        <td><?= $das['address'] ?></td>
                        <td><?= $das['phone'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>