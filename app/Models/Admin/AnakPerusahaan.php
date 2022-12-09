<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnakPerusahaan extends Model
{
    use HasFactory;

    public function getAnakPerusahaan(){
        return DB::table('anak_perusahaan')
            ->orderBy('id_ap', 'desc')
            ->paginate(10);
    }

    public function createAnakPerusahaan($data){
        return DB::table('anak_perusahaan')->insert($data);
    }

    public function showAnakPerusahaan($id) {
        return DB::table('anak_perusahaan')
            ->where('id_ap', $id)
            ->first();
    }

    public function editAnakPerusahaan($id, $data) {
        DB::table('anak_perusahaan')->where('id_ap',$id)->update($data);
    }

    public function destroyAnakPerusahaan($id) {
        DB::table('anak_perusahaan')->where('id_ap',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(public_path('upload/anak_perusahaan/'.$data->gambar_ap));
    }

    public function cariAnakPerusahaan($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('anak_perusahaan')
            ->where('nama_ap','like',"%".$cari."%")
            ->paginate(10);
    }
}