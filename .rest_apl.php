<?php 
include '_func/func.php';
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/OAuth.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/POP3.php';
require 'vendor/PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<?php template_apl('head') ?>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<!-- <div id="top-bar">
			<?php //template_apl('top-bar') ?>
		</div> -->
		<!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header" class="header-size-sm" data-sticky-shrink="false">
			<div class="container">
				<?php template_apl('head-logo') ?>
			</div>

			<div id="header-wrap" class="border-top border-f5">
				<div class="container">
					<div class="header-row justify-content-between">

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<?php template_apl('top-search') ?>
							<!-- #top-search end -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">
							<?php template_apl('primary-menu') ?>
						</nav><!-- #primary-menu end -->

						<?php template_apl('form-search') ?>

					</div>

				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<?php modul('web_page',$_GET['m']) ?>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="shape-divider" data-shape="cliff" data-height="150" data-outside="true" data-fill="#282828"></div>
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<?php template_apl('footer-widget') ?>
				<!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<?php template_apl('footer-cr') ?>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- javascript -->
	<?php template_apl('js') ?>

</body>
</html>