<?php

namespace App\Controllers;

class getKategori extends BaseController
{
    public function getKat()
    {
        try {
            $categoryId = $_GET['categoryId'];

            $dataByKategori = $this->kategori->select('*, produk.id as idProduk, GROUP_CONCAT(DISTINCT groupphotoproduk.photo_produk) AS daftar_foto')
            ->selectAvg('peringkat_produk.peringkat', 'rata_rata_peringkat')
            ->join('produk', 'produk.id_kategori = kategori.id')
            ->join('sub_kategori', 'sub_kategori.id = produk.id_sub')
            ->join('produk_detail','produk.id = produk_detail.id_produk')
            ->join('peringkat_produk', 'produk.id = peringkat_produk.produk_id', 'left')
            ->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')
            ->where('kategori.id', $categoryId)->groupBy('produk.id')->orderBy('produk.nama_produk', 'ASC')->get()->getResult();

            $is_admin = (isset($_SESSION['role']) && $_SESSION['role'] === '1');
                $filteredProduk = [];
                foreach ($dataByKategori as $item) {
                    if ($is_admin || $item->stok > 0) {
                        $filteredProduk[] = $item;
                    }
                    
                }
                $produk = [
                        ['produk' => $filteredProduk]
                    ];
                    echo json_encode($produk);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    public function search()
    {
       if ($this->request->isAJAX()) {
            $searchTerm = $this->request->getVar('keyword');

            if (!empty($searchTerm)) {
                try {
                    $produk = $this->produk->select('*,GROUP_CONCAT(DISTINCT groupphotoproduk.photo_produk) AS daftar_foto')->like('nama_produk', $searchTerm, 'both')
                    ->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')
                    ->get()->getResult();

                    if (!empty($produk) && array_filter((array)$produk[0])) {
                        return json_encode($produk);
                    } else {
                        echo "<p>Tidak ada produk yang cocok dengan kata kunci pencarian.</p>";
                    }
                } catch (Exception $e) {
                    echo "<p>Terjadi kesalahan dalam pencarian produk: " . $e->getMessage() . "</p>";
                }
            } else {
                echo json_encode([]);
            }
        }

    }
    public function getSubKat(){
        try {
            $SubcategoryId = $_GET['SubcategoryId'];
            $dataBySubKat = $this->kategori->select('*, produk.id as idProduk, GROUP_CONCAT(DISTINCT groupphotoproduk.photo_produk) AS daftar_foto')
            ->selectAvg('peringkat_produk.peringkat', 'rata_rata_peringkat')
            ->join('produk', 'produk.id_kategori = kategori.id')
            ->join('sub_kategori', 'sub_kategori.id = produk.id_sub')
            ->join('produk_detail','produk.id = produk_detail.id_produk')
            ->join('peringkat_produk', 'produk.id = peringkat_produk.produk_id', 'left')
            ->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')
            ->where('produk.id_sub', $SubcategoryId)->groupBy('produk.id')
            ->orderBy('produk.nama_produk', 'ASC')
            ->get()->getResult();

            $is_admin = (isset($_SESSION['role']) && $_SESSION['role'] === '1');
                $filteredProduk = [];
                foreach ($dataBySubKat as $item) {
                    if ($is_admin || $item->stok > 0) {
                        $filteredProduk[] = $item;
                    }
                    
                }
                $produk = [
                        ['produk' => $filteredProduk]
                    ];
                    echo json_encode($produk);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }


    public function getProduct(){
        try {
            $product = $this->produk->select("*, produk.created_at as tglbuat, produk.id as produk, GROUP_CONCAT(DISTINCT groupphotoproduk.photo_produk) AS daftar_foto")
                 ->selectAvg('peringkat_produk.peringkat', 'rata_rata_peringkat')
                ->join('produk_detail', 'produk_detail.id_produk = produk.id')
                ->join('peringkat_produk', 'produk.id = peringkat_produk.produk_id', 'left')
                ->join('groupphotoproduk','groupphotoproduk.id_produk = produk.id')
                ->join('kategori', 'kategori.id = produk.id_kategori')
                ->join('sub_kategori', 'sub_kategori.id = produk.id_sub')
                ->orderBy('produk.nama_produk', 'ASC')
                ->groupBy('produk.id')->get()->getResult();

            $is_admin = (isset($_SESSION['role']) && $_SESSION['role'] === '1');
            $filteredProduk = [];
            foreach ($product as $item) {
                if ($is_admin || $item->stok > 0) {
                    $filteredProduk[] = $item;
                }
            }
            return json_encode($filteredProduk);
        } catch (Exception $e) {
            return json_encode(['error' => 'Terjadi kesalahan dalam mengambil data produk: ' . $e->getMessage()]);
        }

    }

    


}