<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>

<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3>Registrasi Anggota</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="x_panel ">
                    <div class="x_title">
                        <h2><?= $title; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" method="POST" action="/admin/doRegister" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <span class="section">Personal Info</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="callsign">Callsign <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="callsign" class="form-control col-md-7 col-xs-12 " name="callsign" placeholder="Huruf Kapital Semua. Contoh: XX2XXX" required="required" value="<?= old('callsign'); ?>" type="text">

                                        <?= (!$validation->getError('callsign') ? "" : '<small style="color:red;">* ' . $validation->getError('callsign') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nik" name="nik" value="<?= old('nik'); ?>" required="required" data-validate-length="16" placeholder="Masukkan 16 Digit NIK" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nik') ? "" : '<small style="color:red;">* ' . $validation->getError('nik') . '</small>'); ?>
                                    </div>

                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nama" name="nama" value="<?= old('nama'); ?>" data-validate-linked="nama" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nama') ? "" : '<small style="color:red;">* ' . $validation->getError('nama') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="alamat" name="alamat" value="<?= old('alamat'); ?>" required="required" placeholder="Masukkan Alamat Domisili" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('alamat') ? "" : '<small style="color:red;">* ' . $validation->getError('alamat') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="kecamatan" name="kecamatan" value="<?= old('kecamatan'); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('kecamatan') ? "" : '<small style="color:red;">* ' . $validation->getError('kecamatan') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" value="<?= old('email'); ?>" placeholder="Contoh: email@orariklaten.or.id" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('email') ? "" : '<small style="color:red;">* ' . $validation->getError('email') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nohp">No. HP <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="nohp" type="text" name="nohp" value="<?= old('nohp'); ?>" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('nohp') ? "" : '<small style="color:red;">* ' . $validation->getError('nohp') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="foto" type="file" onchange="previewImg()" name="foto" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('foto') ? "" : '<small style="color:red;">* ' . $validation->getError('foto') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku IAR <span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakuiar" value="<?= old('lakuiar'); ?>" class="form-control has-feedback-left" id="single_cal4" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>

                                        <?= (!$validation->getError('lakuiar') ? "" : '<small style="color:red;">* ' . $validation->getError('lakuiar') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" name="su[]" value="iar" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Seumur Hidup
                                        </label>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku KTA <span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakukta" value="<?= old('lakukta'); ?>" class="form-control has-feedback-left" id="single_cal2" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        <?= (!$validation->getError('lakukta') ? "" : '<small style="color:red;">* ' . $validation->getError('lakukta') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required"></span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" name="su[]" value="kta" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Seumur Hidup
                                        </label>
                                    </div>
                                </div>
                                <span class="section">Dokumen Pendukung</span>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="scaniar">Upload Scan IAR <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="scaniar" type="file" name="scaniar" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('scaniar') ? "" : '<small style="color:red;">* ' . $validation->getError('scaniar') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fotoktp">Upload Scan KTP <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="fotoktp" type="file" name="fotoktp" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('fotoktp') ? "" : '<small style="color:red;">* ' . $validation->getError('fotoktp') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="scankta">Upload Scan KTA <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="scankta" type="file" name="scankta" class="required form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('scankta') ? "" : '<small style="color:red;">* ' . $validation->getError('scankta') . '</small>'); ?>
                                    </div>
                                </div>
                                <span class="section">Informasi Akun SDPPI</span>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emailsdppi">Username / Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="emailsdppi" class="form-control col-md-7 col-xs-12" value="<?= old('emailsdppi'); ?>" name="emailsdppi" required="required" type="text">
                                        <?= (!$validation->getError('emailsdppi') ? "" : '<small style="color:red;">* ' . $validation->getError('emailsdppi') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passsdppi">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="passsdppi" name="passsdppi" value="<?= old('passsdppi'); ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <?= (!$validation->getError('passsdppi') ? "" : '<small style="color:red;">* ' . $validation->getError('passsdppi') . '</small>'); ?>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Foto</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="jumbotron" style=" 
            
            height:100%;
            min-width:100%;
            position:relative;">
                        <img src="/img/profile.png" style=" height:100%;
            width:100%;
            max-width:100%;" class="img-preview" width="190" height="300" alt="">
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>