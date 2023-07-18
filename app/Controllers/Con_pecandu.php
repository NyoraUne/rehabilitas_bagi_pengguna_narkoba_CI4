<?php

namespace App\Controllers;

use App\Models\Mod_pengguna;
use App\Models\Mod_user;
use App\Models\Mod_detail_pengguna;
use App\Models\Mod_narkotika;


class Con_pecandu extends BaseController
{
    protected $Mod_detail_pengguna;
    protected $Mod_user;
    protected $Mod_narkotika;
    protected $Mod_pengguna;
    protected $session;
    public function __construct()
    {
        $this->session = session();
        $this->Mod_user = new Mod_user();
        $this->Mod_pengguna = new Mod_pengguna();
        $this->Mod_narkotika = new Mod_narkotika();
        $this->Mod_detail_pengguna = new Mod_detail_pengguna();
    }

    public function index() //ANCHOR - index
    {
        if (!session('isLogin')) {
            return redirect()->to('L_auth/login');
        }
        if (session('hak_akses') != 1) {
            return redirect()->to('L_user');
        }


        $username['username'] = session('username');
        $pengguna = $this->Mod_pengguna
            ->join('tb_user', 'tb_user.id_user=tb_pengguna.id_user')
            ->orderBy('tb_pengguna.created_at', 'desc')
            ->findAll();

        $user = $this->Mod_user
            ->whereNotIn('id_user', function ($builder) {
                $builder->select('id_user')->from('tb_pengguna');
            })
            ->findAll();

        // dd($username);

        $bread = '<li class="breadcrumb-item active">Data Pecandu</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $data = [
            'title' => 'Yazid - 19630289',
            'head' => 'Form input data orang yang terdampak oleh narkotika.',
            'type' => $bread,
            'username' => $username,
            'pengguna' => $pengguna,
            'user' => $user,

        ];


        return view('admin/pecandu/index', $data);
    }
    function tambah_data() //ANCHOR - Tambah Data
    {
        $input = $this->request->getPost();
        $data = [
            'kd_penahanan' => $input['kd_penahanan'],
            'id_user' => $input['id_user'],
        ];

        $status = $this->Mod_pengguna->insert($data);

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }
        return redirect()->back();
    }
    function detail_data($id) //ANCHOR - detail data
    {
        $pengguna = $this->Mod_pengguna
            ->join('tb_user', 'tb_user.id_user=tb_pengguna.id_user')
            ->where('id_pengguna', $id)
            ->first();

        $detai_pengguna = $this->Mod_detail_pengguna
            ->join('tb_narkotika', 'tb_narkotika.id_narkotika=tb_detail_pengguna.id_narkotika')
            ->where('id_pengguna', $id)
            ->findAll();

        $narkotika = $this->Mod_narkotika->findAll();



        /* -------------------------------- Pembatas -------------------------------- */
        if (!session('isLogin')) {
            return redirect()->to('L_auth/login');
        }
        if (session('hak_akses') != 1) {
            return redirect()->to('L_user');
        }
        $username['username'] = session('username');
        $i = 'ID : ' . $pengguna['id_pengguna'] . ' - ' . $pengguna['kd_penahanan'];
        $bread = "
        <li class='breadcrumb-item active'><a href='../'>Data Pecandu</a></li>
        <li class='breadcrumb-item active'>Detail Pecandu $i</li>";
        $data = [
            'title' => 'Yazid - 19630289',
            'head' => 'Form Detail Dan Edit data orang yang terdampak oleh narkotika.',
            'type' => $bread,
            'username' => $username,
            'pengguna' => $pengguna,
            'detai_pengguna' => $detai_pengguna,
            'narkotika' => $narkotika,

        ];

        return view('admin/pecandu/detail', $data);
    }
    function tambah_narkotika($id) //ANCHOR - Tambah Narkotika perorang
    {
        $input = $this->request->getPost();

        $data = [
            'id_pengguna' => $id,
            'id_narkotika' => $input['id_narkotika'],
            'pasal' => $input['pasal'],
        ];

        $status = $this->Mod_detail_pengguna->insert($data);
        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }
        return redirect()->back();
    }


    public function showpdf($id) //ANCHOR - Tampilkan pdf
    {
        $data = $this->Mod_user->where('ktp_user', $id)->first();

        $pdfPath = FCPATH . 'data/'  . $id;
        // dd($pdfPath);
        // header('Content-Type: application/pdf');
        $this->response->setHeader('Content-Type', 'application/pdf');
        readfile($pdfPath);
    }
    function hapus_data($id)
    {
        $status = $this->Mod_pengguna
            ->where('id_pengguna', $id)
            ->delete();
        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success_hapus', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error_hapu', 'Terjadi kesalahan saat menyimpan data.');
        }
        return redirect()->back();
    }
}
