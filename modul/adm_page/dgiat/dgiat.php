<?php
/**
 * @author [bangameck.dev]
 * @email [rahmad.looker@mail.com]
 * @create date 2021-07-25 00:10:48
 * @modify date 2021-07-25 00:10:48
 * @desc [description]
 */

include '_func/identity.php';
    $id= $_GET['id'];
    $d = $db->query("SELECT *, a.updated_at as updated FROM giat a, regu b, users c WHERE a.regu=b.id_regu AND a.adm_giat=c.id AND a.id_giat='$id' ")->fetch_assoc();
    if ($d['adm_giat']==$_SESSION['id_usr']) {
        $hide = '';
    } else {
        $hide = 'hidden';
    }
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
                        <li class="breadcrumb-item">Data Master</li>
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
                                <a href="<?= base_url(); ?>giat/edit/<?= $id; ?>" class="btn btn-warning-gradien"
                                    <?= $hide; ?>><i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <form action="<?= base_url(); ?>giat/print" method="GET">
                                    <input type="hidden" value="<?= $id; ?>" name="id">
                                    <button class="btn btn-primary-gradien" type="submit"><i class="fa fa-print"></i>
                                        Print</button>
                                </form>
                                <form action="<?= base_url(); ?>giat/delete" method="POST" <?= $hide; ?>>
                                    <input type="hidden" name="id_giat" value="<?= $id; ?>">
                                    <button class="btn btn-danger-gradien" type="submit" onclick="return hapus()"><i
                                            class="fa fa-trash"></i>
                                        Hapus</button>
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
                                            <td><a
                                                    href="<?= base_url(); ?>profile/<?= $d['username']; ?>"><?= $d['nama']; ?></a>
                                            </td>
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
                                <br>
                                <h5>Dokumentasi Foto</h5>
                                <div class="row gallery grid my-gallery" id="aniimated-thumbnials">
                                    <?php 
                                            $dokumen = $db->query("SELECT * FROM d_giat WHERE id_giat='$id'");
                                            while($dd=$dokumen->fetch_assoc()) :
                                            if ($dd['x_giat']=='png' OR $dd['x_giat']=='jpeg' OR $dd['x_giat']=='jpg' OR $dd['x_giat']=='jpe') {
                                            ?>
                                    <figure class="grid-item col-sm-3" data-aos="flip-left"><a
                                            href="<?= base_url(); ?>_uploads/f_giat/<?= $dd['n_d_giat']; ?>"
                                            data-size="600x600"><img class="img-thumbnail"
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
                        <div class="row">
                            <?php 
                                $dokumen = $db->query("SELECT * FROM d_giat WHERE id_giat='$id'");
                                $no=1;
                                while($dd=$dokumen->fetch_assoc()) :
                                if ($dd['x_giat']=='mp4') {
                            ?>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h6>Dokumentasi Video <?= $no++; ?></h6><small>(<?= $dd['n_d_giat']; ?>)</small>
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