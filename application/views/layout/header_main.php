<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Ceres HTML Free  - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme
Upgrade to Pro: https://keenthemes.com/products/ceres-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Si-WCU</title>
    <meta name="description"
        content="Sistem informasi WCU membantu memproses (menginput, mereview dan memonitoring) semua kegiatan dalam WCU seperti visiting professor, adjunct professor, student exchange dll">
    <meta name="keywords"
        content="wcu, undip, professor, si wcu, adjunct professor, visiting professor, staff exchange, students exchange, summer course">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Si-WCU | Undip" />
    <meta property="og:url" content="<?= base_url('/') ?>" />
    <meta property="og:site_name" content="Si-WCU | Undip" />
    <link rel="canonical" href="Https://preview.keenthemes.com/ceres-html-free" />
    <link rel="shortcut icon" href="<?= base_url('assets/undip.png');?>" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="<?= base_url('assets/m/plugins/custom/fullcalendar/fullcalendar.bundle.css');?>" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?= base_url('assets/m/plugins/global/plugins.bundle.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/m/css/style.bundle.css');?>" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?= base_url('assets/m/media/patterns/header-bg.png)');?>"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header align-items-stretch" data-kt-sticky="true"
                    data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container-xxl d-flex align-items-center">
                        <!--begin::Heaeder menu toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
                            <div class="btn btn-icon btn-custom w-30px h-30px w-md-40px h-md-40px"
                                id="kt_header_menu_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Heaeder menu toggle-->
                        <!--begin::Header Logo-->
                        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
                            <a href="<?= base_url('/') ?>">
                                <img alt="Logo" src="<?= base_url('assets/undip.png');?>"
                                    class="h-50px h-lg-50px logo-default" />
                                <img alt="Logo" src="<?= base_url('assets/undip.png');?>"
                                    class="h-50px h-lg-50px logo-sticky" />
                            </a>
                        </div>
                        <!--end::Header Logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <!--begin::Navbar-->
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                                <!--begin::Menu wrapper-->
                                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                    data-kt-drawer-name="header-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                    data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                        id="#kt_header_menu" data-kt-menu="true">
                                        <div data-kt-menu-placement="bottom-start"
                                            class="menu-item menu-lg-down-accordion me-lg-1">
                                            <span class="menu-link py-3">
                                                <a class="menu-title" href="<?=base_url("/")?>">Dashboard</a>
                                            </span>
                                        </div>
                                        <?php if($navbar=="admin") {?>
                                        <div data-kt-menu-placement="bottom-start"
                                            class="menu-item menu-lg-down-accordion me-lg-1">
                                            <span class="menu-link py-3">
                                                <a class="menu-title" href="<?=base_url("admin/daftar")?>">Daftar
                                                    Pengajuan</a>
                                            </span>
                                        </div>
                                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="bottom-start"
                                            class="menu-item menu-lg-down-accordion me-lg-1">
                                            <span class="menu-link py-3">
                                                <span class="menu-title">Utilities</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </span>
                                            <div
                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                                <!-- ADD USER NAVBAR -->
                                                <div class="menu-item">
                                                    <a class="menu-link py-3"
                                                        href="<?= base_url('admin/user') ?>">
                                                        <span class="menu-icon">
                                                            <span class="svg-icon svg-icon-2">
                                                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                                                                        fill="black"></path>
                                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                        fill="black"></path>
                                                                </svg> -->
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">Daftar User</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="bottom-start"
                                            class="menu-item menu-lg-down-accordion me-lg-1">
                                            <span class="menu-link py-3">
                                                <span class="menu-title">Daftar Pengajuan</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </span>
                                            <div
                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                                <!-- ADD USER NAVBAR -->
                                                <?php if($navbar=="user"){ ?>
                                                <div class="menu-item">
                                                    <a class="menu-link py-3"
                                                        href="<?= base_url('user/tambah_kegiatan') ?>">
                                                        <span class="menu-icon">
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                                                                        fill="black"></path>
                                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                        fill="black"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">Activity Submission</span>
                                                    </a>
                                                </div>

                                                <div class="menu-item">
                                                    <a class="menu-link py-3" href="<?= base_url('user/input') ?>">
                                                        <span class="menu-icon">
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                        fill="black" />
                                                                    <path opacity="0.3"
                                                                        d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">In Process</span>
                                                    </a>
                                                </div>
                                                <?php } ?>
                                                <!-- END ADD USER NAVBAR -->

                                                <div class="menu-item">
                                                    <?php if($navbar=="user"){ ?>
                                                    <a class="menu-link py-3" href="<?= base_url('user/need') ?>">
                                                        <?php } elseif($navbar=="rev"){ ?>
                                                        <a class="menu-link py-3"
                                                            href="<?= base_url('reviewer/need') ?>">
                                                            <?php } elseif($navbar=="app"){ ?>
                                                            <a class="menu-link py-3"
                                                                href="<?= base_url('approver/need') ?>">
                                                                <?php } ?>
                                                                <span class="menu-icon">
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <span class="menu-title">Need Process</span>
                                                                <?php if(empty($navbar_notif) || (count($navbar_notif))==0) { ?>
                                                                <!-- DO NOTHING -->
                                                                <?php } else { ?>
                                                                <span
                                                                    class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1"><b>⋇</b></span></span>
                                                                <?php } ?>
                                                            </a>
                                                </div>
                                                <div class="menu-item">
                                                    <?php if($navbar=="user"){ ?>
                                                    <a class="menu-link py-3" href="<?= base_url('user/done') ?>">
                                                        <?php } elseif($navbar=="rev"){ ?>
                                                        <a class="menu-link py-3"
                                                            href="<?= base_url('reviewer/done') ?>">
                                                            <?php } elseif($navbar=="app"){ ?>
                                                            <a class="menu-link py-3"
                                                                href="<?= base_url('approver/done') ?>">
                                                                <?php } ?>
                                                                <span class="menu-icon">
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <span class="menu-title">Done</span>
                                                            </a>
                                                </div>
                                                <div class="menu-item">
                                                    <?php if($navbar=="user"){ ?>
                                                    <a class="menu-link py-3" href="<?= base_url('user/all') ?>">
                                                        <?php } elseif($navbar=="rev"){ ?>
                                                        <a class="menu-link py-3"
                                                            href="<?= base_url('reviewer/all') ?>">
                                                            <?php } elseif($navbar=="app"){ ?>
                                                            <a class="menu-link py-3"
                                                                href="<?= base_url('approver/all') ?>">
                                                                <?php } ?>
                                                                <span class="menu-icon">
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M20 14H11C10.4 14 10 13.6 10 13V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V13C21 13.6 20.6 14 20 14ZM21 20V17C21 16.4 20.6 16 20 16H11C10.4 16 10 16.4 10 17V20C10 20.6 10.4 21 11 21H20C20.6 21 21 20.6 21 20Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <span class="menu-title">All</span>
                                                            </a>
                                                </div>

                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Navbar-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Toolbar wrapper-->
                                <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                        <!--begin::Menu wrapper-->
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <img alt="Pic" src="<?= base_url('assets/profile.png');?>" />
                                        </div>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo" src="<?= base_url('assets/profile.png');?>" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                                            <?=$profile->nama?>
                                                            <span
                                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">on</span>
                                                        </div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7"><?=$profile->username?></a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5 my-1">
                                                <a href="<?= base_url('welcome/changepass') ?>"
                                                    class="menu-link px-5">Ganti Password</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="<?= base_url('welcome/logout') ?>" class="menu-link px-5">Sign
                                                    Out</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::User -->
                                    <!--begin::Aside mobile toggle-->
                                    <!--end::Aside mobile toggle-->
                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
                        <!--begin::Title-->
                        <?php if(empty($title)){$title="";} ?>
                        <h3 class="text-white fw-bolder fs-2qx me-5"><?=$title?></h3>

                    </div>
                    <!--end::Container-->
                </div>
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Post-->
                    <div class="content flex-row-fluid" id="kt_content">
                        <!--begin::Index-->
                        <div class="card card-page">
                            <!--begin::Card body-->
                            <div class="card-body">