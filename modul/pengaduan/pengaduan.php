<?php 
/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-15 12:02:17
 * @modify date 2021-07-15 12:02:17
 * @desc [description]
 */

include '_func/identity.php';
// aut(array(1));
$a=$_GET['a'];
switch ($a) {
    default:
    aut(array(1,2,3,4,5,6));
    if ($_SESSION['level']=='1' or $_SESSION['level']=='6') {
        $hide = '';
    } else {
        $hide = 'hidden';
    }
    $csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==false) {
        sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir, silahkan login ulang');
    } else {
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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
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
                            <a href="<?= base_url(); ?>pengaduan/add-adm" class="btn btn-primary-gradien"
                                type="button">Tambah
                                Data</a>
                        </div>
                        <br>
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Pengaduan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['level']=='1' or $_SESSION['level']=='6') {
                                    $us=$db->query("SELECT *, a.status as stat FROM pengaduan a, users b WHERE a.adm_peng=b.id ORDER BY a.tgl_peng ASC");
                                } elseif ($_SESSION['level']=='2' or $_SESSION['level']=='3') {
                                    $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu AND a.adm_giat='$_SESSION[id_usr]' ORDER BY a.tgl_giat ASC");
                                }
        // $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu ORDER BY a.tgl_giat ASC");
        $no=1;
        while ($u=$us->fetch_assoc()) :
                                    if ($u['stat'] == 'P') {
                                        $stat = '<span class="badge rounded-pill badge-primary"><i class="fa fa-refresh"></i>  Proses</span>';
                                    } elseif ($u['stat'] == 'S') {
                                        $stat = '<span class="badge rounded-pill badge-success"><i class="fa fa-check-circle"></i>  Selesai</span>';
                                    } else {
                                        $stat = '<span class="badge rounded-pill badge-danger"><i class="fa fa-times-circle"></i>  Ditolak</span>';
                                    } ?>
                                <tr>
                                    <td valign="top"><?= $no++; ?></td>
                                    <td valign="top"><?= $u['id_peng']; ?></td>
                                    <td><?= $u['nama_p']; ?> <br>
                                        <small><?= $u['no_hp_p']; ?></small> <br>
                                        <small><?= $u['email_p']; ?></small> <br>
                                    </td>
                                    <td valign="top"><?=judul($u['j_peng'],50); ?><br>
                                        <small><?= hari(date('D', strtotime($u['tgl_peng']))).', '.tgl_indo(date('Y-m-d', strtotime($u['tgl_peng']))).' '.date('H:i:s', strtotime($u['tgl_peng'])); ?></small>
                                    </td>
                                    <td valign="top"><?= $stat ?></td>
                                    <td valign="top">
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>pengaduan/edit/<?= $u['id_giat']; ?>"
                                                class="btn btn-warning" <?= $hide; ?>><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>pengaduan/detail/<?= $u['id_giat']; ?>"
                                                class="btn btn-primary"><i class="fa fa-info-circle"></i></a>

                                            <form action="<?= base_url(); ?>pengaduan/delete" method="POST"
                                                <?= $hide; ?>>
                                                <input type="hidden" name="id_giat" value="<?= $u['id_giat']; ?>">
                                                <button class="btn btn-danger" onclick="return hapus()"><i
                                                        class="fa fa-trash"></i></button>
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
<?php
    } ?>
<?php break; ?>
<?php case 'add-adm':
    aut(array(1,2,3));
    $csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==false) {
        sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir, silahkan login ulang');
    } else {
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
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="message-circle"></i></a>
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
                <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                    enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="no_hp_p"
                                    onkeypress="return hanyaAngka(event)" required>
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
                                <input class="form-control" name="foto[]" type="file"
                                    accept="image/jpeg, image/png, video/3gpp, video/mp4, video/x-m4v, video/quicktime"
                                    multiple required>
                                <small style="color: red;">Format File : jpg, png, jpeg, jpe, 3gp, mp4, mp4v, mpg4, mov,
                                    qt</small><br>
                                <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka loading akan
                                    lebih lama.</small>
                                <div class="invalid-feedback">
                                    Dokumentasi Foto Kegiatan tidak boleh kosong.
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
                    $peng           = $_POST['peng'];
                    $adm_peng       = $_SESSION['id_usr'];
                    $jumlah_foto    = count($_FILES['foto']['name']);
                    // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                    // var_dump($id,$nama_p,$email_p,$no_hp_p,$j_peng,$adm_peng,$jumlah_foto);
                    // die();

                    
                    if ($jumlah_foto > 0) {
                        for ($f=0; $f < $jumlah_foto; $f++) {
                            // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                            $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                            $name_tmp_f  = $_FILES['foto']['name'][$f];
                            $ext_valid_f = array('png','jpg','jpeg','jpe','3gp','mp4','mp4v','mpg4','mov','qt');
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
                                                            <h6 style="font-weight: 600">Pengaduan Anda Sedang di Proses.</h6>
                                                            <p>Halo '.$nama_p.',</p>
                                                            <p>Pengaduan anda sedang kami proses silahkan cek pengaduan anda secara berkala dengan mengklik ID pengaduan anda dibawah ini :</p>
                                                            <p style="text-align: center"><a href="'.$base_url.'pengaduan/detail-pengaduan/'.$id.'" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">'.$id.'</a></p>
                                                            <p>Jika pengaduan anda sudah selesai diproses oleh UPT Perparkiran, kami akan memberitahu melalui surat elektronik ini secara otomatis.</p>
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
                        } else {
                            $db->query("INSERT INTO pengaduan VALUES ('$id','$nama_p','$email_p','$no_hp_p','$j_peng','$peng','P','NULL','$adm_peng',NOW(),NOW(),NOW(),NULL)");
                            sweetAlert('pengaduan', 'sukses', 'Berhasil !', 'Data Pengaduan dengan (ID : '.$id.') Berhasil diinput.');
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
<?php case 'detail':
    $id= $_GET['id'];
    $d = $db->query("SELECT *, a.updated_at as updated FROM giat a, regu b, users c WHERE a.regu=b.id_regu AND a.adm_giat=c.id AND a.id_giat='$id' ")->fetch_assoc();
    // $dd= $db->query("SELECT * FROM d_giat WHERE id_giat='$id'")->fetch_assoc();
    if (empty($d)) {
        sweetAlert('dashboard', 'error', 'Error !', 'Data giat tidak ditemukan.');
    # code...
    } else {
        ?>
<title>Details Kegiatan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Details Kegiatan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Kegiatan </li>
                        <li class="breadcrumb-item active">Detail Kegiatan </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form action="<?= base_url(); ?>giat/print" method="GET">
                                    <input type="hidden" value="<?= $id; ?>" name="id">
                                    <button class="btn btn-primary-gradien" type="submit"><i class="fa fa-print"></i>
                                        Print</button>
                                </form>
                                <!-- <a href="<?= base_url(); ?>giat/detail/print" class="btn btn-primary-gradien" type="button"><i class="fa fa-print"></i> Print</a> -->
                            </div>
                            <div class="col-lg-6">
                                <br>
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
                                            <td valign="top"><b>Nomor Kegiatan</b> </td>
                                            <td valign="top"><b>:</b></td>
                                            <td><?= $d['no_giat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Waktu</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= hari(date('D', strtotime($d['tgl_giat']))).', '.tgl_indo(date('Y-m-d', strtotime($d['tgl_giat']))).' '.date('H:i:s', strtotime($d['tgl_giat'])); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Regu</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= $d['nm_regu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Kegiatan</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td><?= $d['kegiatan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Keterangan</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= $d['ket_giat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>Penginput</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= $d['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td valign="top"><b>di Update Pada</b></td>
                                            <td valign="top"><b>:</b></td>
                                            <td> <?= hari(date('D', strtotime($d['updated']))).', '.tgl_indo(date('Y-m-d', strtotime($d['updated']))).' '.date('H:i:s', strtotime($d['updated'])); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <h5>Dokumentasi Foto</h5>
                                <div class="row gallery grid my-gallery" id="aniimated-thumbnials">
                                    <?php
                                            $dokumen = $db->query("SELECT * FROM d_giat WHERE id_giat='$id'");
        while ($dd=$dokumen->fetch_assoc()) :
                                            if ($dd['x_giat']=='png' or $dd['x_giat']=='jpeg' or $dd['x_giat']=='jpg' or $dd['x_giat']=='jpe') {
                                                ?>
                                    <figure class="grid-item col-sm-3" data-aos="flip-left"><a
                                            href="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                            data-size="1600x950"><img class="img-thumbnail"
                                                src="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                                alt="<?= $dd['n_d_giat']; ?>"></a>
                                        <figcaption><?= $dd['n_d_giat']; ?></figcaption>
                                    </figure>
                                    <?php
                                            } ?>
                                    <?php endwhile ?>
                                </div>
                                <!-- Root element of PhotoSwipe. Must have class pswp.-->
                                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                    <!--
                                            Background of PhotoSwipe.
                                            It's a separate element, as animating opacity is faster than rgba().
                                            -->
                                    <div class="pswp__bg"></div>
                                    <!-- Slides wrapper with overflow:hidden.-->
                                    <div class="pswp__scroll-wrap">
                                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory.-->
                                        <!-- don't modify these 3 pswp__item elements, data is added later on.-->
                                        <div class="pswp__container">
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                            <div class="pswp__item"></div>
                                        </div>
                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
                                        <div class="pswp__ui pswp__ui--hidden">
                                            <div class="pswp__top-bar">
                                                <!-- Controls are self-explanatory. Order can be changed.-->
                                                <div class="pswp__counter"></div>
                                                <button class="pswp__button pswp__button--close"
                                                    title="Close (Esc)"></button>
                                                <button class="pswp__button pswp__button--share" title="Share"></button>
                                                <button class="pswp__button pswp__button--fs"
                                                    title="Toggle fullscreen"></button>
                                                <button class="pswp__button pswp__button--zoom"
                                                    title="Zoom in/out"></button>
                                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
                                                <!-- element will get class pswp__preloader--active when preloader is running-->
                                                <div class="pswp__preloader">
                                                    <div class="pswp__preloader__icn">
                                                        <div class="pswp__preloader__cut">
                                                            <div class="pswp__preloader__donut"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                <div class="pswp__share-tooltip"></div>
                                            </div>
                                            <button class="pswp__button pswp__button--arrow--left"
                                                title="Previous (arrow left)"></button>
                                            <button class="pswp__button pswp__button--arrow--right"
                                                title="Next (arrow right)"></button>
                                            <div class="pswp__caption">
                                                <div class="pswp__caption__center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dokumentasi Video</h5>
                        </div>

                        <div class="row">
                            <?php
                                $dokumen = $db->query("SELECT * FROM d_giat WHERE id_giat='$id'");
        while ($dd=$dokumen->fetch_assoc()) :
                                if ($dd['x_giat']=='mp4') {
                                    ?>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <div class="video-container">
                                        <video class="afterglow" id="myvideo" width="640" height="360"
                                            poster="<?= base_url(); ?>_uploads/f_giat/default.jpg">
                                            <source type="video/mp4"
                                                src="<?= base_url(); ?>_uploads/v_giat/<?= $dd['n_d_giat']; ?>"
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
                            <?php
                                } ?>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } ?>
<?php break; ?>
<?php case 'edit':
$id = $_GET['id'];
$d = $db->query("SELECT * FROM giat a, regu b,  users c WHERE a.regu=b.id_regu AND a.adm_giat=c.id AND a.id_giat='$id'")->fetch_assoc();
?>
<title>Edit Kegiatan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Kegiatan <small>(<?= $id; ?>)</small></h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Kegiatan </li>
                        <li class="breadcrumb-item active">Edit Kegiatan </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url(); ?>giat/detail/<?= $id; ?>" class="btn btn-primary-gradien" type="button"><i
                            class="fa fa-info-circle"></i> Pratinjau
                        Kegiatan</a>
                </div>
                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-warninghome-tab" data-bs-toggle="pill"
                            href="#pills-warninghome" role="tab" aria-controls="pills-warninghome"
                            aria-selected="true"><i class="icofont icofont-architecture-alt"></i></i>Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-warningprofile-tab" data-bs-toggle="pill"
                            href="#pills-warningprofile" role="tab" aria-controls="pills-warningprofile"
                            aria-selected="false"><i class="icofont icofont-picture"></i>Dokumentasi</a></li>
                </ul>
                <div class="tab-content" id="pills-warningtabContent">
                    <div class="tab-pane fade show active" id="pills-warninghome" role="tabpanel"
                        aria-labelledby="pills-warninghome-tab">
                        <div class="card-body">
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                                enctype="multipart/form-data">
                                <div class="row g-2">
                                    <div class="col-lg-6 col-md-12">
                                        <label">No Kegiatan :</label>
                                            <input type="text" class="form-control" name="no_giat"
                                                value="<?= $d['no_giat'];?>" readonly>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Kegiatan tidak boleh kosong.
                                            </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label">Di Input Oleh : <i class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                title="Nama penginput otomatis terisi oleh sistem dan tidak dapat diubah."></i></label>
                                            <input type="text" class="form-control" value="<?= $_SESSION['nama']; ?>"
                                                readonly>
                                            <input type="hidden" class="form-control" name="adm_giat"
                                                value="<?= $_SESSION['id_usr']; ?>">
                                            <div class="valid-feedback">
                                            </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-3 col-md-6">
                                        <label">Tanggal Kegiatan :</label>
                                            <input type="text" class="datepicker-here form-control digits"
                                                data-language="en" name="tgl_giat"
                                                value="<?= date('m/d/Y', strtotime($d['tgl_giat'])); ?>" required>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Tanggal tidak boleh kosong.
                                            </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label">Jam :</label>
                                            <div class="input-group clockpicker pull-center" data-placement="bottom"
                                                data-align="top" data-autoclose="true">
                                                <input class="form-control" name="jam_giat" type="text"
                                                    value="<?= date('H:i', strtotime($d['tgl_giat'])); ?>"
                                                    required><span class="input-group-addon"><span
                                                        class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Jam tidak boleh kosong.
                                            </div>
                                    </div>
                                    <?php
                                    if ($_SESSION['level'] == '1') {?>
                                    <div class="col-lg-6 col-md-12">
                                        <label">Regu :</label>
                                            <select class="form-select js-example-basic-single" name="regu"
                                                id="floatingSelect" aria-label="Pilih Regu" required>
                                                <option value="<?= $d['id_regu']; ?>"><?= $d['nm_regu']; ?></option>
                                                <?php
                                                $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                                                while ($r=$regu->fetch_assoc()) :
                                                ?>
                                                <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Regu tidak boleh kosong.
                                            </div>
                                    </div>
                                    <?php } else {
                                                    $rg = $db->query("SELECT * FROM regu WHERE id_regu='$_SESSION[regu]'")->fetch_assoc(); ?>
                                    <div class="col-lg-6 col-md-12">
                                        <label">Regu :</label>
                                            <input type="hidden" class="form-control" name="regu"
                                                value="<?= $rg['id_regu']; ?>">
                                            <input type="text" class="form-control" name="nm_regu"
                                                value="<?= $rg['nm_regu']; ?>" readonly>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Regu tidak boleh kosong.
                                            </div>
                                    </div>
                                    <?php
                                                } ?>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label">Kegiatan :</label>
                                            <input type="text" class="form-control" name="kegiatan"
                                                value="<?= $d['kegiatan']; ?>" required>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Kegiatan tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label">Keterangan Kegiatan :</label>
                                            <textarea name="editor1" id="editor1" rows="10" cols="20"
                                                class="form-control" required><?= $d['ket_giat']; ?></textarea>
                                            <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor 4
                                            // instance, using default configuration.
                                            CKEDITOR.replace('editor1');
                                            </script>
                                            <div class="valid-feedback">
                                            </div>
                                            <div class="invalid-feedback">
                                                Keterangan Kegiatan tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                    <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                                        Data</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-warningprofile" role="tabpanel"
                        aria-labelledby="pills-warningprofile-tab">
                        <div class="card-body">
                            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                                enctype="multipart/form-data">
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label">Dokumentasi : <small style="color: green;">Pilih beberapa gambar atau
                                                video</small></label>
                                            <input class="form-control" name="foto[]" type="file"
                                                accept="image/jpeg, image/png, video/3gpp, video/mp4, video/x-m4v, video/quicktime"
                                                multiple required>
                                            <small style="color: red;">Format File : jpg, png, jpeg, jpe, 3gp, mp4,
                                                mp4v, mpg4, mov,
                                                qt</small><br>
                                            <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka
                                                loading akan
                                                lebih lama.</small>
                                            <div class="invalid-feedback">
                                                Dokumentasi Kegiatan tidak boleh kosong.
                                            </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                    <button class="btn btn-success-gradien" name="dokumentasi" type="submit">Simpan
                                        Dokumentasi</button>
                                </div>
                            </form>
                            <hr>
                            <br>
                            <h6>Dokumentasi yang sudah ada :</h6>
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
                                        $us=$db->query("SELECT * FROM d_giat WHERE id_giat='$id' ORDER BY n_d_giat ASC");
                                        $no=1;
                                        while ($u=$us->fetch_assoc()) :
                                            if ($u['x_giat']=='mp4') {
                                                $pic = '<div class="avatar"><a href="'.base_url().'_uploads/v_giat/'.$u['n_d_giat'].'" target="_blank"><img class="b-r-8 img-40" src="'.base_url().'_uploads/f_giat/play.png"
                                                                alt="'.$u['n_d_giat'].'"></a>
                                                        </div>';
                                            } else {
                                                $pic = '<div class="avatar"><a href="'.base_url().'_uploads/f_giat/'.$u['n_d_giat'].'" target="_blank"><img class="b-r-8 img-40" src="'.base_url().'_uploads/f_giat/'.$u['n_d_giat'].'"
                                                                alt="'.$u['n_d_giat'].'"></a>
                                                        </div>';
                                            }
                                        ?>
                                        <tr>
                                            <!-- <td><?= $no++; ?></td> -->
                                            <td><?= $u['n_d_giat']; ?></td>
                                            <td>
                                                <?= $pic; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="<?= base_url(); ?>giat/delete/dokumentasi"
                                                        method="POST">
                                                        <input type="hidden" name="nama" value="<?= $u['n_d_giat']; ?>">
                                                        <input type="hidden" name="id" value="<?= $u['id_d_giat']; ?>">
                                                        <input type="hidden" name="id_giat" value="<?= $id; ?>">
                                                        <input type="hidden" name="ekstensi"
                                                            value="<?= $u['x_giat']; ?>">
                                                        <button class="btn btn-danger"
                                                            onclick="return hapus_dokumentasi()"><i
                                                                class="fa fa-trash"></i></button>
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
                    $no_giat        = $db->real_escape_string($_POST['no_giat']);
                    $tgl            = $db->real_escape_string(date('Y-m-d', strtotime($_POST['tgl_giat'])));
                    $jam            = $db->real_escape_string(date('H:i:s', strtotime($_POST['jam_giat'])));
                    $regu           = $db->real_escape_string($_POST['regu']);
                    $kegiatan       = $db->real_escape_string($_POST['kegiatan']);
                    $ket_giat       = $_POST['editor1'];
                    $adm_giat       = $db->real_escape_string($_POST['adm_giat']);
                    // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                    // var_dump($file_tmp_video,$jumlah_video);
                    // die();
                    $q = $db->query("UPDATE giat SET tgl_giat='$tgl $jam', regu='$regu', kegiatan='$kegiatan', ket_giat='$ket_giat',adm_giat='$adm_giat',updated_at=NOW() WHERE id_giat='$id'");

                    if ($q) {
                        sweetAlert('giat/edit/'.$id, 'sukses', 'Berhasil !', 'Data giat dengan (ID Giat : '.$id.') Berhasil diubah.');
                    } else {
                        javascript('', 'alert-error', 'Ups.. Sepertinya ada kesalahan..');
                    }
                }
                if (isset($_POST['dokumentasi'])) {
                    $jumlah_foto    = count($_FILES['foto']['name']);
                    if ($jumlah_foto > 0) {
                        for ($f=0; $f < $jumlah_foto; $f++) {
                            // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                            $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                            $name_tmp_f  = $_FILES['foto']['name'][$f];
                            $ext_valid_f = array('png','jpg','jpeg','jpe','3gp','mp4','mp4v','mpg4','mov','qt');
                            $x_f         = explode('.', $name_tmp_f);
                            $extend_f    = strtolower(end($x_f));
                            $time        = date('dmYHis');
                            $foto        = 'giat_'.$f.$time. '.' . $extend_f;
                            // $name        = 'giat_'.$f.$time. '.';
                            if ($extend_f=='png' or $extend_f=='jpg' or $extend_f=='jpeg' or $extend_f=='jpe') {
                                $path_f      = '_uploads/f_giat/'.$foto;
                            } else {
                                $path_v      = '_uploads/v_giat/'.$foto;
                            }
                                
                            if (in_array($extend_f, $ext_valid_f)===true) {
                                if ($extend_f=='png' or $extend_f=='jpg' or $extend_f=='jpeg' or $extend_f=='jpe') {
                                    compressImage($file_tmp_f, $path_f, 30);
                                } else {
                                    move_uploaded_file($file_tmp_f, $path_v);
                                }
                                $db->query("INSERT INTO d_giat VALUES ('','$id','$foto','$extend_f',NOW())");
                                $db->query("UPDATE giat SET updated_at=NOW() WHERE id_giat='$id'");
                            } else {
                                javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe, 3gp, mp4, mp4v, mpg4, mov, qt');
                            }
                        }
                        sweetAlert('giat/edit/'.$id, 'sukses', 'Berhasil !', 'Data Dokumentasi giat dengan (ID Giat : '.$id.') Berhasil diinput.');
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'delete-dokumentasi':
    $id       = $_POST['id'];
    $id_giat  = $_POST['id_giat'];
    $nama     = $_POST['nama'];
    $ekstensi = $_POST['ekstensi'];

    if ($ekstensi == 'mp4') {
        unlink('_uploads/v_giat/' .$nama);
        $q = $db->query("DELETE FROM d_giat WHERE id_d_giat='$id'");
        if ($q) {
            sweetAlert('giat/edit/'.$id_giat, 'sukses', 'Berhasil..!', 'Dokumentasi Berhasil dihapus...');
        } else {
            sweetAlert('giat/edit/'.$id_giat, 'error', 'Error !', 'Ups... Sepertinya Ada Kesalahan...');
        }
    } else {
        unlink('_uploads/f_giat/' .$nama);
        $q = $db->query("DELETE FROM d_giat WHERE id_d_giat='$id'");
        if ($q) {
            sweetAlert('giat/edit/'.$id_giat, 'sukses', 'Berhasil..!', 'Dokumentasi Berhasil dihapus...');
        } else {
            sweetAlert('giat/edit/'.$id_giat, 'error', 'Error !', 'Ups... Sepertinya Ada Kesalahan...');
        }
    }
    
?>
<?php break; ?>
<?php case 'delete':
    $id_giat  = $_POST['id_giat'];
    // $nama     = $_POST['nama'];
    // $ekstensi = $_POST['ekstensi'];

    $doc=$db->query("SELECT * FROM d_giat WHERE id_giat='$id_giat'");
    while ($d=$doc->fetch_assoc()) {
        if ($d['x_giat']!=='mp4') {
            unlink('_uploads/f_giat/'.$d['n_d_giat']);
        } else {
            unlink('_uploads/v_giat/'.$d['n_d_giat']);
        }
    }
    $db->query("DELETE FROM d_giat WHERE id_giat='$id_giat'");
    $db->query("DELETE FROM giat WHERE id_giat='$id_giat'");
    sweetAlert('giat', 'sukses', 'Berhasil !', ' Data Giat Dengan ID: '.$id_giat.' Berhasil dihapus..!');
?>
<?php break; ?>
<?php } ?>