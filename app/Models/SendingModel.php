<?php

namespace App\Models;

use CodeIgniter\Model;


class SendingModel extends Model
{
    protected $table      = 'sending';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [   
        'id_payment',
        'id_user',
        'no_resi'
    ];

    protected $useTimestamps = true;



   

}