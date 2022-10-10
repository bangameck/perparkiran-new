<?php
include '_func/identity.php';
$a = $_GET['a'];
switch ($a) {
    default:
        $pg = $_GET['page'];
        if (empty($pg)) {
            $pgt = 'Halaman Pertama';
        } elseif ($pg == '1') {
            $pgt = 'Halaman Pertama';
        } else {
            $pgt = 'Halaman Ke ' . penyebut($pg);
        }
?>
        <title>Daftar isi Berita | <?= $title; ?></title>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <h1 class="titular-title fw-normal center font-secondary fst-normal">Daftar isi Berita</h1>
                    <p class="titular-sub-title text-primary fw-bold center mb-5"><?= $pgt; ?></p>
                    <div class="row gutter-40 col-mb-80">
                        <!-- Post Content
						============================================= -->
                        <div class="postcontent col-lg-12">
                            <div class="row posts-md col-mb-30">
                                <?php
                                $batas = 9;
                                $halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                $data1 = $db->query("SELECT * FROM blog WHERE publish='Y'");
                                $jumlah_data = $data1->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);

                                $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' ORDER BY a.created_at DESC LIMIT $halaman_awal, $batas");
                                $nomor = $halaman_awal + 1;
                                // $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' ORDER BY tgl ASC")->fetch_assoc();
                                while ($d = $data->fetch_assoc()) :
                                ?>
                                    <div class="entry col-sm-6 col-xl-4">
                                        <div class="grid-inner">
                                            <div class="entry-image">
                                                <a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><img src="<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>" alt="<?= $d['sampul']; ?>"></a>
                                            </div>
                                            <div class="entry-title title-xs nott">
                                                <h3><a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><?= $d['j_blog']; ?></a></h3>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i> <?= time_ago(date('Y-m-d H:i:s', strtotime($d['tgl']))) ?></li>
                                                    <li><a href="blog-single.html#comments"><i class="icon-user"></i> <?= $d['nama']; ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="entry-content">
                                                <p><?= judul($d['isi'], 150); ?> <a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><span class="badge alert-primary">Selengkapnya <i class="icon-line-arrow-right"></i></span></a></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                                <nav>
                                    <ul class="pagination justify-content-center" <?= $hid; ?><?= $hden; ?>>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='" . base_url() . "p/berita/page/$previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="<?= base_url(); ?>p/berita/page/<?php echo $x ?>"><?php echo $x; ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='" . base_url() . "p/berita/page/$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php break; ?>
        <?php
    case 'details-berita':
        $id = $_GET['id'];
        $d = $db->query("SELECT * FROM blog WHERE slug='$id'")->fetch_assoc();
        $u = $db->query("SELECT * FROM users WHERE id='$d[adm_blog]'")->fetch_assoc();
        if (empty($u['f_usr'])) {
            $f_usr = 'default.png';
        } else {
            $f_usr = $u['f_usr'];
        }
        if (empty($d)) {
            sweetAlert('', 'error', 'Data tidak ditemukan!', 'Maaf, alamat url dengan key ' . base_url() . 'p/berita/' . $id . ' tidak
ditemukan.');
        } else {
            $ip = ip_user();
            $os = os_user();
            $br = browser_user();
            $date = date('Y-m-d');
            $cek = $db->query("SELECT * FROM views_blog WHERE id_blog='$d[id_blog]' AND time='$date'");
            $jumlah = $cek->num_rows;
            if ($jumlah == '0') {
                $db->query("INSERT INTO views_blog VALUES ('$d[id_blog]','$date','1')");
            } else {
                $db->query("UPDATE views_blog SET jumlah=jumlah+1 WHERE id_blog='$d[id_blog]' AND time='$date'");
            }
            $db->query("INSERT INTO session_view_blog VALUES ('$d[id_blog]','$ip','$os','$br',NOW())");

            $views = $db->query("SELECT * FROM views_blog WHERE id_blog='$d[id_blog]'");
            while ($vb = $views->fetch_assoc()) {
                $i++;
                $vba[$i] = $vb['jumlah'];
            }
            $tvb = array_sum($vba); ?>
            <title><?= $d['j_blog']; ?> | <?= $title; ?></title>
            <section id="content">
                <div class="content-wrap">
                    <div class="container clearfix">
                        <div class="row gutter-40 col-mb-80">
                            <!-- Post Content
						============================================= -->
                            <div class="postcontent col-lg-9">
                                <div class="single-post mb-0">
                                    <!-- Single Post
								============================================= -->
                                    <div class="entry clearfix">
                                        <!-- Entry Title
									============================================= -->
                                        <div class="entry-title">
                                            <h2><?= $d['j_blog']; ?></h2>
                                        </div><!-- .entry-title end -->
                                        <!-- Entry Meta
									============================================= -->
                                        <div class="entry-meta">
                                            <ul>
                                                <li><i class="icon-calendar3"></i>
                                                    <?= tgl_indo(date('Y-m-d', strtotime($d['created_at']))); ?></li>
                                                <li><a href="#"><i class="icon-user"></i> <?= $u['nama']; ?></a></li>
                                                <li><i class="icon-folder-open"></i>
                                                    <?php
                                                    $tags = $db->query("SELECT * FROM tags_blog a, tags b WHERE a.id_tags=b.id_tags AND a.id_blog='$d[id_blog]'");
                                                    while ($t = $tags->fetch_assoc()) {
                                                        $tj = $tags->num_rows;
                                                        if ($tj > 1) {
                                                            echo '<a href="' . base_url() . 'p/tags/' . $t['url'] . '">' . $t['nm_tags'] . '</a>, ';
                                                        } else {
                                                            echo '<a href="' . base_url() . 'p/tags/' . $t['url'] . '">' . $t['nm_tags'] . '</a>';
                                                        }
                                                    }
                                                    ?>
                                                <li><a href="#"><i class="icon-eye"></i> <?= $tvb; ?></a></li>
                                                <li><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="true">Tweet</a>
                                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
                                                    </script>
                                                </li>
                                            </ul>
                                        </div><!-- .entry-meta end -->

                                        <!-- Entry Image
									============================================= -->
                                        <div class="entry-image">
                                            <a href="#"><img src="<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>" alt="<?= $d['sampul']; ?>"></a>
                                            <small style="color: #b8b9b8;">Gambar : <?= $d['c_sampul']; ?></small>
                                        </div><!-- .entry-image end -->

                                        <!-- Entry Content
									============================================= -->
                                        <div class="entry-content mt-0" style="text-align: justify;">
                                            <p>
                                                <?= $d['isi']; ?>
                                            </p>
                                            <!-- Post Single - Content End -->

                                            <div class="fancy-title title-border">
                                                <h5><i class="icon-camera3"></i> Galeri Berita ini</h5>
                                            </div>

                                            <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery">

                                                <?php
                                                $gal = $db->query("SELECT * FROM d_blog WHERE id_blog='$d[id_blog]' AND x_blog!='mp4' ORDER BY RAND()");
                                                while ($g = $gal->fetch_assoc()) :
                                                ?>
                                                    <a class="grid-item" href="<?= base_url() ?>_uploads/blog/gallery/<?= $d['id_blog']; ?>/<?= $g['n_d_blog']; ?>" data-lightbox="gallery-item">
                                                        <div class="grid-inner">
                                                            <img src="<?= base_url() ?>_uploads/blog/gallery/<?= $d['id_blog']; ?>/<?= $g['n_d_blog']; ?>" alt="<?= $g['n_d_blog']; ?>">
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
                                            <br>
                                            <!-- Tag Cloud
										============================================= -->
                                            <div class="tagcloud clearfix bottommargin">
                                                <?php
                                                $tags = $db->query("SELECT * FROM tags_blog a, tags b WHERE a.id_tags=b.id_tags AND a.id_blog='$d[id_blog]'");
                                                while ($t = $tags->fetch_assoc()) {
                                                    echo '<a href="' . base_url() . 'p/tags/' . $t['url'] . '"><i class="icon-tags1"></i> ' . $t['nm_tags'] . '</a>';
                                                }
                                                ?>

                                            </div><!-- .tagcloud end -->
                                            <div class="clear"></div>
                                            <!-- Post Single - Share
										============================================= -->
                                            <div class="si-share border-0 d-flex justify-content-between align-items-center">
                                                <span>Share on:</span>
                                                <div>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url(); ?>p/berita/<?= $id; ?>&t=<?= $d['j_blog']; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook" class="social-icon si-borderless si-facebook">
                                                        <i class="icon-facebook"></i>
                                                        <i class="icon-facebook"></i>
                                                    </a>
                                                    <a href="https://twitter.com/share?url=<?= base_url(); ?>p/berita/<?= $id; ?>&amp;text=<?= $d['j_blog']; ?>&amp;hashtags=<?= strtolower(nospace($nm_upt)); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter" class="social-icon si-borderless si-twitter">
                                                        <i class="icon-twitter"></i>
                                                        <i class="icon-twitter"></i>
                                                    </a>
                                                    <a href="http://pinterest.com/pin/create/button/?url=<?= base_url(); ?>p/berita/<?= $id; ?>&media=<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pinterest" class="social-icon si-borderless si-pinterest">
                                                        <i class="icon-pinterest"></i>
                                                        <i class="icon-pinterest"></i>
                                                    </a>
                                                    <a href="whatsapp://send?text=<?= base_url(); ?>p/berita/<?= $id; ?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Whatsapp" class="social-icon si-borderless si-whatsapp">
                                                        <i class="icon-whatsapp"></i>
                                                        <i class="icon-whatsapp"></i>
                                                    </a>
                                                    <a href="http://www.reddit.com/submit?url=<?= base_url(); ?>p/berita/<?= $id; ?>" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Reddit" class="social-icon si-borderless si-reddit">
                                                        <i class="icon-reddit"></i>
                                                        <i class="icon-reddit"></i>
                                                    </a>
                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url(); ?>p/berita/<?= $id; ?>&t=<?= $d['j_blog']; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin" class="social-icon si-borderless si-linkedin">
                                                        <i class="icon-linkedin"></i>
                                                        <i class="icon-linkedin"></i>
                                                    </a>
                                                    <a href="mailto:?subject=<?= $d['j_blog']; ?>&body=<?= base_url(); ?>p/berita/<?= $id; ?>" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Mail" class="social-icon si-borderless si-email3">
                                                        <i class="icon-email3"></i>
                                                        <i class="icon-email3"></i>
                                                    </a>
                                                </div>
                                            </div><!-- Post Single - Share End -->
                                        </div>
                                    </div><!-- .entry end -->
                                    <!-- Post Navigation
								============================================= -->
                                    <div class="row justify-content-between col-mb-30 post-navigation">
                                        <?php
                                        $p = $db->query("SELECT * FROM blog WHERE slug !='$id' ORDER BY RAND()")->fetch_assoc(); ?>
                                        <div class="col-12 col-md-auto text-center">
                                            <a href="<?= base_url(); ?>p/berita/<?= $p['slug']; ?>">&lArr;
                                                <?= judul($p['j_blog'], 40); ?></a>
                                        </div>

                                        <?php
                                        $n = $db->query("SELECT * FROM blog WHERE slug !='$id' OR slug != '$p[slug]' ORDER BY RAND()")->fetch_assoc(); ?>
                                        <div class="col-12 col-md-auto text-center">
                                            <a href="<?= base_url(); ?>p/berita/<?= $n['slug']; ?>"> <?= judul($n['j_blog'], 40); ?>
                                                &rArr;</a>
                                        </div>
                                    </div><!-- .post-navigation end -->

                                    <div class="line"></div>
                                    <!-- Post Author Info
								============================================= -->
                                    <div class="card">
                                        <div class="card-header"><strong>Posted by <a href="<?= base_url(); ?>p/post-by/<?= $u['username']; ?>"><?= $u['nama']; ?></a></strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="author-image">
                                                <img src="<?= base_url(); ?>_uploads/f_usr/<?= $f_usr; ?>" alt="<?= $u['nama']; ?>" class="rounded-circle">
                                            </div>
                                            <?= $u['bio']; ?>
                                        </div>
                                    </div><!-- Post Single - Author End -->

                                    <div class="line"></div>
                                    <h4 id="pacifico">Related Posts:</h4>
                                    <div class="related-posts row posts-md col-mb-30">
                                        <?php
                                        $releated = $db->query("SELECT * FROM blog ORDER BY RAND() LIMIT 6");
                                        while ($r = $releated->fetch_assoc()) :
                                        ?>
                                            <div class="entry col-12 col-md-6">
                                                <div class="grid-inner row align-items-center gutter-20">
                                                    <div class="col-4">
                                                        <div class="entry-image">
                                                            <a href="<?= base_url(); ?>p/berita/<?= $r['slug']; ?>"><img src="<?= base_url(); ?>_uploads/blog/sampul/<?= $r['id_blog']; ?>/<?= $r['sampul']; ?>" alt="Blog Single"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="entry-title title-xs">
                                                            <h3><a href="<?= base_url(); ?>p/berita/<?= $r['slug']; ?>"><?= $r['j_blog']; ?></a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <ul>
                                                                <li><i class="icon-calendar3"></i>
                                                                    <?= tgl_indo_singkat(date('Y-m-d', strtotime($r['created_at']))) . ' | ' . date('H:i', strtotime($r['created_at'])) . ' WIB' ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>

                                    <!-- Comments
								============================================= -->
                                    <div id="comments" class="clearfix">
                                        <div class="fb-comments" data-href="<?= base_url(); ?>p/berita/<?= $id; ?>" data-width="100%" data-numposts="5"></div>
                                        <!-- <h3 id="comments-title"><span>3</span> Comments</h3> -->

                                        <!-- Comments List
									============================================= -->
                                        <!-- .commentlist end -->

                                        <!-- <div class="clear"></div> -->

                                        <!-- Comment Form
									============================================= -->
                                        <!-- <div id="respond">

										<h3>Leave a <span>Comment</span></h3>

										<form class="row" action="#" method="post" id="commentform">
											<div class="col-md-4 form-group">
												<label for="author">Name</label>
												<input type="text" name="author" id="author" value="" size="22" tabindex="1" class="sm-form-control" />
											</div>

											<div class="col-md-4 form-group">
												<label for="email">Email</label>
												<input type="text" name="email" id="email" value="" size="22" tabindex="2" class="sm-form-control" />
											</div>

											<div class="col-md-4 form-group">
												<label for="url">Website</label>
												<input type="text" name="url" id="url" value="" size="22" tabindex="3" class="sm-form-control" />
											</div>

											<div class="w-100"></div>

											<div class="col-12 form-group">
												<label for="comment">Comment</label>
												<textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
											</div>

											<div class="col-12 form-group">
												<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0">Submit Comment</button>
											</div>
										</form>

									</div>#respond end -->

                                    </div><!-- #comments end -->
                                </div>
                            </div><!-- .postcontent end -->

                            <!-- Sidebar
						============================================= -->
                            <div class="sidebar col-lg-3">
                                <div class="line d-block d-lg-none"></div>

                                <div class="sidebar-widgets-wrap clearfix">
                                    <div class="widget clearfix">
                                        <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
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
                                                        while ($b = $baru->fetch_assoc()) :
                                                            $cek = $db->query("SELECT * FROM views_blog WHERE id_blog='$b[id_blog]' AND time='$date'")->fetch_assoc();
                                                            $jml = $cek['jumlah']; ?>
                                                            <div class="entry col-12">
                                                                <div class="grid-inner row g-0">
                                                                    <div class="col-auto">
                                                                        <div class="entry-image">
                                                                            <a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><img src="<?= base_url() ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>" alt="<?= $b['sampul']; ?>"></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ps-3">
                                                                        <div class="entry-title">
                                                                            <h4><a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><?= $b['j_blog']; ?></a>
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
                                                        while ($b = $baru->fetch_assoc()) :
                                                        ?>
                                                            <div class="entry col-12">
                                                                <div class="grid-inner row g-0">
                                                                    <div class="col-auto">
                                                                        <div class="entry-image">
                                                                            <a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><img src="<?= base_url() ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>" alt="Image"></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col ps-3">
                                                                        <div class="entry-title">
                                                                            <h4><a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><?= $b['j_blog']; ?></a>
                                                                            </h4>
                                                                        </div>
                                                                        <div class="entry-meta">
                                                                            <ul>
                                                                                <li><i class="icon-calendar2"></i>
                                                                                    <?= time_ago(date('Y-m-d H:i:s', strtotime($b['created_at']))) ?>
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
                                            while ($t = $tags->fetch_assoc()) :
                                                $tgsnum = $db->query("SELECT * FROM tags_blog WHERE id_tags='$t[id_tags]'");
                                                $tn = $tgsnum->num_rows; ?>
                                                <a href="<?= base_url() ?>p/tags/<?= $t['url'] ?>"><i class="icon-tags1"></i>
                                                    <?= $t['nm_tags']; ?> (<?= $tn; ?>)</a>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div id="twitter" class="widget">
                                        <h4 class="highlight-me" id="pacifico">Twitter Feed</h4>
                                        <?php
                                        $tw = $db->query("SELECT * FROM w_twitter WHERE id='1'")->fetch_array();
                                        echo $tw['embed']; ?>
                                    </div>

                                    <div id="instagram" class="widget">
                                        <h4 class="highlight-me" id="pacifico">Instagram Feed</h4>
                                        <?php
                                        $ig = $db->query("SELECT * FROM w_instagram WHERE id='1'")->fetch_array();
                                        echo $ig['embed']; ?>
                                    </div>

                                    <div id="youtube" class="widget">
                                        <h4 class="highlight-me" id="pacifico">Youtube Feed</h4>

                                        <?php
                                        $yt = $db->query("SELECT * FROM w_youtube")->fetch_assoc();
                                        echo $yt['embed']; ?>
                                    </div>

                                    <div class="widget clearfix">
                                        <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
                                    </div>
                                </div>
                            </div><!-- .sidebar end -->
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
        break; ?>
        <?php
    case 'cari':
        $cari = $_POST['key'];
        $pg = $_GET['page'];
        if (empty($pg)) {
            $pgt = 'Halaman Pertama';
        } elseif ($pg == '1') {
            $pgt = 'Halaman Pertama';
        } else {
            $pgt = 'Halaman Ke ' . penyebut($pg);
        }
        $key = $db->real_escape_string(htmlentities(trim(filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING))));
        $data1 = $db->query("SELECT * FROM blog WHERE publish='Y' AND j_blog LIKE '%$cari%' OR isi LIKE '%$cari%'");

        if (strlen($key) < 3) {
            echo '
        <title>Karakter Kurang | ' . $title . '</title><section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
            <h2 class="titular-title fw-normal center font-secondary fst-normal">Maaf, Kata Kunci Berita Harus Lebih dari 4 Karakter</h2>
                        <a onclick="history.back()"><p class="titular-sub-title text-primary fw-bold center mb-5">Kembali Kehalaman Sebelumnya.</p></a>
                </div>
                </div>
                <section>';
        } else if (empty($data1->fetch_assoc())) {
            echo '
        <title>Data tidak ditemukan | ' . $title . '</title><section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
            <h2 class="titular-title fw-normal center font-secondary fst-normal">Maaf, Kata Kunci Berita <b>"' . $cari . '"</b> tidak ditemukan</h2>
                        <a onclick="history.back()"><p class="titular-sub-title text-primary fw-bold center mb-5">Kembali Kehalaman Sebelumnya.</p></a>
                </div>
                </div>
                <section>';
        } else {
            // $cek_cari = $db->query("SELECT * blog WHERE j_blog LIKE '%$cari%'")->fetch_assoc();
        ?>
            <title>Daftar isi Berita | <?= $title; ?></title>
            <section id="content">
                <div class="content-wrap">
                    <div class="container clearfix">
                        <h1 class="titular-title fw-normal center font-secondary fst-normal">Daftar Pencarian <b>"<?= $cari; ?>"</b></h1>
                        <p class="titular-sub-title text-primary fw-bold center mb-5"><?= $data1->num_rows; ?> Data ditemukan</p>
                        <div class="row gutter-40 col-mb-80">
                            <!-- Post Content
						============================================= -->
                            <div class="postcontent col-lg-12">
                                <div class="row posts-md col-mb-30">
                                    <?php

                                    $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' AND a.j_blog LIKE '%$cari%' OR a.isi LIKE '%$cari%' GROUP BY a.id_blog ORDER BY a.created_at DESC");

                                    $nomor = $halaman_awal + 1;
                                    // $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' ORDER BY tgl ASC")->fetch_assoc();
                                    while ($d = $data->fetch_assoc()) :
                                    ?>
                                        <div class="entry col-sm-6 col-xl-4">
                                            <div class="grid-inner">
                                                <div class="entry-image">
                                                    <a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><img src="<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>" alt="<?= $d['sampul']; ?>"></a>
                                                </div>
                                                <div class="entry-title title-xs nott">
                                                    <h3><a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><?= $d['j_blog']; ?></a></h3>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li><i class="icon-calendar3"></i> <?= tgl_indo_singkat(date('Y-m-d', strtotime($d['tgl']))) . ' | ' . date('H:i:s', strtotime($d['tgl']));  ?></li>
                                                        <li><a href="blog-single.html#comments"><i class="icon-user"></i> <?= $d['nama']; ?></a></li>
                                                    </ul>
                                                </div>
                                                <div class="entry-content">
                                                    <p><?= judul($d['isi'], 150); ?> <a href="<?= base_url(); ?>p/berita/<?= $d['slug']; ?>"><span class="badge alert-primary">Selengkapnya <i class="icon-line-arrow-right"></i></span></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php break; ?>
<?php
        }
} ?>