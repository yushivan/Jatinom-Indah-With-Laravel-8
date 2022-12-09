<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->Tentang = new Tentang();
    }

    public function index()
    {
        $data = [
            'direksi' => $this->Tentang->getDireksi()
        ];
        return view('user/v_tentang',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'ulasan' => 'required'
        ], [
            'nama.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'ulasan.required' => 'Ulasan harus di isi'
        ]);

        $data = [
            'nama_ulasan' => Request()->nama,
            'email_ulasan' => Request()->email,
            'isi_ulasan' => Request()->ulasan,
            'tgl_ulasan' => date("Y-m-d")
        ];
        $this->Tentang->createUlasan($data);
        return redirect()->route('ulasan-user')->with('pesan', 'Terimakasih atas ulasan yang diberikan');
    }
}