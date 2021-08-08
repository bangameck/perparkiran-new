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
// aut(array(1));
$a=$_GET['a'];
switch($a){
    default:
?>
<title>Laporan Pertanggal | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Laporan Keseluruhan</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="monitor"></i></a>
                        </li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Keseluruhan </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="scroll-bar-wrap">
                      <div class="visible-scroll always-visible scroll-demo">
                        <div class="horz-scroll-content"> -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Driver <br><small>(Nomor Bus)</small></th>
                                    <th class="text-center"><small>Nomor</small> <br><small>Polisi Bus</small></th>
                                    <th class="text-center">Lokasi <br><small>Layanan</small></th>
                                    <th class="text-center">Rute</small></th>
                                    <th class="text-center">LK</th>
                                    <th class="text-center">PR</th>
                                    <th class="text-center">L<br><small>>60 th</small></th>
                                    <th class="text-center"><small>Tidak</small><br><small>Vaksin</small></th>
                                    <th class="text-center">
                                        <small>Jumlah</small><br><small>yang</small><br><small>divaksin</small></th>
                                    <th class="text-center">Permasalahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        $data = $db->query("SELECT * FROM layanan a, users b, kec c, bus d WHERE a.usr_created = b.id AND a.kecamatan=c.id_kec AND a.bus=d.id_bus ORDER BY d.no_bus ASC");
                        // $no=1;
                        while ($d=$data->fetch_assoc()) :
                            $n++;
                            $lk[$n] = $d['lk'];
                            $lks=array_sum($lk);
                            $pr[$n] = $d['pr'];
                            $prs=array_sum($pr);
                            $ln[$n] = $d['ln'];
                            $lns=array_sum($ln);
                            $tv[$n] = $d['tv'];
                            $tvs=array_sum($tv);
                            $total[$n] = $d['total'];
                            $totals=array_sum($total);
                        ?>
                                <tr>
                                    <th class="text-nowrap" scope="row" rowspan="2"><?= $n++; ?></th>
                                    <td class="col-md-2"><?= $d['driver']; ?></td>
                                    <td rowspan="2"><?= $d['nopol_bus']; ?> (<?= $d['no_bus']; ?>)</td>
                                    <td rowspan="2"><?= $d['nm_kec']; ?></td>
                                    <td rowspan="2"><?= $d['rute']; ?></td>
                                    <td rowspan="2"><?= $d['lk']; ?></td>
                                    <td rowspan="2"><?= $d['pr']; ?></td>
                                    <td rowspan="2"><?= $d['ln']; ?></td>
                                    <td rowspan="2"><?= $d['tv']; ?></td>
                                    <td rowspan="2"><?= $d['total']; ?> <small>Orang</small></td>
                                    <td class="col-md-4" rowspan="2"><?= $d['permasalahan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-2"><?= $d['pendamping']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <th class="text-center" colspan="5">Jumlah Total</th>
                                <th class="text-center"><?= $lks ; ?></th>
                                <th class="text-center"><?= $prs ; ?></th>
                                <th class="text-center"><?= $lns ; ?></th>
                                <th class="text-center"><?= $tvs ; ?></th>
                                <th class="text-center"><?= $totals ; ?></th>
                                <th class="text-center"></th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- </div>
                        </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'tanggal' : ?>
<title>Laporan Pertanggal | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Laporan Pertanggal</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="book-open"></i></a>
                        </li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Pertanggal </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 needs-validation form theme-form" novalidate=""
                        action="<?= base_url(); ?>laporan/pertanggal" method="POST" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                <label></label>Tanggal :</label>
                                <input type="text" class="datepicker-here form-control digits" id="tgl"
                                    data-language="en" value="<?= date('m/d/Y'); ?>" name="tgl" required>
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
                        <hr>
                        <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                            <button class="btn btn-primary-gradien" name="simpan" type="submit">Lanjut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case 'pertanggal' :
    $tgl = date('Y-m-d', strtotime($_POST['tgl']));
     ?>
<title>Laporan Pertanggal | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Laporan Pertanggal</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="monitor"></i></a>
                        </li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Pertanggal </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Driver <br><small>(Nomor Bus)</small></th>
                                    <th class="text-center"><small>Nomor</small> <br><small>Polisi Bus</small></th>
                                    <th class="text-center">Lokasi <br><small>Layanan</small></th>
                                    <th class="text-center">Rute</small></th>
                                    <th class="text-center">LK</th>
                                    <th class="text-center">PR</th>
                                    <th class="text-center">L<br><small>>60 th</small></th>
                                    <th class="text-center"><small>Tidak</small><br><small>Vaksin</small></th>
                                    <th class="text-center">
                                        <small>Jumlah</small><br><small>yang</small><br><small>divaksin</small></th>
                                    <th class="text-center">Permasalahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        $data = $db->query("SELECT * FROM layanan a, users b, kec c, bus d WHERE a.usr_created = b.id AND a.kecamatan=c.id_kec AND a.bus=d.id_bus AND a.tgl='$tgl' ORDER BY d.no_bus ASC");
                        $no=1;
                        while ($d=$data->fetch_assoc()) :
                        ?>
                                <tr>
                                    <th class="text-nowrap" scope="row" rowspan="2"><?= $no++; ?></th>
                                    <td class="col-md-2"><?= $d['driver']; ?></td>
                                    <td rowspan="2"><?= $d['nopol_bus']; ?> (<?= $d['no_bus']; ?>)</td>
                                    <td rowspan="2"><?= $d['nm_kec']; ?></td>
                                    <td rowspan="2"><?= $d['rute']; ?></td>
                                    <td rowspan="2"><?= $d['lk']; ?></td>
                                    <td rowspan="2"><?= $d['pr']; ?></td>
                                    <td rowspan="2"><?= $d['ln']; ?></td>
                                    <td rowspan="2"><?= $d['tv']; ?></td>
                                    <td rowspan="2"><?= $d['total']; ?> <small>Orang</small></td>
                                    <td class="col-md-4" rowspan="2"><?= $d['permasalahan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-2"><?= $d['pendamping']; ?></td>
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
<?php case 'perbus' : ?>
<title>Laporan Perbus | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Laporan Perbus</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="book-open"></i></a>
                        </li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Perbus </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="row g-3 needs-validation form theme-form" novalidate=""
                        action="<?= base_url(); ?>laporan/bus" method="POST" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                                <label></label>Pilih Bus :</label>
                                <select class="form-select js-example-basic-single" name="bus" id="floatingSelect"
                                    aria-label="Pilih Level" required>
                                    <option value="">Pilih Bus</option>
                                    <?php 
                                $bus = $db->query("SELECT * FROM bus ORDER BY no_bus ASC");
                                while($b=$bus->fetch_assoc()) :
                            ?>
                                    <option value="<?= $b['id_bus']; ?>">(<?= $b['no_bus']; ?>) <?= $b['nopol_bus']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                                <!-- <div class="show-hide"><span id="view_pass"></span></div> -->
                                <div class="invalid-feedback">
                                    Nomor Bus tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-lg-3 col-md-12 mx-auto">
                            <button class="btn btn-primary-gradien" name="simpan" type="submit">Lanjut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php break; ?>
<?php case'bus' :
    $id_bus  = $db->real_escape_string($_POST['bus']);
    $no_bus = $db->query("SELECT * FROM bus WHERE id_bus='$id_bus'")->fetch_assoc();
    ?>
<title>Laporan Perbus | <?= $title; ?></title>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Laporan Perbus</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>"> <i data-feather="monitor"></i></a>
                        </li>
                        <li class="breadcrumb-item">Laporan</li>
                        <li class="breadcrumb-item active">Perbus </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="card-header">
                    <h5>Laporan Vaksin Bus (<?= $no_bus['no_bus']; ?>) <?= $no_bus['nopol_bus']; ?></h5>
                  </div> -->
                    <div class="card-body">
                        <section class="cd-container" id="cd-timeline">
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture bg-primary"><i class="icon-pencil-alt"></i></div>
                                <div class="cd-timeline-content">
                                    <h4>Laporan Bus Vaksin</h4>
                                    <p class="m-0">Dibwah ini adalah daftar laporan data bus vaksin keliling dengan
                                        nomor plat <b>(<?= $no_bus['no_bus']; ?>) <?= $no_bus['nopol_bus']; ?></b></p>
                                </div>
                            </div>
                            <?php 
                      $bus = $db->query("SELECT * FROM layanan a, users b, kec c, bus d WHERE a.usr_created = b.id AND a.kecamatan=c.id_kec AND a.bus=d.id_bus AND a.bus='$id_bus' ORDER BY a.tgl ASC");
                      while ($b=$bus->fetch_assoc()) :
                      ?>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-picture bg-secondary"><i
                                        class="icofont icofont-bus-alt-1"></i></i></div>
                                <div class="cd-timeline-content">
                                    <h4><?= $b['nm_kec']; ?></h4>
                                    <p class="m-0">Telah dilaksan vaksin bus keliling di <b><?= $b['nm_kec']; ?></b>,
                                        tepatnya di <b><?= $b['rute']; ?></b>
                                        oleh Bus Trans Metro Pekanbaru dengan nomor polisi
                                        <b><?= $b['nopol_bus']; ?></b>
                                        yang di kendarai oleh <b><?= $b['driver']; ?></b>
                                        dan di dampingi oleh <b><?= $b['pendamping']; ?></b> <br>
                                        Peserta yang selesai divaksin berjumlah <b><?= $b['total']; ?> Orang</b>,
                                        Dengan Rincian : <br>Pria Berjumlah <b><?= $b['lk']; ?> Orang</b>.<br>
                                        Wanita Berjumlah <b><?= $b['pr']; ?> Orang</b>.<br>
                                        Lansia Berjumlah <b><?= $b['ln']; ?> Orang</b>.<br>
                                        Yang tidak bisa mengkuti vaksin berjumlah <b><?= $b['tv']; ?> Orang</b>.
                                        <br><br>
                                        Alasan tidak mengikuti vaksin : <br>
                                        <b><?= $b['permasalahan']; ?></b>
                                    </p>
                                    <span class="cd-date"><?= tgl_indo(date('Y-m-d', strtotime($b['tgl']))); ?></span>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php break; ?>
    <?php break; ?>
    <?php } ?>