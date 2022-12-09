<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeModel extends Model
{
    use HasFactory;

    public function getSlider(){
        return DB::table('slider')->get();
    }

    public function getAnakPerusahaan()
    {
        return DB::table('anak_perusahaan')->get();
    }

    public function getProduk()
    {
        return DB::table('produk')
            ->orderBy('id_produk', 'desc')
            ->take(4)
            ->get();
    }

    public function getPartner()
    {
        return DB::table('partner')->get();
    }
    
    public function getExpertise()
    {
        return DB::table('expertise')->get();
    }

     public function getUlasan()
    {
        return DB::table('ulasan')->get();
    }

    public function getDetailAp($id) {
        return DB::table('anak_perusahaan')->where("id_ap", $id)->first();
    }
}