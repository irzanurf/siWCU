<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>WCU</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/undip.png');?>" width="20" height="20">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/searchable/chosen.css');?>">
    <link href="<?= base_url('assets/layout/assets/node_modules/morrisjs/morris.css');?>" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="<?= base_url('assets/layout/assets/node_modules/c3-master/c3.min.css');?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/layout/html/dist/css/style.css');?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url('assets/layout/html/dist/css/pages/dashboard1.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">WCu</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark"
                style="background-color:#0f3fbc; padding:0px 0px 0px 0px">

                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->

                <!-- This is  -->

                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item hidden-sm-up p-l-1" style="list-style-type: none;"> <a
                                class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i
                                    class="ti-menu" style="color: white;"></i></a></li>
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-up p-l-1" style="list-style-type: none;">
                            <span class="align-middle" style="color: white; font-size:25px; text-align:center;"><img
                                    src="<?= base_url('assets/undip.png');?>" alt="elegant admin template" width="35"
                                    height="40">&nbsp;&nbsp;<sup>WCU</sup> Register</span>
                        </li>


                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a style="margin-right: 10px;" href="#" id="alertsDropdown m-r-1" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" style="color:white"></i>
                                <!-- Counter - Alerts -->

                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                style="background-color: #e4e8ea;" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                </h6>
                                <style>
                                .dropdown-item:hover {
                                    background-color: #0f3fbc;
                                }
                                </style>
                                <?php if (!empty($nav)) { ?>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('Login/ganti_password');?>">
                                    <div class="mr-3">
                                        <div class="icon-circle" style="margin-bottom: 10px;">
                                            <i class="fa fa-edit text-white"></i> <span style="color: white;"> Ganti
                                                Password</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('Login/logout');?>">
                                    <div class="mr-3">
                                        <div class="icon-circle" style="margin-bottom: 10px;">
                                            <i class="fa fa-power-off text-white"></i> <span style="color: white;">
                                                Logout</span>
                                        </div>
                                    </div>
                                </a>
                                <?php } 
                                else { ?>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('Login/login');?>">
                                    <div class="mr-3">
                                        <div class="icon-circle" style="margin-bottom: 10px;">
                                            <i class="fa fa-sign-in text-white"></i> <span style="color: white;">
                                                Login</span>
                                        </div>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" style="width: 210px;">
            <div class="d-flex no-block nav-text-box align-items-center" style="background:#0f3fbc !important">
                <span style="color: white; font-size:25px"><img src="<?= base_url('assets/undip.png');?>"
                        alt="elegant admin template" width="35" height="40">&nbsp;&nbsp;<sup></sup> WCU</span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"
                        style="color:white"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close" style="color:white"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" style="background-color:#e4e8ea">
                <?php if (!empty($nav)) { } 
            else {?>
                <div>
                    <hr>
                    <h4 style="text-align:center; color: black;">Login</h4>
                    <h2 style="text-align:center; color: black;">WCU</h2>
                </div>
                <?php } ?>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <?php if (!empty($nav)) { ?>
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('mhs/mhs/');?>"
                                aria-expanded="false"><i style="color:black"
                                    class="fa fa-file-text-o nav_icon"></i><span class="hide-menu">
                                    <h5 style="color:black;">Dashboard</h5>
                                </span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('mhs/mhs/form');?>"
                                aria-expanded="false"><i style="color:black"
                                    class="fa fa-check-square-o nav_icon"></i><span class="hide-menu">
                                    <h5 style="color:black;">Form Pengajuan</h5>
                                </span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('mhs/mhs/list');?>"
                                aria-expanded="false"><i style="color:black" class="fa fa-fw fa-clipboard"></i><span
                                    class="hide-menu">
                                    <h5 style="color:black;">Daftar Pengajuan</h5>
                                </span></a></li>

                        <div class="text-center m-t-30">
                            <a href="<?= base_url('login/logout');?>"
                                class="btn waves-effect waves-light btn-danger hidden-md-down"><i
                                    class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </div>
                    </ul>
                    <?php } 
                    else { ?>
                    <form method="POST" action="<?= base_url("Welcome");?>"
                        style="padding-left: 1rem; padding-right: 1rem">
                        <?php if(isset($error)) { echo $error; }; ?>
                        <div>
                            <label style="color: black;">NIP / NIM</label>
                            <input type="text" class="form-control" name="username" placeholder="NIP/NIM"
                                id="username" required="">
                        </div><br>
                        <div>
                            <label style="color: black;">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                id="password" required="">
                        </div><br>
                        <button type="submit" class="btn btn-success"
                            style="width: 100%; margin-top:1rem">Login</button>
                    </form>
                    <hr>

                    <div class="text-center"
                        style="margin-left: 10px; margin-right: 10px; padding-top:10px; padding-bottom:10px; background-color:#edf1f5">
                        <span style="color: black;">Belum punya akun?</span><br><br>
                        <a type="button" data-toggle="modal" data-target=".register" class="btn btn-info"><i
                                class="fa fa-lightbulb-o"> <b>Daftar disini</b></i></a>
                    </div>
                    <?php } ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- modal registrasi akun -->
        <div class="modal fade register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="myLargeModalLabel">Registrasi Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form class="form-signin needs-validation"
                        oninput='confirmPassword.setCustomValidity(confirmPassword.value != newPassword.value ? "Password do not match!": "")'
                        method="POST" action="<?= base_url("Welcome/register");?>">
                        <div class="card shadow-sm">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>NIP/NIM</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <input class="form-control" name="username" placeholder="NIM/NIP" required
                                        autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <input class="form-control" name="nama" placeholder="Nama" required
                                        autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <label>Email</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <input class="form-control" name="email" placeholder="Email" required
                                        autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <label>No. HP</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <input class="form-control" name="no_hp" placeholder="No. HP" required type="number"
                                        autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <label>Fakultas</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <select class="form-control" name="fakultas">
                                        <option value="">Please Select</option>
                                        <?php foreach($fakultas as $f){ ?>
                                        <option value="<?= $f->id ?>"><?= $f->fakultas ?></option>
                                        <?php } ?>
                                    </select>
                                    <br>

                                </div>

                                <div class="form-group">
                                    <label>Departemen</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <input class="form-control" name="departemen" placeholder="Departemen" required
                                        autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <label>Prodi/Unit</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <input class="form-control" name="prodi" placeholder="Prodi/Unit" required
                                        autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Password</label><label style="color:red; font-size:12px;"> (*Wajib
                                            diisi)</label>
                                        <div class="input-group">

                                            <input name="newPassword" type="password" autocomplete="off"
                                                class="form-control" id="newPassword" placeholder="New Password"
                                                required>
                                            <div class="invalid-feedback">
                                                Please enter new password.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label><label style="color:red; font-size:12px;"> (*Wajib
                                        diisi)</label>
                                    <div class="input-group">

                                        <input name="confirmPassword" type="password" autocomplete="off"
                                            class="form-control" id="confirmPassword" placeholder="Confirm Password"
                                            required>
                                        <div class="invalid-feedback">
                                            Password not a match.
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- <script>
                                                    // Check if passwords match
                                                    $("#pwdId, #confirmPassword").on("keyup", function () {
                                                    if (
                                                        $("#newPassword").val() != "" &&
                                                        $("#confirmPassword").val() != "" &&
                                                        $("#confirmPassword").val() == $("#confirmPassword").val()
                                                    ) {
                                                    }
                                                    });

                                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                    (function () {
                                                    "use strict";
                                                    window.addEventListener(
                                                        "load",
                                                        function () {
                                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                        var forms = document.getElementsByClassName("needs-validation");
                                                        // Loop over them and prevent submission
                                                        var validation = Array.prototype.filter.call(forms, function (form) {
                                                            form.addEventListener(
                                                            "submit",
                                                            function (event) {
                                                                if (form.checkValidity() === false) {
                                                                event.preventDefault();
                                                                event.stopPropagation();
                                                                }
                                                                form.classList.add("was-validated");
                                                            },
                                                            false
                                                            );
                                                        });
                                                        },
                                                        false
                                                    );
                                                    })();

                                                    </script> -->

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->