<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use DateTime;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $username = session('user');
        $getUser = $this->authModel->where('user', $username)->first();
        $getVerified = $getUser['verified'];
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if (!$getVerified) {
            return redirect()->to('user/verify');
        }

        return view('user/index');
    }
    public function verify()
    {
        $data = [
            'user' => $this->session->get('user'),
            'session' => $this->session,
        ];

        return view('user/verify', $data);
    }
    public function doVerify()
    {
        $call = $this->request->getVar('callsign');
        $lakuiar = $this->request->getVar('lakuiar');
        $initIar = new DateTime($lakuiar);
        $newiar = $initIar->format('Y-m-d');
        $verify = $this->userModel->verify($call, $newiar);


        if (!$verify) {
            session()->setFlashdata('error', 'Data Tidak Ditemukan Silahkan Logout dan Hubungi Admin');
            return redirect()->to('/user/verify');
        }
        $iarDb = $verify['lakuiar'];
        $initDTiar = new DateTime($iarDb);
        $dtIar = $initDTiar->format('m/d/Y');
        $data = [
            'anggota' => $verify,
            'lakuiar' => $dtIar
        ];

        return view('/user/confirm', $data);
    }
    public function doConfirm()
    {
        # code...
    }
}
