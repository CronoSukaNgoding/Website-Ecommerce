<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersProfilModel extends Model{
    protected $table      = 'profile';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
	
    protected $useTimestamps = true;
    
    protected $allowedFields = 
    ['id',
     'userid',
     'nohp',
     'alamat',
     'Kode_POS',
     'province_id',
     'city_id',
     'rt',
     'rw'
    ];
    
    public function GetUsersProfil($id =false) 
    {
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }


}