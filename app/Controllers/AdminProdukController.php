<?php

namespace App\Controllers;
use Ramsey\Uuid\Uuid;
class AdminProdukController extends BaseController
{
    public function index()
    {
        $cekproduk = $this->produk->select("*, produk.created_at as tglbuat, produk.id as produk")
        ->join('produk_detail', 'produk_detail.id_produk = produk.id')
        ->join('kategori' ,'kategori.id = produk.id_kategori')
        ->join('sub_kategori' ,'sub_kategori.id = produk.id_sub')->orderBy('produk.created_at', 'DESC')->get()->getResult();
        $data =[
            'title' => 'Data Produk',
            'produk' => $cekproduk,
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
        ];
        return view ('admin/list-produk',$data);
    
    }

    public function viewtambah(){
        $cekkategori = $this->kategori->get()->getResult();
        $ceksub = $this->kategori->join('sub_kategori', 'sub_kategori.id_kategori = kategori.id')->get()->getResult();
        $data =[
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'result' => $this->produk->getProduk(),
            'kategori' => $cekkategori,
            'subkategori' => $ceksub,  
            'isUri' => $this->request->uri,
            'title' => 'Tambah Produk',
        ];
        return view('admin/tambah-produk',$data);
    }
    
    public function svproduk()
    {
        $uuid = Uuid::uuid4();
        $photoproduk = $this->request->getFile('photo_produk');
        $nama_produk = $this->request->getVar('nama_produk');
        $extension = $photoproduk->getClientExtension();
        $sanitizedProduk = preg_replace('/[^a-zA-Z0-9\s]/', '', $nama_produk); 
        $sanitizedProduk = str_replace(' ', '-', $sanitizedProduk); 
        $namaphoto = $sanitizedProduk . '.' . $extension;
        
        $destinationPath = WRITEPATH . '../public/admin/produk/';
        $existingFile = $destinationPath . $namaphoto;
        
        if (is_file($existingFile)) {
            unlink($existingFile);
        }
        
        $photoproduk->move($destinationPath, $namaphoto);

        

        $cekData = $this->produk->where('nama_produk', $nama_produk)->first();
        if(!empty($cekData)){
            $this->sesi->setFlashdata('Gagal', 'Data sudah ada');
            return redirect()->to('/tambah-produk');
        }
        $harga = $this->request->getVar('harga_produk');
        $harga = str_replace(["Rp", ".", ","], "", $harga);
        $harga = (int) $harga;
        $cektoko = $this->toko->where('userid', $this->sesi->get('user_id'))->first();
        $dataProduk = [
            'id' => $uuid->toString(),
            'nama_produk' => $nama_produk,
            'harga_produk' => $harga,
            'id_kategori' => $this->request->getVar('kategori'),
            'id_sub' => $this->request->getVar('sub_kategori'),
            'kondisi' => $this->request->getVar('kondisi'),
            'photo_produk' => $namaphoto,
            'toko_id'=> $cektoko->id,
            'minPesanan'=>$this->request->getVar('minPesanan'),
            'beratProduk' =>  $this->request->getVar('beratProduk'), 
        ];
        try {
            $this->produk->insert($dataProduk);
            $cekData = $this->produk->where('nama_produk', $nama_produk)->first();

            $uuid2 = Uuid::uuid4();
            $dataDetail = [
                'id' => $uuid2->toString(),
                'id_produk' => $cekData->id,
                'keterangan' => $this->request->getVar('keterangan'),
                'stok' => $this->request->getVar('stok'),
                'link_address' =>  $this->request->getVar('link_address'), 
            ];
            $dataRating = [
                'produk_id' => $cekData->id,
                'userid'=>$this->sesi->get('user_id'),
                'peringkat'=> 0 ,
            ];
            $this->rating->insert($dataRating);
            $this->produk_detail->insert($dataDetail);
            $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
            return redirect()->to('/list-produk'); 
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

     public function deleteProduk($id)
    {   
        $cekdataDetail = $this->produk_detail->where('id_produk', $id);
        if(!empty($cekdataDetail)){
         
            $deleteDetail = $this->produk_detail->delete($cekdataDetail->id);
   
        }

        $cekdeleteProduk = $this->produk->delete($id);
        if($cekdeleteProduk!=false){
            $this->sesi->setFlashdata('sukses', 'Data berhasil dihapus');
            return redirect()->to('/list-produk');
        }else{
            $this->sesi->setFlashdata('gagal', 'Data gagal dihapus');
            return redirect()->to('/list-produk');
        }

    }
    
    public function viewupdate($id){
        $cekdetail = $this->produk->select("*, produk.created_at as tglbuat, produk.id as id")
        ->join('produk_detail', 'produk_detail.id_produk = produk.id')
        ->join('kategori', 'kategori.id = produk.id_kategori')
        ->join('sub_kategori', 'sub_kategori.id = produk.id_sub') 
        ->orderBy('produk.created_at', 'DESC')
        ->where('produk.id', $id)
        ->get()
        ->getResult();

        $cekkategori = $this->kategori->get()->getResult();
        $ceksub = $this->kategori->join('sub_kategori', 'sub_kategori.id_kategori = kategori.id')->get()->getResult();

       $data =[
           'id' => $id,
           'result' => $cekdetail,
            'title' => 'Update Produk',
           'kategori' => $cekkategori,
           'subkategori' => $ceksub, 
           'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
           'isUri' => $this->request->uri,
       ];
       
       return view ('admin/edit-produk',$data);
    }
    public function updateProduk($id)
    {   
        $photoproduk = $this->request->getFile('photo_produk');
        $cekphotolama = $this->produk->select('photo_produk')->where('id', $id)->get()->getRow();

        $dataProduk = [
            'id' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_produk' => $this->request->getVar('harga_produk'),
            'id_kategori' => $this->request->getVar('kategori'),
            'id_sub' => $this->request->getVar('sub_kategori'),
            'kondisi' => $this->request->getVar('kondisi'),
        ];

        if ($photoproduk->isValid() && !$photoproduk->hasMoved()) {           
            $nama_produk = $this->request->getVar('nama_produk');
            $extension = $photoproduk->getClientExtension();
            $sanitizedProduk = preg_replace('/[^a-zA-Z0-9\s]/', '', $nama_produk); 
            $sanitizedProduk = str_replace(' ', '-', $sanitizedProduk); 
            $namaphoto = $sanitizedProduk . '.' . $extension;
            
            $destinationPath = WRITEPATH . '../public/admin/produk/';
            $existingFile = $destinationPath . $namaphoto;
            
            if (is_file($existingFile)) {
                unlink($existingFile);
            }
            

            $photoproduk->move($destinationPath, $namaphoto);
            
            $dataProduk = [
                'id' => $id,
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga_produk' => $this->request->getVar('harga_produk'),
                'id_kategori' => $this->request->getVar('kategori'),
                'id_sub' => $this->request->getVar('sub_kategori'),
                'kondisi' => $this->request->getVar('kondisi'),
                'photo_produk' => $namaphoto,
            ];
        } else {
            if (!empty($cekphotolama)) {
                $dataProduk['photo_produk'] = $cekphotolama->photo_produk;
            } else {
                $dataProduk['photo_produk'] = 'default.jpg';
            }
        }
        try {
            $produkData = $this->produk->where('id', $id)->first();

            if (!empty($produkData)) {
                $this->produk->update($id, $dataProduk);
                $cekData = $this->produk_detail->where('id_produk', $id)->first();

                $dataDetail = [
                    'id_produk' => $id,
                    'keterangan' => $this->request->getVar('keterangan'),
                    'stok' => $this->request->getVar('stok'),
                     'link_address' =>  $this->request->getVar('link_address'), 
                ];

                if (!empty($cekData)) {
                    $this->produk_detail->update($cekData->id, $dataDetail);
                } else {
                    $this->produk_detail->insert($dataDetail);
                }

                $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
                return redirect()->to('/list-produk');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}