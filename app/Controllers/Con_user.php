<?php

namespace App\Controllers;

use App\Models\Mod_user;

class Con_user extends BaseController
{
    protected $session;
    protected $Mod_user;
    public function __construct()
    {
        $this->session = session();
        $this->Mod_user = new Mod_user();
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

        // dd($username);

        $bread = '<li class="breadcrumb-item active">Data User</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $user = $this->Mod_user->findAll();

        $data = [
            'title' => 'Dashboard Admin',
            'head' => 'Form Input User.',
            'type' => $bread,
            'username' => $username,
            'user' => $user,
        ];


        return view('admin/user/index', $data);
    }
    function tambah_user()
    {
        $input = $this->request->getPost();
        $slug = url_title($input['nama_user'], '-', true);
        $slugs = $input['nik_user'] . '_' . $slug;
        $nama = ucwords($input['nama_user']);

        // upload File
        $ktp = $this->request->getFile('ktp_user');
        $FileName = $slugs . '.' . $ktp->getExtension();
        $ktp->move(ROOTPATH . 'public/data/', $FileName);


        $data = [
            'nik_user' => $input['nik_user'],
            'nama_user' => $nama,
            'lahir_user' => $input['lahir_user'],
            'tgllahir_user' => $input['tgllahir_user'],
            'jekel_user' => $input['jekel_user'],
            'alamat_user' => $input['alamat_user'],
            'desa_user' => $input['desa_user'],
            'kecamatan_user' => $input['kecamatan_user'],
            'kabupaten_user' => $input['kabupaten_user'],
            'rt_user' => $input['rt_user'],
            'rw_user' => $input['rw_user'],
            'agama_user' => $input['agama_user'],
            'kawin_user' => $input['kawin_user'],
            'pekerjaan_user' => $input['pekerjaan_user'],
            'ktp_user' => $FileName,
            'slug' => $slugs,
        ];

        $status = $this->Mod_user->insert($data);

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->back();
    }

    function detail_user($id)
    {
        $user = $this->Mod_user->where('id_user', $id)->first();
        $i = $user['slug'];
        // dd($i);
        $bread = "
        
        <li class='breadcrumb-item active'><a href='../'>Data User</a></li>
        <li class='breadcrumb-item active'>Detail User : $i</li>";

        $username['username'] = session('username');

        $data = [
            'title' => 'Dashboard Admin',
            'head' => 'Form Edit User.',
            'type' => $bread,
            'username' => $username,
            'user' => $user,
        ];

        return view('admin/user/detail', $data);
    }
    function simpan_edit($id)
    {
        $input = $this->request->getPost();

        $slug = url_title($input['nama_user'], '-', true);
        $slugs = $input['nik_user'] . '_' . $slug;
        $nama = ucwords($input['nama_user']);

        // Cek apakah input file KTP diisi
        if (!empty($_FILES['ktp_user']['name'])) {
            // upload File
            $ktp = $this->request->getFile('ktp_user');
            $FileName = $slugs . '.' . $ktp->getExtension();

            $destinationPath = ROOTPATH . 'public/data/';
            $ktp->move($destinationPath, $FileName, true);
        } else {
            $ktp = $this->Mod_user->where('id_user', $id)->first();
            $FileName = $ktp['ktp_user']; // Tidak ada perubahan pada `ktp_user`
        }

        $data = [
            'nik_user' => $input['nik_user'],
            'nama_user' => $nama,
            'lahir_user' => $input['lahir_user'],
            'tgllahir_user' => $input['tgllahir_user'],
            'jekel_user' => $input['jekel_user'],
            'alamat_user' => $input['alamat_user'],
            'desa_user' => $input['desa_user'],
            'kecamatan_user' => $input['kecamatan_user'],
            'kabupaten_user' => $input['kabupaten_user'],
            'rt_user' => $input['rt_user'],
            'rw_user' => $input['rw_user'],
            'agama_user' => $input['agama_user'],
            'kawin_user' => $input['kawin_user'],
            'pekerjaan_user' => $input['pekerjaan_user'],
            'ktp_user' => $FileName,
            'slug' => $slugs,
        ];

        $status = $this->Mod_user->update($id, $data);

        if ($status) {
            // Jika data berhasil disimpan
            $this->session->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Jika data gagal disimpan
            $this->session->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->back();
    }
    public function showpdf($id)
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
        $this->Mod_user->delete($id);

        return redirect()->to('/Con_user/index');
    }
}
