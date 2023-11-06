<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $cekkategori = $this->kategori->get()->getResult();
        $cekSubkat =  $this->sub_kategori->get()->getResult();
        $id = $this->sesi->get('user_id');
        $data = [
            'title' => 'Dashboard',
            'kategori' => $cekkategori,
            'subKat'=> $cekSubkat,
        ];
        return view('User/Dashboard/dashboard', $data);

    }

}