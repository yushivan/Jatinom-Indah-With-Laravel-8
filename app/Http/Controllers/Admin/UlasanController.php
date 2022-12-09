<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function __construct() {
        $this->Ulasan = new Ulasan();
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
            'ulasan' => $this->Ulasan->getUlasan()
        ];
        return view('admin.ulasan.ulasan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'ulasan' => $this->Ulasan->showUlasan($id)
        ];
        return view('admin.ulasan.ulasan_detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Ulasan->destroyUlasan($id);
        return redirect()->route('ulasan')->with('pesan', 'Data Ulasan berhasil di hapus');
    }

    public function cariUlasan(Request $request)
	{
        $data = [
            'ulasan' => $this->Ulasan->cariUlasan($request)
        ];
        return view('admin.ulasan.ulasan', $data);
	}
}