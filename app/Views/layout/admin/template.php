<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md footer_fixed">
    <script>
        function previewImg() {
            const sampul = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');
            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);
            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function showPassword() {
            var x = document.getElementById("passsdppi");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>

                    <div class="clearfix"></div>
                    <?= $this->include('layout/admin/sidebar'); ?>
                    <?= $this->include('layout/admin/navbar'); ?>
                    <?= $this->renderSection('content'); ?>
                    <div class="clearfix"></div>

                    <!-- footer content -->

                    <footer>

                        <div class="pull-right">
                            Sistem Administrasi Keanggotaan Terpadu - ORARI Lokal Klaten &copy; 2022 v0.1.0</a>
                        </div>
                        <div class="clearfix"></div>

                    </footer>

                    <!-- /footer content -->
                </div>

            </div>

            <!-- jQuery -->
            <script src="/vendors/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="/vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="/vendors/nprogress/nprogress.js"></script>
            <!-- Chart.js -->
            <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
            <!-- gauge.js -->
            <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
            <!-- bootstrap-progressbar -->
            <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
            <!-- iCheck -->
            <script src="/vendors/iCheck/icheck.min.js"></script>
            <!-- Skycons -->
            <script src="/vendors/skycons/skycons.js"></script>
            <!-- Flot -->
            <script src="/vendors/Flot/jquery.flot.js"></script>
            <script src="/vendors/Flot/jquery.flot.pie.js"></script>
            <script src="/vendors/Flot/jquery.flot.time.js"></script>
            <script src="/vendors/Flot/jquery.flot.stack.js"></script>
            <script src="/vendors/Flot/jquery.flot.resize.js"></script>
            <!-- Flot plugins -->
            <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
            <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
            <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
            <!-- DateJS -->
            <script src="/vendors/DateJS/build/date.js"></script>
            <!-- JQVMap -->
            <script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
            <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
            <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="/vendors/moment/min/moment.min.js"></script>
            <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!-- validator -->
            <!-- <script src="/vendors/validator/validator.js"></script> -->
            <!-- Datatables -->
            <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
            <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
            <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
            <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="/js/custom.min.js"></script>

</body>

</html>