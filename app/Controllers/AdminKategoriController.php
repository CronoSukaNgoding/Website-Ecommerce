<?php

namespace App\Controllers;

class AdminKategoriController extends BaseController
{
    public function index()
    {    
        $cekkategori = $this->kategori->get()->getResult();
        
        $data =[
            'user' => $this->users->where('user_id', $this->sesi->get('user_id'))->first(),
            'title' => 'Data Kategori',
            'kategori' => $cekkategori,
            'isUri' => $this->request->uri,
            'sub' => $this->sub_kategori->GetSubKategori(),
        ];
        return view('admin/list-kategori',$data);
    }

    public function svkategori()
    {
        $iconkategori = $this->request->getFile('icon');
        $kategori = $this->request->getVar('kategori');
        $extension = $iconkategori->getClientExtension();
        $sanitizedKategori = preg_replace('/[^a-zA-Z0-9\s]/', '', $kategori); 
        $sanitizedKategori = str_replace(' ', '-', $sanitizedKategori);
        $namaicon = $sanitizedKategori . '.' . $extension;
        
        $destinationPath = WRITEPATH . '../public/admin/kategori/';
        $existingFile = $destinationPath . $namaicon;

        if (is_file($existingFile)) {
            unlink($existingFile);
        }
        
        $iconkategori->move($destinationPath, $namaicon);
        
        $data = [
            'kategori' => $kategori,
            'icon' => $namaicon,
        ];
        try {
            $update = $this->kategori->save($data);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/list-kategori');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('admin/list-kategori', $data);
    }


    

    public function deleteKategori($id)
    {   
        $cekdatasub = $this->sub_kategori->where('id_kategori', $id);
        if(!empty($cekdatasubl)){
         
            $deleteSub = $this->sub_kategori->delete($cekdatasub->id);
   
        }

        $cekdeleteKategori = $this->kategori->delete($id);
        if($cekdeleteKategori!=false){
            $this->sesi->setFlashdata('sukses', 'Data berhasil dihapus');
            return redirect()->to('/list-kategori');
        }else{
            $this->sesi->setFlashdata('gagal', 'Data gagal dihapus');
            return redirect()->to('/list-kategori');
        }

    }
    
    public function updateKategori($id)
    {
        $iconkategori = $this->request->getFile('icon');
        $cekiconlama = $this->kategori->select('icon')->where('id', $id)->get()->getRow();

        $dataKategori = [
            'id' => $id,
            'kategori' => $this->request->getVar('kategori'),
        ];

        if ($iconkategori->isValid() && !$iconkategori->hasMoved()) {
            $kategori = $this->request->getVar('kategori');
            $iconkategori = $this->request->getFile('icon');
            $extension = $iconkategori->getClientExtension();
            $sanitizedKategori = preg_replace('/[^a-zA-Z0-9\s]/', '', $kategori); 
            $sanitizedKategori = str_replace(' ', '-', $sanitizedKategori); 
            $namaicon = $sanitizedKategori . '.' . $extension;
            
            $destinationPath = WRITEPATH . '../public/admin/kategori/';
            $existingFile = $destinationPath . $namaicon;
            
 
            if (is_file($existingFile)) {

                unlink($existingFile);
            }
            

            $iconkategori->move($destinationPath, $namaicon);
        
            
            $dataKategori = [
                'id' => $id,
                'kategori' => $this->request->getVar('kategori'),
                'icon' => $namaicon,
            ];

        } else {
            if (!empty($cekiconlama)) {
                $dataKategori['icon'] = $cekiconlama->icon;
            } else {
                $dataKategori['icon'] = 'default.jpg';
            }
        }
        try {
            $this->kategori->update($id, $dataKategori);
             $this->sesi->setFlashdata('sukses-edit', 'Data berhasil ditambah');
             return redirect()->to('/list-kategori');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('admin/list-kategori', $data);
    }

    
    

}