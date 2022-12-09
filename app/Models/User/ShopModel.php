<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShopModel extends Model
{
    use HasFactory;

    public function getShop()
    {
        return DB::table('produk')
            ->orderBy('id_produk', 'desc')
            ->where('tampil', 'iya')
            ->get();
    }

    public function getKategori()
    {
        return DB::table('kategori')->get();
    }

    public function getDetailShop($id)
    {
        return DB::table('produk')->where("id_produk", $id)->first();
    }

    public function getShopKategori($id)
    {
        return DB::table('produk')
            ->leftJoin('kategori', 'kategori.id_kategori', '=', 'produk.id_kategori')
            ->where('tampil', 'iya')
            ->where('kategori.id_kategori', $id)
            ->orderBy('id_produk', 'desc')
            ->get();
    }

    public function masukkecart($data)
    {
        return DB::table('cart')->insert($data);
    }

    public function countcartbyid($id_pelanggan)
    {
        return DB::table('cart')
            ->where("id_pelanggan", $id_pelanggan)
            ->where("status", NULL)
            ->count();
    }

    public function cariShop($request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        return DB::table('produk')
            ->orderBy('id_produk', 'desc')
            ->where('nama_produk', 'like', "%" . $cari . "%")
            ->orderBy('id_produk', 'desc')
            ->where('tampil', 'iya')
            ->get();
    }

    public function getHarga($id)
    {
        return DB::table('harga')
            ->join('produk', 'produk.id_produk', '=', 'harga.id_produk')
            ->where('harga.id_produk', $id)
            ->get();
    }
    
}