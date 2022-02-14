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
        $count = $this->userModel->count();

        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if (!$getVerified) {
            return redirect()->to('user/verify');
        }

        $data = [
            'title' => 'Selamat Datang',
            'jumlah' => $count
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
    public function editFoto()
    {

        $callsign = $this->request->getVar('callsign');

        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Foto Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editFoto', $data);
    }
    public function editIar()
    {
        $callsign = $this->request->getVar('callsign');

        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Scan IAR Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editIar', $data);
    }
    public function editKtp()
    {
        $callsign = $this->request->getVar('callsign');
        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Scan KTP Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editKtp', $data);
    }
    public function editKta()
    {
        $callsign = $this->request->getVar('callsign');
        $getDetail = $this->userModel->where('callsign', $callsign)->first();
        $data = [
            'title' => 'Ubah Data Scan KTA',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editKta', $data);
    }
    public function editAnggota()
    {
        $callsign = $this->request->getVar('callsign');

        $getDetail = $this->userModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/editAnggota', $data);
    }
    public function callbook()
    {
        $anggota = $this->userModel->findAll();
        $data = [
            'title' => 'Callbook Anggota',
            'anggota' => $anggota
        ];
        return view('user/callbook', $data);
    }
    public function detailCallbook($callsign)
    {
        $getDetail = $this->userModel->getDetail($callsign);
        $data = [
            'title' => 'Data Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('user/detailCallbook', $data);
    }
    public function doEditFoto()
    {
        $id = $this->request->getVar('id');
        $callsign = $this->request->getVar('callsign');
        $fotoLama = $this->request->getVar('oldFoto');

        if (!$this->validate(
            [
                'foto' => [
                    'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar Terlalu Besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Silahkan Pilih Format Gambar JPG, JPEG, PNG'
                    ]
                ]
            ]
        )) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/register')->withInput()->with('validation', $validation);
            return redirect()->to('/user/edit/foto/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/user/edit/foto/' . $callsign);
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/anggota', $namaFoto);
            if (!$fotoLama == null) {
                unlink('img/anggota/' . $fotoLama);
            }
        }


        $exc = $this->userModel->save(
            [
                'id' => $id,
                'foto' => $namaFoto
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/user/detail');
    }
    public function doEditIar()
    {
        $id = $this->request->getVar('id');
        $callsign = $this->request->getVar('callsign');
        $scanIarOld = $this->request->getVar('oldScanIar');

        if (!$this->validate(
            [
                'scaniar' => [
                    'rules' => 'max_size[scaniar,2048]|is_image[scaniar]|mime_in[scaniar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar Terlalu Besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Silahkan Pilih Format Gambar JPG, JPEG, PNG'
                    ]
                ]
            ]
        )) {
            return redirect()->to('/user/edit/iar/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileScanIar = $this->request->getFile('scaniar');
        if ($fileScanIar->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/user/edit/iar/' . $callsign);
        } else {
            $namaScanIar = $fileScanIar->getRandomName();
            $fileScanIar->move('img/iar', $namaScanIar);

            if (!$scanIarOld == null) {
                unlink('img/iar/' . $scanIarOld);
            }
        }


        $exc = $this->userModel->save(
            [
                'id' => $id,
                'scaniar' => $namaScanIar
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/user/detail');
    }
    public function doEditKtp()
    {
        $id = $this->request->getVar('id');
        $callsign = $this->request->getVar('callsign');
        $fotoKtpOld = $this->request->getVar('oldFotoKtp');

        if (!$this->validate(
            [
                'fotoktp' => [
                    'rules' => 'max_size[fotoktp,2048]|is_image[fotoktp]|mime_in[fotoktp,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar Terlalu Besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Silahkan Pilih Format Gambar JPG, JPEG, PNG'
                    ]
                ]
            ]
        )) {
            return redirect()->to('/user/edit/ktp/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileFotoKtp = $this->request->getFile('fotoktp');
        if ($fileFotoKtp->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/edit/ktp/' . $callsign);
        } else {
            $namaFotoKtp = $fileFotoKtp->getRandomName();
            $fileFotoKtp->move('img/ktp', $namaFotoKtp);

            if (!$fotoKtpOld == null) {
                unlink('img/ktp/' . $fotoKtpOld);
            }
        }


        $exc = $this->userModel->save(
            [
                'id' => $id,
                'fotoktp' => $namaFotoKtp
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/user/detail');
    }
    public function doEditKta()
    {
        $id = $this->request->getVar('id');
        $callsign = $this->request->getVar('callsign');
        $scanKtaOld = $this->request->getVar('oldScanKta');

        if (!$this->validate(
            [
                'scankta' => [
                    'rules' => 'max_size[scankta,2048]|is_image[scankta]|mime_in[scankta,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar Terlalu Besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Silahkan Pilih Format Gambar JPG, JPEG, PNG'
                    ]
                ]
            ]
        )) {
            return redirect()->to('/user/edit/kta/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileScanKta = $this->request->getFile('scankta');
        if ($fileScanKta->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/user/edit/kta/' . $callsign);
        } else {
            $namaScanKta = $fileScanKta->getRandomName();
            $fileScanKta->move('img/kta', $namaScanKta);

            if (!$scanKtaOld == null) {
                unlink('img/kta/' . $scanKtaOld);
            }
        }


        $exc = $this->userModel->save(
            [
                'id' => $id,
                'scankta' => $namaScanKta
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/user/detail');
    }
    public function doEdit()
    {
        $id = $this->request->getVar('id');

        if (!$this->validate(
            [
                'callsign' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'nik' => [
                    'rules' => 'required|exact_length[16]',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.',
                        'exact_length' => 'Masukkan {field} NIK Valid (16 Digit).'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'kecamatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.',
                        'valid_email' => 'Masukkan Email dengan Benar'
                    ]
                ],
                'nohp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'emailsdppi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'passsdppi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'lakuiar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ],
                'lakukta' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.'
                    ]
                ]
            ]
        )) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/register')->withInput()->with('validation', $validation);
            return redirect()->to('/user/edit/' . $id)->withInput();
        }


        $call = $this->request->getVar('callsign');
        $nik = $this->request->getVar('nik');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $kecamatan = $this->request->getVar('kecamatan');
        $email = $this->request->getVar('email');
        $nohp = $this->request->getVar('nohp');
        $emailsdppi = $this->request->getVar('emailsdppi');
        $passsdppi = $this->request->getVar('passsdppi');
        $lakuiar = $this->request->getVar('lakuiar');
        $lakukta = $this->request->getVar('lakukta');

        //Initiate DateTime 
        $initIar = new DateTime($lakuiar);
        $dateIar = $initIar->format('Y-m-d');
        $initKta = new DateTime($lakukta);
        $dateKta = $initKta->format('Y-m-d');

        // }
        // $cek = [
        //     'callsign' => $call,
        //     'nama' => $nama,
        //     'nik' => $nik,
        //     'lakuiar' => $dateIar,
        //     'lakukta' => $dateKta,
        //     'alamat' => $alamat,
        //     'kecamatan' => $kecamatan,
        //     'email' => $email,
        //     'foto' => $namaFoto,
        //     'nohp' => $nohp,
        //     'scaniar' => $namaIar,
        //     'scankta' => $namaKta,
        //     'fotoktp' => $namaKtp,
        //     'emailsdppi' => $emailsdppi,
        //     'passsdppi' => $passsdppi
        // ];
        // dd($cek);

        $this->userModel->save([
            'id' => $id,
            'callsign' => $call,
            'nama' => $nama,
            'nik' => $nik,
            'lakuiar' => $dateIar,
            'lakukta' => $dateKta,
            'alamat' => $alamat,
            'kecamatan' => $kecamatan,
            'email' => $email,
            'nohp' => $nohp,
            'emailsdppi' => $emailsdppi,
            'passsdppi' => $passsdppi
        ]);
        session()->setFlashdata('pesan', 'Data ' . $call . ' berhasil diubah.');

        return redirect()->to('/admin/list');
    }
}
