<form class="theme-form" method="POST">
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Supplier" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Alamat Toko</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Toko" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="phone">No. Handphone</label>
                <input type="number" min="0" name="phone" class="form-control" id="phone" placeholder="No. Handphone"
                    required="" onkeypress="return AvoidSpace(event)">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">NIB</label>
                <input type="text" name="nib" class="form-control" id="nib" placeholder="NIB">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="phone">Kode Agen</label>
                <input type="text" name="kode_agen" class="form-control" id="phone" placeholder="Kode Agen" required=""
                    onkeypress="return AvoidSpace(event)">
            </div>
        </div>
        <div class="col-md-12">
            <button name="btn-register-supplier" class="btn btn-rounded black-btn float-right">
                Daftar Supplier
            </button>
        </div>
    </div>
</form>