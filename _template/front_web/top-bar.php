<?php 
include '_func/identity.php';
if (empty($_SESSION['username'])) {
    $menu = '<li class="d-xl-none d-xl-block top-links-item"><a href="'.base_url().'login-for-users">Login / Register</a></li>';
} else if ($_SESSION['level']!='7') {
    $menu = '<li class="d-xl-none d-xl-block top-links-item"><a href="'.base_url().'dashboard">Admin Page</a></li>';
} else {
    $menu = '<li class="d-xl-none d-xl-block top-links-item"><a href="'.base_url().'p/out">Logout</a></li>';
}
?>
<div class="container clearfix">

    <div class="row justify-content-between">
        <div class="col-12 col-md-auto">

            <!-- Top Links
						============================================= -->
            <div class="top-links">
                <ul class="top-links-container">
                    <li class="top-links-item"><a href="<?= base_url(); ?>">Home</a>
                        <ul class="top-links-sub-menu">
                            <li class="top-links-item"><a href="about.html">About</a></li>
                            <li class="top-links-item"><a href="faqs.html">FAQs</a></li>
                            <li class="top-links-item"><a href="#contact">Contact</a></li>
                            <li class="top-links-item"><a href="sitemap.html">Sitemap</a></li>
                        </ul>
                    </li>
                    <li class="top-links-item"><a href="faqs.html">FAQs</a></li>
                    <li class="top-links-item"><a href="#contact">Contact</a></li>
                    <?= $menu; ?>
                </ul>
            </div><!-- .top-links end -->

        </div>

        <div class="col-12 col-md-auto">

            <!-- Top Social
						============================================= -->
            <ul id="top-social">
                <li><a href="<?= $fb; ?>" class="si-facebook"><span class="ts-icon"><i
                                class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                <li><a href="<?= $tw; ?>" class="si-twitter"><span class="ts-icon"><i
                                class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                <li><a href="<?= $ig; ?>" class="si-instagram"><span class="ts-icon"><i
                                class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                <li><a href="<?= $yt; ?>" class="si-youtube"><span class="ts-icon"><i
                                class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
                <li><a href="<?= $git; ?>" class="si-github"><span class="ts-icon"><i
                                class="icon-github-circled"></i></span><span class="ts-text">Github</span></a></li>
                <li class="d-none d-sm-flex"><a href="<?= $vim; ?>" class="si-vimeo"><span class="ts-icon"><i
                                class="icon-vimeo"></i></span><span class="ts-text">Vimeo</span></a></li>
                <li class="d-none d-sm-flex"><a href="<?= $lin; ?>" class="si-linkedin"><span class="ts-icon"><i
                                class="icon-linkedin"></i></span><span class="ts-text">Linkedin</span></a></li>
                <li class="d-none d-sm-flex"><a href="<?= $pin; ?>" class="si-pinterest"><span class="ts-icon"><i
                                class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
                <li><a href="<?= $no_wa_add; ?>" class="si-whatsapp"><span class="ts-icon"><i
                                class="icon-whatsapp"></i></span><span class="ts-text"><?= $no_wa; ?></span></a></li>
                <li><a href="<?= $no_telp_add; ?>" class="si-call"><span class="ts-icon"><i
                                class="icon-call"></i></span><span class="ts-text"><?= $no_telp; ?></span></a></li>
                <li><a href="<?= $emails_add; ?>" class="si-email3"><span class="ts-icon"><i
                                class="icon-email3"></i></span><span class="ts-text"><?= $emails; ?></span></a></li>
            </ul><!-- #top-social end -->

        </div>

    </div>

</div>