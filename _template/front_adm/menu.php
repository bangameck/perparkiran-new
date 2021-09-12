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
                    href="'.base_url().'login-for-users"><i data-feather="log-in"> </i><span>Login</span></a>
            </li>';
} else {
    $hide = '';
    $l = '';
}

if($_SESSION['level']=='1') {
    $hid = '
            <li class="sidebar-list" ><a class="sidebar-link sidebar-title" href="#"><i
                data-feather="git-pull-request"></i><span>Data Master</span></a>
            <ul class="sidebar-submenu">
            <li><a class="submenu-title" href="#">Users<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                <ul class="nav-sub-childmenu submenu-content">
                    <li><a href="'.base_url().'users">Aktif</a></li>
                    <li><a href="'.base_url().'users-blok">Blokir</a></li>
                </ul>
            </li>
            <li><a href="'.base_url().'regu">Regu</a></li>
            </ul>
            </li>';
} else {
    $hid = '';
};
if($_SESSION['level']=='2' OR $_SESSION['level']=='3'){
    $pl = '<li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav"
                href="'.base_url().'pengaduan/proses"><i data-feather="message-square"> </i><span>Laporan Proses</span></a>
            </li>';
 } else {
    $pl = '';
 }

if($_SESSION['level']=='1' OR $_SESSION['level']=='5' OR $_SESSION['level']=='6'){
    $peng = '<li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav" href="'.base_url().'pengaduan"><i
            data-feather="message-circle"> </i><span>Pengaduan</span></a>
            </li>';
    $pcare = '<li class="sidebar-list">
                <a class="sidebar-link sidebar-title link-nav" href="'.base_url().'blog"><i
                        data-feather="award"> </i><span>Perparkiran Care</span></a>
            </li>';
} else {
    $peng ='';
    $pcare='';
}
javascript('out','confirm');
//  include_once '_func/func.php'
 ?>
<div class="logo-icon-wrapper"><a href="<?= base_url(); ?>"><img class="img-fluid"
            src="<?= base_url(); ?>assets/adm/images/logo/logo-icon.png" alt=""></a></div>
<nav class="sidebar-main">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn"><a href="<?= base_url(); ?>dashboard"><img class="img-fluid"
                        src="<?= base_url(); ?>assets/adm/images/logo/logo-icon.png" alt=""></a>
                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                        aria-hidden="true"></i></div>
            </li>
            <!-- <li class="sidebar-main-title">
                <div>
                <h6>Menu General</h6>
                <p>Dashboard & Profil</p>
                </div>
            </li> -->
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                    href="<?= base_url(); ?>dashboard"><i data-feather="home"> </i><span>Dashboard</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                    href="<?= base_url(); ?>profile/<?= $_SESSION['username']; ?>"><i data-feather="user"> </i><span>My
                        Profile</span></a>
            </li>
            <?= $hid; ?>
            <?= $pl; ?>
            <li class="sidebar-main-title" <?= $hide; ?>>
                <div>
                <h6>Kegiatan</h6>
                <p>Giat & Pengaduan</p>
                </div>
            </li>
            <li class="sidebar-list" <?= $hide; ?>>
                <a class="sidebar-link sidebar-title link-nav" href="<?= base_url(); ?>giat"><i
                        data-feather="monitor"> </i><span>Giat</span></a>
            </li>
            <?= $peng; ?>
            <li class="sidebar-main-title">
                <div>
                <h6>Blog</h6>
                <p>Berita & Perparkiran Care</p>
                </div>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                        data-feather="file-text"></i><span>Blog</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="<?= base_url(); ?>tags">Tags / Kategori</a></li>
                    <li><a href="<?= base_url(); ?>blog">Postingan</a></li>
                    <!-- <li><a href="<?= base_url(); ?>laporan/perbus">Laporan Perbus</a></li> -->
                </ul>
            </li>
            <?= $pcare; ?>
            <li class="sidebar-main-title">
                <div>
                <h6>Lainnya</h6>
                <p>Laporan, Pengaturan Profile, dll.</p>
                </div>
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
                    <li><a href="<?= base_url(); ?>email">Ubah Email</a></li>
                    <!-- <li><a href="<?= base_url(); ?>laporan/perbus">Laporan Perbus</a></li> -->
                </ul>
            </li>
            <?= $l; ?>
            <li class="sidebar-list" <?= $hide; ?>>
                <a class="sidebar-link sidebar-title link-nav" href="<?= base_url(); ?>out" onclick="return logout()"><i
                        data-feather="power"> </i><span>Logout</span></a>
            </li>

        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</nav>
</div>