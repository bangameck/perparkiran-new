<?php 
include '_func/identity.php'; 
$date=date('Y-m-d');
?>
<title><?= $title; ?></title>
<section id="content">
    <div class="content-wrap">
        <div class="section header-stick bottommargin-lg py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-auto">
                        <div class="d-flex">
                            <span class="badge bg-danger text-uppercase col-auto">Breaking News</span>
                        </div>
                    </div>

                    <div class="col-lg mt-2 mt-lg-0">
                        <div class="fslider" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false"
                            style="min-height: 0;">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <?php 
											$bnews = $db->query("SELECT * FROM blog WHERE bn='Y' ORDER BY RAND() DESC LIMIT 5");
											while($bn=$bnews->fetch_assoc()):
											?>
                                    <div class="slide"><a
                                            href="<?= base_url(); ?>p/berita/<?= $bn['slug']; ?>"><strong><?= $bn['j_blog']; ?>..</strong></a>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container clearfix">

            <div class="row">
                <div class="col-lg-8 bottommargin">

                    <div class="row col-mb-50">
                        <div class="col-12">
                            <div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-arrows="true"
                                data-thumbs="true">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <?php 
												$hnews = $db->query("SELECT * FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' AND a.hn='Y' ORDER BY RAND() DESC LIMIT 6");
												while($hn=$hnews->fetch_assoc()) :
												?>
                                        <div class="slide"
                                            data-thumb="<?= base_url() ?>_uploads/blog/sampul/<?= $hn['id_blog']; ?>/<?= $hn['sampul']; ?>">
                                            <a href="#">
                                                <img src="<?= base_url() ?>_uploads/blog/sampul/<?= $hn['id_blog']; ?>/<?= $hn['sampul']; ?>"
                                                    alt="<?= $hn['sampul']; ?>">
                                                <div class="bg-overlay">
                                                    <div
                                                        class="bg-overlay-content text-overlay-mask dark align-items-end justify-content-start">
                                                        <div class="portfolio-desc py-0">
                                                            <h3><a
                                                                    href="<?= base_url(); ?>p/berita/<?= $hn['slug']; ?>"><?= $hn['j_blog']; ?></a>
                                                            </h3>
                                                            <span>Gambar : <?= $hn['c_sampul']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php endwhile ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="fancy-title title-border">
                                <?php 
										$t_one = $db->query("SELECT * FROM hal_utama a, tags b WHERE a.id_tags=b.id_tags AND id_hal='1'")->fetch_assoc();
										?>
                                <h3 id="pacifico"><i class="icon-tags1"></i> <?= $t_one['nm_tags']; ?></h3>
                            </div>
                            <?php 
									$news_one = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND b.id_tags='$t_one[id_tags]' AND a.publish='Y' ORDER BY RAND()")->fetch_assoc();
                                    if (empty($news_one['id_tags'])) {
										echo '<span style="text-align: center;">-- Belum ada berita dengan kategori ' .$t_one['nm_tags'].' --</span>';
									} else {
                                        ?>
                            <div class="posts-md">
                                <div class="entry row mb-5">
                                    <div class="col-md-12">
                                        <div class="flip-card text-center">
                                            <div class="flip-card-front dark"
                                                style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $news_one['id_blog']; ?>/<?= $news_one['sampul']; ?>"
                                                alt="<?= $news_one['sampul']; ?>')">
                                                <div class="flip-card-inner">
                                                    <div class="card bg-transparent border-0 text-center">
                                                        <div class="card-body">
                                                            <i class="icon-news h1"></i>
                                                            <h3 class="card-title"><?= $news_one['j_blog']; ?></h3>
                                                            <p class="card-text fw-normal"><i
                                                                    class="icon-calendar3"></i>&nbsp;
                                                                <?= tgl_indo(date('Y-m-d', strtotime($news_one['tgl']))) .' | '.date('H:i:s', strtotime($news_one['tgl'])); ?>
                                                                WIB <br>
                                                                <?php
                                                                        $tags = $db->query("SELECT * FROM tags_blog a, tags b WHERE a.id_tags=b.id_tags AND a.id_blog='$news_one[id_blog]'");
                                                                        while ($t=$tags->fetch_assoc()) {
                                                                            echo '<i class="icon-tags1"></i> '.$t['nm_tags'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                                                                        } 
                                                                    ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flip-card-back dark"
                                                style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $news_one['id_blog']; ?>/<?= $news_one['sampul']; ?>"
                                                alt="<?= $news_one['sampul']; ?>')">
                                                <div class="flip-card-inner">
                                                    <p class="mb-2 text-white"><?= judul($news_one['isi'], '250'); ?>
                                                    </p>
                                                    <a href="<?= base_url(); ?>p/berita/<?= $news_one['slug']; ?>"
                                                        type="button" class="btn btn-outline-light mt-2">Selengkapnya
                                                        <i class="icon-line-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="posts-sm row col-mb-30">
                                <?php
										$n=2;
                                        $n_one = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.id_blog!='$news_one[id_blog]' AND b.id_tags='$t_one[id_tags]' AND a.publish='Y' ORDER BY tgl DESC LIMIT 6");
                                        while ($n_o=$n_one->fetch_assoc()) :
                                        ?>
                                <div class="entry col-md-6">
                                    <div class="grid-inner row g-0">
                                        <div class="col-auto">
                                            <div class="entry-image">
                                                <a href="<?= base_url(); ?>p/berita/<?= $n_o['slug']; ?>"><img
                                                        src="<?= base_url() ?>_uploads/blog/sampul/<?= $n_o['id_blog']; ?>/<?= $n_o['sampul']; ?>"
                                                        alt="<?= $n_o['sampul']; ?>"></a>
                                            </div>
                                        </div>
                                        <div class="col ps-3">
                                            <div class="entry-title">
                                                <h4><a href="<?= base_url(); ?>p/berita/<?= $n_o['slug']; ?>"><span
                                                            class="h5" style><em><?= $n++; ?>.
                                                            </em></span><?= $n_o['j_blog']; ?></a></h4>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i>
                                                        <?= tgl_indo_singkat(date('Y-m-d', strtotime($n_o['tgl']))); ?>
                                                    </li>
                                                    <li><i class="icon-clock"></i>
                                                        <?= date('H:i:s', strtotime($n_o['tgl'])); ?> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <?php
                                    } ?>
                        </div>

                        <div class="col-12">
                            <img src="<?= base_url() ?>assets/web/images/magazine/ad.jpg" alt="Ad"
                                class="aligncenter my-0">
                        </div>

                        <div class="col-12">

                            <div class="fancy-title title-border">
                                <?php 
										$t_two = $db->query("SELECT * FROM hal_utama a, tags b WHERE a.id_tags=b.id_tags AND id_hal='2'")->fetch_assoc();
										?>
                                <h3 id="pacifico"><i class="icon-tags1"></i> <?= $t_two['nm_tags']; ?></h3>
                            </div>
                            <?php 
									$news_two = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND b.id_tags='$t_two[id_tags]' AND a.publish='Y' ORDER BY RAND()")->fetch_assoc();
                                    if (empty($news_two['id_tags'])) {
										echo '<span style="text-align: center;">-- Belum ada berita dengan kategori ' .$t_two['nm_tags'].' --</span>';
									} else {
                                        ?>
                            <div class="posts-md">
                                <div class="entry row mb-5">
                                    <div class="col-md-12">
                                        <div class="flip-card text-center top-to-bottom">
                                            <div class="flip-card-front dark"
                                                style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $news_two['id_blog']; ?>/<?= $news_two['sampul']; ?>"
                                                alt="<?= $news_two['sampul']; ?>')">
                                                <div class="flip-card-inner">
                                                    <div class="card bg-transparent border-0 text-center">
                                                        <div class="card-body">
                                                            <i class="icon-news h1"></i>
                                                            <h3 class="card-title"><?= $news_two['j_blog']; ?></h3>
                                                            <p class="card-text fw-normal"><i
                                                                    class="icon-calendar3"></i>&nbsp;
                                                                <?= tgl_indo(date('Y-m-d', strtotime($news_two['tgl']))) .' | '.date('H:i:s', strtotime($news_two['tgl'])); ?>
                                                                WIB<br>
                                                                <?php
                                                                        $tags = $db->query("SELECT * FROM tags_blog a, tags b WHERE a.id_tags=b.id_tags AND a.id_blog='$news_two[id_blog]'");
                                                                        while ($t=$tags->fetch_assoc()) {
                                                                            echo '<i class="icon-tags1"></i> '.$t['nm_tags'].'&nbsp;&nbsp;&nbsp;&nbsp;';
                                                                        } 
                                                                    ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flip-card-back dark"
                                                style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $news_two['id_blog']; ?>/<?= $news_two['sampul']; ?>"
                                                alt="<?= $news_two['sampul']; ?>')">
                                                <div class="flip-card-inner">
                                                    <p class="mb-2 text-white"><?= judul($news_two['isi'], '250'); ?>
                                                    </p>
                                                    <a href="<?= base_url(); ?>p/berita/<?= $news_two['slug']; ?>"
                                                        type="button" class="btn btn-outline-light mt-2">Selengkapnya
                                                        <i class="icon-line-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="posts-sm row col-mb-30">
                                <?php
									$n=2;
                                    $n_two = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.id_blog!='$news_two[id_blog]' AND b.id_tags='$t_two[id_tags]' AND a.publish='Y' ORDER BY tgl DESC LIMIT 6");
                                    while ($n_t=$n_two->fetch_assoc()) :
                                ?>
                                <div class="entry col-md-6">
                                    <div class="grid-inner row g-0">
                                        <div class="col-auto">
                                            <div class="entry-image">
                                                <a href="<?= base_url(); ?>p/berita/<?= $n_t['slug']; ?>"><img
                                                        src="<?= base_url() ?>_uploads/blog/sampul/<?= $n_t['id_blog']; ?>/<?= $n_t['sampul']; ?>"
                                                        alt="<?= $n_t['sampul']; ?>"></a>
                                            </div>
                                        </div>
                                        <div class="col ps-3">
                                            <div class="entry-title">
                                                <h4><a href="<?= base_url(); ?>p/berita/<?= $n_t['slug']; ?>"> <span
                                                            class="h5" style><em><?= $n++; ?>. </em></span>
                                                        <?=$n_t['j_blog']; ?></a></h4>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i>
                                                        <?= tgl_indo_singkat(date('Y-m-d', strtotime($n_t['tgl']))); ?>
                                                    </li>
                                                    <li><i class="icon-clock"></i>
                                                        <?= date('H:i:s', strtotime($n_t['tgl'])); ?> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <?php
                                } 
                            ?>
                        </div>

                        <!--<div class="col-12">
                            <div class="fancy-title title-border">
                                <h3 id="pacifico"><i class="icon-camera3"></i> Galeri Kegiatan</h3>
                            </div>

                            <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery">

                                <?php 
									$gal = $db->query("SELECT * FROM d_giat WHERE x_giat!='mp4' ORDER BY RAND() LIMIT 5");
									while ($g=$gal->fetch_assoc()) :
								?>
                                <a class="grid-item" href="<?= base_url() ?>_uploads/f_giat/<?= $g['n_d_giat']; ?>"
                                    data-lightbox="gallery-item">
                                    <div class="grid-inner">
                                        <img src="<?= base_url() ?>_uploads/f_giat/<?= $g['n_d_giat']; ?>"
                                            alt="<?= $g['n_d_giat']; ?>">
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content dark">
                                                <i class="icon-camera h4 mb-0" data-hover-animate="fadeIn"></i>
                                            </div>
                                            <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                        </div>
                                    </div>
                                </a>
                                <?php endwhile; ?>
                            </div>
                        </div> -->

                        <div class="col-12">
                            <div class="fancy-title title-border">
                                <h3 id="pacifico"><i class="icon-newspaper3"></i> Pengaduan Masyarakat</h3>
                            </div>
                            <div id="oc-testimonials"
                                class="owl-carousel center testimonials-carousel testimonial-full carousel-widget mt-5"
                                data-margin="0" data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1"
                                data-items-xl="1" data-center="true" data-loop="true" data-autoplay="5000"
                                data-speed="500">
                                <?php 
									$peng = $db->query("SELECT * FROM pengaduan WHERE status='S' AND sifat='TR' ORDER BY RAND() LIMIT 5");
									while($p=$peng->fetch_assoc()) :
                                        $rate = $db->query("SELECT * FROM rate_pengaduan WHERE id_peng='$p[id_peng]'")->fetch_assoc();
									if ($rate['rate_peng']=='5') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='4.5') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='4') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='3.5') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='3') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='2.5') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='2') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='1.5') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='1') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='0.5') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    } elseif ($rate['rate_peng']=='0') {
                                        $stars = '<ul class="list-unstyled ms-0 mt-4 mb-2"><li class="color"><i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li></ul>';
                                    }
                                ?>
                                <!-- Item 1 -->
                                <div class="oc-item">
                                    <div class="testimonial p-4 border-0 shadow-none">
                                        <div class="testi-image">
                                            <a href="#"><img src="<?= base_url(); ?>_uploads/f_usr/default.png"
                                                    alt="Logo"></a>
                                        </div>
                                        <?= $stars; ?>
                                        <div class="testi-content" id="merienda">
                                            <a href="<?= base_url(); ?>p/pengaduan/<?= $p['slug']; ?>">
                                                <p><?= $p['j_peng']; ?></p>
                                            </a>
                                            <div class="testi-meta">
                                                <?= r_nama($p['nama_p']); ?>
                                                <span><?= r_email($p['email_p']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="line d-block d-lg-none"></div>
                    <div class="sidebar-widgets-wrap clearfix">
                        <div class="widget clearfix">
                            <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png"
                                alt="Image">
                        </div>
                        <div class="widget clearfix">
                            <div class="tabs mb-0 clearfix" id="sidebar-tabs">
                                <ul class="tab-nav clearfix" id="pacifico">
                                    <li><a href="#tabs-1">Popular Today</a></li>
                                    <li><a href="#tabs-2">Recent</a></li>
                                </ul>
                                <div class="tab-container">
                                    <div class="tab-content clearfix" id="tabs-1">
                                        <div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
                                            <?php
                                                $baru = $db->query("SELECT * FROM blog a, views_blog b WHERE a.id_blog=b.id_blog AND a.publish='Y' AND b.time='$date' GROUP BY a.slug ORDER BY b.jumlah DESC LIMIT 5");
                                                while ($b=$baru->fetch_assoc()) :
                                                    $cek = $db->query("SELECT * FROM views_blog WHERE id_blog='$b[id_blog]' AND time='$date'")->fetch_assoc();
                                                    $jml = $cek['jumlah'];
                                            ?>
                                            <div class="entry col-12">
                                                <div class="grid-inner row g-0">
                                                    <div class="col-auto">
                                                        <div class="entry-image">
                                                            <a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><img
                                                                    src="<?= base_url() ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>"
                                                                    alt="<?= $b['sampul']; ?>"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-3">
                                                        <div class="entry-title">
                                                            <h4><a
                                                                    href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><?= $b['j_blog']; ?></a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <ul>
                                                                <li><i class="icon-eye"></i> <?= $jml; ?> Views Today
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div class="tab-content clearfix" id="tabs-2">
                                        <div class="posts-sm row col-mb-30" id="recent-post-list-sidebar">
                                            <?php
                                                $baru = $db->query("SELECT * FROM blog WHERE publish='Y' ORDER BY created_at DESC LIMIT 5");
                                                while ($b=$baru->fetch_assoc()) :
                                            ?>
                                            <div class="entry col-12">
                                                <div class="grid-inner row g-0">
                                                    <div class="col-auto">
                                                        <div class="entry-image">
                                                            <a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><img
                                                                    src="<?= base_url() ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>"
                                                                    alt="Image"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-3">
                                                        <div class="entry-title">
                                                            <h4><a
                                                                    href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><?= $b['j_blog']; ?></a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <ul>
                                                                <li><i class="icon-calendar2"></i>
                                                                    <?= tgl_indo_singkat(date('y-m-d', strtotime($b['created_at']))) .' | '.date('H:i:s', strtotime($b['created_at'])).' WIB' ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget_links clearfix">
                            <h4 id="pacifico">Tags</h4>
                            <div class="tagcloud clearfix bottommargin col-sm-12">
                                <?php
                                    $tags = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
                                    while ($t=$tags->fetch_assoc()) :
                                        $tgsnum = $db->query("SELECT * FROM tags_blog WHERE id_tags='$t[id_tags]'");
                                        $tn= $tgsnum->num_rows;
                                ?>
                                <a href="<?= base_url()?>p/tags/<?=$t['url']?>"><i class="icon-tags1"></i>
                                    <?= $t['nm_tags']; ?> (<?= $tn; ?>)</a>
                                <?php endwhile; ?>
                            </div>
                        </div>

                        <div id="twitter" class="widget">
                            <h4 class="highlight-me" id="pacifico">Twitter Feed</h4>
                            <?php 
                                $tw = $db->query("SELECT * FROM w_twitter WHERE id='1'")->fetch_array();
                                echo $tw['embed'];
                            ?>
                        </div>

                        <div id="instagram" class="widget">
                            <h4 class="highlight-me" id="pacifico">Instagram Feed</h4>
                            <?php 
                                $ig = $db->query("SELECT * FROM w_instagram WHERE id='1'")->fetch_array();
                                echo $ig['embed'];
                            ?>
                        </div>
                        <div id="youtube" class="widget">
                            <h4 class="highlight-me" id="pacifico">Youtube Feed</h4>
                            <?php 
                                $yt = $db->query("SELECT * FROM w_youtube")->fetch_assoc();
                                echo $yt['embed'];
                            ?>
                        </div>

                        <!-- <div class="widget clearfix">
                            <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png"
                                alt="Image">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container clearfix">
        <div class="fancy-title title-border">
            <h3 id="pacifico"><i class="icon-newspaper3"></i> Berita Lainnya</h3>
        </div>
        <div class="row posts-md col-mb-30">
            <?php 
				$onews = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.publish='Y' GROUP BY a.id_blog ORDER BY RAND() LIMIT 6");
                while ($o_n=$onews->fetch_assoc()) :
			?>
            <div class="entry col-sm-6 col-xl-4">
                <div class="flip-card">
                    <div class="flip-card-front dark"
                        style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $o_n['id_blog']; ?>/<?= $o_n['sampul']; ?>')">
                        <div class="flip-card-inner">
                            <div class="card bg-transparent border-0">
                                <div class="card-body">
                                    <h3 class="card-title mb-0"><?= $o_n['j_blog']; ?></h3>
                                    <span class="fst-italic">-
                                        <?= tgl_indo_singkat(date('Y-m-d', strtotime($o_n['tgl']))) .' | '.date('H:i:s', strtotime($o_n['tgl'])); ?>
                                        WIB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back dark"
                        style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $o_n['id_blog']; ?>/<?= $o_n['sampul']; ?>')">
                        <div class="flip-card-inner">
                            <p class="mb-2 text-white"><?= judul($o_n['isi'],'180'); ?></p>
                            <a href="<?= base_url(); ?>p/berita/<?= $o_n['slug']; ?>" type="button"
                                class="btn btn-outline-light mt-2" style="float:right;">Selengkapnya <i
                                    class="icon-line-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <!-- <div class="clear"></div> -->
        <br>
        <center><a href="<?= base_url(); ?>p/berita"
                class="button button-rounded button-reveal button-large button-border text-end"><i
                    class="icon-arrow-circle-right"></i><span>Tampilkan Seluruh Berita</span></a></center>
    </div>
    <div class="container clearfix">
        <div class="fancy-title title-border text-center">
            <h3 id="pacifico">Partner</h3>
        </div>
        <div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30"
            data-nav="true" data-pagi="false" data-autoplay="5000" data-items-xs="3" data-items-sm="3" data-items-md="5"
            data-items-lg="6" data-items-xl="7">

            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/1.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/2.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/3.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/4.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/5.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/6.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/7.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/8.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/9.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/10.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/11.png"
                        alt="Brands"></a>
            </div>
            <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/12.png"
                        alt="Brands"></a>
            </div>
        </div>
    </div>
</section>