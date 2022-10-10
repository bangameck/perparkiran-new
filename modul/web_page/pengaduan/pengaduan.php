<?php 
include '_func/identity.php';
$a=$_GET['a'];
switch ($a) {
    default:
$dt1  = $db->query("SELECT * FROM pengaduan WHERE sifat='TR' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pic1 = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$dt1[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$dt2  = $db->query("SELECT * FROM pengaduan WHERE sifat='TR' AND id_peng!='$dt1[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pic2 = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$dt2[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$dt3  = $db->query("SELECT * FROM pengaduan WHERE sifat='TR' AND id_peng!='$dt1[id_peng]' OR id_peng!='$dt2[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pic3 = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$dt3[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$dt4  = $db->query("SELECT * FROM pengaduan WHERE sifat='TR' AND id_peng!='$dt1[id_peng]' OR id_peng!='$dt2[id_peng]' OR id_peng!='$dt3[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pic4 = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$dt4[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$dt5  = $db->query("SELECT * FROM pengaduan WHERE sifat='TR' AND id_peng!='$dt1[id_peng]' OR id_peng!='$dt2[id_peng]' OR id_peng!='$dt3[id_peng]' OR id_peng!='$dt4[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pic5 = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$dt5[id_peng]' ORDER BY RAND() LIMIT 1")->fetch_assoc();
?>
<title>Halaman Pengaduan | <?= $title; ?></title>

<!-- Slider
		============================================= -->
<section id="slider" class="slider-element min-vh-75">
    <div class="slider-inner">

        <div class="vertical-middle">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="slider-title mb-5 dark clearfix">
                            <h2 class="text-white text-rotater mb-2" data-separator="," data-rotate="fadeIn"
                                data-speed="1000">UPT Perparkiran <span
                                    class="t-rotate text-white d-inline-block">Siap,Tegas,Lugas,Teratur</span>.</h2>
                            <p class="lead mb-0 text-uppercase ls2" style="color: #CCC; font-size: 110%">Kami Siap
                                Melayani Anda !</p>
                        </div>
                        <div class="clear"></div>
                        <form action="<?= base_url(); ?>p/pengaduan/cari" method="GET">
                            <div class="input-group input-group-lg mt-1">
                                <input class="form-control rounded border-0" type="search" name="id"
                                    placeholder="Inpukan Kode Pengaduan Anda Disini..." aria-label="Search">
                                <button class="btn" type="submit"><i class="icon-line-search fw-bold"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- HTML5 Video Wrap
				============================================= -->
        <div class="video-wrap">
            <video id="slide-video" poster="<?= base_url(); ?>assets/web/images/poster.jpg" preload="auto" loop autoplay
                muted>
                <source src='<?= base_url(); ?>assets/web/video/1.mp4' type='video/mp4' />
            </video>
            <div class="video-overlay" style="background: rgba(0,0,0,0.5); z-index: 1"></div>
        </div>

    </div>
</section>

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap" style="overflow: visible;">

        <!-- Wave Shape Divider
				============================================= -->
        <div class="wave-bottom"
            style="position: absolute; top: -12px; left: 0; width: 100%; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);">
        </div>

        <!-- Promo Section
				============================================= -->
        <div class="section m-0 d-none d-md-block"
            style="padding: 120px 0; background: #FFF url('<?= base_url(); ?>assets/web/images/rm.jpg') no-repeat left top / cover">
            <div class="container">
                <div class="row">

                    <div class="col-md-6"></div>

                    <div class="col-md-6">
                        <div class="heading-block border-bottom-0 mb-4 mt-5">
                            <h3>Radinal Munandar, S.STP</h3>
                            <span>Kepala UPT Perparkiran</span>
                        </div>
                        <p class="mb-2">Aplikasi ini dibangun bertujuan untuk meningkatkan pelayanan masyarakat khusunya
                            didalam bidang perparkiran. Aplikasi ini juga bertujuan untuk mempermudah masyarakat
                            melakukan pengaduan tentang perparkiran secara up to date dan realtime.</p>
                        <p>Jangan takut melaporkan pelanggaran perparkiran, Jika melihat ada pelanggaran tentang
                            perparkiran segera laporkan kepada kami dengan mengklik tombol dibawah ini.</p>
                        <a href="<?= base_url(); ?>p/pengaduan#tahapan"
                            class="button button-rounded button-xlarge ls0 ls0 nott fw-normal m-0">Klik Disini</a>
                    </div>

                </div>
            </div>
            <!-- Wave Shape Divider - Bottom
					============================================= -->
            <div class="wave-bottom"
                style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);">
            </div>
        </div>

        <div class="promo promo-full p-5 footer-stick">
            <?php 
				$pengaduan 	= $db->query("SELECT * FROM pengaduan WHERE status!='X'")->num_rows;
				$proses		= $db->query("SELECT * FROM pengaduan WHERE status='P'")->num_rows;
				$teruskan 	= $db->query("SELECT * FROM pengaduan WHERE status='T'")->num_rows;
				$selesai 	= $db->query("SELECT * FROM pengaduan WHERE status='S'")->num_rows;
				?>
            <div class="row col-mb-50">
                <div class="col-sm-6 col-lg-3 text-center">
                    <i class="i-plain i-xlarge mx-auto mb-0 icon-laptop1"></i>
                    <div class="counter counter-large" style="color: #1abc9c;"><span data-from="0"
                            data-to="<?= $pengaduan; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
                    <h5>Pengaduan</h5>
                </div>

                <div class="col-sm-6 col-lg-3 text-center">
                    <i class="i-plain i-xlarge mx-auto mb-0 icon-folder-check"></i>
                    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0"
                            data-to="<?= $proses; ?>" data-refresh-interval="50" data-speed="2500"></span></div>
                    <h5>Proses Verifikasi</h5>
                </div>

                <div class="col-sm-6 col-lg-3 text-center">
                    <i class="i-plain i-xlarge mx-auto mb-0 icon-hands-helping"></i>
                    <div class="counter counter-large" style="color: #3498db;"><span data-from="0"
                            data-to="<?= $teruskan; ?>" data-refresh-interval="50" data-speed="3500"></span></div>
                    <h5>Ditindaklanjuti</h5>
                </div>

                <div class="col-sm-6 col-lg-3 text-center">
                    <i class="i-plain i-xlarge mx-auto mb-0 icon-line-check-circle"></i>
                    <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0"
                            data-to="<?= $selesai; ?>" data-refresh-interval="30" data-speed="2700"></span></div>
                    <h5>Selesai</h5>
                </div>
            </div>
        </div>

        <!-- Featues Section
				============================================= -->
        <div id="tahapan" class="section mt-5 mb-0"
            style="padding: 120px 0; background-image: url('<?= base_url(); ?>assets/web/images/patern1.jpg'); background-size: auto; background-repeat: repeat">

            <!-- Wave Shape
					============================================= -->
            <div class="wave-top"
                style="position: absolute; top: 0; left: 0; width: 100%; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x;">
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="row dark clearfix">
                            <!-- <div class="title-center title-border topmargin">
										<h3>Tahapan Pengaduan</h3>
									</div> -->
                            <div class="row justify-content-center mt-5">
                                <div class="col-md-7 text-center">
                                    <h3 class="display-4 fw-bold font-display">Tahapan Pengaduan</h3>
                                    <!-- <p class="lead" style="line-height: 1.5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis consectetur consequatur possimus asperiores. Vel maxime error cupiditate.</p> -->
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center gutter-50 col-mb-80 mt-5">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="row col-mb-30 justify-content-center align-items-center">
                                        <div class="col-md-8 feature-box fbox-border fbox-dark fbox-effect">
                                            <div class="fbox-icon">
                                                <a href="#"><i>1</i></a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="nott text-larger mb-2">Input Pengaduan</h3>
                                                <p class="text-white"> Input pengaduan anda dengan cara mengisi form
                                                    yang sudah disediakan diwebsite atau melalui Whatsapp ke <a
                                                        style="color: #00ff00;"
                                                        href="<?= $no_wa_add; ?>"><?= $no_wa; ?></a>. Isi format
                                                    pengaduan sesuai dengan kejadian yang anda alami dan jangan lupa
                                                    untuk memberi bukti laporan minimal 1 (Satu) Gambar / Foto atau
                                                    Video (Contoh: Foto juru parkir yang ingin dilaporkan) untuk
                                                    mempermudah tim penyelesaian dalam mengidentifikasi atau
                                                    menyelesaikan pengaduan.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="<?= base_url(); ?>assets/web/images/1.png" alt="Image Pengaduan"
                                                class="p-4">
                                        </div>

                                        <div class="clear"></div>

                                        <div class="col-md-8 feature-box fbox-border fbox-dark fbox-effect">
                                            <div class="fbox-icon">
                                                <a href="#"><i>2</i></a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="nott text-larger mb-2">Verifikasi Pengaduan</h3>
                                                <p class="text-white"> Setelah anda berhasil menginput pengaduan admin
                                                    UPT Perparkiran akan memverifikasi data pengaduan anda, jika
                                                    pengaduan anda sudah sesuai format yang tepat maka pengaduan akan
                                                    segera diteruskan kepada tim penyelesaian untuk segera ditindak
                                                    lanjuti, dan anda akan mendapatkan email bahwa pengaduan anda sudah
                                                    diteruskan.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="<?= base_url(); ?>assets/web/images/2.png"
                                                alt="Image Verification" class="p-4">
                                        </div>

                                        <div class="clear"></div>

                                        <div class="col-md-8 feature-box fbox-border fbox-dark fbox-effect">
                                            <div class="fbox-icon">
                                                <a href="#"><i>3</i></a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="nott text-larger mb-2">Diteruskan ke Tim Penyelesaian</h3>
                                                <p class="text-white"> Setelah laporan terverifikasi admin UPT
                                                    Perparkiran akan meneruskan laporan kepada tim penyelesaian dan
                                                    langsung menindak lanjuti laporan pengaduan. Setelah selesai tim
                                                    akan menginputkan bukti penyelesaian dilapangan berupa gambar atau
                                                    video penindak lanjutan. Dan anda akan mendapatkan email bahwa
                                                    pengaduan telah selesai ditindak lanjuti.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="<?= base_url(); ?>assets/web/images/3.png" alt="Image Forward"
                                                class="p-4" height="250">
                                        </div>

                                        <div class="clear"></div>

                                        <div class="col-md-8 feature-box fbox-border fbox-dark fbox-effect noborder">
                                            <div class="fbox-icon">
                                                <a href="#"><i>4</i></a>
                                            </div>
                                            <div class="fbox-content">
                                                <h3 class="nott text-larger mb-2">Laporan Selesai</h3>
                                                <p class="text-white"> Setelah laporan selesai ditindak lanjuti anda
                                                    bisa memberi tanggapan berupa rating kepuasaan anda pada laporan
                                                    pengaduan tersebut.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="<?= base_url(); ?>assets/web/images/4.png" alt="Image Finish"
                                                class="p-4">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Feature - 1
									============================================= -->
                            <!-- <div class="col-md-6">
										<div class="feature-box media-box bottommargin">
											<div class="fbox-icon">
												<a href="#">
													<i class="icon-laptop1 rounded-0 bg-transparent text-start"></i>
												</a>
											</div>
											<div class="fbox-content">
												<h3 class="text-white">Input Pengaduan</h3>
												<p class="text-white">Langkah Pertama : <br> Input pengaduan anda dengan cara mengisi form yang sudah disediakan sesuai dengan kejadian yang anda alami dan jangan lupa untuk memberi bukti laporan minimal 1 (Satu) Gambar / Foto atau Video (Contoh: Foto juru parkir yang ingin dilaporkan) untuk mempermudah tim penyelesaian dalam mengidentifikasi atau menyelesaikan pengaduan.</p>
											</div>
										</div>
									</div> -->

                            <!-- Feature - 2
									============================================= -->
                            <!-- <div class="col-md-6">
										<div class="feature-box media-box bottommargin">
											<div class="fbox-icon">
												<a href="#">
													<i class="icon-folder-check rounded-0 bg-transparent text-start"></i>
												</a>
											</div>
											<div class="fbox-content">
												<h3 class="text-white">Verifikasi Pengaduan</h3>
												<p class="text-white">Kedua : <br> Setelah anda berhasil menginput pengaduan admin UPT Perparkiran akan memverifikasi data pengaduan anda, jika pengaduan anda sudah sesuai format yang tepat maka pengaduan akan segera diteruskan kepada tim penyelesaian untuk segera ditindak lanjuti, dan anda akan mendapatkan email bahwa pengaduan anda sudah diteruskan.</p>
											</div>
										</div>
									</div> -->

                            <!-- Feature - 3
									============================================= -->
                            <!-- <div class="col-md-6">
										<div class="feature-box media-box bottommargin">
											<div class="fbox-icon">
												<a href="#">
													<i class="icon-hands-helping rounded-0 bg-transparent text-start"></i>
												</a>
											</div>
											<div class="fbox-content">
												<h3 class="text-white">Tim Menindak lanjuti</h3>
												<p class="text-white">Ketiga : <br> Setelah laporan terverifikasi tim penyelesaian langsung menindak lanjuti laporan pengaduan. Setelah selesai tim akan menginputkan bukti penyelesaian dilapangan berupa gambar atau video penindak lanjutan. Dan anda akan mendapatkan email bahwa pengaduan telah selesai ditindak lanjuti.</p>
											</div>
										</div>
									</div> -->

                            <!-- Feature - 4
									============================================= -->
                            <!-- <div class="col-md-6">
										<div class="feature-box media-box bottommargin">
											<div class="fbox-icon">
												<a href="#">
													<i class="icon-line-check-circle rounded-0 bg-transparent text-start"></i>
												</a>
											</div>
											<div class="fbox-content">
												<h3 class="text-white">Laporan Selesai</h3>
												<p class="text-white">Terakhir : <br> Setelah laporan selesai ditindak lanjuti anda bisa memberi tanggapan berupa rating kepuasaan anda pada laporan pengaduan tersebut.</p>
											</div>
										</div>
									</div> -->

                        </div>
                    </div>
                    <dir class="clear"></dir>

                    <!-- Registration Foem
							============================================= -->
                    <center>
                        <br>
                        <div class="col-lg-10">
                            <?php 
									if (empty($_SESSION['username']) OR $_SESSION['level']!='7') {
									?>
                            <div class="card shadow" data-animate="shake" style="opacity: 1 !important">
                                <div class="card-body">

                                    <div class="badge registration-badge shadow-sm alert-primary">Form Laporan Pengaduan
                                    </div>
                                    <h4 class="card-title ls-1 mt-4 fw-bold h5">Silahkan Inputkan Laporan Anda Dibawah
                                        Ini!</h4>
                                    <h6 class="card-subtitle mb-4 fw-normal text-uppercase ls2 text-black-50">Untuk
                                        Perparkiran Pekanbaru yang aman.</h6>

                                    <div class="form">
                                        <!-- <div class="form-result"></div> -->

                                        <form class="row mb-0" action="" method="post" enctype="multipart/form-data">

                                            <!-- <div class="form-process">
														<div class="css3-spinner">
															<div class="css3-spinner-scaler"></div>
														</div>
													</div> -->

                                            <div class="col-12 form-group">
                                                <input type="text" name="j_peng" value=""
                                                    class="sm-form-control border-form-control"
                                                    placeholder="Judul Pengaduan" disabled />
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea name="peng" class="sm-form-control border-form-control"
                                                    disabled>Isi Pengaduan</textarea>
                                                <!-- <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control border-form-control" placeholder="Your Email Address:" /> -->
                                            </div>

                                            <div class="col-12 form-group">
                                                <label><small style="color: green;">Pilih gambar atau
                                                        video bukti pengaduan</small></label>
                                                <input id="input-6" name="input6[]" type="file"
                                                    accept="image/jpeg, image/png, video/mp4" multiple
                                                    class="file-loading" data-show-preview="false" disabled>
                                                <small style="color: red;">Format File : jpg, png, jpeg, jpe,
                                                    mp4</small><br>
                                                <small style="color: red;">Jika jumlah file banyak dan berukuran besar
                                                    maka loading akan
                                                    lebih lama.</small>
                                            </div>

                                            <div class="col-12 form-group" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Silahkan Login terlebih dahulu sebelum mengisi form ini.">
                                                <a href="<?= base_url(); ?>login-for-users"
                                                    class="button button-rounded w-100 button-large bg-color text-white nott ls0 mx-0"
                                                    type="submit" name="lapor">Login</a>
                                                <br>
                                                <small
                                                    style="display: block; font-size: 12px; margin-top: 15px; color: #AAA;"><em>Kami
                                                        akan menginformasikan laporan anda secara realtime melalui
                                                        email.</em></small>
                                            </div>

                                            <div class="col-12 form-group d-none">
                                                <!-- <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" /> -->
                                            </div>

                                            <!-- <input type="hidden" name="prefix" value="template-contactform-"> -->

                                        </form>
                                    </div>

                                </div>
                            </div>
                            <?php 
									} else {
                                        $d	  = $db->query("SELECT * FROM users WHERE id='$_SESSION[id_usr]'")->fetch_assoc();
										$csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
										if ($csrf==false) {
											sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir atau akun anda sudah login diperangkat lain, silahkan login ulang');
										} else {
									?>
                            <div class="card shadow" style="opacity: 1 !important">
                                <div class="card-body">

                                    <div class="badge registration-badge shadow-sm alert-primary">Form Laporan Pengaduan
                                    </div>
                                    <h4 class="card-title ls-1 mt-4 fw-bold h5">Silahkan Inputkan Laporan Anda Dibawah
                                        Ini!</h4>
                                    <h6 class="card-subtitle mb-4 fw-normal text-uppercase ls2 text-black-50">Untuk
                                        Perparkiran Pekanbaru yang aman.</h6>

                                    <div class="form">
                                        <!-- <div class="form-result"></div> -->

                                        <form class="row mb-0" action="" method="POST" enctype="multipart/form-data">

                                            <!-- <div class="form-process">
														<div class="css3-spinner">
															<div class="css3-spinner-scaler"></div>
														</div>
													</div> -->

                                            <div class="col-12 form-group">
                                                <input type="text" name="j_peng" value=""
                                                    class="sm-form-control border-form-control required"
                                                    placeholder="Judul Pengaduan" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea name="peng"
                                                    class="sm-form-control border-form-control required editor"
                                                    required>Isi Pengaduan</textarea>
                                                <!-- <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control border-form-control" placeholder="Your Email Address:" /> -->
                                            </div>

                                            <div class="col-12 form-group">
                                                <label><small style="color: green;">Pilih gambar atau
                                                        video bukti pengaduan</small></label>
                                                <input id="input-6" name="input6[]" type="file"
                                                    accept="image/jpeg, image/png, video/mp4"
                                                    class="sm-form-control border-form-control required" multiple
                                                    class="file-loading" data-show-preview="false">
                                                <small style="color: red;">Format File : jpg, png, jpeg, jpe,
                                                    mp4</small><br>
                                                <small style="color: red;">Jika jumlah file banyak dan berukuran besar
                                                    maka loading akan
                                                    lebih lama.</small>
                                            </div>

                                            <div class="col-12 form-group">
                                                <button
                                                    class="button button-rounded w-100 button-large bg-color text-white"
                                                    type="submit" name="lapor">Lapor!</button>
                                                <br>
                                                <small
                                                    style="display: block; font-size: 12px; margin-top: 15px; color: #AAA;"><em>Kami
                                                        akan menginformasikan laporan anda secara realtime melalui
                                                        email.</em></small>
                                            </div>


                                        </form>
                                        <?php
													if (isset($_POST['lapor'])) {

															$id             = $db->real_escape_string(acakhba('12'));
															$nama_p         = $db->real_escape_string($d['nama']);
															$email_p        = $db->real_escape_string($d['email']);
															$no_hp_p        = $db->real_escape_string($d['no_hp_p']);
															$j_peng         = $db->real_escape_string($_POST['j_peng']);
															$slug           = $db->real_escape_string(uid('2').'-'.slug($_POST['j_peng']));
															$peng           = $_POST['peng'];
															$ket_peng       = $db->real_escape_string('Sedang diverifikasi');
															$adm_peng       = $_SESSION['id_usr'];
															$jumlah_foto    = count($_FILES['input6']['name']);
															// $file_tmp_foto  = $_FILES['foto']['tmp_name'];
															// var_dump($id,$nama_p,$email_p,$no_hp_p,$j_peng,$adm_peng,$jumlah_foto);
															// die();
	
															
															if ($jumlah_foto > 0) {
																for ($f=0; $f < $jumlah_foto; $f++) {
																	// $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
																	$file_tmp_f  = $_FILES['input6']['tmp_name'][$f];
																	$name_tmp_f  = $_FILES['input6']['name'][$f];
																	$ext_valid_f = array('png','jpg','jpeg','jpe','mp4');
																	$x_f         = explode('.', $name_tmp_f);
																	$extend_f    = strtolower(end($x_f));
																	$time        = date('dmYHis');
																	$foto        = $id.'-'.$f.$time. '.' . $extend_f;
																	// $name        = 'giat_'.$f.$time. '.';
																	if ($extend_f=='png' or $extend_f=='jpg' or $extend_f=='jpeg' or $extend_f=='jpe') {
																		$path_f      = '_uploads/f_peng/'.$foto;
																	} else {
																		$path_v      = '_uploads/v_peng/'.$foto;
																	}
																		
																	if (in_array($extend_f, $ext_valid_f)===true) {
																		if ($extend_f=='png' or $extend_f=='jpg' or $extend_f=='jpeg' or $extend_f=='jpe') {
																			compressImage($file_tmp_f, $path_f, 30);
																		} else {
																			move_uploaded_file($file_tmp_f, $path_v);
																		}
																		$db->query("INSERT INTO d_pengaduan VALUES ('','$id','$foto','$extend_f',NOW())");
																	} else {
																		javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe, 3gp, mp4, mp4v, mpg4, mov, qt');
																	}
																}
																//kirim email
																$mail = new  PHPMailer\PHPMailer\PHPMailer();
																// $body = 'Test email dulu bosque'
																//Enable SMTP debugging.
																//$mail->SMTPDebug = 3;
																//Set PHPMailer to use SMTP.
																$mail->isSMTP();
																//Set SMTP host name
																$mail->Host = $host;
																$mail->SMTPAuth = true;
																//Provide username and password
																$mail->Username = $email_;   //nama-email smtp
																$mail->Password = $pmail;    //password email smtp
																//If SMTP requires TLS encryption then set it
																$mail->SMTPSecure = $secure;
																//Set TCP port to connect to
																$mail->Port = $port;
											
																$mail->From = $email_; //email pengirim
																$mail->FromName = $title; //nama pengirim
	
																$mail->AddEmbeddedImage($logo, 'logo', 'icon.png');
																$mail->addAddress($email_p, $nama_p); //email penerima
	
																$mail->isHTML(true);
																$mail->Subject = 'Layanan Pengaduan Perparkiran Kota Pekanbaru.'; //subject
																$body          = '<!DOCTYPE html>
																				<html lang="en">
																				<head>
																					<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
																					<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
																					<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
																					<style type="text/css">
																					body{
																					width: 650px;
																					font-family: work-Sans, sans-serif;
																					background-color: #f6f7fb;
																					display: block;
																					}
																					a{
																					text-decoration: none;
																					}
																					span {
																					font-size: 14px;
																					}
																					p {
																						font-size: 13px;
																						line-height: 1.7;
																						letter-spacing: 0.7px;
																						margin-top: 0;
																					}
																					.text-center{
																					text-align: center
																					}
																					h6 {
																					font-size: 16px;
																					margin: 0 0 18px 0;
																					}
																					</style>
																				</head>
																				<body style="margin: 30px auto;">
																					<table style="width: 100%">
																					<tbody>
																						<tr>
																						<td>
																							<table style="background-color: #f6f7fb; width: 100%">
																							<tbody>
																								<tr>
																								<td>
																									<table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
																									<tbody>
																										<tr>
																										<td><img src="cid:logo" alt=""></td>
																										<td style="text-align: right; color:#999"><span>Email Resmi UPT Perparkiran Dinas Perhubungan Kota Pekanbaru</span></td>
																										</tr>
																									</tbody>
																									</table>
																								</td>
																								</tr>
																							</tbody>
																							</table>
																							<table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
																							<tbody>
																								<tr>
																								<td style="padding: 30px"> 
																									<h6 style="font-weight: 600">Pengaduan Anda Sedang diverifikasi.</h6>
																									<p>Halo '.$nama_p.',</p>
																									<p>Pengaduan anda sedang kami verifikasi silahkan cek pengaduan anda secara berkala dengan mengklik ID pengaduan anda dibawah ini :</p>
																									<p style="text-align: center"><a href="'.$base_url.'p/pengaduan/'.$slug.'" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">'.$id.'</a></p>
																									<p>Jika pengaduan anda sudah selesai diverifikasi oleh Admin UPT Perparkiran, kami akan memberitahu melalui surat elektronik ini secara otomatis.</p>
																									<p style="margin-bottom: 0">
																									Regards,<br>Team IT UPT Perparkiran Dinas Perhubungan Kota Pekanbaru</p>
																								</td>
																								</tr>
																							</tbody>
																							</table>
																							<table style="width: 650px; margin: 0 auto; margin-top: 30px">
																							<tbody>       
																								<tr style="text-align: center">
																								<td> 
																									<p style="color: #999; margin-bottom: 0">'.$alamat.'</p>
																									<p style="color: #999; margin-bottom: 0">'.$nm_upt.' '.$instansi.'</a></p>
																									<p style="color: #999; margin-bottom: 0">'.$footer.'</p></td>
																								</tr>
																							</tbody>
																							</table>
																						</td>
																						</tr>
																					</tbody>
																					</table>
																				</body>
																				</html>';
																$mail->Body    = $body;
	
																if(!$mail->send()) {
																	sweetAlert($m,'error','Mailer Error: ',$mail->ErrorInfo) ;
																} else {
																	$db->query("INSERT INTO pengaduan VALUES ('$id','$nama_p','$email_p','$no_hp_p','$j_peng','$slug','$peng','P','TR','NULL','$adm_peng',NOW(),'$ket_peng',NULL,NOW(),NOW(),NULL)");
																	sweetAlert('p/pengaduan/'.$slug, 'sukses', 'Berhasil !', 'Data Pengaduan dengan (ID : '.$id.') Berhasil diinput.');
																}
															}
													}
												?>
                                    </div>

                                </div>
                            </div>
                            <?php 
                                        }
									}
									?>
                        </div>
                    </center>

                </div>
            </div>

            <!-- Wave Shape
					============================================= -->
            <div class="wave-bottom"
                style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);">
            </div>

        </div>

        <!-- Instructors Section
				============================================= -->
        <div class="section bg-transparent">
            <div class="container">
                <?php 
                $jreg = $db->query("SELECT * FROM regu")->num_rows;
                ?>
                <div class="heading-block border-bottom-0 mb-5 center">
                    <h3>Daftar Regu UPT Perparkiran</h3>
                    <span>Regu dibawah ini merupakan tim penyelesaian yang telah disusun oleh Kepala UPT Perparkiran
                        Dinas Perhubungan Kota Pekanbaru yang terdiri dari <?= $jreg; ?> (<?= penyebut($jreg); ?>) Regu,
                        yaitu :</span>
                </div>

                <div class="clear"></div>

                <div class="row">

                    <!-- Instructors 1
							============================================= -->
                    <?php 
							$regu = $db->query("SELECT * FROM regu a, users b WHERE a.karu=b.id ORDER BY nm_regu ASC");
							while($r=$regu->fetch_assoc()) :
								if (empty($r['f_regu'])) {
									$f_regu = 'default.png';
								} else {
									$f_regu = $r['f_regu'];
								}
							?>
                    <div class="col-lg-4 col-sm-12 mb-8">
                        <div
                            class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                            <div class="fbox-icon">
                                <i><img src="<?= base_url(); ?>_uploads/f_regu/<?= $f_regu; ?>"
                                        class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
                            </div>
                            <div class="fbox-content">
                                <h3 class="mb-4 nott ls0"><a href="#" class="text-dark">Regu
                                        <?= $r['nm_regu']; ?></a><br><small class="subtitle nott color">Karu :
                                        <?= $r['nama']; ?></small></h3>

                                <p class="text-dark"><strong><?= $jum_a; ?></strong> Anggota :</p>
                                <?php 
										$ang = $db->query("SELECT * FROM users WHERE level='2' AND regu='$r[id_regu]' ORDER BY nama ASC");
										// $jum_a=$ang->num_rows;
										while ($a=$ang->fetch_assoc()) {
											echo $a['nama'].' <br>';
										}
										?>
                                <hr>
                                <!-- <p class="text-dark mt-0"><strong>23</strong> Courses</p> -->
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <!-- Section Courses
				============================================= -->
        <div class="section topmargin-lg parallax"
            style="padding: 80px 0 60px; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/icon-pattern.jpg'); background-size: auto; background-repeat: repeat"
            data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -500px;">

            <!-- Wave Shape Divider
					============================================= -->
            <div class="wave-top"
                style="position: absolute; top: 0; left: 0; width: 100%; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x;">
            </div>

            <div class="container">

                <div class="heading-block border-bottom-0 mb-5 center">
                    <h3>Daftar Pengaduan</h3>
                    <span>Dibawah ini merupakan pengaduan masyarakat tentang perparkiran yang ada di Kota
                        Pekanbaru.</span>
                </div>

                <div class="clear"></div>

                <div class="row mt-2">

                    <!-- Course 1
							============================================= -->
                    <?php 
							$pengaduan = $db->query("SELECT * FROM pengaduan a, d_pengaduan b WHERE a.id_peng=b.id_peng AND a.sifat='TR' AND a.status!='X' GROUP BY a.id_peng ORDER BY tgl_peng DESC LIMIT 6");
							while($d=$pengaduan->fetch_assoc()) :
								$rate = $db->query("SELECT * FROM rate_pengaduan WHERE id_peng='$d[id_peng]'")->fetch_assoc();
									if ($rate['rate_peng']=='5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <span>5.0</span></div>';
                                    } elseif ($rate['rate_peng']=='4.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <span>4.5</span></div>';
                                    } elseif ($rate['rate_peng']=='4') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <span>4.0</span></div>';
                                    } elseif ($rate['rate_peng']=='3.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <span>3.5</span></div>';
                                    } elseif ($rate['rate_peng']=='3') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>3.0</span></div>';
                                    } elseif ($rate['rate_peng']=='2.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>2.5</span></div>';
                                    } elseif ($rate['rate_peng']=='2') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>2.0</span></div>';
                                    } elseif ($rate['rate_peng']=='1.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>1.5</span></div>';
                                    } elseif ($rate['rate_peng']=='1') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>1.0</span></div>';
                                    } elseif ($rate['rate_peng']=='0.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>0.5</span></div>';
                                    } elseif ($rate['rate_peng']=='0') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>0.0</span></div>';
                                    }
								if ($d['status']=='P') {
									$tr 	= 	'';
									$st 	=	'<div class="badge alert-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Proses Pengecekan Oleh Admin</div>';
									$star 	= 	'';
								} else if ($d['status']=='T') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
													<td valign="top" data-bs-toggle="tooltip" data-bs-placement="top" title="Tim Penyelesaian"><i class="icon-users"></i></td>
													<td>Regu '.$regu['nm_regu'].'</td>
												</tr>';
									$st 	=	'<div class="badge alert-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Diteruskan</div>
												 <div class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Diteruskan Pada">'.tgl_indo_singkat(date('Y-m-d', strtotime($d['updated_at']))).' | '.date('H:i:s', strtotime($d['updated_at'])).' WIB</div>';
									$star 	= 	'';
								} else if ($d['status']=='S') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$sel	= $db->query("SELECT * FROM pengaduan a, selesai b WHERE a.id_peng=b.id_peng AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
													<td valign="top" data-bs-toggle="tooltip" data-bs-placement="top" title="Tim Penyelesaian"><i class="icon-users"></i></td>
													<td>Regu '.$regu['nm_regu'].'</td>
												</tr>';
									$st 	=	'<div class="badge alert-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Selesai</div>
												 <div class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Selesai Pada">'.tgl_indo_singkat(date('Y-m-d', strtotime($sel['tgl_sel']))).' | '.date('H:i:s', strtotime($sel['tgl_sel'])).' WIB</div>';
									$star 	= 	$stars;
								}
							?>
                    <div class="col-md-4 mb-5">
                        <div class="card course-card hover-effect border-0">
                            <!-- <a href="#"><img class="card-img-top"
                                    src="<?= base_url(); ?>_uploads/f_peng/<?= $d['n_d_peng']; ?>"
                                    alt="<?= $d['n_d_peng']; ?>"></a> -->
                            <div class="card-body">
                                <h4 class="card-title fw-bold mb-2"><a
                                        href="<?= base_url(); ?>p/pengaduan/<?= $d['slug']; ?>"><?= $d['j_peng']; ?></a>
                                </h4>
                                <p class="mb-2 card-title-sub text-uppercase fw-normal ls1"><a href="#"
                                        class="text-black-50"><?= r_nama($d['nama_p']); ?></a></p>
                                <!-- <div class="rating-stars mb-2"><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i> <span>4.7</span></div> -->
                                <?= $star; ?>
                                <hr>
                                <p class="card-text text-black-50 mb-1">
                                    <center>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th width="30px"></th>
                                                    <!-- <th width="15px"></th> -->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Hari, Tanggal"><i class="icon-calendar2"></i> </td>
                                                    <!-- <td valign="top"><b>|</b></td> -->
                                                    <td><?= hari(date('D', strtotime($d['tgl_peng']))).', '.tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Pukul"><i class="icon-clock2"></i></td>
                                                    <!-- <td valign="top"><b>|</b></td> -->
                                                    <td> <?= date('H:i:s', strtotime($d['tgl_peng'])); ?> WIB</td>
                                                </tr>
                                                <?= $tr; ?>
                                            </tbody>
                                        </table>
                                    </center>
                                </p>
                            </div>
                            <div
                                class="card-footer py-3 d-flex justify-content-between align-items-center bg-white text-muted">
                                <?= $st; ?>
                                <!-- <a href="#" class="text-dark position-relative"><i class="icon-line2-user"></i> <span class="author-number">1</span></a> -->
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <center><a href="<?= base_url(); ?>p/pengaduan/all"
                        class="button button-rounded button-reveal button-large button-border text-end"><i
                            class="icon-arrow-circle-right"></i><span>Tampilkan Seluruh Pengaduan</span></a></center>
            </div>

            <!-- Wave Shape Divider - Bottom
					============================================= -->
            <div class="wave-bottom"
                style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('<?= base_url(); ?>assets/web/demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);">
            </div>
        </div>

        <div class="container">
            <div class="fancy-title title-center title-border topmargin">
                <h4>Galeri Laporan Selesai</h4>
            </div>
            <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-pagi="false"
                data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
                <?php
                            $gambar = $db->query("SELECT * FROM selesai a, d_selesai b WHERE a.id_sel=b.id_sel ORDER BY RAND() LIMIT 10");
                            while ($g=$gambar->fetch_assoc()) :
                            ?>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="<?= base_url(); ?>_uploads/f_sel/<?= $g['n_d_sel']; ?>"
                                alt="<?= $g['n_d_peng']; ?>">
                        </a>
                        <div class="bg-overlay">
                            <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                <a href="<?= base_url(); ?>_uploads/f_sel/<?= $g['n_d_sel']; ?>"
                                    class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall"
                                    data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"
                                    data-lightbox="image"><i class="icon-line-plus"></i></a>
                                <a href="<?= base_url(); ?>p/pengaduan/<?= $g['slug']; ?>"
                                    class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall"
                                    data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"><i
                                        class="icon-line-ellipsis"></i></a>
                            </div>
                            <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                        </div>
                    </div>
                    <!-- <div class="portfolio-desc">
									<h3><a href="portfolio-single.html">Open Imagination</a></h3>
									<span><a href="#">Media</a>, <a href="#">Icons</a></span>
								</div> -->
                </div>
                <?php
                            endwhile;
                            ?>

            </div>
        </div>
    </div>
</section><!-- #content end -->
<?php break; ?>
<?php case 'all' : 
    $pg = $_GET['page'];
    if (empty($pg)) {
        $pgt='Halaman Pertama';
    } elseif($pg=='1'){
        $pgt='Halaman Pertama';
    } else {
        $pgt='Halaman Ke '.penyebut($pg);
    }
    ?>
<title>Daftar isi Berita | <?= $title; ?></title>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
        <h1 class="titular-title fw-normal center font-secondary fst-normal">Daftar Pengaduan</h1>
					<p class="titular-sub-title text-primary fw-bold center mb-5"><?= $pgt; ?></p>
            <div class="row gutter-40 col-mb-80">
                <!-- Post Content
						============================================= -->
                <div class="postcontent col-lg-12">
                    <div class="row posts-md col-mb-30">
                            <?php 
                                $batas = 9;
                                $halaman = isset($_GET['page'])?(int)$_GET['page'] : 1;
                                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                
                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                $data1 = $db->query("SELECT * FROM pengaduan WHERE sifat='TR' AND status!='X'");
                                $jumlah_data = $data1->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);

                                $data = $db->query("SELECT * FROM pengaduan a, d_pengaduan b WHERE a.id_peng=b.id_peng AND a.sifat='TR' AND a.status!='X' GROUP BY a.id_peng ORDER BY a.tgl_peng DESC LIMIT $halaman_awal, $batas");
                                $nomor = $halaman_awal+1;
                                // $data = $db->query("SELECT *,a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.publish='Y' ORDER BY tgl ASC")->fetch_assoc();
                                while ($d=$data->fetch_assoc()) :
                                    $rate = $db->query("SELECT * FROM rate_pengaduan WHERE id_peng='$d[id_peng]'")->fetch_assoc();
									if ($rate['rate_peng']=='5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <span>5.0</span></div>';
                                    } elseif ($rate['rate_peng']=='4.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <span>4.5</span></div>';
                                    } elseif ($rate['rate_peng']=='4') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <span>4.0</span></div>';
                                    } elseif ($rate['rate_peng']=='3.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <span>3.5</span></div>';
                                    } elseif ($rate['rate_peng']=='3') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>3.0</span></div>';
                                    } elseif ($rate['rate_peng']=='2.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>2.5</span></div>';
                                    } elseif ($rate['rate_peng']=='2') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>2.0</span></div>';
                                    } elseif ($rate['rate_peng']=='1.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>1.5</span></div>';
                                    } elseif ($rate['rate_peng']=='1') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>1.0</span></div>';
                                    } elseif ($rate['rate_peng']=='0.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>0.5</span></div>';
                                    } elseif ($rate['rate_peng']=='0') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>0.0</span></div>';
                                    }
								if ($d['status']=='P') {
									$tr 	= 	'';
									$st 	=	'<div class="badge alert-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Proses Pengecekan Oleh Admin</div>';
									$star 	= 	'';
								} else if ($d['status']=='T') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
													<td valign="top" data-bs-toggle="tooltip" data-bs-placement="top" title="Tim Penyelesaian"><i class="icon-users"></i></td>
													<td>Regu '.$regu['nm_regu'].'</td>
												</tr>';
									$st 	=	'<div class="badge alert-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Diteruskan</div>
												 <div class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Diteruskan Pada">'.tgl_indo_singkat(date('Y-m-d', strtotime($d['updated_at']))).' | '.date('H:i:s', strtotime($d['updated_at'])).' WIB</div>';
									$star 	= 	'';
								} else if ($d['status']=='S') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$sel	= $db->query("SELECT * FROM pengaduan a, selesai b WHERE a.id_peng=b.id_peng AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
													<td valign="top" data-bs-toggle="tooltip" data-bs-placement="top" title="Tim Penyelesaian"><i class="icon-users"></i></td>
													<td>Regu '.$regu['nm_regu'].'</td>
												</tr>';
									$st 	=	'<div class="badge alert-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Selesai</div>
												 <div class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Selesai Pada">'.tgl_indo_singkat(date('Y-m-d', strtotime($sel['tgl_sel']))).' | '.date('H:i:s', strtotime($sel['tgl_sel'])).' WIB</div>';
									$star 	= 	$stars;
								}
							?>
                    <div class="col-md-4 mb-5" >
                        <div class="card course-card hover-effect border-0" style="background-color: whitesmoke;">
                            <!-- <a href="#"><img class="card-img-top"
                                    src="<?= base_url(); ?>_uploads/f_peng/<?= $d['n_d_peng']; ?>"
                                    alt="<?= $d['n_d_peng']; ?>"></a> -->
                            <div class="card-body">
                                <h4 class="card-title fw-bold mb-2"><a
                                        href="<?= base_url(); ?>p/pengaduan/<?= $d['slug']; ?>"><?= $d['j_peng']; ?></a>
                                </h4>
                                <p class="mb-2 card-title-sub text-uppercase fw-normal ls1"><a href="#"
                                        class="text-black-50"><?= r_nama($d['nama_p']); ?></a></p>
                                <!-- <div class="rating-stars mb-2"><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i> <span>4.7</span></div> -->
                                <?= $star; ?>
                                <hr>
                                <p class="card-text text-black-50 mb-1">
                                    <center>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th width="30px"></th>
                                                    <!-- <th width="15px"></th> -->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Hari, Tanggal"><i class="icon-calendar2"></i> </td>
                                                    <!-- <td valign="top"><b>|</b></td> -->
                                                    <td><?= hari(date('D', strtotime($d['tgl_peng']))).', '.tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))) ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Pukul"><i class="icon-clock2"></i></td>
                                                    <!-- <td valign="top"><b>|</b></td> -->
                                                    <td> <?= date('H:i:s', strtotime($d['tgl_peng'])); ?> WIB</td>
                                                </tr>
                                                <?= $tr; ?>
                                            </tbody>
                                        </table>
                                    </center>
                                </p>
                            </div>
                            <div
                                class="card-footer py-3 d-flex justify-content-between align-items-center bg-white text-muted" style="background-color: whitesmoke;">
                                <?= $st; ?>
                                <!-- <a href="#" class="text-dark position-relative"><i class="icon-line2-user"></i> <span class="author-number">1</span></a> -->
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                        <nav>
                                    <ul class="pagination justify-content-center" <?= $hid; ?><?= $hden; ?>>
                                        <li class="page-item">
                                            <a class="page-link"
                                                <?php if($halaman > 1){ echo "href='".base_url()."p/pengaduan/all/page/$previous'"; } ?>>Previous</a>
                                        </li>
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                        ?>
                                        <li class="page-item"><a class="page-link"
                                                href="<?= base_url(); ?>p/pengaduan/all/page/<?php echo $x ?>"><?php echo $x; ?></a>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link"
                                                <?php if($halaman < $total_halaman) { echo "href='".base_url()."p/pengaduan/all/page/$next'"; } ?>>Next</a>
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
<?php case 'details-pengaduan' :
    $id=$_GET['id'];
$d = $db->query("SELECT * FROM pengaduan WHERE slug='$id'")->fetch_assoc();
$u = $db->query("SELECT * FROM users WHERE id='$d[adm_peng]'")->fetch_assoc();
if (empty($u['f_usr'])) {
    $f_usr = 'default.png';
} else {
    $f_usr = $u['f_usr'];
}
if (empty($d['slug'])) {
    sweetAlert('', 'error', 'Data tidak ditemukan!', 'Maaf, alamat url dengan key '.base_url().'p/pengaduan/'.$id.' tidak
ditemukan.');
} else {
    $ip = ip_user();
    $os = os_user();
    $br = browser_user();
    $date = date('Y-m-d');
    $cek = $db->query("SELECT * FROM views_pengaduan WHERE id_peng='$d[id_peng]' AND time='$date'");
    $jumlah = $cek->num_rows;
    if ($jumlah=='0') {
        $db->query("INSERT INTO views_pengaduan VALUES ('$d[id_peng]','$date','1')");
    } else {
        $db->query("UPDATE views_pengaduan SET jumlah=jumlah+1 WHERE id_peng='$d[id_peng]' AND time='$date'");
    }
    $db->query("INSERT INTO session_view_pengaduan VALUES ('$d[id_peng]','$ip','$os','$br',NOW())");

    $views = $db->query("SELECT * FROM views_pengaduan WHERE id_peng='$d[id_peng]'");
    while ($vb=$views->fetch_assoc()) {
        $i++;
        $vba[$i]=$vb['jumlah'];
    }
    $tvb=array_sum($vba);
    
    $rate = $db->query("SELECT * FROM rate_pengaduan WHERE id_peng='$d[id_peng]'")->fetch_assoc();
									if ($rate['rate_peng']=='5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <span>5.0</span></div>';
                                    } elseif ($rate['rate_peng']=='4.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <span>4.5</span></div>';
                                    } elseif ($rate['rate_peng']=='4') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <span>4.0</span></div>';
                                    } elseif ($rate['rate_peng']=='3.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <span>3.5</span></div>';
                                    } elseif ($rate['rate_peng']=='3') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>3.0</span></div>';
                                    } elseif ($rate['rate_peng']=='2.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>2.5</span></div>';
                                    } elseif ($rate['rate_peng']=='2') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>2.0</span></div>';
                                    } elseif ($rate['rate_peng']=='1.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>1.5</span></div>';
                                    } elseif ($rate['rate_peng']=='1') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>1.0</span></div>';
                                    } elseif ($rate['rate_peng']=='0.5') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>0.5</span></div>';
                                    } elseif ($rate['rate_peng']=='0') {
                                        $stars = '<div class="rating-stars mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Rating"><i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <span>0.0</span></div>';
                                    }
								if ($d['status']=='P') {
									$tr 	= 	'';
									$st 	=	'<div class="badge alert-primary">Proses Pengecekan Oleh Admin</div>';
									$star 	= 	'';
                                    $col    =   'col-lg-12';
                                    $colhide=   'hidden';
								} else if ($d['status']=='T') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
													<td valign="top"><b>Tim Penyelesaian</b></td>
													<td valign="top">:</td>
													<td>Regu '.$regu['nm_regu'].'</td>
												</tr>';
									$st 	=	'<div class="badge alert-warning">Diteruskan</div>
												 <div class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Diteruskan Pada">'. hari(date('D', strtotime($d['tgl_teruskan']))) .', '.tgl_indo_singkat(date('Y-m-d', strtotime($d['tgl_teruskan']))).' | '.date('H:i:s', strtotime($d['tgl_teruskan'])).' WIB</div>';
									$star 	= 	'';
                                    $col    =   'col-lg-12';
                                    $colhide=   'hidden';
                                    
								} else if ($d['status']=='X') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
                                                <td valign="top">Alasan Penolakan</td>
                                                <td valign="top">:</td>
                                                <td>Regu '.$d['ket_peng'].'</td>
                                            </tr>';
									$st 	=	'<div class="badge alert-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Pengaduan">Ditolak</div>';
									$star 	= 	'';
                                    $col    =   'col-lg-12';
                                    $colhide=   'hidden';

								} else if ($d['status']=='S') {
									$regu 	= $db->query("SELECT * FROM pengaduan a, regu b WHERE a.regu=b.id_regu AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$sel	= $db->query("SELECT * FROM pengaduan a, selesai b WHERE a.id_peng=b.id_peng AND a.id_peng='$d[id_peng]'")->fetch_assoc();
									$tr 	= 	'<tr>
													<td valign="top"><b>Tim Penyelesaian</b></td>
													<td valign="top"><b>:</b></td>
													<td>Regu '.$regu['nm_regu'].'</td>
												</tr>';
									$st 	=	'<div class="badge alert-success">Selesai</div>
												 <div class="badge alert-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Selesai Pada">'. hari(date('D', strtotime('tgl_peng'))) .', '.tgl_indo_singkat(date('Y-m-d', strtotime($sel['tgl_sel']))).' | '.date('H:i:s', strtotime($sel['tgl_sel'])).' WIB</div>';
									$star 	= 	$stars;
                                    $col    =   'col-lg-6';
                                    $colhidden=  'hidden';

								}
                                ?>
<title><?= $d['j_peng']; ?> | <?= $title; ?></title>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row gutter-40 col-mb-80">
                <!-- Post Content
						============================================= -->
                        <div class="entry-title">
                                <h2><?= $d['j_peng']; ?></h2> <small><?= $stars; ?></small>
                            </div><!-- .entry-title end -->
                            <!-- Entry Meta
									============================================= -->
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i>
                                        <?= tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))); ?></li>
                                    <li><a href="#"><i class="icon-user"></i> <?= r_nama($u['nama']); ?></a></li>
                                    
                                    
                                    <li><a href="#"><i class="icon-eye"></i> <?= $tvb; ?></a></li>
                                    <li><a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                                            class="twitter-share-button" data-show-count="true">Tweet</a>
                                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
                                        </script>
                                    </li>
                                </ul>
                            </div><!-- .entry-meta end -->
                <div class="postcontent col-lg-6">
                    <div class="mb-0 card course-card hover-effect border-0">
                        <div class="card-body">
                            <div class="entry clearfix">
                                <div class="fancy-title title-border">
                                            <h5><i class="icon-laptop1"></i> Laporan Pengaduan</h5>
                                        </div>
                                    <!-- Entry Title
                                            ============================================= -->
                                    

                                    <!-- Entry Image
                                            ============================================= -->
                                    <!-- <div class="entry-image">
                                        <a href="#"><img
                                                src="<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>"
                                                alt="<?= $d['sampul']; ?>"></a>
                                        <small style="color: #b8b9b8;">Gambar : <?= $d['c_sampul']; ?></small>
                                    </div> -->

                                    <!-- Entry Content
                                            ============================================= -->
                                    <div class="entry-content mt-0" style="text-align: justify;">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th width="130px"></th>
                                                    <th width="15px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><b>Judul</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td><?= $d['j_peng']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Isi Pengaduan</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td><?= $d['peng']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Waktu</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td> <?= hari(date('D', strtotime($d['tgl_peng']))).', '.tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))).' | '.date('H:i:s', strtotime($d['tgl_peng'])); ?> WIB
                                                    </td>
                                                </tr>
                                                <?= $tr; ?>
                                                <tr>
                                                    <td valign="top"><b>Status</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td> <?= $st; ?>
                                                    </td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                        <div class="fancy-title title-border" <?= $colhide; ?>>
                                            <h5><i class="icon-quote-left"></i> Tanggapan</h5>
                                        </div>
                                        <blockquote <?= $colhide; ?>>
                                        <?php 
                                        if (empty($rate['komen'])) {
                                            echo "<p>--belum ada tanggapan--</p>";
                                        } else {
                                            echo "<p>".$rate['komen']."</p>";
                                        }
                                        ?>
                                        
                                        <footer class="blockquote-footer"><?=r_nama($u['nama']); ?></footer>
                                    </blockquote>
                                    </div>
                                </div><!-- .entry end -->
                                    <div class="fancy-title title-border" <?= $colhide; ?>>
                                        <h5><i class="icon-camera3"></i> Bukti Foto</h5>
                                    </div>

                                    <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery" <?= $colhide; ?>>

                                        <?php
                                            $gal = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$d[id_peng]' AND x_peng!='mp4' ORDER BY RAND()");
                                            while ($g=$gal->fetch_assoc()) :
                                        ?>
                                        <a class="grid-item"
                                            href="<?= base_url() ?>_uploads/f_peng/<?= $g['n_d_peng']; ?>"
                                            data-lightbox="gallery-item">
                                            <div class="grid-inner">
                                                <img src="<?= base_url() ?>_uploads/f_peng/<?= $g['n_d_peng']; ?>"
                                                    alt="<?= $g['n_d_peng']; ?>">
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
                                    <?php 
                                    $cek_video = $db->query("SELECT * FROM d_pengaduan WHERE x_peng='mp4' AND id_peng='$d[id_peng]'")->fetch_assoc();
                                    if (empty($cek_video)) {
                                        # code...
                                    } else {
                                        ?>
                                    <br>
                                    <div class="fancy-title title-border" <?= $colhide; ?>>
                                        <h5><i class="icon-play-sign"></i> Bukti Video</h5>
                                    </div>

                                    <div class="col-lg-12" <?= $colhide; ?>>
                                        <div class="card">
                                            <div class="row">
                                                <?php 
                                                    $dokumen = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$d[id_peng]'");
                                                    $no=1;
                                                    while($dd=$dokumen->fetch_assoc()) :
                                                    if ($dd['x_peng']=='mp4') {
                                                ?>
                                                <div class="col-lg-6">
                                                    <div class="card-body">
                                                        <h6>Video <?= $no++; ?></h6>
                                                        <div class="video-container">
                                                            <video class="afterglow" id="myvideo" width="640" height="360"
                                                                poster="<?= base_url(); ?>_uploads/f_giat/default.jpg">
                                                                <source type="video/mp4"
                                                                    src="<?= base_url(); ?>_uploads/v_peng/<?= $dd['n_d_peng']; ?>"
                                                                    data-quality="sd" />
                                                            </video>
                                                            <!-- <video id="my-video" class="video-js vjs-theme-forest" controls preload="auto"
                                                                width="250"
                                                                poster="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                                                data-setup="{}">
                                                                <source src="<?= base_url(); ?>_uploads/v_giat/<?= $dd['n_d_giat']; ?>"
                                                                    type="video/mp4" />
                                                                <p class="vjs-no-js">
                                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                                    web browser that
                                                                    <a href="https://videojs.com/html5-video-support/"
                                                                        target="_blank">supports HTML5 video</a>
                                                                </p>
                                                            </video> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php endwhile ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    } ?>
                            </div>
                            
                    </div>
                </div><!-- .postcontent end -->

                <!-- Sidebar
						============================================= -->
                <div class="sidebar col-lg-6">
                    <div class="card course-card hover-effect border-0">
                        <div class="card-body">
                                    <div class="line d-block d-lg-none"></div>
                                    <div class="fancy-title title-border" <?= $colhide; ?>>
                                            <h5><i class="icon-hands-helping"></i> Laporan Penyelesaian</h5>
                                        </div>
                                    <?php 
                                    $ds = $db->query("SELECT * FROM selesai WHERE id_peng='$d[id_peng]'")->fetch_assoc();
                                    ?>
                                    <!-- Entry Content
                                            ============================================= -->
                                    <div class="entry-content mt-0" style="text-align: justify;" <?= $colhide; ?>>
                                    <!-- <blockquote >
                                        <?= $ds['ket_sel']; ?>
                                        <footer class="blockquote-footer">Selesai Pada </footer>
                                    </blockquote>     -->
                                    <table>
                                            <thead>
                                                <tr>
                                                    <th width="130px"></th>
                                                    <th width="15px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><b>Keterangan</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td><?= $ds['ket_sel']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Waktu</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td> <?= hari(date('D', strtotime($ds['tgl_sel']))).', '.tgl_indo(date('Y-m-d', strtotime($ds['tgl_sel']))).' | '.date('H:i:s', strtotime($ds['tgl_sel'])); ?> WIB
                                                    </td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="fancy-title title-border" <?= $colhide; ?>>
                                        <h5><i class="icon-camera3"></i> Dokumentasi Foto</h5>
                                    </div>

                                    <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery" <?= $colhide; ?>>

                                        <?php
                                            $gale = $db->query("SELECT * FROM d_selesai WHERE id_sel='$ds[id_sel]' AND x_sel!='mp4' ORDER BY RAND()");
                                            while ($gs=$gale->fetch_assoc()) :
                                        ?>
                                        <a class="grid-item"
                                            href="<?= base_url() ?>_uploads/f_sel/<?= $gs['n_d_sel']; ?>"
                                            data-lightbox="gallery-item">
                                            <div class="grid-inner">
                                                <img src="<?= base_url() ?>_uploads/f_sel/<?= $gs['n_d_sel']; ?>"
                                                    alt="<?= $gs['n_d_sel']; ?>">
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
                                    <?php 
                                    $cek_videos = $db->query("SELECT * FROM d_selesai WHERE x_sel='mp4' AND id_sel='$ds[id_sel]'")->fetch_assoc();
                                    if (empty($cek_videos)) {
                                        # code...
                                    } else {
                                        ?>
                                    <br>
                                    <div class="fancy-title title-border" <?= $colhide; ?>>
                                        <h5><i class="icon-play-sign"></i> Dokumentasi Video</h5>
                                    </div>

                                    <div class="col-lg-12" <?= $colhide; ?>>
                                        <div class="card">
                                            <div class="row">
                                                <?php 
                                                    $dokumens = $db->query("SELECT * FROM d_selesai WHERE id_sel='$ds[id_sel]'");
                                                    $no=1;
                                                    while($dds=$dokumens->fetch_assoc()) :
                                                    if ($dds['x_sel']=='mp4') {
                                                ?>
                                                <div class="col-lg-6">
                                                    <div class="card-body">
                                                        <h6>Video <?= $no++; ?></h6>
                                                        <div class="video-container">
                                                            <video class="afterglow" id="myvideo" width="640" height="360"
                                                                poster="<?= base_url(); ?>_uploads/f_giat/default.jpg">
                                                                <source type="video/mp4"
                                                                    src="<?= base_url(); ?>_uploads/v_sel/<?= $dds['n_d_sel']; ?>"
                                                                    data-quality="sd" />
                                                            </video>
                                                            <!-- <video id="my-video" class="video-js vjs-theme-forest" controls preload="auto"
                                                                width="250"
                                                                poster="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                                                data-setup="{}">
                                                                <source src="<?= base_url(); ?>_uploads/v_giat/<?= $dd['n_d_giat']; ?>"
                                                                    type="video/mp4" />
                                                                <p class="vjs-no-js">
                                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                                    web browser that
                                                                    <a href="https://videojs.com/html5-video-support/"
                                                                        target="_blank">supports HTML5 video</a>
                                                                </p>
                                                            </video> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php endwhile ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    } ?>
                                    <!-- Hiden kalau Selesai -->
                                    <div class="fancy-title title-border" <?= $colhidden; ?>>
                                        <h5><i class="icon-camera3"></i> Bukti Foto</h5>
                                    </div>

                                    <div class="masonry-thumbs grid-container grid-6" data-big="5" data-lightbox="gallery" <?= $colhidden; ?>>

                                        <?php
                                            $gal = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$d[id_peng]' AND x_peng!='mp4' ORDER BY RAND()");
                                            while ($g=$gal->fetch_assoc()) :
                                        ?>
                                        <a class="grid-item"
                                            href="<?= base_url() ?>_uploads/f_peng/<?= $g['n_d_peng']; ?>"
                                            data-lightbox="gallery-item">
                                            <div class="grid-inner">
                                                <img src="<?= base_url() ?>_uploads/f_peng/<?= $g['n_d_peng']; ?>"
                                                    alt="<?= $g['n_d_peng']; ?>">
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
                                    <?php 
                                    $cek_video = $db->query("SELECT * FROM d_pengaduan WHERE x_peng='mp4' AND id_peng='$d[id_peng]'")->fetch_assoc();
                                    if (empty($cek_video)) {
                                        # code...
                                    } else {
                                        ?>
                                    <br>
                                    <div class="fancy-title title-border" <?= $colhidden; ?>>
                                        <h5><i class="icon-play-sign"></i> Bukti Video</h5>
                                    </div>

                                    <div class="col-lg-12" <?= $colhidden; ?>>
                                        <div class="card">
                                            <div class="row">
                                                <?php 
                                                    $dokumen = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$d[id_peng]'");
                                                    $no=1;
                                                    while($dd=$dokumen->fetch_assoc()) :
                                                    if ($dd['x_peng']=='mp4') {
                                                ?>
                                                <div class="col-lg-6">
                                                    <div class="card-body">
                                                        <h6>Video <?= $no++; ?></h6>
                                                        <div class="video-container">
                                                            <video class="afterglow" id="myvideo" width="640" height="360"
                                                                poster="<?= base_url(); ?>_uploads/f_giat/default.jpg">
                                                                <source type="video/mp4"
                                                                    src="<?= base_url(); ?>_uploads/v_peng/<?= $dd['n_d_peng']; ?>"
                                                                    data-quality="sd" />
                                                            </video>
                                                            <!-- <video id="my-video" class="video-js vjs-theme-forest" controls preload="auto"
                                                                width="250"
                                                                poster="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                                                data-setup="{}">
                                                                <source src="<?= base_url(); ?>_uploads/v_giat/<?= $dd['n_d_giat']; ?>"
                                                                    type="video/mp4" />
                                                                <p class="vjs-no-js">
                                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                                    web browser that
                                                                    <a href="https://videojs.com/html5-video-support/"
                                                                        target="_blank">supports HTML5 video</a>
                                                                </p>
                                                            </video> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php endwhile ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    } ?>
                        </div>
                    </div>
                </div><!-- .sidebar end -->
                <!-- Post Single - Share
										============================================= -->
                                        <div class="si-share border-0 d-flex justify-content-between align-items-center">
                                    <span>Share on:</span>
                                    <div>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url(); ?>p/berita/<?= $id; ?>&t=<?= $d['j_blog']; ?>"
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Facebook"
                                            class="social-icon si-borderless si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="https://twitter.com/share?url=<?= base_url(); ?>p/berita/<?= $id; ?>&amp;text=<?= $d['j_blog']; ?>&amp;hashtags=<?= strtolower(nospace($nm_upt)); ?>"
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Twitter"
                                            class="social-icon si-borderless si-twitter">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="http://pinterest.com/pin/create/button/?url=<?= base_url(); ?>p/berita/<?= $id; ?>&media=<?= base_url(); ?>_uploads/blog/sampul/<?= $d['id_blog']; ?>/<?= $d['sampul']; ?>"
                                            onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Pinterest"
                                            class="social-icon si-borderless si-pinterest">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="whatsapp://send?text=<?= base_url(); ?>p/berita/<?= $id; ?>"
                                            data-action="share/whatsapp/share"
                                            onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Whatsapp"
                                            class="social-icon si-borderless si-whatsapp">
                                            <i class="icon-whatsapp"></i>
                                            <i class="icon-whatsapp"></i>
                                        </a>
                                        <a href="http://www.reddit.com/submit?url=<?= base_url(); ?>p/berita/<?= $id; ?>"
                                            onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Reddit"
                                            class="social-icon si-borderless si-reddit">
                                            <i class="icon-reddit"></i>
                                            <i class="icon-reddit"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= base_url(); ?>p/berita/<?= $id; ?>&t=<?= $d['j_blog']; ?>"
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Linkedin"
                                            class="social-icon si-borderless si-linkedin">
                                            <i class="icon-linkedin"></i>
                                            <i class="icon-linkedin"></i>
                                        </a>
                                        <a href="mailto:?subject=<?= $d['j_blog']; ?>&body=<?= base_url(); ?>p/berita/<?= $id; ?>"
                                            onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Share on Mail"
                                            class="social-icon si-borderless si-email3">
                                            <i class="icon-email3"></i>
                                            <i class="icon-email3"></i>
                                        </a>
                                    </div>
                                </div><!-- Post Single - Share End -->
            </div>
        </div>
    </div>
</section>
<?php
} ?>
<?php break; ?>
<?php  } ?>