<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?= base_url('Con_user/tambah_user'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- //ANCHOR - Ini Col Bagian Pertama -->
                <div class="col">
                    <!-- input data -->
                    Nik :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="nik_user" type="text" class="form-control" value="<?= $user['nik_user']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- input data -->
                            Tempat Lahir :
                            <div class="input-group mb-2 input-group-sm">
                                <input name="lahir_user" type="text" class="form-control" value="<?= $user['lahir_user']; ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <!-- input data -->
                            Tanggal Lahir :
                            <div class="input-group mb-2 input-group-sm">
                                <input name="tgllahir_user" type="date" class="form-control" value="<?= $user['lahir_user']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- input data -->
                    Alamat :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="alamat_user" type="text" class="form-control" value="<?= $user['lahir_user']; ?>" required>
                    </div>

                    <!-- input data -->
                    Kecamatan :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="kecamatan_user" type="text" class="form-control" value="<?= $user['lahir_user']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- input data -->
                            RT :
                            <div class="input-group mb-2 input-group-sm">
                                <input name="rt_user" type="text" class="form-control" value="<?= $user['lahir_user']; ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <!-- input data -->
                            RW :
                            <div class="input-group mb-2 input-group-sm">
                                <input name="rw_user" type="text" class="form-control" value="<?= $user['lahir_user']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <!-- input data -->
                    Status perikanan :
                    <div class="input-group mb-2 input-group-sm">
                        <select name="kawin_user" class="form-select" required>
                            <option value="belum_menikah" <?= ($user['kawin_user'] == 'belum_menikah') ? 'selected' : ''; ?>>Belum Menikah</option>
                            <option value="menikah" <?= ($user['kawin_user'] == 'menikah') ? 'selected' : ''; ?>>Menikah</option>
                            <option value="cerai" <?= ($user['kawin_user'] == 'cerai') ? 'selected' : ''; ?>>Cerai</option>
                        </select>

                    </div>

                    <!-- input data -->
                    KTP :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="ktp_user" type="file" class="form-control" required>
                    </div>
                </div>
                <!-- //ANCHOR - Ini Col Bagian Kedua -->
                <div class="col">
                    <!-- input data -->
                    Nama :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="nama_user" type="text" class="form-control" required>
                    </div>

                    <!-- input data -->
                    Jenis Kelamin :
                    <div class="input-group mb-2 input-group-sm">
                        <select name="jekel_user" class="form-select" required>
                            <option value="" selected>Open this select menu</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- input data -->
                    Desa :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="desa_user" type="text" class="form-control" required>
                    </div>

                    <!-- input data -->
                    Kabupaten :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="kabupaten_user" type="text" class="form-control" required>
                    </div>

                    <!-- input data -->
                    Agama :
                    <div class="input-group mb-2 input-group-sm">
                        <select name="agama_user" class="form-select" required>
                            <option selected>Open this select menu</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Kepercayaan Tradisional">Kepercayaan Tradisional</option>
                        </select>

                    </div>

                    <!-- input data -->
                    pekerjaan :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="pekerjaan_user" type="text" class="form-control" required>
                    </div>

                    <br>
                    <div class="float-end">

                        <button class="btn btn-primary btn-sm">Reset</button>
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<?= $this->include('nav/foot'); ?>