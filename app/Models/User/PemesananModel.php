<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemesananModel extends Model
{
    use HasFactory;

    public function getCart($id_pelanggan)
    {
        return DB::table('cart')
            ->join('produk', 'produk.id_produk', '=', 'cart.id_produk')
            ->where("id_pelanggan", $id_pelanggan)
            ->where("status", null)
            ->get();
    }

    public function getTotal($id_pelanggan)
    {
        return DB::table('cart')
            ->where("id_pelanggan", $id_pelanggan)
            ->where("status", null)
            ->sum('total');
    }

    public function updateJumlah($id, $data)
    {
        return DB::table('cart')
            ->where("id_cart", $id)
            ->update($data);
    }

    public function updateCart($id, $data)
    {
        return DB::table('cart')
            ->where("id_pelanggan", $id)
            ->update($data);
    }
    public function getDetailCart($id)
    {
        return DB::table('cart')
            ->join('produk', 'produk.id_produk', '=', 'cart.id_produk')
            ->where("id_cart", $id)->first();
    }

    public function createPemesanan($data)
    {
        return DB::table('pemesanan')->insert($data);
    }

    public function insertPemesanan($data)
    {
        return DB::table('pemesanan')->insert($data);
    }

    public function deletedataCart($id)
    {
        DB::table('cart')->where('id_cart', $id)->delete();
    }

    // public function getdaftarPemesanan($id_pelanggan){
    //     return DB::table('pemesanan')
    //         ->join('cart','cart.id_pemesanan','=','pemesanan.id_pemesanan')
    //         ->join('produk','produk.id_produk','=','cart.id_produk')
    //         ->where("cart.id_pelanggan", $id_pelanggan)
    //         ->where("cart.id_pemesanan", NOT NULL)
    //         ->groupBy('cart.id_pemesanan')
    //         ->get();
    // }

    public function getdaftarPemesanan($id_pelanggan)
    {
        return DB::table('pemesanan')
            ->where("id_pelanggan", $id_pelanggan)
            ->get();
    }

    public function getPemesanan($id_pelanggan, $id)
    {
        return DB::table('pemesanan')
            ->where("id_pelanggan", $id_pelanggan)
            ->where("id_pemesanan", $id)
            ->get();
    }

    // =================================================

    public function getBelumBayar($id_pelanggan)
    {
        return DB::table('pemesanan')
            ->where("pemesanan.id_pelanggan", $id_pelanggan)
            ->where("pemesanan.status", "Belum Lunas")
            ->get();
    }
    public function getBelumProses($id_pelanggan)
    {
        return DB::table('pemesanan')
            ->where("pemesanan.id_pelanggan", $id_pelanggan)
            ->where("pemesanan.status", "Proses")
            ->get();
    }
    public function getBelumSelesai($id_pelanggan)
    {
        return DB::table('pemesanan')
            ->where("pemesanan.id_pelanggan", $id_pelanggan)
            ->where("pemesanan.status", "Selesai")
            ->get();
    }

    public function getDetail($id)
    {
        return DB::table('pemesanan')
            ->where("id_pemesanan", $id)
            ->first();
    }

    public function getCartDetail($id)
    {
        return DB::table('cart')
            ->join('produk', 'produk.id_produk', '=', 'cart.id_produk')
            ->where("id_pemesanan", $id)
            ->get();
    }

    public function updateDetail($id, $data)
    {
        DB::table('pemesanan')->where('id_pemesanan', $id)->update($data);
    }
    
    public function getHarga($id)
    {
        return DB::table('harga')
            ->join('produk', 'produk.id_produk', '=', 'harga.id_produk')
            ->where('harga.id_produk', $id)
            ->get();
    }
}