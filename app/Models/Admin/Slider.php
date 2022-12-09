<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    use HasFactory;

    public function getSlider(){
        return DB::table('slider')
            ->orderBy('id_slider', 'desc')
            ->paginate(10);
    }

    public function createSlider($data){
        return DB::table('slider')->insert($data);
    }

    public function showSlider($id) {
        return DB::table('slider')
            ->where('id_slider', $id)
            ->first();
    }

    public function editSlider($id, $data) {
        DB::table('slider')->where('id_slider',$id)->update($data);
    }

    public function destroySlider($id) {
        DB::table('slider')->where('id_slider',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(public_path('upload/slider/'.$data->gambar_slider));
    }

    public function cariSlider($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('slider')
            ->where('judul_slider','like',"%".$cari."%")
            ->paginate(15);
    }
}