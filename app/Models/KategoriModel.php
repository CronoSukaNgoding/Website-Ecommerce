<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'kategori',
        'icon',
    ];

    protected $useTimestamps = true;



    public function GetKategori($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}