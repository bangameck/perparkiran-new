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
    sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir atau akun anda sudah login diperangkat lain, silahkan login ulang');
} else {
    switch ($a) {
        default:
            aut(array(1));
?>
            <title>Juru Parkir | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Data Juru Parkir</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item active">Jukir </li>
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
                                        <a href="<?= base_url(); ?>jukir/add" class="btn btn-primary-gradien" type="button">Tambah
                                            Data</a>
                                    </div>
                                    <br>
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <!-- <th>No.</th> -->
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Korlap</th>
                                                <th>Titik Lokasi</th>
                                                <th>KTP</th>
                                                <th>QR Code</th>
                                                <th>KTA</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT * FROM jukir a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi ORDER BY a.id_jukir2 DESC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                                if (empty($u['f_jukir'])) {
                                                    $ft = 'default.png';
                                                } else {
                                                    $ft = $u['f_jukir'];
                                                }
                                                if (empty($u['f_ktp_jukir'])) {
                                                    $ft_ktp = 'default.png';
                                                } else {
                                                    $ft_ktp = $u['f_ktp_jukir'];
                                                }
                                                if (empty($u['f_kta_jukir'])) {
                                                    $ft_kta = 'default.png';
                                                } else {
                                                    $ft_kta = $u['f_kta_jukir'];
                                                }
                                                if (date('m-Y', strtotime($u['kta_sd'])) >= date('m-Y')) {
                                                    $sd = 'disabled';
                                                    $style = '';
                                                } else {
                                                    $sd = '';
                                                    $style = 'class="text-danger"';
                                                }
                                                $qr = $db->query("SELECT * FROM jukir_qrcode WHERE id_jukir='$u[id_jukir]'")->fetch_assoc();
                                                if (empty($qr['id_jukir'])) {
                                                    $fqr = 'default.png';
                                                    $hqr = '';
                                                } else {
                                                    $fqr = $qr['nm_qr'];
                                                    $hqr = 'disabled';
                                                }
                                            ?>
                                                <tr <?= $style; ?>>
                                                    <!-- <td><?= $no++; ?></td> -->
                                                    <td><?= $u['id_jukir2']; ?></td>
                                                    <td class="text-center">
                                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_jukir/<?= $ft; ?>" alt="#">
                                                        </div><br><?= $u['nm_jukir']; ?>

                                                    </td>
                                                    <td><?= $u['nm_korlap']; ?></td>
                                                    <td><?= $u['nm_jalan']; ?><br><b><small>(dilokasi : <?= $u['tilok']; ?>)</small></b></td>

                                                    <td>
                                                        <div class="avatar"><a href="<?= base_url(); ?>jukir/ktp/<?= $u['id_jukir']; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk mengubah KTP"><img class="b-r-8 img-80" src="_uploads/f_ktp_jukir/<?= $ft_ktp; ?>" alt="#"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar"><img class="b-r-8 img-80" src="_uploads/qrcode_jukir/<?= $fqr; ?>" alt="#">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar"><a href="<?= base_url(); ?>jukir/kta/<?= $u['id_jukir']; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk mengubah KTA jukir"><img class=" b-r-8 img-80" src="_uploads/f_kta_jukir/<?= $ft_kta; ?>" alt="#"></a><br>
                                                            <!-- <small><?= $p['nama']; ?></small> -->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <form action="<?= base_url(); ?>jukir/qrcode" method="POST" class="d-inline">
                                                                <input type="hidden" name="id_jukir" value="<?= $u['id_jukir']; ?>">
                                                                <input type="hidden" name="id_jukir2" value="<?= $u['id_jukir2']; ?>">
                                                                <input type="hidden" name="nm_jukir" value="<?= $u['nm_jukir']; ?>">
                                                                <input type="hidden" name="f_jukir" value="<?= $ft; ?>">
                                                                <button class="btn btn-info btn-sm <?= $hqr; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Generate QR Code"><i class="fa fa-qrcode"></i></button>
                                                            </form>
                                                            <a href="<?= base_url() ?>jukir/perpanjangan/<?= $u['id_jukir'] ?>" class="btn btn-success btn-sm <?= $sd; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="KTA Sudah kadaluwarsa"><i class="fa fa-calendar"></i></a>
                                                            <a href="<?= base_url(); ?>jukir/detail/<?= $u['id_jukir']; ?>" class="btn btn-primary btn-sm" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Juru Parkir"><i class="fa fa-info-circle"></i></a>
                                                            <a href="<?= base_url(); ?>jukir/edit/<?= $u['id_jukir']; ?>" class="btn btn-warning btn-sm" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>

                                                            <form action="<?= base_url(); ?>jukir/delete" method="POST" class="d-inline">
                                                                <input type="hidden" name="id_jukir" value="<?= $u['id_jukir']; ?>">
                                                                <input type="hidden" name="nm_jukir" value="<?= $u['nm_jukir']; ?>">
                                                                <input type="hidden" name="f_jukir" value="<?= $u['f_jukir']; ?>">
                                                                <input type="hidden" name="f_ktp_jukir" value="<?= $u['f_ktp_jukir']; ?>">
                                                                <button class="btn btn-danger btn-sm" onclick="return hapus()" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="fa fa-trash"></i></button>
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
        ?>
            <title>Tambah Juru Parkir | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Tambah Juru Parkir</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Jukir </li>
                                    <li class="breadcrumb-item active">Tambah Jukir</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-6">
                                    <label>ID : <small class="text-success"> min & max 4 angka</small></label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="id_jukir" id="id_jukir" minlength="4" maxlength="4" required autofocus>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message_id_jukir"></label>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        ID tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <input type="hidden" class="form-control" name="id" value="<?= verify(); ?>" required>

                                <div class="col-lg-6 col-md-12">
                                    <label>Koordinator Lapangan :</label>
                                    <select class="form-select js-example-basic-single" name="korlap" id="korlap" aria-label="Pilih Level" required>
                                        <option value="">-- Pilih Korlap --</option>
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Korlap tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Alamat Lokasi Perparkiran :</label>
                                    <select class="form-select js-example-basic-single" name="a_tilok" id="lokasi" aria-label="Pilih Level" required>
                                        <option value=""></option>
                                    </select>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Alamat Lokasi tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Titik Lokasi :</label>
                                    <input type="text" class="form-control" name="tilok" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Titik Lokasi tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-6">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nik_jukir" id="nik_jukir" minlength="16" maxlength="16" required autofocus>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message_nik_jukir"></label>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Jukir :</label>
                                    <input type="text" class="form-control" name="nm_jukir">
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Jukir tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Tempat Lahir :</label>
                                    <input type="text" class="form-control" name="t_lahir_jukir">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput"> Tanggal Lahir :</label><small style="color: orange;">
                                        Format : bulan/tanggal/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" data-position="bottom right" name="tgl_lahir_jukir">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Alamat Rumah :</label>
                                    <textarea class="form-control" name="a_jukir"></textarea>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Alamat Rumah tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label for="floatingInput"> Masa Berlaku KTA :</label><small style="color: orange;">
                                        Format : bulan/tanggal/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" id="minMaxExample" data-position="bottom right" name="kta_sd" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Masa Berlaku tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <label>Foto Jukir :</label>
                                <div class="col-lg-2 col-md-6">
                                    <!-- gambar  -->
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_korlap/default.png" id="imgPreview" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <input class="form-control" id="imgUpload" name="foto" type="file" accept=".png, .jpeg, .jpg">
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

                            $id               = $db->real_escape_string($_POST['id']);
                            $id_jukir2              = $db->real_escape_string($_POST['id_jukir']);
                            $nik_jukir       = $db->real_escape_string($_POST['nik_jukir']);
                            $nm_jukir        = $db->real_escape_string($_POST['nm_jukir']);
                            $t_lahir_jukir   = $db->real_escape_string($_POST['t_lahir_jukir']);
                            $tgl_lahir_jukir = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir_jukir'])));
                            $a_jukir         = $db->real_escape_string($_POST['a_jukir']);
                            $korlap       = $db->real_escape_string($_POST['korlap']);
                            $a_tilok       = $db->real_escape_string($_POST['a_tilok']);
                            $tilok       = $db->real_escape_string($_POST['tilok']);
                            $kta_sd = date('Y-m-d', strtotime($db->real_escape_string($_POST['kta_sd'])));
                            // $slug     = slug($nopol_bus);
                            $cek_id_jukir = $db->query("SELECT id_jukir2 FROM jukir WHERE id_jukir2='$id_jukir2'");
                            //jika username tidak ada didalam database
                            if ($cek_id_jukir->num_rows == 0) {
                                //cek nik jukir
                                $cek_nik_jukir = $db->query("SELECT nik_jukir FROM jukir WHERE nik_jukir='$nik_jukir'");
                                if ($cek_nik_jukir->num_rows == 0) {
                                    # code...
                                    //file gambar
                                    $file_tmp = $_FILES['foto']['tmp_name'];
                                    if (empty($file_tmp)) {
                                        $q  = $db->query("INSERT INTO jukir VALUES ('$id','$id_jukir2','$nik_jukir','$nm_jukir','$t_lahir_jukir','$tgl_lahir_jukir','$a_jukir','$korlap','$a_tilok','$tilok','$kta_sd','','','','$_SESSION[id_usr]',NOW(),NOW(),NULL)");
                                        $db->query("INSERT INTO jukir_kta VALUES ('','$id','$korlap','$a_tilok','$tilok',NOW(),'$kta_sd','')");
                                        sweetAlert('jukir', 'sukses', 'Sukses !', 'Juru Parkir atas nama (' . $nm_jukir . ') berhasil diinput');
                                    } else {
                                        $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                                        $name_tmp  = $_FILES['foto']['name'];
                                        $x         = explode('.', $name_tmp);
                                        $extend    = strtolower(end($x));
                                        $time      = date('dmYHis');
                                        $foto      = $id_jukir2 . '_' . strtoupper(slug($nm_jukir)) . '_FOTO_' . $time . '.' . $extend;
                                        $path      = '_uploads/f_jukir/';

                                        //cek ekstensi
                                        if (in_array($extend, $ext_valid) === true) {
                                            //Compress Image
                                            fotoCompressResize($foto, $file_tmp, $path);
                                            //inster ke database
                                            $q  = $db->query("INSERT INTO jukir VALUES ('$id','$id_jukir2','$nik_jukir','$nm_jukir','$t_lahir_jukir','$tgl_lahir_jukir','$a_jukir','$korlap','$a_tilok','$tilok','$kta_sd','$foto','','','$_SESSION[id_usr]',NOW(),NOW(),NULL)");
                                            $db->query("INSERT INTO jukir_kta VALUES ('','$id','$korlap','$a_tilok','$tilok',NOW(),'$kta_sd','')");
                                            sweetAlert('jukir', 'sukses', 'Sukses !', 'Juru Parkir atas nama (' . $nm_jukir . ') berhasil diinput');
                                        } else {
                                            sweetAlert('jukir/add', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
                                            // sweetAlert('korlap/add', 'error', '', ' ');
                                        }
                                    }
                                } else {
                                    javascript('', 'alert-error', ' NIK <i>(' . $nik_jukir . ')</i> sudah terdaftar didalam database.!');
                                }
                            } else {
                                javascript('', 'alert-error', ' ID <i>(' . $id_jukir2 . ')</i> sudah terdaftar didalam database.!');
                                // sweetAlert('korlap/add', 'error', 'Error Ekstensi !', ' NIK <i>(' . $nik_korlap . ')</i> sudah terdaftar didalam database.!');
                            }
                            //cek username dalam database
                        } ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'edit':
            $d = $db->query("SELECT * FROM jukir a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi AND a.id_jukir='$_GET[id]'")->fetch_assoc();
            if (empty($d['f_jukir'])) {
                $ft = 'default.png';
            } else {
                $ft = $d['f_jukir'];
            }
            if (empty($d['id_jukir'])) {
                sweetAlert('jukir', 'error', 'Error !', 'Data Juru Parkir Tidak ditemukan.!');
            }
        ?>
            <title>Edit Juru Parkir | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Edit Juru Parkir</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Jukir </li>
                                    <li class="breadcrumb-item active">Edit Jukir</li>
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
                                    <div class="col-lg-6 col-md-6">
                                        <label>NIK : <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="NIK tidak dapat diubah."></i></label>
                                        <input type="text" class="form-control" value="<?= $d['nik_jukir']; ?>" readonly>
                                        <div class="media">
                                            <div class="text-end">
                                                <label id="message_nik_jukir"></label>
                                            </div>
                                        </div>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Nik tidak boleh kosong.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label>Nama Jukir :</label>
                                        <input type="text" class="form-control" name="nm_jukir" value="<?= $d['nm_jukir']; ?>" required>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Nama Jukir tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-6 col-md-12">
                                        <label>Tempat Lahir :</label>
                                        <input type="text" class="form-control" name="t_lahir_jukir" value="<?= $d['t_lahir_jukir']; ?>" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label for="floatingInput"> Tanggal Lahir :</label><small style="color: orange;">
                                            Format : bulan/tanggal/tahun</small></label>
                                        <input type="text" class="datepicker-here form-control digits" data-language="en" data-position="bottom right" name="tgl_lahir_jukir" value="<?= date('m/d/Y', strtotime($d['tgl_lahir_jukir'])); ?>" required>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label>Alamat Rumah :</label>
                                        <textarea class="form-control" name="a_jukir"><?= $d['a_jukir']; ?></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Alamat Rumah tidak boleh kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <label>Foto Jukir :</label>
                                    <div class="col-lg-2 col-md-6">
                                        <!-- gambar  -->
                                        <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_jukir/<?= $ft; ?>" id="imgPreview" alt="Image Preview">
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-12">
                                        <input class="form-control" id="imgUpload" name="foto" type="file" accept=".png, .jpeg, .jpg">
                                        <small style="color: red;">Format File : png, jpg, jpeg</small>

                                    </div>
                                </div>
                                <hr>
                                <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                    <button class="btn btn-primary-gradien" name="data_diri" type="submit">Simpan
                                        Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['data_diri'])) {

                // $id              = $db->real_escape_string($_POST['id']);
                // $id_jukir2       = $db->real_escape_string($_POST['id_jukir']);
                // $nik_jukir       = $db->real_escape_string($_POST['nik_jukir']);
                $nm_jukir        = $db->real_escape_string($_POST['nm_jukir']);
                $t_lahir_jukir   = $db->real_escape_string($_POST['t_lahir_jukir']);
                $tgl_lahir_jukir = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir_jukir'])));
                $a_jukir         = $db->real_escape_string($_POST['a_jukir']);
                // $korlap          = $db->real_escape_string($_POST['korlap']);
                // $a_tilok         = $db->real_escape_string($_POST['a_tilok']);
                // $tilok           = $db->real_escape_string($_POST['tilok']);
                // $cek_id_jukir = $db->query("SELECT id_jukir2 FROM jukir WHERE id_jukir2='$id_jukir2'");
                $file_tmp = $_FILES['foto']['tmp_name'];
                if (empty($file_tmp)) {
                    $q = $db->query("UPDATE jukir SET nm_jukir='$nm_jukir',t_lahir_jukir='$t_lahir_jukir',tgl_lahir_jukir='$tgl_lahir_jukir',a_jukir='$a_jukir', updated_at=NOW() WHERE id_jukir='$_GET[id]'");
                    #  $q  = $db->query("INSERT INTO jukir VALUES ('$id','$id_jukir2','$nik_jukir','$nm_jukir','$t_lahir_jukir','$tgl_lahir_jukir','$a_jukir','$korlap','$a_tilok','$tilok','$kta_sd','','','','$_SESSION[id_usr]',NOW(),NOW(),NULL)");
                    sweetAlert('jukir', 'sukses', 'Sukses !', 'Juru Parkir atas nama (' . $nm_jukir . ') berhasil diinput');
                } else {
                    $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                    $name_tmp  = $_FILES['foto']['name'];
                    $x         = explode('.', $name_tmp);
                    $extend    = strtolower(end($x));
                    $time      = date('dmYHis');
                    $foto      = $d['id_jukir2'] . '_' . strtoupper(slug($nm_jukir)) . '_FOTO_' . $time . '.' . $extend;
                    $path      = '_uploads/f_jukir/';

                    //cek ekstensi
                    if (in_array($extend, $ext_valid) === true) {
                        //Compress Image
                        fotoCompressResize($foto, $file_tmp, $path);
                        //inster ke database
                        $q = $db->query("UPDATE jukir SET nm_jukir='$nm_jukir',t_lahir_jukir='$t_lahir_jukir',tgl_lahir_jukir='$tgl_lahir_jukir',a_jukir='$a_jukir', f_jukir='$foto', updated_at=NOW() WHERE id_jukir='$_GET[id]'");
                        unlink('_uploads/f_jukir/' . $d['f_jukir']);
                        sweetAlert('jukir', 'sukses', 'Sukses !', 'Juru Parkir atas nama (' . $nm_jukir . ') berhasil diinput');
                    } else {
                        sweetAlert('jukir/edit/' . $_GET['id'], 'error', 'Error Ekstensi !', 'I]nputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
                        // sweetAlert('korlap/add', 'error', '', ' ');
                    }
                }
                //cek username dalam database
            }

            ?>
            <?php break; ?>
        <?php
        case 'perpanjangan':
            $d = $db->query("SELECT * FROM jukir a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi AND a.id_jukir='$_GET[id]'")->fetch_assoc();
            if (empty($d['f_jukir'])) {
                $ft = 'default.png';
            } else {
                $ft = $d['f_jukir'];
            }
            if (empty($d['id_jukir'])) {
                sweetAlert('jukir', 'error', 'Error !', 'Data Juru Parkir Tidak ditemukan.!');
            }
            if (date('m-Y', strtotime($d['kta_sd'])) >= date('m-Y')) {
                $but = 'disabled';
                sweetAlert('jukir', 'error', 'Error !', 'Tidak bisa memperpanjang KTA, dikarenakan KTA Jukir masih aktif.!');
            }
        ?>
            <title>Perpanjangan KTA Juru Parkir | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Perpanjangan KTA Jukir</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Jukir </li>
                                    <li class="breadcrumb-item active">Perpanjangan KTA</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-lg-5 col-md-12">
                                <div class="card card-absolute">
                                    <div class="card-header bg-secondary">
                                        <h5 class="text-white">Data saat ini</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (date('m-Y', strtotime($d['kta_sd'])) >= date('m-Y')) {
                                            $kta_sd = '<b class="text-success">' . tgl_indo(date('Y-m-d', strtotime($d['kta_sd']))) . '</b>';
                                        } else {
                                            $kta_sd = '<b class="text-danger">' . tgl_indo(date('Y-m-d', strtotime($d['kta_sd']))) . '</b>';
                                        }
                                        ?>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th width="130px"></th>
                                                    <th width="20px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top"><b>Nama Jukir</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"><?= $d['nm_jukir']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>ID Registrasi</b> </td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td valign="top"><?= $d['id_jukir2']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Korlap</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td> <?= $d['nm_korlap']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Alamat Parkir</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td> <?= $d['nm_jalan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Titik Lokasi</b></td>
                                                    <td valign="top"><b>:</b></td>
                                                    <td> <?= $d['tilok']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b>Tanggal Expired</b></td>
                                                    <td valign=""><b>:</b></td>
                                                    <td> <?= $kta_sd; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="card card-absolute">
                                    <div class="card-header bg-secondary">
                                        <h5 class="text-white">Ubah lokasi jaga <i style="color: pink;" class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Jika tidak ada perubahan data korlap, alamat, dan titik lokasi, harap data disamakan dengan kolom yang disebelah kiri (data saat ini)."></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <!-- <input type="hidden" class="form-control" name="id" value="<?= verify(); ?>" required> -->

                                            <div class="col-md-12">
                                                <label>Koordinator Lapangan :</label>
                                                <select class="form-select js-example-basic-single" name="korlap" id="korlap" aria-label="Pilih Level" required>
                                                    <option value="<?= $d['id_lokasi']; ?>"><?= $d['id_lokasi']; ?></option>
                                                </select>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Korlap tidak boleh kosong.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-12">
                                                <label>Alamat Lokasi Perparkiran :</label>
                                                <select class="form-select js-example-basic-single" name="a_tilok" id="lokasi" aria-label="Pilih Level" required>
                                                    <option value=""></option>
                                                </select>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Alamat Lokasi tidak boleh kosong.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-12">
                                                <label>Titik Lokasi :</label>
                                                <input type="text" class="form-control" name="tilok" required>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Titik Lokasi tidak boleh kosong.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-2">
                                            <div class="col-md-12">
                                                <label for="floatingInput"> Masa Berlaku KTA </label> <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Masa berlaku KTA Max 3 Bulan."></i> : <small style="color: orange;">
                                                    Format : bulan/tanggal/tahun</small> </label>
                                                <input type="text" class="datepicker-here form-control digits" data-language="en" id="minMaxExample" data-position="bottom right" name="kta_sd" required>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Masa Berlaku tidak boleh kosong.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-12">
                                                <label>Keterangan <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Kalimat di dalam kolom hanya sebagai contoh."></i> :</label>
                                                <textarea class="form-control" name="ket_kta" required>Pada tanggal <?= tgl_indo(date('Y-m-d')); ?>, <?= $d['nm_jukir']; ?> memperpanjang KTA Jukir miliknya..</textarea>
                                                <div class="valid-feedback">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Titik Lokasi tidak boleh kosong.
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto <?= $but; ?>">
                                            <button class="btn btn-primary-gradien" name="lokasi_jaga" type="submit">Simpan
                                                Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if (isset($_POST['lokasi_jaga'])) {
                    $korlap   = $db->real_escape_string($_POST['korlap']);
                    $a_tilok  = $db->real_escape_string($_POST['a_tilok']);
                    $tilok    = $db->real_escape_string($_POST['tilok']);
                    $ket_kta  = $db->real_escape_string($_POST['ket_kta']);
                    $kta_sd   = date('Y-m-d', strtotime($db->real_escape_string($_POST['kta_sd'])));
                    // var_dump($korlap, $a_tilok, $tilok);
                    // die();
                    $q = $db->query("UPDATE jukir SET korlap='$korlap',a_tilok='$a_tilok',tilok='$tilok',kta_sd='$kta_sd',updated_at=NOW() WHERE id_jukir='$_GET[id]'");
                    if ($q) {
                        $qq = $db->query("INSERT INTO jukir_kta VALUES ('','$_GET[id]','$korlap','$a_tilok','$tilok',NOW(),'$kta_sd','$ket_kta')");
                        if ($qq) {
                            sweetAlert('jukir', 'sukses', 'Sukses !', 'Data berhasil diubah');
                        } else {
                            sweetAlert('jukir/edit/' . $_GET['id'], 'error', 'Error !', 'Sepertinya terjadi kesalahan.');
                        }
                    } else {
                        sweetAlert('jukir/edit/' . $_GET['id'], 'error', 'Error !', 'Sepertinya terjadi kesalahan.');
                        // javascript('', 'alert-error', 'Error - ' . $db->error);
                    }
                } ?>
            </div>
            <?php break; ?>
        <?php
        case 'ktp':
            $d = $db->query("SELECT * FROM jukir WHERE id_jukir='$_GET[id]'")->fetch_assoc();
            if (empty($d['id_jukir'])) {
                sweetAlert('jukir', 'error', 'Error !', 'Data Juru Parkir Tidak ditemukan.!');
            }
        ?>
            <title>KTP Juru Parkir | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>KTP Juru Parkir</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Jukir </li>
                                    <li class="breadcrumb-item active">KTP Jukir</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">

                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $d['nik_jukir']; ?>" maxlength="16" disabled>

                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" value="<?= $d['nm_jukir']; ?>" disabled>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-lg-2 col-md-6">
                                    <label>Foto Jukir :</label>
                                    <?php
                                    if (empty($d['f_jukir'])) {
                                        $ft = 'default.png';
                                    } else {
                                        $ft = $d['f_jukir'];
                                    }
                                    ?>
                                    <!-- gambar  -->
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_jukir/<?= $ft; ?>" alt="Image Jukir Preview">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label>Foto KTP Jukir :</label>

                                    <?php
                                    if (empty($d['f_ktp_jukir'])) {
                                        $ft_ktp = 'default.png';
                                    } else {
                                        $ft_ktp = $d['f_ktp_jukir'];
                                    }
                                    ?>
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_ktp_jukir/<?= $ft_ktp; ?>" id="imgPreview" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <label>Pilih berkas Foto KTP Jukir :</label>

                                    <input class="form-control" id="imgUpload" name="foto" type="file" accept=".png, .jpeg, .jpg" required>
                                    <small style="color: red;">Format File : png, jpg, jpeg</small>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Foto KTP tidak boleh kosong.
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

                            $file_tmp = $_FILES['foto']['tmp_name'];

                            $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                            $name_tmp  = $_FILES['foto']['name'];
                            $x         = explode('.', $name_tmp);
                            $extend    = strtolower(end($x));
                            $time      = date('dmYHis');
                            $foto      = $d['id_jukir2'] . '_' . strtoupper(slug($d['nm_jukir'])) . '_KTP_' . $time . '.' . $extend;
                            $path      = '_uploads/f_ktp_jukir/';

                            //cek ekstensi
                            if (in_array($extend, $ext_valid) === true) {

                                //Compress Image
                                fotoCompressResize($foto, $file_tmp, $path);
                                //inster ke database
                                $q  = $db->query("UPDATE jukir SET f_ktp_jukir='$foto',
                                                                    updated_at=NOW()
                                                               WHERE id_jukir='$_GET[id]'");
                                if (!empty($d['f_ktp_jukir'])) {
                                    unlink('_uploads/f_ktp_jukir/' . $d['f_ktp_jukir']);
                                }
                                //menghapus foto lama
                                sweetAlert('jukir', 'sukses', 'Berhasil !', 'Data Juru Parkir berhasil di update');
                            } else {
                                sweetAlert('jukir/ktp', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
                                // sweetAlert('korlap/add', 'error', '', ' ');
                            }
                            // } else {
                            //     sweetAlert('korlap/add', 'error', 'Error Ekstensi !', ' NIK <i>(' . $nik_korlap . ')</i> sudah terdaftar didalam database.!');
                            // }
                            //cek username dalam database
                        } ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'kta':
            $d = $db->query("SELECT * FROM jukir WHERE id_jukir='$_GET[id]'")->fetch_assoc();
            if (empty($d['id_jukir'])) {
                sweetAlert('jukir', 'error', 'Error !', 'Data Juru Parkir Tidak ditemukan.!');
            }
        ?>
            <title>KTP Juru Parkir | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>KTP Juru Parkir</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Jukir </li>
                                    <li class="breadcrumb-item active">KTP Jukir</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">

                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $d['nik_jukir']; ?>" maxlength="16" disabled>

                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" value="<?= $d['nm_jukir']; ?>" disabled>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-lg-2 col-md-6">
                                    <label>Foto Jukir :</label>
                                    <?php
                                    if (empty($d['f_jukir'])) {
                                        $ft = 'default.png';
                                    } else {
                                        $ft = $d['f_jukir'];
                                    }
                                    ?>
                                    <!-- gambar  -->
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_jukir/<?= $ft; ?>" alt="Image Jukir Preview">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label>Foto KTP Jukir :</label>

                                    <?php
                                    if (empty($d['f_ktp_jukir'])) {
                                        $ft_ktp = 'default.png';
                                    } else {
                                        $ft_ktp = $d['f_ktp_jukir'];
                                    }
                                    ?>
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_ktp_jukir/<?= $ft_ktp; ?>" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label>Foto KTA Jukir :</label>

                                    <?php
                                    if (empty($d['f_kta_jukir'])) {
                                        $ft_kta = 'default.png';
                                    } else {
                                        $ft_kta = $d['f_kta_jukir'];
                                    }
                                    ?>
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_kta_jukir/<?= $ft_kta; ?>" id="imgPreview" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Pilih berkas Foto KTA Jukir :</label>

                                    <input class="form-control" id="imgUpload" name="foto" type="file" accept=".png, .jpeg, .jpg" required>
                                    <small style="color: red;">Format File : png, jpg, jpeg</small>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Foto KTA tidak boleh kosong.
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

                            $file_tmp = $_FILES['foto']['tmp_name'];

                            $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                            $name_tmp  = $_FILES['foto']['name'];
                            $x         = explode('.', $name_tmp);
                            $extend    = strtolower(end($x));
                            $time      = date('dmYHis');
                            $foto      = $d['id_jukir2'] . '_' . strtoupper(slug($d['nm_jukir'])) . '_KTA_' . $time . '.' . $extend;
                            $path      = '_uploads/f_kta_jukir/';

                            //cek ekstensi
                            if (in_array($extend, $ext_valid) === true) {

                                //Compress Image
                                fotoCompressResize($foto, $file_tmp, $path);
                                //inster ke database
                                $q  = $db->query("UPDATE jukir SET f_kta_jukir='$foto',
                                                                    updated_at=NOW()
                                                               WHERE id_jukir='$_GET[id]'");
                                if (!empty($d['f_kta_jukir'])) {
                                    unlink('_uploads/f_kta_jukir/' . $d['f_kta_jukir']);
                                }
                                //menghapus foto lama
                                sweetAlert('jukir', 'sukses', 'Berhasil !', 'Data Juru Parkir berhasil di update');
                            } else {
                                sweetAlert('jukir/ktp', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
                                // sweetAlert('korlap/add', 'error', '', ' ');
                            }
                            // } else {
                            //     sweetAlert('korlap/add', 'error', 'Error Ekstensi !', ' NIK <i>(' . $nik_korlap . ')</i> sudah terdaftar didalam database.!');
                            // }
                            //cek username dalam database
                        } ?>
                    </div>
                </div>
            </div>
            <?php break; ?>
        <?php
        case 'delete':
            $id_korlap = $db->real_escape_string($_POST['id_korlap']);
            $nm_korlap = $db->real_escape_string($_POST['nm_korlap']);
            $f_korlap = $db->real_escape_string($_POST['f_korlap']);
            $f_ktp_korlap = $db->real_escape_string($_POST['f_ktp_korlap']);
            $cek_f_korlap = $db->query("SELECT f_korlap FROM korlap WHERE id_korlap='$id_korlap'");
            $cek_f_ktp_korlap = $db->query("SELECT f_ktp_korlap FROM korlap WHERE id_korlap='$id_korlap'");

            if ($cek_f_korlap->num_rows >= 0 and $cek_f_ktp_korlap == 0) {
                unlink('_uploads/f_korlap/' . $f_korlap);
                $db->query("DELETE FROM korlap WHERE id_korlap='$id_korlap'");
                sweetAlert('korlap', 'sukses', 'Data berhasil dihapus.!', 'Data Koordinator Lapangan ( ' . $nm_korlap . ' ) Berhasil dihapus.');
            } elseif ($cek_f_korlap->num_rows == 0 and $cek_f_ktp_korlap >= 0) {
                unlink('_uploads/f_ktp_korlap/' . $f_ktp_korlap);
                $db->query("DELETE FROM korlap WHERE id_korlap='$id_korlap'");
                sweetAlert('korlap', 'sukses', 'Data berhasil dihapus.!', 'Data Koordinator Lapangan ( ' . $nm_korlap . ' ) Berhasil dihapus.');
            } elseif ($cek_f_korlap->num_rows >= 0 and $cek_f_ktp_korlap >= 0) {
                unlink('_uploads/f_korlap/' . $f_korlap);
                unlink('_uploads/f_ktp_korlap/' . $f_ktp_korlap);
                $db->query("DELETE FROM korlap WHERE id_korlap='$id_korlap'");
                sweetAlert('korlap', 'sukses', 'Data berhasil dihapus.!', 'Data Koordinator Lapangan ( ' . $nm_korlap . ' ) Berhasil dihapus.');
            } else {
                $db->query("DELETE FROM korlap WHERE id_korlap='$id_korlap'");
                sweetAlert('korlap', 'sukses', 'Data berhasil dihapus.!', 'Data Koordinator Lapangan ( ' . $nm_korlap . ' ) Berhasil dihapus.');
            }
        ?>

        <?php
        case 'qrcode':
            $id_jukir = $db->real_escape_string($_POST['id_jukir']);
            $id_jukir2 = $db->real_escape_string($_POST['id_jukir2']);
            $nm_jukir = $db->real_escape_string($_POST['nm_jukir']);
            $f_jukir = $db->real_escape_string($_POST['f_jukir']);

            //ambil data jukir
            $f = $db->query("SELECT f_jukir FROM jukir WHERE id_jukir='$id_jukir'");

            //foto jukir
            if ($f->num_rows == 0) {
                $ft = 'default.png';
            } else {
                $ft = $f_jukir;
            }

            $tempdir = '_uploads/qrcode_jukir/'; //Nama folder tempat menyimpan file qrcode
            if (!file_exists($tempdir)) //Buat folder bername temp
                mkdir($tempdir);
            $time   = date('dmYHis');
            $qrname = $id_jukir2 . '_' . strtoupper(slug($nm_jukir)) . '_QRCODE_' . $time . '.png';

            //ambil logo
            // $logopath = base_url() . '_uploads/f_jukir/' . $ft;
            $logopath = base_url() . '_uploads/f_jukir/' . $ft;


            //isi qrcode jika di scan
            $codeContents = base_url() . 'jukir/detail/' . $id_jukir;

            //simpan file qrcode
            QRcode::png($codeContents, $tempdir . $qrname, QR_ECLEVEL_H, 10, 4);


            // ambil file qrcode
            $QR = imagecreatefrompng($tempdir . $qrname);

            // memulai menggambar logo dalam file qrcode
            $logo = imagecreatefromstring(file_get_contents($logopath));

            imagecolortransparent($logo, imagecolorallocatealpha($logo, 0, 0, 0, 127));
            imagealphablending($logo, false);
            imagesavealpha($logo, true);

            $QR_width = imagesx($QR);
            $QR_height = imagesy($QR);

            $logo_width = imagesx($logo);
            $logo_height = imagesy($logo);

            // Scale logo to fit in the QR Code
            $logo_qr_width = $QR_width / 8;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;

            imagecopyresampled($QR, $logo, $QR_width / 2.3, $QR_height / 2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

            // Simpan kode QR lagi, dengan logo di atasnya
            $q = imagepng($QR, $tempdir . $qrname);
            //  jika sudah ada qrcode
            $d = $db->query("SELECT * FROM jukir_qrcode WHERE id_jukir = '$id_jukir'")->fetch_assoc();
            if (empty($d['id_jukir'])) {
                $q = $db->query("INSERT INTO jukir_qrcode VALUE ('','$id_jukir','$qrname','$codeContents','$_SESSION[id_usr]',NOW())");
                if ($q) {
                    sweetAlert('jukir', 'sukses', 'Berhasil.!', 'QR Code Berhasil digenerate.');
                } else {
                    sweetAlert('jukir', 'error', 'Error !', 'Sepertinya ada kesalahan.');
                }
            } else {
                $q = $db->query("UPDATE jukir_qrcode SET nm_qr = '$qrname' WHERE id_jukir='$id_jukir'");
                if ($q) {
                    unlink('_uploads/qrcode_jukir/' . $d['nm_qr']);
                    sweetAlert('jukir', 'sukses', 'Berhasil.!', 'QR Code Berhasil digenerate.');
                } else {
                    sweetAlert('jukir', 'error', 'Error !', 'Sepertinya ada kesalahan.');
                }
            }
        ?>
<?php
    }
} ?>