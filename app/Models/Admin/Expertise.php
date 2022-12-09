<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expertise extends Model
{
    use HasFactory;

    public function getExpertise(){
        return DB::table('expertise')
            ->orderBy('id_expertise', 'desc')
            ->paginate(10);
    }

    public function createExpertise($data){
        return DB::table('expertise')->insert($data);
    }

    public function showExpertise($id) {
        return DB::table('expertise')
            ->where('id_expertise', $id)
            ->first();
    }

    public function editExpertise($id, $data) {
        DB::table('expertise')->where('id_expertise',$id)->update($data);
    }

    public function destroyExpertise($id) {
        DB::table('expertise')->where('id_expertise',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(public_path('upload/expertise/'.$data->gambar_expertise));
    }

    public function cariExpertise($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('expertise')
            ->where('nama_expertise','like',"%".$cari."%")
            ->paginate(10);
    }
}