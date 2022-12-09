<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Direksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DireksiController extends Controller
{
    public function __construct() {
        $this->Direksi = new Direksi();
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
            'direksi' => $this->Direksi->getDireksi()
        ];
        return view('admin.direksi.direksi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.direksi.direksi_tambah');
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
            'nama_direksi' => 'required',
            'jabatan_direksi' => 'required',
            'gambar_direksi' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_direksi.required' => 'Nama Direksi harus di isi',
            'jabatan_direksi.required' => 'Jabatan Direksi harus di isi',
            'gambar_direksi.required' => 'Foto harus di isi',
            'gambar_direksi.max' => 'Foto maksimal 3 mb harus di isi',
            'gambar_direksi.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_direksi;
        $fileName = Request()->nama_direksi . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/direksi'), $fileName);


        $data = [
            'nama_direksi' => Request()->nama_direksi,
            'jabatan_direksi' => Request()->jabatan_direksi,
            'gambar_direksi' => $fileName
        ];
        $this->Direksi->createDireksi($data);
        return redirect()->route('direksi')->with('pesan', 'Data Direksi berhasil ditambahkan');
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
            'direksi' => $this->Direksi->showDireksi($id)
        ];
        return view('admin.direksi.direksi_edit', $data);
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
            'nama_direksi' => 'required',
            'jabatan_direksi' => 'required',
            'gambar_direksi' => 'max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_direksi.required' => 'Nama Direksi harus di isi',
            'jabatan_direksi.required' => 'Jabatan Direksi harus di isi',
            'gambar_direksi.max' => 'Foto maksimal 3 mb harus di isi',
            'gambar_direksi.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_direksi <> "") {
            $file = Request()->gambar_direksi;
            $data = $this->Direksi->showDireksi($id);
            $fileName = $data->gambar_direksi;
            $file->move(public_path('upload/direksi'), $fileName);

            $data = [
                'nama_direksi' => Request()->nama_direksi,

                'jabatan_direksi' => Request()->jabatan_direksi,
                'gambar_direksi' => $fileName
            ];
            $this->Direksi->editDireksi($id, $data);
        } else {
            $data = [
                'nama_direksi' => Request()->nama_direksi,

                'jabatan_direksi' => Request()->jabatan_direksi
            ];
            $this->Direksi->editDireksi($id, $data);
        }
        return redirect()->route('direksi')->with('pesan', 'Data Direksi berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Direksi->showDireksi($id);
        $this->Direksi->deleteImage($data);

        $this->Direksi->destroyDireksi($id);
        return redirect()->route('direksi')->with('pesan', 'Data Direksi berhasil di hapus');
    }

    public function cariDireksi(Request $request)
	{
        $data = [
            'direksi' => $this->Direksi->cariDireksi($request)
        ];
        return view('admin.direksi.direksi', $data);
	}
}