<?= $this->extend('layout/user/template'); ?>
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


                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nama" name="nama" disabled value="<?= $anggota['nama']; ?>" data-validate-linked="nama" required="required" class="form-control col-md-7 col-xs-12">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="alamat" name="alamat" disabled value="<?= $anggota['alamat']; ?>" required="required" placeholder="Masukkan Alamat Domisili" class="form-control col-md-7 col-xs-12">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kecamatan">Kecamatan <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="kecamatan" name="kecamatan" disabled value="<?= $anggota['kecamatan']; ?>" required="required" class="form-control col-md-7 col-xs-12">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" disabled value="<?= $anggota['email']; ?>" placeholder="Contoh: email@orariklaten.or.id" required="required" class="form-control col-md-7 col-xs-12">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nohp">No. HP <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="nohp" type="text" name="nohp" disabled value="<?= $anggota['nohp']; ?>" class="required form-control col-md-7 col-xs-12">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku IAR <span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakuiar" disabled class="form-control has-feedback-left" value="<?= $anggota['lakuiar']; ?>" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Masa Berlaku KTA <span class="required">*</span></label>
                                    <div class=" col-md-6 col-sm-6 col-xs-12 xdisplay_inputx has-feedback">
                                        <input type="text" name="lakukta" disabled value="<?= $anggota['lakukta']; ?>" class="form-control has-feedback-left" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/user/callbook" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-anggota"><img src="<?= $anggota['foto'] ? '/img/anggota/' . $anggota['foto'] : '/img/profile.png'; ?>" style="height:100%; width:100%; max-width:100%;" class="img-preview" alt=""></a>
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
                                        <img src="<?= $anggota['foto'] ? '/img/anggota/' . $anggota['foto'] : '/img/profile.png'; ?>" width="100%">
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
        </div>
    </div>
</div>
<?= $this->endSection(); ?>