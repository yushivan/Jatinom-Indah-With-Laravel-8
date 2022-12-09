@extends('user/layout/v_template')

@section('title','Shop')

@section('content')

<div class="shop">
<!-- shop -->
	<div class="container-fluid p-5 mb-5 toko">
		<h3 class="text-center">Transaksi</h3>
		<h1 class="title-content mb-4">Daftar Pesananan</h1>
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
       <!-- Modal -->

                <div class="modal-body">
                    <div class="header-detail">
                        <b>Pemesanan untuk : </b>
                        <br>
                        {{ $daftar_pemesanan->nama }} <br>
                        {{ $daftar_pemesanan->no_telp }} <br>
                        {{ $daftar_pemesanan->alamat }} <br>
                        <br>
                        <b>Tanggal pemesanan : </b>
                        <br>
                        Tanggal pesan : {{ $daftar_pemesanan->tgl_pesan }} <br>
                        Tanggal kirim : {{ $daftar_pemesanan->tgl_kirim }} <br>
                        <br>
                    </div>
                    <hr>
                    <div class="daftar-pemesanan">
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
                                </tr>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->jumlah }} ({{$item->satuan}})</td>
                                        <td>{{ $item->harga }}</td>
                                        <td> @currency($item->total) </td>
                                    </tr>
                                @endforeach
                                <tr class="fw-bold">
                                    <td colspan="3" align="center">Total</td>
                                    <td> @currency($daftar_pemesanan->total) </td>
                                </tr>
                            </table>
                            </div>
                            <hr class="container mt-4 mb-4 ">
                        </div>
                    </div>
                </div>
                <!-- end produk shop -->
                    <a href="/pemesanan-user/daftar-pesanan-belumbayar" type="button" class="btn btn-secondary float-left" style="color: white">Kembali</a>
                    <a href="/pemesanan-user/upload-bukti/{{ $daftar_pemesanan->id_pemesanan }}/edit" style="color: white" type="button" class="btn btn-primary pull-right">Upload Bukti Pembayaran</a>

		</div>
	</div>
<!-- end shop -->
</div>

@endsection
