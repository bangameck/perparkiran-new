<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:40:12
* @modify date 2021-06-11 14:40:12
* @desc [description]
*/
include_once '_func/func.php';
if(empty($_SESSION['username']) && empty($_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Perparkiran Dinas Perhubungan Kota Pekanbaru">
    <meta name="keywords"
        content="Sistem Informasi Perparkiran Kota Pekanbaru, Parkir Pekanbaru, UPT Parkir Pekanbaru, UPT Perparkiran Pekanbaru, UPTD Parkir Pekanbaru, Dinas Perhubungan Kota Pekanbaru, Dishub Pku, Jumlah Jukir Pekanbaru, Jukir Pekanbaru">
    <meta name="author" content="uptperparkiranpekanbaru">
    <link rel="icon" href="<?= base_url(); ?>assets/adm/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
    <title>Login Page | <?= $title; ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
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
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?= base_url(); ?>assets/adm/images/login/2.jpg"
                    alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light"
                                    src="<?= base_url(); ?>assets/adm/images/logo/login.png" alt="looginpage"><img
                                    class="img-fluid for-dark" src="<?= base_url(); ?>assets/adm/images/logo/logo_dark.png"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="" method="POST">
                                <h4>Halaman Login</h4>
                                <p>Masukkan username & password kamu untuk login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Username</label>
                                    <input class="form-control" id="us" type="text" name="us" required=""
                                        placeholder="ex: uptperparkiranpku">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="pw" required=""
                                            placeholder="*********">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <!-- <div class="checkbox p-0">
                      <input id="checkbox1:view_pass" type="checkbox">
                      <label class="text-muted" for="checkbox1:view_pass">Remember password</label>
                    </div> -->
                                    <button class="btn btn-primary btn-block w-100" type="submit" name="login">Sign
                                        in</button>
                                </div>
                                <!-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> -->
                                <p class="mt-4 mb-0 text-center"><a class="ms-2" href="<?= base_url(); ?>dashboard">Klik
                                        disini untuk kembali ke-Dashboard</a></p>
                            </form>
                            <?php 
                if (isset($_POST['login'])) {
                    $u=$db->real_escape_string($_POST['us']);
                    $p=$db->real_escape_string($_POST['pw']);
                    // var_dump($u,$p);
                    // die();
                    $q=$db->query("SELECT * FROM users WHERE username='$u'");
                    $r=$q->fetch_assoc();
                    $hs=password_hash($p,PASSWORD_DEFAULT);
                    $ph=$r['password'];
                    $ip = ip_user();
                    $os = os_user();
                    $br = browser_user();
                    $t  = createToken();
                    // var_dump($p,$ph);
                    // die();
                    if($q->num_rows >= 1){
                        if (password_verify($p,$ph)) {
                            if ($r['status']=='Y') {
                                # code...
                                // var_dump([
                                //     $u,$p,$ph
                                // ]);
                                // die();
                                $db->query("UPDATE users SET token='$t' WHERE username='$u'");
                                $db->query("INSERT INTO session VALUES('$u','$ip','$os','$br','$t',NOW())");
    
                                $c=$db->query("SELECT * FROM session WHERE username='$u'")->fetch_assoc();
                                session_start();
                                $_SESSION['username']     = $r['username'];
                                $_SESSION['password']     = $r['password'];
                                $_SESSION['nama']  	      = $r['nama'];
                                $_SESSION['level']        = $r['level'];
                                $_SESSION['id_usr']  	  = $r['id'];
                                $_SESSION['foto']  	      = $r['f_usr'];
                                $_SESSION['regu']  	      = $r['regu'];
                                $_SESSION['token']        = $c['token'];
                                // # code...
                                sweetAlert('dashboard','sukses','Login Sukses...','Selamat datang disistem informasi perparkiran');
                            } else {
                                sweetAlert('khusus-admin-login','error','Login Error !','Maaf akun anda sudah tidak mendapat akses (diblokir) atau belum terverifikasi silahkan cek email anda untuk memverifikasi akun. <br> silahkan menghubungi admin untuk info lebih lanjut.');
                            }
                            
                        } else {
                            sweetAlert('khusus-admin-login','error','Login Error !','Password Salah...');
                        }
                        
                    }else{
                        sweetAlert('khusus-admin-login','error','Login Error !','Username tidak terdaftar...');
                    }
                }
                // javascript($m,'confirm');
                ?>


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
        $("#us").on({
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
    </div>
</body>

</html>
<?php 
} else {
    aut_lp(1,2,3);
}
?>