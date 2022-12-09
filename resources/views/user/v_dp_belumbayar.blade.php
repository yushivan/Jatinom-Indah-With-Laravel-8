@extends('user/layout/v_template')

@section('title','Shop')

@section('content')

<div class="shop">
<!-- shop -->
	<div class="container-fluid p-5 mb-5 toko">
		<h3 class="text-center">Daftar Pemesanan</h3>
		<h5 class="title-content mb-4">Pesananan Belum Bayar</h5>
		<div class="row">
			<!-- kategori kiri -->
			<div class="col-lg-3 kategori-shop d-none d-lg-block">
				<div class="border-end">
					<h3 class="mb-3" style="padding-left: 13px; color: black">Daftar Pesanan</h3>
                    <li class="nav-link"><a href="/pemesanan-user/daftar-pesanan-belumbayar">Belum Bayar</a></li>
                    <li class="nav-link"><a href="/pemesanan-user/daftar-pesanan-diproses">Di proses</a></li>
                    <li class="nav-link"><a href="/pemesanan-user/daftar-pesanan-selesai">Selesai</a></li>
				</div>
			</div>
			<!-- end kategori kiri -->

			<!-- produk shop -->
			<div class="col-lg-9 mb-5 pt-3">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6 col-12">
						<div class="dropdown d-lg-none ">
						  <button class="btn btn-outline-warning dropdown-toggle col-sm-8 col-md-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						    Daftar Pesanan
						  </button>
						  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                <li class="nav-link"><a href="/pemesanan-user/daftar-pesanan-belumbayar">Belum Bayar</a></li>
                                <li class="nav-link"><a href="/pemesanan-user/daftar-pesanan-diproses">Di proses</a></li>
                                <li class="nav-link"><a href="/pemesanan-user/daftar-pesanan-selesai">Selesai</a></li>
						  </ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-5 d-none d-md-block float-end">
						<form class="d-flex">
				        	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				        	<button class="btn btn-warning text-white" type="submit">Search</button>
				    	</form>
				    </div>
				</div>
                @if (session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
				  <i class="icon fa fa-check"></i><strong> Berhasil !</strong>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  {{ session('pesan') }}
				</div>
            @endif
                @foreach ($daftar_pemesanan as $item)
                    <div class="card mb-2 mt-2">
                        <div class="card-body">
                        <div class="row mb-3 ">
                                <div class="col-md-9">
                                    <h6 class="card-title">Nomor Faktur :</h6>
                                    <p class="card-text">{{ $item->kode_verifikasi }}</p>
                                    <h6 class="card-title">Tanggal Pembelian :</h6>
                                    <p class="card-text">{{ $item->tgl_pesan }}</p>
                                    <h6 class="card-title">Status :</h6>
                                    <button type="button" class="btn btn-danger disabled">Belum dibayar</button>
                                </div>
                                <div class="col-md-3 border-start ">
                                    <p>Total belanja</p>
                                    {{-- <h4>Rp. 120.000</h4> --}}
                                    <h4>Rp. {{ $item->total }}</h4>
                                </div>
                        </div>
                        <div class="text-end">
                            <a href="#" style="color: blue; display: inline-block"  data-bs-toggle="modal" data-bs-target="#caraPembayaran"><span style="font-weight: bold; padding-right: 1rem">Cara pembayaran</span> </a>
                            <a href="/pemesanan-user/daftar-pesanan-belumbayar/{{ $item->id_pemesanan }}" class="btn btn-outline-primary"  style="color: blue" >Lihat detail</a>
                            <a href="/pemesanan-user/upload-bukti/{{ $item->id_pemesanan }}/edit" class="btn btn-primary" style="color: white">Upload Bukti Pembayaran</a>
                        </div>
                        </div>
                    </div>
                @endforeach

                </div>
			<!-- end produk shop -->

		</div>
	</div>
<!-- end shop -->
</div>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade " id="caraPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><b>Cara Pembayaran</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ol>
                <li>Pastikan PRODUK yang sudah dipesan di menu lihat detail sudah benar</li>
                <li>Pembayaran adalah melalui :</li>
                <div class="bank" style="padding-left: 20px; padding-top: 5px">
                  <p><b>Bank</b> : BCA</p>
                  <p><b>Nama</b> : JATINOM INDAH FARM PT</p>
                  <p><b>Nomor Rekening</b> : 0903818015</p>
                </div>
                <li>Transfer ke bank tersebut, dengan berita transfer : <b>Nomor Faktur</b></li>
                <li>Selanjutnya <span style="font-weight: bold">Harus</span> upload bukti transfer ke Upload Bukti Pembayaran</li>
                <li>Pembayaran diproses, Tunggu 1x24 jam untuk konfirmasi pembayaran</li>
                <li>Pesanan akan langsung diproses</li>
                <br><br>
                <b>~ Jika ada kendala, Hub. WA 08228821928 ~</b>
            </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>


@endsection
