<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriProduk extends Model
{
    use HasFactory;

    public function getKategori(){
        return DB::table('kategori')
            ->orderBy('id_kategori', 'desc')
            ->paginate(15);
    }

    public function createKategori($data){
        return DB::table('kategori')->insert($data);
    }

    public function showKategori($id) {
        return DB::table('kategori')
            ->where('id_kategori', $id)
            ->first();
    }

    public function editKategori($id, $data) {
        DB::table('kategori')->where('id_kategori',$id)->update($data);
    }

    public function destroyKategori($id) {
        DB::table('kategori')->where('id_kategori',$id)->delete();
    }

    public function cariKategori($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('kategori')
            ->where('nama_kategori','like',"%".$cari."%")
            ->paginate(15);
    }
}