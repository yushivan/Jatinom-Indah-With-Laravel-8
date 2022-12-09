<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function __construct() {
        $this->Kategori = new KategoriProduk();
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
            'kategori' => $this->Kategori->getKategori()
        ];
        return view('admin.kategori-produk.kategori_produk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori-produk.kategori_produk_tambah');
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
            'nama_kategori' => 'required'
        ], [
            'nama_kategori.required' => 'Nama kategori harus di isi'
        ]);


        $data = [
            'nama_kategori' => Request()->nama_kategori
        ];
        $this->Kategori->createKategori($data);
        return redirect()->route('kategori-produk')->with('pesan', 'Data kategori berhasil ditambahkan');
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
            'kategori' => $this->Kategori->showKategori()
        ];
        return view('admin.produk.produk_edit', $data);
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
            'kategori' => $this->Kategori->showKategori($id)
        ];
        return view('admin.kategori-produk.kategori_produk_edit', $data);
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
            'nama_kategori' => 'required'
        ], [
            'nama_kategori.required' => 'Nama kategori harus di isi'
        ]);


        $data = [
            'nama_kategori' => Request()->nama_kategori
        ];
        $this->Kategori->editKategori($id, $data);
        return redirect()->route('kategori-produk')->with('pesan', 'Data kategori berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Kategori->destroyKategori($id);
        return redirect()->route('kategori-produk')->with('pesan', 'Data kategori produk berhasil di hapus');
    }

    public function cariKategori(Request $request)
	{
        $data = [
            'kategori' => $this->Kategori->cariKategori($request)
        ];
        return view('admin.kategori-produk.kategori_produk', $data);
	}
}