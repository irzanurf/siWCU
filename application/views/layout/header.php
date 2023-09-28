<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Sistem informasi WCU membantu memproses (menginput, mereview dan memonitoring) semua kegiatan dalam WCU seperti visiting professor, adjunct professor, student exchange dll">
    <meta name="keywords"
        content="wcu, undip, professor, si wcu, adjunct professor, visiting professor, staff exchange, students exchange, summer course">
    <meta name="author" content="ThemeSelect">
    <title>SI WCU</title>
    <link rel="apple-touch-icon" href="<?= base_url('assets/undip.png');?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/undip.png');?>">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/main/css/vendors.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/main/vendors/css/charts/chartist.css');?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/main/css/app-lite.css');?>">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/main/css/core/menu/menu-types/vertical-menu.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/main/css/core/colors/palette-gradient.css');?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content" style="background: #1e2129">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>

                    </ul>

                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online"><img src="<?= base_url('assets/condition.png');?>"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span
                                            class="avatar avatar-online"><img
                                                src="<?= base_url('assets/condition.png');?>" alt="avatar"><span
                                                class="user-name text-bold-700 ml-1"></span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                        href="<?= base_url('Welcome/changePass');?>"><i class="ft-user"></i> Ganti
                                        Password</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                        href="<?= base_url('Welcome/logout');?>"><i class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
        data-img="<?= base_url('assets/main/images/backgrounds/02.jpg');?>">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= base_url('/');?>"><img class="brand-logo"
                            alt="logo" src="<?= base_url('assets/undip.png');?>" />
                        <h3 class="brand-text" style="font-size: 16px;">WCU</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <?php if(empty($cek)){ ?>

                <li class=" nav-item"><a href="<?= base_url('/');?>"><i class="ft-home"></i><span class="menu-title"
                            data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="<?= base_url('User/input');?>"><i class="ft-layers"></i><span
                            class="menu-title" data-i18n="">Daftar Pengajuan</span></a>
                </li>
                <?php } else{ ?>
                    <?php if($cek=="admin") {?>
                    <li class=" nav-item"><a href="<?= base_url('/');?>"><i class="ft-home"></i><span class="menu-title"
                                data-i18n="">Dashboard</span></a>
                    </li>
                    <li class=" nav-item"><a href="<?= base_url('Admin/Daftar');?>"><i class="ft-layers"></i><span
                                class="menu-title" data-i18n="">Daftar Pengajuan</span></a>
                    </li>
                    <?php } elseif($cek=="reviewer") {?>
                    <li class=" nav-item"><a href="<?= base_url('/');?>"><i class="ft-home"></i><span class="menu-title"
                                data-i18n="">Dashboard</span></a>
                    </li>
                    <li class=" nav-item"><a href="<?= base_url('Reviewer/Daftar');?>"><i class="ft-layers"></i><span
                                class="menu-title" data-i18n="">Daftar Pengajuan</span></a>
                    </li>
                    <?php } elseif($cek=="approver") {?>
                    <li class=" nav-item"><a href="<?= base_url('/');?>"><i class="ft-home"></i><span class="menu-title"
                                data-i18n="">Dashboard</span></a>
                    </li>
                    <li class=" nav-item"><a href="<?= base_url('Approver/Daftar');?>"><i class="ft-layers"></i><span
                                class="menu-title" data-i18n="">Daftar Pengajuan</span></a>
                    </li>
                <?php } else{} }?>
                <!-- <li class=" nav-item"><a href="<?= base_url('User/monev');?>"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Monev</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('User/lap_akhir');?>"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Laporan Akhir</span></a>
          </li> -->

            </ul>
        </div>
        <div class="navigation-background"></div>
    </div>

    <div class="app-content content" style="background: #00000">
        <div class="content-wrapper">
            <div class="content-wrapper-before" style="height:120px"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title"></h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">

                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Line Awesome section start -->