@extends('user/layout/v_template')

@section('title','Home')

@section('content')

<div class="produk">
<!-- produk -->
	<div class="container p-5 mb-5 list-produk">
		<h3 class="text-center">Daftar</h3>
		<h1 class="title-content mb-3">Produk</h1>
		<div class="row justify-content-center pt-4">
			@foreach ($produk as $item)
			<div class="col-md-3 col-6 text-center p-3">
				<a href="/produk/{{$item->id_produk}}" class="text-decoration-none">
					<img src="{{ asset('upload/produk/'.$item->gambar_produk) }}" class="rounded-circle img-produk">
					<h3 class="nama-produk mt-3">{{$item->nama_produk}}</h3>
					{{-- <!--<p class="harga-item text-dark">{{$item->harga}}</p>--> --}}
				</a>
			</div>
			@endforeach
		</div>
	</div>
<!-- end produk -->
</div>

@endsection