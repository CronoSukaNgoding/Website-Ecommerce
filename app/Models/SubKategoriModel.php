<?php

namespace App\Models;

use CodeIgniter\Model;


class SubKategoriModel extends Model
{
    protected $table      = 'sub_kategori';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'id_kategori',
        'sub_kategori',
    ];

    protected $useTimestamps = true;

    public function GetSubKategori($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}