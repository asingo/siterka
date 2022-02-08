<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title; ?></h3>

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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_content">
                                <?php if (session()->getFlashData('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <?= session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <form class="form-horizontal form-label-left" method="POST" action="/admin/doEditKta" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <span class="section">Scan KTA</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Pilih Scan KTA <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="foto" onchange="previewImg();" class="form-control col-md-7 col-xs-12 " name="scankta" type="file">
                                            <input type="hidden" name="id" value="<?= $anggota['id']; ?>">
                                            <input type="hidden" name="callsign" value="<?= $anggota['callsign']; ?>">
                                            <input type="hidden" name="oldScanKta" value="<?= $anggota['scankta']; ?>">
                                            <?= (!$validation->getError('scankta') ? "" : '<small style="color:red;">* ' . $validation->getError('scankta') . '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Preview Scan KTA <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img src="/img/profile.png" style=" height:30%;width:30%;max-width:30%;" class="img-preview" width="190" height="300" alt="">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="/admin/detail/<?= $anggota['callsign']; ?>" class="btn btn-primary">Kembali</a>
                                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>