<?php

namespace App\Controllers;

class DaftarController extends BaseController
{
    public function index()
    {

        $data = [
            'validation' => $this->valid,

        ];
        return view('User/auth/register',$data);
    }

    public function getKotaByProvinsi()
    {
        $provinsiId = $this->request->getVar('provinsi_id');
        $kotaData = $this->kota->getKotaByProvinsi($provinsiId);
        return $this->response->setJSON($kotaData);
    }

    public function Register(){
         $isValid = [
            'fullname' => 'required|alpha',
            'username' => 'required|alpha|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];
        if (!$this->validate($isValid)) {
            $this->sesi->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('/register')->withInput()->with('validation', '');
        }
        
       $data = [
           'fullname' => $this->request->getVar('fullname'),
           'username' => $this->request->getVar('username'),
           'email' => $this->request->getVar('email'),
           'password' => \password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
           'role_id' => 3,
           'avatar' => 'default-avatar.svg'
       ];
       try {
            $daftar = $this->users->save($data);
            $this->sesi->setFlashdata('sukses', 'Selamat anda berhasil mendaftar');
            return redirect()->to('/masuk');
       } catch (\Exception $e) {
        $e->getMessage();
       }
   }
}