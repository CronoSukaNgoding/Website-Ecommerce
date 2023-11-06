<?php

namespace App\Controllers;

class RatingController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Rating Produk',
        ];
            return view('admin/Rating',$data);
    
    }
    public function getRating(){
        // $TEST = $this->rating->select('peringkat_produk.peringkat, produk.nama_produk')->join('produk','produk.id = peringkat_produk.produk_id')->selectAvg('peringkat')->get()->getResult();
        $TEST = $this->produk->select('produk.nama_produk ')
            ->selectAvg('peringkat_produk.peringkat', 'rata_rata_peringkat')
            ->join('peringkat_produk', 'produk.id = peringkat_produk.produk_id', 'left')
            ->groupBy('produk.nama_produk')
            ->get()
            ->getResult();

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

    public function Listreview(){
        $data = [
                    'title' => 'Data Review',
                ];  
            return view('User/Dashboard/data-review', $data);
    }
    public function ajaxReviewUser(){
        $TEST = $this->Payment->select("*, payment.created_at as tglbuat, payment.id as idPayment, komentar.komentar,produk.nama_produk,peringkat_produk.peringkat")
            ->join('users', 'users.user_id = payment.id_user')
            ->join('produk', 'produk.id = payment.id_produk')
            ->join('peringkat_produk', 'produk.id = peringkat_produk.produk_id', 'left')
            ->join('komentar','komentar.produk_id= produk.id', 'left')
            ->orderBy('payment.created_at', 'DESC')
            ->groupby('payment.created_at')
            ->where('payment.status', 4)
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

    public function editReview($id){
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
}