<div class="welcome-msg">
    <p class="mb-1">Selamat datang, <b><?= $data_agent['name'] ?></b> [Kode Agen :
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
                    <h3>Informasi Toko</h3>
                    <a href="?edit-profile">Ubah</a>
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
                    <h3>Daftar Supplier Anda</h3>
                    <a href="?supplier-list">Lihat Daftar</a>
                </div>
                <div class="box-content">
                    <p>Lihat dan atur Supplier Anda</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Produk Anda</h3><a href="#">Lihat Daftar</a>
                </div>
                <div class="box-content">
                    <p>Lihat dan atur semua Produk Anda</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Produk Supplier Anda</h3><a href="#">Lihat Daftar</a>
                </div>
                <div class="box-content">
                    <p>Lihat semua produk dari Supplier Anda</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <h3>Riwayat Penjualan</h3><a href="#">Lihat Riwayat</a>
                </div>
                <div class="box-content">
                    <p>Lihat data riwayat penjualan Anda</p>
                </div>
            </div>
        </div>
    </div>
</div>