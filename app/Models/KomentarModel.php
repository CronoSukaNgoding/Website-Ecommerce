<?php

namespace App\Models;

use CodeIgniter\Model;


class KomentarModel extends Model
{
    protected $table      = 'komentar';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'produk_id',
        'userid',
        'komentar',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    

}