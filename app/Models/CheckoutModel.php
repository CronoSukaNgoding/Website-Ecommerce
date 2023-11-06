<?php

namespace App\Models;

use CodeIgniter\Model;


class CheckoutModel extends Model
{
    protected $table      = 'checkout';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'id_checkout',
        'id_cart',
        'id_produk',
        'id_user',
        'qty',
        'amount',
        'biayaOngkir'
    ];

    protected $useTimestamps = true;



    public function GetCheckout($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}