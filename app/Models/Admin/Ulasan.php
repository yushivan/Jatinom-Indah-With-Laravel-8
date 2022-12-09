<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ulasan extends Model
{
    use HasFactory;

    public function getUlasan(){
        return DB::table('ulasan')
            ->orderBy('id_ulasan', 'desc')
            ->paginate(15);
    }

    public function showUlasan($id) {
        return DB::table('ulasan')
            ->where('id_ulasan', $id)
            ->first();
    }

    public function destroyUlasan($id) {
        DB::table('ulasan')->where('id_Ulasan',$id)->delete();
    }

    public function cariUlasan($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('ulasan')
            ->where('nama_ulasan','like',"%".$cari."%")
            ->paginate(15);
    }
}