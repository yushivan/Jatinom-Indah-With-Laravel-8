<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->Produk = new Produk();
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
            'produk' => $this->Produk->getProduk()
        ];
        return view('admin.produk.produk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kategori' => $this->Produk->getKategori()
        ];
        return view('admin.produk.produk_tambah', $data);
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
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'tampil' => 'required',
            'id_kategori' => 'required',
            'gambar_produk' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_produk.required' => 'Nama produk harus di isi',
            'id_kategori.required' => 'Kategori produk harus di isi',
            'deskripsi_produk.required' => 'Deskripsi produk harus di isi',
            'tampil.required' => 'Tampil harus di isi',
            'gambar_produk.required' => 'Foto harus di isi',
            'gambar_produk.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_produk.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_produk;
        $fileName = Request()->nama_produk . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/produk'), $fileName);


        $data = [
            'nama_produk' => Request()->nama_produk,
            'id_kategori' => Request()->id_kategori,
            'deskripsi_produk' => Request()->deskripsi_produk,
            'tampil' => Request()->tampil,
            'gambar_produk' => $fileName
        ];
        $this->Produk->createProduk($data);
        return redirect()->route('produk')->with('pesan', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'produk' => $this->Produk->showProduk($id),
            'kategori' => $this->Produk->getKategori()
        ];
        return view('admin.produk.produk_edit', $data);
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
        $validated = $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'tampil' => 'required',
            'id_kategori' => 'required',
            'gambar_produk' => 'max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_produk.required' => 'Nama produk harus di isi',
            'id_kategori.required' => 'Kategori produk harus di isi',
            'deskripsi_produk.required' => 'Deskripsi produk harus di isi',
            'tampil.required' => 'Tampil harus di isi',
            'gambar_produk.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_produk.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_produk <> "") {
            // $file = Request()->gambar_produk;
            $data = $this->Produk->showProduk($id);
            $fileName = $data->gambar_produk;
            Storage::putFileAs('public/images/produk', $request->file('gambar_produk'), $fileName);

            $data = [
                'nama_produk' => Request()->nama_produk,
                'id_kategori' => Request()->id_kategori,
                'deskripsi_produk' => Request()->deskripsi_produk,
                'tampil' => Request()->tampil,
                'gambar_produk' => $fileName
            ];
            $this->Produk->editProduk($id, $data);
        } else {
            $data = [
                'nama_produk' => Request()->nama_produk,
                'id_kategori' => Request()->id_kategori,
                'deskripsi_produk' => Request()->deskripsi_produk,
                'tampil' => Request()->tampil
            ];
            $this->Produk->editProduk($id, $data);
        }


        return redirect()->route('produk')->with('pesan', 'Data produk berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Produk->showProduk($id);
        $this->Produk->deleteImage($data);

        $this->Produk->destroyProduk($id);
        return redirect()->route('produk')->with('pesan', 'Data produk berhasil di hapus');
    }

    public function cariProduk(Request $request)
    {
        $data = [
            'produk' => $this->Produk->cariProduk($request)
        ];
        return view('admin.produk.produk', $data);
    }
}