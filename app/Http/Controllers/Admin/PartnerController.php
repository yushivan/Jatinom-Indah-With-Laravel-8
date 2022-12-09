<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function __construct() {
        $this->Partner = new Partner();
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
            'partner' => $this->Partner->getPartner()
        ];
        return view('admin.partner.partner', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.partner_tambah');
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
            'nama_partner' => 'required',
            'link_partner' => 'required',
            'gambar_partner' => 'required|max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_partner.required' => 'Nama Partner harus di isi',
            'link_partner.required' => 'Link Partner harus di isi',
            'gambar_partner.required' => 'Foto harus di isi',
            'gambar_partner.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_partner.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_partner;
        $fileName = Request()->nama_partner . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/partner'), $fileName);


        $data = [
            'nama_partner' => Request()->nama_partner,
            'link_partner' => Request()->link_partner,
            'gambar_partner' => $fileName
        ];
        $this->Partner->createPartner($data);
        return redirect()->route('partner')->with('pesan', 'Data Partner berhasil ditambahkan');
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
            'partner' => $this->Partner->showPartner($id)
        ];
        return view('admin.partner.partner_edit', $data);
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
            'nama_partner' => 'required',
            'link_partner' => 'required',
            'gambar_partner' => 'max:3000|mimes:png,jpg,jpeg,bmp'
        ], [
            'nama_partner.required' => 'Nama Anak Perusahaan harus di isi',
            'link_partner.required' => 'Nama Anak Perusahaan harus di isi',
            'gambar_partner.max' => 'Foto maksmimal 3 mb harus di isi',
            'gambar_partner.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_partner <> "") {
            $file = Request()->gambar_partner;
            $data = $this->Partner->showPartner($id);
            $fileName = $data->gambar_partner;
            $file->move(public_path('upload/partner'), $fileName);

            $data = [
                'nama_partner' => Request()->nama_partner,
                'link_partner' => Request()->link_partner,
                'gambar_ap' => $fileName
            ];
            $this->Partner->editPartner($id, $data);
        } else {
            $data = [
                'nama_partner' => Request()->nama_partner,
                'link_partner' => Request()->link_partner
            ];
            $this->Partner->editPartner($id, $data);
        }
        return redirect()->route('partner')->with('pesan', 'Data Partner berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Partner->showPartner($id);
        $this->Partner->deleteImage($data);

        $this->Partner->destroyPartner($id);
        return redirect()->route('partner')->with('pesan', 'Data Partner berhasil di hapus');
    }

    public function cariPartner(Request $request)
	{
        $data = [
            'partner' => $this->Partner->cariPartner($request)
        ];
        return view('admin.partner.partner', $data);
	}
}