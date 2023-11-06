<?php

namespace App\Controllers;

class DataPembayaranController extends BaseController
{
    public function index()
    {
        if($this->sesi->get('role')== 1){
            
                $data = [
                    'title' => 'Data Pembayaran',
                ];
                return view('admin/data-pembayaran', $data);
        }else if($this->sesi->get('role')== 2){
           
                $data = [
                    'title' => 'Data Pembayaran',
                ];
                return view('User/Dashboard/data-pembayaran', $data);
        }
      
        
    
    }
    public function editPembayaran($id)
    {
        $pembayaran = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment, status.name as statusname")
        ->join('users', 'users.user_id = payment.id_user')
        ->join('produk', 'produk.id = payment.id_produk')
        ->join('status', 'status.id = payment.status')
        ->orderBy('payment.created_at', 'DESC')
        
        ->where('payment.id',$id)->first();

        $status= $this->status->get()->getResult();
        $data = [
            'title'=>'Edit Pembayaran',
            'result'=> $pembayaran,
            'status'=>$status,
        ];
        return view('admin/edit-pembayaran',$data);
    }

    public function simpanPembayaran($id){
        $data = [
            'id' => $id,
            'status'=> $this->request->getVar('status'),
        ];
        $this->Payment->save($data);

        try {
            $update = $this->Payment->save($data);
             $this->sesi->setFlashdata('sukses', 'Data berhasil diedit');
             return redirect()->to('/data-pembayaran');
        } catch (\Exception $e) {
         $e->getMessage();
        }
        return view('admin/data-pembayaran/'.$id, $data);
    }

    public function delPembayaran($id){
        $this->Payment->delete($id);
        $this->sesi->setFlashdata('hapus', 'Berhasil menghapus data pembayaran');
        return redirect()->to('/data-pembayaran');
    }
    public function getPayAdmin(){
        $TEST = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment")
            ->join('users', 'users.user_id = payment.id_user')
            ->join('produk', 'produk.id = payment.id_produk')
            ->orderBy('payment.created_at', 'DESC')
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
    public function getPayUser(){
        $TEST = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment")
            ->join('users', 'users.user_id = payment.id_user')
            ->join('produk', 'produk.id = payment.id_produk')
            ->orderBy('payment.created_at', 'DESC')
            ->where('users.user_id', $this->sesi->get('user_id'))
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