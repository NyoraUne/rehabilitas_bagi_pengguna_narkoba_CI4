<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>
        <form action="<?= base_url('Con_rekam_medis/tambah_data'); ?>" method="post">
            <div class="row">
                <div class="col">
                    Pilih Data pengguna$pengguna :
                    <div class="input-group mb-3 ">
                        <select id="select" name="id_user" class="form-select" required>
                            <option value=""></option>
                            <?php foreach ($pengguna as $pengguna) : ?>
                                <option value="<?= $pengguna['id_pengguna']; ?>"><?= $pengguna['id_pengguna']; ?> - <?= $pengguna['nik_user']; ?> - <?= $pengguna['nama_user']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col">

                    <!-- input data -->
                    Tangal pemeriksaan :
                    <div class="input-group mb-2 ">
                        <input name="tgl_pemeriksaan" type="date" class="form-control">
                    </div>
                </div>


                <div class="col">

                    <!-- input data -->
                    Hasil Pemeriksaan :
                    <div class="mb-3">
                        <textarea name="hasil_pemeriksaan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="float-end">

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
            <th>Nama</th>
            <th>tgl pemeriksaan</th>
            <th>Hasil Pemeriksaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($rekam as $re) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $re['nama_user']; ?></td>
                <td><?= $re['tgl_pemeriksaan']; ?></td>
                <td><?= $re['hasil_pemeriksaan']; ?></td>
                <td><?= $re['hasil_pemeriksaan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('nav/foot'); ?>