<?php

namespace App\Controllers;

class DataPesananController extends BaseController
{
    public function index()
    {
            $data = [
                'title' => 'Data Pesanan',
            ];
            return view('admin/data-pesanan', $data);
    
    }
    public function getPesanan()
    {
        try {
            $TEST = $this->PrePayment->select("*, pre_payment.created_at as tglbuat, pre_payment.id as idPrePayment")
                ->join('users', 'users.user_id = pre_payment.id_user')
                ->join('produk', 'produk.id = pre_payment.id_produk')
                ->orderBy('pre_payment.created_at', 'DESC')
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
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }


}