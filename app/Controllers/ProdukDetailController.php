<?php

namespace App\Controllers;
use Ramsey\Uuid\Uuid;

class ProdukDetailController extends BaseController
{
    public function index($id)
    {
        $cekdetail = $this->produk->select("*, produk.created_at as tglbuat, produk.id as id,GROUP_CONCAT(groupphotoproduk.photo_produk) AS daftar_foto")
        ->join('produk_detail', 'produk_detail.id_produk = produk.id')
        ->join('kategori' ,'kategori.id = produk.id_kategori')
        ->join('sub_kategori' ,'sub_kategori.id = produk.id_sub')
        ->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')
        ->orderBy('produk.created_at', 'DESC')
        ->where('produk.id', $id)->first();
        $komentar = $this->komentar->select('komentar.updated_at as tglBuat, fullname,avatar,komentar')->join('users','users.user_id = komentar.userid','left')->where('produk_id',$id)->get()->getResult();
        $peringkat = $this->rating->join('users','users.user_id = peringkat_produk.userid')->where('produk_id',$id)->get()->getResult();
        $daftarFotoArray = explode(',', $cekdetail->daftar_foto);
        $linkaddress = $cekdetail->link_address;
        $daftarFotoArray[] = $linkaddress;
        $data = [
            'id' => $id,
            'title' => 'Detail Produk',
            'result' => $cekdetail,
            'daftar_foto' => $daftarFotoArray,
            'komentar' => $komentar,
            'rating'=>$peringkat
        ];
        // dd($data);

        return view('User/Dashboard/produk-detail', $data);
    }

    public function svcart(){
        $request = service('request');
        $productId = $request->getPost('id');
        $uuid = Uuid::uuid4();
        $userId = $this->sesi->get('user_id');
        $user = $this->users->where('user_id', $userId)->first();
        $cekdetail = $this->produk->select("*, produk.created_at as tglbuat, produk.id as id")->join('produk_detail', 'produk_detail.id_produk = produk.id')->
        join('kategori' ,'kategori.id = produk.id_kategori')->join('sub_kategori' ,'sub_kategori.id = produk.id_sub')->
        orderBy('produk.created_at', 'DESC')->where('produk.id', $productId)->get()->getResult();
        $cekproduk = $this->produk->where('id',$productId)->first();
        $dataToko = $this->toko->where('id',$cekproduk->toko_id)->first();
        if($user==true){
            $dataCart = [
                'uniksesi' => $this->sesi->get('unikSesi'),
                'id_user' => $user->user_id,
                'id_produk' => $productId,
                'result' => $cekdetail,
                'province_id'=>$dataToko->province_id,
                'city_id'=>$dataToko->city_id
            ];
        }else{
            $dataCart = [
                'uniksesi' => $uuid->toString(),
                'id_user' => 0,
                'id_produk' => $productId,
                'result' => $cekdetail,
                'province_id'=>$dataToko->province_id,
                'city_id'=>$dataToko->city_id
            ];
        }
        


        try {
            $cekCart = $this->cart->where('id_produk', $productId)->where('id_user', $this->sesi->get('user_id'))->first();
            if($cekCart){
                $response = [
                    'message' => "Produk ini sudah ada di cart. Jika ingin menambah quantity, silahkan menambah di keranjang!!!"
                ];
                return $this->response->setJSON($response);
            }else{
                $update = $this->cart->insert($dataCart);
             
                $response = [
                        'message' => "Berhasil menambah keranjang :)"
                ];
                return $this->response->setJSON($response);
            }
            
        } catch (\Exception $e) {
         $e->getMessage();
        }
    }
    public function getCart(){
        $id = $this->sesi->get('unikSesi');
        $dataCart = $this->cart->where('unikSesi', $id)->get()->getResult(); 
        
        $output = [];
        $totalHarga = 0;
        
        if (!empty($dataCart)) {
            foreach ($dataCart as $listData) {
                $produk = $this->produk->select('*,produk.id as idProduk, GROUP_CONCAT(DISTINCT groupphotoproduk.photo_produk) AS daftar_foto')->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')->where('produk.id', $listData->id_produk)
                ->first(); 
        
                if ($produk) {
                    $totalHarga += $produk->harga_produk;
                    // Use explode() instead of split()
                    $daftar_foto = explode(',', $produk->daftar_foto);
                    
                    // Access the first element of the array
                    $firstPhoto = isset($daftar_foto[0]) ? $daftar_foto[0] : null;
                    $output[] = [
                        'nama_produk' => $produk->nama_produk,
                        'harga_produk' => $produk->harga_produk,
                        'photo_produk'=> $firstPhoto
                    ];
                }
            }
        }
    
        $response = [
            'output' => $output,
            'totalHarga' => $totalHarga,
        ];
    
        return $this->response->setJSON($response);
    }
    
}