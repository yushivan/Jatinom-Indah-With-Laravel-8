<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    public function __construct() {
        $this->Fasilitas = new Fasilitas();
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
            'fasilitas' => $this->Fasilitas->getFasilitas()
        ];
        return view('admin.fasilitas.fasilitas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fasilitas.fasilitas_tambah');
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
            'nama_fasilitas' => 'required',
            'gambar_fasilitas' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_fasilitas.required' => 'Nama Fasilitas harus di isi',
            'gambar_fasilitas.required' => 'Foto harus di isi',
            'gambar_fasilitas.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_fasilitas.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_fasilitas;
        $fileName = Request()->nama_fasilitas . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/fasilitas'), $fileName);


        $data = [
            'nama_fasilitas' => Request()->nama_fasilitas,
            'gambar_fasilitas' => $fileName
        ];
        $this->Fasilitas->createFasilitas($data);
        return redirect()->route('fasilitas')->with('pesan', 'Data Fasilitas berhasil ditambahkan');
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
            'fasilitas' => $this->Fasilitas->showFasilitas($id)
        ];
        return view('admin.fasilitas.fasilitas_edit', $data);
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
            'nama_fasilitas' => 'required',
            'gambar_fasilitas' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_fasilitas.required' => 'Nama Anak Perusahaan harus di isi',
            'gambar_fasilitas.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_fasilitas.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_fasilitas <> "") {
            $file = Request()->nama_Fasilitas;
            $data = $this->Fasilitas->showFasilitas($id);
            $fileName = $data->gambar_fasilitas;
            $file->move(public_path('upload/fasilitas'), $fileName);

            $data = [
                'nama_fasilitas' => Request()->nama_fasilitas,
                'gambar_fasilitas' => $fileName
            ];
            $this->Fasilitas->editFasilitas($id, $data);
        } else {
            $data = [
                'nama_fasilitas' => Request()->nama_fasilitas
            ];
            $this->Fasilitas->editFasilitas($id, $data);
        }
        return redirect()->route('fasilitas')->with('pesan', 'Data Fasilitas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Fasilitas->showFasilitas($id);
        $this->Fasilitas->deleteImage($data);

        $this->Fasilitas->destroyFasilitas($id);
        return redirect()->route('fasilitas')->with('pesan', 'Data Fasilitas berhasil di hapus');
    }

    public function cariFasilitas(Request $request)
	{
        $data = [
            'fasilitas' => $this->Fasilitas->cariFasilitas($request)
        ];
        return view('admin.fasilitas.fasilitas', $data);
	}
}