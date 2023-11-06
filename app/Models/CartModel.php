<?php

namespace App\Models;

use CodeIgniter\Model;


class CartModel extends Model
{
    protected $table      = 'cart';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'uniksesi',
        'id_user',
        'id_produk',
        'province_id',
        'city_id'
    ];

    protected $useTimestamps = true;



    public function GetCart($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}