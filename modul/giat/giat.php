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
    sweetAlert('out','error','Error Session !','Session telah berakhir, silahkan login ulang');
} else {
// aut(array(1));
$a=$_GET['a'];
switch($a){
    default:
    aut(array(1,2,3,4,5,6));
    if ($_SESSION['level']=='1' OR $_SESSION['level']=='2' OR $_SESSION['level']=='3') {
        $hide = ''; 
    } else {
        $hide = 'hidden';
    }
?>
<title>Kegiatan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Data Kegiatan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Kegiatan </li>
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
                            <a href="<?= base_url(); ?>giat/add" class="btn btn-primary-gradien" type="button" <?= $hide; ?>>Tambah
                                Data</a>
                        </div>
                        <br>
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Giat</th>
                                    <th>Tanggal</th>
                                    <th>Nama Regu</th>
                                    <th>Kegiatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($_SESSION['level']=='1' OR $_SESSION['level']=='4' OR $_SESSION['level']=='5' OR $_SESSION['level']=='6') {
                                    $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu ORDER BY a.tgl_giat ASC");
                                } else {
                                    $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu AND a.adm_giat='$_SESSION[id_usr]' ORDER BY a.tgl_giat ASC");
                                }

                                // $us=$db->query("SELECT * FROM giat a, regu b WHERE a.regu=b.id_regu ORDER BY a.tgl_giat ASC");
                                $no=1;
                                while ($u=$us->fetch_assoc()) :
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $u['no_giat']; ?></td>
                                    <td><?= hari(date('D', strtotime($u['tgl_giat']))).', '.tgl_indo(date('Y-m-d', strtotime($u['tgl_giat']))).' '.date('H:i:s', strtotime($u['tgl_giat'])); ?>
                                    </td>
                                    <td><?= $u['nm_regu']; ?></td>
                                    <td><?= $u['kegiatan']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url(); ?>giat/edit/<?= $u['id_giat']; ?>"
                                                class="btn btn-warning" <?= $hide; ?>><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url(); ?>giat/detail/<?= $u['id_giat']; ?>"
                                                class="btn btn-primary"><i class="fa fa-info-circle"></i></a>

                                            <form action="<?= base_url(); ?>giat/delete" method="POST" <?= $hide; ?>>
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
<?php break; ?>
<?php case 'add' :
    aut(array(1,2,3));
    ?>
<title>Input Kegiatan | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Input Kegiatan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i
                                    data-feather="git-pull-request"></i></a>
                        </li>
                        <li class="breadcrumb-item">Kegiatan </li>
                        <li class="breadcrumb-item active">Input Kegiatan </li>
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
                        <div class="col-lg-6 col-md-12">
                            <label">No Kegiatan :</label>
                                <input type="text" class="form-control" name="no_giat"
                                    value="<?= '06'.'.'.uid('3').'/Keg-Par/DP-KP/PRK/'.bln_romawi(date('m')).'/'.date('Y') ?>"
                                    readonly>
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
                                <input type="text" class="form-control" value="<?= $_SESSION['nama']; ?>" readonly>
                                <input type="hidden" class="form-control" name="adm_giat"
                                    value="<?= $_SESSION['id_usr']; ?>">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Kegiatan tidak boleh kosong.
                                </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-3 col-md-6">
                            <label">Tanggal Kegiatan :</label>
                                <input type="text" class="datepicker-here form-control digits" data-language="en"
                                    name="tgl_giat" value="<?= date('m/d/Y'); ?>" required>
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
                                    <input class="form-control" name="jam_giat" type="text" value="<?= date('H:i'); ?>"
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
                                <select class="form-select js-example-basic-single" name="regu" id="floatingSelect"
                                    aria-label="Pilih Regu" required>
                                    <option value="">Pilih Regu</option>
                                    <?php 
                            $regu = $db->query("SELECT * FROM regu ORDER BY nm_regu ASC");
                            while($r=$regu->fetch_assoc()) :
                            ?>
                                    <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Regu tidak boleh kosong.
                                </div>
                        </div>
                        <?php } else { 
                    $rg = $db->query("SELECT * FROM regu WHERE id_regu='$_SESSION[regu]'")->fetch_assoc();
                    ?>
                        <div class="col-lg-6 col-md-12">
                            <label">Regu :</label>
                                <input type="hidden" class="form-control" name="regu" value="<?= $rg['id_regu']; ?>">
                                <input type="text" class="form-control" name="nm_regu" value="<?= $rg['nm_regu']; ?>"
                                    readonly>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Regu tidak boleh kosong.
                                </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-12 col-md-12">
                            <label">Kegiatan :</label>
                                <input type="text" class="form-control" name="kegiatan" value="" required>
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
                                <textarea name="editor1" rows="10" cols="20" class="form-control editor"
                                    required></textarea>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Keterangan Kegiatan tidak boleh kosong.
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
                        <button class="btn btn-primary-gradien" name="simpan" type="submit">Simpan
                            Data</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['simpan'])) {
                    $id             = $db->real_escape_string('GIAT'.acakhba('10').'PARKIR');
                    $no_giat        = $db->real_escape_string($_POST['no_giat']);
                    $tgl            = $db->real_escape_string(date('Y-m-d', strtotime($_POST['tgl_giat'])));
                    $jam            = $db->real_escape_string(date('H:i:s', strtotime($_POST['jam_giat'])));
                    $regu           = $db->real_escape_string($_POST['regu']);
                    $kegiatan       = $db->real_escape_string($_POST['kegiatan']);
                    $ket_giat       = $_POST['editor1'];
                    $adm_giat       = $db->real_escape_string($_POST['adm_giat']);
                    $jumlah_video   = count($_FILES['video']['name']);
                    $jumlah_foto    = count($_FILES['foto']['name']);
                    $file_tmp_video = $_FILES['foto']['tmp_name'];
                    // $file_tmp_foto  = $_FILES['foto']['tmp_name'];
                    // var_dump($file_tmp_video,$jumlah_video);
                    // die();

                    
                        if ($jumlah_foto > 0) {
                            for ($f=0; $f < $jumlah_foto; $f++){
                                // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                                $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                                $name_tmp_f  = $_FILES['foto']['name'][$f];
                                $ext_valid_f = array('png','jpg','jpeg','jpe','3gp','mp4','mp4v','mpg4','mov','qt');
                                $x_f         = explode('.', $name_tmp_f);
                                $extend_f    = strtolower(end($x_f));
                                $time        = date('dmYHis');
                                $foto        = 'giat_'.$f.$time. '.' . $extend_f;
                                // $name        = 'giat_'.$f.$time. '.';
                                if ($extend_f=='png' OR $extend_f=='jpg' OR $extend_f=='jpeg' OR $extend_f=='jpe') {
                                    $path_f      = '_uploads/f_giat/'.$foto;
                                } else {
                                    $path_v      = '_uploads/v_giat/'.$foto;
                                }
                                
                                if (in_array($extend_f, $ext_valid_f)===true) {
                                    if ($extend_f=='png' OR $extend_f=='jpg' OR $extend_f=='jpeg' OR $extend_f=='jpe') {
                                        compressImage($file_tmp_f, $path_f, 30);
                                    } else {
                                        move_uploaded_file($file_tmp_f,$path_v);
                                    }
                                    $db->query("INSERT INTO d_giat VALUES ('','$id','$foto','$extend_f',NOW())");
                                } else {
                                    javascript('','alert-error','Inputan hanya boleh jpg, png, jpeg, jpe, 3gp, mp4, mp4v, mpg4, mov, qt');
                                }
                            }
                            $db->query("INSERT INTO giat VALUES ('$id','$no_giat','$tgl $jam','$regu','$kegiatan','$ket_giat','$adm_giat',NOW(),NOW(),NULL)");
                            sweetAlert('giat/detail/'.$id,'sukses','Berhasil !','Data giat dengan (ID Giat : '.$id.') Berhasil diinput.');
                        }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'detail' :
    $id= $_GET['id'];
    $d = $db->query("SELECT *, a.updated_at as updated FROM giat a, regu b, users c WHERE a.regu=b.id_regu AND a.adm_giat=c.id AND a.id_giat='$id' ")->fetch_assoc();
    // $dd= $db->query("SELECT * FROM d_giat WHERE id_giat='$id'")->fetch_assoc();
    if (empty($d)) {
        sweetAlert('dashboard','error','Error !','Data giat tidak ditemukan.');
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
                                            while($dd=$dokumen->fetch_assoc()) :
                                            if ($dd['x_giat']=='png' OR $dd['x_giat']=='jpeg' OR $dd['x_giat']=='jpg' OR $dd['x_giat']=='jpe') {
                                            ?>
                                    <figure class="grid-item col-sm-3" data-aos="flip-left"><a
                                            href="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                            data-size="1600x950"><img class="img-thumbnail"
                                                src="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                                alt="<?= $dd['n_d_giat']; ?>"></a>
                                        <figcaption><?= $dd['n_d_giat']; ?></figcaption>
                                    </figure>
                                    <?php }
                                            ?>
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
                                while($dd=$dokumen->fetch_assoc()) :
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
                            <?php } ?>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php break; ?>
<?php case 'edit' : 
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
                    <a href="<?= base_url(); ?>giat/detail/<?= $id; ?>" class="btn btn-primary-gradien" type="button"><i class="fa fa-info-circle"></i> Pratinjau
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
                                                    value="<?= date('H:i' ,strtotime($d['tgl_giat'])); ?>"
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
                                                while($r=$regu->fetch_assoc()) :
                                                ?>
                                                <option value="<?= $r['id_regu']; ?>"><?= $r['nm_regu']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Regu tidak boleh kosong.
                                            </div>
                                    </div>
                                    <?php } else { 
                                        $rg = $db->query("SELECT * FROM regu WHERE id_regu='$_SESSION[regu]'")->fetch_assoc();
                                    ?>
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
                                    <?php } ?>
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
                                            <textarea name="editor1" rows="10" cols="20"
                                                class="form-control editor" required><?= $d['ket_giat']; ?></textarea>
                                            <!-- <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor 4
                                            // instance, using default configuration.
                                            CKEDITOR.replace('editor1');
                                            </script> -->
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
                                                    <form action="<?= base_url(); ?>giat/delete/dokumentasi" method="POST">
                                                        <input type="hidden" name="nama" value="<?= $u['n_d_giat']; ?>">
                                                        <input type="hidden" name="id" value="<?= $u['id_d_giat']; ?>">
                                                        <input type="hidden" name="id_giat" value="<?= $id; ?>">
                                                        <input type="hidden" name="ekstensi" value="<?= $u['x_giat']; ?>">
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
                        sweetAlert('giat/edit/'.$id,'sukses','Berhasil !','Data giat dengan (ID Giat : '.$id.') Berhasil diubah.');
                    } else {
                        javascript('','alert-error','Ups.. Sepertinya ada kesalahan..');
                    }
                }
                if (isset($_POST['dokumentasi'])) {
                    $jumlah_foto    = count($_FILES['foto']['name']);
                        if ($jumlah_foto > 0) {
                            for ($f=0; $f < $jumlah_foto; $f++){
                                // $file_tmp    = $_FILES['gambar']['tmp_name'][$i];
                                $file_tmp_f  = $_FILES['foto']['tmp_name'][$f];
                                $name_tmp_f  = $_FILES['foto']['name'][$f];
                                $ext_valid_f = array('png','jpg','jpeg','jpe','3gp','mp4','mp4v','mpg4','mov','qt');
                                $x_f         = explode('.', $name_tmp_f);
                                $extend_f    = strtolower(end($x_f));
                                $time        = date('dmYHis');
                                $foto        = 'giat_'.$f.$time. '.' . $extend_f;
                                // $name        = 'giat_'.$f.$time. '.';
                                if ($extend_f=='png' OR $extend_f=='jpg' OR $extend_f=='jpeg' OR $extend_f=='jpe') {
                                    $path_f      = '_uploads/f_giat/'.$foto;
                                } else {
                                    $path_v      = '_uploads/v_giat/'.$foto;
                                }
                                
                                if (in_array($extend_f, $ext_valid_f)===true) {
                                    if ($extend_f=='png' OR $extend_f=='jpg' OR $extend_f=='jpeg' OR $extend_f=='jpe') {
                                        compressImage($file_tmp_f, $path_f, 30);
                                    } else {
                                        move_uploaded_file($file_tmp_f,$path_v);
                                    }
                                    $db->query("INSERT INTO d_giat VALUES ('','$id','$foto','$extend_f',NOW())");
                                    $db->query("UPDATE giat SET updated_at=NOW() WHERE id_giat='$id'");
                                } else {
                                    javascript('','alert-error','Inputan hanya boleh jpg, png, jpeg, jpe, 3gp, mp4, mp4v, mpg4, mov, qt');
                                }
                            }
                            sweetAlert('giat/edit/'.$id,'sukses','Berhasil !','Data Dokumentasi giat dengan (ID Giat : '.$id.') Berhasil diinput.');
                        }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'delete-dokumentasi' : 
    $id       = $_POST['id'];
    $id_giat  = $_POST['id_giat'];
    $nama     = $_POST['nama'];
    $ekstensi = $_POST['ekstensi'];

    if ($ekstensi == 'mp4') {
        unlink('_uploads/v_giat/' .$nama);
        $q = $db->query("DELETE FROM d_giat WHERE id_d_giat='$id'");
        if ($q) {
            sweetAlert('giat/edit/'.$id_giat,'sukses','Berhasil..!','Dokumentasi Berhasil dihapus...');
            
        } else {
            sweetAlert('giat/edit/'.$id_giat,'error','Error !','Ups... Sepertinya Ada Kesalahan...');
        }
    } else {
        unlink('_uploads/f_giat/' .$nama);
        $q = $db->query("DELETE FROM d_giat WHERE id_d_giat='$id'");
        if ($q) {
            sweetAlert('giat/edit/'.$id_giat,'sukses','Berhasil..!','Dokumentasi Berhasil dihapus...');
            
        } else {
            sweetAlert('giat/edit/'.$id_giat,'error','Error !','Ups... Sepertinya Ada Kesalahan...');
        }
    }
    
?>
<?php break; ?>
<?php case 'delete' : 
    $id_giat  = $_POST['id_giat'];
    // $nama     = $_POST['nama'];
    // $ekstensi = $_POST['ekstensi'];

    $doc=$db->query("SELECT * FROM d_giat WHERE id_giat='$id_giat'");
    while ($d=$doc->fetch_assoc()) {
        if ($d['x_giat']=='png' OR $d['x_giat']=='jpg' OR $d['x_giat']=='jpeg' OR $d['x_giat']=='jpe') {
            unlink('_uploads/f_giat/'.$d['n_d_giat']);
        } else  {
            unlink('_uploads/v_giat/'.$d['n_d_giat']);
        }
    }
    $db->query("DELETE FROM d_giat WHERE id_giat='$id_giat'");
    $db->query("DELETE FROM giat WHERE id_giat='$id_giat'");
    sweetAlert('giat','sukses','Berhasil !',' Data Giat Dengan ID: '.$id_giat.' Berhasil dihapus..!');
?>
<?php break; ?>
<?php 
    }
} ?>