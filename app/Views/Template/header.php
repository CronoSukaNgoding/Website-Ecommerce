
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box d-flex d-none d-lg-inline-block align-items-center">
                <a href="<?=base_url("dashboard")?>" class="d-flex align-items-center">
                    <img src="<?=base_url()?>assets/images/cok/Frame 29.svg" width="50" height="50" alt="">
                    <h2 class="ml-2 mb-0">Muhasabah Custom</h2>
                </a>
            </div>
            <?php if ($_SESSION['role'] == 1) : ?>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <?php endif ?>

        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block header-search">
                <input type="text"  id="searchInput" placeholder="Cari...">
                <button onclick="search()"type="button" class="btn header-item noti-icon waves-effect" id="page-header-cart-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="bx bx-search-alt"></span>Cari</button>
                
                <div id="searchResults" class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-cart-dropdown">
                    <!-- Hasil pencarian akan ditampilkan di sini -->
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-cart-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge bg-danger rounded-pill" id="jumlahItem"></span>
                </button>
                <!-- Cart dropdown menu -->
                <div id="keranjang-container" class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-cart-dropdown">
                    <!-- Isi keranjang akan ditampilkan di sini -->
                </div>

            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url('user/avatar/'.session()->get('avatar'))?>"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?= session()->get('username')?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= base_url('profile/'.session()->get('user_id'))?>"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                    <?php if ($_SESSION['role'] == 2) : ?>
                    <a class="dropdown-item" href="<?=base_url("data-pembayaran")?>"><i class="bx bx-dollar-circle font-size-16 align-middle me-1"></i> <span key="t-profile">Pesanan</span></a>
                    <a class="dropdown-item" href="<?=base_url("data-pengiriman")?>"><i class="bx bxs-truck font-size-16 align-middle me-1"></i> <span key="t-profile">Pengiriman</span></a>
                    <a class="dropdown-item" href="<?=base_url("review")?>"><i class="bx bx-star font-size-16 align-middle me-1"></i> <span key="t-profile">Review</span></a>
                    <?php endif?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?=base_url("logout")?>"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                </div>
            </div>

        </div>
    </div>
</header>