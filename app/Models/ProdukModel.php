<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = [
        'id',
        'nama_produk',
        'harga_produk',
        'id_kategori',
        'id_sub',
        'photo_produk',
        'minPesanan',
        'beratProduk',
        'toko_id'
    ];

    protected $useTimestamps = true;

    public function GetProduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
}