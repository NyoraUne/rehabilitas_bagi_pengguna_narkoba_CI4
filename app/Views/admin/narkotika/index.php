<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>
        <form action="<?= base_url('Con_narkotika/simpan_data'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <!-- /* ----------------------- //NOTE - Col Pertama start ----------------------- */ -->
                    <!-- input data -->
                    Nama Narkotika :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="nama_narkotika" type="text" class="form-control" required>
                    </div>

                    <!-- input data -->
                    Gambar :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="foto" type="file" class="form-control" required>
                    </div>
                    <!-- /* ------------------------ //NOTE - Col Pertama end ------------------------ */ -->
                </div>
                <div class="col">
                    <!-- /* ------------------------ //NOTE - Col kedua start ------------------------ */ -->


                    <!-- input data -->
                    Keterangan :
                    <div class="input-group mb-2 input-group-sm">
                        <textarea name="keterangan" class="form-control" rows="4" required></textarea>
                    </div>

                    <br>

                    <!-- /* ------------------------- //NOTE - Col kedua end ------------------------- */ -->
                </div>
                <div class="row">
                    <div class="col">

                        <div class="float-end">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                            <button type="reset" class="btn btn-warning btn-sm">Reset Data</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /* ----------------------- //NOTE - Ini Table Start ----------------------- */ -->
<hr>
<table id="tb1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Narkotika</th>
            <th>Foto</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($narkotika as $na) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $na['nama_narkotika']; ?></td>
                <td>
                    <a href="<?= base_url('Con_narkotika/showImage/' . $na['id_narkotika']); ?>" target="_blank">
                        <?= $na['foto']; ?>
                    </a>
                </td>
                <td><?= strlen($na['keterangan']) > 40 ? substr($na['keterangan'], 0, 40) . '...' : $na['keterangan']; ?>
                </td>
                <td>
                    <a href="<?= base_url('Con_narkotika/detail/' . $na['id_narkotika']); ?>" class="btn btn-outline-info btn-ssm">Detail Data</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- /* ----------------------- //NOTE - Ini Table End ----------------------- */ -->
<?= $this->include('nav/foot'); ?>