<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $PageTitle; ?> | <?= $title; ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/apps/icon/' . $icon); ?>">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
</head>
<style type="text/css">
    body {
        background-color: #005cac;
        -webkit-animation: color 5s ease-in 0s infinite alternate running;
        -moz-animation: color 5s linear 0s infinite alternate running;
        animation: color 5s linear 0s infinite alternate running;
    }

    @-webkit-keyframes color {
        0% {
            background-color: #005cac;
        }

        32% {
            background-color: #005cac;
        }

        55% {
            background-color: #ff9e01;
        }
    }

    @-moz-keyframes color {
        0% {
            background-color: #005cac;
        }

        32% {
            background-color: #005cac;
        }

        55% {
            background-color: #ff9e01;
        }
    }

    @keyframes color {
        0% {
            background-color: #005cac;
        }

        32% {
            background-color: #005cac;
        }

        55% {
            background-color: #ff9e01;
        }
    }
</style>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <style>
                                    .card {
                                        border-top: 2px solid #005cac;
                                    }

                                    .form-input-content .logo-app-page {
                                        width: 80%;
                                        display: flex;
                                        /* height: 100px; */
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .text-center .text-center-session {
                                        display: flex;
                                        justify-content: center;
                                        text-align: center;
                                    }

                                    .login-page-info {
                                        display: flex;
                                        justify-content: center;
                                        align-content: center;
                                    }

                                    #img-app {
                                        width: 430px;
                                        height: 100%;
                                    }
                                </style>
                                <div class="login-page-info">
                                    <img src="<?= base_url('assets/images/apps/logo-signin/' . $logo_signin); ?>" id="img-app" class="logo-login-sign" alt="logo-<?= $appname; ?>-sign">
                                </div>
                                <hr>
                                <a class="text-center" href="<?= base_url(''); ?>">
                                    <h5 class="text-center-session" style="color: #9e9e9e; font-style: italic">Silahkan
                                        mulai session anda</h5>
                                </a>
                                <?php if ($this->session->flashdata('f_role')) : ?>
                                    <hr>
                                    <div class="card-content">
                                        <div class="alert alert-info">Anda belum memulai <b>session</b>!, Silahkan mulai
                                            <b>session</b> anda!
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('f_sigin')) : ?>
                                    <hr>
                                    <div class="card-content">
                                        <div class="alert alert-danger">Maaf <b>Username</b> atau <b>Password</b> Anda
                                            salah, Silakan Coba Lagi!</div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('n_sigin')) : ?>
                                    <hr>
                                    <div class="card-content">
                                        <div class="alert alert-warning">Maaf <b>Data anda</b> tidak terdaftar di
                                            kepegawaian, Silakan hubungi administrator!</div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('n_sigin_nonaktif')) : ?>
                                    <hr>
                                    <div class="card-content">
                                        <div class="alert alert-warning">Maaf <b>Status User anda</b> di Non-Aktifkan, Silakan hubungi administrator!</div>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('signin/check_signin'); ?>" class="mt-5 mb-5 login-input" method="POST">
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="username" tabindex="1" style="border-bottom: 2px solid #005cac5e" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <div class="input-group">
                                            <input type="password" id="password" class="form-control" name="password" tabindex="2" style="border-bottom: 2px solid #005cac5e" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" onclick="myFunction()" type="button" id="customCheck1">
                                                    <i class="far fa-eye" id="customCheck1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Ingat Saya</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100" name="submit">Sign
                                        In</button>
                                </form>
                                <p class="mt-5 login-form__footer" style="text-align: center;">
                                    Version: <?= $version; ?> - <?= $version_type ?><br><a href="#" class="text-primary"> &copy; <?= $appname ?> | <?= $develop ?> <?= $year_dev ?> - <?= date('Y'); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/plugins/common/common.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/settings.js'); ?>"></script>
    <script src="<?= base_url('assets/js/gleek.js'); ?>"></script>
    <script src="<?= base_url('assets/js/styleSwitcher.js'); ?>"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>