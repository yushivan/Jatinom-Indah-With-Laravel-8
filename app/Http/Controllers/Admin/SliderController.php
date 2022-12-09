<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct() {
        $this->Slider = new Slider();
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
            'slider' => $this->Slider->getSlider()
        ];
        return view('admin.slider.slider', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.slider_tambah');
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
            'judul_slider' => 'required',
            'caption_slider' => 'required',
            'link_slider' => 'required',
            'gambar_slider' => 'required|max:5000|mimes:png,jpg,jpeg,bmp'
        ], [
            'judul_slider.required' => 'Judul Slider harus di isi',
            'caption_slider.required' => 'Caption Slider harus di isi',
            'link_slider.required' => 'Link Slider harus di isi',
            'gambar_slider.required' => 'Foto harus di isi',
            'gambar_slider.max' => 'Foto maksmimal 5 mb harus di isi',
            'gambar_slider.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);

        $file = Request()->gambar_slider;
        $fileName = Request()->judul_slider . '-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/slider'), $fileName);


        $data = [
            'judul_slider' => Request()->judul_slider,
            'caption_slider' => Request()->caption_slider,
            'link_slider' => Request()->link_slider,
            'gambar_slider' => $fileName
        ];
        $this->Slider->createSlider($data);
        return redirect()->route('slider')->with('pesan', 'Data Slider berhasil ditambahkan');
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
            'slider' => $this->Slider->showSlider($id)
        ];
        return view('admin.slider.slider_edit', $data);
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
            'judul_slider' => 'required',
            'caption_slider' => 'required',
            'link_slider' => 'required',
            'gambar_slider' => 'max:5000|mimes:png,jpg,jpeg,bmp'
        ], [
            'judul_slider.required' => 'Judul Slider harus di isi',
            'caption_slider.required' => 'Caption Slider harus di isi',
            'link_slider.required' => 'Link Slider harus di isi',
            'gambar_slider.max' => 'Foto maksmimal 5 mb harus di isi',
            'gambar_slider.mimes' => 'Foto harus png,jpg,jpeg,bmp'
        ]);


        if (Request()->gambar_slider <> "") {
            // $file = Request()->nama_partner;
            $data = $this->Slider->showSlider($id);
            $fileName = $data->gambar_slider;
            Storage::putFileAs('public/images/slider', $request->file('gambar_slider'), $fileName);

            $data = [
                'judul_slider' => Request()->judul_slider,
                'caption_slider' => Request()->caption_slider,
                'link_slider' => Request()->link_slider,
                'gambar_slider' => $fileName
            ];
            $this->Slider->editSlider($id, $data);
        } else {
            $data = [
                'judul_slider' => Request()->judul_slider,
                'caption_slider' => Request()->caption_slider,
                'link_slider' => Request()->link_slider
            ];
            $this->Slider->editSlider($id, $data);
        }
        return redirect()->route('slider')->with('pesan', 'Data Slider berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->Slider->showSlider($id);
        $this->Slider->deleteImage($data);

        $this->Slider->destroySlider($id);
        return redirect()->route('slider')->with('pesan', 'Data Slider berhasil di hapus');
    }

    public function cariSlider(Request $request)
	{
        $data = [
            'slider' => $this->Slider->cariSlider($request)
        ];
        return view('admin.slider.slider', $data);
	}
}