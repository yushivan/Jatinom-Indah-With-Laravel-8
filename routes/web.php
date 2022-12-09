<?php

use App\Http\Controllers\Admin\AnakPerusahaanController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\DireksiController;
use App\Http\Controllers\Admin\ExpertiseController;

use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\TambahHargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// user controller
use App\Http\Controllers\User\HomeController as beranda;
use App\Http\Controllers\User\FasilitasController as fasilitas;
use App\Http\Controllers\User\ProdukController as produk;
use App\Http\Controllers\User\DetailProdukController as detailproduk;
use App\Http\Controllers\User\BlogController as blog;
use App\Http\Controllers\User\DetailblogController as detailblog;
use App\Http\Controllers\User\DetailAnakPerusahaanController as detailap;
use App\Http\Controllers\User\TentangController as tentang;
use App\Http\Controllers\User\LoginUserController as loginuser;
use App\Http\Controllers\User\DaftarController as daftaruser;
use App\Http\Controllers\User\ShopController as shop;
use App\Http\Controllers\User\DetailShopController as detailshop;
use App\Http\Controllers\User\PemesananController as pemesanan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// -------------------------------------------------------------
// -------  Admin -------
// -------------------------------------------------------------

Route::get('/admin/login', [LoginAdminController::class, 'halamanlogin'])->name('login-admin');
Route::post('/admin/postlogin', [LoginAdminController::class, 'postlogin'])->name('postlogin-admin');
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('logout-admin');

Route::group(['middleware' => ['auth-admin', 'admin']], function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/pesanan', [PesananController::class, 'index']);

    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get("/admin/produk/create", [ProdukController::class, "create"]);
    Route::post("/admin/produk", [ProdukController::class, "store"]);
    Route::get("/admin/produk/{id}/edit", [ProdukController::class, "edit"]);
    Route::post("/admin/produk/{id}", [ProdukController::class, "update"]);
    Route::get("/admin/produk/{id}", [ProdukController::class, "destroy"]);
    Route::get('/admin/produk/pencarian/cari', [ProdukController::class, "cariProduk"]);

    Route::get('/admin/produk/{id}/harga', [TambahHargaController::class, 'index'])->name("harga");
    Route::get("/admin/produk/{id}/harga/create", [TambahHargaController::class, "create"]);
    Route::post("/admin/produk/{id}/harga", [TambahHargaController::class, "store"]);
    Route::get("/admin/produk/{id}/harga/{id_tambah}/edit", [TambahHargaController::class, "edit"]);
    Route::post("/admin/produk/{id}/harga/{id_tambah}", [TambahHargaController::class, "update"]);
    Route::get("/admin/produk/{id}/harga/{id_tambah}", [TambahHargaController::class, "destroy"]);

    Route::get('/admin/kategori-produk', [KategoriProdukController::class, 'index'])->name('kategori-produk');
    Route::get("/admin/kategori-produk/create", [KategoriProdukController::class, "create"]);
    Route::post("/admin/kategori-produk", [KategoriProdukController::class, "store"]);
    Route::get("/admin/kategori-produk/{id}/edit", [KategoriProdukController::class, "edit"]);
    Route::post("/admin/kategori-produk/{id}", [KategoriProdukController::class, "update"]);
    Route::get("/admin/kategori-produk/{id}", [KategoriProdukController::class, "destroy"]);
    Route::get('/admin/kategori-produk/pencarian/cari', [KategoriProdukController::class, "cariKategori"]);

    Route::get('/admin/direksi', [DireksiController::class, 'index'])->name('direksi');
    Route::get("/admin/direksi/create", [DireksiController::class, "create"]);
    Route::post("/admin/direksi", [DireksiController::class, "store"]);
    Route::get("/admin/direksi/{id}/edit", [DireksiController::class, "edit"]);
    Route::post("/admin/direksi/{id}", [DireksiController::class, "update"]);
    Route::get("/admin/direksi/{id}", [DireksiController::class, "destroy"]);
    Route::get('/admin/direksi/pencarian/cari', [DireksiController::class, "cariDireksi"]);
    
    Route::get('/admin/expertise', [ExpertiseController::class, 'index'])->name('expertise');
    Route::get("/admin/expertise/create", [ExpertiseController::class, "create"]);
    Route::post("/admin/expertise", [ExpertiseController::class, "store"]);
    Route::get("/admin/expertise/{id}/edit", [ExpertiseController::class, "edit"]);
    Route::post("/admin/expertise/{id}", [ExpertiseController::class, "update"]);
    Route::get("/admin/expertise/{id}", [ExpertiseController::class, "destroy"]);
    Route::get('/admin/expertise/pencarian/cari', [ExpertiseController::class, "cariExpertise"]);
    
    Route::get('/admin/anak-perusahaan', [AnakPerusahaanController::class, 'index'])->name('anak-perusahaan');
    Route::get("/admin/anak-perusahaan/create", [AnakPerusahaanController::class, "create"]);
    Route::post("/admin/anak-perusahaan", [AnakPerusahaanController::class, "store"]);
    Route::get("/admin/anak-perusahaan/{id}/edit", [AnakPerusahaanController::class, "edit"]);
    Route::post("/admin/anak-perusahaan/{id}", [AnakPerusahaanController::class, "update"]);
    Route::get("/admin/anak-perusahaan/{id}", [AnakPerusahaanController::class, "destroy"]);
    Route::get('/admin/anak-perusahaan/pencarian/cari', [AnakPerusahaanController::class, "cariAnakPerusahaan"]);

    Route::get('/admin/partner', [PartnerController::class, 'index'])->name('partner');
    Route::get("/admin/partner/create", [PartnerController::class, "create"]);
    Route::post("/admin/partner", [PartnerController::class, "store"]);
    Route::get("/admin/partner/{id}/edit", [PartnerController::class, "edit"]);
    Route::post("/admin/partner/{id}", [PartnerController::class, "update"]);
    Route::get("/admin/partner/{id}", [PartnerController::class, "destroy"]);
    Route::get('/admin/partner/pencarian/cari', [PartnerController::class, "cariPartner"]);

    Route::get('/admin/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
    Route::get("/admin/fasilitas/create", [FasilitasController::class, "create"]);
    Route::post("/admin/fasilitas", [FasilitasController::class, "store"]);
    Route::get("/admin/fasilitas/{id}/edit", [FasilitasController::class, "edit"]);
    Route::post("/admin/fasilitas/{id}", [FasilitasController::class, "update"]);
    Route::get("/admin/fasilitas/{id}", [FasilitasController::class, "destroy"]);
    Route::get('/admin/fasilitas/pencarian/cari', [FasilitasController::class, "cariFasilitas"]);

    Route::get('/admin/ulasan', [UlasanController::class, 'index'])->name('ulasan');
    Route::get("/admin/ulasan/{id}/detail", [UlasanController::class, "show"]);
    Route::get("/admin/ulasan/{id}", [UlasanController::class, "destroy"]);
    Route::get('/admin/ulasan/pencarian/cari', [UlasanController::class, "cariUlasan"]);

    Route::get('/admin/blog', [BlogController::class, 'index'])->name('blog');
    Route::get("/admin/blog/create", [BlogController::class, "create"]);
    Route::get("/admin/blog/{id}/detail", [BlogController::class, "show"]);
    Route::post("/admin/blog", [BlogController::class, "store"]);
    Route::get("/admin/blog/{id}/edit", [BlogController::class, "edit"]);
    Route::post("/admin/blog/{id}", [BlogController::class, "update"]);
    Route::get("/admin/blog/{id}", [BlogController::class, "destroy"]);
    Route::get('/admin/blog/pencarian/cari', [BlogController::class, "cariBlog"]);

    Route::get('/admin/slider', [SliderController::class, 'index'])->name('slider');
    Route::get("/admin/slider/create", [SliderController::class, "create"]);
    Route::get("/admin/slider/{id}/detail", [SliderController::class, "show"]);
    Route::post("/admin/slider", [SliderController::class, "store"]);
    Route::get("/admin/slider/{id}/edit", [SliderController::class, "edit"]);
    Route::post("/admin/slider/{id}", [SliderController::class, "update"]);
    Route::get("/admin/slider/{id}", [SliderController::class, "destroy"]);
    Route::get('/admin/slider/pencarian/cari', [SliderController::class, "cariSlider"]);

    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get("/admin/pelanggan/{id}/detail", [PelangganController::class, "show"]);
    Route::post("/admin/pelanggan", [PelangganController::class, "store"]);
    Route::get("/admin/pelanggan/{id}/edit", [PelangganController::class, "edit"]);
    Route::post("/admin/pelanggan/{id}", [PelangganController::class, "update"]);
    Route::get("/admin/pelanggan/{id}", [PelangganController::class, "destroy"]);
    Route::get('/admin/pelanggan/pencarian/cari', [PelangganController::class, "cariPelanggan"]);

    Route::get('/admin/pesanan-belumbayar', [PesananController::class, 'index'])->name('pesanan');
    Route::get("/admin/pesanan-belumbayar/{id}/detail", [PesananController::class, "show"]);
    Route::post("/admin/pesanan-belumbayar", [PesananController::class, "store"]);
    Route::get("/admin/pesanan-belumbayar/{id}/edit", [PesananController::class, "edit"]);
    Route::post("/admin/pesanan-belumbayar/{id}", [PesananController::class, "update"]);
    Route::get("/admin/pesanan-belumbayar/{id}", [PesananController::class, "destroyBB"]);
    Route::get("/admin/pesanan-diproses/{id}", [PesananController::class, "destroyDP"]);
    Route::get("/admin/pesanan-selesai/{id}", [PesananController::class, "destroyS"]);
    Route::get('/admin/pesanan-belumbayar/{id}/verifikasi', [PesananController::class, "verifikasiPesanan"]);
    Route::get('/admin/pesanan-diproses/{id}/verifikasi', [PesananController::class, "prosesPesanan"]);
    Route::get('/admin/pesanan-belumbayar/detail-pesanan/{id}', [PesananController::class, "getDetailBB"]);
    Route::get('/admin/pesanan-belumbayar/bukti-pembayaran/{id}', [PesananController::class, "getDetailBP"]);
    Route::get('/admin/pesanan-belumbayar/galeri/{id}', [PesananController::class, 'getfile']);
    Route::get('/admin/pesanan-diproses', [PesananController::class, 'getPesananProses'])->name('pesanan-proses');
    Route::get('/admin/pesanan-selesai', [PesananController::class, 'getPesananSelesai'])->name('pesanan-selesai');
    Route::get('/admin/pesanan-diproses/detail-pesanan/{id}', [PesananController::class, "getDetailProses"]);
    Route::get('/admin/pesanan-selesai/detail-pesanan/{id}', [PesananController::class, "getDetailSelesai"]);
    Route::get('/admin/pesanan-belumbayar/pencarian/cari', [PesananController::class, "cariPesanan"]);
    Route::get('/admin/pesanan-diproses/pencarian/cari', [PesananController::class, "cariPesananDiproses"]);
    Route::get('/admin/pesanan-selesai/pencarian/cari', [PesananController::class, "cariPesananSelesai"]);
});
// -------------------------------------------------------------
// -------  User -------
// -------------------------------------------------------------

// user controller

Route::get('/', [beranda::class, 'index']);

Route::get('/beranda', [beranda::class, 'index']);

Route::get('/fasilitas-user', [fasilitas::class, 'index']);

Route::get('/produk-user', [produk::class, 'index']);

Route::get('/blog-user', [blog::class, 'index'])->name('blog-user');

Route::get('/blog/{id}', [blog::class, 'getDetailBlog']);

Route::get('/anak-perusahaan/{id}', [beranda::class, 'getDetailAp']);

Route::get('/tentang-user', [tentang::class, 'index'])->name('ulasan-user');
Route::post('/tentang-user', [tentang::class, 'store']);

Route::get('/produk/{id}', [produk::class, 'getDetailProduk']);


Route::get('/login-user', [loginuser::class, 'halamanlogin'])->name('login-user');
Route::post('/postlogin-user', [loginuser::class, 'postlogin'])->name('postlogin-user');
Route::post('/logout-user', [loginuser::class, 'logout'])->name('logout-user');

Route::get('/daftar-user', [daftaruser::class, 'index']);
Route::post('/daftar-user', [daftaruser::class, 'simpan'])->name('simpan-registrasi-user');


Route::group(['middleware' => ['auth-user', 'user']], function () {

    Route::get('/shop/{id}', [shop::class, 'getDetailShop']);
    Route::get('/shop-user', [shop::class, 'index'])->name('shop');
    Route::get('/shop-user/pencarian/cari', [shop::class, 'cariShop'])->name('shop');
    Route::get('/shop-kategori/{id}', [shop::class, 'getShopKategori']);
    Route::post('/shop/masuk-ke-cart', [shop::class, 'masukkecart'])->name('masukkecart');

    Route::get('/pemesanan-user', [pemesanan::class, 'index'])->name('detail-pemesanan');
    Route::post('/pemesanan-user/insert', [pemesanan::class, 'insert'])->name('insert-pesanan');
    Route::get('/pemesanan-user/edit-cart/{id}', [pemesanan::class, 'editCart']);
    Route::post('/pemesanan-user/update-cart/{id}', [pemesanan::class, 'updateJumlah']);
    Route::get('/pemesanan-user/delete/{id}', [pemesanan::class, 'delete']);

    Route::get('/pemesanan-user/cetak', [pemesanan::class, 'cetak'])->name('cetak-pesanan');
    Route::get('/pemesanan-user/daftar', [pemesanan::class, 'daftarPemesanan'])->name('daftar-pemesanan');

    Route::get('/pemesanan-user/daftar-pesanan-belumbayar', [pemesanan::class, 'daftarPemesananBelumBayar'])->name('daftar-pemesanan-belumbayar');
    Route::get('/pemesanan-user/daftar-pesanan-belumbayar/{id}', [pemesanan::class, 'getDetail']);
    Route::get('/pemesanan-user/daftar-pesanan-diproses/{id}', [pemesanan::class, 'getDetailProses']);
    Route::get('/pemesanan-user/daftar-pesanan-selesai/{id}', [pemesanan::class, 'getDetailSelesai']);
    Route::get('/pemesanan-user/daftar-pesanan-diproses', [pemesanan::class, 'daftarPemesananDiproses'])->name('daftar-pemesanan-diproses');
    Route::get('/pemesanan-user/daftar-pesanan-selesai', [pemesanan::class, 'daftarPemesananSelesai'])->name('daftar-pemesanan-selesai');
    Route::get('/pemesanan-user/upload-bukti/{id}/edit', [pemesanan::class, 'edit'])->name('edit-bukti');
    Route::post('/pemesanan-user/upload-bukti/{id}', [pemesanan::class, 'update'])->name('upload-bukti');
});

// end user controller


Auth::routes();