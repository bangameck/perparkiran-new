<!--========================================================= 
Item Name: Masterly - Personal Portfolio One Page HTML Template.
Author: ashishmaraviya
Version: 1.1
Copyright 2022-2023
Author URI: https://themeforest.net/user/ashishmaraviya
============================================================-->
<?php
include '../../_func/func.php';
include '../../_func/.identity.php';

$d = $db->query("SELECT *, a.created_at as tgl_gabung FROM jukir a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi AND a.id_jukir='$_GET[id]'")->fetch_assoc();
$tgl_aktif = $db->query("SELECT * FROM jukir_kta WHERE id_jukir='$_GET[id]'  ORDER BY tgl_kadaluarsa DESC LIMIT 1")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Juru Parkir <?= $d['nm_jukir']; ?> | <?= $title; ?></title>
    <meta name="description" content="Sistem Informasi Perparkiran Dinas Perhubungan Kota Pekanbaru">
    <meta name="keywords" content="Sistem Informasi Perparkiran Kota Pekanbaru, Parkir Pekanbaru, UPT Parkir Pekanbaru, UPT Perparkiran Pekanbaru, UPTD Parkir Pekanbaru, Dinas Perhubungan Kota Pekanbaru, Dishub Pku, Jumlah Jukir Pekanbaru, Jukir Pekanbaru">
    <meta name="author" content="uptperparkiranpekanbaru">

    <!-- site Favicon -->
    <link rel="icon" href="<?= base_url(); ?>../../assets/adm/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>../../assets/adm/images/favicon.png" type="image/x-icon">

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/animate.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/jquery.fancybox.min.css" />

    <!-- Main Style -->
    <link rel="stylesheet" id="main_style" href="<?= base_url(); ?>../../assets/dtl/css/style.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/responsive.css" />
    <link rel="stylesheet" class="dark-mode" href="<?= base_url(); ?>../../assets/dtl/css/dark.css">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #FFF;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Pacifico', cursive;
        }
    </style>
    <script type="text/javascript">
        //script preloader
        (function($) {
            $(window).on('load', function() {
                $('#preloader').fadeOut('2000', function() {
                    $(this).hide();
                });
            });

        })(jQuery);

        //slow bisa diganti dengan angka misal 2000 
    </script>
</head>

<body class="body-bg">

    <!-- On change section animation -->
    <div id="overlay_shine"></div>
    <!-- preloader -->
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url(); ?>../../assets/adm/images/logoparkir.gif" width="80">
            <script language="JavaScript">
                var text = "Please Wait...";
                var delay = 100;
                var currentChar = 1;
                var destination = "[none]";

                function type() {
                    //if (document.all)
                    {
                        var dest = document.getElementById(destination);
                        if (dest) // && dest.innerHTML)
                        {
                            dest.innerHTML = text.substr(0, currentChar) + "<blink>_</blink>";
                            currentChar++;
                            if (currentChar > text.length) {
                                currentChar = 1;
                                setTimeout("type()", 500);
                            } else {
                                setTimeout("type()", delay);
                            }
                        }
                    }
                }

                function startTyping(textParam, delayParam, destinationParam) {
                    text = textParam;
                    delay = delayParam;
                    currentChar = 1;
                    destination = destinationParam;
                    type();
                }
            </script> <b>
                <div 0px="" 12px="" arial="" color:="" ff0000="" font:="" id="textDestination" margin:="" style="background-color: none;"></div>
            </b>
            <script language="JavaScript">
                javascript: startTyping(text, 10, "textDestination");
            </script>
        </div>
    </div>
    <!-- Loader -->
    <!-- <div id="ms-overlay">
        <div class="ms-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->

    <!-- Header navigation section -->
    <header>
        <div class="sidebar-title">
            <h5>Menu</h5>
            <a href="javascript:void(0)" class="nav-close"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <nav class="ms-navigation">
            <div>
                <ul>
                    <li><a href="javascript:void(0)" class="navs-link nav-home" data-section="ms-home"><i class="fa fa-home"></i><span>Home</span></a><span class="noty"><span>Home</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-about" data-section="ms-about-section"><i class="fa fa-user"></i><span>About</span></a><span class="noty"><span>About</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-news" data-section="ms-news-section"><i class="fas fa-newspaper"></i><span>Jukir</span></a><span class="noty"><span>Jukir</span></span></li>
                </ul>
            </div>
        </nav>
        <ul class="ms-social">
            <li><a class="ms-btn-1" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a class="ms-btn-1" href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a class="ms-btn-1" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a class="ms-btn-1" href="https://linkedin.com/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        </ul>
    </header>
    <div class="header-overlay"></div>
    <a href="javascript:void(0)" class="nav-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <!-- End Header navigation section -->

    <!-- Home section -->
    <section class="ms-home ms-slide home-section body-bg">
        <div class="container-fluid p-0">
            <div class="ms-row">
                <div class="col-lg-6 col-md-12 border-content">
                    <div class="profile-img main-bg-black" id="particles-js">
                        <div class="profile-detail">
                            <?php
                            if (empty($d['f_jukir'])) {
                                $ft = 'default.png';
                            } else {
                                $ft = $d['f_jukir'];
                            }
                            if (empty($d['f_kta_jukir'])) {
                                $ft_kta = 'default.png';
                            } else {
                                $ft_kta = $d['f_kta_jukir'];
                            }
                            ?>
                            <img src="<?= base_url(); ?>../../_uploads/f_jukir/<?= $ft; ?>" alt="profile" data-tilt>
                            <!-- <ul class="ms-social">
                                <li><a href="#" target="_blank"><i class="fa fa-camera" aria-hidden="true"></i> <b class="text-white"> <?= $d['nm_jukir']; ?></b></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://linkedin.com/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 border-content-color">
                    <div class="ms-detail">
                        <div class="info">
                            <?php
                            if (date('m-Y', strtotime($d['kta_sd'])) >= date('m-Y')) {
                                $icon = 'fa fa-check-circle-o';
                                $text = 'text-success';
                                $totip = 'KTA Juru Parkir Aktif';
                                $kta_sd = 'KTA Juru Parkir Aktif Sampai dengan <b class="text-success">' . tgl_indo(date('Y-m-d', strtotime($d['kta_sd']))) . '</b>.';
                                $kta_st = 'Aktif Sampai dengan ' . tgl_indo(date('Y-m-d', strtotime($d['kta_sd']))) . '.';
                            } else {
                                $icon = 'fa fa-times-circle-o';
                                $text = 'text-danger';
                                $totip = 'KTA Juru Parkir Expired';
                                $kta_sd = 'KTA Juru Parkir Expired Sejak <b class="text-danger">' . tgl_indo(date('Y-m-d', strtotime($d['kta_sd']))) . '</b>.';
                                $kta_st = 'Expired Sejak ' . tgl_indo(date('Y-m-d', strtotime($d['kta_sd']))) . '.';
                            }
                            ?>
                            <h1><i class="<?= $text; ?> <?= $icon; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $totip; ?>"></i> <span><?= $d['nm_jukir']; ?></span></h1>
                            <h2>NIK - <?= r_nik($d['nik_jukir']); ?></h2>
                            <p>Juru Parkir dengan ID registrasi <b><?= $d['id_jukir2']; ?></b> ini bekerja menjaga Perparkiran dilokasi <b><?= strtoupper($d['tilok']); ?> (<?= strtoupper($d['nm_jalan']); ?>)</b>. Dibawah naungan pengelola <b><?= strtoupper($d['nm_korlap']); ?></b>. Terdaftar didalam database perparkiran Sejak <b><?= tgl_indo(date('Y-m-d', strtotime($d['tgl_gabung']))); ?></b>. <br><br> <?= $kta_sd; ?></p>
                            <!-- <a class="custom-btn ms-btn m-r-5px" href="javascript:void(0)">Download CV</a>
                            <a class="custom-btn ms-btn-1 nav-about" href="javascript:void(0)">More Info</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home section End -->

    <!-- About section -->
    <section class="ms-about-section ms-experience-section ms-slide padding-tb-80 body-bg">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Tentang<span> <?= $d['nm_jukir']; ?></span></h2>
                    <span class="ligh-title">About</span>
                </div>
                <div class="col-lg-6">
                    <div class="ms-about-detail">
                        <h4>Biodata Singkat <?= $d['nm_jukir']; ?>.</h4>
                        <p class="ms-text"><?= $d['nm_jukir']; ?> adalah seorang juru parkir yang lahir di <b><?= $d['t_lahir_jukir']; ?></b>, <?= $d['nm_jukir']; ?> kini berusia<b> <?= usia(date('Y', strtotime($d['tgl_lahir_jukir']))); ?></b>, saat ini ia bekerja memberikan pelayanan perparkiran dilokasi <b><?= strtoupper($d['tilok']); ?> (<?= strtoupper($d['nm_jalan']); ?>)</b>. Beliau terdaftar didalam database perparkiran Sejak <b><?= tgl_indo(date('Y-m-d', strtotime($d['tgl_gabung']))); ?></b>. <br><br> Berikut biodata singkat dari <?= $d['nm_jukir']; ?> :</p>
                        <div class="ms-about-info">
                            <ul class="m-r-30">
                                <li><span class="title">ID Reg <b>:</b></span><?= $d['id_jukir2']; ?></li>
                                <li><span class="title">NIK <b>:</b></span><?= r_nik($d['nik_jukir']); ?></li>
                                <li><span class="title">Nama <b>:</b></span><?= $d['nm_jukir']; ?></li>
                                <li><span class="title">TTL<b>:</b></span><?= $d['t_lahir_jukir']; ?>, <?= tgl_indo(date('Y-m-d', strtotime($d['tgl_lahir_jukir']))) ?></li>
                                <li><span class="title">Usia<b>:</b></span><?= usia(date('Y-m-d', strtotime($d['tgl_lahir_jukir']))); ?></li>
                                <li><span class="title">Alamat<b>:</b></span><?= $d['a_jukir']; ?></li>
                                <hr>
                                <li><span class="title">Titik<b>:</b></span><?= $d['tilok']; ?> (<?= $d['nm_jalan']; ?>)</li>
                                <li><span class="title">Korlap<b>:</b></span><?= $d['nm_korlap']; ?></li>
                                <li><span class="title">Status KTA<b>:</b></span><span><?= $kta_st; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="education">
                        <h4>Riwayat Perpanjangan KTA</h4>
                        <ul class="timeline">
                            <?php
                            $jukir_kta = $db->query("SELECT *,a.tgl_update as tgl_kta FROM jukir_kta a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi AND a.id_jukir='$_GET[id]' ORDER BY tgl_update DESC");
                            while ($jk = $jukir_kta->fetch_assoc()) :
                                if (empty($jk['ket_kta'])) {
                                    $ket_kta = 'Pembuatan KTA baru.';
                                } else {
                                    $ket_kta = $jk['ket_kta'];
                                }
                            ?>
                                <li class="timeline-item">
                                    <div class="timeline-block">
                                        <div class="timeline-info">
                                            <span><?= tgl_indo(date('Y-m-d', strtotime($jk['tgl_kta']))); ?> - <?= tgl_indo(date('Y-m-d', strtotime($jk['tgl_kadaluarsa']))); ?></span>
                                        </div>
                                        <div class="timeline-marker"></div>
                                        <div class="timeline-content">
                                            <h5 class="timeline-title"><?= $jk['tilok']; ?><span class="sub">- <?= $jk['nm_jalan']; ?> - <?= $jk['nm_korlap']; ?></span></h5>
                                            <p><?= $ket_kta; ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                            <div class="timeline-period-end"></div>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Service Block start -->
            <div class="row service-box p-t-80 m-tb-minus-12">
                <div class="portfolio-content-items">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="hovereffect">
                                <div class="portfolio-img">
                                    <img src="<?= base_url(); ?>../../_uploads/f_jukir/<?= $ft; ?>" alt="Foto Profile">
                                    <h3><span>Foto</span></h3>
                                </div>
                                <div class="overlay">
                                    <div class="overlay-info">
                                        <a class="info" data-fancybox="gallery" href="<?= base_url(); ?>../../_uploads/f_jukir/<?= $ft; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="hovereffect">
                                <div class="portfolio-img">
                                    <img src="<?= base_url(); ?>../../_uploads/f_kta_jukir/<?= $ft_kta; ?>" alt="KTA">
                                    <h3><span>KTA</span></h3>
                                </div>
                                <div class="overlay">
                                    <div class="overlay-info">
                                        <a class="info" data-fancybox="gallery" href="<?= base_url(); ?>../../_uploads/f_kta_jukir/<?= $ft_kta; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <?php
                            $qrcode = $db->query("SELECT * FROM jukir_qrcode WHERE id_jukir='$_GET[id]'")->fetch_assoc();
                            if (empty($qrcode['nm_qr'])) {
                                $qr = 'default.png';
                            } else {
                                $qr = $qrcode['nm_qr'];
                            }
                            ?>
                            <div class="hovereffect">
                                <div class="portfolio-img">
                                    <img src="<?= base_url(); ?>../../_uploads/qrcode_jukir/<?= $qr; ?>" alt="KTA">
                                    <h3><span>QR Code</span></h3>
                                </div>
                                <div class="overlay">
                                    <div class="overlay-info">
                                        <a class="info" data-fancybox="gallery" href="<?= base_url(); ?>../../_uploads/qrcode_jukir/<?= $qr; ?>"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- End Portfolio Section -->

    <!-- Start News Section -->
    <section class="ms-news-section ms-slide padding-tb-80 body-bg">
        <div class="container">
            <div class="section-title">
                <h2>Jukir <span>Lainnya</span></h2>
                <span class="ligh-title">Jukir</span>
            </div>
            <div class="row service-box p-t-80 m-tb-minus-12">
                <?php
                $jukir = $db->query("SELECT * FROM jukir WHERE id_jukir2 ORDER BY RAND()");
                while ($j = $jukir->fetch_assoc()) :
                    if (empty($j['f_jukir'])) {
                        $f_jkr = 'default.png';
                    } else {
                        $f_jkr = $j['f_jukir'];
                    }
                ?>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="flipper">
                            <div class="main-box">
                                <div class="box-front height-300 white-bg">
                                    <img class="bg-img svg_img" src="<?= base_url(); ?>../../_uploads/f_jukir/<?= $f_jkr; ?>" alt="Graphics Design"></img>
                                    <div class="content-wrap">
                                        <img class="icofont icofont-headphone-alt font-40px dark-color svg_img" src="<?= base_url(); ?>../../_uploads/f_jukir/<?= $f_jkr; ?>" alt="Graphics Design"></img>
                                        <h3><?= $j['nm_jukir']; ?></h3>
                                        <p>Develop the Visual Identity of Your Business</p>
                                    </div>
                                </div>
                                <div class="box-back height-300 gradient-bg">
                                    <div class="content-wrap">
                                        <h3><?= $j['nm_jukir']; ?></h3>
                                        <p>Develop the Visual Identity of Your Business</p>
                                        <a href="<?= base_url(); ?>../../jukir/detail/<?= $j['id_jukir']; ?>" class="btn">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!-- End News Section -->
    <!-- Theme Custom Cursors -->
    <div class="ms-cursor"></div>
    <div class="ms-cursor-2"></div>

    <!-- Plugins JS -->
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/jquery.fancybox.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/mixitup.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/fontawesome.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/tilt.jquery.js"></script>
    <!-- theme particles script -->
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/particles.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/plugins/app.js"></script>
    <!-- Main Js -->
    <script src="<?= base_url(); ?>../../assets/dtl/js/ms-tools.js"></script>
    <script src="<?= base_url(); ?>../../assets/dtl/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut('slow');
        })

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>