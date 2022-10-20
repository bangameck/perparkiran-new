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
            <title>Lokasi Perparkiran | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Data Lokasi Perparkiran</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item active">Lokasi </li>
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
                                                <th>Nama Korlap</th>
                                                <th>Jenis Perjanjian</th>
                                                <th>Foto</th>
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
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><b><?= strtoupper($u['nm_korlap']); ?></b></td>
                                                    <td><?= $u['perjanjian']; ?></td>
                                                    <td>
                                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_korlap/<?= $ft; ?>" alt="#">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?= base_url(); ?>lokasi/info/<?= $u['id_korlap']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i> Lihat Lokasi</a>
                                                            <a href="<?= base_url(); ?>lokasi/add/<?= $u['id_korlap']; ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Lokasi</a>
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
        case 'all': ?>
            <title>Lokasi Perparkiran | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Data Lokasi Perparkiran</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item active">Lokasi </li>
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
                                                <th>Nama Korlap</th>
                                                <th>Nama Jalan</th>
                                                <th>Titik Lokasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT * FROM lokasi a, korlap b WHERE a.korlap=b.id_korlap ORDER BY b.nm_korlap ASC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><b><?= strtoupper($u['nm_korlap']); ?></b></td>
                                                    <td><?= $u['nm_jalan']; ?></td>
                                                    <td><?= $u['titik_lokasi']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <form action="<?= base_url(); ?>lokasi/delete" method="POST" class="d-inline">
                                                                <input type="hidden" name="id_korlap" value="<?= $u['korlap']; ?>">
                                                                <input type="hidden" name="id_lokasi" value="<?= $u['id_lokasi']; ?>">
                                                                <button class="btn btn-danger btn-sm" onclick="return hapus()"><i class="fa fa-trash"></i> Delete</button>
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
        case 'info':
            $kor = $db->query("SELECT * FROM korlap WHERE id_korlap='$_GET[id]'")->fetch_assoc();
        ?>
            <title>Lokasi Perparkiran | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Daftar Titik Lokasi <b><?= $kor['perjanjian']; ?> <?= $kor['nm_korlap']; ?></b></h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item active">Lokasi <?= $kor['nm_korlap']; ?></li>
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
                                                <th>Nama Korlap</th>
                                                <th>Nama Jalan</th>
                                                <th>Titik Lokasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $db->query("SELECT * FROM lokasi a, korlap b WHERE a.korlap=b.id_korlap AND a.korlap='$_GET[id]' ORDER BY b.nm_korlap ASC");
                                            $no = 1;
                                            while ($u = $us->fetch_assoc()) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><b><?= strtoupper($u['nm_korlap']); ?></b></td>
                                                    <td><?= $u['nm_jalan']; ?></td>
                                                    <td><?= $u['titik_lokasi']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <form action="<?= base_url(); ?>lokasi/delete" method="POST" class="d-inline">
                                                                <input type="hidden" name="id_korlap" value="<?= $u['korlap']; ?>">
                                                                <input type="hidden" name="id_lokasi" value="<?= $u['id_lokasi']; ?>">
                                                                <button class="btn btn-danger btn-sm" onclick="return hapus()"><i class="fa fa-trash"></i> Delete</button>
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
            $kor = $db->query("SELECT * FROM korlap WHERE id_korlap='$_GET[id]'")->fetch_assoc();
        ?>
            <title>Tambah Lokasi Perparkiran | <?= $title; ?></title>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Tambah Lokasi Perparkiran</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="git-pull-request"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Data Master</li>
                                    <li class="breadcrumb-item">Lokasi </li>
                                    <li class="breadcrumb-item active">Tambah Lokasi</li>
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
                                    <label>Nama Koordinator Lapangan :</label>
                                    <input type="text" class="form-control" value="<?= strtoupper($kor['nm_korlap']); ?>" readonly>

                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-lg-6 col-md-12">
                                    <label>Nama Jalan :</label>
                                    <input type="text" class="form-control" name="nm_jalan" required>
                                    <div class="media">
                                        <div class="text-end">
                                            <label id="message_korlap"></label>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                        Nama Jalan tidak boleh kosong.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label>Titik Lokasi :</label>
                                    <input type="text" class="form-control" name="titik_lokasi">
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

                            $id           = verify();
                            $nm_jalan     = $db->real_escape_string($_POST['nm_jalan']);
                            $titik_lokasi = $db->real_escape_string($_POST['titik_lokasi']);

                            $q  = $db->query("INSERT INTO lokasi VALUES ('$id','$_GET[id]','$nm_jalan','$titik_lokasi','$_SESSION[id_usr]',NOW(),NOW(),NULL)");
                            // $slug     = slug($nopol_bus);
                            if ($q) {
                                sweetAlert('lokasi/add/' . $_GET['id'], 'sukses', 'Sukses !', 'Lokasi Perparkiran berhasil diinput');
                            } else {
                                sweetAlert('lokasi/add/' . $_GET['id'], 'error', 'Error Ekstensi !', 'Sepertinya ada Kesalahan.');
                            }
                        } ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Daftar Titik Lokasi <b><?= $kor['perjanjian']; ?> <?= $kor['nm_korlap']; ?></b></h5>
                            <div class="dt-ext table-responsive">
                                <br>
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Jalan</th>
                                            <th>Titik Lokasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $us = $db->query("SELECT * FROM lokasi WHERE korlap='$_GET[id]' ORDER BY nm_jalan ASC");
                                        $no = 1;
                                        while ($u = $us->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><b><?= $u['nm_jalan']; ?></b></td>
                                                <td><?= $u['titik_lokasi']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <form action="<?= base_url(); ?>lokasi/delete" method="POST" class="d-inline">
                                                            <input type="hidden" name="id_korlap" value="<?= $_GET['id']; ?>">
                                                            <input type="hidden" name="id_lokasi" value="<?= $u['id_lokasi']; ?>">
                                                            <button class="btn btn-danger btn-sm" onclick="return hapus()"><i class="fa fa-trash"></i> Delete</button>
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
            <?php break; ?>
        <?php
        case 'delete':
            $id_korlap = $db->real_escape_string($_POST['id_korlap']);
            $id_lokasi = $db->real_escape_string($_POST['id_lokasi']);

            $q = $db->query("DELETE FROM lokasi WHERE id_lokasi='$id_lokasi'");
            if ($q) {
                sweetAlert('lokasi/add/' . $id_korlap, 'sukses', 'Sukses !', 'Lokasi Perparkiran berhasil diinput');
            } else {
                sweetAlert('lokasi/add/' . $_GET['id'], 'error', 'Error Ekstensi !', 'Sepertinya ada Kesalahan.');
            }
        ?>
<?php
    }
} ?>