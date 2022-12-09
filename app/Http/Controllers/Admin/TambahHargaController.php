<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TambahHarga;
use Illuminate\Http\Request;

class TambahHargaController extends Controller
{
    public function __construct()
    {
        $this->Harga = new TambahHarga();
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = [
            'harga' => $this->Harga->getHarga($id),
            'harga_id' => $this->Harga->getProduk($id)
        ];
        return view('admin.produk.tambah', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = [
            'harga' => $this->Harga->getProduk($id)
        ];
        return view('admin.produk.tambah_tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $request->validate([
            'harga' => 'required',
            'satuan' => 'required'
        ], [
            'harga.required' => 'Harga harus di isi',
            'satuan.required' => 'Satuan harus di isi'
        ]);


        $data = [
            'id_produk' => Request()->id_produk,
            'harga' => Request()->harga,
            'satuan' => Request()->satuan
        ];
        $this->Harga->createHarga($data);
        return redirect()->route('harga', $id)->with('pesan', 'Data harga berhasil ditambahkan');
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
    public function edit($id, $id_tambah)
    {
        $data = [
            'harga_id' => $this->Harga->getProduk($id),
            'harga' => $this->Harga->showHarga($id_tambah)
        ];
        return view('admin.produk.tambah_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_tambah)
    {
        $request->validate([
            'harga' => 'required',
            'satuan' => 'required'
        ], [
            'harga.required' => 'Harga harus di isi',
            'satuan.required' => 'Satuan harus di isi'
        ]);


        $data = [
            'id_produk' => Request()->id_produk,
            'harga' => Request()->harga,
            'satuan' => Request()->satuan
        ];
        $this->Harga->editHarga($id_tambah, $data);
        return redirect()->route('harga', $id)->with('pesan', 'Data harga berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id_tambah)
    {
        $this->Harga->destroyHarga($id_tambah);
        return redirect()->route('harga', $id)->with('pesan', 'Data harga berhasil dihapus');
    }
}