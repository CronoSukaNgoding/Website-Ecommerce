<?php

namespace App\Models;

use CodeIgniter\Model;


class RatingModel extends Model
{
    protected $table      = 'peringkat_produk';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'produk_id',
        'userid',
        'peringkat',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    

}