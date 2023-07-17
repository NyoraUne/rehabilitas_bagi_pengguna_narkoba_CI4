<?php

namespace App\Controllers;

class Con_petugas extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = session();
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

        $bread = '<li class="breadcrumb-item active">Admin</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $data = [
            'title' => 'Dashboard User',
            'head' => 'Sistem informasi ketersediaan harga ikan di pasar pada kantor dinas perikanan(DISKAN) Rantau Kabupaten Tapin Berbasis WEB.',
            'type' => $bread,
            'username' => $username,
        ];


        return view('admin/petugas/index', $data);
    }
}
