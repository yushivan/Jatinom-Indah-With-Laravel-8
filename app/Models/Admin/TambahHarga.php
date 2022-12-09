<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TambahHarga extends Model
{
    use HasFactory;

    public function getHarga($id)
    {
        return DB::table('harga')
            ->join('produk', 'produk.id_produk', '=', 'harga.id_produk')
            ->where('harga.id_produk', $id)
            ->orderBy('harga.id', 'desc')
            ->paginate(15);
    }

    public function getProduk($id)
    {
        return DB::table('produk')
            ->where('id_produk', $id)
            ->first();
    }

    public function createHarga($data)
    {
        return DB::table('harga')->insert($data);
    }

    public function showHarga($id)
    {
        return DB::table('harga')
            ->where('id', $id)
            ->first();
    }

    public function editHarga($id, $data)
    {
        DB::table('harga')->where('id', $id)->update($data);
    }

    public function destroyHarga($id)
    {
        DB::table('harga')->where('id', $id)->delete();
    }

    public function cariKategori($request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('kategori')
            ->where('nama_kategori', 'like', "%" . $cari . "%")
            ->paginate(15);
    }
}