<div class="welcome-msg">
    <p class="mb-1">
        Selamat datang, <b><?= $data_supplier['name'] ?></b> </b>
    </p>
    <p class="text-justify">Berikut adalah tampilan dashboard utama toko anda. Anda dapat mengubah profil, menambahkan
        produk dan riwayat penjualan disini.</p>
</div>
<div class="box-account box-info">
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Informasi Profil</h3><a href="#">Ubah</a>
                </div>
                <div class="box-content">
                    <h6><?= $data_supplier['name'] ?></h6>
                    <h6><?= $data_supplier['phone'] ?></h6>
                    <h6><?= $data_supplier['address'] ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Produk Anda</h3><a href="?product">Lihat Daftar</a>
                </div>
                <div class="box-content">
                    <p>Lihat dan atur semua Produk Anda</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="box">
            <div class="box-title">
                <h3>Address Book</h3><a href="#">Manage Addresses</a>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h6>Default Billing Address</h6>
                    <address>You have not set a default billing address.<br><a href="#">Edit Address</a></address>
                </div>
                <div class="col-sm-6">
                    <h6>Default Shipping Address</h6>
                    <address>You have not set a default shipping address.<br><a href="#">Edit Address</a></address>
                </div>
            </div>
        </div>
    </div>
</div>