<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    public function getProduk(){
        return DB::table('produk')
            ->join('kategori','kategori.id_kategori', '=', 'produk.id_kategori')
            ->orderBy('id_produk', 'desc')
            ->paginate(15);
    }

    public function getKategori(){
        return DB::table('kategori')->get();
    }

    public function createProduk($data){
        return DB::table('produk')->insert($data);
    }

    public function showProduk($id) {
        return DB::table('produk')
            ->join('kategori','kategori.id_kategori', '=', 'produk.id_kategori')
            ->where('id_produk', $id)
            ->first();
    }

    public function editProduk($id, $data) {
        DB::table('produk')->where('id_produk',$id)->update($data);
    }

    public function destroyProduk($id) {
        DB::table('produk')->where('id_produk',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(public_path('upload/produk/'.$data->gambar_produk));
    }

    public function cariProduk($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('produk')
           ->join('kategori','kategori.id_kategori', '=', 'produk.id_kategori')
            ->where('nama_produk','like',"%".$cari."%")
            ->paginate(15);
    }
}