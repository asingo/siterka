<?= $this->extend('layout/user/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Callbook Anggota</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" style="height: 100%;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Seluruh Anggota</h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <p>Klik Detail untuk melihat Detail Anggota</p>
                <?php if (session()->getFlashData('errorSearch')) : ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <?= session()->getFlashdata('errorSearch'); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">

                                <th class="column-title">No </th>
                                <th class="column-title">Callsign </th>
                                <th class="column-title">Nama </th>
                                <th class="column-title">Kecamatan </th>
                                <th class="column-title">Masa Laku IAR </th>
                                <th class="column-title">Masa Laku KTA </th>
                                <th class="column-title no-link last"><span class="nobr">Aksi</span>
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            <?php $i = 1 ?>
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

                                        <a href="/user/callbook/lihat/<?= $a['callsign']; ?>">Detail</a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>