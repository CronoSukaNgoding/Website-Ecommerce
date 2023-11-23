<?php

namespace App\Models;

use CodeIgniter\Model;


class groupPhotoProdukModel extends Model
{
    protected $table      = 'groupphotoproduk';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'id_produk',
        'photo_produk',
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