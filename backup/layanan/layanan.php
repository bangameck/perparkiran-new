<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmai.com]
* @create date 2021-06-11 14:30:17
* @modify date 2021-06-11 14:30:46
* @desc [description]
*/

include '_func/identity.php';
// include_once '/vendor/owasp/csrf-protector-php/libs/csrf/csrfprotector.php';
// include '_func/database.php';
aut(array(1,2,3));
$a=$_GET['a'];
switch($a){
    default:
?>
<title>Layanan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Layanan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="monitor"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Layanan</li>
                        <!-- <li class="breadcrumb-item active">Users </li> -->
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
                            <a href="<?= base_url(); ?>layanan/add" class="btn btn-primary-gradien" type="button">Tambah
                                Data</a>
                        </div>
                        <br>
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Bus</th>
                                    <th>Driver</th>
                                    <th>Kecamatan</th>
                                    <th>Rute</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $us=$db->query("SELECT * FROM layanan a, users b, kec c, bus d WHERE a.usr_created=b.id AND a.kecamatan=c.id_kec AND a.bus=d.id_bus AND a.usr_created='$_SESSION[id_usr]' ORDER BY a.tgl ASC");
                                $no=1;
                                while ($u=$us->fetch_assoc()) :
                                    if (empty($u['f_usr'])) {
                                        $ft ='default.png';
                                    } else {
                                        $ft = $u['f_usr'];
                                    }
                                    $l = array('1' => 'Admin', '2' => 'Driver', '3' => 'Pendamping');
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= tgl_indo(date('Y-m-d', strtotime($u['tgl']))); ?></td>
                                    <td>(<?= $u['no_bus']; ?>) <?= $u['nopol_bus']; ?></td>
                                    <td><?= $u['driver']; ?> & <?= $u['pendamping']; ?></td>
                                    <td><?= $u['nm_kec']; ?></td>
                                    <td><?= $u['rute']; ?></td>
                                    <!-- <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>layanan/edit/<?= $u['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>layanan/detail/<?= $u['id']; ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i></a>
                                            
                                            <form action="<?= base_url(); ?>layanan/delete" method="POST">
                                                <input type="hidden" name="us" value="<?= $u['username']; ?>">
                                                <input type="hidden" name="foto" value="<?= $u['f_usr']; ?>">
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td> -->
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
<title>Input Layanan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Input Layanan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="monitor"></i></a>
                        </li>
                        <li class="breadcrumb-item">Layanan </li>
                        <li class="breadcrumb-item active">Input Layanan</li>
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
                        <label>Nomor Bus / Plat :</label>
                        <select class="form-select js-example-basic-single" name="bus" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <option value="">Pilih Bus</option>
                            <?php 
                                $bus = $db->query("SELECT * FROM bus ORDER BY no_bus ASC");
                                while($b=$bus->fetch_assoc()) :
                            ?>
                                <option value="<?= $b['id_bus']; ?>">(<?= $b['no_bus']; ?>) <?= $b['nopol_bus']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="invalid-feedback">
                            Bus tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label>Tanggal :</label>
                        <input type="text" class="datepicker-here form-control digits" id="tgl" data-language="en" value="<?= date('m/d/Y'); ?>" name="tgl" required>
                        <!-- <div class="show-hide"><span id="view_pass"></span></div> -->
                        <div class="media">
                            <div class="text-end">
                                <label id="message_tgl">
                                </label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Tanggal tidak boleh kosong
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-6 col-md-12">
                        <label>Driver :</label>
                        <select class="form-select js-example-basic-single" name="driver" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <option value="">Pilih Driver</option>
                            <?php 
                                $user = $db->query("SELECT * FROM users WHERE level='2' ORDER BY nama ASC");
                                while($u=$user->fetch_assoc()) :
                            ?>
                                <option value="<?= $u['nama']; ?>"><?= $u['nama']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="invalid-feedback">
                            Driver tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label>Pendamping :</label>
                        <select class="form-select js-example-basic-single" name="pendamping" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <option value="">Pilih Pendamping</option>
                            <?php 
                                $user = $db->query("SELECT * FROM users WHERE level='3' ORDER BY nama ASC");
                                while($u=$user->fetch_assoc()) :
                            ?>
                                <option value="<?= $u['nama']; ?>"><?= $u['nama']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="invalid-feedback">
                            Pendamping tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-6 col-md-12">
                        <label>Kecamatan :</label>
                        <select class="form-select js-example-basic-single" name="kecamatan" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <option value="">Pilih Kecamatan</option>
                            <?php 
                                $kec = $db->query("SELECT * FROM kec ORDER BY nm_kec ASC");
                                while($k=$kec->fetch_assoc()) :
                            ?>
                                <option value="<?= $k['id_kec']; ?>"><?= $k['nm_kec']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="invalid-feedback">
                            Kecamatan tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label>Rute :</label>
                        <textarea name="rute" class="form-control" required></textarea>
                        <div class="invalid-feedback">
                            Rute tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-3 col-md-6">
                        <label></label> Jumlah Pria :</label>
                        <input type="number" class="form-control" placeholder="0" id="lk" name="lk" required>
                        <div class="invalid-feedback">
                            Jumlah Pria tidak boleh kosong
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label></label> Jumlah Wanita :</label>
                        <input type="number" class="form-control" placeholder="0" id="pr" name="pr" required>
                        <div class="invalid-feedback">
                            Jumlah Wanita tidak boleh kosong
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label></label> Jumlah Lansia :</label>
                        <input type="number" class="form-control" placeholder="0" id="ln" name="ln" required>
                        <div class="invalid-feedback">
                            Jumlah Lansia tidak boleh kosong
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label></label> Tidak Vaksin :</label>
                        <input type="number" class="form-control" placeholder="0" id="tv" name="tv" required>
                        <div class="invalid-feedback">
                            Jumlah Tidak Vaksin tidak boleh kosong
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 col-md-12">
                        <label></label> Total Peserta : <small style="color: blue;">Otomatis terisi</small></label>
                        <input type="text" class="form-control" value="0" id="total" name="total" readonly>
                        
                        <!-- <div class="invalid-feedback">
                            Jumlah Pria tidak boleh kosong
                        </div> -->
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 col-md-12">
                        <label>Permasalahan :</label>
                        <textarea name="permasalahan" id="smde" class="form-control" required></textarea>
                        <div class="invalid-feedback">
                            Permasalahan tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-lg-12 col-md-12">
                        <label>Dokumentasi :  <small style="color: blue;">Pilih beberapa foto dokumentasi</small></label>
                        <input class="form-control" id="imgUpload" name="foto[]" type="file" multiple required>
                        <small style="color: blue;">Format File : png, jpg, jpeg</small>
                        <div class="invalid-feedback">
                            Dokumen Foto tidak boleh kosong
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
                    $id       = 'LYN-' .uid('10');
                    $bus = $db->real_escape_string($_POST['bus']);
                    $tgl     = date('Y-m-d', strtotime($db->real_escape_string($_POST['tgl'])));
                    $nama    = $db->real_escape_string($_POST['nama']);
                    $driver    = $db->real_escape_string($_POST['driver']);
                    $pendamping    = $db->real_escape_string($_POST['pendamping']);
                    $kecamatan    = $db->real_escape_string($_POST['kecamatan']);
                    $rute    = $db->real_escape_string($_POST['rute']);
                    $lk    = $db->real_escape_string($_POST['lk']);
                    $pr    = $db->real_escape_string($_POST['pr']);
                    $ln    = $db->real_escape_string($_POST['ln']);
                    $tv    = $db->real_escape_string($_POST['tv']);
                    $total    = $db->real_escape_string($_POST['total']);
                    $permasalahan    = $db->real_escape_string($_POST['permasalahan']);
                    //file gambar
                    $dokumentasi = count($_FILES['foto']['tmp_name']);
                    //cek token
                    $csrf     = $db->query("SELECT b.token_csrf FROM users a, session b WHERE a.token_csrf=b.token_csrf AND a.username='$_SESSION[username]' AND b.token_csrf='$_SESSION[token_csrf]'")->fetch_assoc();
                    // var_dump($tgl);
                    // die();
                    if ($csrf==true) {
                        $cek_tgl =$db->query("SELECT * FROM layanan WHERE tgl='$tgl' AND bus='$bus'");
                        if ($cek_tgl->num_rows==0) {
                            if( $dokumentasi > 0 ){
                                for ($i=0; $i < $dokumentasi; $i++){
                                    $ext_valid = array('png','jpg','jpeg','gif' );
                                    $file_tmp  = $_FILES['foto']['tmp_name'][$i];
                                    $name_tmp  = $_FILES['foto']['name'][$i];
                                    $x         = explode('.', $name_tmp);
                                    $extend    = strtolower(end($x));
                                    $time      = date('dmYHis');
                                    $foto      = $id . '_' . $i . $time . '.' . $extend;
                                    $path      = '_uploads/f_layanan/';
                                            
                                    //cek ekstensi
                                    if (in_array($extend, $ext_valid)===true) {
                                        //Compress Image
                                        fotoCompressResize($foto,$file_tmp,$path);
                                        //inster ke database
                                        $db->query("INSERT INTO layanan VALUES ('$id','$bus','$tgl','$driver','$pendamping','$kecamatan','$rute','$lk','$pr','$ln','$tv','$total','$permasalahan','$_SESSION[id_usr]',NOW(),NOW())");
                                        $db->query("INSERT INTO galeri VALUES ('','$id','$foto',NOW(),NOW())");
                                        //notif
                                        javascript('layanan','alert-sukses','Data User dan Foto berhasil diupload');
                                    } else {
                                        javascript('','alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                                    }
                                }
                            } else {
                                javascript('','alert-error','Dokumentasi tidak boleh kosong');
                            }
                        } else {
                            javascript('','alert-error','Bus Pada Tanggal ini sudah menginputkan data.. silahkan cek kembali');
                        }
                    } else {
                        javascript('','alert-error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
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
$d = $db->query("SELECT * FROM users WHERE id='$_GET[id]'")->fetch_assoc();
if (empty($d)) {
    javascript('users','alert-sukses','Data tidak ditemukan');
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
    <div class="card">
        <div class="card-body">
            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                enctype="multipart/form-data">
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
                    <!-- <div class="col-lg-6 col-md-12 form-floating position-relative">
                        <input type="password" class="form-control password" name="password" value="<?= $d['nama']; ?>" required>
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
                        <small style="color: red;">Kosongkan jika tidak ingin mengubah password..</small>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong.
                        </div>
                    </div> -->
                </div>
                <div class="row g-2">
                    <div class="col-lg-6 col-md-12 form-floating">
                        <input type="text" class="form-control" name="nama" value="<?= $d['nama']; ?>" required>
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <select class="form-select js-example-basic-single" name="level" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <?php 
                            $l = array('1' => 'Admin', '2' => 'Driver', '3' => 'Pendamping');
                            ?>
                            <option value="<?= $d['level']; ?>"><?= $l[$d['level']]; ?></option>
                            <option value="1">Admin</option>
                            <option value="2">Driver</option>
                            <option value="3">Pendamping</option>
                        </select>
                        <div class="invalid-feedback">
                            Level tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
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
                        <div class="avatar"><img class="img-100 rounded-circle"
                                src="<?= base_url(); ?>_uploads/f_usr/<?= $foto; ?>" id="imgPreview" alt="Image Preview">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <input class="form-control" id="imgUpload" name="foto" type="file">
                        <!-- <label class for="floatingSelect">Email address</label> -->
                        <small style="color: red;">Kosongkan jika tidak ingin mengubah foto..(Format File : png, jpg, jpeg)</small>
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
                    if ($csrf==true) {
                        if ($username==$d['username']) {
                            $cek_uname = $db->query("SELECT username FROM users WHERE username!='$d[username]' AND username='$username'");
                        } else {
                            $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                        }
                        //jika username tidak ada didalam database
                        if ($cek_uname->num_rows==0) {
                            if (empty($file_tmp)) {
                                if ($username == $d['username']) {
                                    $q=$db->query("UPDATE users SET nama = '$nama', level = '$level', updated_at = NOW() WHERE id='$id'");
                                    javascript('users','alert-sukses','Data User berhasil diupdate');
                                }else{
                                    $q=$db->query("UPDATE users SET username = '$username', nama = '$nama', level = '$level', updated_at = NOW() WHERE id='$id'");
                                    javascript('users','alert-sukses','Data User berhasil diupdate');
                                }
                                
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
                                    $db->query("UPDATE users SET username = '$username', nama = '$nama', level = '$level', f_usr='$foto', updated_at=NOW() WHERE id='$id'");
                                    //hapus foto lama dari directory
                                    unlink('_uploads/f_usr/' . $d['f_usr']);
                                    //notif
                                    javascript('users','alert-sukses','Data User dan Foto berhasil diupdate');
                                }
                                  javascript('','alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                            }   // javascript('','alert-error',$db->error);
                        } else {
                            javascript('','alert-error', 'Username tidak tersedia');
                        }
                    } else {
                        javascript('','alert-error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
                    }
                    //cek username dalam database
                } ?>
        </div>
    </div>
</div>
<?php } ?>
<?php break; ?>
<?php case 'delete' : 
    $csrf = $db->query("SELECT b.token_csrf FROM users a, session b WHERE a.token_csrf=b.token_csrf AND a.username='$_SESSION[username]' AND b.token_csrf='$_SESSION[token_csrf]'")->fetch_assoc();
    if ($csrf==true) {
        $us = $_POST['us'];
        $ft = $_POST['foto'];
        // $d = $db->query("SELECT * FROM users WHERE username='$us'")->fetch_assoc();
        if (empty($ft)) {
            $db->query("DELETE FROM users WHERE username='$us'");
            javascript('users','alert-sukses','Data Berhasil dihapus');
        } else {
            unlink('_uploads/f_usr/' . $ft);
            $db->query("DELETE FROM users WHERE username='$us'");
            javascript('users','alert-sukses','Data Berhasil dihapus');
        }
    } else {
        javascript('','alert-error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
    }
    ?>

<?php break; ?>
<?php case 'setting' :
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
    <div class="card">
        <div class="card-body">
            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                enctype="multipart/form-data">
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
                    <!-- <div class="col-lg-6 col-md-12 form-floating position-relative">
                        <input type="password" class="form-control password" name="password" value="<?= $d['nama']; ?>" required>
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
                        <small style="color: red;">Kosongkan jika tidak ingin mengubah password..</small>
                        <div class="invalid-feedback">
                            Password tidak boleh kosong.
                        </div>
                    </div> -->
                </div>
                <div class="row g-2">
                    <div class="col-lg-6 col-md-12 form-floating">
                        <input type="text" class="form-control" name="nama" value="<?= $d['nama']; ?>" required>
                        <label for="floatingInput">Nama</label>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <select class="form-select js-example-basic-single" name="level" id="floatingSelect"
                            aria-label="Pilih Level" required>
                            <?php 
                            $l = array('1' => 'Admin', '2' => 'Driver', '3' => 'Pendamping');
                            ?>
                            <option value="<?= $d['level']; ?>"><?= $l[$d['level']]; ?></option>
                            <option value="1">Admin</option>
                            <option value="2">Driver</option>
                            <option value="3">Pendamping</option>
                        </select>
                        <div class="invalid-feedback">
                            Level tidak boleh kosong.
                        </div>
                        <!-- <label for="floatingSelect">Email address</label> -->
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
                        <div class="avatar"><img class="img-100 rounded-circle"
                                src="<?= base_url(); ?>_uploads/f_usr/<?= $foto; ?>" id="imgPreview" alt="Image Preview">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <input class="form-control" id="imgUpload" name="foto" type="file">
                        <!-- <label class for="floatingSelect">Email address</label> -->
                        <small style="color: red;">Kosongkan jika tidak ingin mengubah foto..(Format File : png, jpg, jpeg)</small>
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
                    if ($csrf==true) {
                        if ($username==$d['username']) {
                            $cek_uname = $db->query("SELECT username FROM users WHERE username!='$d[username]' AND username='$username'");
                        } else {
                            $cek_uname = $db->query("SELECT username FROM users WHERE username='$username'");
                        }
                        //jika username tidak ada didalam database
                        if ($cek_uname->num_rows==0) {
                            if (empty($file_tmp)) {
                                if ($username == $d['username']) {
                                    $q=$db->query("UPDATE users SET nama = '$nama', level = '$level', updated_at = NOW() WHERE id='$id'");
                                    javascript('setting','alert-sukses-2','Data User berhasil diupdate. Silahkan Login Kembali Untuk Melihat Perubahan data');
                                }else{
                                    $q=$db->query("UPDATE users SET username = '$username', nama = '$nama', level = '$level', updated_at = NOW() WHERE id='$id'");
                                    javascript('setting','alert-sukses-2','Data User berhasil diupdate. Silahkan Login Kembali Untuk Melihat Perubahan data');
                                }
                                
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
                                    $db->query("UPDATE users SET username = '$username', nama = '$nama', level = '$level', f_usr='$foto', updated_at=NOW() WHERE id='$id'");
                                    //hapus foto lama dari directory
                                    unlink('_uploads/f_usr/' . $d['f_usr']);
                                    //notif
                                    javascript('setting','alert-sukses','Data User dan Foto berhasil diupdate. Silahkan Login Kembali Untuk Melihat Perubahan');
                                } else {
                                    javascript('','alert-error', 'Inputan Foto - Hanya File JPG, PNG, JPEG dan GIF yang diperbolehkan');
                                }
                            }   // javascript('','alert-error',$db->error);
                        } else {
                            javascript('','alert-error', 'Username tidak tersedia');
                        }
                    } else {
                        javascript('','alert-error','Anda tidak mendapat hak untuk menginput data, Silahkan login ulang');
                    }
                    //cek username dalam database
                } ?>
        </div>
    </div>
</div>
<?php break ?>
<?php } ?>