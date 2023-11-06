<?php

namespace App\Controllers;
use Ramsey\Uuid\Uuid;
class CartController extends BaseController
{
    public function cartnull(){
        $data=[
            'title' => 'Cart',
        ];
        return view('User/Dashboard/cart-null',$data);
    }
    public function Cart()
    {
        $keranjang = $this->cart
            ->select("*, cart.created_at as tglbuat, cart.uniksesi as id, cart.id as id_cart")
            ->join('users', 'users.user_id = cart.id_user')
            ->join('produk', 'produk.id = cart.id_produk')
            ->join('sub_kategori', 'produk.id_sub = sub_kategori.id')
            ->orderBy('cart.created_at', 'DESC')
            ->where('unikSesi', $this->sesi->get('unikSesi'))
            ->get()
            ->getResult();

        if ($keranjang == null) {
            $this->sesi->setFlashdata('error', 'Data keranjang kosong');
            return redirect()->to('/cart-null');
        }

        // Use an associative array to store unique products based on their IDs
        $uniqueProducts = [];
        foreach ($keranjang as $item) {
            $productId = $item->id_produk;
            if (!isset($uniqueProducts[$productId])) {
                // If the product ID is not in the $uniqueProducts array, add it
                $uniqueProducts[$productId] = $item;
            }
        }

        // Convert the associative array back to indexed array for the view
        $uniqueProductList = array_values($uniqueProducts);

        $data = [
            'title' => 'Cart',
            'keranjang' => $uniqueProductList,
        ];

        return view('User/Dashboard/Cart', $data);

    
    }
    public function getCost(){
        $keranjang = $this->cart->select("*, cart.created_at as tglbuat, cart.uniksesi as id, cart.id as id_cart")
            ->join('users', 'users.user_id = cart.id_user')
            ->join('produk', 'produk.id = cart.id_produk')
            ->join('sub_kategori', 'produk.id_sub = sub_kategori.id')
            ->orderBy('cart.created_at', 'DESC')
            ->where('unikSesi', $this->sesi->get('unikSesi'))
            ->get()
            ->getResult();

        $hargaOngkirArray = []; 

        $dataDestination = $this->users->where('user_id', $this->sesi->get('user_id'))->join('profile', 'profile.userid = users.user_id')->first();
        $alamatUser = $dataDestination->city_id;
        $origin = $alamatUser;

        foreach ($keranjang as $value) {
            $destination = $value->city_id;

            $curl = curl_init();

            $beratProduk = $value->beratProduk; 
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=$origin&originType=city&destination=$destination&destinationType=city&weight=$beratProduk&courier=jne",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded",
                    "key: c67ed53549e1a64231849d3fad745ca7"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if (!$err) {

                $responseArray = json_decode($response, true);
                $ongkir = $responseArray['rajaongkir']['results'][0]['costs'];


                $hargaOngkirArray[] = $ongkir;
            }
        }


        return $this->response->setJSON(['hargaOngkir' => $hargaOngkirArray]);








        
        
            
    }
    


    public function deletecart($id_cart){
        $this->cart->delete($id_cart);
        $this->sesi->setFlashdata('sukses-hapus', 'Data berhasil dihapus');
        return redirect()->to('/keranjang');
    }

    public function svcheckout(){

        $request = $this->request->getJSON(); 
        $checkoutItems = $request->checkoutItems;
        $uuid = Uuid::uuid4();
        $userId = $this->sesi->get('user_id');
        $user = $this->users->where('user_id', $userId)->first();
        $itemsToSave = []; 

        foreach ($checkoutItems as $item) {
            $data = [
                'id_cart' => $item->id_cart,
                'id_checkout' => $uuid->toString(),
                'id_produk' => $item->id_produk,
                'qty' => $item->quantity,
                'amount' => $item->price,
                'id_user' => $user->user_id,
                'biayaOngkir' => $item->biayaOngkir
            ];

            $produk_id = $item->id_produk;
            $jumlah_pembelian = $item->quantity;

            $produk = $this->produk->where('id', $produk_id)->first();
            $qty = $this->produk->where('id_produk', $produk_id)->join('produk_detail', 'produk.id = produk_detail.id_produk')->first();

            if ($produk) {
                $stok_produk = $qty->stok;

                if ($stok_produk >= $jumlah_pembelian) {
                    $stok_baru = $stok_produk - $jumlah_pembelian;
                    $datacek = [
                        'id' => $qty->id,
                        'stok' => $stok_baru
                    ];
                    $this->produk_detail->save($datacek);


                    $itemsToSave[] = $data;
                } else {
                    return $this->response->setJSON(['error' => 'Stok tidak cukup untuk pembelian ini.']);
                }
            } else {
                return $this->response->setJSON(['error' => 'Produk tidak ditemukan.']);
            }
        }

  
        $this->checkout->insertBatch($itemsToSave);

        return $this->response->setJSON(['message' => 'Checkout items saved successfully', 'data' => $uuid->toString()]);


        


       
        

   
    }  
}
