<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;

    public function getPelanggan()
    {
        return DB::table('users')
            ->where("level", "2")
            ->orderBy('id', 'desc')
            ->paginate(15);
    }

    public function createPelanggan($data)
    {
        return DB::table('users')->insert($data);
    }

    public function showPelanggan($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->first();
    }

    public function editPelanggan($id, $data)
    {
        DB::table('users')->where('id', $id)->update($data);
    }

    public function destroyPelanggan($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }

    public function cariPelanggan($request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('users')
            ->where('name', 'like', "%" . $cari . "%")
            ->paginate(15);
    }
}