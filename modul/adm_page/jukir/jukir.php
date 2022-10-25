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
                                                <th>Foto</th>
                                                <th>KTP</th>
                                                <th>KTA</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT * FROM jukir a, korlap b, lokasi c WHERE a.korlap=b.id_korlap AND a.a_tilok=c.id_lokasi ORDER BY a.nm_jukir ASC");
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
                                                if (date('m-Y', strtotime($u['kta_sd'])) <= date('m-Y')) {
                                                    $sd = 'disabled';
                                                    $style = '';
                                                } else {
                                                    $sd = '';
                                                    $style = 'class="text-danger"';
                                                }
                                            ?>
                                                <tr <?= $style; ?>>
                                                    <!-- <td><?= $no++; ?></td> -->
                                                    <td><?= $u['id_jukir2']; ?></td>
                                                    <td><?= $u['nm_jukir']; ?></td>
                                                    <td><?= $u['nm_korlap']; ?></td>
                                                    <td><?= $u['nm_jalan']; ?></td>
                                                    <td>
                                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_jukir/<?= $ft; ?>" alt="#">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar"><a href="<?= base_url(); ?>jukir/ktp/<?= $u['id_jukir']; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk mengubah KTP"><img class="b-r-8 img-40" src="_uploads/f_ktp_jukir/<?= $ft_ktp; ?>" alt="#"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar"><a href="<?= base_url(); ?>jukir/kta/<?= $u['id_jukir']; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk mengubah KTA jukir"><img class=" b-r-8 img-40" src="_uploads/f_kta_jukir/<?= $ft_kta; ?>" alt="#"></a><br>
                                                            <!-- <small><?= $p['nama']; ?></small> -->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?= base_url() ?>jukir/perpanjangan/<?= $u['id_jukir'] ?>" class="btn btn-success btn-sm <?= $sd; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="KTA Sudah kadaluwarsa"><i class="fa fa-calendar"></i> Perpanjang</a>
                                                            <a href="<?= base_url(); ?>jukir/detail/<?= $u['id_jukir']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i> Details</a>
                                                            <a href="<?= base_url(); ?>jukir/edit/<?= $u['id_jukir']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                                            <form action="<?= base_url(); ?>korlap/delete" method="POST" class="d-inline">
                                                                <input type="hidden" name="id_jukir" value="<?= $u['id_jukir']; ?>">
                                                                <input type="hidden" name="nm_jukir" value="<?= $u['nm_jukir']; ?>">
                                                                <input type="hidden" name="f_jukir" value="<?= $u['f_jukir']; ?>">
                                                                <input type="hidden" name="f_ktp_jukir" value="<?= $u['f_ktp_jukir']; ?>">
                                                                <button class="btn btn-danger btn-sm border-1" onclick="return hapus()"><i class="fa fa-trash"></i> Delete</button>
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
                                    <select class="form-select js-example-basic-single" name="a_lokasi" id="lokasi" aria-label="Pilih Level" required>
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
                                    <input type="text" class="form-control" name="t_lahir_korlap">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput"> Tanggal Lahir :</label><small style="color: orange;">
                                        Format : bulan/tanggal/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" data-position="bottom right" name="tgl_lahir_korlap">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-6">
                                    <label for="floatingInput"> Masa Berlaku KTA :</label><small style="color: orange;">
                                        Format : bulan/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" data-min-view="months" data-view="months" data-date-format="MM yyyy" data-position="bottom right" name="kta_sd" required>
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
                            $nik_korlap       = $db->real_escape_string($_POST['nik_korlap']);
                            $nm_korlap        = $db->real_escape_string($_POST['nm_korlap']);
                            $a_korlap         = $db->real_escape_string($_POST['a_korlap']);
                            $perjanjian       = $db->real_escape_string($_POST['perjanjian']);
                            $t_lahir_korlap   = $db->real_escape_string($_POST['t_lahir_korlap']);
                            $tgl_lahir_korlap = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir_korlap'])));
                            // $slug     = slug($nopol_bus);
                            $cek_korlap = $db->query("SELECT nik_korlap FROM korlap WHERE nik_korlap='$nik_korlap'");
                            //jika username tidak ada didalam database
                            if ($cek_korlap->num_rows == 0) {

                                //file gambar
                                $file_tmp = $_FILES['foto']['tmp_name'];
                                if (empty($file_tmp)) {
                                    $q  = $db->query("INSERT INTO korlap VALUES ('$id','$nik_korlap','$nm_korlap','$a_korlap','$t_lahir_korlap','$tgl_lahir_korlap','','','','',NOW(),NOW(),NULL,'$_SESSION[id_usr]')");
                                    sweetAlert('korlap', 'sukses', 'Sukses !', 'Korlap atas nama (' . $nm_korlap . ') berhasil diinput');
                                } else {
                                    $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                                    $name_tmp  = $_FILES['foto']['name'];
                                    $x         = explode('.', $name_tmp);
                                    $extend    = strtolower(end($x));
                                    $time      = date('dmYHis');
                                    $foto      = $id . '_' . $time . '.' . $extend;
                                    $path      = '_uploads/f_korlap/';

                                    //cek ekstensi
                                    if (in_array($extend, $ext_valid) === true) {
                                        //Compress Image
                                        fotoCompressResize($foto, $file_tmp, $path);
                                        //inster ke database
                                        $q  = $db->query("INSERT INTO korlap VALUES ('$id','$nik_korlap','$nm_korlap','$a_korlap','$t_lahir_korlap','$tgl_lahir_korlap','$foto','','','',NOW(),NOW(),NULL,'$_SESSION[id_usr]')");
                                        sweetAlert('korlap', 'sukses', 'Sukses !', 'Korlap atas nama (' . $nm_korlap . ') berhasil diinput');
                                    } else {
                                        sweetAlert('korlap/add', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
                                        // sweetAlert('korlap/add', 'error', '', ' ');
                                    }
                                }
                            } else {
                                javascript('', 'alert-error', ' NIK <i>(' . $nik_korlap . ')</i> sudah terdaftar didalam database.!');
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
            $d = $db->query("SELECT * FROM korlap WHERE id_korlap='$_GET[id]'")->fetch_assoc();
        ?>
            <title>Edit Koordinator Lapangan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Edit Koordinator Lapangan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Korlap </li>
                                    <li class="breadcrumb-item active">Edit Korlap</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $d['nik_korlap']; ?>" maxlength="16" disabled>

                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" name="nm_korlap" value="<?= $d['nm_korlap']; ?>" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Alamat :</label>
                                    <textarea class="form-control" name="a_korlap"><?= $d['a_korlap']; ?></textarea>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Perjanjian :</label>
                                    <select class="form-select js-example-basic-single" name="perjanjian" id="floatingSelect" aria-label="Pilih Level">
                                        <option value="<?= $d['perjanjian']; ?>"><?= $d['perjanjian']; ?></option>
                                        <option value="SPT">SPT</option>
                                        <option value="PKS">PKS</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Tempat Lahir :</label>
                                    <input type="text" class="form-control" name="t_lahir_korlap" value="<?= $d['t_lahir_korlap']; ?>">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput">Tanggal Lahir :</label><small style="color: orange;">
                                        Format : bulan/tanggal/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" name="tgl_lahir_korlap" value="<?= date('m/d/Y', strtotime($d['tgl_lahir_korlap'])); ?>">
                                </div>
                            </div>
                            <div class="row g-2">
                                <label>Foto Korlap :</label>
                                <div class="col-lg-2 col-md-6">
                                    <!-- gambar  -->
                                    <?php
                                    if (empty($d['f_korlap'])) {
                                        $ft = 'default.png';
                                    } else {
                                        $ft = $d['f_korlap'];
                                    }
                                    ?>
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_korlap/<?= $ft; ?>" id="imgPreview" alt="Image Preview">
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
                            $nik_korlap       = $db->real_escape_string($_POST['nik_korlap']);
                            $nm_korlap        = $db->real_escape_string($_POST['nm_korlap']);
                            $a_korlap         = $db->real_escape_string($_POST['a_korlap']);
                            $perjanjian       = $db->real_escape_string($_POST['perjanjian']);
                            $t_lahir_korlap   = $db->real_escape_string($_POST['t_lahir_korlap']);
                            $tgl_lahir_korlap = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl_lahir_korlap'])));
                            // $slug     = slug($nopol_bus);
                            // $cek_korlap = $db->query("SELECT nik_korlap FROM korlap WHERE nik_korlap='$nik_korlap'");
                            //jika username tidak ada didalam database
                            // if ($cek_korlap->num_rows == 0) {

                            //file gambar
                            $file_tmp = $_FILES['foto']['tmp_name'];
                            if (empty($file_tmp)) {
                                $q  = $db->query("UPDATE korlap SET nm_korlap='$nm_korlap',
                                                                    a_korlap='$a_korlap',
                                                                    t_lahir_korlap='$t_lahir_korlap',
                                                                    tgl_lahir_korlap='$tgl_lahir_korlap',
                                                                    perjanjian='$perjanjian',
                                                                    updated_at=NOW()
                                                               WHERE id_korlap='$_GET[id]'");
                                sweetAlert('korlap', 'sukses', 'Berhasil !', 'Data Koordinator Lapangan berhasil di update');
                            } else {
                                $ext_valid = array('png', 'jpg', 'jpeg', 'gif');
                                $name_tmp  = $_FILES['foto']['name'];
                                $x         = explode('.', $name_tmp);
                                $extend    = strtolower(end($x));
                                $time      = date('dmYHis');
                                $foto      = $_GET['id'] . '_' . $time . '.' . $extend;
                                $path      = '_uploads/f_korlap/';

                                //cek ekstensi
                                if (in_array($extend, $ext_valid) === true) {

                                    //Compress Image
                                    fotoCompressResize($foto, $file_tmp, $path);
                                    //inster ke database
                                    $q  = $db->query("UPDATE korlap SET nm_korlap='$nm_korlap',
                                                                    a_korlap='$a_korlap',
                                                                    t_lahir_korlap='$t_lahir_korlap',
                                                                    tgl_lahir_korlap='$tgl_lahir_korlap',
                                                                    f_korlap='$foto',
                                                                    perjanjian='$perjanjian',
                                                                     updated_at=NOW()
                                                               WHERE id_korlap='$_GET[id]'");
                                    //menghapus foto lama
                                    unlink('_uploads/f_korlap/' . $d['f_korlap']);
                                    sweetAlert('korlap', 'sukses', 'Berhasil !', 'Data Koordinator Lapangan berhasil di update');
                                } else {
                                    sweetAlert('korlap/add', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
                                    // sweetAlert('korlap/add', 'error', '', ' ');
                                }
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
        case 'pengawas-korlap':
            $data = $db->query("SELECT * FROM korlap WHERE id_korlap='$_GET[id]'")->fetch_assoc();
            if (empty($data['pengawas'])) {
                $d = $db->query("SELECT * FROM korlap WHERE id_korlap='$_GET[id]'")->fetch_assoc();
                $opt = '<option>-- Pilih Pengasawas --</option>';
            } else {
                $d = $db->query("SELECT * FROM korlap a, users b WHERE a.pengawas=b.id AND b.level='2' OR b.level='3' AND a.id_korlap='$_GET[id]'")->fetch_assoc();
                $opt = '<option value="' . $d['id'] . '">' . $d['nama'] . '</option>';
            }
        ?>
            <title>Pengawas Koordinator Lapangan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Pengawas Koordinator Lapangan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Korlap </li>
                                    <li class="breadcrumb-item active">Pengawas Korlap</li>
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
                                <div class="col-lg-4 col-md-12">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $d['nik_korlap']; ?>" maxlength="16" disabled>

                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" value="<?= $d['nm_korlap']; ?>" disabled>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <label>Pengawas :</label>
                                    <select class="form-select js-example-basic-single" name="pengawas" id="floatingSelect" aria-label="Pilih Level">
                                        <?= $opt; ?>
                                        <?php
                                        $pengawas = $db->query("SELECT * FROM users WHERE level='2' OR level='3' ORDER BY nama ASC");
                                        while ($p = $pengawas->fetch_assoc()) :
                                        ?>
                                            <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
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
                            $pengawas = $db->real_escape_string($_POST['pengawas']);

                            $q  = $db->query("UPDATE korlap SET pengawas='$pengawas',
                                                                    updated_at=NOW()
                                                               WHERE id_korlap='$_GET[id]'");
                            if ($q) {
                                sweetAlert('korlap', 'sukses', 'Berhasil !', 'Data Koordinator Lapangan berhasil di update');
                            } else {
                                sweetAlert('korlap/pengawas-korlap', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
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
        case 'ktp':
            $d = $db->query("SELECT * FROM korlap WHERE id_korlap='$_GET[id]'")->fetch_assoc();
        ?>
            <title>KTP Koordinator Lapangan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>KTP Koordinator Lapangan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Korlap </li>
                                    <li class="breadcrumb-item active">KTP Korlap</li>
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
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $d['nik_korlap']; ?>" maxlength="16" disabled>

                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" value="<?= $d['nm_korlap']; ?>" disabled>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-lg-2 col-md-6">
                                    <label>Foto Korlap :</label>
                                    <?php
                                    if (empty($d['f_korlap'])) {
                                        $ft = 'default.png';
                                    } else {
                                        $ft = $d['f_korlap'];
                                    }
                                    ?>
                                    <!-- gambar  -->
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_korlap/<?= $ft; ?>" alt="Image Korlap Preview">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label>Foto KTP Korlap :</label>

                                    <?php
                                    if (empty($d['f_ktp_korlap'])) {
                                        $ft = 'default.png';
                                    } else {
                                        $ft = $d['f_ktp_korlap'];
                                    }
                                    ?>
                                    <div class="avatar"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/f_ktp_korlap/<?= $ft; ?>" id="imgPreview" alt="Image Preview">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <label>Pilih berkas Foto KTP Korlap :</label>

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
                            $foto      = $_GET['id'] . '_' . $time . '.' . $extend;
                            $path      = '_uploads/f_ktp_korlap/';

                            //cek ekstensi
                            if (in_array($extend, $ext_valid) === true) {

                                //Compress Image
                                fotoCompressResize($foto, $file_tmp, $path);
                                //inster ke database
                                $q  = $db->query("UPDATE korlap SET f_ktp_korlap='$foto',
                                                                    updated_at=NOW()
                                                               WHERE id_korlap='$_GET[id]'");
                                if (!empty($d['f_ktp_korlap'])) {
                                    unlink('_uploads/f_ktp_korlap/' . $d['f_ktp_korlap']);
                                }
                                //menghapus foto lama
                                sweetAlert('korlap', 'sukses', 'Berhasil !', 'Data Koordinator Lapangan berhasil di update');
                            } else {
                                sweetAlert('korlap/ktp', 'error', 'Error Ekstensi !', 'Inputan Foto - Hanya File JPG, PNG, JPEG yang diperbolehkan.');
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
    }
} ?>