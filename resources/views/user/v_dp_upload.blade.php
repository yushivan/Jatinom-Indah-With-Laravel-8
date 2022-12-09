@extends('user/layout/v_template')

@section('title','Shop')

@section('content')

<div class="shop">
<!-- shop -->
	<div class="container-fluid p-5 mb-5 toko">
		<h3 class="text-center">Daftar Pesanan</h3>
		<h1 class="title-content mb-4">Upload Bukti Pembayaran</h1>
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
				</div>


                <form method="POST" action="/pemesanan-user/upload-bukti/{{ $daftar_pemesanan->id_pemesanan }}" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <h5 for="gambar_galeri">Bukti Transfer anda</h5>
                                    <div class="form-group col-md-4">
                                        <img src="{{url('upload/bukti-tf/'.$daftar_pemesanan->bukti_pembayaran)}}" alt="Belum mengupload bukti transfer" class="img-thumbnail" style="width: 400px; height: 400px;">
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <h5 for="gambar_galeri">Masukkan Bukti Transfer</h5>
                                        <input type="file" class="form-control" value="{{ old('bukti_pembayaran') }}" id="bukti_pembayaran" class="@error('bukti_pembayaran') is-invalid @enderror" name="bukti_pembayaran" placeholder="Masukkan Nama Dusun">
                                        <div class="text-danger">
                                            @error('bukti_pembayaran')
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a class="btn btn-light" href="/pemesanan-user/daftar-pesanan-belumbayar" role="button">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                     </form>


       <!-- Modal -->
                <!-- end produk shop -->
                    {{-- <a href="/pemesanan-user/daftar-pesanan-belumbayar" type="button" class="btn btn-secondary float-left" style="color: white">Kembali</a>
                    <button type="button" class="btn btn-primary pull-right">Uplod Bukti Pembayaran</button> --}}

		</div>
	</div>
<!-- end shop -->
</div>

@endsection
