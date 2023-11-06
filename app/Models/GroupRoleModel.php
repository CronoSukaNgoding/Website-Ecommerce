<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupRoleModel extends Model
{
    protected $table      = 'grouprole';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = ['id', 'role',];

}