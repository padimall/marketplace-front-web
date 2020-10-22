<form class="theme-form" method="POST">
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Agen" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">No. Handphone</label>
                <input type="number" min="0" name="phone" class="form-control" id="phone" placeholder="No. Handphone"
                    required="" onkeypress="return AvoidSpace(event)">
            </div>
        </div>
        <div class="col-md-12">
            <button name="btn-register-agent" class="btn btn-rounded black-btn float-right">
                Daftar Agen
            </button>
        </div>
    </div>
</form>