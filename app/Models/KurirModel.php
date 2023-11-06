<?php

namespace App\Models;

use CodeIgniter\Model;


class KurirModel extends Model
{
    protected $table      = 'courier';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'codeCourier',
        'nameCourier'
        
    ];

    protected $useTimestamps = true;



    public function GetCourier($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}