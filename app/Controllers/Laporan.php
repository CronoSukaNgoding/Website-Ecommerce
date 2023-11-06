<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Pesanan',
        ];
            return view('admin/laporan',$data);
    
    }
    public function getLaporan(){
        $currentMonth = date('Y-m');
        $TEST = $this->Payment->select('payment.id_payment as idOrder, payment.created_at as orderDate, users.fullname as customerName, produk.nama_produk as produkName, payment.qty as quantity, payment.total as price')
        ->join('users','payment.id_user = users.user_id')
        ->join('produk','payment.id_produk = produk.id')
        ->where('DATE_FORMAT(payment.created_at, "%Y-%m")', $currentMonth)
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