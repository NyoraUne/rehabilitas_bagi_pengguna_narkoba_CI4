<?php

namespace App\Controllers;

use App\Models\Mod_user;
use App\Models\Mod_petugas;
use App\Models\Mod_pengguna;
use App\Models\Mod_rmedis;


class Con_rekam_medis extends BaseController
{
    protected $session;
    protected $Mod_user;
    protected $Mod_rmedis;
    protected $Mod_pengguna;
    protected $Mod_petugas;
    public function __construct()
    {
        $this->session = session();
        $this->Mod_user = new Mod_user();
        $this->Mod_petugas = new Mod_petugas();
        $this->Mod_rmedis = new Mod_rmedis();
        $this->Mod_pengguna = new Mod_pengguna();
    }

    public function index()
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
        $pengguna = $this->Mod_pengguna
            ->join('tb_user', 'tb_user.id_user = tb_pengguna.id_user')
            ->findAll();

        $rekam = $this->Mod_rmedis
            ->join('tb_pengguna', 'tb_pengguna.id_pengguna = tb_rekam_medis.id_pengguna')
            ->join('tb_user', 'tb_user.id_user = tb_pengguna.id_user')
            ->findAll();

        // $petugas = $this->Mod_petugas
        //     ->select('*, DATE(tb_petugas.created_at) AS created_date')
        //     ->select('tb_petugas.created_at')
        //     ->join('tb_user', 'tb_user.id_user = tb_petugas.id_user')
        //     ->findAll();


        // dd($username);

        $bread = '<li class="breadcrumb-item active">Data Rekam Medis</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $data = [
            'title' => 'Yazid - 19630289',
            'head' => 'Form Input Data Rekam Medis.',
            'type' => $bread,
            'username' => $username,
            'pengguna' => $pengguna,
            'rekam' => $rekam,
        ];


        return view('admin/rekam_medis/index', $data);
    }
    function tambah_data() //ANCHOR - Tambah Data
    {
        $input = $this->request->getPost();

        $data = [
            'id_pengguna' => $input['id_user'],
            'tgl_pemeriksaan' => $input['tgl_pemeriksaan'],
            'hasil_pemeriksaan' => $input['hasil_pemeriksaan'],
        ];

        $status = $this->Mod_rmedis->insert($data);

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->back();
    }
    function hapus_data($id)
    {
        $status = $this->Mod_petugas->where('id_petugas', $id)->delete();
        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success_hapus', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error_hapus', 'Terjadi kesalahan saat menyimpan data.');
        }
        return redirect()->back();
    }
    public function showImage($id) //ANCHOR - Untuk Menampilkan Gambar
    {
        $narkotika = $this->Mod_petugas->where('id_petugas', $id)->first();
        $imageName = $narkotika['foto_petugas'];
        // Get the URI service
        $uri = service('uri');

        // Get the segment containing the image name
        // $imageName = $uri->getSegment(3);

        // Determine the file path of the image
        $imagePath = ROOTPATH . 'public/foto_petugas/' . $imageName;


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
}
