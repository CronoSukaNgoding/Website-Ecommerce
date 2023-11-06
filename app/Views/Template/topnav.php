

    <div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                
                   
                         <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("list-produk")?>" id="topnav-uielement" role="button"
                        >
                            <i class="fas fa-wallet me-2"></i>
                            <span key="t-ui-elements"> Data Barang</span> 
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("list-kategori")?>" id="topnav-pages" role="button"
                        >
                            <i class="fas fa-store me-2"></i><span key="t-apps"> Data Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("data-pesanan")?>" id="topnav-pages" role="button"
                        >
                            <i class="fas fa-paper-plane"></i><span key="t-apps"> Data Pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("data-pembayaran")?>" id="topnav-pages" role="button"
                        >
                            <i class="far fa-money-bill-alt me-2"></i><span key="t-apps"> Data Pembayaran</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("data-pengiriman")?>" id="topnav-pages" role="button"
                        >
                            <i class="fas fa-truck me-2"></i><span key="t-apps"> Data Pengiriman</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("data-toko/".$_SESSION['user_id'])?>" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-store"></i></i><span key="t-apps"> Data Toko</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("laporan")?>" id="topnav-pages" role="button"
                        >
                            <i class="bx bx-spreadsheet"></i></i><span key="t-apps"> Laporan</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="<?=base_url("rating")?>" id="topnav-pages" role="button"
                        >
                            <i class=" bx bx-star"></i></i><span key="t-apps"> Rating</span>
                        </a>
                    </li>
                   
                    
                    
                </ul>
            </div>
        </nav>
    </div>
</div>
