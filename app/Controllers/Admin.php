<?php

namespace App\Controllers;


use App\Models\AdminModel;
use CodeIgniter\I18n\Time;
use DateTime;
use \Geeklabs\Breadcrumbs\Breadcrumb;


class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->breadcrumb = new Breadcrumb();
        $this->adminModel = new \App\Models\AdminModel();
        $this->session = session();
    }
    public function index()
    {
        $data = [
            'title' => 'Selamat Datang'
        ];
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        if ($this->session->get('role') != 1) {
            return redirect()->to('/user/verify');
        }

        return view('admin/index', $data);
    }
    public function list()
    {
        $data = [
            'anggota' => $this->adminModel->findAll(),
            'title' => 'Daftar Anggota'


        ];
        return view('admin/daftar', $data);
    }
    public function register()
    {
        $data = [
            'title' => 'Register Anggota',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/registerAnggota', $data);
    }
    public function edit($callsign)
    {
        // $id = $this->request->getVar('id');

        $getDetail = $this->adminModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('admin/editAnggota', $data);
    }
    public function editFoto($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->adminModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Foto Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('admin/editFoto', $data);
    }
    public function editIar($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->adminModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Scan IAR Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('admin/editIar', $data);
    }
    public function editKtp($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->adminModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Scan KTP Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('admin/editKtp', $data);
    }
    public function editKta($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->adminModel->getDetail($callsign);
        $data = [
            'title' => 'Ubah Data Scan KTA',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];
        return view('admin/editKta', $data);
    }
    public function detail($callsign)
    {
        $id = $this->request->getVar('id');
        $getDetail = $this->adminModel->getDetail($callsign);
        $data = [
            'title' => 'Data Anggota',
            'anggota' => $getDetail,
            'validation' => \Config\Services::validation(),
            'breadcrumb' => $this->breadcrumb->buildAuto()
        ];


        return view('admin/detail', $data);
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
            return redirect()->to('/admin/edit/foto/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/edit/foto/' . $callsign);
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/anggota', $namaFoto);
            if (!$fotoLama == null) {
                unlink('img/anggota/' . $fotoLama);
            }
        }


        $exc = $this->adminModel->save(
            [
                'id' => $id,
                'foto' => $namaFoto
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/admin/detail/' . $callsign);
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
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/register')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/edit/iar/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileScanIar = $this->request->getFile('scaniar');
        if ($fileScanIar->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/edit/iar/' . $callsign);
        } else {
            $namaScanIar = $fileScanIar->getRandomName();
            $fileScanIar->move('img/iar', $namaScanIar);

            if (!$scanIarOld == null) {
                unlink('img/iar/' . $scanIarOld);
            }
        }


        $exc = $this->adminModel->save(
            [
                'id' => $id,
                'scaniar' => $namaScanIar
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/admin/detail/' . $callsign);
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
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/register')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/edit/ktp/' . $callsign)->withInput();
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


        $exc = $this->adminModel->save(
            [
                'id' => $id,
                'fotoktp' => $namaFotoKtp
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/admin/detail/' . $callsign);
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
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/register')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/edit/kta/' . $callsign)->withInput();
        }

        //File Upload Controller
        $fileScanKta = $this->request->getFile('scankta');
        if ($fileScanKta->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/edit/kta/' . $callsign);
        } else {
            $namaScanKta = $fileScanKta->getRandomName();
            $fileScanKta->move('img/kta', $namaScanKta);

            if (!$scanKtaOld == null) {
                unlink('img/kta/' . $scanKtaOld);
            }
        }


        $exc = $this->adminModel->save(
            [
                'id' => $id,
                'scankta' => $namaScanKta
            ]
        );

        session()->setFlashdata('pesan', 'Data ' . $callsign . ' berhasil diubah.');

        return redirect()->to('/admin/detail/' . $callsign);
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
            return redirect()->to('/admin/edit/' . $id)->withInput();
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

        $this->adminModel->save([
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
    public function doRegister()
    {
        if (!$this->validate(
            [
                'callsign' => [
                    'rules' => 'required|is_unique[orang.callsign]',
                    'errors' => [
                        'required' => 'Kolom {field} harus diisi.',
                        'is_unique' => '{field} yang anda masukkan sudah terdaftar.'
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
                ],
                //Validate Upload
                'foto' => [
                    'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar Terlalu Besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Silahkan Pilih Format Gambar JPG, JPEG, PNG'
                    ]
                ],
                'scaniar' => [
                    'rules' => 'max_size[scaniar,2048]|is_image[scaniar]|mime_in[scaniar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar Terlalu Besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Silahkan Pilih Format Gambar JPG, JPEG, PNG'
                    ]
                ],
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
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/register')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/register')->withInput();
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
        $su = $this->request->getVar('su');
        if ($su == "iar") {
            $lakuiar = '01/01/2100';
        }
        if ($su == "kta") {
            $lakukta = '01/01/2100';
        } else {
            $lakuiar = $this->request->getVar('lakuiar');
            $lakukta = $this->request->getVar('lakukta');
        }




        //Initiate DateTime 
        $initIar = new DateTime($lakuiar);
        $dateIar = $initIar->format('m/d/Y');
        $initKta = new DateTime($lakukta);
        $dateKta = $initKta->format('m/d/Y');

        //File Upload Controller
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/register');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img/anggota', $namaFoto);
        }
        $fileIar = $this->request->getFile('scaniar');
        if ($fileIar->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/register');
        } else {
            $namaIar = $fileIar->getRandomName();
            $fileIar->move('img/iar', $namaIar);
        }
        $fileKta = $this->request->getFile('scankta');
        if ($fileKta->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/register');
        } else {
            $namaKta = $fileKta->getRandomName();
            $fileKta->move('img/kta', $namaKta);
        }
        $fileKtp = $this->request->getFile('fotoktp');
        if ($fileKtp->getError() == 4) {
            session()->setFlashdata('error', 'Masukkan Gambar Terlebih Dahulu.');
            return redirect()->to('/admin/register');
        } else {
            $namaKtp = $fileKtp->getRandomName();
            $fileKtp->move('img/kta', $namaKtp);
            // }
            // $cek = [
            //     'callsign' => $call,
            //     'nama' => $nama,php sp
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

            $this->adminModel->save([
                'callsign' => $call,
                'nama' => $nama,
                'nik' => $nik,
                'lakuiar' => $dateIar,
                'lakukta' => $dateKta,
                'alamat' => $alamat,
                'kecamatan' => $kecamatan,
                'email' => $email,
                'foto' => $namaFoto,
                'nohp' => $nohp,
                'scaniar' => $namaIar,
                'scankta' => $namaKta,
                'fotoktp' => $namaKtp,
                'emailsdppi' => $emailsdppi,
                'passsdppi' => $passsdppi
            ]);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to('/admin/list');
        }
    }
}
