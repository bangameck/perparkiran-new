<?php

/**
 * @author [bangameck.rra]
 * @email [rahmad.looker@gmail.com]
 * @create date 2021-06-11 14:30:17
 * @modify date 2021-06-11 14:30:46
 * @desc [description]
 */

include '_func/.identity.php';
// include_once '/vendor/owasp/csrf-protector-php/libs/csrf/csrfprotector.php';
// include '_func/database.php';

$a = $_GET['a'];
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
if ($csrf == false) {
    sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir, silahkan login ulang');
} else {
    switch ($a) {
        default:
            aut(array(1));
?>
            <title>Users | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Users</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item active">Users </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dt-ext table-responsive">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="<?= base_url(); ?>users/add" class="btn btn-primary-gradien" type="button">Tambah
                                            Data</a>
                                    </div>
                                    <br>
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Regu</th>
                                                <th>Foto</th>
                                                <!-- <th>Detail</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT * FROM users WHERE status='Y' ORDER BY username ASC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                                if (empty($u['f_usr'])) {
                                                    $ft = 'default.png';
                                                } else {
                                                    $ft = $u['f_usr'];
                                                }
                                                $l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Pengawas', '4' => 'Bendahara', '5' => 'Pimpinan', '6' => 'Penerima Hak Akses');

                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $u['nama']; ?></td>
                                                    <td><?= $u['username']; ?></td>
                                                    <td><?= $l[$u['level']]; ?></td>
                                                    <td>
                                                        <div class="avatar"><img class="img-40 rounded-circle" src="<?= base_url(); ?>_uploads/f_usr/<?= $ft; ?>" alt="#">
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="btn-group">
                                                            <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>profile/<?= $u['username']; ?>"><i class="fa fa-info"></i> Detail</a>
                                                            <form action="<?= base_url(); ?>users/edit" method="POST">
                                                                <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                                <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-pencil"></i> Edit</button>
                                                            </form>
                                                            <form action="<?= base_url(); ?>users/delete-temp" method="POST">
                                                                <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                                <input type="hidden" name="username" value="<?= $u['username']; ?>">
                                                                <input type="hidden" name="foto" value="<?= $u['f_usr']; ?>">
                                                                <button class="btn btn-danger btn-sm" onclick="hapustemp()" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'add':
            aut(array(1));
        ?>
            <title>Tambah User | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">

                            <div class="col-6">
                                <h3>Tambah User</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Users </li>
                                    <li class="breadcrumb-item active">Tambah User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <label">Username :</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                        <div class="media">
                                            <div class="text-end">
                                                <label id="message"></label>
                                            </div>
                                        </div>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Username tidak boleh kosong.
                                        </div>
                                </div>
                                <!-- <div class="col-lg-6 col-md-12">
                    <label>Password :</label>
                        <input type="password" class="form-control password" name="password" required>
                        <div class="media">
                            <div class="text-end switch-sm switch-outline">
                                <label class="switch">
                                    <input type="checkbox" class="view_pass"><span class="switch-state"
                                        data-container="body" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Lihat Password"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="invalid-feedback">
                            Password tidak boleh kosong.
                        </div>
                    </div> -->
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message_email"></label>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Email tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Nomor Handphone</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="no_hp" required>

                                    <!-- <div class="show-hide"><span id="view_pass"></span></div> -->
                                    <div class="invalid-feedback">
                                        Nomor Handphone tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama :</label>
                                    <input type="text" class="form-control" name="nama" required>

                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput">Pendidikan Terakhir :</label>
                                    <input type="text" class="form-control" name="pendidikan">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Tempat Lahir :</label>
                                    <input type="text" class="form-control" name="t_lahir">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput">Tanggal Lahir : Tanggal Lahir :</label><small style="color: orange;">
                                        Format : bulan/tanggal/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-4 col-md-12">
                                    <select class="form-select js-example-basic-single" name="jk" id="floatingSelect" aria-label="Pilih Level">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="M">Pria</option>
                                        <option value="W">Wanita</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <select class="form-select js-example-basic-single" name="level" id="floatingSelect" aria-label="Pilih Level" required>
                                        <option value="">Level</option>
                                        <!-- <option value="1">Admin Super</option> -->
                                        <option value="2">Anggota</option>
                                        <option value="3">Pengawas</option>
                                        <option value="4">Bendahara</option>
                                        <option value="5">Kepala UPT</option>
                                        <option value="6">Penerima Hak Akses</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Level tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <select class="form-select js-example-basic-single" name="regu" id="floatingSelect" aria-label="Pilih Level">
                                        <option value="">Regu</option>
                                        <?php
                                        $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                                        while ($r = $regu->fetch_assoc()) :
                                        ?>
                                            <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-3 col-md-6">
                                    <!-- gambar  -->
                                    <div class="avatar"><img class="img-100 rounded-circle" src="<?= base_url(); ?>_uploads/f_usr/default.png" id="imgPreview" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <input class="form-control" id="imgUpload" name="foto" type="file">
                                    <small style="color: red;">Format File : png, jpg, jpeg</small>

                                </div>
                            </div>
                            <hr>
                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                                    Data</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $id         = 'USR-' . uid('5');
                            $username   = $db->real_escape_string($_POST['username']);
                            $password   = password_hash('12345678', PASSWORD_DEFAULT);
                            $email      = $db->real_escape_string($_POST['email']);
                            $no_hp      = $db->real_escape_string($_POST['no_hp']);
                            $nama       = $db->real_escape_string($_POST['nama']);
                            $pendidikan = strtoupper($db->real_escape_string($_POST['pendidikan']));
                            $t_lahir    = $db->real_escape_string($_POST['t_lahir']);
                            $tgl_lahir  = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir'])));
                            $jk         = $db->real_escape_string($_POST['jk']);
                            $level      = $db->real_escape_string($_POST['level']);
                            $regu       = $db->real_escape_string($_POST['regu']);
                            $token      = hurufangka('75');
                            $now        = date('Y-m-d H:i:s');
                            $batas_waktu = date('Y-m-d H:i:s', strtotime('+7 days,', strtotime($now)));
                            //file gambar
                            $file_tmp = $_FILES['foto']['tmp_name'];
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
                                    if (empty($file_tmp)) {
                                        $mail = new  PHPMailer\PHPMailer\PHPMailer();
                                        // $body = 'Test email dulu bosque'
                                        //Enable SMTP debugging.
                                        //$mail->SMTPDebug = 3;
                                        //Set PHPMailer to use SMTP.
                                        $mail->isSMTP();
                                        //Set SMTP host name
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        //Provide username and password
                                        $mail->Username = $email_;   //nama-email smtp
                                        $mail->Password = $pmail;           //password email smtp
                                        //If SMTP requires TLS encryption then set it
                                        $mail->SMTPSecure = 'tls';
                                        //Set TCP port to connect to
                                        $mail->Port = 587;

                                        $mail->From = $email_; //email pengirim
                                        $mail->FromName = $title; //nama pengirim

                                        $mail->addAddress($email, $nama); //email penerima

                                        $mail->isHTML(true);
                                        $mail->Subject = 'Verifikasi Akun ' . $username; //subject
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
                                                                            <td><img src="' . $base_url . 'assets/images/logo/logo-icon.png" alt=""></td>
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
                                                                        <h6 style="font-weight: 600">Verifikasi Akun ' . $username . '</h6>
                                                                        <p>Selamat bergabung <b>' . $nama . '</b> di ' . $title . '.</p>
                                                                        <p>Silahkan klik tombol dibawah ini untuk memverifikasi akun anda.</p>
                                                                        <p>Batas Waktu Verifikasi Sampai Dengan <b>' . tgl_indo(date('Y-m-d', strtotime($batas_waktu))) . ' ' . date('H:i:s', strtotime($batas_waktu)) . '</b>.</p>
                                                                        <p style="text-align: center"><a href="' . $base_url . 'verifikasi-akun/' . $token . '" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verifikasi</a></p>
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
                                                                        <p style="color: #999; margin-bottom: 0">' . $instansi . '</a></p>
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
                                            sweetAlert($m, 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                        } else {
                                            // echo "Message has been sent successfully";
                                            $db->query("INSERT INTO users VALUES ('$id','$username','$password','$email','$no_hp','$nama','$pendidikan','$t_lahir','$tgl_lahir','$jk','$level','$regu','','$token','$batas_waktu','N',NOW(),NOW(),NOW())");
                                            sweetAlert('users', 'sukses', 'Sukses !', 'Data dengan username (' . $username . ') berhasil diinput');
                                        }
                                        // if ($q) {
                                        //     javascript('users','alert-sukses','Data User berhasil diinput');
                                        // } else {
                                        //     javascript('','alert-error',$db->error);
                                        // }
                                    } else {
                                        $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                                        $name_tmp  = $_FILES['foto']['name'];
                                        $x         = explode('.', $name_tmp);
                                        $extend    = strtolower(end($x));
                                        $time      = date('dmYHis');
                                        $foto      = $id . '_' . $time . '.' . $extend;
                                        $path      = '_uploads/f_usr/';

                                        //cek ekstensi
                                        if (in_array($extend, $ext_valid) === true) {
                                            //Compress Image
                                            fotoCompressResize($foto, $file_tmp, $path);
                                            //inster ke database
                                            $mail = new  PHPMailer\PHPMailer\PHPMailer();
                                            // $body = 'Test email dulu bosque'
                                            //Enable SMTP debugging.
                                            //$mail->SMTPDebug = 3;
                                            //Set PHPMailer to use SMTP.
                                            $mail->isSMTP();
                                            //Set SMTP host name
                                            $mail->Host = 'smtp.gmail.com';
                                            $mail->SMTPAuth = true;
                                            //Provide username and password
                                            $mail->Username = $email_;   //nama-email smtp
                                            $mail->Password = $pmail;           //password email smtp
                                            //If SMTP requires TLS encryption then set it
                                            $mail->SMTPSecure = 'tls';
                                            //Set TCP port to connect to
                                            $mail->Port = 587;

                                            $mail->From = $email_; //email pengirim
                                            $mail->FromName = $title; //nama pengirim

                                            $mail->addAddress($email, $nama); //email penerima

                                            $mail->isHTML(true);
                                            $mail->Subject = 'Verifikasi Akun ' . $username; //subject
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
                                                                                <td><img src="' . $base_url . 'assets/images/logo/logo-icon.png" alt=""></td>
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
                                                                            <h6 style="font-weight: 600">Verifikasi Akun ' . $username . '</h6>
                                                                            <p>Selamat bergabung <b>' . $nama . '</b> di ' . $title . '.</p>
                                                                            <p>Silahkan klik tombol dibawah ini untuk memverifikasi akun anda.</p>
                                                                            <p>Batas Waktu Verifikasi Sampai Dengan <b>' . tgl_indo(date('Y-m-d', strtotime($batas_waktu))) . ' ' . date('H:i:s', strtotime($batas_waktu)) . '</b>.</p>
                                                                            <p style="text-align: center"><a href="' . $base_url . 'verifikasi-akun/' . $token . '" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verifikasi</a></p>
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
                                                                            <p style="color: #999; margin-bottom: 0">' . $instansi . '</a></p>
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
                                                sweetAlert($m, 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                            } else {
                                                // echo "Message has been sent successfully";
                                                $db->query("INSERT INTO users VALUES ('$id','$username','$password','$email','$no_hp','$nama','$pendidikan','$t_lahir','$tgl_lahir','$jk','$level','$regu','$foto','$token','$batas_waktu','N',NOW(),NOW(),NOW())");
                                                sweetAlert('users', 'sukses', 'Sukses !', 'Data dengan username (' . $username . ') berhasil diinput');
                                            }
                                            // javascript('users','alert-sukses','Data User dan Foto berhasil diupload');
                                        } else {
                                            sweetAlert('users/add', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                                        }
                                    }
                                } else {
                                    sweetAlert('users/add', 'error', 'Email tidak tersedia !', 'Email <i>' . $email . '</i> tidak tersedia. Silahkan inputkan ulang dengan username yang berbeda.');
                                }   // javascript('','alert-error',$db->error);
                            } else {
                                sweetAlert('users/add', 'error', 'Username tidak tersedia !', 'Email <i>' . $username . '</i> tidak tersedia. Silahkan inputkan ulang dengan username yang berbeda.');
                            }
                            //cek username dalam database
                        } ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
            <?php
        case 'edit':
            aut(array(1));
            // $us = $_POST['us'];
            $d = $db->query("SELECT * FROM users a, regu b WHERE a.regu=b.id_regu AND a.id='$_POST[id]'")->fetch_assoc();
            if (empty($d)) {
                sweetAlert('users', 'Error !', 'error', 'Data tidak ditemukan');
            } else {
            ?>
                <title>Edit User (<?= $d['username']; ?>) | <?= $title; ?></title>
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-6">
                                    <h3>Edit User (<?= $d['username']; ?>)</h3>
                                </div>
                                <div class="col-6">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">Data Master</li>
                                        <li class="breadcrumb-item">Users </li>
                                        <li class="breadcrumb-item active">Edit User (<?= $d['username']; ?>)</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12 form-floating">
                                        <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                                        <input type="text" class="form-control" name="username" value="<?= $d['username']; ?>" id="username" required>
                                        <label for="floatingInput">Username</label>
                                        <div class="media">
                                            <div class="text-end">
                                                <label id="message"></label>
                                            </div>
                                        </div>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Username tidak boleh kosong.
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12 form-floating position-relative">
                        <input type="password" class="form-control password" name="password" required>
                        <label for="floatingInput">Password</label>
                        <div class="media">
                            <div class="text-end switch-sm switch-outline">
                                <label class="switch">
                                    <input type="checkbox" class="view_pass"><span class="switch-state"
                                        data-container="body" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Lihat Password"></span>
                                </label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong.
                        </div>
                    </div> -->
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-6 col-md-12 form-floating">
                                        <input type="email" class="form-control" name="email" value="<?= $d['email']; ?>" id="email" required>
                                        <label for="floatingInput">Email</label>
                                        <div class="media">
                                            <div class="text-end">
                                                <label id="message_email"></label>
                                            </div>
                                        </div>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Email tidak boleh kosong.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-floating position-relative">
                                        <input type="text" class="form-control" value="<?= $d['no_hp']; ?>" onkeypress="return hanyaAngka(event)" name="no_hp" required>
                                        <label for="floatingInput">Nomor Handphone</label>
                                        <!-- <div class="show-hide"><span id="view_pass"></span></div> -->
                                        <div class="invalid-feedback">
                                            Nomor Handphone tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-6 col-md-12 form-floating">
                                        <input type="text" class="form-control" name="nama" value="<?= $d['nama']; ?>" required>
                                        <label for="floatingInput">Nama</label>
                                        <div class="invalid-feedback">
                                            Nama tidak boleh kosong.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 form-floating">
                                        <input type="text" class="form-control" value="<?= $d['pendidikan']; ?>" name="pendidikan">
                                        <label for="floatingInput">Pendidikan Terakhir</label>

                                    </div>
                                    <div class="row g-2">
                                        <div class="col-lg-6 col-md-12">
                                            <label>Tempat Lahir :</label>
                                            <input type="text" class="form-control" value="<?= $d['t_lahir']; ?>" name="t_lahir">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="floatingInput">Tanggal Lahir :</label><small style="color: orange;"> Format :
                                                bulan/tanggal/tahun</small>
                                            <input type="text" class="datepicker-here form-control digits" value="<?= date('m/d/Y', strtotime($d['tgl_lahir'])); ?>" data-language="en" name="tgl_lahir">
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12">
                        <select class="form-select js-example-basic-single" name="level" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <option value="">Level</option>
                            <option value="1">Admin</option>
                            <option value="2">Driver</option>
                            <option value="3">Pendamping</option>
                        </select>
                        <div class="invalid-feedback">
                            Level tidak boleh kosong.
                        </div>
                    </div> -->
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-4 col-md-12">
                                        <select class="form-select js-example-basic-single" name="jk" id="floatingSelect" aria-label="Pilih Level">
                                            <?php
                                            $g = array('M' => 'Pria', 'W' => 'Wanita');
                                            ?>
                                            <option value="<?= $d['jk']; ?>"><?= $g[$d['jk']]; ?></option>
                                            <option value="M">Pria</option>
                                            <option value="W">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <select class="form-select js-example-basic-single" name="level" id="floatingSelect" aria-label="Pilih Level" required>
                                            <?php
                                            $l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Pengawas', '4' => 'Bendahara', '5' => 'Pimpinan', '6' => 'Penerima Hak Akses');
                                            ?>
                                            <option value="<?= $d['level']; ?>"><?= $l[$d['level']]; ?></option>
                                            <!-- <option value="">Level</option> -->
                                            <!-- <option value="1">Admin Super</option> -->
                                            <option value="2">Anggota</option>
                                            <option value="3">Pengawas</option>
                                            <option value="4">Bendahara</option>
                                            <option value="5">Pimpinan</option>
                                            <option value="6">Penerima Hak Akses</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Level tidak boleh kosong.
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <select class="form-select js-example-basic-single" name="regu" id="floatingSelect" aria-label="Pilih Level">
                                            <option value="<?= $d['regu']; ?>"><?= $d['nm_regu']; ?></option>
                                            <?php
                                            $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                                            while ($r = $regu->fetch_assoc()) :
                                            ?>
                                                <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-3 col-md-6">
                                        <?php
                                        if (empty($d['f_usr'])) {
                                            $foto = 'default.png';
                                        } else {
                                            $foto = $d['f_usr'];
                                        }
                                        ?>
                                        <!-- gambar  -->
                                        <div class="avatar"><img class="img-100 rounded-circle" src="<?= base_url(); ?>_uploads/f_usr/<?= $foto; ?>" id="imgPreview" alt="Image Preview">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12">
                                        <input class="form-control" id="imgUpload" name="foto" type="file">
                                        <small style="color: red;">Format File : png, jpg, jpeg</small>
                                    </div>

                                </div>
                                <!-- <hr> -->
                                <div class="d-grid gap-2 col-lg-3 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                                        Data</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['simpan'])) {
                                $id         = $db->real_escape_string($_POST['id']);
                                $username   = $db->real_escape_string($_POST['username']);
                                // $password   = password_hash('12345678', PASSWORD_DEFAULT);
                                $email      = $db->real_escape_string($_POST['email']);
                                $no_hp      = $db->real_escape_string($_POST['no_hp']);
                                $nama       = $db->real_escape_string($_POST['nama']);
                                $pendidikan = strtoupper($db->real_escape_string($_POST['pendidikan']));
                                $t_lahir    = $db->real_escape_string($_POST['t_lahir']);
                                $tgl_lahir  = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir'])));
                                $jk         = $db->real_escape_string($_POST['jk']);
                                $level      = $db->real_escape_string($_POST['level']);
                                $regu       = $db->real_escape_string($_POST['regu']);
                                //file gambar
                                $file_tmp = $_FILES['foto']['tmp_name'];
                                // var_dump($data = [
                                //     'id'=>$id,
                                //     'username'=>$username,
                                //     'email'=>$email,
                                //     'no_hp'=>$no_hp,
                                //     'nama'=>$nama ,
                                //     'pendidi'=>$pendidikan,
                                //     'tempat'=>$t_lahir,
                                //     'tgl'=>$tgl_lahir,
                                //     'jk'=>$jk,
                                //     'levl'=>$level,
                                //     'regu'=>$regu,
                                // ]);
                                // die();
                                //cek uname
                                if ($username == $d['username']) {
                                    $cek_uname = $db->query("SELECT username FROM users WHERE username!='$d[username]' AND username='$username'");
                                } else {
                                    $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                                }
                                //cek email
                                if ($email == $d['email']) {
                                    $cek_email = $db->query("SELECT email FROM users WHERE email!='$d[email]' AND email='$email'");
                                } else {
                                    $cek_email = $db->query("SELECT email FROM users WHERE email='$email'");
                                }
                                //jika username tidak ada didalam database
                                if ($cek_uname->num_rows == 0) {
                                    if ($cek_email->num_rows == 0) {
                                        if (empty($file_tmp)) {
                                            $db->query("UPDATE users SET username = '$username', email='$email', no_hp='$no_hp', nama='$nama', pendidikan='$pendidikan', t_lahir='$t_lahir', tgl_lahir='$tgl_lahir', jk='$jk', level='$level',regu='$regu',f_usr='$foto',updated_at=NOW() WHERE id='$id'");
                                            sweetAlert('users', 'sukses', 'Berhasil !', 'Data User berhasil diupdate');

                                            // if($q){
                                            //     sweetAlert('users','sukses','Berhasil !','Data User berhasil diupdate');
                                            // } else {
                                            //     javascript($m,'alert-error',$db->error);
                                            // }
                                        } else {
                                            $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                                            $name_tmp  = $_FILES['foto']['name'];
                                            $x         = explode('.', $name_tmp);
                                            $extend    = strtolower(end($x));
                                            $time      = date('dmYHis');
                                            $foto      = $id . '_' . $time . '.' . $extend;
                                            $path      = '_uploads/f_usr/';

                                            //cek ekstensi
                                            if (in_array($extend, $ext_valid) === true) {
                                                //Compress Image
                                                fotoCompressResize($foto, $file_tmp, $path);
                                                //inster ke database
                                                $q = $db->query("UPDATE users SET username = '$username', email='$email', no_hp='$no_hp', nama='$nama', pendidikan='$pendidikan', t_lahir='$t_lahir', tgl_lahir='$tgl_lahir', jk='$jk', level='$level',regu='$regu',f_usr='$foto',updated_at=NOW() WHERE id='$id'");
                                                if ($q) {
                                                    sweetAlert('users', 'sukses', 'Berhasil !', 'Data User berhasil diupdate');
                                                } else {
                                                    javascript($m, 'alert-error', $db->error);
                                                }
                                                //hapus foto lama dari directory
                                                unlink('_uploads/f_usr/' . $d['f_usr']);
                                                //notif


                                                // sweetAlert('users','sukses','Berhasil !','Data User dan Foto berhasil diupdate');
                                            } else {
                                                javascript('', 'alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                                            }
                                        }
                                    } else {
                                        sweetAlert('', 'alert-error', 'Email tidak tersedia');
                                    }
                                } else {
                                    sweetAlert('', 'alert-error', 'USername tidak tersedia');
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php break; ?>
        <?php
        case 'delete-temp':
            $csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
            if ($csrf == true) {
                $id = $_POST['id'];
                $ft = $_POST['foto'];
                $us = $_POST['username'];
                $db->query("UPDATE users SET status='N', deleted_at=NOW() WHERE id='$id'");
                sweetAlert('users', 'sukses', 'Data Berhasil blokir.!', 'Data users dengan username (' . $us . ') berhasil dihapus sementara.');
            } else {
                sweetAlert('users', 'error', 'Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
            }
        ?>

            <?php break; ?>
        <?php
        case 'delete':
            $csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
            if ($csrf == true) {
                $id = $_POST['id'];
                $ft = $_POST['foto'];
                $us = $_POST['username'];
                // $d = $db->query("SELECT * FROM users WHERE username='$us'")->fetch_assoc();
                if (empty($ft)) {
                    $db->query("DELETE FROM users WHERE username='$id'");
                    sweetAlert('users', 'sukses', 'Data Berhasil dihapus.!', 'Data users dengan username (' . $us . ') berhasil dihapus');
                } else {
                    unlink('_uploads/f_usr/' . $ft);
                    $db->query("DELETE FROM users WHERE username='$id'");
                    sweetAlert('users', 'sukses', 'Data Berhasil dihapus.!', 'Data users dengan username (' . $us . ') berhasil dihapus');
                }
            } else {
                sweetAlert('users', 'error', 'Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
            }
        ?>

            <?php break; ?>
        <?php
        case 'setting':
            $d = $db->query("SELECT * FROM users WHERE id='$_SESSION[id_usr]'")->fetch_assoc();
        ?>
            <title>Edit User (<?= $d['username']; ?>) | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Edit User (<?= $d['username']; ?>)</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="settings"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Setting</li>
                                    <li class="breadcrumb-item">Users </li>
                                    <li class="breadcrumb-item active">Edit User (<?= $d['username']; ?>)</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12 form-floating">
                                    <input type="text" class="form-control" name="username" id="username" value="<?= $d['username']; ?>" required>
                                    <label for="floatingInput">Username</label>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message">

                                            </label>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Username tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 form-floating">
                                    <input type="text" class="form-control" name="nama" value="<?= $d['nama']; ?>" required>
                                    <label for="floatingInput">Nama</label>
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-3 col-md-6">
                                    <!-- gambar  -->
                                    <?php
                                    if (empty($d['f_usr'])) {
                                        $foto = 'default.png';
                                    } else {
                                        $foto = $d['f_usr'];
                                    }
                                    ?>
                                    <div class="avatar"><img class="img-100 rounded-circle" src="<?= base_url(); ?>_uploads/f_usr/<?= $foto; ?>" id="imgPreview" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <input class="form-control" id="imgUpload" name="foto" type="file">
                                    <!-- <label class for="floatingSelect">Email address</label> -->
                                    <small style="color: red;">Kosongkan jika tidak ingin mengubah foto..(Format File : png, jpg,
                                        jpeg)</small>
                                </div>
                            </div>
                            <hr>
                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                                    Data</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $id       = $d['id'];
                            $username = $db->real_escape_string($_POST['username']);
                            // $password = password_hash($db->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
                            $nama     = $db->real_escape_string($_POST['nama']);
                            $level    = $db->real_escape_string($_POST['level']);
                            //file gambar
                            $file_tmp = $_FILES['foto']['tmp_name'];
                            //foto lama
                            // $fl = $db->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
                            //cek token
                            $csrf     = $db->query("SELECT b.token_csrf FROM users a, session b WHERE a.token_csrf=b.token_csrf AND a.username='$_SESSION[username]' AND b.token_csrf='$_SESSION[token_csrf]'")->fetch_assoc();
                            // var_dump($csrf==true,);
                            // die();
                            if ($csrf == true) {
                                if ($username == $d['username']) {
                                    $cek_uname = $db->query("SELECT username FROM users WHERE username!='$d[username]' AND username='$username'");
                                } else {
                                    $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                                }
                                //jika username tidak ada didalam database
                                if ($cek_uname->num_rows == 0) {
                                    if (empty($file_tmp)) {
                                        if ($username == $d['username']) {
                                            $q = $db->query("UPDATE users SET nama = '$nama', updated_at = NOW() WHERE id='$id'");
                                            javascript('setting', 'alert-sukses-3', 'Data User berhasil diupdate. Silahkan Login Kembali Untuk Melihat Perubahan data');
                                        } else {
                                            $q = $db->query("UPDATE users SET username = '$username', nama = '$nama', updated_at = NOW() WHERE id='$id'");
                                            javascript('setting', 'alert-sukses-3', 'Data User berhasil diupdate. Silahkan Login Kembali Untuk Melihat Perubahan data');
                                        }
                                    } else {
                                        $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                                        $name_tmp  = $_FILES['foto']['name'];
                                        $x         = explode('.', $name_tmp);
                                        $extend    = strtolower(end($x));
                                        $time      = date('dmYHis');
                                        $foto      = $id . '_' . $time . '.' . $extend;
                                        $path      = '_uploads/f_usr/';

                                        //cek ekstensi
                                        if (in_array($extend, $ext_valid) === true) {
                                            //Compress Image
                                            fotoCompressResize($foto, $file_tmp, $path);
                                            //inster ke database
                                            $db->query("UPDATE users SET username = '$username', nama = '$nama', f_usr='$foto', updated_at=NOW() WHERE id='$id'");
                                            //hapus foto lama dari directory
                                            unlink('_uploads/f_usr/' . $d['f_usr']);
                                            //notif
                                            javascript('setting', 'alert-sukses-3', 'Data User dan Foto berhasil diupdate. Silahkan Login Kembali Untuk Melihat Perubahan');
                                        } else {
                                            javascript('', 'alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                                        }
                                    }   // javascript('','alert-error',$db->error);
                                } else {
                                    javascript('', 'alert-error', 'Username tidak tersedia');
                                }
                            } else {
                                javascript('', 'alert-error', 'Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
                            }
                            //cek username dalam database
                        } ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'password':
            $d = $db->query("SELECT * FROM users WHERE id='$_SESSION[id_usr]'")->fetch_assoc();
        ?>
            <title>Edit Password (<?= $d['username']; ?>) | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Edit Password (<?= $d['username']; ?>)</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="settings"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Setting</li>
                                    <li class="breadcrumb-item">Password </li>
                                    <li class="breadcrumb-item active">Edit User (<?= $d['username']; ?>)</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="d-grid gap-2 col-lg-4 col-md-12 mx-auto form-floating position-relative">
                                    <input type="password" class="form-control password" name="password" required>
                                    <label for="floatingInput">Password Baru</label>
                                    <div class="media">
                                        <div class="text-end switch-sm switch-outline">
                                            <label class="switch">
                                                <input type="checkbox" class="view_pass"><span class="switch-state" data-container="body" data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat Password"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- <small style="color: red;">Mohon mengingat password yang sudah anda buat..</small> -->
                                    <div class="invalid-feedback">
                                        Password tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                                    Data</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                            $id       = $d['id'];
                            $password = password_hash($db->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
                            //cek token
                            $csrf     = $db->query("SELECT b.token_csrf FROM users a, session b WHERE a.token_csrf=b.token_csrf AND a.username='$_SESSION[username]' AND b.token_csrf='$_SESSION[token_csrf]'")->fetch_assoc();

                            if ($csrf == true) {
                                $db->query("UPDATE users SET password = '$password', updated_at = NOW() WHERE id='$id'");
                                javascript('password', 'alert-sukses-3', 'Password berhasil diupdate. Silahkan login kembali untuk mencoba password baru anda.');
                            } else {
                                javascript('', 'alert-error', 'Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
                            }
                            //cek username dalam database
                        } ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
<?php
    }
} ?>