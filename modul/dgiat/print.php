<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:40:39
* @modify date 2021-06-11 14:40:39
* @desc [description]
*/
include_once '../../_func/func.php';
// include_once '../../_func/template.php';
$id= $_GET['id'];
    $d = $db->query("SELECT *, a.updated_at as updated FROM giat a, regu b, users c WHERE a.regu=b.id_regu AND a.adm_giat=c.id AND a.id_giat='$id' ")->fetch_assoc();
    // $dd= $db->query("SELECT * FROM d_giat WHERE id_giat='$id'")->fetch_assoc();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Perparkiran Dinas Perhubungan Kota Pekanbaru">
    <meta name="keywords"
        content="Sistem Informasi Perparkiran Kota Pekanbaru, Parkir Pekanbaru, UPT Parkir Pekanbaru, UPT Perparkiran Pekanbaru, UPTD Parkir Pekanbaru, Dinas Perhubungan Kota Pekanbaru, Dishub Pku, Jumlah Jukir Pekanbaru, Jukir Pekanbaru">
    <meta name="author" content="uptperparkiranpekanbaru">
    <link rel="icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/aos.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/scrollable.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/simple-mde.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/select2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/timepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/datatable-extension.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/owlcarousel.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/animate.css"> -->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url(); ?>../../assets/adm/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>../../assets/adm/css/responsive.css">
    <!-- Video.js -->
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />
    <!-- City -->
    <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />
    <!-- Fantasy -->
    <link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="stylesheet">
    <!-- Forest -->
    <link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet">
    <!-- Sea -->
    <link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet">
    <!-- CKEditor -->
    <script src="<?= base_url(); ?>vendor/ckeditor/ckeditor.js">
    var data = CKEDITOR.instances.editor1.getData();
    </script>

    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/examples.css" /> -->
</head>
<title>Print Giat <?= $d['no_giat']; ?></title>

<body onload="startTime()">
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <div class="container-fluid">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h6>ID Giat: <?= $id; ?></h6>
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
                                    <hr>
                                    <h5>Dokumentasi Foto</h5>
                                    <div class="gallery my-gallery card-body row" itemscope="">
                                        <?php 
                                            $dokumen = $db->query("SELECT * FROM d_giat WHERE id_giat='$id'");
                                            while($dd=$dokumen->fetch_assoc()) :
                                            if ($dd['x_giat']=='png' OR $dd['x_giat']=='jpeg' OR $dd['x_giat']=='jpg' OR $dd['x_giat']=='jpe') {
                                            ?>
                                        <figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope=""><img class="img-thumbnail" src="<?= base_url(); ?>../../_uploads/f_giat/<?= $dd['n_d_giat']; ?>" alt="Image description">
                                            <!-- <figcaption itemprop="caption description">Image caption  1</figcaption> -->
                                        </figure>
                                        <?php }
                                            ?>
                                        <?php endwhile ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="<?= base_url(); ?>../../assets/adm/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?= base_url(); ?>../../assets/adm/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?= base_url(); ?>../../assets/adm/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- <script src="<?= base_url(); ?>../../assets/js/scrollbar/simplebar.js"></script> -->
    <script src="<?= base_url(); ?>../../assets/adm/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?= base_url(); ?>../../assets/adm/js/config.js"></script>
    <!-- Plugins JS start-->
    <!-- <script src="<?= base_url(); ?>/assets/js/height-equal.js"></script> -->
    <!-- <script src="<?= base_url(); ?>../../assets/js/sidebar-menu.js"></script> -->
    <script src="<?= base_url(); ?>../../assets/adm/js/isotope.pkgd.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/animation/aos/aos.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/animation/aos/aos-init.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/timeline/timeline-v-1/main.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/modernizr.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/timeline/timeline-v-2/jquery.timeliny.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/timeline/timeline-v-2/timeline-v-2-custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/scrollable/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/scrollable/scrollable-custom.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/editor/simple-mde/simplemde.min.js"></script>
<script src="<?= base_url(); ?>assets/js/editor/simple-mde/simplemde.custom.js"></script> -->
    <script src="<?= base_url(); ?>../../assets/adm/js/touchspin/vendors.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/touchspin/touchspin.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/touchspin/input-groups.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/form-validation-custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/select2/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/select2/select2-custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/height-equal.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/chart/chartist/chartist.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/chart/knob/knob.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/chart/knob/knob-chart.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/dashboard/default.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/notify/index.js"></script> -->
    <!-- <script src="<?= base_url(); ?>assets/js/sweet-alert/sweetalert.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/adm/js/modal-animated.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/sweet-alert/app.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/tooltip-init.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/time-picker/jquery-clockpicker.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/time-picker/highlight.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/time-picker/clockpicker.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/typeahead/handlebars.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/typeahead/typeahead.bundle.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/typeahead/typeahead.custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/typeahead-search/handlebars.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/typeahead-search/typeahead-custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/counter/jquery.waypoints.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/counter/jquery.counterup.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/counter/counter-custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/photoswipe/photoswipe.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/photoswipe/photoswipe.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/owlcarousel/owl.carousel.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/owlcarousel/owl-custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/animation/wow/wow.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/animation/wow/wow-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url(); ?>../../assets/adm/js/script.js"></script>
    <!-- <script src="<?= base_url(); ?>../../assets/js/theme-customizer/customizer.js"></script> -->
    <!-- login js-->
    <!-- Plugin used-->
    <!-- data tables  -->
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.buttons.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/buttons.colVis.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.autoFill.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.select.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/buttons.bootstrap4.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/buttons.html5.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/buttons.print.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.bootstrap4.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.responsive.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/responsive.bootstrap4.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.keyTable.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.colReorder.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.fixedHeader.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.rowReorder.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/dataTables.scroller.min.js">
    </script>
    <script src="<?= base_url(); ?>../../assets/adm/js/datatable/datatable-extension/custom.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/idle-master/jquery.idle.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/idle-master/jquery.idle.min.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/jquery-idle/src/jquery.idletimeout.js"></script>
    <script src="<?= base_url(); ?>../../assets/adm/js/jquery-idle/src/jquery.idletimer.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js">
    </script>
    <!-- <script src="<?= base_url(); ?>assets/intel/build/js/intlTelInput.js"></script> -->
    <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.1.0/videojs-contrib-quality-levels.min.js">
    </script>
    <script src="https://www.unpkg.com/videojs-hls-quality-selector@1.0.5/dist/videojs-hls-quality-selector.js">
    </script>
    <script src="https://www.unpkg.com/videojs-hls-quality-selector@1.0.5/dist/videojs-hls-quality-selector.min.js">
    </script>
    <script>
    var player = videojs('my-video');

    player.hlsQualitySelector();
    </script>
    <script>
    window.print();
    </script>
</body>

</html>