<title>SiParkir Kota Pekanbaru</title>
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
											$bnews = $db->query("SELECT * FROM blog WHERE bn='Y' ORDER BY created_at DESC LIMIT 5");
											while($bn=$bnews->fetch_assoc()):
											?>
                                <div class="slide"><a href="#"><strong><?= $bn['j_blog']; ?>..</strong></a></div>
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
												$hnews = $db->query("SELECT * FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' AND a.hn='Y' ORDER BY a.created_at DESC LIMIT 6");
												while($hn=$hnews->fetch_assoc()) :
												?>
                                    <div class="slide"
                                        data-thumb="<?= base_url() ?>_uploads/blog/sampul/<?= $hn['id_blog']; ?>/<?= $hn['sampul']; ?>">
                                        <a href="#">
                                            <img src="<?= base_url() ?>_uploads/blog/sampul/<?= $hn['id_blog']; ?>/<?= $hn['sampul']; ?>"
                                                alt="Image">
                                            <div class="bg-overlay">
                                                <div
                                                    class="bg-overlay-content text-overlay-mask dark align-items-end justify-content-start">
                                                    <div class="portfolio-desc py-0">
                                                        <h3><?= $hn['j_blog']; ?></h3>
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
                            <h3><i class="icon-tags1"></i> <?= $t_one['nm_tags']; ?></h3>
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
                                                            WIB</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-card-back dark"
                                            style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $news_one['id_blog']; ?>/<?= $news_one['sampul']; ?>"
                                            alt="<?= $news_one['sampul']; ?>')">
                                            <div class="flip-card-inner">
                                                <p class="mb-2 text-white"><?= judul($news_one['isi'], '250'); ?> </p>
                                                <a href="" type="button" class="btn btn-outline-light mt-2">Selengkapnya
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
                                        $n_one = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.id_blog!='$news_one[id_blog]' AND b.id_tags='$t_one[id_tags]' AND a.publish='Y' ORDER BY tgl DESC LIMIT 4");
                                        while ($n_o=$n_one->fetch_assoc()) :
											
                                        ?>
                            <div class="entry col-md-6">
                                <div class="grid-inner row g-0">
                                    <div class="col-auto">
                                        <div class="entry-image">
                                            <a href="#"><img
                                                    src="<?= base_url() ?>_uploads/blog/sampul/<?= $n_o['id_blog']; ?>/<?= $n_o['sampul']; ?>"
                                                    alt="<?= $n_o['sampul']; ?>"></a>
                                        </div>
                                    </div>
                                    <div class="col ps-3">
                                        <div class="entry-title">
                                            <h4><a href="#"><span class="h5" style><em><?= $n++; ?>.
                                                        </em></span><?= $n_o['j_blog']; ?></a></h4>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><i class="icon-calendar3"></i>
                                                    <?= tgl_indo_singkat(date('Y-m-d', strtotime($n_o['tgl']))); ?></li>
                                                <li><a href="#"><i class="icon-eye"></i> 32</a></li>
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
                        <img src="<?= base_url() ?>assets/web/images/magazine/ad.jpg" alt="Ad" class="aligncenter my-0">
                    </div>

                    <div class="col-12">

                        <div class="fancy-title title-border">
                            <?php 
										$t_two = $db->query("SELECT * FROM hal_utama a, tags b WHERE a.id_tags=b.id_tags AND id_hal='2'")->fetch_assoc();
										?>
                            <h3><i class="icon-tags1"></i> <?= $t_two['nm_tags']; ?></h3>
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
                                                            WIB</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flip-card-back dark"
                                            style="background-image: url('<?= base_url() ?>_uploads/blog/sampul/<?= $news_two['id_blog']; ?>/<?= $news_two['sampul']; ?>"
                                            alt="<?= $news_two['sampul']; ?>')">
                                            <div class="flip-card-inner">
                                                <p class="mb-2 text-white"><?= judul($news_two['isi'], '250'); ?> </p>
                                                <a href="" type="button" class="btn btn-outline-light mt-2">Selengkapnya
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
                                        $n_two = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.id_blog!='$news_two[id_blog]' AND b.id_tags='$t_two[id_tags]' AND a.publish='Y' ORDER BY tgl DESC LIMIT 4");
                                        while ($n_t=$n_two->fetch_assoc()) :
                                        ?>
                            <div class="entry col-md-6">
                                <div class="grid-inner row g-0">
                                    <div class="col-auto">
                                        <div class="entry-image">
                                            <a href="#"><img
                                                    src="<?= base_url() ?>_uploads/blog/sampul/<?= $n_t['id_blog']; ?>/<?= $n_t['sampul']; ?>"
                                                    alt="<?= $n_t['sampul']; ?>"></a>
                                        </div>
                                    </div>
                                    <div class="col ps-3">
                                        <div class="entry-title">
                                            <h4><a href="#"> <span class="h5" style><em><?= $n++; ?>. </em></span>
                                                    <?=$n_t['j_blog']; ?></a></h4>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><i class="icon-calendar3"></i>
                                                    <?= tgl_indo_singkat(date('Y-m-d', strtotime($n_t['tgl']))); ?></li>
                                                <li><a href="#"><i class="icon-eye"></i> 32</a></li>
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
                        <div class="fancy-title title-border">
                            <h3><i class="icon-camera3"></i> Galeri Kegiatan</h3>
                        </div>

                        <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery">

                            <?php 
										$gal = $db->query("SELECT * FROM d_giat WHERE x_giat!='mp4' ORDER BY RAND() LIMIT 20");
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
                    </div>

                    <div class="col-12">

                        <div class="fancy-title title-border">
                            <h3><i class="icon-newspaper3"></i> Pengaduan</h3>
                        </div>
                        <div class="fslider testimonial testimonial-full bottommargin" data-animation="fade" data-arrows="false">
						    <div class="flexslider">
                                <div class="slider-wrap">
                                    <?php 
												$peng = $db->query("SELECT * FROM pengaduan WHERE status='S' ORDER BY RAND() LIMIT 5");
												while($p=$peng->fetch_assoc()) :
                                                    $rate = $db->query("SELECT * FROM rate_pengaduan WHERE id_peng='$p[id_peng]'")->fetch_assoc();
												?>
                                    <div class="slide">
                                        <div class="testi-image">
                                            <a href="#"><img src="<?= base_url(); ?>_uploads/f_usr/default.png" alt="Users Picture"></a>
                                        </div>
                                        <div class="testi-content">
                                            <p><a href=""><?= $p['j_peng']; ?></a></p>
                                            <div class="testi-meta">
                                                <?= r_nama($p['nama_p']); ?>
                                                <span><?= r_email($p['email_p']); ?></span>
                                            </div>
                                        </div>
                                        <center><input id="input-17a" class="rating" data-size="xs" value="<?= $rate['rate_peng']; ?>" readonly></center>
								    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="line d-block d-lg-none"></div>

                <div class="sidebar-widgets-wrap clearfix">

                    <div class="widget clearfix">
                        <div class="row gutter-20 col-mb-30">
                            <div class="col-4">
                                <a href="#" class="social-icon si-dark si-colored si-facebook mb-0"
                                    style="margin: right 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <div class="counter counter-inherit d-inline-block text-smaller"><span
                                        class="d-block fw-bold" data-from="1000" data-to="58742"
                                        data-refresh-interval="100" data-speed="3000"
                                        data-comma="true"></span><small>Likes</small></div>
                            </div>

                            <div class="col-4">
                                <a href="#" class="social-icon si-dark si-colored si-twitter mb-0"
                                    style="margin-right: 10px;">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <div class="counter counter-inherit d-inline-block text-smaller"><span
                                        class="d-block fw-bold" data-from="500" data-to="9654"
                                        data-refresh-interval="50" data-speed="2500"
                                        data-comma="true"></span><small>Followers</small></div>
                            </div>

                            <div class="col-4">
                                <a href="#" class="social-icon si-dark si-colored si-rss mb-0"
                                    style="margin-right: 10px;">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <div class="counter counter-inherit d-inline-block text-smaller"><span
                                        class="d-block fw-bold" data-from="200" data-to="15475"
                                        data-refresh-interval="150" data-speed="3500"
                                        data-comma="true"></span><small>Readers</small></div>
                            </div>
                        </div>
                    </div>

                    <div class="widget clearfix">
                        <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
                    </div>

                    <div class="widget widget_links clearfix">

                        <h4>Tags</h4>

                        <div class="row col-mb-30">
                            <div class="col-sm-6">
                                <ul>
                                    <?php 
												$tags = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
												while($t=$tags->fetch_assoc()) :
													$tgsnum = $db->query("SELECT * FROM tags_blog WHERE id_tags='$t[id_tags]'");
													$tn= $tgsnum->num_rows;
												?>
                                    <li><a href="#"><?= $t['nm_tags'].' ('.$tn.')'; ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="widget clearfix">

                        <h4>Flickr Photostream</h4>
                        <div id="flickr-widget" class="flickr-feed masonry-thumbs grid-container grid-5"
                            data-id="613394@N22" data-count="15" data-type="group" data-lightbox="gallery"></div>

                    </div>

                    <div class="widget clearfix">

                        <div class="tabs mb-0 clearfix" id="sidebar-tabs">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1">Popular</a></li>
                                <li><a href="#tabs-2">Recent</a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
                                        <?php 
													$baru = $db->query("SELECT * FROM blog WHERE publish='Y' ORDER BY created_at DESC LIMIT 5");
													while($b=$baru->fetch_assoc()) :
													?>
                                        <div class="entry col-12">
                                            <div class="grid-inner row g-0">
                                                <div class="col-auto">
                                                    <div class="entry-image">
                                                        <a href="#"><img
                                                                src="<?= base_url() ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>"
                                                                alt="<?= $b['sampul']; ?>"></a>
                                                    </div>
                                                </div>
                                                <div class="col ps-3">
                                                    <div class="entry-title">
                                                        <h4><a href="#"><?= $b['j_blog']; ?></a></h4>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li><i class="icon-eye"></i> 35 Views</li>
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
													while($b=$baru->fetch_assoc()) :
													?>
                                        <div class="entry col-12">
                                            <div class="grid-inner row g-0">
                                                <div class="col-auto">
                                                    <div class="entry-image">
                                                        <a href="#"><img
                                                                src="<?= base_url() ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>"
                                                                alt="Image"></a>
                                                    </div>
                                                </div>
                                                <div class="col ps-3">
                                                    <div class="entry-title">
                                                        <h4><a href="#"><?= $b['j_blog']; ?></a></h4>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li><i class="icon-eye"></i> 35 Views</li>
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

                    <div class="widget clearfix">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/BNPSCcx637E"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <div class="widget clearfix">
                        <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
                    </div>
                    <div id="instagram" class="widget">

                        <h4 class="highlight-me">Instagram Photos</h4>
                        <div id="instagram-photos"
                            class="instagram-photos masonry-thumbs grid-container grid-4 customjs"
                            data-user="upt.perparkiranpku"></div>

                    </div>

                    <div class="widget clearfix">
                        <iframe
                            src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=350&amp;height=240&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583"
                            style="border:none; overflow:hidden; width:350px; height:240px; max-width: 100% !important;"></iframe>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<div class="container clearfix">
    <div class="fancy-title title-border">
        <h3><i class="icon-newspaper3"></i> Berita Lainnya</h3>
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
                        <button type="button" class="btn btn-outline-light mt-2" style="float:right;">Selengkapnya <i
                                class="icon-line-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <!-- <div class="clear"></div> -->
    <br>
    <center><a href="#" class="button button-rounded button-reveal button-large button-border text-end"><i
                class="icon-arrow-circle-right"></i><span>Tampilkan Seluruh Berita</span></a></center>

</div>
<div class="container clearfix">
    <div class="fancy-title title-border text-center">
        <h3>Partner</h3>
    </div>
    <div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30"
        data-nav="true" data-pagi="false" data-autoplay="5000" data-items-xs="3" data-items-sm="3" data-items-md="5"
        data-items-lg="6" data-items-xl="7">

        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/1.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/2.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/3.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/4.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/5.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/6.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/7.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/8.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/9.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/10.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/11.png" alt="Brands"></a>
        </div>
        <div class="oc-item"><a href="#"><img src="<?= base_url(); ?>assets/web/images/clients/12.png" alt="Brands"></a>
        </div>

    </div>
</div>

<div class="section lazy mt-5 mb-0 p-0 min-vh-75" data-bg="https://source.unsplash.com/sLoiQitblLs/1920x1080"
    style="background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="shape-divider" data-shape="cliff" data-height="150" data-flip-vertical="true"></div>
</div>