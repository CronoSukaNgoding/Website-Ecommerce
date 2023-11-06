<?php

namespace App\Controllers;

class TokoController extends BaseController
{
    public function index($id)
    {
        
        $dataToko = $this->toko->where('userid',$id)->join('provinsi','provinsi.province_id = groupalamattoko.province_id')->join('kota','kota.city_id=groupalamattoko.city_id')->first();

        $dataProvinsi = $this->provinsi->get()->getResult();
        $dataKota = $this->kota->get()->getResult();
        if($dataToko != null){
            $data = [
                'title'=> 'Data Toko',
                'result'=> $dataToko,
                'response1' => $dataProvinsi,
                'response2' => $dataKota,
                'userid'=> $id
            ];
            return view('/admin/data-toko',$data);
        }else{
            $data = [
                'title'=> 'Data Toko',
                'response1' => $dataProvinsi,
                'response2' => $dataKota,
                'userid'=> $id
            ];
            return view('/admin/data-toko-new',$data);
        }
        
    }
    public function svToko($id){
        $cekIdToko = $this->toko->where('userid', $id)->first();
        if($cekIdToko !=  null){
            $data=[
                'id'=> $cekIdToko->id,
                'province_id' => $this->request->getVar('provinsi'),
                'city_id' => $this->request->getVar('kota'),
                'jalan' => $this->request->getVar('jalan'),
                'rt' => $this->request->getVar('rt'),
                'rw' => $this->request->getVar('rw'),
                'userid'=> $id
            ];
            try{
                $updateToko = $this->toko->save($data);
                $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
                return redirect()->to('/data-toko/'.$id);
            }catch (\Exception $e) {
                dd($e->getMessage());
            }
        }else{
            $data=[
                'province_id' => $this->request->getVar('provinsi'),
                'city_id' => $this->request->getVar('kota'),
                'jalan' => $this->request->getVar('jalan'),
                'rt' => $this->request->getVar('rt'),
                'rw' => $this->request->getVar('rw'),
                'userid'=> $id
            ];
            try{
                $updateToko = $this->toko->save($data);
                $this->sesi->setFlashdata('sukses', 'Data berhasil diubah');
                return redirect()->to('/data-toko/'.$id);
            }catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
        
    }

}
