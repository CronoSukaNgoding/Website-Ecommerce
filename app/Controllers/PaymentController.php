<?php

namespace App\Controllers;
use Ramsey\Uuid\Uuid;
class PaymentController extends BaseController
{
    public function Payment($id)
    {
        $userId = $this->sesi->get('user_id');
        $user = $this->users->join('profile', 'profile.userid = users.user_id')->where('user_id', $userId)->first();
        $prepayment = $this->PrePayment->select("pre_payment.qty,total,pre_payment.id_user,pre_payment.id_produk,pre_payment.id_cart,pre_payment.id_pre, pre_payment.created_at as tglbuat, pre_payment.id as idPrePayment")
        ->join('users', 'users.user_id = pre_payment.id_user')
        ->join('checkout', 'checkout.id_checkout = pre_payment.id_checkout')
        ->orderBy('pre_payment.created_at', 'DESC')
        ->groupBy('pre_payment.id_produk')
        ->where('pre_payment.id_pre', $id)
        ->get()->getResult();

        $data = [
            'title' => 'Checkout',
            'profile' => $user,
            'result' => $prepayment,
        ];
        return view('User/Dashboard/Payment', $data);
    
    }

    public function svpayment(){
        if ($this->request->isAJAX()) {
            $total = $this->request->getVar('total');
            $idPrePay = $this->request->getVar('idPrePay');
            $idProduk = $this->request->getVar('idProduk');
            $idCart = $this->request->getVar('idCart');
            $qty = $this->request->getVar('qty');   
            $uuid = Uuid::uuid4();
            $userId = $this->sesi->get('user_id');
            $user = $this->users->where('user_id', $userId)->first();
    
            if ($this->request->getFile('transfer')) {
                $transferFile = $this->request->getFile('transfer');
    
                if ($transferFile->isValid() && !$transferFile->hasMoved()) {
                    $fileName = 'Bukti-pembayaran-' . str_replace(' ', '_', $user->fullname) . '.' . $transferFile->getClientExtension();
                    $transferFile->move(ROOTPATH . 'public/uploads', $fileName);
    
                    foreach ($idProduk as $id) {
                        $data = [
                            'id_payment' => $uuid->toString(),
                            'id_user' => $user->user_id,
                            'id_pre' => $idPrePay,
                            'transfer' => $fileName,
                            'total' => $total,
                            'idCart' => $idCart,
                            'id_produk' => $id, 
                            'status'=> 1,
                            'qty'=>$qty
                        ];
    
                        try {
                            $this->Payment->insert($data);
                            $this->cart->where('uniksesi', $idCart)->delete();
                            $this->checkout->where('id_cart', $idCart)->delete();
                        } catch (\Exception $e) {
                            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
                        }
                    }
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan', 'data' => $data]);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Upload file gagal']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Field transfer tidak ditemukan dalam permintaan AJAX']);
            }
        }
    }
}