<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct() {
        $this->Blog = new Blog();
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'blog' => $this->Blog->getBlog()
        ];
        return view('admin.blog.blog', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.blog_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_blog' => 'required',
            'isi_blog' => 'required',
            'gambar_blog' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'judul_blog.required' => 'Judul Blog harus di isi',
            'isi_blog.required' => 'Isi Blog harus di isi',
            'gambar_blog.required' => 'Foto harus di isi',
            'gambar_blog.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_blog.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_blog;
        $fileName = Request()->judul_blog . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/blog'), $fileName);


        $data = [
            'judul_blog' => Request()->judul_blog,
            'isi_blog' => Request()->isi_blog,
            'tanggal_blog' => date('Y-m-d H:i:s'),
            'gambar_Blog' => $fileName
        ];
        $this->Blog->createBlog($data);
        return redirect()->route('blog')->with('pesan', 'Data Blog berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'blog' => $this->Blog->showBlog($id)
        ];
        return view('admin.blog.blog_detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'blog' => $this->Blog->showBlog($id)
        ];
        return view('admin.blog.blog_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_blog' => 'required',
            'isi_blog' => 'required',
            'gambar_blog' => 'max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'judul_blog.required' => 'Judul Blog harus di isi',
            'isi_blog.required' => 'Isi Blog harus di isi',
            'gambar_blog.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_blog.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_blog <> "") {
            $file = Request()->gambar_blog;
            $data = $this->Blog->showBlog($id);
            $fileName = $data->gambar_blog;
            $file->move(public_path('upload/blog'), $fileName);

            $data = [
                'judul_blog' => Request()->judul_blog,
                'isi_blog' => Request()->isi_blog,
                'tanggal_blog' => date('Y-m-d H:i:s'),
                'gambar_blog' => $fileName
            ];
            $this->Blog->editBlog($id, $data);
        } else {
            $data = [
                'judul_blog' => Request()->judul_blog,
                'isi_blog' => Request()->isi_blog,
                'tanggal_blog' => date('Y-m-d H:i:s'),
            ];
            $this->Blog->editBlog($id, $data);
        }
        return redirect()->route('blog')->with('pesan', 'Data Blog berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Blog->showBlog($id);
        $this->Blog->deleteImage($data);

        $this->Blog->destroyBlog($id);
        return redirect()->route('blog')->with('pesan', 'Data Blog berhasil di hapus');
    }

    public function cariBlog(Request $request)
	{
        $data = [
            'blog' => $this->Blog->cariBlog($request)
        ];
        return view('admin.blog.blog', $data);
	}
}