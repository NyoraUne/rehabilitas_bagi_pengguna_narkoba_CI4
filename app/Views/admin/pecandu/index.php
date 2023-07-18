<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>
        <form action="<?= base_url('Con_pecandu/tambah_data'); ?>" method="post">
            <div class="row">
                <div class="col">

                    <!-- input data -->
                    Kode Penahanan :
                    <div class="input-group mb-2 ">
                        <input name="kd_penahanan" type="text" class="form-control">
                    </div>

                </div>
                <div class="col">

                    Pilih Data Korban Narkotika :
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
            <th>Np</th>
            <th>Kode Penahanan</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($pengguna as $pengguna) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pengguna['kd_penahanan']; ?></td>
                <td><?= $pengguna['nik_user']; ?></td>
                <td><?= $pengguna['nama_user']; ?></td>
                <td><?= $pengguna['jekel_user']; ?></td>
                <td>
                    <a href="<?= base_url('Con_pecandu/detail_data/' . $pengguna['id_pengguna']); ?>" class="btn btn-outline-info btn-ssm">Proses Data</a>
                    <a href="<?= base_url('Con_pecandu/hapus_data/' . $pengguna['id_pengguna']); ?>" class="btn btn-outline-danger btn-ssm">Hapus Data</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('nav/foot'); ?>