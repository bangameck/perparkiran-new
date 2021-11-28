<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:40:39
* @modify date 2021-06-11 14:40:39
* @desc [description]
*/

include '_func/func.php';
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/OAuth.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/POP3.php';
require 'vendor/PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<?= template('head'); ?>

<body onload="startTime()">
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
    <!-- preloader -->
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
    <!-- <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div> -->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <!-- search menu -->
                <?= template('search'); ?>

                <!-- mobile head logo  -->
                <?= template('mobile-logo'); ?>

                <!-- header menu  -->
                <div class="left-header col horizontal-wrapper ps-0">
                    <!-- <?= template('header-menu'); ?> -->
                </div>

                <div class="nav-right col-8 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <!-- menu bahasa  -->
                        <!-- <?= template('lang-menu'); ?> -->

                        <!-- <li> <span class="header-search"><i data-feather="search"></i></span></li> -->
                        <!-- notif 1  -->
                        <!-- notif 2  -->
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li>
                          <a href="<?= base_url(); ?>"><i data-feather="globe"></i></a>
                        </li>
                        <!-- notif 3  -->
                        <!-- notif 4  -->
                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a>
                        </li>
                        <!-- user profile menu  -->
                        <?= template('user-profile-menu'); ?>

                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">                        
                        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                        <div class="ProfileCard-details">
                            <div class="ProfileCard-realName">{{name}}</div>
                        </div>
                    </div>
                </script>
                <script class="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                </script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div>
                    <!-- side-logo  -->
                    <?= template('side-logo'); ?>

                    <!-- side menu  -->
                    <?= template('menu'); ?>
                </div>
                <!-- Page Sidebar Ends-->
                <?php modul('adm_page',$_GET['m']); ?>
                <!-- footer start-->
                <?= template('footer'); ?>
            </div>
        </div>
        <?= template('js'); ?>
</body>

</html>