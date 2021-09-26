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
								<div class="fslider" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false" style="min-height: 0;">
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
									<div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-arrows="true" data-thumbs="true">
										<div class="flexslider">
											<div class="slider-wrap">
												<?php 
												$hnews = $db->query("SELECT * FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' AND a.hn='Y' ORDER BY a.created_at LIMIT 6");
												while($hn=$hnews->fetch_assoc()) :
												?>
												<div class="slide" data-thumb="<?= base_url() ?>_uploads/blog/sampul/<?= $hn['id_blog']; ?>/<?= $hn['sampul']; ?>">
													<a href="#">
														<img src="<?= base_url() ?>_uploads/blog/sampul/<?= $hn['id_blog']; ?>/<?= $hn['sampul']; ?>" alt="Image">
														<div class="bg-overlay">
															<div class="bg-overlay-content text-overlay-mask dark align-items-end justify-content-start">
																<div class="portfolio-desc py-0">
																	<h3><?= $hn['j_blog']; ?></h3>
																	<span>Illustrations</span>
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
										<h3><?= $t_one['nm_tags']; ?></h3>
									</div>
									<?php 
									$news_one = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND b.id_tags='$t_one[id_tags]' AND a.publish='Y'")->fetch_assoc();
                                    if (empty($news_one['id_tags'])) {
										echo '<span style="text-align: center;">-- Belum ada berita dengan kategori ' .$t_one['nm_tags'].' --</span>';
									} else {
                                        ?>
									<div class="posts-md">
										<div class="entry row mb-5">
											<div class="col-md-6">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>_uploads/blog/sampul/<?= $news_one['id_blog']; ?>/<?= $news_one['sampul']; ?>" alt="<?= $news_one['sampul']; ?>"></a>
												</div>
											</div>
											<div class="col-md-6 mt-3 mt-md-0">
												<div class="entry-title title-sm nott">
													<h3><a href="blog-single.html"><?= $news_one['j_blog']; ?></a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> <?= tgl_indo_singkat(date('Y-m-d', strtotime($news_one['tgl']))); ?></li>
														<li><a href="blog-single.html#comments"><i class="icon-eye"></i> 21</a></li>
														<li><a href="#"><i class="icon-camera-retro"></i></a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p class="mb-0"><?= judul($news_one['isi'], '180'); ?> <a href="">Selengkapnya >></a></p>
												</div>
											</div>
										</div>
									</div>
									<div class="posts-sm row col-mb-30">
										<?php
                                        $n_one = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.id_blog!='$news_one[id_blog]' AND b.id_tags='$t_one[id_tags]' AND a.publish='Y' ORDER BY tgl DESC LIMIT 4");
                                        while ($n_o=$n_one->fetch_assoc()) :
                                        ?>
										<div class="entry col-md-6">
											<div class="grid-inner row g-0">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="<?= base_url() ?>_uploads/blog/sampul/<?= $n_o['id_blog']; ?>/<?= $n_o['sampul']; ?>" alt="<?= $n_o['sampul']; ?>"></a>
													</div>
												</div>
												<div class="col ps-3">
													<div class="entry-title">
														<h4><a href="#"><?= $n_o['j_blog']; ?></a></h4>
													</div>
													<div class="entry-meta">
														<ul>
															<li><i class="icon-calendar3"></i> <?= tgl_indo_singkat(date('Y-m-d', strtotime($n_o['tgl']))); ?></li>
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
										<h3><?= $t_two['nm_tags']; ?></h3>
									</div>
									<?php 
									$news_two = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND b.id_tags='$t_two[id_tags]' AND a.publish='Y'")->fetch_assoc();
                                    if (empty($news_two['id_tags'])) {
										echo '<span style="text-align: center;">-- Belum ada berita dengan kategori ' .$t_two['nm_tags'].' --</span>';
									} else {
                                        ?>
									<div class="posts-md">
										<div class="entry row mb-5">
											<div class="col-md-6">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>_uploads/blog/sampul/<?= $news_two['id_blog']; ?>/<?= $news_two['sampul']; ?>" alt="<?= $news_two['sampul']; ?>"></a>
												</div>
											</div>
											<div class="col-md-6 mt-3 mt-md-0">
												<div class="entry-title title-sm nott">
													<h3><a href="blog-single.html"><?= $news_two['j_blog']; ?></a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> <?= tgl_indo_singkat(date('Y-m-d', strtotime($news_two['tgl']))); ?></li>
														<li><a href="blog-single.html#comments"><i class="icon-eye"></i> 21</a></li>
														<li><a href="#"><i class="icon-camera-retro"></i></a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p class="mb-0"><?= judul($news_two['isi'], '180'); ?> <a href="">Selengkapnya >></a></p>
												</div>
											</div>
										</div>
									</div>
									<div class="posts-sm row col-mb-30">
										<?php
                                        $n_two = $db->query("SELECT *, a.created_at as tgl FROM blog a, tags_blog b WHERE a.id_blog=b.id_blog AND a.id_blog!='$news_two[id_blog]' AND b.id_tags='$t_two[id_tags]' AND a.publish='Y' ORDER BY tgl DESC LIMIT 4");
                                        while ($n_t=$n_two->fetch_assoc()) :
                                        ?>
										<div class="entry col-md-6">
											<div class="grid-inner row g-0">
												<div class="col-auto">
													<div class="entry-image">
														<a href="#"><img src="<?= base_url() ?>_uploads/blog/sampul/<?= $n_t['id_blog']; ?>/<?= $n_t['sampul']; ?>" alt="<?= $n_t['sampul']; ?>"></a>
													</div>
												</div>
												<div class="col ps-3">
													<div class="entry-title">
														<h4><a href="#"><?= $n_t['j_blog']; ?></a></h4>
													</div>
													<div class="entry-meta">
														<ul>
															<li><i class="icon-calendar3"></i> <?= tgl_indo_singkat(date('Y-m-d', strtotime($n_t['tgl']))); ?></li>
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
										<h3>Galeri Kegiatan</h3>
									</div>

									<div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery">
										<?php 
										$gal = $db->query("SELECT * FROM d_giat WHERE x_giat!='mp4' ORDER BY RAND() LIMIT 20");
										while ($g=$gal->fetch_assoc()) :
										?>
										<a class="grid-item" href="<?= base_url() ?>_uploads/f_giat/<?= $g['n_d_giat']; ?>" data-lightbox="gallery-item"><img src="<?= base_url() ?>_uploads/f_giat/<?= $g['n_d_giat']; ?>" alt="<?= $g['n_d_giat']; ?>"></a>
										<?php endwhile; ?>
									</div>
								</div>

								<div class="col-12">

									<div class="fancy-title title-border">
										<h3>Other News</h3>
									</div>

									<div class="row posts-md col-mb-30">
										<div class="entry col-sm-6 col-xl-4">
											<div class="grid-inner">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>assets/web/images/magazine/thumb/11.jpg" alt="Image"></a>
												</div>
												<div class="entry-title title-xs nott">
													<h3><a href="blog-single.html">Yum, McDonald's apologize as new China food scandal brews</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 9th Sep 2021</li>
														<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 23</a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p>Neque nesciunt molestias soluta esse debitis. Magni impedit quae consectetur consequuntur.</p>
												</div>
											</div>
										</div>

										<div class="entry col-sm-6 col-xl-4">
											<div class="grid-inner">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>assets/web/images/magazine/thumb/16.jpg" alt="Image"></a>
												</div>
												<div class="entry-title title-xs nott">
													<h3><a href="blog-single.html">Halliburton gets boost from rebound in North America drilling</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 23rd Aug 2021</li>
														<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 33</a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p>Eaque iusto quod assumenda beatae, nesciunt aliquid. Vel, eos eligendi?</p>
												</div>
											</div>
										</div>

										<div class="entry col-sm-6 col-xl-4">
											<div class="grid-inner">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>assets/web/images/magazine/thumb/13.jpg" alt="Image"></a>
												</div>
												<div class="entry-title title-xs nott">
													<h3><a href="blog-single.html">China sends spy ship off Hawaii during U.S.-led drills brews</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 11th Feb 2021</li>
														<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p>Magni impedit quae consectetur consequuntur adipisci veritatis modi a, officia cum.</p>
												</div>
											</div>
										</div>

										<div class="entry col-sm-6 col-xl-4">
											<div class="grid-inner">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>assets/web/images/magazine/thumb/10.jpg" alt="Image"></a>
												</div>
												<div class="entry-title title-xs nott">
													<h3><a href="blog-single.html">Wobbly stocks underpin yen and Swiss franc; dollar subdued</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 17th Jan 2021</li>
														<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 50</a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p>Neque nesciunt molestias soluta esse debitis. Magni impedit quae consectetur consequuntur.</p>
												</div>
											</div>
										</div>

										<div class="entry col-sm-6 col-xl-4">
											<div class="grid-inner">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>assets/web/images/magazine/thumb/15.jpg" alt="Image"></a>
												</div>
												<div class="entry-title title-xs nott">
													<h3><a href="blog-single.html">BlackBerry names ex-Sybase executive as chief operating officer</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 20th Nov 2021</li>
														<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p>Eaque iusto quod assumenda beatae, nesciunt aliquid. Vel, eos eligendi?</p>
												</div>
											</div>
										</div>

										<div class="entry col-sm-6 col-xl-4">
											<div class="grid-inner">
												<div class="entry-image">
													<a href="#"><img src="<?= base_url() ?>assets/web/images/magazine/thumb/6.jpg" alt="Image"></a>
												</div>
												<div class="entry-title title-xs nott">
													<h3><a href="blog-single.html">Georgian prime minister fires seven ministers in first reshuffle</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i> 10th Dec 2013</li>
														<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
													</ul>
												</div>
												<div class="entry-content">
													<p>Magni impedit quae consectetur consequuntur adipisci veritatis modi a, officia cum.</p>
												</div>
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
											<a href="#" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<div class="counter counter-inherit d-inline-block text-smaller"><span class="d-block fw-bold" data-from="1000" data-to="58742" data-refresh-interval="100" data-speed="3000" data-comma="true"></span><small>Likes</small></div>
										</div>

										<div class="col-4">
											<a href="#" class="social-icon si-dark si-colored si-twitter mb-0" style="margin-right: 10px;">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<div class="counter counter-inherit d-inline-block text-smaller"><span class="d-block fw-bold" data-from="500" data-to="9654" data-refresh-interval="50" data-speed="2500" data-comma="true"></span><small>Followers</small></div>
										</div>

										<div class="col-4">
											<a href="#" class="social-icon si-dark si-colored si-rss mb-0" style="margin-right: 10px;">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<div class="counter counter-inherit d-inline-block text-smaller"><span class="d-block fw-bold" data-from="200" data-to="15475" data-refresh-interval="150" data-speed="3500" data-comma="true"></span><small>Readers</small></div>
										</div>
									</div>
								</div>

								<div class="widget clearfix">
									<img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
								</div>

								<div class="widget widget_links clearfix">

									<h4>Categories</h4>

									<div class="row col-mb-30">
										<div class="col-sm-6">
											<ul>
												<li><a href="#">World</a></li>
												<li><a href="#">Technology</a></li>
												<li><a href="#">Entertainment</a></li>
												<li><a href="#">Sports</a></li>
												<li><a href="#">Media</a></li>
												<li><a href="#">Politics</a></li>
												<li><a href="#">Business</a></li>
											</ul>
										</div>
										<div class="col-sm-6">
											<ul>
												<li><a href="#">Lifestyle</a></li>
												<li><a href="#">Travel</a></li>
												<li><a href="#">Cricket</a></li>
												<li><a href="#">Football</a></li>
												<li><a href="#">Education</a></li>
												<li><a href="#">Photography</a></li>
												<li><a href="#">Nature</a></li>
											</ul>
										</div>
									</div>

								</div>

								<div class="widget clearfix">

									<h4>Twitter Feed Scroller</h4>
									<div class="fslider customjs testimonial twitter-scroll twitter-feed" data-username="bangameck" data-count="2" data-animation="slide" data-arrows="false">
										<i class="i-plain color icon-twitter mb-0" style="margin-right: 15px;"></i>
										<div class="flexslider" style="width: auto;">
											<div class="slider-wrap">
												<div class="slide"></div>
											</div>
										</div>
									</div>

								</div>

								<div class="widget clearfix">

									<h4>Flickr Photostream</h4>
									<div id="flickr-widget" class="flickr-feed masonry-thumbs grid-container grid-5" data-id="613394@N22" data-count="15" data-type="group" data-lightbox="gallery"></div>

								</div>

								<div class="widget clearfix">

									<div class="tabs mb-0 clearfix" id="sidebar-tabs">

										<ul class="tab-nav clearfix">
											<li><a href="#tabs-1">Popular</a></li>
											<li><a href="#tabs-2">Recent</a></li>
											<li><a href="#tabs-3"><i class="icon-comments-alt me-0"></i></a></li>
										</ul>

										<div class="tab-container">

											<div class="tab-content clearfix" id="tabs-1">
												<div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/magazine/small/3.jpg" alt="Image"></a>
																</div>
															</div>
															<div class="col ps-3">
																<div class="entry-title">
																	<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
																</div>
																<div class="entry-meta">
																	<ul>
																		<li><i class="icon-comments-alt"></i> 35 Comments</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>

													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/magazine/small/2.jpg" alt="Image"></a>
																</div>
															</div>
															<div class="col ps-3">
																<div class="entry-title">
																	<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
																</div>
																<div class="entry-meta">
																	<ul>
																		<li><i class="icon-comments-alt"></i> 24 Comments</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>

													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/magazine/small/1.jpg" alt="Image"></a>
																</div>
															</div>
															<div class="col ps-3">
																<div class="entry-title">
																	<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
																</div>
																<div class="entry-meta">
																	<ul>
																		<li><i class="icon-comments-alt"></i> 19 Comments</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-content clearfix" id="tabs-2">
												<div class="posts-sm row col-mb-30" id="recent-post-list-sidebar">
													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/magazine/small/1.jpg" alt="Image"></a>
																</div>
															</div>
															<div class="col ps-3">
																<div class="entry-title">
																	<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
																</div>
																<div class="entry-meta">
																	<ul>
																		<li>10th July 2021</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>

													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/magazine/small/2.jpg" alt="Image"></a>
																</div>
															</div>
															<div class="col ps-3">
																<div class="entry-title">
																	<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
																</div>
																<div class="entry-meta">
																	<ul>
																		<li>10th July 2021</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>

													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/magazine/small/3.jpg" alt="Image"></a>
																</div>
															</div>
															<div class="col ps-3">
																<div class="entry-title">
																	<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
																</div>
																<div class="entry-meta">
																	<ul>
																		<li>10th July 2021</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-content clearfix" id="tabs-3">
												<div class="posts-sm row col-mb-30" id="recent-comments-list-sidebar">
													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/icons/avatar.jpg" alt="User Avatar"></a>
																</div>
															</div>
															<div class="col ps-3">
																<strong>John Doe:</strong> Veritatis recusandae sunt repellat distinctio...
															</div>
														</div>
													</div>

													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/icons/avatar.jpg" alt="User Avatar"></a>
																</div>
															</div>
															<div class="col ps-3">
																<strong>Mary Jane:</strong> Possimus libero, earum officia architecto maiores....
															</div>
														</div>
													</div>

													<div class="entry col-12">
														<div class="grid-inner row g-0">
															<div class="col-auto">
																<div class="entry-image">
																	<a href="#"><img class="rounded-circle" src="<?= base_url() ?>assets/web/images/icons/avatar.jpg" alt="User Avatar"></a>
																</div>
															</div>
															<div class="col ps-3">
																<strong>Site Admin:</strong> Deleniti magni labore laboriosam odio...
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>

									</div>

								</div>

								<div class="widget clearfix">
									<iframe src="https://player.vimeo.com/video/100299651" width="500" height="264" allow="autoplay; fullscreen" allowfullscreen></iframe>
								</div>

								<div class="widget clearfix">
									<img class="aligncenter" src="<?= base_url() ?>assets/web/images/magazine/ad.png" alt="Image">
								</div>

								<div class="widget clearfix">
									<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=350&amp;height=240&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" style="border:none; overflow:hidden; width:350px; height:240px; max-width: 100% !important;"></iframe>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>