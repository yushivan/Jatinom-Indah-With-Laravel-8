<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;

    public function getProduk()
    {
        return DB::table('produk')
            ->orderBy('id_produk', 'desc')
            ->get();
    }


    public function getDetailProduk($id)
    {
        return DB::table('produk')->where("id_produk", $id)->first();
    }

    public function getHarga($id)
    {
        return DB::table('harga')
            ->join('produk', 'produk.id_produk', '=', 'harga.id_produk')
            ->where('harga.id_produk', $id)
            ->get();
    }
}