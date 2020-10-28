<form class="theme-form" method="POST">
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required=""
                    value="<?= $data_agent['name'] ?>">
                <input type="hidden" value="<?= $data_agent['name'] ?>" name="name_verif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">No. Handphone</label>
                <input type="number" min="0" name="phone" class="form-control" id="phone" placeholder="No. Handphone"
                    required="" value="<?= $data_agent['phone'] ?>" onkeypress="return AvoidSpace(event)">
                <input type="hidden" value="<?= $data_agent['phone'] ?>" name="phone_verif">
            </div>
        </div>
        <div class="col-md-12">
            <button name="btn-update-agent-profile" class="btn btn-rounded black-btn float-right">
                Perbaharui Data
            </button>
        </div>
    </div>
</form>