<?php
include '_func/identity.php';
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
if ($csrf==false) {
    sweetAlert('out','error','Error Session !','Session telah berakhir atau akun anda sudah login diperangkat lain, silahkan login ulang');
} else {
$a=$_GET['a'];
switch($a){
    default:
    aut(array(1));
?>
<title>Regu | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Data Regu</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active">Regu </li>
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
                            <a href="<?= base_url(); ?>regu/add" class="btn btn-primary-gradien" type="button">Tambah
                                Data</a>
                        </div>
                        <br>
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Regu</th>
                                    <th>Karu</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $us=$db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                                $no=1;
                                while ($u=$us->fetch_assoc()) :
                                    if (empty($u['f_regu'])) {
                                        $ft ='default.png';
                                    } else {
                                        $ft = $u['f_regu'];
                                    }
                                    if (empty($u['karu'])) {
                                        $karu = '<small style="color: red;">Karu belum dipilih</small>';
                                    } else {
                                        $karud = $db->query("SELECT * FROM users WHERE id='".$u['karu']."'")->fetch_assoc();
                                        $karu = $karud['nama'];
                                    }
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $u['nm_regu']; ?></td>
                                    <td><?= $karu; ?></td>
                                    <td>
                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_regu/<?= $ft; ?>"
                                                alt="#">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>regu/edit/<?= $u['id_regu']; ?>"
                                                class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>regu/detail/<?= $u['id_regu']; ?>"
                                                class="btn btn-primary"><i class="fa fa-info-circle"></i></a>

                                            <form action="<?= base_url(); ?>regu/delete" method="POST">
                                                <input type="hidden" name="id_regu" value="<?= $u['id_regu']; ?>">
                                                <input type="hidden" name="f_regu" value="<?= $u['f_regu']; ?>">
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
<?php break; ?>
<?php case 'add' : 
aut(array(1));
?>
<title>Tambah Regu | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Tambah Regu</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item">Regu </li>
                        <li class="breadcrumb-item active">Tambah Regu</li>
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
                    <div class="col-lg-6 col-md-12">
                        <label">Nama Regu :</label>
                            <input type="text" class="form-control" name="nm_regu" required>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Nama Regu tidak boleh kosong.
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label">Komandan Regu :</label>
                            <select class="form-select js-example-basic-single" name="karu" id="floatingSelect"
                                aria-label="Pilih Karu">
                                <option value="">Pilih Karu</option>
                                <?php 
                            $user = $db->query("SELECT * FROM users WHERE level!='3' AND level!='1' ORDER BY nama ASC");
                            while($u=$user->fetch_assoc()) :
                            ?>
                                <option value="<?= $u['id']; ?>"><?= $u['nama']; ?></option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Komandan Regu tidak boleh kosong.
                            </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-3 col-md-6">
                        <!-- gambar  -->
                        <div class="avatar"><img class="b-r-8 img-100"
                                src="<?= base_url(); ?>_uploads/f_regu/default.png" id="imgPreview" alt="Image Preview">
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
                    $id       = 'REGU-' .uid('5');
                    $nm_regu  = $db->real_escape_string($_POST['nm_regu']);
                    $karu     = $db->real_escape_string($_POST['karu']);
                    // $slug     = slug($nopol_bus);
                    //file gambar
                    $file_tmp = $_FILES['foto']['tmp_name'];
                            if (empty($file_tmp)) {
                                $db->query("INSERT INTO regu VALUES ('$id','$nm_regu','$karu','',NOW(),NOW(),NULL)");
                                $db->query("UPDATE users SET level='3', regu='$id' WHERE id='$karu'");
                                sweetAlert('regu','sukses','Berhasil !','Data Regu berhasil diinput');
                            } else {
                                $ext_valid = array('png','jpg','jpeg','gif' );
                                $name_tmp  = $_FILES['foto']['name'];
                                $x         = explode('.', $name_tmp);
                                $extend    = strtolower(end($x));
                                $time      = date('dmYHis');
                                $foto      = $nm_regu . '_' . $time . '.' . $extend;
                                $path      = '_uploads/f_regu/';
                                        
                                //cek ekstensi
                                if (in_array($extend, $ext_valid)===true) {
                                    //Compress Image
                                    fotoCompressResize($foto,$file_tmp,$path);
                                    //inster ke database
                                    $db->query("INSERT INTO regu VALUES ('$id','$nm_regu','$karu','$foto',NOW(),NOW(),NULL)");
                                    $db->query("UPDATE users SET level='3', regu='$id' WHERE id='$karu'");
                                    sweetAlert('regu','sukses','Berhasil !','Data Regu berhasil diinput');
                                } else {
                                    javascript('','alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                                }
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
$id=$_GET['id'];
$cek = $db->query("SELECT * FROM regu WHERE id_regu='$id'")->fetch_assoc();
if (empty($cek['karu'])) {
    $data = $db->query("SELECT * FROM regu WHERE id_regu='$id'");
} else {
    $data = $db->query("SELECT * FROM regu a, users b WHERE a.id_regu=b.regu AND level='3' AND a.id_regu='$id'");
}
$d = $data->fetch_assoc();
if ($data->num_rows==0) {
    sweetAlert('regu','error','Error !','Data tidak ditemukan');
} else {
    if (empty($d['f_regu'])) {
        $ft = 'default.png';
    } else {
        $ft = $d['f_regu'];
    }
?>
<title>Edit Regu (<?= $d['nm_regu']; ?>) | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Regu (<?= $d['nm_regu']; ?>)</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item">Regu </li>
                        <li class="breadcrumb-item active">Edit Regu (<?= $d['nm_regu']; ?>)</li>
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
                    <div class="col-lg-6 col-md-12">
                        <label">Nama Regu :</label>
                            <input type="text" class="form-control" value="<?= $d['nm_regu']; ?>" name="nm_regu"
                                required>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Nama Regu tidak boleh kosong.
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label">Komandan Regu :</label>
                            <select class="form-select js-example-basic-single" name="karu" id="floatingSelect"
                                aria-label="Pilih Karu">
                                <option value="<?= $d['karu']; ?>"><?= $d['nama']; ?></option>
                                <?php 
                            $user = $db->query("SELECT * FROM users WHERE level!='3' AND level!='1' ORDER BY nama ASC");
                            while($u=$user->fetch_assoc()) :
                            ?>
                                <option value="<?= $u['id']; ?>"><?= $u['nama']; ?></option>
                                <?php endwhile; ?>
                            </select>
                            <div class="invalid-feedback">
                                Komandan Regu tidak boleh kosong.
                            </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-3 col-md-6">
                        <!-- gambar  -->
                        <div class="avatar"><img class="b-r-8 img-100"
                                src="<?= base_url(); ?>_uploads/f_regu/<?= $ft; ?>" id="imgPreview" alt="Image Preview">
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
                    // $id       = 'REGU-' .uid('5');
                    $nm_regu  = $db->real_escape_string($_POST['nm_regu']);
                    $karu     = $db->real_escape_string($_POST['karu']);
                    // $slug     = slug($nopol_bus);
                    //file gambar
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    if ($karu==$d['karu']) {
                        if (empty($file_tmp)) {
                            $db->query("UPDATE regu SET nm_regu='$nm_regu',updated_at=NOW() WHERE id_regu='$id'");
                            sweetAlert('regu','sukses','Berhasil !','Data Regu berhasil diinput');
                        } else {
                            $ext_valid = array('png','jpg','jpeg','gif' );
                            $name_tmp  = $_FILES['foto']['name'];
                            $x         = explode('.', $name_tmp);
                            $extend    = strtolower(end($x));
                            $time      = date('dmYHis');
                            $foto      = $nm_regu . '_' . $time . '.' . $extend;
                            $path      = '_uploads/f_regu/';
                                    
                            //cek ekstensi
                            if (in_array($extend, $ext_valid)===true) {
                                //Compress Image
                                fotoCompressResize($foto,$file_tmp,$path);
                                //inster ke database
                                $db->query("UPDATE regu SET nm_regu='$nm_regu',f_regu='$foto',updated_at=NOW() WHERE id_regu='$id'");
                                unlink('_uploads/f_regu/' . $d['f_regu']);
                                sweetAlert('regu','sukses','Berhasil !','Data Regu berhasil diinput');
                            } else {
                                javascript('','alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                            }
                        }
                    } else {
                        if (empty($file_tmp)) {
                            $db->query("UPDATE regu SET nm_regu='$nm_regu',karu='$karu',updated_at=NOW() WHERE id_regu='$id'");
                            $db->query("UPDATE users SET level='2', regu='' WHERE id='$d[karu]'");
                            $db->query("UPDATE users SET level='3', regu='$id' WHERE id='$karu'");
                            sweetAlert('regu','sukses','Berhasil !','Data Regu berhasil diinput');
                        } else {
                            $ext_valid = array('png','jpg','jpeg','gif' );
                            $name_tmp  = $_FILES['foto']['name'];
                            $x         = explode('.', $name_tmp);
                            $extend    = strtolower(end($x));
                            $time      = date('dmYHis');
                            $foto      = $nm_regu . '_' . $time . '.' . $extend;
                            $path      = '_uploads/f_regu/';
                                    
                            //cek ekstensi
                            if (in_array($extend, $ext_valid)===true) {
                                //Compress Image
                                fotoCompressResize($foto,$file_tmp,$path);
                                //inster ke database
                                $db->query("UPDATE regu SET nm_regu='$nm_regu',karu='$karu',f_regu='$foto',updated_at=NOW() WHERE id_regu='$id'");
                                $db->query("UPDATE users SET level='2', regu='' WHERE id='$d[karu]'");
                                $db->query("UPDATE users SET level='3', regu='$id' WHERE id='$karu'");
                                unlink('_uploads/f_regu/' . $d['f_regu']);
                                sweetAlert('regu','sukses','Berhasil !','Data Regu berhasil diinput');
                            } else {
                                javascript('','alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                            }
                        }
                    }
                            
                    //cek username dalam database
                } ?>
        </div>
    </div>
</div>
<?php } ?>
<?php break; ?>
<?php case 'delete' : 
aut(array(1));
        $id_regu = $_POST['id_regu'];
        $ft = $_POST['f_regu'];
        // $d = $db->query("SELECT * FROM users WHERE username='$us'")->fetch_assoc();
        if (empty($ft)) {
            $db->query("UPDATE users SET level='2', regu='', updated_at=NOW() WHERE regu='$id_regu'");
            $db->query("DELETE FROM regu WHERE id_regu='$id_regu'");
            sweetAlert('regu','sukses','Berhasil.!','Data Berhasil dihapus.!');
        } else {
            unlink('_uploads/f_regu/' . $ft);
            $db->query("UPDATE users SET level='2', regu='', updated_at=NOW() WHERE regu='$id_regu'");
            $db->query("DELETE FROM regu WHERE id_regu='$id_regu'");
            sweetAlert('regu','sukses','Berhasil.!','Data Berhasil dihapus.!');
        }
    ?>
<?php break; ?>
<?php case 'detail' :
aut(array(1,2,3,4,5,6));
    $id = $_GET['id'];
    // $uss = $_SESSION[''];
    $data = $db->query("SELECT * FROM regu a, users b WHERE a.id_regu=b.regu AND a.id_regu='$id'");
    $d = $data->fetch_assoc();
    $dn=$data->num_rows;
    if (empty($d['f_regu'])) {
        $ft = 'default.png';
    } else {
        $ft = $d['f_regu'];
    }
    $l = array('1' => 'Admin Super', '2' => 'Anggota', '3' => 'Karu', '4' => 'Pengawas', '5' => 'Bendahara', '6' => 'Pimpinan', '7' => 'Penerima Hak Akses');
    if ($dn==0) {
        sweetAlert('','error','Regu tidak ditemukan !', 'ID Regu : '.$id.' Tidak ditemukan.');
    } else {
    ?>
<title>Detail Regu <?= $d['nm_regu']; ?> | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Detail Regu <?= $d['nm_regu']; ?></h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item">Regu </li>
                        <li class="breadcrumb-item active">Detail Regu <?= $d['nm_regu']; ?> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                    <div class="card hovercard text-center">
                        <!-- <div class="cardheader"></div> -->
                        <br>
                        <br>
                        <div class="user-image">
                            <div class="avatar"><img alt="" src="<?= base_url(); ?>_uploads/f_regu/<?= $ft; ?>"></div>
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <!-- <h6> Status</h6><span><?= $isi; ?></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <!-- <h6><i class="fa fa-calendar"></i>   TTL</h6>
                                                    <span><small><?= $d['t_lahir']; ?>,</small><br><?= tgl_indo(date('Y-m-d', strtotime($d['tgl_lahir']))); ?>
                                                        <br><small style="color: brown;">Usia :
                                                            <?= usia(date('Y-m-d', strtotime($d['tgl_lahir']))); ?></small></span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                    <div class="user-designation">
                                        <div class="title"><a target="_blank" href="">Regu <?= $d['nm_regu']; ?></a>
                                        </div>
                                        <!-- <div><small><b><i>(<?= $d['username']; ?>)</i></b></small></div> -->
                                        <!-- <div class="desc"><?= $desc; ?></div> -->
                                        <div><small>Anggota : <b><?= $dn ?> Orang</b></small></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <!-- <h6><i class="fa fa-phone"></i>   Nomor Hp</h6><span><?= $hp; ?></span> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ttl-info text-start">
                                                <!-- <h6><i class="fa fa-university"></i>   Pendidikan</h6>
                                                    <span><?= $d['pendidikan']; ?></span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 <?= $hden; ?><?= $hidk; ?>>Komandan Regu Tim <?= $d['nm_regu']; ?>.</h3>
                            <hr <?= $hden; ?><?= $hidk; ?>>
                            <?php 
                                $k = $db->query("SELECT * FROM users a, regu b WHERE a.regu=b.id_regu AND a.regu='$d[regu]' AND a.status='Y' AND a.level='3'")->fetch_assoc();
                                if (empty($k['f_usr'])) {
                                    $ftk = 'default.png';
                                } else {
                                    $ftk = $k['f_usr'];
                                }
        
                                if (empty($k['f_regu'])) {
                                    $ftrk = 'default.png';
                                } else {
                                    $ftrk = $k['f_regu'];
                                }
        
                                if ($k['level']=='3') {
                                    $desck = '<b>'.$l[$k['level']].' Regu '.$k['nm_regu']. '</b>';
                                } elseif(empty($r['regu'])){
                                    $desck = $l[$k['level']];
                                } else {
                                    $descr = $l[$k['level']];
                                }
                                if ($_SESSION['level']==7) {
                                  $hpk = r_nohp($k['no_hp']);
                                  $imk = r_email($k['email']);
                                } else {
                                  $hpk = $k['no_hp'];
                                  $imk = $k['email'];
                                }
                                ?>
                            <div class="col-xl-4 box-col-6" <?= $hden; ?><?= $hidk; ?>>
                                <div class="card custom-card">
                                    <div class="card-header"><img class="img-fluid"
                                            src="<?= base_url(); ?>_uploads/f_regu/<?= $ftrk; ?>" alt=""></div>
                                    <div class="card-profile"><img class="rounded-circle"
                                            src="<?= base_url(); ?>_uploads/f_usr/<?= $ftk; ?>" alt=""></div>
                                    <!-- <ul class="card-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul> -->
                                    <div class="text-center profile-details">
                                        <h4 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Klik untuk melihat profile"><a target="_blank"
                                                href="<?= base_url(); ?>profile/<?= $k['username']; ?>"><?= $k['nama']; ?></a>
                                        </h4>
                                        <h6><?= $k['email']; ?></h6>
                                        <h6><?= $desck; ?></h6>
                                    </div>
                                    <div class="card-footer row">
                                        <div class="col-6 col-sm-6">
                                            <h6>Usia</h6>
                                            <h6><?= usia(date('Y-m-d', strtotime($k['tgl_lahir']))); ?></h6>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                            <h6>Nomor HP</h6>
                                            <h6><?= $hpk; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr <?= $hden; ?><?= $hidk; ?>>
                            <h3 <?= $hden; ?>>Anggota Tim <?= $d['nm_regu']; ?> Lainnya.</h3>
                            <hr <?= $hden; ?>>
                            <!-- <div class="owl-carousel owl-theme" id="owl-carousel-13">
                          <div class="item"><img src="../assets/images/slider/1.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/2.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/3.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/4.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/5.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/6.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/7.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/8.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/9.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/10.jpg" alt=""></div>
                          <div class="item"><img src="../assets/images/slider/11.jpg" alt=""></div> -->
                            <div class="row g-2">

                                <?php 
                          $batas = 3    ;
                          $halaman = isset($_GET['page'])?(int)$_GET['page'] : 1;
                          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
           
                          $previous = $halaman - 1;
                          $next = $halaman + 1;
    
                          $data = $db->query("SELECT * FROM users a, regu b WHERE a.regu=b.id_regu AND a.regu='$d[regu]' AND a.status='Y' AND a.level='2' AND username!='$us'");
                          $jumlah_data = $data->num_rows;
                          $total_halaman = ceil($jumlah_data / $batas);
    
                          $regu = $db->query("SELECT * FROM users a, regu b WHERE a.regu=b.id_regu AND a.regu='$d[regu]' AND a.status='Y' AND a.level='2' AND username!='$us' ORDER BY a.nama ASC LIMIT $halaman_awal, $batas");
                          $nomor = $halaman_awal+1;
                          while($r=$regu->fetch_assoc()) :
                            if (empty($r['f_usr'])) {
                                $ftu = 'default.png';
                            } else {
                                $ftu = $r['f_usr'];
                            }
    
                            if (empty($r['f_regu'])) {
                                $ftr = 'default.png';
                            } else {
                                $ftr = $r['f_regu'];
                            }
    
                            if ($r['level']=='2') {
                                $descr = '<b>'.$l[$r['level']].' Regu '.$r['nm_regu']. '</b>';
                            } elseif(empty($r['regu'])){
                                $descr = $l[$r['level']];
                            } else {
                                $descr = $l[$r['level']];
                            }
                            if ($data->num_rows < 4) {
                                $hid = 'hidden';
                            } else {
                                $hid ='';
                            }
                            if ($_SESSION['level']==7) {
                              $hpr = r_nohp($r['no_hp']);
                              $imr = r_email($r['email']);
                            } else {
                              $hpr = $r['no_hp'];
                              $imr = $r['email'];
                            }
                          ?>
                                <div class="col-xl-4 box-col-6" <?= $hden; ?>>
                                    <div class="card custom-card">
                                        <div class="card-header"><img class="img-fluid"
                                                src="<?= base_url(); ?>_uploads/f_regu/<?= $ftr; ?>" alt=""></div>
                                        <div class="card-profile"><img class="rounded-circle"
                                                src="<?= base_url(); ?>_uploads/f_usr/<?= $ftu; ?>" alt=""></div>
                                        <!-- <ul class="card-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul> -->
                                        <div class="text-center profile-details">
                                            <h4 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Klik untuk melihat profile"><a target="_blank"
                                                    href="<?= base_url(); ?>profile/<?= $r['username']; ?>"><?= $r['nama']; ?></a>
                                            </h4>
                                            <h6><?= $r['email']; ?></h6>
                                            <h6><?= $descr; ?></h6>
                                        </div>
                                        <div class="card-footer row">
                                            <div class="col-6 col-sm-6">
                                                <h6>Usia</h6>
                                                <h6><?= usia(date('Y-m-d', strtotime($r['tgl_lahir']))); ?></h6>
                                            </div>
                                            <div class="col-6 col-sm-6">
                                                <h6>Nomor HP</h6>
                                                <h6><?= $hpr; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; ?>
                                <nav>
                                    <ul class="pagination justify-content-center" <?= $hid; ?><?= $hden; ?>>
                                        <li class="page-item">
                                            <a class="page-link"
                                                <?php if($halaman > 1){ echo "href='".base_url()."regu/detail/".$d['regu']."/page/$previous'"; } ?>>Previous</a>
                                        </li>
                                        <?php 
                    for($x=1;$x<=$total_halaman;$x++){
                        ?>
                                        <li class="page-item"><a class="page-link"
                                                href="<?= base_url(); ?>regu/detail/<?= $d['regu']; ?>/page/<?php echo $x ?>"><?php echo $x; ?></a>
                                        </li>
                                        <?php
                    }
                    ?>
                                        <li class="page-item">
                                            <a class="page-link"
                                                <?php if($halaman < $total_halaman) { echo "href='".base_url()."regu/detail/".$d['regu']."/page/$next'"; } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- <div class="social-media">
                            <ul class="list-inline">
                              <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                          </div> -->
                        <!-- <div class="follow">
                            <div class="row">
                              <div class="col-6 text-md-end border-right">
                                <div class="follow-num counter">25869</div><span>Follower</span>
                              </div>
                              <div class="col-6 text-md-start">
                                <div class="follow-num counter">659887</div><span>Following</span>
                              </div>
                            </div>
                          </div> -->
                    </div>
                </div>
            </div>
            <!-- user profile first-style end-->
            <!-- user profile second-style start-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="profile-img-style">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="media"><img class="img-thumbnail rounded-circle me-3"
                                        src="../assets/images/user/7.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 align-self-center">
                                <div class="float-sm-end"><small>10 Hours ago</small></div>
                            </div>
                        </div>
                        <hr>
                        <p>you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                            embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet
                            tend to repeat predefined chunks as necessary, making this the first true generator on the
                            Internet.</p>
                        <div class="img-container">
                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                <figure itemprop="associatedMedia" itemscope=""><a
                                        href="../assets/images/other-images/profile-style-img3.png"
                                        itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded"
                                            src="../assets/images/other-images/profile-style-img3.png"
                                            itemprop="thumbnail" alt="gallery"></a>
                                    <figcaption itemprop="caption description">Image caption 1</figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="like-comment">
                            <ul class="list-inline">
                                <li class="list-inline-item border-right pe-3">
                                    <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span
                                        class="ms-2 counter">2659</span>
                                </li>
                                <li class="list-inline-item ms-2">
                                    <label class="m-0"><a href="#"><i
                                                class="fa fa-comment"></i></a>  Comment</label><span
                                        class="ms-2 counter">569</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile second-style end-->
            <!-- user profile third-style start-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="profile-img-style">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="media"><img class="img-thumbnail rounded-circle me-3"
                                        src="../assets/images/user/7.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 align-self-center">
                                <div class="float-sm-end"><small>10 Hours ago</small></div>
                            </div>
                        </div>
                        <hr>
                        <p>you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                            embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet
                            tend to repeat predefined chunks as necessary, making this the first true generator on the
                            Internet.</p>
                        <div class="row mt-4 pictures my-gallery" id="aniimated-thumbnials-2" itemscope="">
                            <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a
                                    href="../assets/images/other-images/profile-style-img3.png" itemprop="contentUrl"
                                    data-size="1600x950"><img class="img-fluid rounded"
                                        src="../assets/images/other-images/profile-style-img.png" itemprop="thumbnail"
                                        alt="gallery"></a>
                                <figcaption itemprop="caption description">Image caption 1</figcaption>
                            </figure>
                            <figure class="col-sm-6" itemprop="associatedMedia" itemscope=""><a
                                    href="../assets/images/other-images/profile-style-img3.png" itemprop="contentUrl"
                                    data-size="1600x950"><img class="img-fluid rounded"
                                        src="../assets/images/other-images/profile-style-img.png" itemprop="thumbnail"
                                        alt="gallery"></a>
                                <figcaption itemprop="caption description">Image caption 2</figcaption>
                            </figure>
                        </div>
                        <div class="like-comment">
                            <ul class="list-inline">
                                <li class="list-inline-item border-right pe-3">
                                    <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span
                                        class="ms-2 counter">2659</span>
                                </li>
                                <li class="list-inline-item ms-2">
                                    <label class="m-0"><a href="#"><i
                                                class="fa fa-comment"></i></a>  Comment</label><span
                                        class="ms-2 counter">569</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile third-style end-->
            <!-- user profile fourth-style start-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="profile-img-style">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="media"><img class="img-thumbnail rounded-circle me-3"
                                        src="../assets/images/user/7.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 align-self-center">
                                <div class="float-sm-end"><small>10 Hours ago</small></div>
                            </div>
                        </div>
                        <hr>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                            Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
                            Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the
                            word in classical literature, discovered the undoubtable source .Contrary to popular belief,
                            Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature
                            from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                            Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                            consectetur, from a Lorem Ipsum passage, and going through the cites of the word in
                            classical literature, discovered the undoubtable source</p>
                        <div class="like-comment mt-4">
                            <ul class="list-inline">
                                <li class="list-inline-item border-right pe-3">
                                    <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span
                                        class="ms-2 counter">2659</span>
                                </li>
                                <li class="list-inline-item ms-2">
                                    <label class="m-0"><a href="#"><i
                                                class="fa fa-comment"></i></a>  Comment</label><span
                                        class="ms-2 counter">569</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile fourth-style end-->
            <!-- user profile fifth-style start-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="profile-img-style">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="media"><img class="img-thumbnail rounded-circle me-3"
                                        src="../assets/images/user/7.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h5 class="mt-0 user-name">JOHAN DIO</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 align-self-center">
                                <div class="float-sm-end"><small>10 Hours ago</small></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 col-xl-4">
                                <div class="my-gallery" id="aniimated-thumbnials-3" itemscope="">
                                    <figure itemprop="associatedMedia" itemscope=""><a
                                            href="../assets/images/blog/img.png" itemprop="contentUrl"
                                            data-size="1600x950"><img class="img-fluid rounded"
                                                src="../assets/images/blog/img.png" itemprop="thumbnail"
                                                alt="gallery"></a>
                                        <figcaption itemprop="caption description">Image caption 1</figcaption>
                                    </figure>
                                </div>
                                <div class="like-comment mt-4 like-comment-sm-mb">
                                    <ul class="list-inline">
                                        <li class="list-inline-item border-right pe-3">
                                            <label class="m-0"><a href="#"><i
                                                        class="fa fa-heart"></i></a>  Like</label><span
                                                class="ms-2 counter">2659</span>
                                        </li>
                                        <li class="list-inline-item ms-2">
                                            <label class="m-0"><a href="#"><i
                                                        class="fa fa-comment"></i></a>  Comment</label><span
                                                class="ms-2 counter">569</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                    piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                    Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked
                                    up one of the more obscure Latin words, consecteturContrary to popular belief, Lorem
                                    Ipsum is not simply random text. It has roots in a piece of classical Latin
                                    literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                                    professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
                                    Latin words, consectetur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile fifth-style end-->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="pswp__bg"></div>
                <div class="pswp__scroll-wrap">
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>
                    <div class="pswp__ui pswp__ui--hidden">
                        <div class="pswp__top-bar">
                            <div class="pswp__counter"></div>
                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
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
                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
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
<?php }
} ?>