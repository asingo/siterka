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
    <!-- Animate.css -->
    <link href="/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <p style="color:red"><?= session()->getFlashdata('success'); ?></p>
                    <p style="color:red"><?= session()->getFlashdata('error'); ?></p>
                    <?php
                    $session = session();
                    $login = $session->getFlashdata('login');
                    $username = $session->getFlashdata('username');
                    $password = $session->getFlashdata('password');
                    ?>


                    <?php if ($username) { ?>
                        <p style="color:red"><?php echo $username ?></p>
                    <?php } ?>

                    <?php if ($password) { ?>
                        <p style="color:red"><?php echo $password ?></p>
                    <?php } ?>

                    <?php if ($login) { ?>
                        <p style="color:green"><?php echo $login ?></p>
                    <?php } ?>
                    <form method="post" action="/auth/valid_login">
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" name="login">Log In</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Belum Punya Akun?
                                <a href="#signup" class="to_register"> Buat Akun </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <img src="/img/backdrop.png">
                                <br>
                                <br>
                                <p>©2021 All Rights Reserved. ORARI Lokal Klaten</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div id="register" class="animate form registration_form">
                <?php
                $session = session();
                $error = $session->getFlashdata('error');
                ?>

                <?php if ($error) { ?>
                    <p style="color:red">Terjadi Kesalahan:
                    <ul>
                        <?php foreach ($error as $e) { ?>
                            <li><?php echo $e ?></li>
                        <?php } ?>
                    </ul>
                    </p>
                <?php } ?>
                <section class="login_content">
                    <form method="post" action="/auth/valid_register">
                        <h1>Buat Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Callsign" name="user" required="" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="pass" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirm" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" name="login">Register</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <img src="/img/backdrop.png">
                                <br>
                                <br>
                                <p>©2021 All Rights Reserved. ORARI Lokal Klaten</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>