<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<?php
$dateIar = new DateTime($anggota['lakuiar']);
$lakuIar = $dateIar->format('m/d/Y');
$dateKta = new DateTime($anggota['lakukta']);
$lakuKta = $dateKta->format('m/d/Y');
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title; ?></h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel ">
                    <div class="x_title">
                        <div class="clearfix" style="margin-bottom:-2%;">
                            <h2><?= $breadcrumb; ?></h2>
                        </div>
                    </div>
                    <div class=" col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" method="post" action="/admin/doEdit">
                                <?= csrf_field(); ?>
                                <span class="section">Personal Info</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="callsign">Callsign <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="callsign" class="form-control col-md-7 col-xs-12 " name="callsign" placeholder="Huruf Kapital Semua. Contoh: XX2XXX" value="<?= (old('callsign') ? old('callsign') : $anggota['callsign']) ?>" type="text">
                                        <input type="hidden" name='id' value="<?= $anggota['id'] ?>">
                                        <?= (!$validation->getError('callsign') ? "" : '<small style="color:red;">* ' . $validation->getError('callsign') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nik" name="nik" value="<?= (old('nik') ? old('nik') : $anggota['nik']) ?>" required="required" data-validate-length="16" placeholder="Masukkan 16 Digit NIK" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nik') ? "" : '<small style="color:red;">* ' . $validation->getError('nik') . '</small>'); ?>
                                    </div>

                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nama" name="nama" value="<?= (old('nama') ? old('nama') : $anggota['nama']) ?>" data-validate-linked="nama" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nama') ? "" : '<small style="color:red;">* ' . $validation->getError('nama') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="alamat" name="alamat" value="<?= (old('alamat') ? old('alamat') : $anggota['alamat']) ?>" required="required" placeholder="Masukkan Alamat Domisili" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('alamat') ? "" : '<small style="color:red;">* ' . $validation->getError('alamat') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="kecamatan" name="kecamatan" value="<?= (old('kecamatan') ? old('kecamatan') : $anggota['kecamatan']) ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('kecamatan') ? "" : '<small style="color:red;">* ' . $validation->getError('kecamatan') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" value="<?= (old('email') ? old('email') : $anggota['email']) ?>" placeholder="Contoh: email@orariklaten.or.id" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('email') ? "" : '<small style="color:red;">* ' . $validation->getError('email') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nohp">No. HP <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="nohp" type="text" name="nohp" value="<?= (old('nohp') ? old('nohp') : $anggota['nohp']) ?>" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nohp') ? "" : '<small style="color:red;">* ' . $validation->getError('nohp') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku IAR <span class="required">*</span></label>
                                    <div class=" col-md-3 col-sm-3 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakuiar" class="form-control has-feedback-left" id="single_cal4" value="<?= $lakuIar; ?>" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        <?= (!$validation->getError('lakuiar') ? "" : '<small style="color:red;">* ' . $validation->getError('lakuiar') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku KTA <span class="required">*</span></label>
                                    <div class=" col-md-3 col-sm-3 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakukta" value="<?= $lakuKta; ?>" id="single_cal2" class="form-control has-feedback-left" aria-describedby="inputSuccess2Status4">
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
                                        <input id="emailsdppi" class="form-control col-md-7 col-xs-12" value="<?= $anggota['emailsdppi']; ?>" name="emailsdppi" required="required" type="text">
                                        <?= (!$validation->getError('emailsdppi') ? "" : '<small style="color:red;">* ' . $validation->getError('emailsdppi') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passsdppi">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="passsdppi" name="passsdppi" value="<?= $anggota['passsdppi']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('passsdppi') ? "" : '<small style="color:red;">* ' . $validation->getError('passsdppi') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/admin/detail/<?= $anggota['callsign']; ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Ubah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>