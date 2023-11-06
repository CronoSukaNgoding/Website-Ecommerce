<?php

namespace App\Models;

use CodeIgniter\Model;


class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'user_id';
    protected $returnType = 'object';

   protected $allowedFields = 
    [
        'fullname',
        'username',
        'email',
        'password',
        'avatar',
        'role_id',
        'reset_token',
        'reset_expiration'
    ];

    protected $useTimestamps = true;

    public function GetUsers($id =false) 
    {
        
        if($id == false) 
        {
            return $this->findAll();
        }
        return $this->where(['user_id' => $id])->first();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function updateUserPassword($id, $password)
    {
        $this->set('password', $password)
             ->where('user_id', $id)
             ->update();
    }
    

}