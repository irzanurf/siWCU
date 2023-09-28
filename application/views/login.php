<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SiPorto</title>
    <link rel="icon" href="<?= base_url('assets/undip.png');?>" type="image/x-icon'">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/login/images/fav.jpg'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/plugins/slider/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/plugins/slider/css/owl.theme.default.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/style.css'); ?>" />
</head>

<body class="form-login-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto login-desk">
                <div class="row">
                    <div class="col-md-6 col-12 detail-box">
                        <img class="logo" style="width:60px" src="<?= base_url('assets/login/images/logo.png'); ?>"
                            alt="">
                        <div class="detailsh">
                            <img class="help" src="<?= base_url('assets/login/images/elektro.jpg'); ?>" alt="">

                        </div>
                    </div>
                    <div class="col-md-6 col-12 loginform">
                        <h4>Welcome SiPorto</h4>
                        <p>Teknik Elektro</p>
                        <form class="form-signin" method="POST" action="<?= base_url('Welcome'); ?>">
                            <div class="login-det">
                                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                <div class="form-row">
                                    <label for="">Username</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </div>
                                        <input name="username" type="text" class="form-control"
                                            placeholder="Enter Username" aria-label="Username"
                                            aria-describedby="basic-addon1" required>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Enter Password" aria-label="Username"
                                            aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <hr>


                                <button type="submit" class="btn btn-sm btn-danger">Login</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>


<script src="<?= base_url('assets/login/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/login/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/login/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/login/plugins/scroll-fixed/jquery-scrolltofixed-min.js'); ?>"></script>
<script src="<?= base_url('assets/login/plugins/slider/js/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/login/js/script.js'); ?>"></script>