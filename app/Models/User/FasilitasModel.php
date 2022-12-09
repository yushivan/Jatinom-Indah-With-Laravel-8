<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FasilitasModel extends Model
{
    use HasFactory;

    public function getFasilitas(){
        return DB::table('fasilitas')->get();
    }

}