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
            <title>Koordinator Lapangan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Data Koordinator Lapangan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item active">Korlap </li>
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
                                        <a href="<?= base_url(); ?>korlap/add" class="btn btn-primary-gradien" type="button">Tambah
                                            Data</a>
                                    </div>
                                    <br>
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>KTP</th>
                                                <th>Pengawas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT * FROM korlap ORDER BY nm_korlap ASC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                                if (empty($u['f_korlap'])) {
                                                    $ft = 'default.png';
                                                } else {
                                                    $ft = $u['f_korlap'];
                                                }
                                                if (empty($u['f_ktp_korlap'])) {
                                                    $ft_ktp = 'default.png';
                                                } else {
                                                    $ft_ktp = $u['f_ktp_korlap'];
                                                }
                                                $p = $db->query("SELECT * FROM users a, korlap b WHERE a.id=b.pengawas AND id_korlap='$u[id_korlap]'")->fetch_assoc();
                                                if (empty($p['f_usr'])) {
                                                    $ft_p = 'default.png';
                                                } else {
                                                    $ft_p = $p['f_usr'];
                                                }
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $u['nik_korlap']; ?></td>
                                                    <td><?= $u['nm_korlap']; ?></td>
                                                    <td><?= $u['a_korlap']; ?></td>
                                                    <td>
                                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_korlap/<?= $ft; ?>" alt="#">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar"><a href="<?= base_url(); ?>korlap/ktp/<?= $u['id_korlap']; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk mengubah KTP"><img class="b-r-8 img-40" src="_uploads/f_ktp_korlap/<?= $ft_ktp; ?>" alt="#"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar"><a href="<?= base_url(); ?>korlap/pengawas-korlap/<?= $u['id_korlap']; ?>" data-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="Pengawas : <?= $p['nama']; ?> [Klik untuk mengubah pengawas]"><img class=" b-r-8 img-40" src="_uploads/f_usr/<?= $ft_p; ?>" alt="#"></a><br>
                                                            <small><?= $p['nama']; ?></small>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>korlap/edit/<?= $u['id_korlap']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <a href="<?= base_url(); ?>korlap/detail/<?= $u['id_korlap']; ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i></a>

                                                        <form action="<?= base_url(); ?>korlap/delete" method="POST" class="d-inline">
                                                            <input type="hidden" name="id_korlap" value="<?= $u['id_korlap']; ?>">
                                                            <input type="hidden" name="nm_korlap" value="<?= $u['nm_korlap']; ?>">
                                                            <input type="hidden" name="f_korlap" value="<?= $u['f_korlap']; ?>">
                                                            <input type="hidden" name="f_ktp_korlap" value="<?= $u['f_ktp_korlap']; ?>">
                                                            <button class="btn btn-danger border-1" onclick="return hapus()"><i class="fa fa-trash"></i></button>
                                                        </form>
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
            <title>Tambah Koordinator Lapangan | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Tambah Koordinator Lapangan</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Korlap </li>
                                    <li class="breadcrumb-item active">Tambah Korlap</li>
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
                                    <input type="hidden" class="form-control" name="id" value="<?= verify(); ?>" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nik_korlap" id="nik_korlap" maxlength="16" required autofocus>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message_korlap"></label>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" name="nm_korlap" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Alamat :</label>
                                    <textarea class="form-control" name="a_korlap" required></textarea>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Tempat Lahir :</label>
                                    <input type="text" class="form-control" name="t_lahir_korlap">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput">Tanggal Lahir : Tanggal Lahir :</label><small style="color: orange;">
                                        Format : bulan/tanggal/tahun</small></label>
                                    <input type="text" class="datepicker-here form-control digits" data-language="en" name="tgl_lahir_korlap">
                                </div>
                            </div>
                            <div class="row g-2">
                                <label>Foto Korlap :</label>
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
                            $t_lahir_korlap   = $db->real_escape_string($_POST['t_lahir_korlap']);
                            $tgl_lahir_korlap = date('Y-m-d', strtotime($db->real_escape_string($post['tgl_lahir_korlap'])));
                            // $slug     = slug($nopol_bus);
                            $cek_korlap = $db->query("SELECT nik_korlap FROM korlap WHERE nik_korlap='$nik_korlap'");
                            //jika username tidak ada didalam database
                            if ($cek_korlap->num_rows == 0) {

                                //file gambar
                                $file_tmp = $_FILES['foto']['tmp_name'];
                                if (empty($file_tmp)) {
                                    $q  = $db->query("INSERT INTO korlap VALUES ('$id','$nik_korlap','$nm_korlap','$a_korlap','$t_lahir_korlap','$tgl_lahir_korlap','','','',NOW(),NOW(),NULL,'$_SESSION[id_usr]')");
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
                                        $q  = $db->query("INSERT INTO korlap VALUES ('$id','$nik_korlap','$nm_korlap','$a_korlap','$t_lahir_korlap','$tgl_lahir_korlap','$foto','','',NOW(),NOW(),NULL,'$_SESSION[id_usr]')");
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
                                <div class="col-lg-12 col-md-12">
                                    <label>NIK :</label>
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $d['nik_korlap']; ?>" maxlength="16" disabled>

                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nik tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Lengkap :</label>
                                    <input type="text" class="form-control" name="nm_korlap" value="<?= $d['nm_korlap']; ?>" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Lengkap tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Alamat :</label>
                                    <textarea class="form-control" name="a_korlap"><?= $d['a_korlap']; ?></textarea>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong.
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-6 col-md-12">
                                    <label>Tempat Lahir :</label>
                                    <input type="text" class="form-control" name="t_lahir_korlap" value="<?= $d['t_lahir_korlap']; ?>">
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="floatingInput">Tanggal Lahir : Tanggal Lahir :</label><small style="color: orange;">
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