<?php

namespace App\Controllers;

class L_user extends BaseController
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
            return redirect()->to('/auth/login');
        }
        $username['username'] = session('username');

        $bread = '<li class="breadcrumb-item active">User</li>';
        // $bread1 = '<li class="breadcrumb-item active">1</li>';

        $data = [
            'title' => 'Dashboard User',
            'head' => 'Sistem informasi ketersediaan harga ikan di pasar pada kantor dinas perikanan(DISKAN) Rantau Kabupaten Tapin Berbasis WEB.',
            'type' => $bread,
            'username' => $username,
        ];

        return view('user/index', $data);
    }
}
