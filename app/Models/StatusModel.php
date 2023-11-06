<?php

namespace App\Models;

use CodeIgniter\Model;


class StatusModel extends Model
{
    protected $table      = 'status';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'name',
        
    ];

    protected $useTimestamps = true;



    public function GetStatus($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    

}