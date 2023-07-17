<?= $this->include('nav/head'); ?>
<div class="card border-warning">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>

        <form action="<?= base_url('Con_user/simpan_edit/' . $user['id_user']); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- //ANCHOR - Ini Col Bagian Pertama -->
                <div class="col">
                    <!-- input data -->
                    Nik :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="nik_user" type="text" class="form-control" value="<?= $user['nik_user']; ?>" required readonly>
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
                                <input name="tgllahir_user" type="date" class="form-control" value="<?= $user['tgllahir_user']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- input data -->
                    Alamat :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="alamat_user" type="text" class="form-control" value="<?= $user['alamat_user']; ?>" required>
                    </div>

                    <!-- input data -->
                    Kecamatan :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="kecamatan_user" type="text" class="form-control" value="<?= $user['kecamatan_user']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- input data -->
                            RT :
                            <div class="input-group mb-2 input-group-sm">
                                <input name="rt_user" type="text" class="form-control" value="<?= $user['rt_user']; ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <!-- input data -->
                            RW :
                            <div class="input-group mb-2 input-group-sm">
                                <input name="rw_user" type="text" class="form-control" value="<?= $user['rw_user']; ?>" required>
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
                        <input name="ktp_user" type="file" class="form-control">
                        <a class="btn btn-outline-info" href="<?= base_url('Con_user/showpdf/' . $user['ktp_user']); ?>" target="_blank"><?= $user['ktp_user']; ?></a>
                    </div>
                </div>
                <!-- //ANCHOR - Ini Col Bagian Kedua -->
                <div class="col">
                    <!-- input data -->
                    Nama :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="nama_user" type="text" class="form-control" value="<?= $user['nama_user']; ?>" required>
                    </div>

                    <!-- input data -->
                    Jenis Kelamin :
                    <div class="input-group mb-2 input-group-sm">
                        <select name="jekel_user" class="form-select" required>
                            <option value="" selected>Open this select menu</option>
                            <option value="Laki-laki" <?= ($user['jekel_user'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($user['jekel_user'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>

                    <!-- input data -->
                    Desa :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="desa_user" type="text" class="form-control" value="<?= $user['desa_user']; ?>" required>
                    </div>

                    <!-- input data -->
                    Kabupaten :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="kabupaten_user" type="text" class="form-control" value="<?= $user['kabupaten_user']; ?>" required>
                    </div>

                    <!-- input data -->
                    Agama :
                    <div class="input-group mb-2 input-group-sm">
                        <select name="agama_user" class="form-select" required>
                            <option selected>Open this select menu</option>
                            <option value="Islam" <?= ($user['agama_user'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                            <option value="Kristen" <?= ($user['agama_user'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                            <option value="Hindu" <?= ($user['agama_user'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                            <option value="Buddha" <?= ($user['agama_user'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                            <option value="Konghucu" <?= ($user['agama_user'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                            <option value="Kepercayaan Tradisional" <?= ($user['agama_user'] == 'Kepercayaan Tradisional') ? 'selected' : ''; ?>>Kepercayaan Tradisional</option>
                        </select>

                    </div>

                    <!-- input data -->
                    pekerjaan :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="pekerjaan_user" type="text" class="form-control" value="<?= $user['pekerjaan_user']; ?>" required>
                    </div>

                    <br>
                    <div class="float-end">
                        <button class="btn btn-primary btn-sm">Simpan Data</button>
                        <a href="<?= base_url('Con_user'); ?>" class="btn btn-warning btn-sm">Kembali</a>
                        <a href="<?= base_url('Con_user/hapus_data/' . $user['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return confirmAction(event)">Hapus Data</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<?= $this->include('nav/foot'); ?>