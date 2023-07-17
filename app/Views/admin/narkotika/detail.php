<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>
        <form action="<?= base_url('Con_narkotika/simpan_edit/' . $narkotika['id_narkotika']); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <!-- /* ----------------------- //NOTE - Col Pertama start ----------------------- */ -->
                    <!-- input data -->
                    Nama Narkotika :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="nama_narkotika" type="text" class="form-control" value="<?= $narkotika['nama_narkotika']; ?>" required>
                    </div>

                    <!-- input data -->
                    Gambar :
                    <div class="input-group mb-2 input-group-sm">
                        <input name="foto" type="file" class="form-control" value="<?= $narkotika['foto']; ?>">
                        <a class="btn btn-outline-info" target="_blank" href="<?= base_url('Con_narkotika/showImage/' . $narkotika['id_narkotika']); ?>"><?= $narkotika['foto']; ?></a>
                    </div>
                    <!-- /* ------------------------ //NOTE - Col Pertama end ------------------------ */ -->
                </div>
                <div class="col">
                    <!-- /* ------------------------ //NOTE - Col kedua start ------------------------ */ -->


                    <!-- input data -->
                    Keterangan :
                    <div class="input-group mb-2 input-group-sm">
                        <textarea name="keterangan" class="form-control" rows="4"><?= $narkotika['keterangan']; ?></textarea>
                    </div>

                    <br>

                    <!-- /* ------------------------- //NOTE - Col kedua end ------------------------- */ -->
                </div>
                <div class="row">
                    <div class="col">

                        <div class="float-end">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                            <a href="<?= base_url('Con_narkotika/index'); ?>" class="btn btn-warning btn-sm">Kembali</a>
                            <a href="<?= base_url('Con_narkotika/hapus_data/' . $narkotika['id_narkotika']); ?>" class="btn btn-danger btn-sm" onclick="return confirmAction(event)">Hapus Data</a>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->include('nav/foot'); ?>