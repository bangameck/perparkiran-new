<?php 
include '_func/identity.php';
$id=$_GET['id'];
$d = $db->query("SELECT * FROM blog WHERE slug='$id'")->fetch_assoc();
$u = $db->query("SELECT * FROM users WHERE id='$d[adm_blog]'")->fetch_assoc();
if (empty($u['f_usr'])) {
    $f_usr = 'default.png';
} else {
    $f_usr = $u['f_usr'];
}
if (empty($d)) {
    sweetAlert('','error','Data tidak ditemukan!','Maaf, alamat url dengan key '.base_url().'p/berita/'.$id.' tidak ditemukan.');
} else {
$ip     = ip_user();
$os     = os_user();
$br     = browser_user();
$date   = date('Y-m-d');
$cek    = $db->query("SELECT * FROM views_blog WHERE id_blog='$d[id_blog]'");
$jumlah = $cek->num_rows;
if ($jumlah=='0') {
    $db->query("INSERT INTO views_blog VALUES ('$d[id_blog]','$date','1')");
} else {
    $db->query("UPDATE views_blog SET jumlah=jumlah+1 WHERE id_blog='$d[id_blog]' AND time='$date'");
}
$db->query("INSERT INTO session_view_blog VALUES ('$d[id_blog]','$ip','$os','$br',NOW())");
    ?>
<title><?= $d['j_blog']; ?> | <?= $title; ?></title>
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
											<li><i class="icon-calendar3"></i> <?= tgl_indo(date('Y-m-d', strtotime($d['created_at']))); ?></li>
											<li><a href="#"><i class="icon-user"></i> <?= $u['nama']; ?></a></li>
											<li><i class="icon-folder-open"></i> 
                                            <?php
                                            $tags = $db->query("SELECT * FROM tags_blog a, tags b WHERE a.id_tags=b.id_tags AND a.id_blog='$d[id_blog]'");
                                            while ($t=$tags->fetch_assoc()) {
                                                $tj = $tags->num_rows;
                                                if ($tj>1) {
                                                    echo '<a href="'.base_url().'p/tags/'.$t['url'].'">'.$t['nm_tags'].'</a>, ';
                                                } else {
                                                    echo '<a href="'.base_url().'p/tags/'.$t['url'].'">'.$t['nm_tags'].'</a>';
                                                }
                                            } ?>
                                            
											<li><a href="#"><i class="icon-eye"></i> 43</a></li>
											<li><a href="#"><i class="icon-camera-retro"></i></a></li>
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
									<div class="entry-content mt-0">
                                        <p style="text-align: justify;">
                                             <?= $d['isi']; ?>
                                        </p>
										<!-- Post Single - Content End -->

                                        <div class="fancy-title title-border">
                                            <h5><i class="icon-camera3"></i> Galeri Berita ini</h5>
                                        </div>

                                        <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery">

                                            <?php 
                                                        $gal = $db->query("SELECT * FROM d_blog WHERE id_blog='$d[id_blog]' AND x_blog!='mp4' ORDER BY RAND()");
                                                        while ($g=$gal->fetch_assoc()) :
                                                        ?>
                                            <a class="grid-item" href="<?= base_url() ?>_uploads/blog/gallery/<?= $d['id_blog']; ?>/<?= $g['n_d_blog']; ?>"
                                                data-lightbox="gallery-item">
                                                <div class="grid-inner">
                                                    <img src="<?= base_url() ?>_uploads/blog/gallery/<?= $d['id_blog']; ?>/<?= $g['n_d_blog']; ?>"
                                                        alt="<?= $g['n_d_blog']; ?>">
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
                                            while ($t=$tags->fetch_assoc()) { 
                                                echo '<a href="'.base_url().'p/tags/'.$t['url'].'"><i class="icon-tags1"></i> '.$t['nm_tags'].'</a>';
                                            }
                                            ?>
										</div><!-- .tagcloud end -->

										<div class="clear"></div>

										<!-- Post Single - Share
										============================================= -->
										<div class="si-share border-0 d-flex justify-content-between align-items-center">
											<span>Share this Post:</span>
											<div>
												<a href="#" class="social-icon si-borderless si-facebook">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a href="#" class="social-icon si-borderless si-twitter">
													<i class="icon-twitter"></i>
													<i class="icon-twitter"></i>
												</a>
												<a href="#" class="social-icon si-borderless si-pinterest">
													<i class="icon-pinterest"></i>
													<i class="icon-pinterest"></i>
												</a>
												<a href="#" class="social-icon si-borderless si-gplus">
													<i class="icon-gplus"></i>
													<i class="icon-gplus"></i>
												</a>
												<a href="#" class="social-icon si-borderless si-rss">
													<i class="icon-rss"></i>
													<i class="icon-rss"></i>
												</a>
												<a href="#" class="social-icon si-borderless si-email3">
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
                                    $p = $db->query("SELECT * FROM blog WHERE slug !='$id' ORDER BY RAND()")->fetch_assoc();
                                    ?>
									<div class="col-12 col-md-auto text-center">
										<a href="<?= base_url(); ?>p/berita/<?= $p['slug']; ?>">&lArr; <?= judul($p['j_blog'],40); ?></a>
									</div>

									<?php 
                                    $n = $db->query("SELECT * FROM blog WHERE slug !='$id' OR slug != '$p[slug]' ORDER BY RAND()")->fetch_assoc();
                                    ?>
									<div class="col-12 col-md-auto text-center">
										<a href="<?= base_url(); ?>p/berita/<?= $n['slug']; ?>"> <?= judul($n['j_blog'],40); ?> &rArr;</a>
									</div>
								</div><!-- .post-navigation end -->

								<div class="line"></div>

								<!-- Post Author Info
								============================================= -->
								<div class="card">
									<div class="card-header"><strong>Posted by <a href="<?= base_url(); ?>p/post-by/<?= $u['username']; ?>"><?= $u['nama']; ?></a></strong></div>
									<div class="card-body">
										<div class="author-image">
											<img src="<?= base_url(); ?>_uploads/f_usr/<?= $f_usr; ?>" alt="<?= $u['nama']; ?>" class="rounded-circle">
										</div>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eveniet, eligendi et nobis neque minus mollitia sit repudiandae ad repellendus recusandae blanditiis praesentium vitae ab sint earum voluptate velit beatae alias fugit accusantium laboriosam nisi reiciendis deleniti tenetur molestiae maxime id quaerat consequatur fugiat aliquam laborum nam aliquid. Consectetur, perferendis?
									</div>
								</div><!-- Post Single - Author End -->

								<div class="line"></div>

								<h4>Related Posts:</h4>

								<div class="related-posts row posts-md col-mb-30">

									<div class="entry col-12 col-md-6">
										<div class="grid-inner row align-items-center gutter-20">
											<div class="col-4">
												<div class="entry-image">
													<a href="#"><img src="images/blog/small/10.jpg" alt="Blog Single"></a>
												</div>
											</div>
											<div class="col-8">
												<div class="entry-title title-xs">
													<h3><a href="#">This is an Image Post</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 10th July 2021</li>
														<li><a href="#"><i class="icon-comments"></i> 12</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>

								</div>

								<!-- Comments
								============================================= -->
								<div id="comments" class="clearfix">

									<h3 id="comments-title"><span>3</span> Comments</h3>

									<!-- Comments List
									============================================= -->
									<ol class="commentlist clearfix">

										<li class="comment even thread-even depth-1" id="li-comment-1">

											<div id="comment-1" class="comment-wrap clearfix">

												<div class="comment-meta">

													<div class="comment-author vcard">

														<span class="comment-avatar clearfix">
														<img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

													</div>

												</div>

												<div class="comment-content clearfix">

													<div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2012 at 10:46 am</a></span></div>

													<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

													<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

												</div>

												<div class="clear"></div>

											</div>


											<ul class='children'>

												<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

													<div id="comment-3" class="comment-wrap clearfix">

														<div class="comment-meta">

															<div class="comment-author vcard">

																<span class="comment-avatar clearfix">
																<img alt='Image' src='https://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=40&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D40&amp;r=G' class='avatar avatar-40 photo' height='40' width='40' /></span>

															</div>

														</div>

														<div class="comment-content clearfix">

															<div class="comment-author"><a href='#' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

															<p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

															<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

														</div>

														<div class="clear"></div>

													</div>

												</li>

											</ul>

										</li>

										<li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1" id="li-comment-2">

											<div id="comment-2" class="comment-wrap clearfix">

												<div class="comment-meta">

													<div class="comment-author vcard">

														<span class="comment-avatar clearfix">
														<img alt='Image' src='https://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60' /></span>

													</div>

												</div>

												<div class="comment-content clearfix">

													<div class="comment-author"><a href='https://themeforest.net/user/semicolonweb' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

													<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

													<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

												</div>

												<div class="clear"></div>

											</div>

										</li>

									</ol><!-- .commentlist end -->

									<div class="clear"></div>

									<!-- Comment Form
									============================================= -->
									<div id="respond">

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

									</div><!-- #respond end -->

								</div><!-- #comments end -->

							</div>

						</div><!-- .postcontent end -->

						<!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-3">
                        <div class="line d-block d-lg-none"></div>

<div class="sidebar-widgets-wrap clearfix">

    <!-- <div class="widget clearfix">
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
    </div> -->

    <div class="widget clearfix">
        <img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
    </div>

    <div class="widget widget_links clearfix">

        <h4>Tags</h4>

        <div class="row col-mb-30">
            <div class="col-sm-12">
                <ul>
                    <?php
                                $tags = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
    while ($t=$tags->fetch_assoc()) :
                                    $tgsnum = $db->query("SELECT * FROM tags_blog WHERE id_tags='$t[id_tags]'");
    $tn= $tgsnum->num_rows; ?>
                    <li><a href="<?= base_url(); ?>p/tags/<?= $t['url']; ?>"><?= $t['nm_tags'].' ('.$tn.')'; ?></a></li>
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
    while ($b=$baru->fetch_assoc()) :
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
                                        <h4><a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><?= $b['j_blog']; ?></a></h4>
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
                                        <h4><a href="<?= base_url(); ?>p/berita/<?= $b['slug']; ?>"><?= $b['j_blog']; ?></a></h4>
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
						</div><!-- .sidebar end -->
					</div>

				</div>
			</div>
            <?php
} ?>