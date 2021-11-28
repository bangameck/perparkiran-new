<?php 
// include_once '_func/func.php';
include '_func/identity.php';
?>
<div class="footer-widgets-wrap" id="contact">

    <div class="row col-mb-50">
        <div class="col-lg-8">

            <div class="row col-mb-50">
                <div class="col-md-8">

                    <div class="widget clearfix">

                        <img src="<?= base_url(); ?>assets/web/images/footer-widget-logo.png" alt="Image"
                            class="footer-logo">

                        <?= $deskripsi; ?>

                        <div
                            style="background: url('<?= base_url(); ?>assets/web/images/world-map.png') no-repeat center center; background-size: 100%;">
                            <address>
                                <strong>Alamat:</strong><br>
                                <?= $alamat; ?>
                            </address>
                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> <a
                                href="<?= $no_telp_add; ?>"><?= $no_telp; ?></a><br>
                            <abbr title="Fax"><strong>Fax:</strong></abbr> <a
                                href="<?= $no_fax_add; ?>"><?= $no_fax; ?></a><br>
                            <abbr title="Email Address"><strong>Email:</strong></abbr> <a
                                href="<?= $emails_add; ?>"><?= $emails; ?></a><br>
                            <abbr title="Whatsapp"><strong>WA:</strong></abbr> <a
                                href="<?= $no_wa_add; ?>"><?= $no_wa; ?></a><br>
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
                                            $rpost = $db->query("SELECT * FROM blog WHERE publish='Y' ORDER BY created_at DESC LIMIT 5");
                                            while($rp=$rpost->fetch_assoc()) :
                                            ?>
                            <div class="entry col-12">
                                <div class="grid-inner row">
                                    <div class="col">
                                        <div class="entry-title">
                                            <h4><a
                                                    href="<?= base_url(); ?>p/berita/<?= $rp['slug']; ?>"><?= judul($rp['j_blog'],'50'); ?></a>
                                            </h4>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><?= tgl_indo(date('Y-m-d', strtotime($rp['created_at']))).' '.date('H:i', strtotime($rp['created_at'])); ?>
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

        <div class="col-lg-4">

            <div class="row col-mb-50">
                <div class="col-md-4 col-lg-12">
                    <div class="widget clearfix" style="margin-bottom: -20px;">
                        <?php 
										$today=date('Y-m-d');
										$pengunjungtoday = $db->query("SELECT * FROM views_site WHERE time='$today'")->fetch_assoc();
										$ptoday = $pengunjungtoday['jumlah'];
										$pengunjung = $db->query("SELECT * FROM views_site");
										while($p=$pengunjung->fetch_assoc()) {
											$i++;
											$totalp[$i]=$p['jumlah'];
										}
										$total=array_sum($totalp);
										$pengaduan = $db->query("SELECT * FROM pengaduan");
										$tpengaduan = $pengaduan->num_rows;
										$pengaduanselesai = $db->query("SELECT * FROM pengaduan WHERE status='S'");
										$tps = $pengaduanselesai->num_rows;
										?>
                        <div class="row">
                            <div class="col-lg-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="0" data-to="<?= $ptoday; ?>"
                                        data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                <h5 class="mb-0">Pengunjung</h5>
                            </div>

                            <div class="col-lg-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="0" data-to="<?= $total; ?>"
                                        data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="mb-0">Total Pengunjung</h5>
                            </div>

                            <div class="col-lg-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="0" data-to="<?= $tpengaduan; ?>"
                                        data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="mb-0">Total Pengaduan</h5>
                            </div>
                            <div class="col-lg-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="0" data-to="<?= $tps; ?>"
                                        data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="mb-0">Pengaduan Selesai</h5>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-5 col-lg-12">
                    <div class="widget subscribe-widget clearfix">
                        <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp;
                            Inside Scoops:</h5>
                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
                            <div class="input-group mx-auto">
                                <div class="input-group-text"><i class="icon-email2"></i></div>
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                                    class="form-control required email" placeholder="Enter your Email">
                                <button class="btn btn-success" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 col-lg-12">
                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">
                            <div class="col-6 col-md-12 col-lg-6 clearfix">
                                <iframe
                                    src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fweb.facebook.com%2Fdishubkotapku%2F&width=150&layout=button_count&action=like&size=small&share=true&height=46&appId=598262024852855"
                                    width="155" height="46" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                            <div class="col-6 col-md-12 col-lg-6 clearfix">
                                <a href="https://twitter.com/DishubPekanbaru?ref_src=twsrc%5Etfw"
                                    class="twitter-follow-button" data-show-count="false">Follow @DishubPekanbaru</a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>