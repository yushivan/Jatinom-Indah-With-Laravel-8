<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
    }
    public function index()
    {
        $data = [
            'produk' => $this->ProdukModel->getProduk()
        ];
        return view('user/v_produk', $data);
    }
    public function getDetailProduk($id)
    {
        $data = [
            'produk' => $this->ProdukModel->getDetailProduk($id),
            'harga' => $this->ProdukModel->getHarga($id)
        ];
        return view('user/v_detail-produk', $data);
    }
}