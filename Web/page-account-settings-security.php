<?php
session_start();
include "api/db1.php";
var_dump($_SESSION["role"]);
if (!isset($_SESSION["id"]) AND !isset($_SESSION["role"]))
{
    header("location: login-page.php");
}

$id=$_SESSION["id"];
$get = sqlsrv_query($conn, "SELECT * FROM NguoiDung WHERE IDNguoiDung = '$id'");
$NguoiDung = sqlsrv_fetch_array($get);
$vaitro=$NguoiDung["VaiTro"];
if($vaitro=="AD")
    $vaitro="Admin";
else
    if($vaitro=="CB")
        $vaitro="Cán bộ";
    else
        if($vaitro=="BS")
            $vaitro="Bác sĩ";
        else
            $vaitro="Điều dưỡng";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> Bảo mật - QLKCL - Hệ thống quản lý khu cách ly</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?php echo $NguoiDung["HovaTen"] ?></span><span class="user-status"><?php echo $vaitro?></span></div><span class="avatar"><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-0.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> Tài khoản</a>
                    <!--<a class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i> Inbox</a>
                    <a class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square"></i> Task</a>
                    <a class="dropdown-item" href="app-chat.html"><i class="me-50" data-feather="message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> Settings</a>
                    <a class="dropdown-item" href="page-pricing.html"><i class="me-50" data-feather="credit-card"></i> Pricing</a>
                    <a class="dropdown-item" href="page-faq.html"><i class="me-50" data-feather="help-circle"></i> FAQ</a>-->
                    <a class="dropdown-item" href="login-page.php"><i class="me-50" data-feather="power"></i> Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="../../../app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="../../../app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="../../../app-assets/images/icons/doc.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>-->
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="http://20.39.185.180/"><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                    <h2 class="brand-text">QLKCL</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Chức năng</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý bệnh nhân">Quản lý bệnh nhân</span></a>
                <ul class="menu-content">
                    <?php if($_SESSION["role"] == "NV") {
                        echo '<li><a class="d-flex align-items-center" href="/dsbn.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Danh sách bệnh nhân</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/them-benh-nhan_s.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Thêm bệnh nhân</span></a>
                        </li>';
                    }?>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý nhân sự">Quản lý nhân sự</span></a>
                <ul class="menu-content">
                    <?php if($_SESSION["role"] == "CB") {
                        echo '<li><a class="d-flex align-items-center" href="/ds-nhan-su.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Danh sách nhân sự</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/them-nhan-su.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm nhân sự</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý phiếu khám bệnh">Quản lý phiếu khám bệnh</span></a>
                <ul class="menu-content">

                    <?php if($_SESSION["role"] == "BS") {
                        echo '<li><a class="d-flex align-items-center" href="/dsbn_pkb.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm phiếu khám bệnh</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý phiếu xét nghiệm">Quản lý phiếu xét nghiệm</span></a>
                <ul class="menu-content">

                    <?php if($_SESSION["role"] == "NV") {
                        echo '<li><a class="d-flex align-items-center" href="/dsbn_pxn.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm phiếu xét nghiệm</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý phiếu nhập xuất">Quản lý phiếu nhập xuất</span></a>
                <ul class="menu-content">

                    <?php if($_SESSION["role"] == "CB") {
                        echo '<li><a class="d-flex align-items-center" href="/dsbn_pnx.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm phiếu nhập xuất</span></a>
                        </li>';
                    }?>
                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý thông báo">Quản lý thông báo</span></a>
                <ul class="menu-content">
                    <?php if($_SESSION["role"] == "CB") {
                        echo '<li><a class="d-flex align-items-center" href="/them-thong-bao.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm thông báo</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý thiết bị">Quản lý thiết bị</span></a>
                <ul class="menu-content">
                    <?php if($_SESSION["role"] == "NV") {
                        echo '<li><a class="d-flex align-items-center" href="/them-thiet-bi.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm phiếu thiết bị</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Thống kê báo cáo">Thống kê báo cáo</span></a>
                <ul class="menu-content">
                    <?php if($_SESSION["role"] == "CB") {
                        echo '<li><a class="d-flex align-items-center" href="/thong-ke.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thống kê báo báo</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#taikhoan"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý tài khoản">Quản lý tài khoản</span></a>
                <ul class="menu-content">
                    <?php if($_SESSION["role"] == "AD") {
                        echo '<li><a class="d-flex align-items-center" href="/them-tai-khoan.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm tài khoản</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Quản lý Cơ sở">Quản lý cơ sở, khu, giường, phòng</span></a>
                <ul class="menu-content">

                    <?php if($_SESSION["role"] == "NV") {
                        echo '<li><a class="d-flex align-items-center" href="/ds_cs-k-g-p.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Danh sách cơ sở, khu, giường, phòng</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/them-giuong-phong.php"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Thêm cơ sở, khu, giường, phòng</span></a>
                        </li>';
                    }?>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Bảo mật</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Cài đặt tài khoản</a>
                                </li>
                                <li class="breadcrumb-item active">Tài khoản
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <!--<div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <li class="nav-item">
                            <a class="nav-link" href="page-account-settings-account.php">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Tài khoản</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link active" href="page-account-settings-security.php">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Bảo mật</span>
                            </a>
                        </li>
                    </ul>

                    <!-- security -->

                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Đổi mật khẩu</h4>
                        </div>
                        <div class="card-body pt-1">
                            <!-- form -->
                            <form class="validate-form">
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-old-password">Current password</label>
                                        <div class="input-group form-password-toggle input-group-merge">

                                            <input type="password" class="form-control" id="account-old-password" name="password" placeholder="Enter current password" data-msg="Please current password" />
                                            <input type="text" id="id_user"  hidden class="form-control" value="<?php echo $NguoiDung["IDNguoiDung"] ?>"/>
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-new-password">New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" id="account-new-password" name="new-password" class="form-control" placeholder="Enter new password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" class="form-control" id="account-retype-new-password" name="confirm-new-password" placeholder="Confirm your new password" />
                                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                        </div>
                                    </div>
                                    <!--<div class="col-12">
                                        <p class="fw-bolder">Password requirements:</p>
                                        <ul class="ps-1 ms-25">
                                            <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                                            <li class="mb-50">At least one lowercase character</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>-->
                                    <div class="col-12">
                                        <button type="button" id="update" class="btn btn-primary me-1 mt-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="" target="_blank">QLKCL</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Chung tay đẩy lùi đại dịch Covid-19<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>

<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

<script src="../../../app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!--<script src="../../../app-assets/js/scripts/pages/modal-two-factor-auth.js"></script>-->
<script src="../../../app-assets/js/scripts/pages/page-account-settings-security.js"></script>
<!-- END: Page JS-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(document).ready(function(){
        //button add click
        $('#update').click(function () {
            //get value from input

            $id_user = $('#id_user').val();
            console.log($id_user);

            $password = $('#account-old-password').val();
            console.log($password);

            $newpassword = $('#account-retype-new-password').val();
            console.log($newpassword);

            /*$SDT = $('#SDT').val();
            console.log($SDT);

            $GioiTinh = $('#GioiTinh').val();
            console.log($GioiTinh);

            $QuocTich = $('#QuocTich').val();
            console.log($QuocTich);

            $Trinhdo = $('#Trinhdo').val();
            console.log($Trinhdo);

            $chuyenmon = $('#chuyenmon').val();*/
            /*console.log($chuyenmon);*/

            $.ajax({ url: "http://20.39.185.180/api/admin/update_pw.php",
                context: document.body,
                dataType: 'json',
                type : 'post',
                data: {
                    'id_user':$id_user,
                    'password' : $password,
                    'newpassword' : $newpassword
                    /*'SDT': $SDT,
                    'GioiTinh': $GioiTinh,
                    'QuocTich': $QuocTich,
                    'Trinhdo':$Trinhdo,
                    'chuyenmon': $chuyenmon*/

                },
                success: function(data){
                    console.log(data);
                    if($.trim(data))
                    {
                        Swal.fire('Cập nhật thành công');
                    }else{ Swal.fire('Cập nhật thất bại');}
                }
            });
        })
    });

    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

