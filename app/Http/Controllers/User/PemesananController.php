<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\PemesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->PemesananModel = new PemesananModel();
    }
    public function index()
    {
        $id_pelanggan = Auth::user()->id;
        $data = [
            'cart' => $this->PemesananModel->getCart($id_pelanggan),
            'total' => $this->PemesananModel->getTotal($id_pelanggan),
        ];
        return view('user/v_pemesanan', $data);
    }

    public function editCart($id)
    {

        $data = [
            'cart' => $this->PemesananModel->getDetailCart($id),
        ];
        return view('user/v_ubah_pesanan', $data);
    }

    public function updateJumlah($id)
    {
        $total = Request()->jumlah * Request()->harga_produk;
        $data = [
            'jumlah' => Request()->jumlah,
            'total' => $total,
        ];
        $this->PemesananModel->updateJumlah($id, $data);
        return redirect()->route('detail-pemesanan')->with('pesan', 'Data berhasil di ubah');
    }

    public function delete($id)
    {
        $this->PemesananModel->deletedataCart($id);
        return redirect()->route('detail-pemesanan')->with('pesan', 'Data berhasil di hapus');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required|max:13',
            'email' => 'required',
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'tgl_kirim' => 'required'
        ], [
            'nama.required' => 'Nama harus di isi !',
            'no_telp.required' => 'No Telepon harus di isi !',
            'no_telp.max' => 'No Telepon maksimal 13 karakter !',
            'email.required' => 'Email harus di isi !',
            'provinsi.required' => 'Provinsi harus di isi !',
            'kab_kota.required' => 'Kabupaten/Kota harus di isi !',
            'kecamatan.required' => 'Kecamatan harus di isi !',
            'kelurahan.required' => 'Kelurahan harus di isi !',
            'alamat.required' => 'Alamat harus di isi !',
            'kode_pos.required' => 'Kode Pos harus di isi !',
            'tgl_kirim.required' => 'Tanggal Pengiriman harus di isi !',
        ]);

        $kode = Str::random(8);
        $alamat_lengkap = Request()->alamat . ' Kel.' . Request()->kelurahan . ' Kec.' . Request()->kecamatan . ' ' . Request()->kab_kota . ' ' . Request()->provinsi . ' ' . Request()->kode_pos;
        $status = "Belum Lunas";
        $tgl_pesan = date("Y-m-d");
        $id_pelanggan = Auth::user()->id;

        $data = [
            'kode_verifikasi' => $kode,
            'id_pelanggan' => $id_pelanggan,
            'nama' => Request()->nama,
            'nama_perusahaan' => Request()->nama_perusahaan,
            'no_telp' => Request()->no_telp,
            'email' => Request()->email,
            'alamat' => $alamat_lengkap,
            'tgl_kirim' => Request()->tgl_kirim,
            'tgl_pesan' => $tgl_pesan,
            'catatan' => Request()->catatan,
            'status' => $status,
            'status_proses' => "Belum diproses",
            'bukti_pembayaran' => "Belum dibayar.png",
            'total' => Request()->total_cart
        ];

        $data_cart = [
            'status' => Request()->status_cart
        ];

        $this->PemesananModel->insertPemesanan($data);
        $this->PemesananModel->updateCart($id_pelanggan, $data_cart);
        return redirect()->route('daftar-pemesanan-belumbayar')->with('pesan', 'Data berhasil ditambahkan');
    }

    // public function cetak()
    // {
    //     $id_pelanggan = Auth::user()->id;
    //     $data = [
    //         'cart' => $this->PemesananModel->getCart($id_pelanggan),
    //         'total' => $this->PemesananModel->getTotal($id_pelanggan),
    //     ];
    //     return view('user/v_pemesanan',$data);
    // }

    // public function daftarPemesanan()
    // {
    //     $id_pelanggan = Auth::user()->id;
    //     $data = [
    //         'daftar_pemesanan' => $this->PemesananModel->getdaftarPemesanan($id_pelanggan),
    //     ];
    //     return view('user/v_daftarpemesanan', $data);
    // }

    public function daftarPemesananBelumBayar()
    {
        $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getBelumBayar($id_pelanggan),
        ];
        return view('user/v_dp_belumbayar', $data);
    }

    public function getDetail($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getDetail($id),
            'cart' => $this->PemesananModel->getCartDetail($id)
        ];
        return view('user/v_dp_detail', $data);
    }

    public function getDetailProses($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getDetail($id),
            'cart' => $this->PemesananModel->getCartDetail($id)
        ];
        return view('user/v_dp_detail_proses', $data);
    }
    
    public function getDetailSelesai($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getDetail($id),
            'cart' => $this->PemesananModel->getCartDetail($id)
        ];
        return view('user/v_dp_detail_selesai', $data);
    }

    public function daftarPemesananDiproses()
    {
        $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getBelumProses($id_pelanggan),
        ];
        return view('user/v_dp_diproses', $data);
    }

    public function daftarPemesananSelesai()
    {
        $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getBelumSelesai($id_pelanggan),
        ];
        return view('user/v_dp_selesai', $data);
    }

    public function edit($id)
    {
        // $id_pelanggan = Auth::user()->id;
        $data = [
            'daftar_pemesanan' => $this->PemesananModel->getDetail($id)
        ];
        return view('user/v_dp_upload', $data);
    }

    public function update(Request $request, $id)
    {
        $id_pelanggan = Auth::user()->id;
        $validated = $request->validate([
            'bukti_pembayaran' => 'mimes:png,jpg,jpeg,bmp'
        ]);

        $file = Request()->bukti_pembayaran;
        $fileName =  'sudah-bukti-pembayaran-jatinom-' . Str::random(20) . '.' . $file->extension();
        $file->move(public_path('upload/bukti-tf'), $fileName);

        $data = [
            'bukti_pembayaran' => $fileName
        ];
        $this->PemesananModel->updateDetail($id, $data);
        return redirect()->route('daftar-pemesanan-belumbayar')->with('pesan', 'Bukti Pembayaran berhasil diupload, Pembayaran sedang diproses');
    }
    
    public function get_provinsi(){
        
    }
    public function get_kota(){
        
    }
}