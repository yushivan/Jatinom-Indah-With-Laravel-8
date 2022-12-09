<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesanan extends Model
{
    use HasFactory;

    public function getPesananBelumBayar()
    {

        return DB::table('pemesanan')
            ->where("status", "Belum Lunas")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
    }

    public function cariPesanan($request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        return DB::table('pemesanan')
            ->where('name', 'like', "%" . $cari . "%")
            ->where("status", "Belum lunas")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
    }

    public function verifikasiPesanan($id, $data)
    {
        DB::table('pemesanan')->where('id_pemesanan', $id)->update($data);
    }

    public function prosesPesanan($id, $data)
    {
        DB::table('pemesanan')->where('id_pemesanan', $id)->update($data);
    }

    public function getCartDetail($id)
    {
        return DB::table('cart')
            ->join('produk', 'produk.id_produk', '=', 'cart.id_produk')
            ->where("id_pemesanan", $id)
            ->get();
    }

    public function getPesanan($id)
    {

        return DB::table('pemesanan')
            ->where("id_pemesanan", $id)
            ->first();
    }

    public function getPesananProses()
    {

        return DB::table('pemesanan')
            ->where("status", "Proses")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
    }

    public function getPesananSelesai()
    {

        return DB::table('pemesanan')
            ->where("status", "Selesai")
            ->orderBy('id_pemesanan', 'desc')
            ->paginate(15);
    }

    public function destroyBB($id)
    {
        DB::table('pemesanan')->where('id_pemesanan', $id)->delete();
    }

    public function deleteImage($data)
    {
        return unlink(public_path('upload/bukti-tf/' . $data->bukti_pembayaran));
    }
}