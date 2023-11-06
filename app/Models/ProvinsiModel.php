<?php

namespace App\Models;

use CodeIgniter\Model;


class ProvinsiModel extends Model
{
    protected $table      = 'provinsi';
    protected $primaryKey = 'province_id';
    protected $returnType = 'object';

   

    protected $useTimestamps = true;



    public function GetProvinsi($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['province_id' => $id])->first();
    }
    

}