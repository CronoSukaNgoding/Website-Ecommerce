<?php

namespace App\Models;

use CodeIgniter\Model;


class KotaModel extends Model
{
    protected $table      = 'kota';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   

    protected $useTimestamps = true;



    public function GetKota($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['province_id' => $id])->first();
    }
    public function getKotaByProvinsi($provinsiId)
    {
        return $this->where('province_id', $provinsiId)->findAll();
    }
    

}