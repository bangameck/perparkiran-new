<?php 
include '_func/identity.php';
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
<section id="slider" class="slider-element revslider-wrap" data-autoplay="7000" data-speed="650" data-loop="true">

			<div id="portfolio_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="nice-and-clean-projects" data-source="gallery" style="margin:0px auto;background:#2d3032;padding:0px;margin-top:0px;margin-bottom:0px;">
				<!-- START REVOLUTION SLIDER 5.4.7.2 fullwidth mode -->
				<div id="portfolio" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7.2">
					<ul>	<!-- SLIDE  -->
						<li data-index="rs-312" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="<?= base_url(); ?>_uploads/f_peng/<?= $pic1['n_d_peng']; ?>"  data-rotate="0"  data-saveperformance="off"  data-title="Wild" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
							<!-- MAIN IMAGE -->
							<img src="<?= base_url(); ?>_uploads/f_peng/<?= $pic1['n_d_peng']; ?>"  alt="<?= $pic1['n_d_peng']; ?>"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-312-layer-7"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 5;font-family:Open Sans;background-color:rgba(45,48,50,0.65);"> </div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption  "
								 id="slide-312-layer-1"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['top','top','top','top']" data-voffset="['80','80','50','50']"
											data-width="300"
								data-height="none"
								data-whitespace="normal"

								data-type="text"
								data-responsive_offset="off"
								data-responsive="off"
								data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power4.easeOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 6; min-width: 300px; max-width: 300px; white-space: normal; font-size: 35px; line-height: 35px; font-weight: 500; color: rgba(255,255,255,1);font-family:Poppins;cursor:pointer;"><?= $dt1['j_peng']; ?><br/><span style="font-size:17px;opacity:0.65;font-weight:400;">Oleh : <?=r_nama($dt1['nama_p']); ?></span> </div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-312-layer-10"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="2"
								data-height="75"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sY:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sY:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 7;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-312-layer-11"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="75"
								data-height="2"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sX:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sX:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 8;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 5 -->
							<a href="<?= base_url(); ?>p/pengaduan/<?= $dt1['id_peng']; ?>" class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-312-layer-8"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-312-layer-10","delay":""},{"event":"mouseenter","action":"startlayer","layer":"slide-312-layer-11","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-312-layer-10","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-312-layer-11","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-312-layer-1","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-312-layer-1","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-312-layer-7","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-312-layer-7","delay":""}]'
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);br:0 0 0 0;"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 9;font-family:Open Sans;cursor:pointer;"> </a>
						</li>
						<!-- SLIDE  -->
						<li data-index="rs-313" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="include/rs-plugin/demos/assets/images/100x50_carousel4.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
							<!-- MAIN IMAGE -->
							<img src="<?= base_url(); ?>_uploads/f_peng/<?= $pic2['n_d_peng']; ?>"  alt="<?= $pic2['n_d_peng']; ?>"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 6 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-313-layer-7"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 5;font-family:Open Sans;background-color:rgba(45,48,50,0.65);"> </div>

							<!-- LAYER NR. 7 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-313-layer-10"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="2"
								data-height="75"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sY:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sY:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 6;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 8 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-313-layer-11"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="75"
								data-height="2"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sX:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sX:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 7;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 9 -->
							<div class="tp-caption  "
								 id="slide-313-layer-14"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['top','top','top','top']" data-voffset="['80','80','50','50']"
											data-width="300"
								data-height="none"
								data-whitespace="normal"

								data-type="text"
								data-responsive_offset="off"
								data-responsive="off"
								data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power4.easeOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 8; min-width: 300px; max-width: 300px; white-space: normal; font-size: 35px; line-height: 35px; font-weight: 500; color: rgba(255,255,255,1);font-family:Poppins;cursor:pointer;">Winter Mountain Scene<br/><span style="font-size:17px;opacity:0.65;font-weight:400;">witness natures beauty</span> </div>

							<!-- LAYER NR. 10 -->
							<a href="#" class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-313-layer-8"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-313-layer-10","delay":""},{"event":"mouseenter","action":"startlayer","layer":"slide-313-layer-11","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-313-layer-10","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-313-layer-11","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-313-layer-14","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-313-layer-14","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-313-layer-7","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-313-layer-7","delay":""}]'
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);br:0 0 0 0;"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 9;font-family:Open Sans;cursor:pointer;"> </a>
						</li>
						<!-- SLIDE  -->
						<li data-index="rs-314" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="include/rs-plugin/demos/assets/images/100x50_carousel2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
							<!-- MAIN IMAGE -->
							<img src="<?= base_url(); ?>assets/web/include/rs-plugin/demos/assets/images/carousel2.jpg"  alt="Image"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 11 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-314-layer-7"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 5;font-family:Open Sans;background-color:rgba(45,48,50,0.65);"> </div>

							<!-- LAYER NR. 12 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-314-layer-10"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="2"
								data-height="75"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sY:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sY:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 6;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 13 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-314-layer-11"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="75"
								data-height="2"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sX:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sX:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 7;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 14 -->
							<div class="tp-caption  "
								 id="slide-314-layer-12"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['top','top','top','top']" data-voffset="['80','80','50','50']"
											data-width="300"
								data-height="none"
								data-whitespace="normal"

								data-type="text"
								data-responsive_offset="off"
								data-responsive="off"
								data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power4.easeOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 8; min-width: 300px; max-width: 300px; white-space: normal; font-size: 35px; line-height: 35px; font-weight: 500; color: rgba(255,255,255,1);font-family:Poppins;cursor:pointer;">Warm Sunset over Highway<br/><span style="font-size:17px;opacity:0.65;font-weight:400;">bathe in the light</span> </div>

							<!-- LAYER NR. 15 -->
							<a href="#" class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-314-layer-8"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-314-layer-10","delay":""},{"event":"mouseenter","action":"startlayer","layer":"slide-314-layer-11","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-314-layer-10","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-314-layer-11","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-314-layer-12","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-314-layer-12","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-314-layer-7","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-314-layer-7","delay":""}]'
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);br:0 0 0 0;"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 9;font-family:Open Sans;cursor:pointer;"> </a>
						</li>
						<!-- SLIDE  -->
						<li data-index="rs-315" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="include/rs-plugin/demos/assets/images/100x50_carousel5.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
							<!-- MAIN IMAGE -->
							<img src="<?= base_url(); ?>assets/web/include/rs-plugin/demos/assets/images/carousel5.jpg"  alt="Image"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 16 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-315-layer-7"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 5;font-family:Open Sans;background-color:rgba(45,48,50,0.65);"> </div>

							<!-- LAYER NR. 17 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-315-layer-10"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="2"
								data-height="75"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sY:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sY:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 6;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 18 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-315-layer-11"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="75"
								data-height="2"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sX:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sX:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 7;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 19 -->
							<div class="tp-caption  "
								 id="slide-315-layer-12"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['top','top','top','top']" data-voffset="['80','80','50','50']"
											data-width="300"
								data-height="none"
								data-whitespace="normal"

								data-type="text"
								data-responsive_offset="off"
								data-responsive="off"
								data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power4.easeOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 8; min-width: 300px; max-width: 300px; white-space: normal; font-size: 35px; line-height: 35px; font-weight: 500; color: rgba(255,255,255,1);font-family:Poppins;cursor:pointer;">Wearables<br/><span style="font-size:17px;opacity:0.65;font-weight:400;">new paradigm shift</span> </div>

							<!-- LAYER NR. 20 -->
							<a href="#" class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-315-layer-8"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-315-layer-10","delay":""},{"event":"mouseenter","action":"startlayer","layer":"slide-315-layer-11","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-315-layer-10","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-315-layer-11","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-315-layer-12","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-315-layer-12","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-315-layer-7","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-315-layer-7","delay":""}]'
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);br:0 0 0 0;"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 9;font-family:Open Sans;cursor:pointer;"> </a>
						</li>
						<!-- SLIDE  -->
						<li data-index="rs-316" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="include/rs-plugin/demos/assets/images/100x50_carousel7.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
							<!-- MAIN IMAGE -->
							<img src="<?= base_url(); ?>assets/web/include/rs-plugin/demos/assets/images/carousel7.jpg"  alt="Image"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 21 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-316-layer-7"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 5;font-family:Open Sans;background-color:rgba(45,48,50,0.65);"> </div>

							<!-- LAYER NR. 22 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-316-layer-10"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="2"
								data-height="75"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sY:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sY:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 6;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 23 -->
							<div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-316-layer-11"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="75"
								data-height="2"
								data-whitespace="nowrap"

								data-type="shape"
								data-responsive_offset="on"

								data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"sX:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":600,"frame":"999","to":"sX:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 7;font-family:Open Sans;background-color:rgba(255,255,255,1);"> </div>

							<!-- LAYER NR. 24 -->
							<div class="tp-caption  "
								 id="slide-316-layer-12"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['top','top','top','top']" data-voffset="['80','80','50','50']"
											data-width="300"
								data-height="none"
								data-whitespace="normal"

								data-type="text"
								data-responsive_offset="off"
								data-responsive="off"
								data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":1000,"frame":"999","to":"y:-50px;opacity:0;fb:10px;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power4.easeOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								data-lasttriggerstate="reset"
								style="z-index: 8; min-width: 300px; max-width: 300px; white-space: normal; font-size: 35px; line-height: 35px; font-weight: 500; color: rgba(255,255,255,1);font-family:Poppins;cursor:pointer;">Efficient Working<br/><span style="font-size:17px;opacity:0.65;font-weight:400;">with Slider Revolution</span> </div>

							<!-- LAYER NR. 25 -->
							<a href="#" class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"
								 id="slide-316-layer-8"
								 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
								 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
											data-width="full"
								data-height="full"
								data-whitespace="nowrap"

								data-type="shape"
								data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-316-layer-10","delay":""},{"event":"mouseenter","action":"startlayer","layer":"slide-316-layer-11","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-316-layer-10","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-316-layer-11","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-316-layer-12","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-316-layer-12","delay":""},{"event":"mouseenter","action":"stoplayer","layer":"slide-316-layer-7","delay":""},{"event":"mouseleave","action":"startlayer","layer":"slide-316-layer-7","delay":""}]'
								data-responsive_offset="on"

								data-frames='[{"delay":10,"speed":600,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":600,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255,255,255,1);br:0 0 0 0;"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"

								style="z-index: 9;font-family:Open Sans;cursor:pointer;"> </a>
						</li>
					</ul>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div><!-- END REVOLUTION SLIDER -->

		</section>