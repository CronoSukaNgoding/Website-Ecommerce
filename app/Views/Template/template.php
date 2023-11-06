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

    <link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css">
    <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> 
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- <script src="/assets/libs/jquery/jquery.min.js"></script> -->
<script href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
<script href="https://code.jquery.com/jquery-3.7.0.js"></script>

    
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
        width: 150px; 
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
         $('#tampilProduk').load("seeCart", function () {
            var itemLi = $('.', this).length;
            if (itemLi > 0) {
                $('#jumlahItem').html(itemLi);
            } else {
                $('#jumlahItem').html(itemLi);
                var $default = $(
                    '<div class="p-2 border-top d-grid">'
                        '<a class="btn btn-sm btn-link font-size-14 text-center" href="'. base_url('checkout') . '">'
                            '<i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">Checkout</span> 
                        '</a>'
                    '</div>''
                );
                $('#tampilProduk').append($default);
            }
        });
    </script>
</body>