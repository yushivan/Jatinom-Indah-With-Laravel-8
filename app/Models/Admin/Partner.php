<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    use HasFactory;

    public function getPartner(){
        return DB::table('partner')
            ->orderBy('id_partner', 'desc')
            ->paginate(10);
    }

    public function createPartner($data){
        return DB::table('partner')->insert($data);
    }

    public function showPartner($id) {
        return DB::table('partner')
            ->where('id_partner', $id)
            ->first();
    }

    public function editPartner($id, $data) {
        DB::table('partner')->where('id_partner',$id)->update($data);
    }

    public function destroyPartner($id) {
        DB::table('partner')->where('id_partner',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(storage_path('public/partner/'.$data->gambar_partner));
    }

    public function cariPartner($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('partner')
            ->where('nama_partner','like',"%".$cari."%")
            ->paginate(15);
    }
}