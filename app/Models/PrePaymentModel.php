<?php

namespace App\Models;

use CodeIgniter\Model;


class PrePaymentModel extends Model
{
    protected $table      = 'pre_payment';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'id_pre',
        'id_cart',
        'id_produk',
        'id_checkout',
        'id_user',
        'notes',
        'total',
        'qty',
    ];

    protected $useTimestamps = true;



    public function GetPrePayment($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}