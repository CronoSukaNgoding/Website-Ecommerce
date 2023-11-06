<?php

namespace App\Controllers;



class ResetPassword extends BaseController
{
    public function index($token)
    {
        

        $user = $this->users->where('reset_token', $token)
                      ->where('reset_expiration >', date('Y-m-d H:i:s'))
                      ->first();

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Invalid or expired token');
        }

        return view('User/auth/reset_password', ['token' => $token]);
    }

    public function updatePassword()
    {
        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');

        

        $user = $this->users->where('reset_token', $token)
                      ->where('reset_expiration >', date('Y-m-d H:i:s'))
                      ->first();

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Invalid or expired token');
        }

        $this->users->update($user->user_id, ['password' => password_hash($password, PASSWORD_BCRYPT)]);

        $this->users->update($user->user_id, ['reset_token' => null, 'reset_expiration' => null]);

        return redirect()->to('/masuk')->with('sukses', 'Password Berhasil diganti');
    }
}
