<?php 
/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-15 12:02:17
 * @modify date 2021-07-15 12:02:17
 * @desc [description]
 */

include '_func/identity.php';
$csrf     = $db->query("SELECT b.token FROM users a, session b WHERE a.token=b.token AND a.username='$_SESSION[username]' AND b.token='$_SESSION[token]'")->fetch_assoc();
    if ($csrf==false) {
        sweetAlert('out', 'error', 'Error Session !', 'Session telah berakhir, silahkan login ulang');
    } else {
// aut(array(1));
$a=$_GET['a'];
switch ($a) {
    default:
    aut(array(1,2,3,4,5,6));
        ?>
<title>Postingan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Postingan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="file-text"></i></a>
                        </li>
                        <li class="breadcrumb-item">Blog</li>
                        <li class="breadcrumb-item active">Postingan </li>
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
                            <a href="<?= base_url(); ?>blog/post/add" class="btn btn-primary-gradien"
                                type="button">Tambah Postingan</a>
                        </div>
                        <br>
                        <table class="display" id="responsive">
                            <thead>
                                <tr>
                                    <th>Postingan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['level']=='1') {
                                    $blog=$db->query("SELECT *, a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id ORDER BY tgl DESC");
                                } else {
                                    $blog=$db->query("SELECT *, a.created_at as tgl FROM blog a, users b WHERE a.adm_blog=b.id AND a.adm_blog='$_SESSION[id_usr]' ORDER BY tgl DESC");
                                }
                                
        // $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu ORDER BY a.tgl_giat ASC");
                                // $no=1;
                                while ($b=$blog->fetch_assoc()) :
                                    if ($b['publish']=='Y') {
                                        $pub = 'Dipublikasikan . ';
                                    } else {
                                        $pub = 'Draft . ';
                                    }
                                    ?>
                                <tr>
                                    <td valign="top" class="avatar-showcase" style="text-align: left;">
                                        <div class="row">
                                            <div class="col-2 avatars">
                                                <div class="avatar ratio"><img class="b-r-8 img-100" src="<?= base_url(); ?>_uploads/blog/sampul/<?= $b['id_blog']; ?>/<?= $b['sampul']; ?>" alt="<?= $b['c_sampul']; ?>"></div> 
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-9">
                                                <h6><b><?= $b['j_blog']; ?></b></h6>
                                                <small>
                                                    <?= $pub. hari(date('D', strtotime($b['tgl']))).', '.tgl_indo(date('Y-m-d', strtotime($b['tgl']))).' '.date('H:i:s', strtotime($b['tgl'])) ; ?>
                                                    <br>
                                                    Penulis . <?= $b['nama']; ?>
                                                </small>
                                                <p>
                                                <?php 
                                                $tags = $db->query("SELECT * FROM tags_blog a, tags b WHERE a.id_tags=b.id_tags AND id_blog='$b[id_blog]'");
                                                while ($t=$tags->fetch_assoc()) : ?>
                                                    <span class="badge badge-primary"><i class="fa fa-tags"></i> <?= $t['nm_tags']; ?></span>
                                                <?php endwhile; ?>
                                            
                                            </p>
                                            </div>

                                        </div>
                                    </td>
                                    <td valign="top">
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>blog/post/edit/<?= $b['id_blog']; ?>"
                                                class="btn btn-info-gradien <?= $diss; ?> <?= $disab; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Edit Pengaduan" <?= $hide; ?>><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>pengaduan/teruskan/<?= $u['slug']; ?>"
                                                class="btn btn-warning-gradien <?= $dist; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Teruskan Pengaduan" <?= $hide; ?>><i class="fa fa-mail-forward"></i></a>
                                            <a href="<?= base_url(); ?>pengaduan/tolak/<?= $u['slug']; ?>"
                                                class="btn btn-danger-gradien <?= $dist; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Tolak Pengaduan" <?= $hide; ?>><i class="fa fa-times-circle"></i></a>
                                            <a href="<?= base_url(); ?>pengaduan/detail/<?= $u['slug']; ?>"
                                                class="btn btn-primary-gradien" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Detail Pengaduan"><i class="fa fa-info-circle"></i></a>

                                            <form action="<?= base_url(); ?>pengaduan/delete" method="POST" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Hapus Pengaduan"
                                                <?= $hide; ?>>
                                                <input type="hidden" name="id_peng" value="<?= $u['id_peng']; ?>">
                                                <button class="btn btn-danger-gradien <?= $disab; ?>" onclick="return hapus()"><i
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
<?php case 'add':
    aut(array(1,2,3,4,5,6));
        ?>
<title>Postingan Baru | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Postingan Baru</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="file-text"></i></a>
                        </li>
                        <li class="breadcrumb-item">Blog </li>
                        <li class="breadcrumb-item active">Postingan Baru </li>
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
                        <div class="col-lg-12 col-md-12">
                            <label">Judul Postingan :</label>
                                <input type="text" name="j_blog" class="form-control" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Judul Postingan tidak boleh kosong.
                                </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-12 col-md-12">
                            <label">Sampul :</label>
                            <input type="file" name="sampul" class="form-control dropify" accept="image/jpeg, image/png"  data-allowed-file-extensions="jpg jpeg jpe png" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Sampul tidak boleh kosong.
                                </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label><small>Cretid Sampul (Ex : Kepala Dishub Kota Pekanbaru Yuliarso, STTP, M.Si)</small></label>
                                <input type="text" name="c_sampul" class="form-control" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Judul Postingan tidak boleh kosong.
                                </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-12 col-md-12">
                            <label">Isi Postingan :</label>
                                <textarea name="isi" class="form-control editor" required></textarea>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Isi Postingan tidak boleh kosong.
                                </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-12 col-md-12">
                            <hr>
                            <label>Kategori :</label><br>
                            <?php 
                            $tags = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
                            while($t=$tags->fetch_assoc()) :
                            ?>
                            <input class="checkbox_animated"  type="checkbox" name="tags[]" value="<?= $t['id_tags']; ?>"><i class="fa fa-tags"></i> <?= $t['nm_tags']; ?>; &nbsp;&nbsp;&nbsp;&nbsp;
                            <?php endwhile; ?>
                            <hr>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-12 col-md-12">
                            <label">Galery Postingan : <small style="color: green;">Pilih beberapa gambar atau
                                    video</small></label>
                                <input class="form-control" name="foto[]" type="file"
                                    accept="image/jpeg, image/png"
                                    multiple>
                                <small style="color: red;">Format File : jpg, png, jpeg, jpe</small><br>
                                <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka loading akan
                                    lebih lama.</small>
                                <div class="invalid-feedback">
                                    Galery Postingan tidak boleh kosong.
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                        <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $id          = $db->real_escape_string(uid('20'));
                    $j_blog      = $db->real_escape_string($_POST['j_blog']);
                    $slug        = $db->real_escape_string(uid('3').'-'.slug($_POST['j_blog']));
                    $isi         = $_POST['isi'];
                    $c_sampul      = $db->real_escape_string($_POST['c_sampul']);
                    $adm_blog    = $_SESSION['id_usr'];
                    $jumlah_tags = count($_POST['tags']);
                    $jumlah_foto = count($_FILES['foto']['name']);
                    // $sampul = $_FILES['sampul']['name'];
                    // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                    // var_dump($id,$j_blog,$slug,$isi,$adm_blog,$jumlah_tags,$jumlah_foto,$sampul);
                    // die();

                    
                    if ($jumlah_tags > 0 OR empty($_FILES['sampul']['tmp_name'])) {
                        for ($f=0; $f < $jumlah_foto; $f++) {
                            // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                            $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                            $file_tmp_s  = $_FILES['sampul']['tmp_name'];
                            $name_tmp_f  = $_FILES['foto']['name'][$f];
                            $name_tmp_s  = $_FILES['sampul']['name'];
                            $ext_valid = array('png','jpg','jpeg','jpe');
                            // $ext_valid_s = array('png','jpg','jpeg','jpe');
                            $x_f         = explode('.', $name_tmp_f);
                            $x_s         = explode('.', $name_tmp_s);
                            $extend_f    = strtolower(end($x_f));
                            $extend_s    = strtolower(end($x_s));
                            $time        = date('dmYHi');
                            $foto        = $slug. '-' .$f .$time. '.' .$extend_f;
                            $sampul      = $slug. '-' .$time. '.' .$extend_s;
                            //make directory
                            mkdir('_uploads/blog/gallery/'.$id);
                            mkdir('_uploads/blog/sampul/'.$id);
                            $path_f      = '_uploads/blog/gallery/'.$id.'/'.$foto;
                            $path_s      = '_uploads/blog/sampul/'.$id.'/'.$sampul;
                            // else {
                            //     $path_v      = '_uploads/v_peng/'.$foto;
                            // }
                                
                            if (in_array($extend_f, $ext_valid)===true or in_array($extend_s, $ext_valid)===true) {
                                if ($extend_f==true) {
                                    compressImage($file_tmp_f, $path_f, 30);
                                }
                                
                                if ($extend_s==true) {
                                    compressImage($file_tmp_s, $path_s, 60);
                                }
                                    // move_uploaded_file($file_tmp_s, $path_s);
                                $q=$db->query("INSERT INTO d_blog VALUES ('','$id','$foto','$extend_f',NOW())");
                                $db->query("INSERT INTO blog VALUES ('$id','$j_blog','$slug','$isi','$sampul','$c_sampul','Y','N','N','$adm_blog',NOW(),NULL,NULL)");
                            } else {
                                javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe');
                            }
                        }
                        for ($t=0; $t < $jumlah_tags; $t++) { 
                            $tags = $db->real_escape_string($_POST['tags'][$t]);
                            $db->query("INSERT INTO tags_blog VALUES ('','$id','$tags',NOW())");
                        }
                        sweetAlert('blog/post', 'sukses', 'Berhasil !', 'Data Postingan dengan (ID : '.$id.') Berhasil diinput.');
                        
                    } else {
                        javascript('','alert-error','Sampul dan Kategori tidak boleh kosong..');
                    }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'edit':
aut(array(1,2,3,4,5,6));
$id = $_GET['id'];
$d = $db->query("SELECT * FROM blog WHERE id_blog='$id'")->fetch_assoc();
if ($_SESSION['id_usr']==$d['adm_peng'] OR $_SESSION['level']=='1') {
    if (empty($d)) {
        sweetAlert('blog/post','error','Data tidak ditemukan.!','Maaf data pengaduan dengan url ('.$id.') tidak ditemukan ');
    } else {
            ?>
<title>Edit Postingan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Edit Postingan <small>(<?= $id; ?>)</small></h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="file-text"></i></a>
                        </li>
                        <li class="breadcrumb-item">Postingan </li>
                        <li class="breadcrumb-item active">Edit Postingan </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-warninghome-tab" data-bs-toggle="pill"
                            href="#pills-warninghome" role="tab" aria-controls="pills-warninghome"
                            aria-selected="true"><i class="icofont icofont-architecture-alt"></i></i>Postingan</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-warningprofile-tab" data-bs-toggle="pill"
                            href="#pills-warningprofile" role="tab" aria-controls="pills-warningprofile"
                            aria-selected="false"><i class="icofont icofont-picture"></i>Gallery</a></li>
                </ul>
                <div class="tab-content" id="pills-warningtabContent">
                    <div class="tab-pane fade show active" id="pills-warninghome" role="tabpanel"
                        aria-labelledby="pills-warninghome-tab">
                        <div class="card-body">
                        <form class="row g-3 needs-validation form theme-form" novalidate="" action="" method="POST"
                            enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <label">Judul Postingan :</label>
                                        <input type="text" name="j_blog" class="form-control" value="<?= $d['j_blog']; ?>" required>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Judul Postingan tidak boleh kosong.
                                        </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <label">Sampul :</label>
                                    <input type="file" name="sampul" class="form-control dropify" accept="image/jpeg, image/png"  data-allowed-file-extensions="jpg jpeg jpe png" data-default-file="<?= base_url(); ?>_uploads/blog/sampul/<?= $id; ?>/<?= $d['sampul']; ?>" data-show-remove="false">
                                    <input type="hidden" name="sampul_old" value="<?= $d['sampul']; ?>">
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Sampul tidak boleh kosong.
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label><small>Cretid Sampul (Ex : Kepala Dishub Kota Pekanbaru Yuliarso, STTP, M.Si)</small></label>
                                        <input type="text" name="c_sampul" class="form-control" value="<?= $d['c_sampul']; ?>" required>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Judul Postingan tidak boleh kosong.
                                        </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <label">Isi Postingan :</label>
                                        <textarea name="isi" class="form-control editor" required><?= $d['isi']; ?></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            Isi Postingan tidak boleh kosong.
                                        </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <hr>
                                    <label>Kategori :</label><br>
                                    <?php 
                                    // $n=1;
                                    $tags = $db->query("SELECT * FROM tags ORDER BY nm_tags ASC");
                                    while($t=$tags->fetch_assoc()) :
                                        $tb = $db->query("SELECT * FROM tags_blog WHERE id_blog='$id' AND id_tags='$t[id_tags]'")->fetch_assoc();
                                        // echo $tb['id_tags'];
                                        if ($tb['id_tags']==$t['id_tags']) {
                                            $checked = 'checked';
                                        } else {
                                            $checked = '';
                                        }
                                    ?>
                                    <input class="checkbox_animated"  type="checkbox" name="tags[]" value="<?= $t['id_tags']; ?>" <?= $checked; ?> ><i class="fa fa-tags"></i> <?= $t['nm_tags']; ?>; &nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php endwhile; ?>
                                    <hr>
                                </div>
                            </div>
                            <!-- <div class="row g-2">
                                <div class="col-lg-12 col-md-12">
                                    <label">Galery Postingan : <small style="color: green;">Pilih beberapa gambar atau
                                            video</small></label>
                                        <input class="form-control" name="foto[]" type="file"
                                            accept="image/jpeg, image/png"
                                            multiple>
                                        <small style="color: red;">Format File : jpg, png, jpeg, jpe</small><br>
                                        <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka loading akan
                                            lebih lama.</small>
                                        <div class="invalid-feedback">
                                            Galery Postingan tidak boleh kosong.
                                        </div>
                                </div>
                            </div>
                            <hr> -->
                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan</button>
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
                                    <div class="row g-2">
                                        <div class="col-lg-12 col-md-12">
                                            <label">Galery Postingan : <small style="color: green;">Pilih beberapa gambar atau
                                                    video</small></label>
                                                <input class="form-control" name="foto[]" type="file"
                                                    accept="image/jpeg, image/png" required
                                                    multiple>
                                                <small style="color: red;">Format File : jpg, png, jpeg, jpe</small><br>
                                                <small style="color: red;">Jika jumlah file banyak dan berukuran besar maka loading akan
                                                    lebih lama.</small>
                                                <div class="invalid-feedback">
                                                    Galery Postingan tidak boleh kosong.
                                                </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                    <button class="btn btn-success-gradien" name="gambar" type="submit">Tambah Gambar</button>
                                </div>
                            </form>
                            <hr>
                            <br>
                            <h6>Gambar yang sudah ada :</h6>
                            <div class="dt-ext table-responsive avatar-showcase">
                                <table class="display" id="responsive">
                                    <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->
                                            <th>Nama File</th>
                                            <th style="text-align: center;">Foto</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $us=$db->query("SELECT * FROM d_blog WHERE id_blog='$d[id_blog]' ORDER BY n_d_blog ASC");
                                        $no=1;
                                        while ($u=$us->fetch_assoc()) :
                                            $pic = '<div class="avatar ratio"><img class="b-r-8 img-100" src="'.base_url().'_uploads/blog/gallery/'.$id.'/'. $u['n_d_blog'].'" alt="'. $u['n_d_blog'].'"></div> 
                                            '; 
                                        ?>
                                        <tr>
                                            <!-- <td><?= $no++; ?></td> -->
                                            <td><?= $u['n_d_blog']; ?></td>
                                            <td style="text-align: center;">
                                                <?= $pic; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                <form action="<?= base_url(); ?>blog/post/delete/gambar" method="POST" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Hapus Gambar">
                                                        <input type="hidden" name="nama" value="<?= $u['n_d_blog']; ?>">
                                                        <input type="hidden" name="id" value="<?= $u['id_d_blog']; ?>">
                                                        <input type="hidden" name="id_blog" value="<?= $id; ?>">
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
                    // $id          = $db->real_escape_string(uid('20'));
                    $j_blog      = $db->real_escape_string($_POST['j_blog']);
                    $slug        = $db->real_escape_string(uid('3').'-'.slug($_POST['j_blog']));
                    $isi         = $_POST['isi'];
                    $sampul_new  = $_FILES['sampul']['name'];
                    $sampul_old  = $db->real_escape_string($_POST['sampul_old']);
                    $c_sampul    = $db->real_escape_string($_POST['c_sampul']);
                    $jumlah_tags = count($_POST['tags']);
                    // $adm_blog    = $_SESSION['id_usr'];
                    if (empty($sampul_new)) {
                        $db->query("DELETE FROM tags_blog WHERE id_blog='$id'");
                        for ($t=0; $t < $jumlah_tags; $t++) { 
                            $tags = $db->real_escape_string($_POST['tags'][$t]);
                            $db->query("INSERT INTO tags_blog VALUES ('','$id','$tags',NOW())");
                        }
                        $db->query("UPDATE blog SET j_blog='$j_blog',slug='$slug',c_sampul='$c_sampul',updated_at=NOW() WHERE id_blog='$id'");
                        sweetAlert('blog/post', 'sukses', 'Berhasil !', 'Data Postingan dengan (ID : '.$id.') Berhasil diupdate.');
                    } else {

                    }
                    $jumlah_tags = count($_POST['tags']);
                    $file_tmp_s  = $_FILES['sampul']['tmp_name'];
                    $name_tmp_s  = $sampul_new;
                    $ext_valid   = array('png','jpg','jpeg','jpe');
                    $x_s         = explode('.', $name_tmp_s);
                    $extend_s    = strtolower(end($x_s));
                    $time        = date('dmYHi');
                    $sampul      = $slug. '-' .$time. '.' .$extend_s;
                    $path_s      = '_uploads/blog/sampul/'.$id.'/'.$sampul;
                    if (in_array($extend_s, $ext_valid)===true) {
                        if ($extend_s==true) {
                            unlink('_uploads/blog/sampul/'.$id.'/'.$sampul_old);
                            compressImage($file_tmp_s, $path_s, 60);
                        }
                        $db->query("DELETE FROM tags_blog WHERE id_blog='$id'");
                        for ($t=0; $t < $jumlah_tags; $t++) { 
                            $tags = $db->real_escape_string($_POST['tags'][$t]);
                            $db->query("INSERT INTO tags_blog VALUES ('','$id','$tags',NOW())");
                        }
                        $db->query("UPDATE blog SET j_blog='$j_blog',slug='$slug',sampul='$sampul',c_sampul='$c_sampul',updated_at=NOW() WHERE id_blog='$id'");
                        sweetAlert('blog/post/edit/'.$id, 'sukses', 'Berhasil !', 'Data Postingan dengan (ID : '.$id.') Berhasil diupdate.');
                    } else {
                        javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe');
                    }
                }
                if (isset($_POST['gambar'])) {
                    $jumlah_foto = count($_FILES['foto']['name']);
                    $slugs       = $d['slug'];
                    if ($jumlah_foto > 0) {
                        for ($f=0; $f < $jumlah_foto; $f++) {
                            // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                            $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                            $name_tmp_f  = $_FILES['foto']['name'][$f];
                            $ext_valid_f = array('png','jpg','jpeg','jpe','mp4');
                            $x_f         = explode('.', $name_tmp_f);
                            $extend_f    = strtolower(end($x_f));
                            $time        = date('dmYHis');
                            $foto        = $slugs. '-' .$f.$time. '.' .$extend_f;
                            $path_f      = '_uploads/blog/gallery/'.$id.'/'.$foto;
                                    
                            if (in_array($extend_f, $ext_valid_f)===true) {
                                    compressImage($file_tmp_f, $path_f, 30);
                                $db->query("INSERT INTO d_blog VALUES ('','$id','$foto','$extend_f',NOW())");
                                $db->query("UPDATE blog SET updated_at=NOW() WHERE id_blog='$id'");
                            } else {
                                javascript('', 'alert-error', 'Inputan hanya boleh jpg, png, jpeg, jpe');
                            }
                        }
                        sweetAlert('blog/post/edit/'.$id, 'sukses', 'Berhasil !', 'Data Postingan dengan (ID : '.$id.') Berhasil diupdate.');
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    }
} else {
    sweetAlert('blog/post','error','Kesalahan Autentikasi..!','Maaf anda tidak dapat mengubah postingan ini...');
}
?>
<?php break; ?>
<?php case 'delete-gambar':
    $id       = $_POST['id'];
    $id_blog  = $_POST['id_blog'];
    $nama     = $_POST['nama'];

    unlink('_uploads/blog/gallery/'.$id_blog.'/' .$nama);
    $q = $db->query("DELETE FROM d_blog WHERE id_d_blog='$id'");
    if ($q) {
        sweetAlert('blog/post/edit/'.$id_blog, 'sukses', 'Berhasil..!', 'Gambar Galeri Postingan Berhasil dihapus.');
    } else {
        sweetAlert('blog/post/edit/'.$id_blog, 'error', 'Error !', 'Ups... Sepertinya Ada Kesalahan...');
    }
    
?>
<?php break; ?>
<?php case 'delete':
    $id_peng  = $_POST['id_peng'];
    // $nama     = $_POST['nama'];
    // $ekstensi = $_POST['ekstensi'];

    $doc=$db->query("SELECT * FROM d_pengaduan WHERE id_peng='$id_peng'");
    while ($d=$doc->fetch_assoc()) {
        if ($d['x_peng']!=='mp4') {
            unlink('_uploads/f_peng/'.$d['n_d_peng']);
        } else {
            unlink('_uploads/v_peng/'.$d['n_d_peng']);
        }
    }
    $db->query("DELETE FROM d_pengaduan WHERE id_peng='$id_peng'");
    $db->query("DELETE FROM pengaduan WHERE id_peng='$id_peng'");
    sweetAlert('pengaduan', 'sukses', 'Berhasil !', ' Data Pengaduan Dengan ID: '.$id_peng.' Berhasil dihapus..!');
?>
<?php break; ?>
<?php }
} ?>