<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->ShopModel = new ShopModel();
    }
    public function index()
    {
        $data = [
            'shop' => $this->ShopModel->getShop(),
            'kategori' => $this->ShopModel->getKategori()
        ];
        return view('user/v_shop', $data);
    }

    public function getShopKategori($id)
    {
        $data = [
            'shop' => $this->ShopModel->getShopKategori($id),
            'kategori' => $this->ShopModel->getKategori()
        ];
        return view('user/v_shop-kategori', $data);
    }

    public function getDetailShop($id)
    {
        $id_pelanggan = Auth::user()->id;
        $data = [
            'shop' => $this->ShopModel->getDetailShop($id),
            'cart' => $this->ShopModel->countcartbyid($id_pelanggan),
            'harga' => $this->ShopModel->getHarga($id)
        ];
        return view('user/v_detail-shop', $data);
    }

    public function masukkecart()
    {
        $harga = DB::table('harga')->where('id_produk', Request()->id_produk)->where('satuan', Request()->satuan)->first();
        $total = Request()->jumlah * $harga->harga;
        $data = [
            'id_pelanggan' => Request()->id_pelanggan,
            'id_produk' => Request()->id_produk,
            'jumlah' => Request()->jumlah,
            'satuan' => $harga->satuan,
            'harga' => $harga->harga,
            'total' => $total,
        ];
        $this->ShopModel->masukkecart($data);
        return redirect()->route('shop')->with('pesan', 'Produk berhasil ditambahkan ke cart');
    }

    public function cariShop(Request $request)
    {

        // mengambil data dari table pegawai sesuai pencarian data
        $data = [
            'shop' => $this->ShopModel->cariShop($request),
            'kategori' => $this->ShopModel->getKategori()
        ];

        // mengirim data pegawai ke view index
        return view('user/v_shop', $data);
    }
}