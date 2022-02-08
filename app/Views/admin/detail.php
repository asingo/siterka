<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>

<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title; ?></h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="x_panel ">
                    <div class="x_title">
                        <div class="clearfix" style="margin-bottom:-2%;">
                            <h2><?= $breadcrumb; ?></h2>
                        </div>
                    </div>
                    <div class=" col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                            <?php if (session()->getFlashData('pesan')) : ?>
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                            <div id="edit" class="form-horizontal form-label-left">
                                <?= csrf_field(); ?>
                                <span class="section">Personal Info</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="callsign">Callsign <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="callsign" class="form-control col-md-7 col-xs-12 " name="callsign" placeholder="Huruf Kapital Semua. Contoh: XX2XXX" disabled value="<?= $anggota['callsign'] ?>" type="text">

                                        <?= (!$validation->getError('call') ? "" : '<small style="color:red;">* ' . $validation->getError('call') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nik" name="nik" disabled value="<?= $anggota['nik'] ?>" required="required" data-validate-length="16" placeholder="Masukkan 16 Digit NIK" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nik') ? "" : '<small style="color:red;">* ' . $validation->getError('nik') . '</small>'); ?>
                                    </div>

                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nama" name="nama" disabled value="<?= $anggota['nama']; ?>" data-validate-linked="nama" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nama') ? "" : '<small style="color:red;">* ' . $validation->getError('nama') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="alamat" name="alamat" disabled value="<?= $anggota['alamat']; ?>" required="required" placeholder="Masukkan Alamat Domisili" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('alamat') ? "" : '<small style="color:red;">* ' . $validation->getError('alamat') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="kecamatan" name="kecamatan" disabled value="<?= $anggota['kecamatan']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('kecamatan') ? "" : '<small style="color:red;">* ' . $validation->getError('kecamatan') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" disabled value="<?= $anggota['email']; ?>" placeholder="Contoh: email@orariklaten.or.id" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('email') ? "" : '<small style="color:red;">* ' . $validation->getError('email') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nohp">No. HP <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="nohp" type="text" name="nohp" disabled value="<?= $anggota['nohp']; ?>" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nohp') ? "" : '<small style="color:red;">* ' . $validation->getError('nohp') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku IAR <span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakuiar" disabled class="form-control has-feedback-left" value="<?= $anggota['lakuiar']; ?>" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        <?= (!$validation->getError('lakuiar') ? "" : '<small style="color:red;">* ' . $validation->getError('lakuiar') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku KTA <span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakukta" disabled value="<?= $anggota['lakukta']; ?>" class="form-control has-feedback-left" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        <?= (!$validation->getError('lakukta') ? "" : '<small style="color:red;">* ' . $validation->getError('lakukta') . '</small>'); ?>
                                    </div>
                                </div>
                                <span class="section">Informasi Akun SDPPI</span>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emailsdppi">Username / Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="emailsdppi" disabled class="form-control col-md-7 col-xs-12" value="<?= $anggota['emailsdppi']; ?>" name="emailsdppi" required="required" type="text">
                                        <?= (!$validation->getError('emailsdppi') ? "" : '<small style="color:red;">* ' . $validation->getError('emailsdppi') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passsdppi">Password <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="password" id="passsdppi" name="passsdppi" disabled value="<?= $anggota['passsdppi']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            <span class="input-group-btn">
                                                <a href="#" onclick="showPassword();" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                            </span>
                                            <?= (!$validation->getError('passsdppi') ? "" : '<small style="color:red;">* ' . $validation->getError('passsdppi') . '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <span class="section">Dokumen Pendukung</span>
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div class="x_title">
                                                <h2>Scan IAR</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="jumbotron" style="height:100%; min-width:100%; position:relative;">
                                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-iar"><img src="/img/iar/<?= $anggota['scaniar']; ?>" style=" height:100%; width:100%; max-width:100%;" class="img-preview" width="190" height="300" alt=""></a>
                                            </div>
                                            <div class="modal fade bs-example-modal-lg-iar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">Pratinjau Gambar</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="/img/iar/<?= $anggota['scaniar']; ?>" width="100%">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div class="x_title">
                                                <h2>Scan KTP</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="jumbotron" style="height:100%; min-width:100%; position:relative;">
                                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-ktp"><img src="/img/ktp/<?= $anggota['fotoktp']; ?>" style=" height:100%; width:100%; max-width:100%;" class="img-preview" width="190" height="300" alt=""></a>
                                            </div>
                                            <div class="modal fade bs-example-modal-lg-ktp" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">Pratinjau Gambar</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="/img/ktp/<?= $anggota['fotoktp']; ?>" width="100%">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">

                                            <div class="x_title">
                                                <h2>Scan KTA</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="jumbotron" style="height:100%; min-width:100%; position:relative;">
                                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-kta"><img src="/img/kta/<?= $anggota['scankta']; ?>" style=" height:100%; width:100%; max-width:100%;" class="img-preview" width="190" height="300" alt=""></a>
                                            </div>
                                            <div class="modal fade bs-example-modal-lg-kta" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">Pratinjau Gambar</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="/img/kta/<?= $anggota['scankta']; ?>" width="100%">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div style="margin-top: -7%;">
                                                <a href="/admin/edit/iar/<?= $anggota['callsign']; ?>" class="btn btn-danger"><i class="fa fa-edit"></i> Ubah Scan IAR</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div style="margin-top: -7%;">
                                                <a href="/admin/edit/ktp/<?= $anggota['callsign']; ?>" type="submit" class="btn btn-danger"><i class="fa fa-edit"></i> Ubah Scan KTP</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div style="margin-top: -7%;">
                                                <a href="/admin/edit/kta/<?= $anggota['callsign']; ?>" class="btn btn-danger" type="submit"><i class="fa fa-edit"></i> Ubah Scan KTA</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/admin/list" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                                        <a href="/admin/edit/<?= $anggota['callsign']; ?>" class="btn btn-danger"><i class="fa fa-edit"></i> Ubah Data</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="row">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Detail Foto</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="jumbotron" style="height:100%; min-width:100%; position:relative;">
                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-anggota"><img src="/img/anggota/<?= $anggota['foto']; ?>" style="height:100%; width:100%; max-width:100%;" class="img-preview" alt=""></a>
                        </div>
                        <div class="modal fade bs-example-modal-lg-anggota" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Pratinjau Gambar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="/img/anggota/<?= $anggota['foto']; ?>" width="100%">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div style="margin-top: -7%;">
                            <a href="/admin/edit/foto/<?= $anggota['callsign']; ?>" class="btn btn-danger"><i class="fa fa-edit"></i> Ubah Foto</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>