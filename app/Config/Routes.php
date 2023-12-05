<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'AuthController::Login');
$routes->post('/', 'AuthController::cekLogin');
//Auth Login
$routes->get('/masuk', 'AuthController::Login');
$routes->post('/masuk', 'AuthController::cekLogin');
$routes->get('/logout', 'AuthController::Logout');

//daftar
$routes->get('/register', 'DaftarController::index');
$routes->post('/register', 'DaftarController::Register');

//Lupa Password
$routes->get('/forgot-password', 'ResetPassword::index');
$routes->post('forgot_password/reset_password', 'ForgotPassword::reset_password');
$routes->get('reset-password/(:segment)', 'ResetPassword::index/$1');
$routes->post('reset_password/update_password', 'UpdatePassword::update_password');

//profil
$routes->get('/profile/(:any)', 'ProfileController::index/$1');
$routes->post('/profile/updateprofil/(:any)', 'ProfileController::settingProfil/$1');

//Dashboard User
$routes->get('/keranjang', 'CartController::Cart',['filter' => 'role:admin,user']);
$routes->get('/checkout/(:any)', 'CheckoutController::Checkout/$1',['filter' => 'role:admin,user']);

//Admin Produk
$routes->get('/tambah-produk', 'AdminProdukController::viewtambah',['filter' => 'role:admin']);
$routes->post('produk/tambah', 'AdminProdukController::svproduk',['filter' => 'role:admin']);
$routes->get('/edit-produk/(:any)', 'AdminProdukController::viewupdate/$1',['filter' => 'role:admin']);
$routes->post('edit-produk/edit/(:any)', 'AdminProdukController::updateProduk/$1',['filter' => 'role:admin']);
$routes->post('produk/delete/(:any)', 'AdminProdukController::deleteproduk/$1',['filter' => 'role:admin']);
$routes->get('/list-produk', 'AdminProdukController::index',['filter' => 'role:admin']);
$routes->get('/produk-detail/(:any)', 'ProdukDetailController::index/$1',['filter' => 'role:admin,user']);


// Admin Kategori
$routes->get('/list-kategori', 'AdminKategoriController::index',['filter' => 'role:admin']);
$routes->post('kategori/tambah', 'AdminKategoriController::svkategori',['filter' => 'role:admin']);
$routes->post('kategori/tambah-sub', 'AdminKategoriController::svsubkategori',['filter' => 'role:admin']);
$routes->post('kategori/editkategori/(:any)', 'AdminKategoriController::updateKategori/$1',['filter' => 'role:admin']);
$routes->post('kategori/editsub/(:any)', 'AdminKategoriController::updateSub/$1',['filter' => 'role:admin']);
$routes->post('kategori/delete/(:any)', 'AdminKategoriController::deleteKategori/$1',['filter' => 'role:admin']);
$routes->post('kategori/sub/delete/(:any)', 'AdminKategoriController::deleteSubKategori/$1',['filter' => 'role:admin']);



// Dashboard
$routes->get('/dashboard', 'DashboardController::index',['filter' => 'role:admin,user']);

//cart
$routes->get('/cart-null', 'CartController::cartnull',['filter' => 'role:admin,user']);
$routes->post('/cart', 'ProdukDetailController::svcart',['filter' => 'role:admin,user']);
$routes->get('/seeCart', 'ProdukDetailController::getCart',['filter' => 'role:admin,user']);
$routes->get('cart/get-cart-item-count', 'CartController::getCartItemCount',['filter' => 'role:admin,user']);
$routes->post('cart/delete/(:any)', 'CartController::deletecart/$1',['filter' => 'role:admin,user']);
$routes->get('cart/get-cart-item-count', 'CartController::getCartItemCount',['filter' => 'role:admin,user']);
$routes->get('/test', 'TestController::index',['filter' => 'role:admin,user']);
$routes->get('cart/get-cart-item-count', 'CartController::getCartItemCount',['filter' => 'role:admin,user']);
$routes->post('cart/delete/(:any)', 'CartController::deletecart/$1',['filter' => 'role:admin,user']);

//checkout
$routes->post('checkout/save', 'CartController::svcheckout',['filter' => 'role:admin,user']);
$routes->post('checkout/pre-payment', 'CheckoutController::svprepayment',['filter' => 'role:admin,user']);
$routes->post('checkout/del/(:any)', 'CartController::delcheckout/$1',['filter' => 'role:admin,user']);

//payment
$routes->get('payment/(:any)', 'PaymentController::Payment/$1',['filter' => 'role:admin,user']);
$routes->post('payment/save', 'PaymentController::svpayment',['filter' => 'role:admin,user']);
$routes->post('payment/del/(:any)', 'PaymentController::delPayment/$1',['filter' => 'role:admin,user']);
//data pesanan
$routes->get('/data-pesanan', 'DataPesananController::index',['filter' => 'role:admin']);
$routes->get('/data-pembayaran', 'DataPembayaranController::index',['filter' => 'role:admin,user']);
$routes->get('/data-pembayaran/(:any)', 'DataPembayaranController::editPembayaran/$1',['filter' => 'role:admin']);
$routes->post('/pembayaran/edit/(:any)', 'DataPembayaranController::simpanPembayaran/$1',['filter' => 'role:admin']);
$routes->post('/hapus-data-pembayaran/(:any)', 'DataPembayaranController::delPembayaran/$1',['filter' => 'role:admin']);

//data pengiriman
$routes->get('/data-pengiriman', 'DataPengirimanController::index',['filter' => 'role:admin,user']);
$routes->get('/data-pengiriman/(:any)', 'DataPengirimanController::editPengiriman/$1',['filter' => 'role:admin']);
$routes->get('/data-pengiriman-user/(:any)', 'DataPengirimanController::viewUser/$1',['filter' => 'role:user']);
$routes->post('/pengiriman/edit/(:any)', 'DataPengirimanController::simpanPengiriman/$1',['filter' => 'role:admin']);
$routes->post('/pengiriman/edit-user/(:any)', 'DataPengirimanController::editPengirimanUser/$1',['filter' => 'role:user']);

//review
$routes->get('/review', 'RatingController::Listreview',['filter' => 'role:admin,user']);
$routes->get('/review/(:any)', 'RatingController::editReview/$1',['filter' => 'role:admin,user']);
$routes->post('/review/edit/(:any)', 'RatingController::simpanReview/$1',['filter' => 'role:admin,user']);

//data toko
$routes->get('/data-toko/(:any)', 'TokoController::index/$1',['filter' => 'role:admin']);
$routes->post('/data-toko/(:any)', 'TokoController::svToko/$1',['filter' => 'role:admin']);

//Filter
//get data kota
$routes->get('/get-kota-by-provinsi', 'DaftarController::getKotaByProvinsi');
//get cost
$routes->post('/cost', 'CartController::getCost');
//get kategori
$routes->get('/get-kategori', 'getKategori::getKat');
$routes->get('/get-sub-kategori', 'getKategori::getSubKat');

//search
$routes->get('/search', 'getKategori::search');

//get product
$routes->get('/get-product', 'getKategori::getProduct');

//laporan
$routes->get('/laporan', 'Laporan::index');
$routes->get('/ajax-laporan', 'Laporan::getLaporan');

//AJAX Generate Table

//pesanan
$routes->get('/ajax-pesanan', 'DataPesananController::getPesanan');

//pembayaran
$routes->get('/ajax-pembayaran-admin', 'DataPembayaranController::getPayAdmin');
$routes->get('/ajax-pembayaran-user', 'DataPembayaranController::getPayUser');

$routes->get('/ajax-pengiriman-admin', 'DataPengirimanController::getSendAdmin');
$routes->get('/ajax-pengiriman-user', 'DataPengirimanController::getSendUser');

$routes->get('/ajax-review', 'RatingController::ajaxReviewUser');
//rating
$routes->get('/rating', 'RatingController::index',['filter' => 'role:admin']);
$routes->get('/ajax-rating', 'RatingController::getRating',['filter' => 'role:admin']);








/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
