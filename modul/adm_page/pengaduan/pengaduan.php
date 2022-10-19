<?php

/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-15 12:02:17
 * @modify date 2021-07-15 12:02:17
 * @desc [description]
 */

include '_func/.identity.php';
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
if ($csrf == false) {
    sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir atau akun anda sudah login diperangkat lain, silahkan login ulang');
} else {
    // aut(array(1));
    $a = $_GET['a'];
    switch ($a) {
        default:
            aut(array(1, 4, 5, 6));
            if ($_SESSION['level'] == '1' or $_SESSION['level'] == '5') {
                $hide = '';
            } else {
                $hide = 'hidden';
            }

?>
            <title>Pengaduan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Data Pengaduan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Pengaduan </li>
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
                                        <a href="<?= base_url(); ?>pengaduan/add-adm" class="btn btn-primary-gradien" type="button">Tambah
                                            Data</a>
                                    </div>
                                    <br>
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <!-- <th>ID</th> -->
                                                <th>Nama</th>
                                                <th>Pengaduan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($_SESSION['level'] == '1' or $_SESSION['level'] == '5') {
                                                $us = $db->query("SELECT *, a.status as stat, a.regu as reg FROM pengaduan a, users b WHERE a.adm_peng=b.id ORDER BY a.tgl_peng ASC");
                                            } elseif ($_SESSION['level'] == '2' or $_SESSION['level'] == '3') {
                                                $us = $db->query("SELECT *, a.status as stat, a.regu as reg FROM pengaduan a, users b WHERE a.adm_peng=b.id AND a.adm_peng='$_SESSION[id_usr]' ORDER BY a.tgl_peng ASC");
                                            }

                                            // $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu ORDER BY a.tgl_giat ASC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                                $rg = $db->query("SELECT * FROM regu WHERE id_regu='$u[reg]'")->fetch_assoc();
                                                if ($u['stat'] == 'P') {
                                                    $stat  = '<span class="badge rounded-pill badge-primary"><i class="fa fa-refresh"></i>  Proses Verifikasi</span>';
                                                    $dist  = '';
                                                    $diss  = '';
                                                } elseif ($u['stat'] == 'T') {
                                                    $stat  = '<span class="badge rounded-pill badge-warning" style="color: #000000;" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Diteruskan ke Regu ' . $rg['nm_regu'] . '"><i class="fa fa-mail-forward"></i>  Diteruskan</span>';
                                                    $dist  = 'disabled';
                                                    $diss  = 'disabled';
                                                } elseif ($u['stat'] == 'S') {
                                                    $stat  = '<span class="badge rounded-pill badge-success"><i class="fa fa-check-circle"></i>  Selesai</span>';
                                                    $dist  = 'disabled';
                                                    $diss  = 'disabled';
                                                } else {
                                                    $stat  = '<span class="badge rounded-pill badge-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Alasan Penolakkan : ' . $u['ket_peng'] . '"><i class="fa fa-times-circle"></i>  Ditolak</span>';
                                                    $dist  = 'disabled';
                                                    $diss  = 'disabled';
                                                };

                                                if ($_SESSION['id_usr'] == $u['adm_peng'] or $_SESSION['level'] == '1') {
                                                    $disab = '';
                                                } else {
                                                    $disab = 'disabled';
                                                };
                                            ?>
                                                <tr>
                                                    <td valign="top"><?= $no++; ?></td>
                                                    <!-- <td valign="top"><?= $u['id_peng']; ?></td> -->
                                                    <td valign="top"><?= $u['nama_p']; ?> <br>
                                                        <small><?= $u['no_hp_p']; ?></small> <br>
                                                        <small><?= $u['email_p']; ?></small> <br>
                                                    </td>
                                                    <td valign="top"><?= judul($u['j_peng'], 50); ?><br>
                                                        <small><?= hari(date('D', strtotime($u['tgl_peng']))) . ', ' . tgl_indo(date('Y-m-d', strtotime($u['tgl_peng']))) . ' ' . date('H:i:s', strtotime($u['tgl_peng'])); ?></small>
                                                    </td>
                                                    <td valign="top"><?= $stat ?></td>
                                                    <td valign="top">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url(); ?>pengaduan/edit/<?= $u['slug']; ?>" class="btn btn-info-gradien <?= $diss; ?> <?= $disab; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Pengaduan" <?= $hide; ?>><i class="fa fa-pencil"></i></a>
                                                            <a href="<?= base_url(); ?>pengaduan/teruskan/<?= $u['slug']; ?>" class="btn btn-warning-gradien <?= $dist; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Teruskan Pengaduan" <?= $hide; ?>><i class="fa fa-mail-forward"></i></a>
                                                            <a href="<?= base_url(); ?>pengaduan/tolak/<?= $u['slug']; ?>" class="btn btn-danger-gradien <?= $dist; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tolak Pengaduan" <?= $hide; ?>><i class="fa fa-times-circle"></i></a>
                                                            <a href="<?= base_url(); ?>p/pengaduan/<?= $u['slug']; ?>" target="_blank" class="btn btn-primary-gradien" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Pengaduan"><i class="fa fa-info-circle"></i></a>

                                                            <form action="<?= base_url(); ?>pengaduan/delete" method="POST" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Pengaduan" <?= $hide; ?>>
                                                                <input type="hidden" name="id_peng" value="<?= $u['id_peng']; ?>">
                                                                <button class="btn btn-danger-gradien <?= $disab; ?>" onclick="return hapus()"><i class="fa fa-trash"></i></button>
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
        case 'add-adm':
            aut(array(1, 5, 6));
        ?>
            <title>Input Pengaduan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Input Pengaduan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="message-circle"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Pengaduan </li>
                                    <li class="breadcrumb-item active">Input Pengaduan </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                <div class="row g-2">
                                    <div class="col-lg-4 col-md-12">
                                        <label">Nama :</label>
                                            <input type="text" class="form-control" name="nama_p" required>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Nama tidak boleh kosong.
                                            </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <label">Email :</label>
                                            <input type="email" class="form-control" name="email_p" required>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Email tidak boleh kosong.
                                            </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <label">Nomor HP :</label>
                                            <input type="text" class="form-control" name="no_hp_p" onkeypress="return hanyaAngka(event)" required>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Nomor HP tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label">Judul Pengaduan :</label>
                                            <input type="text" name="j_peng" class="form-control" required>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Judul Pengaduan tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label">Isi Pengaduan :</label>
                                            <textarea name="peng" class="form-control editor" required></textarea>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Isi Pengaduan tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <!-- <div class="row g-2">
                    <div class="col-lg-9 col-md-12">
                        <label">Dokumentasi Video : <small style="color: green;">Pilih beberapa video</small></label>
                        <input class="form-control" name="video[]" type="file" accept="video/*" multiple>
                        <small style="color: red;">Format File : 3gp, mp4</small>
                    </div>
                </div> -->
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label">Bukti Pengaduan : <small style="color: green;">Pilih beberapa gambar atau
                                                video</small></label>
                                            <input class="form-control" name="foto[]" type="file" accept="image/jpeg, image/png, video/mp4" multiple required>
                                            <small style="color: red;">Format File : jpg, png, jpeg, jpe, 3gp, mp4, mp4v, mpg4, mov,
                                                qt</small><br>
                                            <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka loading akan
                                                lebih lama.</small>
                                            <div class="invalid-feedback">
                                                Bukti Pengaduan tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                    <button class="btn btn-primary-gradien" name="simpan" type="submit">Ajukan Pengaduan</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['simpan'])) {
                                $id             = $db->real_escape_string(acakhba('12'));
                                $nama_p         = $db->real_escape_string($_POST['nama_p']);
                                $email_p        = $db->real_escape_string($_POST['email_p']);
                                $no_hp_p        = $db->real_escape_string($_POST['no_hp_p']);
                                $j_peng         = $db->real_escape_string($_POST['j_peng']);
                                $slug           = $db->real_escape_string(uid('2') . '-' . slug($_POST['j_peng']));
                                $peng           = $_POST['peng'];
                                $ket_peng       = $db->real_escape_string('Sedang diverifikasi');
                                $adm_peng       = $_SESSION['id_usr'];
                                $jumlah_foto    = count($_FILES['foto']['name']);
                                // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                                // var_dump($id,$nama_p,$email_p,$no_hp_p,$j_peng,$adm_peng,$jumlah_foto);
                                // die();


                                if ($jumlah_foto > 0) {
                                    for ($f = 0; $f < $jumlah_foto; $f++) {
                                        // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                                        $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                                        $name_tmp_f  = $_FILES['foto']['name'][$f];
                                        $ext_valid_f = array('png', 'jpg', 'jpeg', 'jpe', '3gp', 'mp4', 'mp4v', 'mpg4', 'mov', 'qt');
                                        $x_f         = explode('.', $name_tmp_f);
                                        $extend_f    = strtolower(end($x_f));
                                        $time        = date('dmYHis');
                                        $foto        = $id . '-' . $f . $time . '.' . $extend_f;
                                        // $name        = 'giat_'.$f.$time. '.';
                                        if ($extend_f == 'png' or $extend_f == 'jpg' or $extend_f == 'jpeg' or $extend_f == 'jpe') {
                                            $path_f      = '_uploads/f_peng/' . $foto;
                                        } else {
                                            $path_v      = '_uploads/v_peng/' . $foto;
                                        }

                                        if (in_array($extend_f, $ext_valid_f) === true) {
                                            if ($extend_f == 'png' or $extend_f == 'jpg' or $extend_f == 'jpeg' or $extend_f == 'jpe') {
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
                                                            <p>Halo ' . $nama_p . ',</p>
                                                            <p>Pengaduan anda sedang kami verifikasi silahkan cek pengaduan anda secara berkala dengan mengklik ID pengaduan anda dibawah ini :</p>
                                                            <p style="text-align: center"><a href="' . $base_url . 'p/pengaduan/' . $slug . '" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">' . $id . '</a></p>
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
                                        sweetAlert($m, 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                    } else {
                                        $db->query("INSERT INTO pengaduan VALUES ('$id','$nama_p','$email_p','$no_hp_p','$j_peng','$slug','$peng','P','TR','NULL','$adm_peng',NOW(),'$ket_peng',NULL,NOW(),NOW(),NULL)");
                                        sweetAlert('pengaduan', 'sukses', 'Berhasil !', 'Data Pengaduan dengan (ID : ' . $id . ') Berhasil diinput.');
                                    }
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>
            <?php
        case 'teruskan':
            aut(array(1, 5));
            $id = $_GET['id'];
            $d = $db->query("SELECT *, a.status as stat FROM pengaduan a, users b WHERE a.adm_peng=b.id AND a.slug='$id'")->fetch_assoc();
            if ($d['stat'] !== 'P') {
                sweetAlert('pengaduan', 'error', 'Pengaduan tidak dapat diubah.!', 'Maaf data pengaduan dengan url (' . $id . ') tidak dapat diubah karena status pengaduan sudah berubah.');
            } else {
            ?>
                <title>Teruskan Pengaduan | <?= $title; ?></title>
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-6">
                                    <h3>Teruskan Pengaduan</h3>
                                </div>
                                <div class="col-6">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="message-circle"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">Pengaduan </li>
                                        <li class="breadcrumb-item active">Teruskan Pengaduan </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="150px"></th>
                                            <th width="20px"></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td valign="top"><b>Judul Pengaduan</b> </td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"><a href="<?= base_url(); ?>"><?= $d['j_peng']; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Nama Pelapor</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= r_nama($d['nama_p']); ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Email Pelapor</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= r_email($d['email_p']); ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Waktu Pengaduan</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= hari(date('D', strtotime($d['tgl_peng']))) . ', ' . tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))) . ' ' . date('H:i:s', strtotime($d['tgl_peng'])); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                    <div class="row g-2">
                                        <div class="col-lg-12">
                                            <label>Teruskan ke Regu :</label>
                                            <select class="form-select js-example-basic-single" name="regu" id="floatingSelect" aria-label="Pilih Regu" required>
                                                <option value="">Pilih Regu</option>
                                                <?php
                                                $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                                                while ($r = $regu->fetch_assoc()) :
                                                ?>
                                                    <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Regu tidak boleh kosong.
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-grid gap-2 col-lg-12 col-md-12 mx-auto">
                                        <button class="btn btn-info-gradien" name="simpan" type="submit">Teruskan Laporan
                                            Pengaduan</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['simpan'])) {
                                    $id      = $d['id_peng'];
                                    $regu    = $db->real_escape_string($_POST['regu']);
                                    $email_p = $d['email_p'];
                                    $nama_p  = $d['nama_p'];
                                    $rg      = $db->query("SELECT * FROM regu WHERE id_regu='$regu'")->fetch_assoc();
                                    $nm_regu = $rg['nm_regu'];
                                    $ket_peng = $db->real_escape_string('Sedang diteruskan ke Regu ' . $nm_regu);
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
                                                            <td style="text-align: right; color:#999"><span>Email Resmi dari UPT Perparkiran Dinas Perhubungan Kota Pekanbaru</span></td>
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
                                                        <h6 style="font-weight: 600">Status Pengaduan Anda Sudah di Teruskan.</h6>
                                                        <p>Halo ' . $nama_p . ',</p>
                                                        <p>Pengaduan anda sudah di teruskan ke <b>Regu ' . $nm_regu . '</b> untuk segera di tindak lanjuti, silahkan cek pengaduan anda secara berkala dengan mengklik ID pengaduan anda dibawah ini :</p>
                                                        <p style="text-align: center"><a href="' . $base_url . 'pengaduan/detail-pengaduan/' . $slug . '" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">' . $id . '</a></p>
                                                        <p>Jika pengaduan anda sudah selesai diproses oleh <b>Regu ' . $nm_regu . '</b> UPT Perparkiran, kami akan memberitahu melalui surat elektronik ini secara otomatis.</p>
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
                                        sweetAlert($m, 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                    } else {
                                        $db->query("UPDATE pengaduan SET status='T', regu='$regu', ket_peng='$ket_peng', tgl_teruskan=NOW() WHERE id_peng='$id'");
                                        sweetAlert('pengaduan', 'sukses', 'Berhasil !', 'Data Pengaduan dengan (ID : ' . $id . ') Berhasil di Teruskan ke Regu ' . $nm_regu . '.');
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <?php break; ?>
        <?php
        case 'proses':
            aut(array(2, 3));
            $rg = $db->query("SELECT * FROM regu WHERE id_regu='$_SESSION[regu]'")->fetch_assoc();
        ?>
            <title>Daftar Pengaduan Regu <?= $rg['nm_regu']; ?> | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Daftar Pengaduan Regu <?= $rg['nm_regu']; ?></h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Pengaduan </li>
                                    <li class="breadcrumb-item active">Pengaduan Regu <?= $rg['nm_regu']; ?> </li>
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
                                    <br>
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <!-- <th>ID</th> -->
                                                <th>Nama</th>
                                                <th>Pengaduan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT *, a.status as stat, a.regu as reg FROM pengaduan a, users b WHERE a.adm_peng=b.id AND a.regu='$_SESSION[regu]' ORDER BY a.tgl_peng ASC");

                                            // $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu ORDER BY a.tgl_giat ASC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                                $rg = $db->query("SELECT * FROM regu WHERE id_regu='$u[reg]'")->fetch_assoc();
                                                if ($u['stat'] == 'P') {
                                                    $stat = '<span class="badge rounded-pill badge-primary"><i class="fa fa-refresh"></i>  Proses</span>';
                                                    $dis  = '';
                                                } elseif ($u['stat'] == 'T') {
                                                    $stat = '<span class="badge rounded-pill badge-warning" style="color: #000000;"><i class="fa fa-mail-forward"></i>  Diteruskan ke Regu ' . $rg['nm_regu'] . '</span>';
                                                    $dis  = '';
                                                } elseif ($u['stat'] == 'S') {
                                                    $stat = '<span class="badge rounded-pill badge-success"><i class="fa fa-check-circle"></i>  Selesai</span>';
                                                    $dis  = 'disabled';
                                                } else {
                                                    $stat = '<span class="badge rounded-pill badge-danger"><i class="fa fa-times-circle"></i>  Ditolak</span>';
                                                    $dis  = '';
                                                } ?>
                                                <tr>
                                                    <td valign="top"><?= $no++; ?></td>
                                                    <!-- <td valign="top"><?= $u['id_peng']; ?></td> -->
                                                    <td valign="top"><?= $u['nama_p']; ?> <br>
                                                        <small><?= $u['no_hp_p']; ?></small> <br>
                                                        <small><?= $u['email_p']; ?></small> <br>
                                                    </td>
                                                    <td valign="top"><?= judul($u['j_peng'], 50); ?><br>
                                                        <small><?= hari(date('D', strtotime($u['tgl_peng']))) . ', ' . tgl_indo(date('Y-m-d', strtotime($u['tgl_peng']))) . ' ' . date('H:i:s', strtotime($u['tgl_peng'])); ?></small>
                                                    </td>
                                                    <td valign="top"><?= $stat ?></td>
                                                    <td valign="top">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url(); ?>pengaduan/selesai/<?= $u['slug']; ?>" class="btn btn-success-gradien <?= $dis; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Input Penyelesaian" <?= $hide; ?>><i class="fa fa-check-circle"></i></a>
                                                            <a href="<?= base_url(); ?>p/pengaduan/<?= $u['slug']; ?>" target="_blank" class="btn btn-primary-gradien" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Pengaduan"><i class="fa fa-info-circle"></i></a>
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
        case 'selesai':
            aut(array(2, 3));
            $id = $_GET['id'];
            $d = $db->query("SELECT *, status as stat FROM pengaduan WHERE slug='$id'")->fetch_assoc();
            if ($d['stat'] !== 'T') {
                sweetAlert('pengaduan/proses', 'error', 'Pengaduan tidak dapat diproses.!', 'Maaf data pengaduan dengan url (' . $id . ') tidak dapat diproses karena status pengaduan belum diteruskan atau sudah selesai.');
            } else {
            ?>
                <title>Input Penyelesaian | <?= $title; ?></title>
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-6">
                                    <h3>Input Penyelesaian</h3>
                                </div>
                                <div class="col-6">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="message-circle"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">Pengaduan </li>
                                        <li class="breadcrumb-item active">Input Penyelesaian</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="150px"></th>
                                            <th width="20px"></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td valign="top"><b>ID Laporan</b> </td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"><?= $d['id_peng']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Nama Pelapor</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"> <?= r_nama($d['nama_p']); ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Email Pelapor</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"> <?= r_email($d['email_p']); ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Judul Laporan</b> </td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"><?= $d['j_peng']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Isi Laporan</b> </td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"><?= judul($d['peng'], 100); ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Bukti Laporan</b> </td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top"> <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Klik untuk melihat detail laporan">Terlampir</a></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Waktu Pelaporan</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td valign="top">
                                                <?= hari(date('D', strtotime($d['tgl_peng']))) . ', ' . tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))) . ' ' . date('H:i:s', strtotime($d['tgl_peng'])); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                    <div class="row g-2">
                                        <div class="col-lg-12 col-md-12">
                                            <label">Keterangan Penyelesaian :</label>
                                                <textarea name="ket_sel" class="form-control editor" required></textarea>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Keterangan Penyelesaian tidak boleh kosong.
                                                </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row g-2">
                    <div class="col-lg-9 col-md-12">
                        <label">Dokumentasi Video : <small style="color: green;">Pilih beberapa video</small></label>
                        <input class="form-control" name="video[]" type="file" accept="video/*" multiple>
                        <small style="color: red;">Format File : 3gp, mp4</small>
                    </div>
                </div> -->
                                    <div class="row g-2">
                                        <div class="col-lg-12 col-md-12">
                                            <label">Dokumentasi : <small style="color: green;">Pilih beberapa gambar atau
                                                    video</small></label>
                                                <input class="form-control" name="foto[]" type="file" accept="image/jpeg, image/png, video/3gpp, video/mp4" multiple required>
                                                <small style="color: red;">Format File : jpg, png, jpeg, jpe, mp4</small><br>
                                                <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka loading akan
                                                    lebih lama.</small>
                                                <div class="invalid-feedback">
                                                    Dokumentasi tidak boleh kosong.
                                                </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                        <button class="btn btn-primary-gradien" name="simpan" type="submit">Pengaduan
                                            Terselesaikan</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['simpan'])) {
                                    $id_sel         = $db->real_escape_string(acakhba('12'));
                                    $id_peng        = $d['id_peng'];
                                    $nama_p         = $d['nama_p'];
                                    $email_p        = $d['email_p'];
                                    $ket_sel        = $_POST['ket_sel'];
                                    $adm_sel        = $_SESSION['id_usr'];
                                    $jumlah_foto    = count($_FILES['foto']['name']);
                                    $rg             = $db->query("SELECT * FROM regu WHERE id_regu='$d[regu]'")->fetch_assoc();
                                    $nm_regu        = $rg['nm_regu'];
                                    $ket_peng       = $db->real_escape_string('telah diproses dan ditindak lanjuti oleh Regu ' . $nm_regu);
                                    // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                                    // var_dump($id,$nama_p,$email_p,$no_hp_p,$j_peng,$adm_peng,$jumlah_foto);
                                    // die();


                                    if ($jumlah_foto > 0) {
                                        for ($f = 0; $f < $jumlah_foto; $f++) {
                                            // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                                            $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                                            $name_tmp_f  = $_FILES['foto']['name'][$f];
                                            $ext_valid_f = array('png', 'jpg', 'jpeg', 'jpe', 'mp4');
                                            $x_f         = explode('.', $name_tmp_f);
                                            $extend_f    = strtolower(end($x_f));
                                            $time        = date('dmYHis');
                                            $foto        = $id_sel . '-' . $f . $time . '.' . $extend_f;
                                            // $name        = 'giat_'.$f.$time. '.';
                                            if ($extend_f == 'png' or $extend_f == 'jpg' or $extend_f == 'jpeg' or $extend_f == 'jpe') {
                                                $path_f      = '_uploads/f_sel/' . $foto;
                                            } else {
                                                $path_v      = '_uploads/v_sel/' . $foto;
                                            }

                                            if (in_array($extend_f, $ext_valid_f) === true) {
                                                if ($extend_f == 'png' or $extend_f == 'jpg' or $extend_f == 'jpeg' or $extend_f == 'jpe') {
                                                    compressImage($file_tmp_f, $path_f, 30);
                                                } else {
                                                    move_uploaded_file($file_tmp_f, $path_v);
                                                }
                                                $db->query("INSERT INTO d_selesai VALUES ('','$id_sel','$foto','$extend_f',NOW())");
                                            } else {
                                                javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe, mp4');
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
                                                            <h6 style="font-weight: 600">Pengaduan anda sudah selesai ditindaklanjuti.</h6>
                                                            <p>Halo ' . $nama_p . ',</p>
                                                            <p>Pengaduan anda sudah selesai ditindaklanjuti oleh <b>Regu ' . $nm_regu . '</b>, silahkan cek pengaduan anda dan mohon beri penilaian untuk UPT Perparkiran dengan mengklik ID pengaduan anda dibawah ini :</p>
                                                            <p style="text-align: center"><a href="' . $base_url . 'p/pengaduan/' . $id . '" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">' . $id_peng . '</a></p>
                                                            <p>Terimakasih atas laporan anda, semoga perparkiran kota pekanbaru lebih baik lagi kedapannya.</p>
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
                                            sweetAlert($m, 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                        } else {
                                            $db->query("INSERT INTO selesai VALUES ('$id_sel','$id_peng','$ket_sel','$adm_sel',NOW(),NOW(),NULL,NULL)");
                                            $db->query("UPDATE pengaduan SET status='S', ket_peng='$ket_peng', updated_at=NOW() WHERE id_peng='$id_peng'");
                                            sweetAlert('pengaduan/proses', 'sukses', 'Berhasil !', 'Data Penyelesaian Pengaduan dengan (ID Pengaduan: ' . $id_peng . ' dan ID Penyelesaian: ' . $id_sel . ') Berhasil diinput.');
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <?php break; ?>
            <?php
        case 'tolak':
            aut(array(1, 5));
            $id = $_GET['id'];
            $d = $db->query("SELECT *, a.status as stat FROM pengaduan a, users b WHERE a.adm_peng=b.id AND a.slug='$id'")->fetch_assoc();
            if ($_SESSION['id_usr'] == $d['adm_peng'] or $_SESSION['level'] == '1') {
                if (empty($d)) {
                    sweetAlert('pengaduan', 'error', 'Data tidak ditemukan.!', 'Maaf data pengaduan dengan url (' . $id . ') tidak ditemukan ');
                } else {
                    if ($d['stat'] !== 'P') {
                        sweetAlert('pengaduan', 'error', 'Pengaduan tidak dapat diubah.!', 'Maaf data pengaduan dengan url (' . $id . ') tidak dapat diubah karena status pengaduan sudah berubah.');
                    } else {
            ?>
                        <title>Input Penonlakkan | <?= $title; ?></title>
                        <div class="page-body">
                            <div class="container-fluid">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3>Input Penonlakkan</h3>
                                        </div>
                                        <div class="col-6">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="message-circle"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Pengaduan </li>
                                                <li class="breadcrumb-item active">Input Penonlakkan</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th width="150px"></th>
                                                    <th width="20px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><b>ID Laporan</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"><?= $d['id_peng']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Nama Pelapor</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"> <?= r_nama($d['nama_p']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Email Pelapor</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"> <?= r_email($d['email_p']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Judul Laporan</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"><?= $d['j_peng']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Isi Laporan</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"><?= judul($d['peng'], 100); ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Bukti Laporan</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"> <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Klik untuk melihat detail laporan">Terlampir</a></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Waktu Pelaporan</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top">
                                                        <?= hari(date('D', strtotime($d['tgl_peng']))) . ', ' . tgl_indo(date('Y-m-d', strtotime($d['tgl_peng']))) . ' ' . date('H:i:s', strtotime($d['tgl_peng'])); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <hr>
                                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                            <div class="row g-2">
                                                <div class="col-lg-12 col-md-12">
                                                    <label">Keterangan Penolakkan :</label>
                                                        <textarea name="ket_peng" class="form-control editor" required></textarea>
                                                        <div class="valid-feedback">
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Keterangan Penolakkan tidak boleh kosong.
                                                        </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                                <button class="btn btn-danger-gradien" name="simpan" type="submit">Penolakkan Pengaduan</button>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['simpan'])) {
                                            $id_peng        = $d['id_peng'];
                                            $nama_p         = $d['nama_p'];
                                            $email_p        = $d['email_p'];
                                            $ket_peng       = $_POST['ket_peng'];
                                            // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                                            // var_dump($id,$nama_p,$email_p,$no_hp_p,$j_peng,$adm_peng,$jumlah_foto);
                                            // die();

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
                                                        <h6 style="font-weight: 600">Pengaduan anda ditolak.</h6>
                                                        <p>Halo ' . $nama_p . ',</p>
                                                        <p>Maaf, pengaduan anda dengan ID ' . $id_peng . ' <b>DITOLAK</b> dengan alasan :</p>
                                                        <p style="text-align: center"><b><i><h2>' . $ket_peng . '</h2></b></i></p>
                                                        <p>Silahkan melengkapi dahulu berkas laporan anda, setelah itu silahkan menginputkan kembali laporan anda ke website kami.</p>
                                                        <p>Terimakasih atas perhatiannya, semoga perparkiran kota pekanbaru lebih baik lagi kedapannya.</p>
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
                                                sweetAlert($m, 'error', 'Mailer Error: ', $mail->ErrorInfo);
                                            } else {
                                                $db->query("UPDATE pengaduan SET status='X', ket_peng='$ket_peng', updated_at=NOW() WHERE id_peng='$id_peng'");
                                                sweetAlert('pengaduan', 'sukses', 'Berhasil !', 'Data Penolakkan dengan (ID Pengaduan: ' . $id_peng . ') Berhasil diinput.');
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
                sweetAlert('pengaduan', 'error', 'Kesalahan Autentikasi..!', 'Maaf anda tidak dapat mengubah kegiatan ini...');
            }
            ?>
            <?php break; ?>
            <?php
        case 'edit':
            aut(array(1, 5));
            $id = $_GET['id'];
            $d = $db->query("SELECT *, a.status as stat FROM pengaduan a, users b WHERE a.adm_peng=b.id AND a.slug='$id'")->fetch_assoc();
            if ($_SESSION['id_usr'] == $d['adm_peng'] or $_SESSION['level'] == '1') {
                if (empty($d)) {
                    sweetAlert('pengaduan', 'error', 'Data tidak ditemukan.!', 'Maaf data pengaduan dengan url (' . $id . ') tidak ditemukan ');
                } else {
                    if ($d['stat'] !== 'P') {
                        sweetAlert('pengaduan', 'error', 'Pengaduan tidak dapat diubah.!', 'Maaf data pengaduan dengan url (' . $id . ') tidak dapat diubah karena status pengaduan sudah berubah.');
                    } else {
            ?>
                        <title>Edit Pengaduan | <?= $title; ?></title>
                        <div class="page-body">
                            <div class="container-fluid">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3>Edit Pengaduan <small>(<?= $id; ?>)</small></h3>
                                        </div>
                                        <div class="col-6">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">Pengaduan </li>
                                                <li class="breadcrumb-item active">Edit Pengaduan </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                                            <li class="nav-item"><a class="nav-link active" id="pills-warninghome-tab" data-bs-toggle="pill" href="#pills-warninghome" role="tab" aria-controls="pills-warninghome" aria-selected="true"><i class="icofont icofont-architecture-alt"></i></i>Kegiatan</a></li>
                                            <li class="nav-item"><a class="nav-link" id="pills-warningprofile-tab" data-bs-toggle="pill" href="#pills-warningprofile" role="tab" aria-controls="pills-warningprofile" aria-selected="false"><i class="icofont icofont-picture"></i>Bukti Laporan</a></li>
                                        </ul>
                                        <div class="tab-content" id="pills-warningtabContent">
                                            <div class="tab-pane fade show active" id="pills-warninghome" role="tabpanel" aria-labelledby="pills-warninghome-tab">
                                                <div class="card-body">
                                                    <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                                        <div class="row g-2">
                                                            <div class="col-lg-4 col-md-12">
                                                                <label">Nama :</label>
                                                                    <input type="text" class="form-control" name="nama_p" value="<?= $d['nama_p']; ?>" required>
                                                                    <div class="valid-feedback">
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Nama tidak boleh kosong.
                                                                    </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12">
                                                                <label">Email :</label>
                                                                    <input type="email" class="form-control" name="email_p" value="<?= $d['email_p']; ?>" required>
                                                                    <div class="valid-feedback">
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Email tidak boleh kosong.
                                                                    </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12">
                                                                <label">Nomor HP :</label>
                                                                    <input type="text" class="form-control" name="no_hp_p" value="<?= $d['no_hp_p']; ?>" onkeypress="return hanyaAngka(event)" required>
                                                                    <div class="valid-feedback">
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Nomor HP tidak boleh kosong.
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-lg-12 col-md-12">
                                                                <label">Judul Pengaduan :</label>
                                                                    <input type="text" name="j_peng" class="form-control" value="<?= $d['j_peng']; ?>" required>
                                                                    <div class="valid-feedback">
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Judul Pengaduan tidak boleh kosong.
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-lg-12 col-md-12">
                                                                <label">Isi Pengaduan :</label>
                                                                    <textarea name="peng" class="form-control editor" required><?= $d['peng']; ?></textarea>
                                                                    <div class="valid-feedback">
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Isi Pengaduan tidak boleh kosong.
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="d-grid gap-2 col-lg-4 col-md-12 mx-auto">
                                                            <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan Perubahan
                                                                Data</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-warningprofile" role="tabpanel" aria-labelledby="pills-warningprofile-tab">
                                                <div class="card-body">
                                                    <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                                                        <div class="row g-2">
                                                            <div class="col-lg-12 col-md-12">
                                                                <label">Bukti Laporan : <small style="color: green;">Pilih beberapa gambar atau
                                                                        video</small></label>
                                                                    <input class="form-control" name="foto[]" type="file" accept="image/jpeg, image/png, video/3gpp, video/mp4" multiple required>
                                                                    <small style="color: red;">Format File : jpg, png, jpeg, jpe, mp4
                                                                        qt</small><br>
                                                                    <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka
                                                                        loading akan
                                                                        lebih lama.</small>
                                                                    <div class="invalid-feedback">
                                                                        Bukti Laporan tidak boleh kosong.
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                                            <button class="btn btn-success-gradien" name="dokumentasi" type="submit">Simpan
                                                                Bukti Laporan</button>
                                                        </div>
                                                    </form>
                                                    <hr>
                                                    <br>
                                                    <h6>Bukti Laporan yang sudah ada :</h6>
                                                    <div class="dt-ext table-responsive">
                                                        <table class="display" id="responsive">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>No.</th> -->
                                                                    <th>Nama File</th>
                                                                    <th>Foto</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $us = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$d[id_peng]' ORDER BY n_d_peng ASC");
                                                                $no = 1;
                                                                while ($u = $us->fetch_assoc()) :
                                                                    if ($u['x_peng'] == 'mp4') {
                                                                        $pic = '<div class="avatar"><a href="' . base_url() . '_uploads/v_peng/' . $u['n_d_peng'] . '" target="_blank"><img class="b-r-8 img-40" src="' . base_url() . '_uploads/f_peng/play.png"
                                                                alt="' . $u['n_d_peng'] . '"></a>
                                                        </div>';
                                                                    } else {
                                                                        $pic = '<div class="avatar"><a href="' . base_url() . '_uploads/f_peng/' . $u['n_d_peng'] . '" target="_blank"><img class="b-r-8 img-40" src="' . base_url() . '_uploads/f_peng/' . $u['n_d_peng'] . '"
                                                                alt="' . $u['n_d_peng'] . '"></a>
                                                        </div>';
                                                                    } ?>
                                                                    <tr>
                                                                        <!-- <td><?= $no++; ?></td> -->
                                                                        <td><?= $u['n_d_peng']; ?></td>
                                                                        <td>
                                                                            <?= $pic; ?>
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <form action="<?= base_url(); ?>pengaduan/delete/bukti" method="POST">
                                                                                    <input type="hidden" name="nama" value="<?= $u['n_d_peng']; ?>">
                                                                                    <input type="hidden" name="id" value="<?= $u['id_d_peng']; ?>">
                                                                                    <input type="hidden" name="id_peng" value="<?= $d['id_peng']; ?>">
                                                                                    <input type="hidden" name="slug" value="<?= $id; ?>">
                                                                                    <input type="hidden" name="ekstensi" value="<?= $u['x_peng']; ?>">
                                                                                    <button class="btn btn-danger" onclick="return hapus_dokumentasi()"><i class="fa fa-trash"></i></button>
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
                                        <?php
                                        if (isset($_POST['simpan'])) {
                                            // $id             = $db->real_escape_string('id');
                                            $nama_p  = $db->real_escape_string($_POST['nama_p']);
                                            $email_p = $db->real_escape_string($_POST['email_p']);
                                            $no_hp_p = $db->real_escape_string($_POST['no_hp_p']);
                                            $j_peng  = $db->real_escape_string($_POST['j_peng']);
                                            $peng    = $_POST['peng'];
                                            // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                                            // var_dump($file_tmp_video,$jumlah_video);
                                            // die();
                                            $q = $db->query("UPDATE pengaduan SET nama_p='$nama_p', email_p='$email_p', no_hp_p='$no_hp_p', j_peng='$j_peng', peng='$peng', updated_at=NOW() WHERE slug='$id'");

                                            if ($q) {
                                                sweetAlert('pengaduan/edit/' . $id, 'sukses', 'Berhasil !', 'Data Pengaduan dengan (ID : ' . $d['id_peng'] . ') Berhasil diubah.');
                                            } else {
                                                javascript('', 'alert-error', 'Ups.. Sepertinya ada kesalahan..');
                                            }
                                        }
                                        if (isset($_POST['dokumentasi'])) {
                                            $jumlah_foto    = count($_FILES['foto']['name']);
                                            if ($jumlah_foto > 0) {
                                                for ($f = 0; $f < $jumlah_foto; $f++) {
                                                    // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                                                    $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                                                    $name_tmp_f  = $_FILES['foto']['name'][$f];
                                                    $ext_valid_f = array('png', 'jpg', 'jpeg', 'jpe', 'mp4');
                                                    $x_f         = explode('.', $name_tmp_f);
                                                    $extend_f    = strtolower(end($x_f));
                                                    $time        = date('dmYHis');
                                                    $foto        = $d['id_peng'] . '-' . $f . $time . '.' . $extend_f;
                                                    // $name        = 'giat_'.$f.$time. '.';
                                                    if ($extend_f == 'png' or $extend_f == 'jpg' or $extend_f == 'jpeg' or $extend_f == 'jpe') {
                                                        $path_f      = '_uploads/f_peng/' . $foto;
                                                    } else {
                                                        $path_v      = '_uploads/v_peng/' . $foto;
                                                    }

                                                    if (in_array($extend_f, $ext_valid_f) === true) {
                                                        if ($extend_f == 'png' or $extend_f == 'jpg' or $extend_f == 'jpeg' or $extend_f == 'jpe') {
                                                            compressImage($file_tmp_f, $path_f, 30);
                                                        } else {
                                                            move_uploaded_file($file_tmp_f, $path_v);
                                                        }
                                                        $db->query("INSERT INTO d_pengaduan VALUES ('','$d[id_peng]','$foto','$extend_f',NOW())");
                                                        $db->query("UPDATE pengaduan SET updated_at=NOW() WHERE slug='$id'");
                                                    } else {
                                                        javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe, mp4');
                                                    }
                                                }
                                                sweetAlert('pengaduan/edit/' . $id, 'sukses', 'Berhasil !', 'Data bukti laporan dengan (ID : ' . $id . ') Berhasil diinput.');
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
                sweetAlert('pengaduan', 'error', 'Kesalahan Autentikasi..!', 'Maaf anda tidak dapat mengubah kegiatan ini...');
            }
            ?>
            <?php break; ?>
        <?php
        case 'delete-bukti':
            $slug       = $_POST['slug'];
            $id       = $_POST['id'];
            $id_peng  = $_POST['id_peng'];
            $nama     = $_POST['nama'];
            $ekstensi = $_POST['ekstensi'];

            if ($ekstensi == 'mp4') {
                unlink('_uploads/v_peng/' . $nama);
                $q = $db->query("DELETE FROM d_pengaduan WHERE id_d_peng='$id'");
                if ($q) {
                    sweetAlert('pengaduan/edit/' . $slug, 'sukses', 'Berhasil..!', 'Bukti Laporan Berhasil dihapus...');
                } else {
                    sweetAlert('pengaduan/edit/' . $slug, 'error', 'Error !', 'Ups... Sepertinya Ada Kesalahan...');
                }
            } else {
                unlink('_uploads/f_peng/' . $nama);
                $q = $db->query("DELETE FROM d_pengaduan WHERE id_d_peng='$id'");
                if ($q) {
                    sweetAlert('pengaduan/edit/' . $slug, 'sukses', 'Berhasil..!', 'Bukti Laporan Berhasil dihapus...');
                } else {
                    sweetAlert('pengaduan/edit/' . $slug, 'error', 'Error !', 'Ups... Sepertinya Ada Kesalahan...');
                }
            }

        ?>
            <?php break; ?>
        <?php
        case 'delete':
            $id_peng  = $_POST['id_peng'];
            // $nama     = $_POST['nama'];
            // $ekstensi = $_POST['ekstensi'];

            $doc = $db->query("SELECT * FROM d_pengaduan WHERE id_peng='$id_peng'");
            while ($d = $doc->fetch_assoc()) {
                if ($d['x_peng'] !== 'mp4') {
                    unlink('_uploads/f_peng/' . $d['n_d_peng']);
                } else {
                    unlink('_uploads/v_peng/' . $d['n_d_peng']);
                }
            }
            $db->query("DELETE FROM d_pengaduan WHERE id_peng='$id_peng'");
            $db->query("DELETE FROM pengaduan WHERE id_peng='$id_peng'");
            $db->query("DELETE FROM rate_pengaduan WHERE id_peng='$id_peng'");
            sweetAlert('pengaduan', 'sukses', 'Berhasil !', ' Data Pengaduan Dengan ID: ' . $id_peng . ' Berhasil dihapus..!');
        ?>
            <?php break; ?>
<?php }
} ?>