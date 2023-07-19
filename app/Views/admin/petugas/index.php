<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>
        <form action="<?= base_url('Con_petugas/tambah_data'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">

                    Pilih Data User :
                    <div class="input-group mb-3 ">
                        <select id="select" name="id_user" class="form-select" required>
                            <option value=""></option>
                            <?php foreach ($user as $user) : ?>
                                <option value="<?= $user['id_user']; ?>"><?= $user['nik_user']; ?> - <?= $user['nama_user']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="col">

                    <!-- input data -->
                    Foto Petugas :
                    <div class="input-group mb-2 ">
                        <input name="foto_petugas" type="file" class="form-control">
                    </div>



                </div>
                <div class="col">
                    <div class="d-grid gap-2 col-6 mx-auto">

                        <button class="btn btn-primary">Tambah Data</button>
                        <button class="btn btn-warning">Reset Data</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
<table id="tb1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Role</th>
            <th>Tanggal Bergabung</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($petugas as $pe) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pe['nik_user']; ?></td>
                <td><?= $pe['nama_user']; ?></td>
                <td>
                    <a href="<?= base_url('Con_petugas/showImage/' . $pe['id_petugas']); ?>" target="_blank">
                        <?= $pe['foto_petugas']; ?>
                    </a>
                </td>
                <td><?= $pe['role']; ?></td>
                <td><?= $pe['created_date']; ?></td>
                <td>
                    <a class="btn btn-outline-danger btn-ssm" href="<?= base_url('Con_petugas/hapus_data/' . $pe['id_petugas']); ?>">Hapus Data</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('nav/foot'); ?>