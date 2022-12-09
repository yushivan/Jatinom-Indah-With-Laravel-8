<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AnakPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnakPerusahaanController extends Controller
{
    public function __construct() {
        $this->AnakPerusahaan = new AnakPerusahaan();
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
            'anakPerusahaan' => $this->AnakPerusahaan->getAnakPerusahaan()
        ];
        return view('admin.anak-perusahaan.anak_perusahaan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anak-perusahaan.anak_perusahaan_tambah');
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
            'nama_ap' => 'required',
            'gambar_ap' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_ap.required' => 'Nama Anak Perusahaan harus di isi',
            'gambar_ap.required' => 'Foto harus di isi',
            'gambar_ap.max' => 'Foto maksimal 3 mb harus di isi',
            'gambar_ap.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_ap;
        $fileName = Request()->nama_ap . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/anak_perusahaan'), $fileName);


        $data = [
            'nama_ap' => Request()->nama_ap,
            'deskripsi_ap' => Request()->deskripsi_ap,
            'link_ap' => Request()->link_ap,
            'gambar_ap' => $fileName
        ];
        $this->AnakPerusahaan->createAnakPerusahaan($data);
        return redirect()->route('anak-perusahaan')->with('pesan', 'Data Anak Perusahaan berhasil ditambahkan');
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
            'anakPerusahaan' => $this->AnakPerusahaan->showAnakPerusahaan($id)
        ];
        return view('admin.anak-perusahaan.anak_perusahaan_edit', $data);
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
            'nama_ap' => 'required',
            'gambar_ap' => 'max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_ap.required' => 'Nama Anak Perusahaan harus di isi',
            'gambar_ap.max' => 'Foto maksimal 3 mb harus di isi',
            'gambar_ap.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_ap <> "") {
            $file = Request()->gambar_ap;
            $data = $this->AnakPerusahaan->showAnakPerusahaan($id);
            $fileName = $data->gambar_ap;
            $file->move(public_path('upload/anak_perusahaan'), $fileName);

            $data = [
                'nama_ap' => Request()->nama_ap,
                'deskripsi_ap' => Request()->deskripsi_ap,
                'link_ap' => Request()->link_ap,
                'gambar_ap' => $fileName
            ];
            $this->AnakPerusahaan->editAnakPerusahaan($id, $data);
        } else {
            $data = [
                'nama_ap' => Request()->nama_ap,
                'deskripsi_ap' => Request()->deskripsi_ap,
                'link_ap' => Request()->link_ap
            ];
            $this->AnakPerusahaan->editAnakPerusahaan($id, $data);
        }
        return redirect()->route('anak-perusahaan')->with('pesan', 'Data Anak Perusahaan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->AnakPerusahaan->showAnakPerusahaan($id);
        $this->AnakPerusahaan->deleteImage($data);

        $this->AnakPerusahaan->destroyAnakPerusahaan($id);
        return redirect()->route('anak-perusahaan')->with('pesan', 'Data Anak Perusahaan berhasil di hapus');
    }

    public function cariAnakPerusahaan(Request $request)
	{
        $data = [
            'anakPerusahaan' => $this->AnakPerusahaan->cariAnakPerusahaan($request)
        ];
        return view('admin.anak-perusahaan.anak_perusahaan', $data);
	}
}