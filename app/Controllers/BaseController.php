<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UsersModel;
use App\Models\ProdukModel;
use App\Models\ProdukDetailModel;
use App\Models\KategoriModel;
use App\Models\SubKategoriModel;
use App\Models\CartModel;
use App\Models\UsersProfilModel;
use App\Models\CheckoutModel;
use App\Models\PrePaymentModel;
use App\Models\PaymentModel;
use App\Models\StatusModel;
use App\Models\ProvinsiModel;
use App\Models\KotaModel;
use App\Models\TokoModel;
use App\Models\KurirModel;
use App\Models\SendingModel;
use App\Models\RatingModel;
use App\Models\KomentarModel;
use App\Models\groupPhotoProdukModel;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    public function __construct()
    {
        $this->response = service('response');
        $this->valid = \Config\Services::validation();
        $this->users = new UsersModel();
        $this->produk = new ProdukModel();
        $this->kategori = new KategoriModel();
        $this->sub_kategori = new SubKategoriModel();
        $this->produk_detail = new ProdukDetailModel();
        $this->cart = new CartModel();
        $this->usersprofil = new UsersProfilModel();
        $this->checkout = new CheckoutModel();
        $this->PrePayment = new PrePaymentModel();
        $this->Payment = new PaymentModel();
        $this->sesi = session();
        $this->status = new StatusModel();
        $this->provinsi = new ProvinsiModel();
        $this->kota = new KotaModel();
        $this->toko = new TokoModel();
        $this->kurir = new KurirModel();
        $this->sending = new SendingModel();
        $this->rating = new RatingModel();
        $this->komentar = new KomentarModel();
        $this->photoproduk = new groupPhotoProdukModel();
    }
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
