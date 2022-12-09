@extends('user/layout/v_template')

@section('title','Home')

@section('content')

<div class="pemesanan">
<!-- pemesanan -->
	<div class="container p-5 mb-5">
		<div class="row">
			<div class="row mb-5">
				<span class="">
					<a class="btn btn-outline-dark back-shop col-md-2 col-6" href="{{route('shop')}}">< Back to Shop</a>
					<a class="btn btn-outline-dark back-shop col-md-2 col-6 float-end" href="{{route('daftar-pemesanan-belumbayar')}}">Daftar Pemesanan</a>
				</span>
			</div>

			<div class=" form-pesan">
				@if (session('pesan'))
	                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
					  <i class="icon fa fa-check"></i><strong> Berhasil !</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  {{ session('pesan') }}
					</div>
	            @endif
				<h1 class="text-center mb-3 pb-2" style="color: orange"><b>Detail Pemesanan</b></h1>
				<!-- <hr class="container"> -->
					<div class="row p-3">
						<div class="mb-3 text-center">
							   <h4 class="">Daftar Pesanan</h4>
						</div>
						<div class="table-responsive mb-2">
						<table class="table bg-white text-center">
							<tr class="table-warning ">
								<th>Produk</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Total</th>
								<th>&ensp;</th>
							</tr>
							@foreach ($cart as $item)
							<tr>
								<td>{{ $item->nama_produk }}</td>
								<td>{{ $item->jumlah }} ({{$item->satuan}})</td>
								<td>{{ $item->harga }}</td>
								<td> @currency($item->total) </td>
								<td>
								    <a class="btn btn-warning btn-sm mr-1 mb-1" href="/pemesanan-user/edit-cart/{{ $item->id_cart }}">Ubah</a>
	                                <a class="btn btn-danger btn-sm mr-1 mb-1" href="/pemesanan-user/delete/{{ $item->id_cart }}">
	                                     Hapus
	                                </a>
								</td>
							</tr>
							@endforeach
							<tr class="fw-bold">
								<td colspan="3" align="center">Total</td>
								<td> @currency($total) </td>
							</tr>
						</table>
						</div>
						<hr class="container mt-4 mb-4 ">
					</div>

					<div class="mb-3 text-center">
							<h4 class="">Form Pemesanan</h4>
					</div>


				<div class="row">
					<div class=" col-md-6 p-3">
						<form method="POST" action="{{route('insert-pesanan')}}" enctype="multipart/form-data">
        				@csrf
                        {{-- Form untuk update cart --}}
                        <input name="status_cart" type="hidden" class="form-control col-12"  placeholder="Nama" value="sudah" >
                        <input name="total_cart" type="hidden" class="form-control col-12"  placeholder="Nama" value="{{ $total }}" >
                        {{-- Form untuk pemesanan --}}
						<div class="mb-3">
						    <label for="nama" class="fw-bold mb-1">Nama Lengkap</label>
							 <input name="nama" type="text" class="form-control col-12"  placeholder="Nama" value="{{ Auth::user()->name }}" >
							 <div class="text-danger">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="nama_perusahaan" class="fw-bold mb-1">Nama Perusahaan <span class="fw-normal">(Tidak Wajib Diisi)</span></label>
						    <input type="text" name="nama_perusahaan" class="form-control col-12"  placeholder="Nama Perusahaan" value="">
						    <div class="text-danger">
                                @error('nama_perusahaan')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="provinsi" class="fw-bold mb-1">Provinsi</label>
						    <input name="provinsi" type="text" class="form-control col-12" placeholder="Provinsi" value="{{ Auth::user()->provinsi }}" >
						    <div class="text-danger">
                                @error('provinsi')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="kab_kota" class="fw-bold mb-1">Kota/Kabupaten</label>
						    <input name="kab_kota" type="text" class="form-control "  placeholder="Kota/Kabupaten" value="{{ Auth::user()->kab_kota }}" >
						    <div class="text-danger">
                                @error('kab_kota')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="kecamatan" class="fw-bold mb-1">Kecamatan</label>
						    <input name="kecamatan" type="text" class="form-control "  placeholder="Kecamatan" value="{{ Auth::user()->kecamatan }}" >
						    <div class="text-danger">
                                @error('kecamatan')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="kelurahan" class="fw-bold mb-1">Kelurahan</label>
						    <input name="kelurahan" type="text" class="form-control " placeholder="Kelurahan" value="{{ Auth::user()->kelurahan }}" >
						    <div class="text-danger">
                                @error('kelurahan')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
					</div>
					<div class="col-md-6 p-3">
						<div class="mb-3">
						    <label for="alamat" class="fw-bold mb-1">Alamat Lengkap</label>
						    <input name="alamat" type="text" class="form-control " placeholder="Alamat" value="{{ Auth::user()->alamat }}" >
						    <div class="text-danger">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="kode_pos" class="fw-bold mb-1">Kode Pos</label>
						    <input name="kode_pos" type="number" class="form-control "  placeholder="Kode Pos" >
						    <div class="text-danger">
                                @error('kode_pos')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="no_telp" class="fw-bold mb-1">No Telepon</label>
						    <input name="no_telp" type="number" class="form-control " placeholder="No. Telp" value="{{ Auth::user()->no_telp }}" >
						    <div class="text-danger">
                                @error('no_telp')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="email" class="fw-bold mb-1">Email</label>
						    <input name="email" type="text" class="form-control "  placeholder="Email" value="{{ Auth::user()->email }}">
						    <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
						<div class="mb-3">
						    <label for="tgl_kirim" class="fw-bold mb-1">Pilih Tanggal Pengiriman</label>
						    <input name="tgl_kirim" type="date" class="form-control " >
						    <div class="text-danger">
                                @error('tgl_kirim')
                                    {{ $message }}
                                @enderror
                              </div>
						</div>
					</div>
					<div class="col-md-12 mb-3 p-3">
						<label for="catatan" class="fw-bold mb-1">Catatan <SPAN class="fw-normal">(Tidak Wajib Diisi)</SPAN></label>
						<textarea name="catatan" class="form-control" rows="4" placeholder="Catatan"></textarea>
					</div>

					<div class="row justify-content-center">
						<input type="submit" class="btn btn-warning text-white col-lg-4 col-8 rounded-5"  value="Pesan Sekarang">
					</div>
					</form>
				</div>


			</div>
		</div>

	</div>
<!-- end pemesanan -->
</div>

@endsection
