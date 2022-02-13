<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use DateTime;
use \Geeklabs\Breadcrumbs\Breadcrumb;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->breadcrumb = new Breadcrumb();
        $this->userModel = new UserModel();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $id = session('id');

        //$getSync = $this->authModel->where('user', $username)->first();
        $getVerified = $this->userModel->getSync($id);

        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if (!$getVerified) {
            return redirect()->to('user/verify');
        }

        $data = [
            'title' => 'Selamat Datang'
        ];

        return view('user/index', $data);
    }
    public function verify()
    {
        $data = [
            'user' => $this->session->get('user'),
            'session' => $this->session,
        ];

        return view('user/verify', $data);
    }
    public function confirm()
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
        $user = $this->request->getVar('user');
        $userDb = $this->authModel->where('user', $user)->first();
        $id = $this->request->getVar('id');
        $pass = $this->request->getVar('pass');
        $idDb = $userDb['id'];

        if ($userDb['pass'] != md5($pass) . $userDb['salt']) {
            session()->setFlashdata('error', 'Password Salah');
            return redirect()->to('/user/confirm');
        } else {
            session()->setFlashdata('success', 'Berhasil di Sinkronisasi. Silahkan Login !');
            $this->userModel->sync($id, $idDb);
            return view('/auth/login');
        }
    }
    public function detail()
    {
        $id = session('id_orang');
        $query = $this->userModel->where('id', $id)->first();
        $data = [
            'title' => 'Data Anggota',
            'anggota' => $query,
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('/user/detail', $data);
    }
    public function editFoto($callsign)
    {

        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Foto Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editFoto', $data);
    }
    public function editIar($callsign)
    {

        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Scan IAR Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editIar', $data);
    }
    public function editKtp($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Scan KTP Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editKtp', $data);
    }
    public function editKta($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Scan KTA',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editKta', $data);
    }
    public function edit($callsign)
    {
        // $id = $this->request->getVar('id');

        $getDetail = $this->userModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editAnggota', $data);
    }
}
