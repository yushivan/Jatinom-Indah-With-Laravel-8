<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tentang extends Model
{
    use HasFactory;

    public function createUlasan($data)
    {
        return DB::table('ulasan')->insert($data);
    }
    
    public function getDireksi()
    {
        return DB::table('direksi')->get();
    }
}