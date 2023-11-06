<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index($id)
    {
        $cekData = $this->usersprofil->where('userid', $id)->join('provinsi','provinsi.province_id = profile.province_id')->join('kota','kota.city_id=profile.city_id')->join('users','users.user_id=profile.userid')->first();
        $dataProvinsi = $this->provinsi->get()->getResult();
        $dataKota = $this->kota->get()->getResult();
        if(empty($cekData)){
            $data=[
            'title' => 'Edit Profile',
            'isUri' => $this->request->uri,
            'result' => $this->users->where('user_id',$this->sesi->get('user_id'))->first(),
            'user' => $this->users->where('user_id',$this->sesi->get('user_id'))->first(),
            'response1' => $dataProvinsi,
            'response2' => $dataKota
        ];
        return view('User/profil/profilAddoption',$data);
        }else{
            $getProfil = $this->usersprofil->where('userid', $id)->join('users', 'users.user_id = profile.userid')->first();
                $data=[
                    'title' => 'Edit Profile',
                    'isUri' => $this->request->uri,
                    'result' => $cekData,
                    'datacek'=>$cekData,
                    'user' => $this->users->where('user_id',$this->sesi->get('user_id'))->first(),
                    'response1' => $dataProvinsi,
                    'response2' => $dataKota
                ];
            return view('User/profil/profil',$data);
        }
        

    }

    public function settingProfil($id)
    {
        $cekUser = $this->users->where('user_id', $id)->first();
        $avataruser = $this->request->getFile('avatar');
        $fullname = $this->request->getVar('fullname');
        $extension = '';
        $namaavatar = '';

        if ($avataruser->isValid()) {
            $extension = $avataruser->getClientExtension();
            $sanitizedFullname = preg_replace('/[^a-zA-Z0-9\s]/', '', $fullname); 
            $sanitizedFullname = str_replace(' ', '-', $sanitizedFullname); 
            $namaavatar = $sanitizedFullname . '.' . $extension;
            $avataruser->move(WRITEPATH . '../public/user/avatar', $namaavatar);
        } else {
            $namaavatar = $cekUser->avatar;
        }

        $dataUser = [
            'user_id' => $id,
            'fullname' => $fullname,
            'email' => $this->request->getVar('email'),
            'avatar' => $namaavatar,
            'role_id' => 2,
        ];

        try {
            $this->users->save($dataUser); 
            $cekData = $this->usersprofil->where('userid', $id)->first();
            if(!empty($cekData)){
                $dataProfile = [
                    'id' => $cekData->id,
                    'alamat' => $this->request->getVar('alamat'),
                    'Kode_POS' => $this->request->getVar('kodepos'),
                    'rt' => $this->request->getVar('rt'),
                    'rw' => $this->request->getVar('rw'),
                    'province_id' => $this->request->getVar('provinsi'),
                    'city_id' => $this->request->getVar('kota'),
                    'nohp' => $this->request->getVar('nohp'),
                    'userid' => $id,
                ];
                $this->usersprofil->save($dataProfile);
                $this->sesi->setFlashdata('sukses', 'Sesi anda di update, silahkan login kembali');
                return redirect()->to('/logout');
            }else{
                $dataProfile = [
                    'alamat' => $this->request->getVar('alamat'),
                    'Kode_POS' => $this->request->getVar('kodepos'),
                    'rt' => $this->request->getVar('rt'),
                    'rw' => $this->request->getVar('rw'),
                    'province_id' => $this->request->getVar('provinsi'),
                    'city_id' => $this->request->getVar('kota'),
                    'nohp' => $this->request->getVar('nohp'),
                    'userid' => $id,
                ];
                $this->usersprofil->save($dataProfile);
                $this->sesi->setFlashdata('sukses', 'Sesi anda di update, silahkan login kembali');
                return redirect()->to('/logout');
            }  
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
