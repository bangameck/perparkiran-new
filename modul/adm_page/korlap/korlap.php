<?php
include '_func/identity.php';
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
if ($csrf==false) {
    sweetAlert('out','error','Error Session !','Session telah berakhir atau akun anda sudah login diperangkat lain, silahkan login ulang');
} else {
    $a=$_GET['a'];
    switch ($a) {
        default:
            aut(array(1));
            ?>
<title>Korlap | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Data Korlap</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            $us=$db->query("SELECT * FROM korlap ORDER BY nm_korlap ASC");
                                            $no=1;
                                            while ($u=$us->fetch_assoc()) :
                                                if (empty($u['f_korlap'])) {
                                                    $ft ='default.png';
                                                } else {
                                                    $ft = $u['f_korlap'];
                                                }
                                                if (empty($u['f_ktp_korlap'])) {
                                                    $ft ='default.png';
                                                } else {
                                                    $ft = $u['f_ktp_korlap'];
                                                }
                                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $u['nik_korlap']; ?></td>
                                    <td><?= $u['nm_korlap']; ?></td>
                                    <td><?= $u['a_korlap']; ?></td>
                                    <td>
                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_korlap/<?= $ft; ?>"
                                                alt="#">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar"><img class="b-r-8 img-40" src="_uploads/f_ktp_korlap/<?= $ft; ?>"
                                                alt="#">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>korlap/edit/<?= $u['id_korlap']; ?>"
                                                class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>korlap/detail/<?= $u['id_korlap']; ?>"
                                                class="btn btn-primary"><i class="fa fa-info-circle"></i></a>

                                            <form action="<?= base_url(); ?>korlap/delete" method="POST">
                                                <input type="hidden" name="id_korlap" value="<?= $u['id_korlap']; ?>">
                                                <input type="hidden" name="f_korlap" value="<?= $u['f_korlap']; ?>">
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
aut(array(1,2,3,5));
$data = $db->query("SELECT max(id_korlap) as maxKode FROM korlap")->fetch_assoc();
$kodeBarang = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut =substr($kodeBarang, 7, 9);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "KORLAP-";
$kodeBarang = $char . sprintf("%04s", $noUrut);
echo $kodeBarang;
?>
<title>Tambah Korlap | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Tambah Korlap</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
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
            <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-lg-3 col-md-12">
                        <label>ID Korlap :</label>
                            <input type="text" class="form-control" name="id" value="<?= $kodeBarang; ?>" required>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                                Nik tidak boleh kosong.
                            </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <label>NIK :</label>
                            <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nik_korlap" maxlength="16" required>
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
                <hr>
                <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                    <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                        Data</button>
                </div>
            </form>
            <?php 
                if (isset($_POST['simpan'])) {
                    
                    $id         = $db->real_escape_string($_POST['id']);
                    $nik_korlap = $db->real_escape_string($_POST['nik_korlap']);
                    $nm_korlap  = $db->real_escape_string($_POST['nm_korlap']);
                    $a_korlap   = $db->real_escape_string($_POST['a_korlap']);
                    // var_dump($id);
                    // die();

                    $q  = $db->query("INSERT INTO korlap VALUES ('$id','$nik_korlap','$nm_korlap','$a_korlap','','',NOW(),NOW(),NULL,'$_SESSION[id_usr]')");
                    if ($q) {
                        sweetAlert('korlap','sukses','Berhasil !','Data Korlap berhasil diinput');
                    } else {
                        javascript('','alert-error', 'Upss.. Sepertinya ada yang error.!');
                    }
                } ?>
        </div>
    </div>
</div>

<?php break; ?>
<?php }
    } ?>