<?php

namespace App\Controllers;

use App\Models\Mod_narkotika;

class Con_narkotika extends BaseController
{
    protected $session;
    protected $Mod_narkotika;
    public function __construct()
    {
        $this->session = session();
        $this->Mod_narkotika = new Mod_narkotika();
    }

    public function index() //ANCHOR - Index nya
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('L_auth/login');
        }

        //cek role dari session
        if ($this->session->get('hak_akses') != 1) {
            return redirect()->to('L_user');
        }
        $username['username'] = session('username');


        $narkotika = $this->Mod_narkotika->findAll();

        $bread = '<li class="breadcrumb-item active">Data Narkotika</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $data = [
            'title' => 'Yazid - 19630289',
            'head' => 'Form Input Data Narkotika',
            'type' => $bread,
            'username' => $username,
            'narkotika' => $narkotika,
        ];


        return view('admin/narkotika/index', $data);
    }
    public function showImage($id) //ANCHOR - Untuk Menampilkan Gambar
    {
        $narkotika = $this->Mod_narkotika->where('id_narkotika', $id)->first();
        $imageName = $narkotika['foto'];
        // Get the URI service
        $uri = service('uri');

        // Get the segment containing the image name
        // $imageName = $uri->getSegment(3);

        // Determine the file path of the image
        $imagePath = ROOTPATH . 'public/narkotika/' . $imageName;


        // Check if the image file exists
        if (file_exists($imagePath) && is_file($imagePath)) {
            // Determine the content type as an image
            $contentType = mime_content_type($imagePath);

            // Set the HTTP response header
            header('Content-Type: ' . $contentType);

            // Display the image file
            readfile($imagePath);
            exit;
        } else {
            echo 'Image file not found, display an error message or redirect as needed';
        }
    }
    function simpan_data()
    {
        $input = $this->request->getPost();

        // upload File
        $narkotika = $this->request->getFile('foto');
        $FileName = $input['nama_narkotika'] . '.' . $narkotika->getExtension();
        $narkotika->move(ROOTPATH . 'public/narkotika/', $FileName);

        $data = [
            'nama_narkotika' => $input['nama_narkotika'],
            'foto' => $FileName,
            'keterangan' => $input['keterangan'],
        ];

        $status = $this->Mod_narkotika->insert($data);

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->back();
    }
    function detail($id) //ANCHOR - Detail Data
    {
        $narkotika = $this->Mod_narkotika->where('id_narkotika', $id)->first();
        $i = 'ID : ' . $narkotika['id_narkotika'] . ' - ' . $narkotika['nama_narkotika'];
        $bread = "
        <li class='breadcrumb-item active'><a href='../'>Data Narkotika</a></li>
        <li class='breadcrumb-item active'>Detail Narkotika $i</li>";
        // $bread1 = '<li class="breadcrumb-item active">1</li>';
        $username['username'] = session('username');
        $data = [
            'title' => 'Yazid - 19630289',
            'head' => 'Form Edit Data Narkotika.',
            'type' => $bread,
            'username' => $username,
            'narkotika' => $narkotika,
        ];

        return view('admin/narkotika/detail', $data);
    }
    function simpan_edit($id) //ANCHOR - Simpan Edit
    {
        $input = $this->request->getPost();


        if (!empty($_FILES['foto']['name'])) {
            $narkotika = $this->request->getFile('foto');
            $FileName = $input['nama_narkotika'] . '.' . $narkotika->getExtension();
            $narkotika->move(ROOTPATH . 'public/narkotika/', $FileName);
        } else {
            $narkotika = $this->Mod_narkotika->where('id_narkotika', $id)->first();
            $FileName = $narkotika['foto']; // Tidak ada perubahan pada `ktp_user`
        }


        $data = [
            'nama_narkotika' => $input['nama_narkotika'],
            'foto' => $FileName,
            'keterangan' => $input['keterangan'],
        ];

        $status = $this->Mod_narkotika->update($id, $data);

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->back();

        dd($id, $input);
    }
    function hapus_data($id)
    {
        $status = $this->Mod_narkotika->where('id_narkotika', $id)->delete();

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success_hapus', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error_hapus', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->to('Con_narkotika');
    }
}
