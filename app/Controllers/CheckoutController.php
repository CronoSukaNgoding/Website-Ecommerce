<?php

namespace App\Controllers;
use Ramsey\Uuid\Uuid;
class CheckoutController extends BaseController
{
    public function Checkout($id)
    {
        $userId = $this->sesi->get('user_id');
        $user = $this->users->join('profile', 'profile.userid = users.user_id')->where('user_id', $userId)->first();

        $checkout = $this->checkout->select("*, checkout.created_at as tglbuat, checkout.id_checkout as idcekot")
        ->join('users', 'users.user_id = checkout.id_user')
        ->join('produk', 'produk.id = checkout.id_produk')
        ->join('groupphotoproduk','groupphotoproduk.id_produk = checkout.id_produk')
        ->orderBy('checkout.created_at', 'DESC')
        ->groupBy('checkout.id_produk')
        ->get()
        ->getResult();

        $data = [
            'title' => 'Checkout',
            'profile' => $user,
            'result' => $checkout,
            'id'=>$id
        ];

        return view('User/Dashboard/checkout', $data);
    
    }
    public function svprepayment(){

        $request = $this->request->getJSON(); 
        $PrePaymentItems = $request->PrePaymentItems;
        $uuid = Uuid::uuid4();
        $userId = $this->sesi->get('user_id');
        $user = $this->users->where('user_id', $userId)->first();
        $data;
        foreach ($PrePaymentItems as $item) {
            $data = [
                'id_cart' => $item->id_cart,
                'id_pre' => $uuid->toString(),
                'id_produk' => $item->id_produk,
                'id_user' => $user->user_id,
                'id_checkout' => $item->id_checkout,
                'total' => $item->total,
                'notes' => $item->notes,
                'qty'=> $item->qty,
            ];
            $this->PrePayment->insert($data);
            
            
        }
        return $this->response->setJSON(['message' => 'Checkout items saved successfully', 'data' => $data['id_pre']]);

        
        

   
    } 
}