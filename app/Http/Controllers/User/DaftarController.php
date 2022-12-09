<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function __construct() {
        // $this->Home = new Home();
    }
    public function index()
    {
        // $data = [
        //     'slider' => $this->Home->getCarousel(),
        //     'tim' => $this->Home->getTim(),
        //     'berita' => $this->Home->getBerita(),
        //     'galeri' => $this->Home->getGaleri(),
        //     'sponsor' => $this->Home->getSponsor() 
        // ];
        return view('user/v_daftar');
    }
    
    public function simpan(Request $request){
        
        User::create([
        	'name' => $request->name,
        	'level'=> '2',
        	'email'=> $request->email,
        	'password'=> bcrypt($request->password),
        	'no_telp' => $request->no_telp,
        	'provinsi'=> $request->provinsi,
        	'kab_kota'=> $request->kab_kota,
        	'kecamatan'=>$request->kecamatan,
        	'kelurahan'=>$request->kelurahan,
        	'alamat'=> $request->alamat,
        ]);
        return view('/user/v_login');
    }
}