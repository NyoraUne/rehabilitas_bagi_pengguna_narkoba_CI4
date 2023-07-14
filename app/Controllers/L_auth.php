<?php

namespace App\Controllers;

use App\Models\Mod_login;

class L_auth extends BaseController
{
    protected $session;
    protected $Mod_login;
    protected $validation;
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->Mod_login = new Mod_login();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        //menampilkan halaman login
        return view('auth/login');
    }

    public function register()
    {
        //menampilkan halaman register
        return view('auth/register');
    }

    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();

        // dd($data);
        //jalankan validasi
        $this->validation->run($data, 'register');

        //cek errornya
        $errors = $this->validation->getErrors();

        //jika ada error kembalikan ke halaman register
        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('L_auth/register');
        }

        //jika tdk ada error 

        //buat salt

        //hash password digabung dengan salt
        $password = md5($data['password']);

        //masukan data ke database
        $insert = [
            'username' => $data['username'],
            'password' => $password,
            'hak_akses' => 1 //1 = admin, 2 = user
        ];
        $this->Mod_login->insert($insert);

        //arahkan ke halaman login
        return redirect()->to('L_auth/login');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        // dd($data);

        //ambil data user di database yang usernamenya sama 
        $user = $this->Mod_login->where('username', $data['username'])->first();

        //cek apakah username ditemukan
        if ($user) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($user['password'] != md5($data['password'])) {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('L_auth/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $user['username'],
                    'hak_akses' => $user['hak_akses']
                ];
                // dd($sessLogin);
                $this->session->set($sessLogin);
                return redirect()->to('L_admin');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('L_auth/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('L_auth/login');
    }
}
