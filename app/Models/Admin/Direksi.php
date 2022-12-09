<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Direksi extends Model
{
    use HasFactory;

    public function getDireksi(){
        return DB::table('direksi')
            ->orderBy('id_direksi', 'desc')
            ->paginate(10);
    }

    public function createDireksi($data){
        return DB::table('direksi')->insert($data);
    }

    public function showDireksi($id) {
        return DB::table('direksi')
            ->where('id_direksi', $id)
            ->first();
    }

    public function editDireksi($id, $data) {
        DB::table('direksi')->where('id_direksi',$id)->update($data);
    }

    public function destroyDireksi($id) {
        DB::table('direksi')->where('id_direksi',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(public_path('upload/direksi/'.$data->gambar_direksi));
    }

    public function cariDireksi($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('direksi')
            ->where('nama_direksi','like',"%".$cari."%")
            ->paginate(10);
    }
}