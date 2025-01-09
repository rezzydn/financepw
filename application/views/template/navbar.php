<body class="horizontal-active header-full">
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        <div class="hp-main-layout">
            <header>
                <div class="row w-100 m-0">
                    <div class="col ps-18 pe-16 px-sm-24">
                        <div class="row w-100 align-items-center justify-content-between position-relative">
                            <div class="col w-auto hp-flex-none hp-mobile-sidebar-button me-24 px-0" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>

                            <div class="hp-header-text-info col col-lg-14 col-xl-16 hp-header-start-text d-flex align-items-center hp-horizontal-none">
                                <div class="d-flex rounded-3 hp-text-color-primary-1 hp-text-color-dark-0 p-4 hp-bg-color-primary-4 hp-bg-color-dark-70" style="min-width: 18px">
                                    <i class="iconly-Curved-Document"></i>
                                </div>

                                <p class="hp-header-start-text-item hp-input-label hp-text-color-black-100 hp-text-color-dark-0 ms-16 mb-0 lh-1 d-flex align-items-center">
                                    Do you know the latest update of 2022? 🎉
                                    <span class="fw-light hp-text-color-danger-3 ms-12">Our roadmap is alive for future updates.</span>

                                    <a href="https://trello.com/b/8ZRmDN5y/yoda-roadmap" class="ms-8 mb-6 hp-text-color-black-60" target="_blank">
                                        <i class="iconly-Curved-Upload hp-text-color-dark-5"></i>
                                    </a>
                                </p>
                            </div>

                            <div class="col hp-flex-none w-auto hp-horizontal-block">
                                <div class="hp-header-logo d-flex align-items-end">
                                    <a href="<?= base_url('Dashboard')?>">
                                        <img class="hp-logo hp-sidebar-visible" src="<?= base_url()?>assets/app-assets/img/logo/logo-small.svg" alt="logo">
                                        <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="<?= base_url()?>assets/images/pwlogo.png" alt="logo">
                                        <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="<?= base_url()?>assets/images/pwlogo.png" alt="logo">
                                        <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="<?= base_url()?>assets/images/pwlogo.png" alt="logo">
                                        <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="<?= base_url()?>assets/images/pwlogo.png" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <div class="hp-header-search d-none col">
                                <input type="text" class="form-control" placeholder="Search..." id="header-search" autocomplete="off">
                            </div>

                            <div class="col hp-flex-none w-auto hp-horizontal-block hp-horizontal-menu">
                                <ul class="d-flex flex-wrap align-items-center">
                                    <li class="px-18">
                                        <a href="javascript:;" class="px-24 py-10" data-bs-toggle="dropdown">
                                            <span>Katalog</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="dropend">
                                                <a href="<?php echo base_url('katalog/Produk'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Bag2"></i>
                                                        <span>Produk</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('katalog/Diskon'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Discount"></i>
                                                        <span>Diskon</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="dropend">
                                                <a href="<?php echo base_url('katalog/Kategori'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Filter"></i>
                                                        <span>Kategori</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="dropend">
                                                <a href="<?php echo base_url('pembelian/Supplier'); ?>">
                                                    <span>
                                                        <i class="iconly-Light-Document"></i>
                                                        <span>Laporan</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="px-18">
                                        <a href="javascript:;" class="px-24 py-10" data-bs-toggle="dropdown">
                                            <span>Persediaan</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="dropend">
                                                <a href="<?php echo base_url('persediaan/PosisiStok'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Location"></i>
                                                        <span>Posisi Stok</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('persediaan/MonitorStok'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Activity"></i>
                                                        <span>Monitor Stok</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="dropend">
                                                <a href="<?php echo base_url('pembelian/Supplier'); ?>">
                                                    <span>
                                                        <i class="iconly-Light-Swap"></i>
                                                        <span>Transaksi Stok</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="dropend">
                                                <a href="<?php echo base_url('persediaan/LaporanPersediaan'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Document"></i>
                                                        <span>Laporan</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="px-18">
                                        <a href="javascript:;" class="px-24 py-10" data-bs-toggle="dropdown">
                                            <span>Penjualan</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="dropend">
                                                <a href="<?= base_url('penjualan/Transaksi')?>">
                                                    <span>
                                                        <i class="iconly-Light-Swap"></i>
                                                        <span>Transaksi Penjualan</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('penjualan/Customer'); ?>">
                                                    <span>
                                                        <i class="iconly-Light-People"></i>
                                                        <span>Customer</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('penjualan/LaporanPenjualan'); ?>">
                                                    <span>
                                                        <i class="iconly-Light-Document"></i>
                                                        <span>Laporan</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="px-18">
                                        <a href="javascript:;" class="px-24 py-10" data-bs-toggle="dropdown">
                                            <span>Pembelian</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="dropend">
                                                <a href="<?= base_url('pembelian/Transaksi')?>">
                                                    <span>
                                                        <i class="iconly-Light-Swap"></i>
                                                        <span>Transaksi Pembelian</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('pembelian/Supplier'); ?>">
                                                    <span>
                                                        <i class="ri-2x ri-safe-2-line"></i>
                                                        <span>Supplier</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('pembelian/LaporanPembelian'); ?>">
                                                    <span>
                                                        <i class="iconly-Light-Document"></i>
                                                        <span>Laporan</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="px-18">
                                        <a href="javascript:;" class="px-24 py-10" data-bs-toggle="dropdown">
                                            <span>Gudang</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="dropend">
                                                <a href="page-landing.html">
                                                    <span>
                                                        <i class="iconly-Light-Swap"></i>
                                                        <span>Proses Pesanan</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('gudang/BarangMasuk'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Download"></i>
                                                        <span>Barang Masuk</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('gudang/BarangKeluar'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Upload"></i>
                                                        <span>Barang Keluar</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a href="<?php echo base_url('pembelian/Supplier'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Paper"></i>
                                                        <span>Laporan Gudang</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="px-18">
                                        <a href="javascript:;" class="px-24 py-10" data-bs-toggle="dropdown">
                                            <span>Finance</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="dropend">
                                                <a class="dropdown-item" href="<?php echo base_url('finance/Akun'); ?>">
                                                    <span>
                                                        <i class="iconly-Curved-Category"></i>
                                                        <span>Daftar Akun</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a class="dropdown-item" href="<?php echo base_url('finance/PerkiraanAkun'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Danger"></i>
                                                        <span>Hutang</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a class="dropdown-item" href="<?php echo base_url('finance/KasBank'); ?>">
                                                    <span>
                                                        <i class="iconly-Curved-Wallet"></i>
                                                        <span>Kas & Bank</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a class="dropdown-item" href="<?php echo base_url('finance/Jurnal'); ?>">
                                                    <span>
                                                        <i class="iconly-Curved-Folder"></i>
                                                        <span>Jurnal</span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li class="dropend">
                                                <a class="dropdown-item" href="<?php echo base_url('finance/Laporan'); ?>">
                                                    <span>
                                                        <i class="iconly-Broken-Paper"></i>
                                                        <span>Laporan Keuangan</span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="col hp-flex-none w-auto pe-0">
                                <div class="row align-items-center justify-content-end">

                                    <div class="hover-dropdown-fade w-auto px-0 d-flex align-items-center me-8 me-sm-16 position-relative">
                                        <button type="button" class="btn btn-text btn-icon-only">
                                            <i class="iconly-Curved-Notification hp-text-color-black-60 position-relative">
                                                <span class="position-absolute translate-middle p-2 rounded-circle bg-primary hp-notification-circle" style="width: 6px; height: 6px; top: 4px;"></span>
                                            </i>
                                        </button>

                                        <div class="hp-notification-menu dropdown-fade position-absolute pt-18" style="width: 288px; top: 100%;">
                                            <div class="pt-32 pb-18 px-18 rounded border hp-border-color-black-40 hp-bg-black-0 hp-bg-dark-100 hp-border-color-dark-80">
                                                <div class="row justify-content-between align-items-center mb-18">
                                                    <div class="col hp-flex-none w-auto h5 hp-text-color-black-100 hp-text-color-dark-10 hp-text-color-dark-0 me-64 mb-0">Notifications</div>

                                                    <div class="col hp-flex-none w-auto hp-bg-color-primary-1 rounded-pill hp-badge-text hp-text-color-black-0 py-4 px-6 me-12">4 New</div>
                                                </div>

                                                <div class="divider my-4"></div>

                                                <div class="hp-overflow-y-auto px-10" style="max-height: 300px; margin-right: -10px; margin-left: -10px;">
                                                    <div class="row align-items-center hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 py-8 px-10" style="margin-left: -10px; margin-right: -10px; row-gap: 0px;">
                                                        <div class="w-auto px-0 me-8">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 38px; height: 38px;">
                                                                <img src="<?= base_url()?>assets/app-assets/img/memoji/memoji-5.png" class="w-100">
                                                            </div>
                                                        </div>

                                                        <div class="col w-auto px-0">
                                                            <span class="d-block w-100 mb-4 fw-medium hp-p1-body">New message received 💌</span>
                                                            <span class="d-block hp-badge-text hp-text-color-black-60 hp-text-color-dark-40 fw-normal">24 unread messages.</span>
                                                        </div>
                                                    </div>

                                                    <div class="divider my-4"></div>

                                                    <div class="row align-items-center hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 py-8 px-10" style="margin-left: -10px; margin-right: -10px; row-gap: 0px;">
                                                        <div class="w-auto px-0 me-8">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center hp-bg-success-4 rounded-circle" style="width: 38px; height: 38px;">
                                                                <i class="iconly-Curved-TickSquare hp-text-color-success-1"></i>
                                                            </div>
                                                        </div>

                                                        <div class="col w-auto px-0">
                                                            <span class="d-block w-100 mb-4 fw-medium hp-p1-body">Congratulations team 🎉</span>
                                                            <span class="d-block hp-badge-text hp-text-color-black-60 hp-text-color-dark-40 fw-normal">You have 12 new sales!</span>
                                                        </div>
                                                    </div>

                                                    <div class="divider my-4"></div>

                                                    <div class="row align-items-center hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 py-8 px-10" style="margin-left: -10px; margin-right: -10px; row-gap: 0px;">
                                                        <div class="w-auto px-0 me-8">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center hp-bg-danger-4 rounded-circle" style="width: 38px; height: 38px;">
                                                                <i class="iconly-Curved-CloseSquare hp-text-color-danger-1"></i>
                                                            </div>
                                                        </div>

                                                        <div class="col w-auto px-0">
                                                            <span class="d-block w-100 mb-4 fw-medium hp-p1-body">Network Error ⛔️</span>
                                                            <span class="d-block hp-badge-text hp-text-color-black-60 hp-text-color-dark-40 fw-normal">Operation couldn’t be completed</span>
                                                        </div>
                                                    </div>

                                                    <div class="divider my-4"></div>

                                                    <div class="row align-items-center hp-cursor-pointer rounded hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 py-8 px-10" style="margin-left: -10px; margin-right: -10px; row-gap: 0px;">
                                                        <div class="w-auto px-0 me-8">
                                                            <div class="avatar-item d-flex align-items-center justify-content-center hp-bg-warning-4 rounded-circle" style="width: 38px; height: 38px;">
                                                                <i class="iconly-Curved-Danger hp-text-color-warning-1"></i>
                                                            </div>
                                                        </div>

                                                        <div class="col w-auto px-0">
                                                            <span class="d-block w-100 mb-4 fw-medium hp-p1-body">Disk Utility 💥</span>
                                                            <span class="d-block hp-badge-text hp-text-color-black-60 hp-text-color-dark-40 fw-normal">You have not enough disk capacity</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="divider my-4"></div>

                                                <div class="mt-8">
                                                    <button type="button" class="btn btn-text w-100 hp-text-color-primary-1 hp-text-color-dark-primary-2 hp-hover-bg-primary-4 hp-hover-bg-dark-primary">
                                                        <span class="row align-items-center mx-0">
                                                            <i class="w-auto px-0 me-8 ri-delete-bin-line"></i>
                                                            <span class="w-auto px-0">Clear all notifications</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hover-dropdown-fade w-auto px-0 ms-6 position-relative hp-cursor-pointer">
                                        <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px;">
                                            <img src="<?= base_url()?>assets/app-assets/img/memoji/memoji-1.png">
                                        </div>

                                        <div class="hp-header-profile-menu dropdown-fade position-absolute pt-18" style="top: 100%; width: 260px;">
                                            <div class="rounded border hp-border-color-black-40 hp-bg-black-0 hp-bg-dark-100 hp-border-color-dark-80 p-24">
                                                <span class="d-block h5 hp-text-color-black-100 hp-text-color-dark-0 mb-6">Profile Settings</span>

                                                <a href="profile-information.html" class="hp-p1-body hp-text-color-primary-1 hp-text-color-dark-primary-2 hp-hover-text-color-primary-2">View Profile</a>

                                                <div class="divider my-12"></div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <a href="app-contact.html" class="d-flex align-items-center hp-p1-body py-4 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" style="margin-left: -10px; margin-right: -10px;">
                                                            <i class="iconly-Curved-People me-8" style="font-size: 16px;"></i>

                                                            <span class="ml-8">Explore Creators</span>
                                                        </a>
                                                    </div>

                                                    <div class="col-12">
                                                        <a href="page-knowledge-base-1.html" class="d-flex align-items-center hp-p1-body py-4 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" style="margin-left: -10px; margin-right: -10px;">
                                                            <i class="iconly-Curved-Game me-8" style="font-size: 16px;"></i>

                                                            <span class="hp-ml-8">Help Desk</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="divider my-12"></div>

                                                <a class="hp-p1-body" href="index.html">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="offcanvas offcanvas-start hp-mobile-sidebar" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-end me-16 ms-24 mt-16 p-0">
                    <div class="w-auto px-0">
                        <div class="hp-header-logo d-flex align-items-end">
                            <a href="index.html">
                                <img class="hp-logo hp-sidebar-visible" src="<?= base_url()?>assets/app-assets/img/logo/logo-small.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="<?= base_url()?>assets/app-assets/img/logo/logo.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="<?= base_url()?>assets/app-assets/img/logo/logo-dark.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="<?= base_url()?>assets/app-assets/img/logo/logo-rtl.svg" alt="logo">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="<?= base_url()?>assets/app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                            </a>

                            <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                                <span class="hp-sidebar-hidden h3 fw-bold hp-text-color-primary-1 mb-6">.</span>
                                <span class="hp-sidebar-hidden hp-p1-body fw-medium hp-text-color-black-40 mb-16 ms-4" style="letter-spacing: -0.5px;">v.2.2</span>
                            </a>
                        </div>
                    </div>

                    <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden" data-bs-dismiss="offcanvas" aria-label="Close">
                        <button type="button" class="btn btn-text btn-icon-only">
                            <i class="ri-close-fill lh-1 hp-text-color-black-80" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
                    <div class="hp-sidebar-container">
                        <div class="hp-sidebar-header-menu">
                            <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">
                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                                    <button type="button" class="btn btn-text btn-icon-only">
                                        <i class="ri-menu-unfold-line" style="font-size: 16px;"></i>
                                    </button>
                                </div>

                                <div class="w-auto px-0">
                                    <div class="hp-header-logo d-flex align-items-end">
                                        <a href="index.html">
                                            <img class="hp-logo hp-sidebar-visible" src="<?= base_url()?>assets/app-assets/img/logo/logo-small.svg" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="<?= base_url()?>assets/app-assets/img/logo/logo.svg" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block" src="<?= base_url()?>assets/app-assets/img/logo/logo-dark.svg" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none" src="<?= base_url()?>assets/app-assets/img/logo/logo-rtl.svg" alt="logo">
                                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block" src="<?= base_url()?>assets/app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                                        </a>

                                        <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                                            <span class="hp-sidebar-hidden h3 fw-bold hp-text-color-primary-1 mb-6">.</span>
                                            <span class="hp-sidebar-hidden hp-p1-body fw-medium hp-text-color-black-40 mb-16 ms-4" style="letter-spacing: -0.5px;">v.2.2</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                                    <button type="button" class="btn btn-text btn-icon-only">
                                        <i class="ri-menu-fold-line" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                            </div>

                            <ul>
                                <li>
                                    <div class="menu-title">MAIN</div>

                                    <ul>
                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-Home"></i>

                                                    <span>Dashboards</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="dashboard-analytics.html">
                                                        <span>Analytics</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="dashboard-ecommerce.html">
                                                        <span>Ecommerce</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-Graph"></i>

                                                    <span>Widgets</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="javascript:;" class="submenu-item">
                                                        <span>Yoda Card</span>

                                                        <div class="menu-arrow"></div>
                                                    </a>

                                                    <ul class="submenu-children" data-level="2">
                                                        <li>
                                                            <a href="cards-advance.html">
                                                                <span>Advance</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="cards-statistics.html">
                                                                <span>Statistics</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="cards-analytic.html">
                                                                <span>Analytics</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a href="charts.html">
                                                        <span>Charts</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="widgets-selectbox.html">
                                                        <span>SelectBox</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-Document"></i>

                                                    <span>Layouts</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="divider.html">
                                                        <span>Divider</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="grid-system.html">
                                                        <span>Grid System</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="javascript:;" class="submenu-item">
                                                        <span>Page Layouts</span>

                                                        <div class="menu-arrow"></div>
                                                    </a>

                                                    <ul class="submenu-children" data-level="2">
                                                        <li>
                                                            <a href="layout-boxed.html">
                                                                <span>Boxed Layout</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="layout-vertical.html">
                                                                <span>Vertical Layout</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="layout-horizontal.html">
                                                                <span>Horizontal Layout</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="layout-full.html">
                                                                <span>Full Layout</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="menu-title">APPS</div>

                                    <ul>
                                        <li>
                                            <a href="app-contact.html">
                                                <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Contact" aria-label="Contact"></div>

                                                <span>
                                                    <i class="iconly-Curved-People"></i>

                                                    <span>Contact</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-Buy"></i>

                                                    <span>Ecommerce</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="app-ecommerce-shop.html">
                                                        <span>Shop</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="app-ecommerce-wishlist.html">
                                                        <span>Wishlist</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="app-ecommerce-product-detail.html">
                                                        <span>Product Detail</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="app-ecommerce-checkout.html">
                                                        <span>Checkout</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="menu-title">PAGES</div>

                                    <ul>
                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-CloseSquare"></i>

                                                    <span>Error Pages</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="error-404.html">
                                                        <span>404</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="error-403.html">
                                                        <span>403</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="page-landing.html">
                                                <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Landing" aria-label="Landing"></div>

                                                <span>
                                                    <i class="iconly-Curved-Discovery"></i>

                                                    <span>Landing</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="page-pricing.html">
                                                <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Pricing" aria-label="Pricing"></div>

                                                <span>
                                                    <i class="iconly-Curved-Discount"></i>

                                                    <span>Pricing</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="menu-title">COMPONENTS</div>

                                    <ul>
                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-Category"></i>

                                                    <span>General</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children active" data-level="1">

                                                <li>
                                                    <a href="general-style-guide.html">
                                                        <span>Style Guide</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="general-buttons.html">
                                                        <span>Buttons</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="general-remix-icons.html">
                                                        <span>Remix Icons</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="general-iconly-icons.html">
                                                        <span>Iconly Icons</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="submenu-item">
                                                <span>
                                                    <i class="iconly-Curved-Discovery"></i>

                                                    <span>Navigation</span>
                                                </span>

                                                <div class="menu-arrow"></div>
                                            </a>

                                            <ul class="submenu-children" data-level="1">
                                                <li>
                                                    <a href="component-breadcrumb.html">
                                                        <span>Breadcrumb</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="component-dropdown.html">
                                                        <span>Dropdown</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="component-menu.html">
                                                        <span>Menu</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="component-pagination.html">
                                                        <span>Pagination</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="row justify-content-between align-items-center hp-sidebar-footer pb-24 px-24 mx-0 hp-bg-color-dark-100">
                            <div class="divider border-black-20 hp-border-color-dark-70 hp-sidebar-hidden px-0"></div>

                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="me-8 w-auto px-0">
                                        <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px;">
                                            <img src="<?= base_url()?>assets/app-assets/img/memoji/memoji-1.png">
                                        </div>
                                    </div>

                                    <div class="w-auto px-0 hp-sidebar-hidden">
                                        <span class="d-block hp-text-color-black-100 hp-text-color-dark-0 hp-p1-body lh-1">Jane Doe</span>
                                        <a href="profile-information.html" class="hp-badge-text hp-text-color-dark-30">View Profile</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col hp-flex-none w-auto px-0 hp-sidebar-hidden">
                                <a href="profile-information.html">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="remix-icon hp-text-color-black-100 hp-text-color-dark-0" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
