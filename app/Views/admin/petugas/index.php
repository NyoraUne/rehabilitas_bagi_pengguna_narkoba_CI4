<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">

                <div class="row">
                    <div class="col">
                        Pilih User :
                        <div class="input-group mb-3">
                            <select id="select" name="id_user" class="form-select" required>
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                    </div>
                    <div class="col">
                        Role :
                        <div class="input-group mb-3">
                            <select id="role" name="role" class="form-select" required>
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col"></div>
        </div>
    </div>
</div>
<?= $this->include('nav/foot'); ?>