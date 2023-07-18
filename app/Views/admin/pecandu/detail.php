<?= $this->include('nav/head'); ?>
<div class="card">
    <div class="card-body">
        <?= $this->include('alert/index'); ?>
        <div class="row">
            <div class="col-5">
                <h5>
                    Data Diri orang yang terdampak oleh narkotika.
                </h5>
                <hr>

                <div class="row">
                    <div class="col-3">
                        Nik <br>
                        Nama <br>
                        Tempat Lahir <br>
                        Tgl Lahir <br>
                        Jenis Kelamin <br>
                        Alamat <br>
                        Desa <br>
                        Kecamatan <br>
                        Kabupaten <br>
                        Rt/Rw <br>
                        Agama <br>
                        Status Pernikahan <br>
                        KTP (PDF) <br>
                    </div>
                    <div class="col">
                        : <?= $pengguna['nik_user']; ?> <br>
                        : <?= $pengguna['nama_user']; ?> <br>
                        : <?= $pengguna['lahir_user']; ?> <br>
                        : <?= $pengguna['tgllahir_user']; ?> <br>
                        : <?= $pengguna['jekel_user']; ?> <br>
                        : <?= $pengguna['jekel_user']; ?> <br>
                        : <?= $pengguna['alamat_user']; ?> <br>
                        : <?= $pengguna['desa_user']; ?> <br>
                        : <?= $pengguna['kecamatan_user']; ?> <br>
                        : <?= $pengguna['kabupaten_user']; ?> <br>
                        : <?= $pengguna['rt_user']; ?>/<?= $pengguna['rw_user']; ?> <br>
                        : <?= $pengguna['agama_user']; ?> <br>
                        : <?= $pengguna['kawin_user']; ?> <br>
                        : <a target="_blank" href="<?= base_url('Con_pecandu/showpdf/' . $pengguna['ktp_user']); ?>"><?= $pengguna['ktp_user']; ?></a> <br>
                    </div>
                </div>

            </div>
            <div class="col">
                <h5>
                    Narkotika Yang Teridentifikasi Telah Di Konsumsi :
                </h5>
                <hr>
                <form action="<?= base_url('Con_pecandu/tambah_narkotika/' . $pengguna['id_pengguna']); ?>" method="post">
                    <div class="row mb-2">
                        <div class="col">
                            Nama Narkotika :
                            <div class="input-group mb-3">
                                <select id="select" name="id_narkotika" class="form-select" required>
                                    <option value=""></option>
                                    <?php foreach ($narkotika as $na) : ?>
                                        <option value="<?= $na['id_narkotika']; ?>"><?= $na['id_narkotika']; ?> - <?= $na['nama_narkotika']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <!-- input data -->
                            Pasal :
                            <div class="input-group mb-2 ">
                                <input name="pasal" type="text" class="form-control">
                            </div>

                            <div class=" d-grid">
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <table id="tb1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Narkotika</th>
                            <th>Pasal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($detai_pengguna as $dp) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dp['nama_narkotika']; ?></td>
                                <td>
                                    <a href="" class="link-dark" data-bs-toggle="tooltip" data-bs-placement="left" title="<?= $dp['pasal']; ?>">
                                        <?= strlen($dp['pasal']) > 40 ? substr($dp['pasal'], 0, 40) . '...' : $dp['pasal']; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('Con_pecandu/hapus_narkotika/' . $dp['id_detail_pengguna']); ?>" class="btn btn-ssm btn-outline-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('nav/foot'); ?>