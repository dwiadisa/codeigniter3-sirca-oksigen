<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets_dashboard/') ?>assets/img/logo.png" rel="icon">
    <link href="<?= base_url('assets_dashboard/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets_dashboard/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets_dashboard/') ?>assets/css/style.css" rel="stylesheet">
    <!-- loader fontawesome -->
    <script src="https://kit.fontawesome.com/952369c70f.js" crossorigin="anonymous"></script>
    <!-- loader fontawesome -->


    <!-- load JS datatables -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script> -->



    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- load JS datatables -->
    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php
                        if ($this->session->userdata('level') == "WTO_ADMIN") {
                            echo base_url('dashboard');
                        } elseif ($this->session->userdata('level') == "WTO_VIEW") {
                            echo base_url('dashboard');
                        } elseif ($this->session->userdata('level') == "CALON_ANGGOTA") {
                            echo base_url('form_pendaftaran');
                        }
                        ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url('assets_dashboard/') ?>assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">UKM Teater Oksigen </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">






                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('assets_dashboard/') ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $this->session->userdata('nama') ?> |<?php echo $this->session->userdata('username') ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $this->session->userdata('username') ?></h6>
                            <span><?php echo $this->session->userdata('level') ?></span>
                        </li>
                        <li>
                        </li>
                        <?php
                        if ($this->session->userdata('level') !== "CALON_ANGGOTA") { ?>
                            <hr class="dropdown-divider">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                        <?php  } ?>

                        <li>
                            <hr class="dropdown-divider">
                        </li>





                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('auth/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- End Dashboard Nav -->
            <!-- <li class="nav-heading">Content Management System (Comming Soon)</li> -->



            <!-- 
            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-list"></i>

                    <span>Kategori</span>
                </a>
            </li>End Blank Page Nav -->


            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-newspaper"></i>

                    <span>Artikel</span>
                </a>
            </li>End Blank Page Nav -->

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-file-earmark"></i>
                    <span>Pages</span>
                </a>
            </li> -->
            <!-- End Blank Page Nav -->
            <?php

            // jika yang mengakses adalah WTO ADMIN dan WTO VIEW munculkan menu ini


            if ($this->session->userdata('level') == "WTO_ADMIN") { ?>

                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url('dashboard') ?>">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="nav-heading">Sistem Pendaftaran Calon Anggota</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('data_ca') ?>">
                        <i class="bi bi-person"></i>
                        <span>Data Calon Anggota</span>
                    </a>
                </li>
            <?php } ?>

            <?php
            if ($this->session->userdata('level') == "WTO_VIEW") { ?>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url('dashboard') ?>">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="nav-heading">Sistem Pendaftaran Calon Anggota</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('data_ca') ?>">
                        <i class="bi bi-person"></i>
                        <span>Data Calon Anggota</span>
                    </a>
                </li>

            <?php } ?>

            <?php

            if ($this->session->userdata('level') == "CALON_ANGGOTA") { ?>


                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('form_pendaftaran') ?>">
                        <i class="bi bi-journal-text"></i>
                        <span>Formulir Pendaftaran</span>
                    </a>
                </li>


            <?php } ?>


            <!-- End Blank Page Nav -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-cash"></i>
                    <span>Pembayaran Diklatsar</span>
                </a>
            </li> -->
            <!-- End Blank Page Nav -->




            <?php
            // jika yang akses adalah admin munculkan menu ini

            if ($this->session->userdata('level') == "WTO_ADMIN") { ?>


                <li class="nav-heading">Setting</li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('data_user') ?>">
                        <i class="bi bi-person"></i>
                        <span>Data User</span>
                    </a>
                </li><!-- End Blank Page Nav -->


                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('data_fakultas') ?>">
                        <i class="bi bi-bank"></i>
                        <span>Data Fakultas</span>
                    </a>
                </li><!-- End Blank Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('data_prodi') ?>">
                        <i class="bi bi-bank"></i>
                        <span>Data Prodi</span>
                    </a>
                </li><!-- End Blank Page Nav -->


                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo base_url('settings') ?>">
                        <i class="bi bi-gear"></i>
                        <span>Setting Aplikasi</span>
                    </a>
                </li><!-- End Blank Page Nav -->

            <?php } ?>
            <li class="nav-heading">Setting Akun</li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>My Profile</span>
                </a>
            </li><!-- End Blank Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('about'); ?>">
                    <i class="bi bi-info-circle"></i>
                    <span>About</span>
                </a>
            </li><!-- End Blank Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('auth/logout') ?>">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Blank Page Nav -->






    </aside><!-- End Sidebar-->