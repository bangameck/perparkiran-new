<?php 
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:39:57
* @modify date 2021-06-11 14:39:57
* @desc [description]
*/
// include_once '../../_func/func.php'; 
include '_func/identity.php';
aut(array(1,2,3,4,5,6));
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    $hid = 'hidden';
} else {
    $hid = '';
}
if (empty($_SESSION['foto'])) {
    $foto = 'default.png';
} else {
    $foto = $_SESSION['foto'];
}
?>
<title> Dashboad | <?= $title; ?></title>
<!-- <script type='text/javascript'>
 setTimeout(function (){
    let timerInterval
    swal.fire({
        title: 'Auto close alert!',
        html: 'Testing my friend..<br>I will close in <b></b> milliseconds.',
        // text: "You won't be able to revert this!",
        icon: 'success',
        timer: 10000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
            const content = Swal.getHtmlContainer()
            if (content) {
                const b = content.querySelector('b')
                if (b) {
                b.textContent = Swal.getTimerLeft()
                }
            }
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        });
    },10);
    window.setTimeout(function() {
    window.location.replace('<?= base_url(); ?>userss');
 }, 10000)
</script> -->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <!-- <li class="breadcrumb-item active">Default </li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <!-- <div class="col-xl-8 col-lg-12 xl-100 morning-sec box-col-12" <?= $hid; ?>>
                <div class="card o-hidden profile-greeting">
                    <div class="card-body">
                        <div class="media">
                            <div class="badge-groups w-100">
                                <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span>
                                </div>
                                <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                            </div>
                        </div>
                        <div class="greeting-user text-center">
                            <div class="profile-vector"><img class="img-fluid rounded-circle" src="<?= base_url(); ?>/_uploads/f_usr/<?= $foto; ?>"
                                    alt="" width="118"></div>
                            <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i
                                        class="fa fa-check-circle f-14 middle"></i></span></h4>
                            <p><span>Hai <span style="color: yellow;"><?= $_SESSION['nama'];?></span>, Selamat datang dihalaman Sistem Pendataan Bus
                                    Vaksinasi Dinas Perhubungan Kota Pekanbaru, Silahkan Inputkan Data
                                    Vaksinasi...</span></p>
                            <div class="whatsnew-btn"><a href="<?= base_url(); ?>layanan/add" class="btn btn-primary">Inputkan Data.</a></div>
                            <div class="left-icon"><i class="fa fa-bell"> </i></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Alert State</h5>
                  </div>
                  <div class="card-body btn-showcase">
                    <button class="btn btn-success sweet-8" type="button" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-8']);">Success</button>
                    <button class="btn btn-danger sweet-7" type="button" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-7']);">Danger</button>
                    <button class="btn btn-info sweet-9" type="button" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-9']);">Information</button>
                    <button class="btn btn-warning sweet-6" type="button" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-6']);">Warning</button>
                    <button class="third">Title, Text and Icon</button>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>