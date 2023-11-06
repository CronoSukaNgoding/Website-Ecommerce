<?php

namespace App\Models;

use CodeIgniter\Model;


class PaymentModel extends Model
{
    protected $table      = 'payment';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'id_payment',
        'id_pre',
        'id_user',
        'transfer',
        'id_produk',
        'total',
        'status',
        'qty'
    ];

    protected $useTimestamps = true;



    public function GetPayment($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}