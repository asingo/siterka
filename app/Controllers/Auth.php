<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->authModel = new AuthModel();

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

    // public function register()
    // {
    //     //menampilkan halaman register
    //     return view('auth/login#signup');
    // }

    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getVar();

        //jalankan validasi
        $cek = $this->validation->run($data, 'register');


        //cek errornya
        $errors = $this->validation->getErrors();

        //jika ada error kembalikan ke halaman register
        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('/auth/login#signup');
        }

        //jika tdk ada error 

        //buat salt
        $salt = uniqid('', true);

        //hash password digabung dengan salt
        $password = md5($data['pass']) . $salt;

        //masukan data ke database
        $this->authModel->save([
            'user' => $data['user'],
            'pass' => $password,
            'name' => $data['name'],
            'pic'  => 'photo.png',
            'salt' => $salt,
            'role' => 2
        ]);

        //arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('/auth/login');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getVar();

        //ambil data user di database yang usernamenya sama 
        $user = $this->authModel->where('user', $data['username'])->first();

        //cek apakah username ditemukan
        if ($user) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($user['pass'] != md5($data['password']) . $user['salt']) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'user' => $user['user'],
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'pic'  => $user['pic'],
                ];
                $this->session->set($sessLogin);
                //cek role dari session
                if ($this->session->get('role') != 1) {
                    return redirect()->to('/user');
                }

                return redirect()->to('/admin');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('/auth/login');
        }
    }


    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }
}