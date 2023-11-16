<?php

namespace App\Models;

use CodeIgniter\Model;


class ProdukDetailModel extends Model
{
    protected $table      = 'produk_detail';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'id',
        'id_produk',
        'keterangan',
        'stok',
        'link_address',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    public function GetProdukDetail($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}