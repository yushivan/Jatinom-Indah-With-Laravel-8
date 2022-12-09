<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->Pesanan = new Pesanan();
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'pesanan' => $this->Pesanan->getPesananBelumBayar()
        ];
        return view('admin.pesanan.pesanan', $data);
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
    public function destroyBB($id)
    {
        $data = $this->Pesanan->getPesanan($id);
        $this->Pesanan->deleteImage($data);

        $this->Pesanan->destroyBB($id);
        return redirect()->route('pesanan')->with('pesan', 'Data pemesanan berhasil di hapus');
    }

    public function destroyDP($id)
    {
        $data = $this->Pesanan->getPesanan($id);
        $this->Pesanan->deleteImage($data);

        $this->Pesanan->destroyBB($id);
        return redirect()->route('pesanan-proses')->with('pesan', 'Data pemesanan berhasil di hapus');
    }

    public function destroyS($id)
    {
        $data = $this->Pesanan->getPesanan($id);
        $this->Pesanan->deleteImage($data);

        $this->Pesanan->destroyBB($id);
        return redirect()->route('pesanan-selesai')->with('pesan', 'Data pemesanan berhasil di hapus');
    }

    public function verifikasiPesanan($id)
    {
        $data = [
            'status' => "Proses"
        ];
        $this->Pesanan->verifikasiPesanan($id, $data);
        return redirect()->route('pesanan')->with('pesan', 'Pembayaran sudah diverifikasi');
    }

    public function prosesPesanan($id)
    {
        $data = [
            'status' => "Selesai"
        ];
        $this->Pesanan->prosesPesanan($id, $data);
        return redirect()->route('pesanan-proses')->with('pesan', 'Pesanan sudah selesai diproses');
    }

    public function getDetailBB($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->Pesanan->getPesanan($id),
            'cart' => $this->Pesanan->getCartDetail($id)
        ];
        return view('admin.pesanan.lihat_pemesanan_bb', $data);
    }

    public function getDetailProses($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->Pesanan->getPesanan($id),
            'cart' => $this->Pesanan->getCartDetail($id)
        ];
        return view('admin.pesanan.lihat_pemesanan_proses', $data);
    }

    public function getDetailSelesai($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->Pesanan->getPesanan($id),
            'cart' => $this->Pesanan->getCartDetail($id)
        ];
        return view('admin.pesanan.lihat_pemesanan_selesai', $data);
    }

    public function getDetailBP($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->Pesanan->getPesanan($id)
        ];
        return view('admin.pesanan.lihat_bukti', $data);
    }

    public function getPesananProses()
    {
        $data = [
            'pesanan' => $this->Pesanan->getPesananProses()
        ];
        return view('admin.pesanan.diproses', $data);
    }

    public function getPesananSelesai()
    {
        $data = [
            'pesanan' => $this->Pesanan->getPesananSelesai()
        ];
        return view('admin.pesanan.selesai', $data);
    }


    public function cariPesanan(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = DB::table('pemesanan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->where("status", "Belum lunas")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
        // mengirim data pegawai ke view index
        return view('admin.pesanan.pesanan', ['pesanan' => $data]);
    }

    public function cariPesananDiproses(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = DB::table('pemesanan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->where("status", "Proses")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
        // mengirim data pegawai ke view index
        return view('admin.pesanan.diproses', ['pesanan' => $data]);
    }

    public function cariPesananSelesai(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $data = DB::table('pemesanan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->where("status", "Selesai")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
        // mengirim data pegawai ke view index
        return view('admin.pesanan.selesai', ['pesanan' => $data]);
    }
}