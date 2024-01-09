<?php

namespace App\Controllers;
use Ramsey\Uuid\Uuid;
class AuthController extends BaseController
{
    public function Login()
    {
        
        if($this->sesi->get('logged_in') == true){
            return redirect()->to('/dashboard');
        }else{
            return view('User/auth/login');
        }
        
       
    }
    public function cekLogin(){
        $isValid = [
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ];
        if (!$this->validate($isValid)) {
            $this->sesi->setFlashdata('error', $this->validator->getErrors());
            return redirect()->to('/masuk')->withInput()->with('validation', '');
        }
       
        $user = $this->users->where("username", $this->request->getVar("username"))->first();
        
        
        if (!$user) {
            $this->sesi->setFlashdata('error', ['errors'=> 'Username tidak ditemukan']);
            return redirect()->to('/masuk');
        }else{
            $password = $this->request->getVar("password");
            $hash = $user->password;
            $cekPw = password_verify($password, $hash);
            if(!$cekPw){
                $this->sesi->setFlashdata('error', ['errors'=> 'Password salah']);
                return redirect()->to('/masuk');
            }else {
                $uuid = Uuid::uuid4();
                $cekUnikSesi = $this->cart->where('id_user', $user->user_id)->first();
                $ses_data;
                if($cekUnikSesi){
                    $ses_data = [
                        'user_id' => $user->user_id,
                        'unikSesi' => $cekUnikSesi->uniksesi,
                        'username' => $user->username,
                        'email' => $user->email,
                        'logged_in' => true,
                        'role' => $user->role_id,
                        'avatar' => $user->avatar,
                    ];
                }else{
                    $ses_data = [
                        'user_id' => $user->user_id,
                        'unikSesi' => $uuid->toString(),
                        'username' => $user->username,
                        'email' => $user->email,
                        'logged_in' => true,
                        'role' => $user->role_id,
                        'avatar' => $user->avatar,
                    ];
                }

                $this->sesi->set($ses_data);
                $id = $user->user_id;
                $cekData = $this->usersprofil->where('userid', $id)->first();
                if(empty($cekData)){
                    $dataProvinsi = $this->provinsi->get()->getResult();
                    $dataKota = $this->kota->get()->getResult();
                    $data=[
                        'menu' => 'editprofile',
                        'title'=> 'Edit Profile',
                        'isUri' => $this->request->uri,
                        'result' => $this->users->where('user_id',$this->sesi->get('user_id'))->first(),
                        'user' => $this->users->where('user_id',$this->sesi->get('user_id'))->first(),
                        'response1' => $dataProvinsi,
                        'response2' => $dataKota
                    ];
                    return view('User/profil/profilAddoption',$data);
                }else{
                    $this->sesi->set($ses_data);
                    $this->sesi->setFlashdata('sukses', 'Selamat Datang');
                    return redirect()->to('/dashboard');
                }
                        
                }
        }
    }
     public function Logout(){
        $this->sesi->destroy();
        $this->sesi->setFlashdata('sukses', 'Anda berhasil logout');
        return redirect()->to('/masuk');
    }
}
