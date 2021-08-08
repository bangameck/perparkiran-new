<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

if(empty($_SESSION['username']) && empty($_SESSION['password'])){
    $hide = 'hidden';
    $l = '<li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav"
                    href="'.base_url().'khusus-admin-login"><i data-feather="log-in"> </i><span>Login</span></a>
            </li>';
} else {
    $hide = '';
    $l = '';
}

if($_SESSION['level']=='1') {
    $hid = '<li class="sidebar-list" ><a class="sidebar-link sidebar-title" href="#"><i
                data-feather="git-pull-request"></i><span>Data Master</span></a>
            <ul class="sidebar-submenu">
            <li><a href="'.base_url().'users">Users</a></li>
            <li><a href="'.base_url().'kecamatan">Kecamatan</a></li>
            <li><a href="'.base_url().'bus">Bus</a></li>
            </ul>
            </li>';
} else {
    $hid = '';
}
 ?>
<div class="logo-icon-wrapper"><a href="<?= base_url(); ?>"><img class="img-fluid"
            src="<?= base_url(); ?>/assets/images/logo/logo-icon.png" alt=""></a></div>
<nav class="sidebar-main">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="<?= base_url(); ?>dashboard"><img class="img-fluid"
                        src="<?= base_url(); ?>/assets/images/logo/logo-icon.png" alt=""></a>
                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                        aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-main-title">
                <div>
                    <h6 class="lan-8">Applications</h6>
                    <p class="lan-9">Ready to use Apps</p>
                </div>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                    href="<?= base_url(); ?>dashboard"><i data-feather="home"> </i><span>Dashboard</span></a></li>
            <?= $hid; ?>
            <li class="sidebar-list" <?= $hide; ?>>
                <a class="sidebar-link sidebar-title link-nav"
                    href="<?= base_url(); ?>layanan"><i data-feather="monitor"> </i><span>Layanan</span></a>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                        data-feather="mail"></i><span>Laporan</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="<?= base_url(); ?>laporan/tanggal">Laporan Pertanggal</a></li>
                    <li><a href="<?= base_url(); ?>laporan">Laporan Keseluruhan</a></li>
                    <li><a href="<?= base_url(); ?>laporan/perbus">Laporan Perbus</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                        data-feather="settings"></i><span>Pengaturan</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="<?= base_url(); ?>setting">Ubah Profil</a></li>
                    <li><a href="<?= base_url(); ?>password">Ubah Password</a></li>
                    <!-- <li><a href="<?= base_url(); ?>laporan/perbus">Laporan Perbus</a></li> -->
                </ul>
            </li>
            <?= $l; ?>
            <li class="sidebar-list" <?= $hide; ?>>
            <a class="sidebar-link sidebar-title link-nav"
                href="<?= base_url(); ?>out" onclick="return confirm('Apakah anda yakin keluar ?')"><i data-feather="log-out"> </i><span>Logout</span></a>
        </li>
            
        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</nav>
</div>