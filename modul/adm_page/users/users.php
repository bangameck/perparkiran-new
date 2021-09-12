<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:30:17
* @modify date 2021-06-11 14:30:46
* @desc [description]
*/

include '_func/identity.php';
// include_once '/vendor/owasp/csrf-protector-php/libs/csrf/csrfprotector.php';
// include '_func/database.php';

$a=$_GET['a'];
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
if ($csrf==false) {
    sweetAlert('out','error','Error Session !','Session telah berakhir, silahkan login ulang');
} else {
switch($a){
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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
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
                                $us=$db->query("SELECT * FROM users WHERE status='Y' ORDER BY username ASC");
                                $no=1;
                                while ($u=$us->fetch_assoc()) :
                                    if (empty($u['f_usr'])) {
                                        $ft ='default.png';
                                    } else {
                                        $ft = $u['f_usr'];
                                    }
                                    $l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Karu' ,'4' => 'Pengawas', '5' => 'Admin', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
                                    
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $u['nama']; ?></td>
                                    <td><?= $u['username']; ?></td>
                                    <td><?= $l[$u['level']]; ?></td>
                                    <td>
                                        <div class="avatar"><img class="img-40 rounded-circle"
                                                src="<?= base_url(); ?>_uploads/f_usr/<?= $ft; ?>" alt="#">
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a class="btn btn-primary btn-sm"
                                                href="<?= base_url(); ?>profile/<?= $u['username']; ?>"><i
                                                    class="fa fa-info"></i> Detail</a>
                                            <a class="btn btn-success btn-sm"
                                                href="<?= base_url(); ?>users/edit/<?= $u['id']; ?>"><i
                                                    class="fa fa-pencil"></i> Edit</a>
                                            <!-- <form action="<?= base_url(); ?>users/edit" method="POST">
                                                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                    <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-pencil"></i> Edit</button>
                                            </form> -->
                                            <form action="<?= base_url(); ?>users/blokir" method="POST">
                                                <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                <button class="btn btn-danger btn-sm" onclick="non()"
                                                    type="submit"><i class="fa fa-exclamation-circle"></i> Blokir</button>
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
<?php case 'users-blok' : 
aut(array(1));
?>
<title>Users Blokir | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Users Blokir</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active">Users Blokir</li>
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
                                    <th>Tanggal Blok</th>
                                    <th>Foto</th>
                                    <!-- <th>Detail</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $us=$db->query("SELECT * FROM users WHERE status='N' ORDER BY username ASC");
                                $no=1;
                                while ($u=$us->fetch_assoc()) :
                                    if (empty($u['f_usr'])) {
                                        $ft ='default.png';
                                    } else {
                                        $ft = $u['f_usr'];
                                    }
                                    if (empty($u['deleted_at'])) {
                                        $tgl = '<small style="color: red;">User ini belum memverifikasi kode yang dikirim ke email</small>';
                                    } else {
                                        $tgl = tgl_indo(date('Y-m-d', strtotime($u['deleted_at']))).' '.date('H:i:s', strtotime($u['deleted_at']));
                                    }
                                    $l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Karu' ,'4' => 'Pengawas', '5' => 'Admin', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
                                    
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $u['nama']; ?></td>
                                    <td><?= $u['username']; ?></td>
                                    <td><?= $tgl ?></td>
                                    <td>
                                        <div class="avatar"><img class="img-40 rounded-circle"
                                                src="<?= base_url(); ?>_uploads/f_usr/<?= $ft; ?>" alt="#">
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a class="btn btn-primary btn-sm"
                                                href="<?= base_url(); ?>profile/<?= $u['username']; ?>"><i
                                                    class="fa fa-info"></i> Detail</a>
                                            <form action="<?= base_url(); ?>users/aktif" method="POST">
                                                <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                <input type="hidden" name="username" value="<?= $u['username']; ?>">
                                                <!-- <input type="hidden" name="foto" value="<?= $u['f_usr']; ?>"> -->
                                                <button class="btn btn-success btn-sm" onclick="aktif()"
                                                    type="submit"><i class="fa fa-check"></i> Aktif</button>
                                            </form>
                                            <!-- <form action="<?= base_url(); ?>users/blokir" method="POST">
                                                <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                <input type="hidden" name="username" value="<?= $u['username']; ?>">
                                                <input type="hidden" name="foto" value="<?= $u['f_usr']; ?>">
                                                <button class="btn btn-warning btn-sm" onclick="non()"
                                                    type="submit"><i class="fa fa-exclamation-circle"></i></i> Blokir</button>
                                            </form> -->
                                            <!-- <a class="btn btn-primary btn-sm"
                                                href="<?= base_url(); ?>profile/<?= $u['username']; ?>"><i
                                                    class="fa fa-info"></i> Detail</a>
                                            <a class="btn btn-success btn-sm"
                                                href="<?= base_url(); ?>users/edit/<?= $u['id']; ?>"><i
                                                    class="fa fa-pencil"></i> Edit</a> -->
                                            <!-- <form action="<?= base_url(); ?>users/edit" method="POST">
                                                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                    <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-pencil"></i> Edit</button>
                                            </form> -->
                                            <form action="<?= base_url(); ?>users/delete" method="POST">
                                                <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                <input type="hidden" name="username" value="<?= $u['username']; ?>">
                                                <input type="hidden" name="foto" value="<?= $u['f_usr']; ?>">
                                                <button class="btn btn-danger btn-sm" onclick="hapus()"
                                                    type="submit"><i class="fa fa-trash"></i> Delete Permanent</button>
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
<?php case 'add' : 
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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
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
            <form class="needs-validation" novalidate="" action="" method="POST"
                enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-md-12">
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
                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="no_hp"
                            required>

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
                    <div class="col-lg-12 col-md-12">
                        <label for="floatingInput">Alamat :</label>
                        <textarea name="alamat" class="form-control"></textarea>
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
                        <input type="text" class="datepicker-here form-control digits" data-language="en"
                            name="tgl_lahir">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-4 col-md-12">
                        <select class="form-select js-example-basic-single" name="jk" id="floatingSelect"
                            aria-label="Pilih Level">
                            <option value="">Jenis Kelamin</option>
                            <option value="M">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>
                    <div class="invalid-feedback">
                        Jenis Kelamin tidak boleh kosong.
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <select class="form-select js-example-basic-single" name="level" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <option value="">Level</option>
                            <!-- <option value="1">Admin Super</option> -->
                            <option value="2">Anggota</option>
                            <!-- <option value="3">Karu</option> -->
                            <option value="4">Pengawas</option>
                            <option value="5">Admin</option>
                            <option value="6">Kepala UPT</option>
                            <option value="7">Penerima Hak Akses</option>
                        </select>
                        <div class="invalid-feedback">
                            Level tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <select class="form-select js-example-basic-single" name="regu" id="floatingSelect"
                            aria-label="Pilih Level">
                            <option value="">Regu</option>
                            <?php 
                            $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                            while($r=$regu->fetch_assoc()) :
                            ?>
                            <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="invalid-feedback">
                            Regu tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-3 col-md-6">
                        <!-- gambar  -->
                        <div class="avatar"><img class="img-100 rounded-circle"
                                src="<?= base_url(); ?>_uploads/f_usr/default.png" id="imgPreview" alt="Image Preview">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <input class="form-control" id="imgUpload" name="foto" type="file" accept="image/*">
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
                    $id         = 'USR-' .uid('5');
                    $username   = $db->real_escape_string($_POST['username']);
                    $password   = password_hash('12345678', PASSWORD_DEFAULT);
                    $email      = $db->real_escape_string($_POST['email']);
                    $no_hp      = $db->real_escape_string($_POST['no_hp']);
                    $nama       = $db->real_escape_string($_POST['nama']);
                    $pendidikan = strtoupper($db->real_escape_string($_POST['pendidikan']));
                    $alamat     = $db->real_escape_string($_POST['alamat']);
                    $t_lahir    = $db->real_escape_string($_POST['t_lahir']);
                    $tgl_lahir  = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir'])));
                    $jk         = $db->real_escape_string($_POST['jk']);
                    $level      = $db->real_escape_string($_POST['level']);
                    $regu       = $db->real_escape_string($_POST['regu']);
                    $token      = hurufangka('150');
                    $now        = date('Y-m-d H:i:s');
                    $batas_waktu= date('Y-m-d H:i:s', strtotime('+7 days,', strtotime($now)));
                    //file gambar
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    //cek token
                    // $csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
                    // var_dump($csrf==true);
                    // die();
                        $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                        //jika username tidak ada didalam database
                        if ($cek_uname->num_rows==0) {
                            $cek_email = $db->query("SELECT email FROM users WHERE email='$email'");
                             //jika email tidak ada didalam database
                            if ($cek_email->num_rows==0) {
                                if (empty($file_tmp)) {
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
                                    $mail->addAddress($email, $nama); //email penerima

                                    $mail->isHTML(true);
                                    $mail->Subject = 'Verifikasi Akun '.$username; //subject
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
                                                                        <h6 style="font-weight: 600">Verifikasi Akun '.$username.'</h6>
                                                                        <p>Selamat bergabung <b>'.$nama.'</b> di '.$title.'.</p>
                                                                        <p>Silahkan klik tombol dibawah ini untuk memverifikasi akun anda.</p>
                                                                        <p>Batas Waktu Verifikasi Sampai Dengan <b>'.tgl_indo(date('Y-m-d', strtotime($batas_waktu))).' '.date('H:i:s', strtotime($batas_waktu)).'</b>.</p>
                                                                        <p style="text-align: center"><a href="'.$base_url.'verifikasi-akun/'.$token.'" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verifikasi</a></p>
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
                                                                        <p style="color: #999; margin-bottom: 0">'.$alamat.'</p>
                                                                        <p style="color: #999; margin-bottom: 0">'.$instansi.'</a></p>
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
                                    }
                                    else {
                                        // echo "Message has been sent successfully";
                                        $db->query("INSERT INTO users VALUES ('$id','$username','$password','$email','$no_hp','$nama','$pendidikan','$alamat','$t_lahir','$tgl_lahir','$jk','$level','$regu','','$token','$batas_waktu','N',NOW(),NOW(),NULL)");
                                        sweetAlert('users','sukses','Sukses !','Data dengan username ('.$username.') berhasil diinput');
                                    }
                                    // if ($q) {
                                    //     javascript('users','alert-sukses','Data User berhasil diinput');
                                    // } else {
                                    //     javascript('','alert-error',$db->error);
                                    // }
                                } else {
                                    $ext_valid = array('png','jpg','jpeg','gif' );
                                    $name_tmp  = $_FILES['foto']['name'];
                                    $x         = explode('.', $name_tmp);
                                    $extend    = strtolower(end($x));
                                    $time      = date('dmYHis');
                                    $foto      = $id . '_' . $time . '.' . $extend;
                                    $path      = '_uploads/f_usr/';
                                            
                                    //cek ekstensi
                                    if (in_array($extend, $ext_valid)===true) {
                                        //Compress Image
                                        fotoCompressResize($foto,$file_tmp,$path);
                                        //inster ke database
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
                                        $mail->addAddress($email, $nama); //email penerima

                                        $mail->isHTML(true);
                                        $mail->Subject = 'Verifikasi Akun '.$username; //subject
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
                                                                            <h6 style="font-weight: 600">Verifikasi Akun '.$username.'</h6>
                                                                            <p>Selamat bergabung <b>'.$nama.'</b> di '.$title.'.</p>
                                                                            <p>Silahkan klik tombol dibawah ini untuk memverifikasi akun anda.</p>
                                                                            <p>Batas Waktu Verifikasi Sampai Dengan <b>'.tgl_indo(date('Y-m-d', strtotime($batas_waktu))).' '.date('H:i:s', strtotime($batas_waktu)).'</b>.</p>
                                                                            <p style="text-align: center"><a href="'.$base_url.'verifikasi-akun/'.$token.'" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verifikasi</a></p>
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
                                                                            <p style="color: #999; margin-bottom: 0">'.$alamat.'</p>
                                                                            <p style="color: #999; margin-bottom: 0">'.$instansi.'</a></p>
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
                                        }
                                        else {
                                            // echo "Message has been sent successfully";
                                            $db->query("INSERT INTO users VALUES ('$id','$username','$password','$email','$no_hp','$nama','$pendidikan','$alamat','$t_lahir','$tgl_lahir','$jk','$level','$regu','$foto','$token','$batas_waktu','N',NOW(),NOW(),NULL)");
                                            sweetAlert('users','sukses','Sukses !','Data dengan username ('.$username.') berhasil diinput');
                                        }
                                        // javascript('users','alert-sukses','Data User dan Foto berhasil diupload');
                                    } else {
                                        sweetAlert('users/add','error','Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');

                                    }
                                }
                            } else {
                                sweetAlert('users/add','error','Email tidak tersedia !','Email <i>'.$email.'</i> tidak tersedia. Silahkan inputkan ulang dengan username yang berbeda.');
                            }   // javascript('','alert-error',$db->error);
                        } else {
                            sweetAlert('users/add','error','Username tidak tersedia !', 'Email <i>'.$username.'</i> tidak tersedia. Silahkan inputkan ulang dengan username yang berbeda.');
                        }
                    //cek username dalam database
                } ?>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'edit': 
aut(array(1));
// $us = $_POST['us'];
$id = $_GET['id'];
$cek = $db->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
// var_dump($cek_regu['regu']);
// die();
if (empty($cek['regu'])) {
    $d = $db->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
} else {
    $d = $db->query("SELECT * FROM users a, regu b WHERE a.regu=b.id_regu AND a.id='$id'")->fetch_assoc();
}
if (empty($d)) {
    sweetAlert('users','Error !','error','Data tidak ditemukan');
} else {
if (empty($d['f_usr'])) {
    $ft = 'default.png';
} else {
    $ft = $d['f_usr'];
}
$l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Komandan Regu', '4' => 'Pengawas', '5' => 'Bendahara', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
if ($d['level']=='2') {
    $desc = $l[$d['level']].' Regu '.$d['nm_regu'];
    $hden = '';
} elseif(empty($d['regu'])){
    $desc = $l[$d['level']];
    // $hden = 'hidden';
} else {
    $desc = $l[$d['level']];
    // $hden = 'hidden';
}
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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item">Users </li>
                        <li class="breadcrumb-item active">Edit User (<?= $d['username']; ?>)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                                enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="profile-title">
                                            <label class="form-label">Foto</label>
                                            <div class="media">
                                                <img class="img-70 rounded-circle" alt=""
                                                    src="<?= base_url(); ?>_uploads/f_usr/<?= $ft; ?>" id="imgPreview"
                                                    alt="Image Preview">
                                                <!-- <div class="media-body">
                                      <h5 class="mb-1"><?= $d['nama']; ?></h5>
                                      <p><?= $desc; ?></p>
                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <label class="form-label">Nama</label> -->
                                            <input class="form-control" id="imgUpload" name="foto" type="file" accept="image/*" required>
                                            <small style="color: red;">Format File : png, jpg, jpeg</small>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Foto tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-success-gradien" name="update_foto" type="submit">Update
                                        Foto</button>
                                </div>
                            </form>
                            <hr>
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control" name="username" id="username"
                                        value="<?= $d['username']; ?>" required>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message"></label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Username tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-primary-gradien" name="update_username" type="submit">Update
                                        Username</button>
                                </div>
                            </form>
                            <hr>
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="post"
                                enctype="multipart/form-data">
                                <!-- <div class="mb-3">
                                    <label class="form-label">Password Lama</label>
                                    <input type="password" class="form-control password" name="password_lama"
                                        placeholder="Password Lama" required>
                                    <div class="invalid-feedback">
                                        Password Lama tidak boleh kosong.
                                    </div>
                                </div> -->
                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control password" name="password"
                                        placeholder="Password Baru" required>
                                    <div class="media">
                                        <div class="text-end switch-sm switch-outline">
                                            <label class="switch">
                                                <input type="checkbox" class="view_pass"><span class="switch-state"
                                                    data-container="body" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Lihat Password"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Password Baru tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-danger-gradien" name="update_password" type="submit">Update
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card g-3 needs-validation form theme-form" novalidate="" action="" method="post"
                        enctype="multipart/form-data">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" value="<?= $d['nama']; ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Nama tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="<?= $d['email']; ?>" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Email tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Handphone</label>
                                        <input class="form-control" type="text" name="no_hp" value="<?= $d['no_hp']; ?>"
                                            onkeypress="return hanyaAngka(event)">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pendidikan Terakhir</label>
                                        <input class="form-control" type="text" name="pendidikan"
                                            value="<?= $d['pendidikan']; ?>" placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat"
                                            rows="1"> <?= $d['alamat']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kota Kelahiran Lahir</label>
                                        <input class="form-control" type="text" name="t_lahir"
                                            value="<?= $d['t_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir <small style="color: orange;">(Format:
                                                bulan/hari/tahun)</small></label>
                                        <input type="text" class="datepicker-here form-control digits"
                                            value="<?= date('m/d/Y' ,strtotime($d['tgl_lahir'])); ?>" data-language="en"
                                            name="tgl_lahir">

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select js-example-basic-single" name="jk"
                                            id="floatingSelect" aria-label="Jenis Kelamin">
                                            <?php 
                                                $g = array('M' => 'Pria', 'W' => 'Wanita');
                                            ?>
                                            <option value="<?= $d['jk']; ?>"><?= $g[$d['jk']]; ?></option>
                                            <option value="M">Pria</option>
                                            <option value="W">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Level</label>
                                        <select class="form-select js-example-basic-single" name="level"
                                            id="floatingSelect" aria-label="Pilih Level" required>
                                            <?php 
                                                $l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Karu', '4' => 'Pengawas', '5' => 'Bendahara', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
                                            ?>
                                            <option value="<?= $d['level']; ?>"><?= $l[$d['level']]; ?></option>
                                            <!-- <option value="">Level</option> -->
                                            <!-- <option value="1">Admin Super</option> -->
                                            <option value="2">Anggota</option>
                                            <option value="3">Karu</option>
                                            <option value="4">Pengawas</option>
                                            <option value="5">Admin</option>
                                            <option value="6">Pimpinan</option>
                                            <option value="7">Penerima Hak Akses</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Level tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Regu</label>
                                        <select class="form-select js-example-basic-single" name="regu"
                                            id="floatingSelect" aria-label="Pilih Level">
                                            <option value="<?= $d['regu']; ?>"><?= $d['nm_regu']; ?></option>
                                            <?php 
                                                $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                                                while($r=$regu->fetch_assoc()) :
                                            ?>
                                            <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-info-gradien" name="update_profil" type="submit">Update
                                        Profil</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
                //update foto
                if (isset($_POST['update_foto'])) {
                    // $id = $d['id'];
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    // var_dump($file_tmp);
                    // die();
                    $ext_valid = array('png','jpg','jpeg','gif' );
                    $name_tmp  = $_FILES['foto']['name'];
                    $x         = explode('.', $name_tmp);
                    $extend    = strtolower(end($x));
                    $time      = date('dmYHis');
                    $foto      = $id . '_' . $time . '.' . $extend;
                    $path      = '_uploads/f_usr/';
                                            
                    //cek ekstensi
                        if (in_array($extend, $ext_valid)===true) {
                            //Compress Image
                            fotoCompressResize($foto,$file_tmp,$path);
                            //inster ke database
                            $db->query("UPDATE users SET f_usr='$foto', updated_at=NOW() WHERE id='$id'");
                            unlink('_uploads/f_usr/' . $d['f_usr']);
                            //notif
                            sweetAlert('users/edit/'.$id,'sukses','Berhasil !','Foto berhasil diupdate');
                        } else {
                            sweetAlert('users/edit/'.$id,'error','Error !' , 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                        }
                }

                //update username
                if (isset($_POST['username'])) {
                    $username = $db->real_escape_string($_POST['username']);
                    if ($username==$d['username']) {
                        $cek_uname = $db->query("SELECT username FROM users WHERE username!='$d[username]' AND username='$username'");
                    } else {
                        $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                    }
                    if ($cek_uname->num_rows==0) {
                        $db->query("UPDATE users SET username='$username', updated_at=NOW() WHERE id='$id'");
                        sweetAlert('users/edit/'.$id,'sukses','Berhasil !','Username berhasil diupdate');
                    } else {
                        sweetAlert('users/edit/'.$id,'error','Error !','Username tidak tersedia, Silahkan coba dengan username yang lainnya.');
                    }
                }

                //update_password
                if (isset($_POST['update_password'])) {
                    // $password_lama = $db->real_escape_string($_POST['password_lama']);
                    $password      = $db->real_escape_string(password_hash($_POST['password'], PASSWORD_DEFAULT));
                    // $pl            = $d['password'];
                    $db->query("UPDATE users SET password='$password', updated_at=NOW() WHERE id='$id'");
                    sweetAlert('users/edit/'.$id,'sukses','Berhasil !','Password telah diupdate');
                }

                //update profil
                if (isset($_POST['update_profil'])) {
                    $email      = $db->real_escape_string($_POST['email']);
                    $no_hp      = $db->real_escape_string($_POST['no_hp']);
                    $nama       = $db->real_escape_string($_POST['nama']);
                    $pendidikan = strtoupper($db->real_escape_string($_POST['pendidikan']));
                    $alamat     = $db->real_escape_string($_POST['alamat']); 
                    $t_lahir    = $db->real_escape_string($_POST['t_lahir']);
                    $tgl_lahir  = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir'])));
                    $jk         = $db->real_escape_string($_POST['jk']);
                    $level      = $db->real_escape_string($_POST['level']);
                    $regu       = $db->real_escape_string($_POST['regu']);
                        //cek email
                        if ($email==$d['email']) {
                            $cek_email = $db->query("SELECT email FROM users WHERE email!='$d[email]' AND email='$email'");
                        } else {
                            $cek_email = $db->query("SELECT email FROM users WHERE email='$email'");
                        }
                            if($cek_email->num_rows==0){
                                if ($level==3) {
                                    $db->query("UPDATE users SET email='$email', no_hp='$no_hp', nama='$nama', pendidikan='$pendidikan', alamat='$alamat', t_lahir='$t_lahir', tgl_lahir='$tgl_lahir', jk='$jk', level='$level',regu='$regu',updated_at=NOW() WHERE id='$id'");
                                    $db->query("UPDATE regu SET karu='$id' WHERE id_regu='$regu'");
                                    sweetAlert('users/edit/'.$id,'sukses','Berhasil !','Data User berhasil diupdate');
                                } else {
                                    $db->query("UPDATE users SET email='$email', no_hp='$no_hp', nama='$nama', pendidikan='$pendidikan', alamat='$alamat', t_lahir='$t_lahir', tgl_lahir='$tgl_lahir', jk='$jk', level='$level',regu='$regu',updated_at=NOW() WHERE id='$id'");
                                    sweetAlert('users/edit/'.$id,'sukses','Berhasil !','Data User berhasil diupdate');
                                }
                            } else{
                                sweetAlert('users/edit/'.$id,'error','Error !', 'Email tidak tersedia, silahkan menggunakan email lain.');
                            }
                    }
           ?>
</div>
<?php } ?>
<?php break; ?>
<?php case 'aktif' : 
    $csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==true) {
        $id = $_POST['id'];
        // $ft = $_POST['foto'];
        $us = $_POST['username'];
        $db->query("UPDATE users SET status='Y', updated_at=NOW(), deleted_at=NULL WHERE id='$id'");
        sweetAlert('users-blok','sukses','Berhasil !','Data users dengan username ('.$us.') berhasil diaktifikan kembali.');
    } else {
        sweetAlert('out','error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
    }
    ?>

<?php break; ?>
<?php case 'blokir' : 
    $csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==true) {
        $id = $_POST['id'];
        // $ft = $_POST['foto'];
        $us = $_POST['username'];
        $db->query("UPDATE users SET status='N', deleted_at=NOW() WHERE id='$id'");
        sweetAlert('users','sukses','Data Berhasil blokir.!','Data users dengan username ('.$us.') berhasil diblokir untuk sementara waktu.');
    } else {
        sweetAlert('out','error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
    }
    ?>

<?php break; ?>
<?php case 'delete-temp' : 
    $csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==true) {
        $id = $_POST['id'];
        $ft = $_POST['foto'];
        $us = $_POST['username'];
        $db->query("UPDATE users SET status='N', deleted_at=NOW() WHERE id='$id'");
        sweetAlert('users','sukses','Data Berhasil blokir.!','Data users dengan username ('.$us.') berhasil dihapus sementara.');
    } else {
        sweetAlert('out','error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
    }
    ?>

<?php break; ?>
<?php case 'delete' :
    $csrf = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==true) {
        $id = $_POST['id'];
        $ft = $_POST['foto'];
        $us = $_POST['username'];
        // $d = $db->query("SELECT * FROM users WHERE username='$us'")->fetch_assoc();
        if (empty($ft)) {
            $db->query("DELETE FROM users WHERE id='$id'");
            sweetAlert('users-blok','sukses','Data Berhasil dihapus.!','Data users dengan username ('.$us.') berhasil dihapus');
        } else {
            unlink('_uploads/f_usr/' . $ft);
            $db->query("DELETE FROM users WHERE id='$id'");
            sweetAlert('users-blok','sukses','Data Berhasil dihapus.!','Data users dengan username ('.$us.') berhasil dihapus');
        }
    } else {
        sweetAlert('out','error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
    }
    ?>

<?php break; ?>
<?php case 'setting' :
$id = $_SESSION['id_usr'];
$cek = $db->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
// var_dump($cek_regu['regu']);
// die();
if (empty($cek['regu'])) {
    $d = $db->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
} else {
    $d = $db->query("SELECT * FROM users a, regu b WHERE a.regu=b.id_regu AND a.id='$id'")->fetch_assoc();
}
if (empty($d)) {
    sweetAlert('users','Error !','error','Data tidak ditemukan');
} else {
if (empty($d['f_usr'])) {
    $ft = 'default.png';
} else {
    $ft = $d['f_usr'];
}
$l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Komandan Regu', '4' => 'Pengawas', '5' => 'Bendahara', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
if ($d['level']=='2') {
    $desc = $l[$d['level']].' Regu '.$d['nm_regu'];
    $hden = '';
} elseif(empty($d['regu'])){
    $desc = $l[$d['level']];
    // $hden = 'hidden';
} else {
    $desc = $l[$d['level']];
    // $hden = 'hidden';
}
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
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                                enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="profile-title">
                                            <label class="form-label">Foto</label>
                                            <div class="media">
                                                <img class="img-70 rounded-circle" alt=""
                                                    src="<?= base_url(); ?>_uploads/f_usr/<?= $ft; ?>" id="imgPreview"
                                                    alt="Image Preview">
                                                <!-- <div class="media-body">
                                      <h5 class="mb-1"><?= $d['nama']; ?></h5>
                                      <p><?= $desc; ?></p>
                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <label class="form-label">Nama</label> -->
                                            <input class="form-control" id="imgUpload" name="foto" type="file" accept="image/*" required>
                                            <small style="color: red;">Format File : png, jpg, jpeg</small>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Foto tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-success-gradien" name="update_foto" type="submit">Update
                                        Foto</button>
                                </div>
                            </form>
                            <hr>
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control" name="username" id="username"
                                        value="<?= $d['username']; ?>" required>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message"></label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Username tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-primary-gradien" name="update_username" type="submit">Update
                                        Username</button>
                                </div>
                            </form>
                            <hr>
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Password Lama</label>
                                    <input type="password" class="form-control password" name="password_lama"
                                        placeholder="Password Lama" required>
                                    <div class="invalid-feedback">
                                        Password Lama tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control password" name="password"
                                        placeholder="Password Baru" required>
                                    <div class="media">
                                        <div class="text-end switch-sm switch-outline">
                                            <label class="switch">
                                                <input type="checkbox" class="view_pass"><span class="switch-state"
                                                    data-container="body" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" title="Lihat Password"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Password Baru tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-danger-gradien" name="update_password" type="submit">Update
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card g-3 needs-validation form theme-form" novalidate="" action="" method="post"
                        enctype="multipart/form-data">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" value="<?= $d['nama']; ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            Nama tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="right"
                                            title="untuk mengubah email silahkan klik menu ubah email">Email <i
                                                class="fa fa-info-circle"></i></label>
                                        <input class="form-control" type="email" value="<?= $d['email']; ?>" disabled>
                                    </div>
                                    <div class="invalid-feedback">
                                        Email tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Handphone</label>
                                        <input class="form-control" type="text" name="no_hp" value="<?= $d['no_hp']; ?>"
                                            onkeypress="return hanyaAngka(event)">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pendidikan Terakhir</label>
                                        <input class="form-control" type="text" name="pendidikan"
                                            value="<?= $d['pendidikan']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat"
                                            rows="1"> <?= $d['alamat']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kota Kelahiran Lahir</label>
                                        <input class="form-control" type="text" name="t_lahir"
                                            value="<?= $d['t_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir <small style="color: orange;">(Format:
                                                bulan/hari/tahun)</small></label>
                                        <input type="text" class="datepicker-here form-control digits"
                                            value="<?= date('m/d/Y' ,strtotime($d['tgl_lahir'])); ?>" data-language="en"
                                            name="tgl_lahir">

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select js-example-basic-single" name="jk"
                                            id="floatingSelect" aria-label="Jenis Kelamin">
                                            <?php 
                                                $g = array('M' => 'Pria', 'W' => 'Wanita');
                                            ?>
                                            <option value="<?= $d['jk']; ?>"><?= $g[$d['jk']]; ?></option>
                                            <option value="M">Pria</option>
                                            <option value="W">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-12 col-md-12 col-xs-12 mx-auto">
                                    <button class="btn btn-info-gradien" name="update_profil" type="submit">Update
                                        Profil</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
                //update foto
                if (isset($_POST['update_foto'])) {
                    // $id = $d['id'];
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    // var_dump($file_tmp);
                    // die();
                    $ext_valid = array('png','jpg','jpeg','gif' );
                    $name_tmp  = $_FILES['foto']['name'];
                    $x         = explode('.', $name_tmp);
                    $extend    = strtolower(end($x));
                    $time      = date('dmYHis');
                    $foto      = $id . '_' . $time . '.' . $extend;
                    $path      = '_uploads/f_usr/';
                                            
                    //cek ekstensi
                        if (in_array($extend, $ext_valid)===true) {
                            //Compress Image
                            fotoCompressResize($foto,$file_tmp,$path);
                            //inster ke database
                            $db->query("UPDATE users SET f_usr='$foto', updated_at=NOW() WHERE id='$id'");
                            unlink('_uploads/f_usr/' . $d['f_usr']);
                            //notif
                            sweetAlert('setting','sukses','Berhasil !','Foto berhasil diupdate');
                        } else {
                            sweetAlert('setting','error','Error !' , 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                        }
                }

                //update username
                if (isset($_POST['username'])) {
                    $username = $db->real_escape_string($_POST['username']);
                    if ($username==$d['username']) {
                        $cek_uname = $db->query("SELECT username FROM users WHERE username!='$d[username]' AND username='$username'");
                    } else {
                        $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                    }
                    if ($cek_uname->num_rows==0) {
                        $db->query("UPDATE users SET username='$username', updated_at=NOW() WHERE id='$id'");
                        sweetAlert('setting','sukses','Berhasil !','Username berhasil diupdate');
                    } else {
                        sweetAlert('setting','error','Error !','Username tidak tersedia, Silahkan coba dengan username yang lainnya.');
                    }
                }

                //update_password
                if (isset($_POST['update_password'])) {
                    $password_lama = $db->real_escape_string($_POST['password_lama']);
                    $password      = $db->real_escape_string(password_hash($_POST['password'], PASSWORD_DEFAULT));
                    $pl            = $d['password'];
                    
                    if (password_verify($password_lama, $pl)) {
                        $db->query("UPDATE users SET password='$password', updated_at=NOW() WHERE id='$id'");
                        sweetAlert('setting','sukses','Berhasil !','Password telah diupdate');
                    } else {
                        sweetAlert('setting','error','Error !','Password Lama Salah, Silahkan ulangi password lama anda. jika lupa password segera menghubungi Admin Website.');
                    }
                }

                //update profil
                if (isset($_POST['update_profil'])) {
                    // $email      = $db->real_escape_string($_POST['email']);
                    $no_hp      = $db->real_escape_string($_POST['no_hp']);
                    $nama       = $db->real_escape_string($_POST['nama']);
                    $pendidikan = strtoupper($db->real_escape_string($_POST['pendidikan']));
                    $alamat     = $db->real_escape_string($_POST['alamat']); 
                    $t_lahir    = $db->real_escape_string($_POST['t_lahir']);
                    $tgl_lahir  = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir'])));
                    $jk         = $db->real_escape_string($_POST['jk']);
                    // $level      = $db->real_escape_string($_POST['level']);
                    // $regu       = $db->real_escape_string($_POST['regu']);

                    //update
                    $db->query("UPDATE users SET no_hp='$no_hp', nama='$nama', pendidikan='$pendidikan', alamat='$alamat', t_lahir='$t_lahir', tgl_lahir='$tgl_lahir', jk='$jk', updated_at=NOW() WHERE id='$id'");
                    sweetAlert('setting','sukses','Berhasil !','Data User berhasil diupdate');
                
                    }
           ?>
</div>
<?php } ?>
<?php break; ?>
<?php case 'password' :
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
            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="d-grid gap-2 col-lg-4 col-md-12 mx-auto form-floating position-relative">
                        <input type="password" class="form-control password" name="password" required>
                        <label for="floatingInput">Password Baru</label>
                        <div class="media">
                            <div class="text-end switch-sm switch-outline">
                                <label class="switch">
                                    <input type="checkbox" class="view_pass"><span class="switch-state"
                                        data-container="body" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Lihat Password"></span>
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
                    
                    if ($csrf==true) {
                        $db->query("UPDATE users SET password = '$password', updated_at = NOW() WHERE id='$id'");
                        javascript('password','alert-sukses-3','Password berhasil diupdate. Silahkan login kembali untuk mencoba password baru anda.');
                    } else {
                        javascript('','alert-error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
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