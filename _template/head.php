<!-- /**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/ -->

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
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/aos.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/scrollable.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/simple-mde.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/select2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/timepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/datatable-extension.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/owlcarousel.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/animate.css"> -->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url(); ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/responsive.css">
    <!-- afterglowplayer -->
    <script src="//cdn.jsdelivr.net/npm/afterglowplayer@1.x"></script>
    <!-- CKEditor -->
    <script src="<?= base_url(); ?>vendor/ckeditor/ckeditor.js">
    var data = CKEDITOR.instances.editor1.getData();
    </script>
    <style type="text/css">
    #idletimeout {
        background: #f6ba00;
        border: 3px solid #ff6500;
        color: #000;
        font-family: 'Rubik', sans-serif;
        text-align: center;
        font-size: 12px;
        padding: 10px;
        position: relative;
        top: 0px;
        left: 0;
        right: 0;
        z-index: 100000;
        display: none;
    }

    #idletimeout a {
        color: #1f2bff;
        font-weight: bold;
    }

    #idletimeout span {
        font-weight: bold, ;
    }
    </style>
    <style type="text/css">
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>
    <style type="text/css">
        .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
        }
        .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
        }
    </style>
    <script type="text/javascript">
    //script preloader
    (function( $ ) {   
        $(window).on('load', function(){
        $('#preloader').fadeOut('2000',function(){
                $(this).hide();
            });
        });

        })(jQuery);

    //slow bisa diganti dengan angka misal 2000 
  </script>

    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/examples.css" /> -->
</head>