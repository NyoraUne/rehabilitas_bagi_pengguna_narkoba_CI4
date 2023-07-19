<?php

namespace App\Controllers;

use App\Models\Mod_user;
use App\Models\Mod_petugas;

class Con_petugas extends BaseController
{
    protected $session;
    protected $Mod_user;
    protected $Mod_petugas;
    public function __construct()
    {
        $this->session = session();
        $this->Mod_user = new Mod_user();
        $this->Mod_petugas = new Mod_petugas();
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
        $user = $this->Mod_user->findAll();
        $petugas = $this->Mod_petugas
            ->select('*, DATE(tb_petugas.created_at) AS created_date')
            ->select('tb_petugas.created_at')
            ->join('tb_user', 'tb_user.id_user = tb_petugas.id_user')
            ->findAll();


        // dd($username);

        $bread = '<li class="breadcrumb-item active">Data Petugas</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $data = [
            'title' => 'Yazid - 19630289',
            'head' => 'Form Input Data Petugas.',
            'type' => $bread,
            'username' => $username,
            'user' => $user,
            'petugas' => $petugas,
        ];


        return view('admin/petugas/index', $data);
    }
    function tambah_data()
    {
        $input = $this->request->getPost();

        // upload File
        $foto_petugas = $this->request->getFile('foto_petugas');
        $FileName = 'Foto-Petugas-' . $input['id_user'] . '.' . $foto_petugas->getExtension();
        $foto_petugas->move(ROOTPATH . 'public/foto_petugas/', $FileName);

        $data = [
            'id_user' => $input['id_user'],
            'foto_petugas' => $FileName,
            'role' => 'Petugas',
        ];

        $status = $this->Mod_petugas->insert($data);

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
