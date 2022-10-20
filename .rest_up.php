<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:40:12
 * @modify date 2021-06-11 14:40:12
 * @desc [description]
 */
include '_func/func.php';
include '_func/.identity.php';
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/OAuth.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/POP3.php';
require 'vendor/PHPMailer/src/SMTP.php';
// require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Perparkiran Dinas Perhubungan Kota Pekanbaru">
    <meta name="keywords" content="Sistem Informasi Perparkiran Kota Pekanbaru, Parkir Pekanbaru, UPT Parkir Pekanbaru, UPT Perparkiran Pekanbaru, UPTD Parkir Pekanbaru, Dinas Perhubungan Kota Pekanbaru, Dishub Pku, Jumlah Jukir Pekanbaru, Jukir Pekanbaru">
    <meta name="author" content="uptperparkiranpekanbaru">
    <link rel="icon" href="<?= base_url(); ?>assets/adm/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/adm/images/favicon.png" type="image/x-icon">
    <title>Register | <?= $title; ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/animate.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url(); ?>assets/adm/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/adm/css/responsive.css">
    <style type="text/css">
        #merienda {
            font-family: 'Merienda', cursive;
        }

        #pacifico {
            font-family: 'Pacifico', cursive;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #FFF;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>

<body>
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
                <div 0px="" 12px="" arial="" color:="" ff0000="" font:="" id="textDestination" margin:="" style="background-color: none;"></div>
            </b>
            <script language="JavaScript">
                javascript: startTyping(text, 10, "textDestination");
            </script>
        </div>
    </div>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center" src="<?= base_url(); ?>assets/adm/images/login/2.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start" href="<?= base_url(); ?>"><img class="img-fluid for-light" src="<?= base_url(); ?>assets/adm/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="<?= base_url(); ?>assets/adm/images/logo/logo_dark.png" alt="looginpage"></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" action="" method="POST">
                                <h4 id="pacifico">Buat Akun Anda</h4>
                                <p id="merienda">Silahakan input data anda.</p>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Nama Anda</label>
                                    <input class="form-control" type="text" name="nama" required="" placeholder="ex : Sutor Risman">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" required="" placeholder="ex : upt.perparkiran">
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" required="email" placeholder="ex : risman@gmail.com">
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message_email"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="pw" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1_terms_and_conditions" type="checkbox">
                                        <label class="text-muted" for="checkbox1_terms_and_conditions">Agree with<a class="ms-2" data-bs-toggle="modal" data-bs-target="#privacy">Privacy Policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="submit" name="register" id="submit_button" disabled>Create Account</button>
                                </div>
                                <!-- <h6 class="text-muted mt-4 or">Or signup with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> -->
                                <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="<?= base_url(); ?>login-for-users">Sign in</a></p>
                            </form>
                            <?php
                            if (isset($_POST['register'])) {
                                $id         = 'USR-' . uid('5');
                                $username   = $db->real_escape_string($_POST['username']);
                                $password   = password_hash($_POST['pw'], PASSWORD_DEFAULT);
                                $email      = $db->real_escape_string($_POST['email']);
                                $nama       = $db->real_escape_string($_POST['nama']);
                                $token      = hurufangka('150');
                                $now        = date('Y-m-d H:i:s');
                                $batas_waktu = date('Y-m-d H:i:s', strtotime('+30 minutes,', strtotime($now)));
                                // var_dump($email,$nama,$username);
                                // die();
                                //file gambar
                                // $file_tmp = $_FILES['foto']['tmp_name'];
                                //cek token
                                // $csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
                                // var_dump($csrf==true);
                                // die();
                                $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                                //jika username tidak ada didalam database
                                if ($cek_uname->num_rows == 0) {
                                    $cek_email = $db->query("SELECT email FROM users WHERE email='$email'");
                                    //jika email tidak ada didalam database
                                    if ($cek_email->num_rows == 0) {
                                        $mail = new  PHPMailer\PHPMailer\PHPMailer();
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
                                        $mail->addAddress($email, $nama); //email penerima

                                        $mail->isHTML(true);
                                        $mail->Subject = 'Verifikasi Akun ' . $nama; //subject
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
                                                            ] span {
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
                                                                                    <td style="text-align: right; color:#999"><span>Email ini Resmi dari UPT Perparkiran Dinas Perhubungan Kota Pekanbaru</span></td>
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
                                                                                <h5 style="font-weight: 600">Verifikasi Akun ' . $nama . ' (' . $username . ')</h5>
                                                                                <p>Selamat bergabung <b>' . $nama . '</b> di ' . $title . '.</p>
                                                                                <p>Silahkan klik tombol dibawah ini untuk memverifikasi akun anda.</p>
                                                                                <p>Batas Waktu Verifikasi Sampai Dengan <b>' . tgl_indo(date('Y-m-d', strtotime($batas_waktu))) . ' ' . date('H:i:s', strtotime($batas_waktu)) . ' WIB</b>.</p>
                                                                                <p style="text-align: center"><a href="' . base_url() . 'verifikasi-akun/' . $token . '" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verifikasi</a></p>
                                                                                <p>Selanjutnya silahkan login dengan username dan password yang sudah anda buat .</p>
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
                                                                                <p style="color: #999; margin-bottom: 0">' . $alamat . '</p>
                                                                                <p style="color: #999; margin-bottom: 0">' . $nm_upt . ' ' . $instansi . '</a></p>
                                                                                <p style="color: #999; margin-bottom: 0">' . $footer . '</p></td>
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

                                        if (!$mail->send()) {
                                            sweetAlert('register-for-new-users', 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                        } else {
                                            // echo "Message has been sent successfully";
                                            $db->query("INSERT INTO users VALUES ('$id','$username','$password','$email','','','$nama','','','','','','7','','','','$token','$batas_waktu','N',NOW(),NOW(),NULL)");
                                            sweetAlert('login-for-users', 'sukses', 'Sukses !', 'Silahkan cek email : ' . $email . ' untuk memverifikasi akun. Setelah memverifikasi silahkan login ');
                                        }
                                    }
                                }
                            }
                            $pp = $db->query("SELECT * FROM privacy_policy WHERE id='2'")->fetch_assoc();
                            ?>
                            <div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $pp['privacy']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Setuju</button>
                                            <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="<?= base_url(); ?>assets/adm/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?= base_url(); ?>assets/adm/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="<?= base_url(); ?>assets/adm/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?= base_url(); ?>assets/adm/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="<?= base_url(); ?>assets/adm/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <script src="<?= base_url(); ?>assets/adm/js/sweet-alert/sweetalert2.all.min.js"></script>
        <!-- <script src="<?= base_url(); ?>assets/js/sweet-alert/sweetalert.min.js"></script> -->
        <script src="<?= base_url(); ?>assets/adm/js/sweet-alert/app.js"></script>
        <script src="<?= base_url(); ?>assets/adm/js/modal-animated.js"></script>
        <!-- Theme js-->
        <script src="<?= base_url(); ?>assets/adm/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
        <script>
            //Cek Username ke Database
            $(document).ready(function() {
                $("#username").change(function() {
                    $("#message").html(
                        "<li><i class='fa fa-spinner text-success fa-spin' ></i> check username...</li>"
                    );

                    var username = $("#username").val();

                    $.ajax({
                        type: "post",
                        url: "<?= base_url(); ?>check_users",
                        data: "username=" + username,
                        success: function(data) {
                            if (data == 0) {
                                $("#message").html(
                                    "<i class='fa fa-check text-success'></i> Username Tersedia."
                                );
                            } else {
                                $("#message").html(
                                    "<i class='fa fa-times text-danger'></i> Username Tidak Tersedia."
                                );
                            }
                        }
                    });

                });

            });

            //cek email
            $(document).ready(function() {
                $("#email").change(function() {
                    $("#message_email").html(
                        "<li><i class='fa fa-spinner text-success fa-spin' ></i> check Email...</li>");

                    var email = $("#email").val();

                    $.ajax({
                        type: "post",
                        url: "<?= base_url(); ?>check_email",
                        data: "email=" + email,
                        success: function(data) {
                            if (data == 0) {
                                $("#message_email").html(
                                    "<i class='fa fa-check text-success'></i> Email Tersedia."
                                );
                            } else {
                                $("#message_email").html(
                                    "<i class='fa fa-times text-danger'></i> Email Tidak Tersedia."
                                );
                            }
                        }
                    });
                });
            });

            $("#username").on({
                keydown: function(e) {
                    if (e.which === 32)
                        return false;
                },
                keyup: function() {
                    this.value = this.value.toLowerCase();
                },
                change: function() {
                    this.value = this.value.replace(/\s/g, "");

                }
            });

            $("#pw").on({
                keydown: function(e) {
                    if (e.which === 32)
                        return false;
                },
                change: function() {
                    this.value = this.value.replace(/\s/g, "");

                }
            });

            $('#checkbox1_terms_and_conditions').click(function() {
                //If the checkbox is checked.
                if ($(this).is(':checked')) {
                    //Enable the submit button.
                    $('#submit_button').attr("disabled", false);
                } else {
                    //If it is not checked, disable the button.
                    $('#submit_button').attr("disabled", true);
                }
            });

            // $(document).on('click', '#view_pass', function(e) {
            //     e.preventDefault();
            //     var password = $("#password").val();
            //     if ($("#password").hasClass("active")) {
            //         $("#password").attr('type', 'text');
            //         $("#password").removeClass("active");

            //     } else {
            //         $("#password").attr('type', 'password');
            //         $("#password").addClass("active");
            //     }
            // });
        </script>
        <script>
            $(document).ready(function() {
                $(".preloader").fadeOut('slow');
            })
        </script>
    </div>
</body>

</html>
</div>
</body>

</html>