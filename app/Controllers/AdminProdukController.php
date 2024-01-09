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
        $ceksub = $this->sub_kategori->get()->getResult();
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
        $photoproduk = $this->request->getFiles('photo_produk');
        $nama_produk = $this->request->getVar('nama_produk');
        
        

        

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
            'toko_id'=> $cektoko->id,
            'minPesanan'=>$this->request->getVar('minPesanan'),
            'beratProduk' =>  $this->request->getVar('beratProduk'), 
        ];
        try {
            $this->produk->insert($dataProduk);
            $cekData = $this->produk->where('nama_produk', $nama_produk)->first();

        //    dd($cekData);
            $dataDetail = [
                'id' => $uuid->toString(),
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
            $foto_produk_data = [];
            foreach ($photoproduk['photo_produk'] as $namaFile) {
                // Lakukan pemrosesan setiap nama file di sini
                $extension = $namaFile->getClientExtension();
                $sanitizedProduk = preg_replace('/[^a-zA-Z0-9\s]/', '', $nama_produk);
                $sanitizedProduk = str_replace(' ', '-', $sanitizedProduk);
                $namaphoto = $sanitizedProduk . '_' . uniqid() . '.' . $extension;

                $destinationPath = WRITEPATH . '../public/admin/produk/';
                $existingFile = $destinationPath . $namaphoto;

                if (is_file($existingFile)) {
                    unlink($existingFile);
                }
                $namaFile->move($destinationPath, $namaphoto);

                $foto_produk_data[] = [
                    'id_produk' => $cekData->id,
                    'photo_produk' => $namaphoto,
                ];
            }
            foreach ($foto_produk_data as $dataFoto) {
                $this->photoproduk->insert($dataFoto);
            }
            $this->rating->insert($dataRating);
            $this->produk_detail->insert($dataDetail);
            $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
            return redirect()->to('/list-produk'); 
        }
        catch (\Exception $e) {
            $e->getMessage();
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
        $cekdetail = $this->produk->select("*, produk.created_at as tglbuat, produk.id as id,GROUP_CONCAT(groupphotoproduk.photo_produk) AS daftar_foto")
        ->join('produk_detail', 'produk_detail.id_produk = produk.id')
        ->join('kategori', 'kategori.id = produk.id_kategori')
        ->join('sub_kategori', 'sub_kategori.id = produk.id_sub') 
        ->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')
        ->orderBy('produk.created_at', 'DESC')
        ->where('produk.id', $id)
        ->first();
        $daftarFotoArray = explode(',', $cekdetail->daftar_foto);
        $linkaddress = $cekdetail->link_address;
        $daftarFotoArray[] = $linkaddress;

        

        $cekkategori = $this->kategori->get()->getResult();
        $ceksub = $this->sub_kategori->get()->getResult();

       $data =[
           'id' => $id,
           'result' => $cekdetail,
            'title' => 'Update Produk',
           'kategori' => $cekkategori,
           'subkategori' => $ceksub, 
           'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
           'isUri' => $this->request->uri,
            'daftar_foto' => $daftarFotoArray,
       ];
       
       return view ('admin/edit-produk',$data);
    }
    public function updateProduk($id)
    {   
        $dataProduk = [
            'id' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga_produk' => $this->request->getVar('harga_produk'),
            'id_kategori' => $this->request->getVar('kategori'),
            'id_sub' => $this->request->getVar('sub_kategori'),
        ];
        try {
            $produkData = $this->produk->where('id', $id)->first();

            if (!empty($produkData)) {
                $this->produk->update($id, $dataProduk);
                $cekData = $this->produk_detail->where('id_produk', $id)->first();
                $stok =$this->request->getVar('stok');
                if(!empty($stok)){
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
                }else{
                    $dataDetail = [
                        'id_produk' => $id,
                        'keterangan' => $this->request->getVar('keterangan'),
                        'link_address' =>  $this->request->getVar('link_address'), 
                    ];

                    if (!empty($cekData)) {
                        $this->produk_detail->update($cekData->id, $dataDetail);
                    } else {
                        $this->produk_detail->insert($dataDetail);
                    }
                }
                

                $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
                return redirect()->to('/list-produk');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}