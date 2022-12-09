@extends('user/layout/v_template')

@section('title','Detail Produk')

@section('content')

<div class="detail-produk"> 
<!-- detail blog -->
	<div class="container p-5 mb-5 detail-tiap-produk">
		<h1 class="title-content text-center mb-5">Detail Produk</h1>
		<div class="row align-items-center">
			<div class="col-lg-6 col-12 mb-4 text-center">
				<img src="{{ asset('upload/produk/'.$produk->gambar_produk) }}" class="img-detail-produk">
			</div>
			<div class="col-lg-6 col-12 detail-item">
				<h2 class="mb-3 " style="color: orange; ">{{$produk->nama_produk}}</h2>
				<h4 class="mb-3">Daftar Harga : </h4>
                <ul >
                    @foreach ($harga as $item)
                        <li><h5>Rp. {{ $item->harga }} /{{ $item->satuan }}</h5></li>
                    @endforeach
                </ul>
				<p class="">{{$produk->deskripsi_produk}}</p>
			</div>
			<div class="row mt-4">
				<div class="col-6">
					<a href="../../produk-user" class="btn btn-outline-dark col-lg-5 col-8">< Back</a>
				</div>
			</div>
		</div>
	</div>
<!-- end detail blog -->
</div>

@endsection