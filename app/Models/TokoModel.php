<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model{
    protected $table      = 'groupalamattoko';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
	
    protected $useTimestamps = true;
    
    protected $allowedFields = 
    ['id',
     'userid',
     'province_id',
     'city_id',
     'jalan',
     'rt',
     'rw'
    ];
    
    public function GetToko($id =false) 
    {
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }


}