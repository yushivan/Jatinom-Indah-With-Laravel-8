<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogModel extends Model
{
    use HasFactory;

    public function getBlog()
    {
        return DB::table('blog')->orderBy('id_blog', 'desc')->get();
    }

    public function getDetailBlog($id) {
        return DB::table('blog')->where("id_blog", $id)->first();
    }
}