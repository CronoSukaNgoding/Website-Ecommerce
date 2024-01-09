<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan',
        ];
            return view('admin/laporan',$data);
    
    }
    public function getLaporan ($startDate = null,$endDate =null){
        $param = $_REQUEST;
        $TEST = $this->Payment->select('payment.id_payment as idOrder, payment.created_at as orderDate, users.fullname as customerName, produk.nama_produk as produkName, payment.qty as quantity, payment.total as price')
                ->join('users', 'payment.id_user = users.user_id')
                ->join('produk', 'payment.id_produk = produk.id')
                ->where("payment.created_at BETWEEN '{$param['startDate']}' AND '{$param['endDate']}'")
                ->get()
                ->getResult();


        if ($TEST) {
            $data = [
                "draw" => null,
                "recordsTotal" => count($TEST),
                "recordsFiltered" => count($TEST),
                "data" => $TEST,
                
            ];

            return $this->response->setJSON(['response'=> $data, 'param'=> $param]);
        } else {
            return $this->response->setStatusCode(200)->setJSON(['error' => 'No data found']);
        }
    }
}