
<!doctype html>
<html lang="en">

<head>
        
        <meta charset="utf-8" />
        <title>Register</title>
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
                                            <h5 class="text-warning">Register account</h5>
                                            <p class="text-muted">Registrasi dan mulai berbelanja di Luxo Mall</p>
                                            <?php if(session()->getFlashData("sukses")): ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <?=session()->getFlashData("sukses")?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php elseif(session()->getFlashData("hapus")): ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <?=session()->getFlashData("hapus")?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php elseif(session()->getFlashData("error")): ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <?php
                                                        $errors = session()->getFlashData("error");

                                                        // Iterate over the errors and display them
                                                        foreach ($errors as $field => $error) {
                                                            echo esc($error) . '<br>';
                                                        }
                                                        ?>

                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                            <?php endif; ?>
                                        </div>
            
                                        <div class="mt-4">
                                            <form class="needs-validation" action="" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                                <div class="mb-3">
                                                    <label for="fullname" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan nama lengkap" required>
                                                    <div class="invalid-feedback">
                                                        Mohon masukkan Nama Lengkap
                                                    </div>  
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>  
                                                    <div class="invalid-feedback">
                                                        Mohon masukkan Email
                                                    </div>        
                                                </div>
                        
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                                                    <div class="invalid-feedback">
                                                        Mohon masukkan Username
                                                    </div>  
                                                </div>
                        
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukka password" required>
                                                    <div class="invalid-feedback">
                                                        Mohon masukkan Password
                                                    </div>       
                                                </div>

                                               


                                                
                                                
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-warning waves-effect waves-light" type="submit">Daftar</button>
                                                </div>

                                            </form>

                                            <div class="mt-5 text-center">
                                                <p>Sudah memiliki akun ? <a href="<?= Base_url("/masuk")?>" class="fw-medium text-warning"> Login</a> </p>
                                            </div>
        
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> LuxoMall</p>
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
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>
        

        <!-- owl.carousel js -->
        <script src="/assets/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- validation init -->
        <script src="/assets/js/pages/validation.init.js"></script>

        <!-- auth-2-carousel init -->
        <script src="/assets/js/pages/auth-2-carousel.init.js"></script>
         
        <!-- App js -->
        <script src="/assets/js/app.js"></script>

       

        




    </body>
</html>
