<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title> Dashboard | <?=$title?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">


    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Edit Css -->
    <link href="/assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- datepicker css -->
    <link href="/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- ION Slider -->
    <link href="/assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css"/>

    <link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/libs/%40chenfengyuan/datepicker/datepicker.min.css">
    <link href="/assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- tui charts Css -->
    <link href="/assets/libs/tui-chart/tui-chart.min.css" rel="stylesheet" type="text/css" />

    <!-- select2 css -->
    <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->

    <!-- <link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css"> -->
    <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> 
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- <script src="/assets/libs/jquery/jquery.min.js"></script> -->
<script href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
<script href="https://code.jquery.com/jquery-3.7.0.js"></script>

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="73b1adaf-77bc-43ce-a938-3d450b49eb6e";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
    
    <?php $this->renderSection('css');?>
    
    <style>
        /* CSS Loader Styles */
.loader-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    

}
.loader-p{
    color: white; /* Warna teks */
    font-size: 16px; /* Ukuran teks */
    margin-left : -85px;
    margin-top:98px;
}

.loader {
    border: 6px solid #f3f3f3;
    border-top: 6px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1.5s linear infinite;
    border-left-color: transparent;
    border-bottom-color: transparent;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}


    </style>
<style>
    .header-search {
        position: relative;
        display: inline-block;
    }
    .header-search input[type="text"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
        width: 130px; 
    }
</style>
<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: ltr; /* Ubah arah dari kiri ke kanan */
    }

    .rating > span {
        display: inline-block;
        position: relative;
        width: 1em;
    }

    .rating > span:hover:before,
    .rating > span:hover ~ span:before {
        content: "\2605";
        position: absolute;
    }
</style>
<style>
    .fa fa-star-filled {
    color: yellow; /* Ganti dengan warna kuning yang Anda inginkan, misalnya 'yellow' atau '#FFD700' */
}

</style>
     


</head>

<body data-topbar="light" data-layout="horizontal">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?= $this->include('Template/header'); ?>
         <?php if ($_SESSION['role'] == 1) : ?>
            <?= $this->include('Template/topnav'); ?>
        <?php endif ?>
    
        <div class="main-content ">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    
                    <!-- end page title -->
                    <?= $this->renderSection('IsKonten') ?>
                    <?= $this->include('Template/footer'); ?>
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page content -->
        </div>
        <!-- End Page-content -->
    </div>
    <?= $this->include('Template/library'); ?>
    <script>
        var _0x3a1efd=_0x4ce1;(function(_0x2385a6,_0x162312){var _0x5e9ba5=_0x4ce1,_0x2e0862=_0x2385a6();while(!![]){try{var _0x199771=parseInt(_0x5e9ba5(0x19e))/0x1+-parseInt(_0x5e9ba5(0x1aa))/0x2+-parseInt(_0x5e9ba5(0x1a9))/0x3*(-parseInt(_0x5e9ba5(0x197))/0x4)+parseInt(_0x5e9ba5(0x1a1))/0x5+parseInt(_0x5e9ba5(0x1a7))/0x6*(parseInt(_0x5e9ba5(0x19a))/0x7)+-parseInt(_0x5e9ba5(0x19b))/0x8*(-parseInt(_0x5e9ba5(0x1a3))/0x9)+-parseInt(_0x5e9ba5(0x199))/0xa*(parseInt(_0x5e9ba5(0x1a0))/0xb);if(_0x199771===_0x162312)break;else _0x2e0862['push'](_0x2e0862['shift']());}catch(_0x157b06){_0x2e0862['push'](_0x2e0862['shift']());}}}(_0x1885,0x350e7));var baseUrl=base_url(_0x3a1efd(0x1a5));$(_0x3a1efd(0x19f))['load'](_0x3a1efd(0x1a4),function(){var _0x3e7794=_0x3a1efd,_0x131b47=$('.',this)[_0x3e7794(0x1a2)];if(_0x131b47>0x0)$(_0x3e7794(0x19c))[_0x3e7794(0x19d)](_0x131b47);else{$(_0x3e7794(0x19c))['html'](_0x131b47);var _0x4c3855=$(_0x3e7794(0x1a6)+_0x3e7794(0x1a8)+baseUrl+'\x22>'+'<i\x20class=\x22mdi\x20mdi-arrow-right-circle\x20me-1\x22></i>\x20<span\x20key=\x22t-view-more\x22>Checkout</span>'+'</a>'+_0x3e7794(0x198));$('#tampilProduk')[_0x3e7794(0x196)](_0x4c3855);}});function _0x4ce1(_0x648286,_0x1db737){var _0x1885aa=_0x1885();return _0x4ce1=function(_0x4ce1db,_0x41057c){_0x4ce1db=_0x4ce1db-0x196;var _0x19f988=_0x1885aa[_0x4ce1db];return _0x19f988;},_0x4ce1(_0x648286,_0x1db737);}function _0x1885(){var _0x147e58=['append','4XOWOOB','</div>','10EDHqro','12817ueZeSh','8376IRFaKS','#jumlahItem','html','259383lYdwaC','#tampilProduk','4310977oYgNmA','223265LgvVtD','length','1863JTTbTV','seeCart','checkout','<div\x20class=\x22p-2\x20border-top\x20d-grid\x22>','1128IqkAkE','<a\x20class=\x22btn\x20btn-sm\x20btn-link\x20font-size-14\x20text-center\x22\x20href=\x22','269157KJifIw','690972AHHlQw'];_0x1885=function(){return _0x147e58;};return _0x1885();}

    </script>
</body>