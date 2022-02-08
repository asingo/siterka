<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Urutkan Anggota</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Seluruh Anggota</h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <p>Klik Detail untuk melihat Detail dan Mengubah Data Anggota</p>
                <div class="clearfix"></div>
                <p>Pilih opsi dibawah ini untuk mengurutkan data.</p>
                <!-- <form method="POST">

                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Masukkan Callsign atau Nama disini">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                        </span>
                    </div>
                </form> -->
                <?php if (session()->getFlashData('errorSearch')) : ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <?= session()->getFlashdata('errorSearch'); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">

                                <th class="column-title">No </th>
                                <th class="column-title">Callsign </th>
                                <th class="column-title">Nama </th>
                                <th class="column-title">Kecamatan </th>

                                <th class="column-title"><a href="google.com"> Masa Laku IAR </a></th>

                                <th class="column-title">Masa Laku KTA </th>
                                <th class="column-title no-link last"><span class="nobr">Aksi</span>
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                            <?php foreach ($anggota as $a) { ?>
                                <tr class="even pointer" style="vertical-align:middle;">
                                    <td class=" "><?= $i++; ?></td>
                                    <td class=" "><?= $a['callsign']; ?> </td>
                                    <td class=" "><?= $a['nama']; ?></td>
                                    <td class=" "><?= $a['kecamatan']; ?></td>
                                    <td class=" "><?= $a['lakuiar']; ?></td>
                                    <td class="a-right a-right "><?= $a['lakukta']; ?></td>
                                    <td class=" last">
                                        <!-- <a href="/admin/detail/ //$a['id']; ">View</a> -->

                                        <a href="/admin/detail/<?= $a['callsign']; ?>">Detail</a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?= $pager->links('anggota'); ?>
                </div>


            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>