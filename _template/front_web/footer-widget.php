<?php 
// include_once '_func/func.php';
include '_func/identity.php';
?>
<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-8">

							<div class="row col-mb-50">
								<div class="col-md-8">

									<div class="widget clearfix">

										<img src="<?= base_url(); ?>assets/web/images/footer-widget-logo.png" alt="Image" class="footer-logo">

										<?= $deskripsi; ?>

										<div style="background: url('<?= base_url(); ?>assets/web/images/world-map.png') no-repeat center center; background-size: 100%;">
											<address>
												<strong>Alamat:</strong><br>
												<?= $alamat; ?>
											</address>
											<abbr title="Phone Number"><strong>Phone:</strong></abbr> <a href="<?= $no_telp_add; ?>"><?= $no_telp; ?></a><br>
											<abbr title="Fax"><strong>Fax:</strong></abbr> <a href="<?= $no_fax_add; ?>"><?= $no_fax; ?></a><br>
											<abbr title="Email Address"><strong>Email:</strong></abbr> <a href="<?= $emails_add; ?>"><?= $emails; ?></a><br>
											<abbr title="Whatsapp"><strong>WA:</strong></abbr> <a href="<?= $no_wa_add; ?>"><?= $no_wa; ?></a><br>
										</div>

									</div>

								</div>

								<!-- <div class="col-md-4">

									<div class="widget widget_links clearfix">

										<h4>Blogroll</h4>

										<ul>
											<li><a href="https://codex.wordpress.org/">Documentation</a></li>
											<li><a href="https://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
											<li><a href="https://wordpress.org/extend/plugins/">Plugins</a></li>
											<li><a href="https://wordpress.org/support/">Support Forums</a></li>
											<li><a href="https://wordpress.org/extend/themes/">Themes</a></li>
											<li><a href="https://wordpress.org/news/">Canvas Blog</a></li>
											<li><a href="https://planet.wordpress.org/">Canvas Planet</a></li>
										</ul>

									</div>

								</div> -->

								<div class="col-md-4">

									<div class="widget clearfix">
										<h4>Postingan Terbaru</h4>

										<div class="posts-sm row col-mb-30" id="post-list-footer">
                                            <?php 
                                            $rpost = $db->query("SELECT * FROM blog ORDER BY created_at DESC LIMIT 5");
                                            while($rp=$rpost->fetch_assoc()) :
                                            ?>
											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#"><?= judul($rp['j_blog'],'50'); ?></a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li><?= tgl_indo(date('Y-m-d', strtotime($rp['created_at']))).' '.date('H:i', strtotime($rp['created_at'])); ?></li>
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

						<div class="col-lg-4">

							<div class="row col-mb-50">
								<div class="col-md-4 col-lg-12">
									<div class="widget clearfix" style="margin-bottom: -20px;">

										<div class="row">
											<div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="50" data-to="330" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
												<h5 class="mb-0">Pengunjung</h5>
											</div>

											<div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="100" data-to="1846503" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
												<h5 class="mb-0">Total Pengunjung</h5>
											</div>
                                            
                                            <div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="100" data-to="180" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
												<h5 class="mb-0">Total Pengaduan</h5>
											</div>
                                            <div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="100" data-to="175" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
												<h5 class="mb-0">Pengaduan Selesai</h5>
											</div>
										</div>

									</div>
								</div>

								<div class="col-md-5 col-lg-12">
									<div class="widget subscribe-widget clearfix">
										<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
										<div class="widget-subscribe-form-result"></div>
										<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
											<div class="input-group mx-auto">
												<div class="input-group-text"><i class="icon-email2"></i></div>
												<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
												<button class="btn btn-success" type="submit">Subscribe</button>
											</div>
										</form>
									</div>
								</div>

								<div class="col-md-3 col-lg-12">
									<div class="widget clearfix" style="margin-bottom: -20px;">

										<div class="row">
											<div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
												<a href="#" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
											</div>
											<div class="col-6 col-md-12 col-lg-6 clearfix">
												<a href="#" class="social-icon si-dark si-colored si-rss mb-0" style="margin-right: 10px;">
													<i class="icon-rss"></i>
													<i class="icon-rss"></i>
												</a>
												<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
											</div>
										</div>

									</div>
								</div>

							</div>

						</div>
					</div>

				</div>