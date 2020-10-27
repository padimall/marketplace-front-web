<div class="mb-3">
    <span class="badge badge-primary p-1">
        <a href="" class="text-white">Produk Anda</a>
    </span>
    <span class="badge badge-info p-1">
        <a href="" class="text-white">Produk Supplier</a>
    </span>
    <span class="badge badge-dark p-1">
        <a href="" class="text-white">Riwayat Penjualan</a>
    </span>
    <span class="badge badge-success p-1">
        <a href="" class="text-white">Tambah Produk</a>
    </span>
</div>
<div class="welcome-msg">
    <p class="mb-1">Selamat datang, <b><?= $data_agent['name'] ?></b> [Kode Agent :
        <b><?= $data_agent['agent_code'] ?></b>]
    </p>
    <p class="text-justify">Berikut adalah tampilan dashboard utama toko anda. Anda dapat mengubah profil, menambahkan
        produk, melihat
        daftar supplier dan riwayat penjualan disini.</p>
</div>
<div class="box-account box-info">
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Informasi Profil</h3><a href="#">Ubah</a>
                </div>
                <div class="box-content">
                    <h6><?= $data_agent['name'] ?></h6>
                    <h6><?= $data_agent['phone'] ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Newsletters</h3><a href="#">Edit</a>
                </div>
                <div class="box-content">
                    <p>You are currently not subscribed to any newsletter.</p>
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