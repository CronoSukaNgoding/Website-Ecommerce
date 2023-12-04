
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2022 04:11:03 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="/assets/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="/assets/libs/owl.carousel/assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        
    </head>

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 background-login">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center"> 
                                        <a href="<?= base_url('/dashboard') ?>" class="d-block auth-logo">
                                            <img src="<?=base_url()?>assets/images/cok/Frame 29.svg" alt="" class="mx-auto">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-warning">Selamat Datang</h5>
                                            <p class="text-muted">Masuk Sekarang!</p>
                                        </div>
                                       
                                        <div class="mt-4">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                                </div>
                        
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                     
                                                </div>
                        

                                                
                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-warning waves-effect waves-light" type="submit">Masuk</button>
                                                </div>
                                                <div class="mt-3 float-end">
                                                        <a href="<?= Base_url("/forgot-password")?>" class="text-muted">Lupa password?</a>
                                                    </div>

                                            </form>
                                            <div class="mt-5 text-center">
                                                <p>Belum memiliki akun ? <a href="<?= Base_url("/register")?>" class="fw-medium text-warning"> Daftar sekarang </a> </p>
                                            </div>
                                            <div class="mt-4 mt-md-5 text-center">
                                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Muhasabah Custom</p>
                                            </div>
                                        </div>
                                    </div>

                                
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- owl.carousel js -->
        <script src="assets/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- auth-2-carousel init -->
        <script src="assets/js/pages/auth-2-carousel.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>


</html>
