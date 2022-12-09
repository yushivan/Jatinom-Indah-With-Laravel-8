<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fasilitas extends Model
{
    use HasFactory;

    public function getFasilitas(){
        return DB::table('fasilitas')
            ->orderBy('id_fasilitas', 'desc')
            ->paginate(10);
    }

    public function createFasilitas($data){
        return DB::table('fasilitas')->insert($data);
    }

    public function showFasilitas($id) {
        return DB::table('fasilitas')
            ->where('id_fasilitas', $id)
            ->first();
    }

    public function editFasilitas($id, $data) {
        DB::table('fasilitas')->where('id_fasilitas',$id)->update($data);
    }

    public function destroyFasilitas($id) {
        DB::table('fasilitas')->where('id_fasilitas',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(storage_path('public/fasilitas/'.$data->gambar_fasilitas));
    }

    public function cariFasilitas($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('fasilitas')
            ->where('nama_fasilitas','like',"%".$cari."%")
            ->paginate(15);
    }
}