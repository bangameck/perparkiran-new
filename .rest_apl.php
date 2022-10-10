<?php 
include '_func/func.php';
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/OAuth.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/POP3.php';
require 'vendor/PHPMailer/src/SMTP.php';
// require 'vendor/autoload.php';
$time = date('Y-m-d');
$cek = $db->query("SELECT * FROM views_site WHERE time='$time'");
$jml = $cek->num_rows;
if ($jml == '0') {
    $db->query("INSERT INTO views_site VALUES ('$time','1')");
} else {
    $db->query("UPDATE views_site SET jumlah=jumlah+1 WHERE time='$time'");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php template_apl('head') ?>
</head>

<body class="stretched">
    <?php 
    if (isset($_SESSION['username'])) {
        echo '<div id="idletimeout">
        Kami memantau tidak adanya aktifitas dalam 20 menit, anda akan otomatis logout dalam
        <span><!-- countdown place holder --></span>&nbsp;detik.
        <a id="idletimeout-resume" href="">klik disini untuk memperpanjang waktu session</a
      >.
    </div>' ;
    }
    ?>
    <!-- loader -->
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url(); ?>assets/adm/images/logoparkir.gif" width="80">
            <script language="JavaScript">
            var text = "Please Wait...";
            var delay = 100;
            var currentChar = 1;
            var destination = "[none]";

            function type() {
                //if (document.all)
                {
                    var dest = document.getElementById(destination);
                    if (dest) // && dest.innerHTML)
                    {
                        dest.innerHTML = text.substr(0, currentChar) + "<blink>_</blink>";
                        currentChar++;
                        if (currentChar > text.length) {
                            currentChar = 1;
                            setTimeout("type()", 500);
                        } else {
                            setTimeout("type()", delay);
                        }
                    }
                }
            }

            function startTyping(textParam, delayParam, destinationParam) {
                text = textParam;
                delay = delayParam;
                currentChar = 1;
                destination = destinationParam;
                type();
            }
            </script> <b>
                <div 0px="" 12px="" arial="" color:="" ff0000="" font:="" id="textDestination" margin:=""
                    style="background-color: none;"></div>
            </b>
            <script language="JavaScript">
            javascript: startTyping(text, 10, "textDestination");
            </script>
        </div>
    </div>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Top Bar
		============================================= -->
        <div id="top-bar" class="transparent-topbar">
            <?php template_apl('top-bar') ?>
        </div>
        <!-- #top-bar end -->

        <!-- Header
		============================================= -->
        <header id="header" class="transparent-header header-size-md">
            <div class="container">
                <?php template_apl('head-ads') ?>
            </div>

            <div id="header-wrap" class="border-top border-f5">
                <div class="container">
                    <div class="header-row justify-content-between">
                        <?php template_apl('head-logo') ?>
                        <div class="header-misc">

                            <!-- Top Search
							============================================= -->
                            <?php template_apl('top-search') ?>
                            <!-- #top-search end -->

                        </div>

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu style-3 menu-spacing-margin">
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

        <?php modul('web_page',$_GET['m']) ?>
        <!-- #content end -->
        <div class="section lazy mt-5 mb-0 p-0 min-vh-75" data-bg="https://lh4.googleusercontent.com/trZiteGgCBkaNY0_LRuDtWnGujIhJsDbITYPBongJhXpWwSEFqHtvTWszqn0FbAEwpZ_gCptKDsXxsvphaagzBE=w16383"
            style="background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="shape-divider" data-shape="cliff" data-height="150" data-flip-vertical="true"></div>
        </div>
        <!-- Footer
		============================================= -->
        <footer id="footer" class="dark">
            <div class="shape-divider" data-shape="cliff" data-height="150" data-outside="true" data-fill="#282828">
            </div>
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