<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct() {
        $this->BlogModel = new BlogModel();
    }
    public function index()
    {
        $data = [
            'blog' => $this->BlogModel->getBlog()
        ];
        return view('user/v_blog',$data);
    }
    public function getDetailBlog($id){
        $data = [
            'blog' => $this->BlogModel->getDetailBlog($id)
        ];
        return view('user/v_detail-blog', $data);

    }
}