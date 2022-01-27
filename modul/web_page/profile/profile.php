<?php 
include '_func/identity.php';
$a=$_GET['a'];
switch ($a) {
    default:
	if (empty($_SESSION['username'])){
		echo '<script>window.location.replace("'.base_url().'authenticationError")</script>';
	} else if ($_SESSION['level']!='7') {
		echo '<script>window.location.replace("'.base_url().'profile/'.$_SESSION['username'].'")</script>';
	}
	$d=$db->query("SELECT * FROM users WHERE id='$_SESSION[id_usr]'")->fetch_assoc();
	if (empty($d['foto'])) {
		$ft='default.png';
	} else {
		$ft=$d['foto'];
	}
    ?>
	<title>Profile | <?= $title; ?></title>
    <section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row clearfix">

						<div class="col-md-9">

							<img src="<?= base_url(); ?>_uploads/f_usr/<?= $ft; ?>" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">

							<div class="heading-block border-0">
								<h4><?= $d['nama']; ?></h4>
								<small><?= $d['email']; ?></small>
							</div>

							<div class="clear"></div>

							<div class="row clearfix">

								<div class="col-lg-12">

									<div class="tabs tabs-alt clearfix" id="tabs-profile">

										<ul class="tab-nav clearfix">
											<li><a href="#tab-posts"><i class="icon-pencil2"></i> Pengaduan</a></li>
											<li><a href="#tab-replies"><i class="icon-reply"></i> Replies</a></li>
											<li><a href="#tab-connections"><i class="icon-users"></i> Connections</a></li>
											<li><a href="#tab-feeds"><i class="icon-rss2"></i> Session Login</a></li>
										</ul>

										<div class="tab-container">

											<div class="tab-content clearfix" id="tab-feeds">

												<p></p>
											<div class="table-responsive">
											<table id="datatable1" class="table table-striped table-bordered" cellspacing="0">
												  <thead>
													<tr>
													  <th>Time</th>
													  <th>Operation System</th>
													  <th>Browser</th>
													  <th>IP Address</th>
													</tr>
												  </thead>
												  <tbody>
													  <?php 
													 	$datprof = $db->query("SELECT * FROM session_log WHERE username='$_SESSION[username]' ORDER BY 'time' DESC");
													 	while($dp=$datprof->fetch_assoc()) : 
													  ?>
													<tr>
													  <td>
														<?= $dp['time'] ?>
													  </td>
													  <td><?= $dp['os']; ?></td>
													  <td><?= $dp['browser']; ?></td>
													  <td><code><?= $dp['ip']; ?></code></td>
													</tr>
													<?php endwhile; ?>
													
												  </tbody>
												</table>
											</div>
											</div>
											<div class="tab-content clearfix" id="tab-posts">

												<!-- Posts
												============================================= -->
												<p></p>
												<div class="table-responsive">
											<table id="datatable2" class="table table-bordered" cellspacing="0">
													<thead>
														<tr>
															<th class="text-center">No</th>
															<th class="text-center">Pengaduan</th>
															<th class="text-center">Time</th>
															<th class="text-center">Status</th>
															<th class="text-center">Details</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															$pengprof = $db->query("SELECT * FROM pengaduan WHERE email_p='$_SESSION[email]' ORDER BY created_at DESC");
															$no=1;
															while($pp=$pengprof->fetch_assoc()) : 
																if ($pp['status']=='P') {
																	$st 	=	'<div class="badge alert-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Proses Pengecekan Oleh Admin</div>';
																	
																} else if ($pp['status']=='T') {
																	$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$pp[id_peng]'")->fetch_assoc();
																	
																	$st 	=	'<div class="badge alert-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Diteruskan</div>';
																	
																} else if ($pp['status']=='S') {
																	$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$pp[id_peng]'")->fetch_assoc();
																	$sel	= $db->query("SELECT * FROM pengaduan a, selesai b WHERE a.id_peng=b.id_peng AND a.id_peng='$pp[id_peng]'")->fetch_assoc();
																	
																	$st 	=	'<div class="badge alert-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Selesai</div>';
																	
																} else  {
																	$st 	=	'<div class="badge alert-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Ditolak</div>';
																}
														?>
														<tr>
															<td>
																<?= $no++; ?>
															</td>
															<td><?= $pp['j_peng']; ?></td>
															<td><?= $pp['created_at']; ?></td>
															<td class="text-center"><?= $st; ?></td>
															<td><a href="<?= base_url(); ?>p/pengaduan/<?= $pp['slug']; ?>" class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk melihat detail"><i class="icon-line2-info"></i> Detail</a></td>
														</tr>
														<?php endwhile; ?>
														
													</tbody>
													</table>
											</div>

											</div>
											<div class="tab-content clearfix" id="tab-replies">

												<div class="clear topmargin-sm"></div>
												<ol class="commentlist border-0 m-0 p-0 clearfix">
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
														<div class="comment-wrap clearfix">
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

												</ol>

											</div>
											<div class="tab-content clearfix" id="tab-connections">

												<div class="row topmargin-sm">
													<div class="col-lg-3 col-md-6 bottommargin">

														<div class="team">
															<div class="team-image">
																<img src="images/team/3.jpg" alt="John Doe">
															</div>
															<div class="team-desc">
																<div class="team-title"><h4>John Doe</h4><span>CEO</span></div>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
																	<i class="icon-facebook"></i>
																	<i class="icon-facebook"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
																	<i class="icon-twitter"></i>
																	<i class="icon-twitter"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
																	<i class="icon-gplus"></i>
																	<i class="icon-gplus"></i>
																</a>
															</div>
														</div>

													</div>

													<div class="col-lg-3 col-md-6 bottommargin">

														<div class="team">
															<div class="team-image">
																<img src="images/team/2.jpg" alt="Josh Clark">
															</div>
															<div class="team-desc">
																<div class="team-title"><h4>Josh Clark</h4><span>Co-Founder</span></div>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
																	<i class="icon-facebook"></i>
																	<i class="icon-facebook"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
																	<i class="icon-twitter"></i>
																	<i class="icon-twitter"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
																	<i class="icon-gplus"></i>
																	<i class="icon-gplus"></i>
																</a>
															</div>
														</div>

													</div>

													<div class="col-lg-3 col-md-6 bottommargin">

														<div class="team">
															<div class="team-image">
																<img src="images/team/8.jpg" alt="Mary Jane">
															</div>
															<div class="team-desc">
																<div class="team-title"><h4>Mary Jane</h4><span>Sales</span></div>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
																	<i class="icon-facebook"></i>
																	<i class="icon-facebook"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
																	<i class="icon-twitter"></i>
																	<i class="icon-twitter"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
																	<i class="icon-gplus"></i>
																	<i class="icon-gplus"></i>
																</a>
															</div>
														</div>

													</div>

													<div class="col-lg-3 col-md-6">

														<div class="team">
															<div class="team-image">
																<img src="images/team/4.jpg" alt="Nix Maxwell">
															</div>
															<div class="team-desc">
																<div class="team-title"><h4>Nix Maxwell</h4><span>Support</span></div>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
																	<i class="icon-facebook"></i>
																	<i class="icon-facebook"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
																	<i class="icon-twitter"></i>
																	<i class="icon-twitter"></i>
																</a>
																<a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
																	<i class="icon-gplus"></i>
																	<i class="icon-gplus"></i>
																</a>
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

						<div class="w-100 line d-block d-md-none"></div>

						<div class="col-md-3">

							<div class="list-group">
								<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Profile</div><i class="icon-user"></i></a>
								<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Servers</div><i class="icon-laptop2"></i></a>
								<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Messages</div><i class="icon-envelope2"></i></a>
								<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Billing</div><i class="icon-credit-cards"></i></a>
								<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Settings</div><i class="icon-cog"></i></a>
								<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between"><div>Logout</div><i class="icon-line2-logout"></i></a>
							</div>

							<div class="fancy-title topmargin title-border">
								<h4>About Me</h4>
							</div>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laboriosam, dignissimos veniam obcaecati. Quasi eaque, odio assumenda porro explicabo laborum!</p>

							<div class="fancy-title topmargin title-border">
								<h4>Social Profiles</h4>
							</div>

							<a href="#" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-dribbble si-small si-rounded si-light" title="Dribbble">
								<i class="icon-dribbble"></i>
								<i class="icon-dribbble"></i>
							</a>

							<a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
								<i class="icon-flickr"></i>
								<i class="icon-flickr"></i>
							</a>

							<a href="#" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>

							<a href="#" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

						</div>

					</div>

				</div>
			</div>
		</section><!-- #content end -->
    <?php } ?>