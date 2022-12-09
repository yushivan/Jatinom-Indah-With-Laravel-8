<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Expertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    public function __construct() {
        $this->Expertise = new Expertise();
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
            'expertise' => $this->Expertise->getExpertise()
        ];
        return view('admin.expertise.expertise', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expertise.expertise_tambah');
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
            'nama_expertise' => 'required',
            'gambar_expertise' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_expertise.required' => 'Nama Expertise harus di isi',
            'gambar_expertise.required' => 'Foto harus di isi',
            'gambar_expertise.max' => 'Foto maksimal 3 mb harus di isi',
            'gambar_expertise.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_expertise;
        $fileName = Request()->nama_expertise . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/expertise'), $fileName);


        $data = [
            'nama_expertise' => Request()->nama_expertise,
            'deskripsi_expertise' => Request()->deskripsi_expertise,
            'gambar_expertise' => $fileName
        ];
        $this->Expertise->createExpertise($data);
        return redirect()->route('expertise')->with('pesan', 'Data Expertise berhasil ditambahkan');
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
            'expertise' => $this->Expertise->showExpertise($id)
        ];
        return view('admin.expertise.expertise_edit', $data);
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
            'nama_expertise' => 'required',
            'gambar_expertise' => 'max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_expertise.required' => 'Nama Expertise harus di isi',
            'gambar_expertise.max' => 'Foto maksimal 3 mb harus di isi',
            'gambar_expertise.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_expertise <> "") {
            $file = Request()->gambar_expertise;
            $data = $this->Expertise->showExpertise($id);
            $fileName = $data->gambar_expertise;
            $file->move(public_path('upload/expertise'), $fileName);

            $data = [
                'nama_expertise' => Request()->nama_expertise,
                'deskripsi_expertise' => Request()->deskripsi_expertise,
                'gambar_expertise' => $fileName
            ];
            $this->Expertise->editExpertise($id, $data);
        } else {
            $data = [
                'nama_expertise' => Request()->nama_expertise,
                'deskripsi_expertise' => Request()->deskripsi_expertise
            ];
            $this->Expertise->editExpertise($id, $data);
        }
        return redirect()->route('expertise')->with('pesan', 'Data Expertise berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Expertise->showExpertise($id);
        $this->Expertise->deleteImage($data);

        $this->Expertise->destroyExpertise($id);
        return redirect()->route('expertise')->with('pesan', 'Data Expertise berhasil di hapus');
    }

    public function cariExpertise(Request $request)
	{
        $data = [
            'expertise' => $this->Expertise->cariExpertise($request)
        ];
        return view('admin.expertise.expertise', $data);
	}
}