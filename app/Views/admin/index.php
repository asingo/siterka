<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="x_title">
        <h3>Selamat datang di SiTerKa ORARI Lokal Klaten</h3>
        <h4>(Sistem Terpadu Keanggotaan ORARI Lokal Klaten)</h4>
    </div>
    <div class="row tile_count">
        <div class="col-md-4 col-sm-8 col-xs-12 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Anggota</span>
            <div class="count">2500</div>
        </div>
        <div class="col-md-4 col-sm-8 col-xs-12 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Anggota IAR Kadaluarsa</span>
            <div class="count">2500</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="row x_title">
                    <div class="col">
                        <h3>Halo <?= session()->get('name'); ?>, Apa yang ingin anda lakukan?</h3>
                    </div>
                </div>
                <ul class="list-unstyled timeline widget">
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                    <a>Registrasi Anggota</a>
                                </h2>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                    <a>Lihat Daftar Anggota</a>
                                </h2>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>