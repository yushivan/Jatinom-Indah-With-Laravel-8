<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;


    public function getBlog(){
        return DB::table('blog')
            ->orderBy('id_blog', 'desc')
            ->paginate(10);
    }

    public function createBlog($data){
        return DB::table('blog')->insert($data);
    }

    public function showBlog($id) {
        return DB::table('blog')
            ->where('id_blog', $id)
            ->first();
    }

    public function editBlog($id, $data) {
        DB::table('blog')->where('id_blog',$id)->update($data);
    }

    public function destroyBlog($id) {
        DB::table('blog')->where('id_blog',$id)->delete();
    }

    public function deleteImage($data) {
       return unlink(storage_path('public/blog/'.$data->gambar_blog));
    }

    public function cariBlog($request){
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('blog')
            ->where('judul_blog','like',"%".$cari."%")
            ->paginate(15);
    }
}