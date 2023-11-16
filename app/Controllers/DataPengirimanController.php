<?php

namespace App\Controllers;

class DataPengirimanController extends BaseController
{
    public function index()
    {
        if($this->sesi->get('role')== 1){
                $data = [
                    'title' => 'Data Pengiriman',
                ];   
            return view('admin/data-pengiriman', $data);
        }else if($this->sesi->get('role')== 2){
                $data = [
                    'title' => 'Data Pengiriman',
                ];  
            return view('User/Dashboard/data-pengiriman', $data);
        }
       
    
    }
    public function editpengiriman($id)
    {
         $cekdataPengiriman = $this->sending->where('id_payment', $id)->first();
            $pengiriman;
            $status= $this->status->get()->getResult();
            if($cekdataPengiriman != null){
                $pengiriman = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment, status.name as statusname")
                ->join('users', 'users.user_id = payment.id_user')
                ->join('produk', 'produk.id = payment.id_produk')
                ->join('status', 'status.id = payment.status')
                ->join('sending','sending.id_payment=payment.id')
                ->orderBy('payment.created_at', 'DESC')
                ->groupBy('payment.id_produk')
                ->where('payment.id',$id)->first();
                $data = [
                    'title'=>'Edit Pengiriman',
                    'result'=> $pengiriman,
                    'status'=>$status,
                ]; 
                return view('admin/edit-pengiriman',$data);


            
            }else{
                $pengiriman = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment, status.name as statusname")
                ->join('users', 'users.user_id = payment.id_user')
                ->join('produk', 'produk.id = payment.id_produk')
                ->join('status', 'status.id = payment.status')
                ->orderBy('payment.created_at', 'DESC')
                ->groupBy('payment.id_produk')
                ->where('payment.id',$id)->first();
                $data = [
                'title'=>'Edit Pengiriman',
                'result'=> $pengiriman,
                'status'=>$status,
            ];
            return view('admin/edit-pengiriman-new',$data);
            }
    }

    public function simpanpengiriman($id){
        $cekdataPengiriman = $this->sending->where('id_payment', $id)->first();
        $data;
        if($cekdataPengiriman != null){
            $data = [
                'id'=> $cekdataPengiriman->id,
                'no_resi'=> $this->request->getVar('no_resi'),
                'id_payment'=> $id,
                'id_user' => $this->sesi->get('user_id')
            ];
        }else{
            $data = [
                'no_resi'=> $this->request->getVar('no_resi'),
                'id_payment'=> $id,
                'id_user' => $this->sesi->get('user_id')
            ];
        }

        

        try {
            $update = $this->sending->save($data);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/data-pengiriman');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('admin/data-pengiriman/'.$id, $data);
    }

    public function editPengirimanUser($id){
        $cekDataPayment = $this->Payment->where('id', $id)->first();
        // dd($cekDataPayment); 
        $dataPayment =[
            'id' => $id,
            'status' => $this->request->getVar('status'),
        ];
        $dataRating =[
            'produk_id' => $cekDataPayment->id_produk,
            'userid'=> $this->sesi->get('user_id'),
            'peringkat' => $this->request->getVar('rating'),
        ];
        $dataKomentar =[
            'produk_id' => $cekDataPayment->id_produk,
            'userid'=> $this->sesi->get('user_id'),
            'komentar' => $this->request->getVar('komentar'),
        ];
        
        $halo =[
            'dataKomentar' => $dataKomentar,
            'dataRating' => $dataRating,
            'dataPayment'=> $dataPayment
        ];
        // dd($halo);
        try {
            $update = $this->Payment->save($dataPayment);
            $saveKomen = $this->komentar->save($dataKomentar);
            $saveRating = $this->rating->save($dataRating);
             $this->sesi->setFlashdata('sukses-tambah', 'Data berhasil ditambah');
             return redirect()->to('/review');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('data-pengiriman-user/'.$id, $data);
    }

    public function viewUser($id){
        $cekdataPengiriman = $this->sending->where('id_payment', $id)->first();
            $pengiriman;
            $status= $this->status->get()->getResult();
            if($cekdataPengiriman != null){
                $pengiriman = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment, status.name as statusname")
                ->join('users', 'users.user_id = payment.id_user')
                ->join('produk', 'produk.id = payment.id_produk')
                ->join('status', 'status.id = payment.status')
                ->join('sending','sending.id_payment=payment.id')
                ->orderBy('payment.created_at', 'DESC')
                ->groupBy('payment.id_produk')
                ->where('payment.id',$id)->first();
                $data = [
                    'title'=>'Edit Pengiriman',
                    'result'=> $pengiriman,
                    'status'=>$status,
                ];  
                return view('User/Dashboard/lihat-resi',$data);
            }
    }

    public function getSendAdmin(){
        $TEST = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment")
            ->join('users', 'users.user_id = payment.id_user')
            ->join('produk', 'produk.id = payment.id_produk')
            ->orderBy('payment.created_at', 'DESC')
            ->where('payment.status', 3)
            ->get()->getResult();

            if ($TEST) {
                $data = [
                    "draw" => null,
                    "recordsTotal" => count($TEST),
                    "recordsFiltered" => count($TEST),
                    "data" => $TEST
                ];

                return $this->response->setJSON($data);
            } else {
                return $this->response->setStatusCode(200)->setJSON(['error' => 'No data found']);
            }
    }
    public function getSendUser(){
        $TEST = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment")
            ->join('users', 'users.user_id = payment.id_user')
            ->join('produk', 'produk.id = payment.id_produk')
            ->orderBy('payment.created_at', 'DESC')
            ->where('payment.status', 3)
            ->where('payment.id_user', $this->sesi->get('user_id'))
            ->get()->getResult();

            if ($TEST) {
                $data = [
                    "draw" => null,
                    "recordsTotal" => count($TEST),
                    "recordsFiltered" => count($TEST),
                    "data" => $TEST
                ];

                return $this->response->setJSON($data);
            } else {
                return $this->response->setStatusCode(200)->setJSON(['error' => 'No data found']);
            }
    }
    

    

}