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

$d = $db->query("SELECT * FROM jukir a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi AND a.id_jukir='$_GET[id]'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Details Juru Parkir | <?= $title; ?></title>
    <meta name="keywords" content="personal portfolio, cv, resume, agency, bootstrap, clean, cv, designer, developer, freelancer, modern, one page portfolio, onepage, personal portfolio, responsive, resume, vcard" />
    <meta name="description" content="Best personal portfolio modern html template.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="<?= base_url(); ?>../../assets/dtl/assets/dtl/img/favicon/favicon.png" sizes="32x32" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/animate.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/plugins/jquery.fancybox.min.css" />

    <!-- Main Style -->
    <link rel="stylesheet" id="main_style" href="<?= base_url(); ?>../../assets/dtl/css/style.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>../../assets/dtl/css/responsive.css" />
    <link rel="stylesheet" class="dark-mode" href="<?= base_url(); ?>../../assets/dtl/css/dark.css">

</head>

<body class="body-bg">

    <!-- On change section animation -->
    <div id="overlay_shine"></div>

    <!-- Loader -->
    <div id="ms-overlay">
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
    </div>

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
                    <li><a href="javascript:void(0)" class="navs-link nav-experience" data-section="ms-experience-section"><i class="fa fa-briefcase"></i><span>Experience</span></a><span class="noty"><span>Experience</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-portfolio" data-section="ms-portfolio-section"><i class="fas fa-folder-open"></i><span>Portfolio</span></a><span class="noty"><span>Portfolio</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-news" data-section="ms-news-section"><i class="fas fa-newspaper"></i><span>News</span></a><span class="noty"><span>News</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-contact" data-section="ms-contact-section"><i class="fa fa-envelope"></i><span>Contact</span></a><span class="noty"><span>Contact</span></span></li>
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
                            <img src="<?= base_url(); ?>../../assets/dtl/img/profile.jpg" alt="profile" data-tilt>
                            <ul class="ms-social">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://linkedin.com/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 border-content-color">
                    <div class="ms-detail">
                        <div class="info">
                            <h1>My Self <span>Maria Ilvor</span></h1>
                            <h2><span>-</span>I'm a Web Developer</h2>
                            <p>The goal isn't to build a website. The goal is to build your business. With Creative, flexible and affordable website design and development.</p>
                            <a class="custom-btn ms-btn m-r-5px" href="javascript:void(0)">Download CV</a>
                            <a class="custom-btn ms-btn-1 nav-about" href="javascript:void(0)">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home section End -->

    <!-- About section -->
    <section class="ms-about-section ms-slide padding-tb-80 body-bg">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>About<span> Me</span></h2>
                    <span class="ligh-title">About</span>
                </div>
                <div class="col-lg-6">
                    <div class="ms-about-detail">
                        <h4>Creativity bleeds from the pen of inspiration.</h4>
                        <p class="ms-text">I am your Brand Consultant having <b>8+ years</b> of experience in this field provides complete range of marketing materials and branding solution to any industry as well as corporate clients maintaining their reputation and increasing the brand awareness using PR & other print media & online marketing activities.</p>
                        <div class="ms-about-info">
                            <ul class="m-r-30">
                                <li><span class="title">Full Name<b>:</b></span>Maria Martin Ilvor</li>
                                <li><span class="title">Age<b>:</b></span>30 Years</li>
                                <li><span class="title">Language<b>:</b></span>English, Hindi, Gujarati</li>
                                <li><span class="title">Phone No<b>:</b></span>+00 9876543210</li>
                                <li><span class="title">Email<b>:</b></span>mail.example@gmail.com</li>
                                <li><span class="title">Address<b>:</b></span><span>Ruami Mello Moraes, - Salvador - MA, 40352, Brazil.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ms-skill-progress">
                        <h5>PHP</h5>
                        <div class="progress" data-percent="90%">
                            <div class="progress-done progress-done-php" role="progressbar">
                                <span>90%</span>
                            </div>
                        </div>
                        <h5>JAVASCRIPT</h5>
                        <div class="progress" data-percent="50%">
                            <div class="progress-done progress-done-js" role="progressbar">
                                <span>50%</span>
                            </div>
                        </div>
                        <h5>HTML</h5>
                        <div class="progress" data-percent="98%">
                            <div class="progress-done progress-done-html" role="progressbar">
                                <span>98%</span>
                            </div>
                        </div>
                        <h5>CSS</h5>
                        <div class="progress" data-percent="92%">
                            <div class="progress-done progress-done-css" role="progressbar">
                                <span>92%</span>
                            </div>
                        </div>
                        <h5>SCSS</h5>
                        <div class="progress" data-percent="70%">
                            <div class="progress-done progress-done-scss" role="progressbar">
                                <span>70%</span>
                            </div>
                        </div>
                        <h5>Photoshop</h5>
                        <div class="progress" data-percent="65%">
                            <div class="progress-done progress-done-ps" role="progressbar">
                                <span>65%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Block start -->
            <div class="row service-box p-t-80 m-tb-minus-12">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="flipper">
                        <div class="main-box">
                            <div class="box-front height-300 white-bg">
                                <img class="bg-img svg_img" src="assets/img/service/1.svg" alt="Graphics Design"></img>
                                <div class="content-wrap">
                                    <img class="icofont icofont-headphone-alt font-40px dark-color svg_img" src="assets/img/service/1.svg" alt="Graphics Design"></img>
                                    <h3>Graphics Design</h3>
                                    <p>Develop the Visual Identity of Your Business</p>
                                </div>
                            </div>
                            <div class="box-back height-300 gradient-bg">
                                <div class="content-wrap">
                                    <h3>Graphics Design</h3>
                                    <p>Develop the Visual Identity of Your Business</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="flipper">
                        <div class="main-box">
                            <div class="box-front height-300 white-bg">
                                <img class="bg-img svg_img" src="assets/img/service/2.svg" alt="Graphics Design"></img>
                                <div class="content-wrap">
                                    <img class="icofont icofont-headphone-alt font-40px dark-color svg_img" src="assets/img/service/2.svg" alt="web design"></img>
                                    <h3>Web Design</h3>
                                    <p>Connect With Your Users, Not Just Your Business.</p>
                                </div>
                            </div>
                            <div class="box-back height-300 gradient-bg">
                                <div class="content-wrap">
                                    <h3>Web Design</h3>
                                    <p>Connect With Your Users, Not Just Your Business.</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="flipper">
                        <div class="main-box">
                            <div class="box-front height-300 white-bg">
                                <img class="bg-img svg_img" src="assets/img/service/3.svg" alt="Graphics Design"></img>
                                <div class="content-wrap">
                                    <img class="icofont icofont-headphone-alt font-40px dark-color svg_img" src="assets/img/service/3.svg" alt="development"></img>
                                    <h3>Development</h3>
                                    <p>We Develop the Visual Identity of Your Business.</p>
                                </div>
                            </div>
                            <div class="box-back height-300 gradient-bg">
                                <div class="content-wrap">
                                    <h3>Development</h3>
                                    <p>We Develop the Visual Identity of Your Business.</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="flipper">
                        <div class="main-box">
                            <div class="box-front height-300 white-bg">
                                <img class="bg-img svg_img" src="assets/img/service/4.svg" alt="Graphics Design"></img>
                                <div class="content-wrap">
                                    <img class="icofont icofont-headphone-alt font-40px dark-color svg_img" src="assets/img/service/4.svg" alt="seo friendly"></img>
                                    <h3>Seo Friendly</h3>
                                    <p>Taking your site at the top of Google's ranking.</p>
                                </div>
                            </div>
                            <div class="box-back height-300 gradient-bg">
                                <div class="content-wrap">
                                    <h3>Seo Friendly</h3>
                                    <p>Taking your site at the top of Google's ranking.</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section End -->

    <!-- Start Experience & Education section -->
    <section class="ms-experience-section ms-slide padding-tb-80 body-bg">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>My <span>Achievements</span></h2>
                    <span class="ligh-title">Achievements</span>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="education">
                        <h4>Education</h4>
                        <ul class="timeline">
                            <li class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-info">
                                        <span>June 15, 2013 - 2016</span>
                                    </div>
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h5 class="timeline-title">Master in Computer Engineering<span class="sub">- First Class</span></h5>
                                        <p>Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-info">
                                        <span>June 12, 2010 - 2013</span>
                                    </div>
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h5 class="timeline-title">Bachelor in Computer Engineering<span class="sub">- First Class</span></h5>
                                        <p>Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-info">
                                        <span>June 1, 2009 - 2010</span>
                                    </div>
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h5 class="timeline-title">Higher Secondary<span class="sub">- (A+)</span></h5>
                                        <p>Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
                                    </div>
                                </div>
                            </li>
                            <div class="timeline-period-end"></div>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="experiense">
                        <h4>Experiense</h4>
                        <ul class="timeline">
                            <li class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-info">
                                        <span>March 12, 2020</span>
                                    </div>
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h5 class="timeline-title">Envato<span class="sub">- Team Leader</span></h5>
                                        <p>Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-info">
                                        <span>January 23, 2018 - 2020</span>
                                    </div>
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h5 class="timeline-title">Facebook Company<span class="sub">- Sr. Developer</span></h5>
                                        <p>Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-block">
                                    <div class="timeline-info">
                                        <span>July 23, 2016 - 2018</span>
                                    </div>
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <h5 class="timeline-title">Twitter Company<span class="sub">- Jr. Developer</span></h5>
                                        <p>Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
                                    </div>
                                </div>
                            </li>
                            <div class="timeline-period-end"></div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row p-t-80 m-tb-minus-12 space-2 achive" id="counter">
                <div class="col-lg-3 col-md-6 col-6 p-tp-12">
                    <div class="count_block" data-tilt>
                        <h3><span class="counter counter-value" data-count="459">459</span>+</h3>
                        <p>Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 p-tp-12" data-tilt>
                    <div class="count_block">
                        <h3><span class="counter counter-value" data-count="241">241</span>+</h3>
                        <p>Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 p-tp-12" data-tilt>
                    <div class="count_block">
                        <h3 class="active-num"><span class="counter counter-value" data-count="56">56</span>+</h3>
                        <p>Countries</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 p-tp-12" data-tilt>
                    <div class="count_block">
                        <h3><span class="counter counter-value" data-count="15">15</span>+</h3>
                        <p>Awords</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Experience & Education Section -->

    <!-- Start Portfolio Section -->
    <section class="ms-portfolio-section ms-slide portfolio padding-tb-80 body-bg">
        <div class="container">
            <div class="section-title p-b-30">
                <h2>My <span>Portfolio</span></h2>
                <span class="ligh-title">Portfolio</span>
            </div>
            <div class="row m-b-minus-24px">
                <div class="portfolio-content">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="portfolio-tabs">
                                    <ul>
                                        <li class="filter" data-filter="all">ALL</li>
                                        <li class="filter" data-filter=".design">DESIGN</li>
                                        <li class="filter" data-filter=".development">DEVELOPMENT</li>
                                        <li class="filter" data-filter=".graphics">GRAPHICS</li>
                                        <li class="filter" data-filter=".templates">Templates</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="portfolio-content-items">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-xs-12 mix graphics templates">
                                            <div class="hovereffect">
                                                <div class="portfolio-img">
                                                    <img src="assets/img/portfolio/11.jpg" alt="graphics">
                                                    <h3><span>3D Graphics</span><span>Templates</span></h3>
                                                </div>
                                                <div class="overlay">
                                                    <div class="overlay-info">
                                                        <a class="info" href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        <a class="info" data-fancybox="gallery" href="assets/img/portfolio/1.jpg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-xs-12 mix design">
                                            <div class="hovereffect">
                                                <div class="portfolio-img">
                                                    <img src="assets/img/portfolio/22.jpg" alt="design">
                                                    <h3><span>Web Design</span></h3>
                                                </div>
                                                <div class="overlay">
                                                    <div class="overlay-info">
                                                        <a class="info" href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        <a class="info" data-fancybox="gallery" href="assets/img/portfolio/2.jpg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-xs-12 mix design">
                                            <div class="hovereffect">
                                                <div class="portfolio-img">
                                                    <img src="assets/img/portfolio/33.jpg" alt="design">
                                                    <h3><span>Web Design</span></h3>
                                                </div>
                                                <div class="overlay">
                                                    <div class="overlay-info">
                                                        <a class="info" href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        <a class="info" data-fancybox="gallery" href="assets/img/portfolio/3.jpg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-xs-12 mix development">
                                            <div class="hovereffect">
                                                <div class="portfolio-img">
                                                    <img src="assets/img/portfolio/44.jpg" alt="development">
                                                    <h3><span>Development</span></h3>
                                                </div>
                                                <div class="overlay">
                                                    <div class="overlay-info">
                                                        <a class="info" href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        <a class="info" data-fancybox="gallery" href="assets/img/portfolio/4.jpg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-xs-12 mix templates design">
                                            <div class="hovereffect">
                                                <div class="portfolio-img">
                                                    <img src="assets/img/portfolio/55.jpg" alt="templates">
                                                    <h3><span>Templates</span><span>Web Design</span></h3>
                                                </div>
                                                <div class="overlay">
                                                    <div class="overlay-info">
                                                        <a class="info" href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        <a class="info" data-fancybox="gallery" href="assets/img/portfolio/5.jpg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-xs-12 mix development graphics">
                                            <div class="hovereffect">
                                                <div class="portfolio-img">
                                                    <img src="assets/img/portfolio/66.jpg" alt="development">
                                                    <h3><span>Development</span><span>3D Graphics</span></h3>
                                                </div>
                                                <div class="overlay">
                                                    <div class="overlay-info">
                                                        <a class="info" href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        <a class="info" data-fancybox="gallery" href="assets/img/portfolio/6.jpg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <h2>Latest <span>News</span></h2>
                <span class="ligh-title">News</span>
            </div>
            <div class="row m-b-minus-24px">
                <div class="col-lg-4 col-md-6">
                    <div class="news-info">
                        <figure class="news-img"><a href="#"><img src="assets/img/news/1.jpg" alt="news imag"></a>
                        </figure>
                        <div class="detail">
                            <label>July 30,2019 - <a href="#">Marketing</a></label>
                            <h3><a href="#">Marketing Guide: 5 Steps to Success.</a></h3>
                            <p class="text-length">"Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="more-info">
                                <a href="#">Read More<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-info">
                        <figure class="news-img"><a href="#"><img src="assets/img/news/2.jpg" alt="news imag"></a>
                        </figure>
                        <div class="detail">
                            <label>July 30,2019 - <a href="#">Business</a></label>
                            <h3><a href="#">Best way to solve business deal issue.</a></h3>
                            <p class="text-length">"Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="more-info">
                                <a href="#">Read More<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-info">
                        <figure class="news-img"><a href="#"><img src="assets/img/news/3.jpg" alt="news imag"></a>
                        </figure>
                        <div class="detail">
                            <label>July 30,2019 - <a href="#">Knowledge</a></label>
                            <h3><a href="#">31 customer service stats know in 2019.</a></h3>
                            <p class="text-length">"Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="more-info">
                                <a href="#">Read More<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-info">
                        <figure class="news-img"><a href="#"><img src="assets/img/news/4.jpg" alt="news imag"></a>
                        </figure>
                        <div class="detail">
                            <label>July 30,2019 - <a href="#">Business</a></label>
                            <h3><a href="#">Business ideas to grow your business.</a></h3>
                            <p class="text-length">"Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="more-info">
                                <a href="#">Read More<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-info">
                        <figure class="news-img"><a href="#"><img src="assets/img/news/5.jpg" alt="news imag"></a>
                        </figure>
                        <div class="detail">
                            <label>July 30,2019 - <a href="#">Marketing</a></label>
                            <h3><a href="#">Marketing Guide: 5 Steps to Success.</a></h3>
                            <p class="text-length">"Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="more-info">
                                <a href="#">Read More<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="news-info">
                        <figure class="news-img"><a href="#"><img src="assets/img/news/6.jpg" alt="news imag"></a>
                        </figure>
                        <div class="detail">
                            <label>July 30,2019 - <a href="#">Knowledge</a></label>
                            <h3><a href="#">31 customer service stats know in 2019.</a></h3>
                            <p class="text-length">"Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="more-info">
                                <a href="#">Read More<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="ms-pagination">
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="dots">...</li>
                            <li><a href="#">9</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Section -->

    <!-- Start Contact Section -->
    <section class="ms-contact-section ms-slide padding-tb-80 body-bg">
        <div class="container d-block">
            <div class="section-title">
                <h2>Get in <span>Touch</span></h2>
                <span class="ligh-title">Contact</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <iframe src="//maps.google.com/maps?q=-12.942227,-38.480291&z=15&output=embed" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="fname" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="umail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="custom-btn ms-btn-1">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row p-t-80 ms-contact-detail m-tb-minus-12">
                <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                    <div class="ms-box">
                        <div class="detail">
                            <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title">Mail & Website</h3>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp mail.example@gmail.com
                                </p>
                                <p>
                                    <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.yourdomain.com
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                    <div class="ms-box">
                        <div class="detail">
                            <div class="icon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title">Contact</h3>
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+91)-9876XXXXX
                                </p>
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+91)-987654XXXX
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12 m-auto">
                    <div class="ms-box">
                        <div class="detail">
                            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title">Address</h3>
                                <p>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp Ruami Mello Moraes Filho, 987 - Salvador - MA, 40352, Brazil.
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                <!-- /Boxes de Acoes -->
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

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
</body>

</html>