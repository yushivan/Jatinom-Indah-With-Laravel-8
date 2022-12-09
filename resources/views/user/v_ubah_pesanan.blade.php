@extends('user/layout/v_template')

@section('title','Ubah Pesanan')

@section('content')

<div class="detail-shop"> 
<!-- detail shop -->
	<div class="container p-5 mb-5">
		<div class="row mb-4">			
			<a class="btn btn-outline-dark back-shop col-md-2 col-6" href="../../pemesanan-user">< Kembali</a>
		</div>
		<div class="row align-items-center mb-3">
			<div class="col-lg-6 col-12 text-center">
				<img src="{{ asset('upload/produk/'.$cart->gambar_produk) }}" class="content-img">
			</div>
			<div class="row col-lg-6 col-12 p-5 content-desc">
			<form method="POST" action="/pemesanan-user/update-cart/{{$cart->id_cart}}" enctype="multipart/form-data">
        	@csrf
        		<input type="hidden" name="id_pelanggan" value="{{ $cart->id_pelanggan}}">
				<input type="hidden" name="id_produk" value="{{$cart->id_produk}}">
				<input type="hidden" name="harga_produk" value="{{$cart->harga}}">

				<h2 class="mb-3" style="color: orange">{{$cart->nama_produk}}</h2>

				<h3 class="mb-3">Rp {{$cart->harga}}/kg</h3>

				<!-- <div class="col-3 mb-3">
					<span style="font-size: 18px; font-weight: bold">Ukuran</span>
				</div>
				<div class="col-9 mb-3">
					<button class="btn btn-outline-secondary btn-sm" style="width: 30px;">--</button> 
					<input type="text" value="1" class="text-center" name="" style="width: 30px;"> 
					<button class="btn btn-sm btn-outline-secondary" style="width: 30px;">+</button>
				</div> -->
				<div class="col-md-12 col-12 mb-3  jumlah">
					<span style="font-size: 18px; font-weight: bold">Jumlah</span> &ensp;
					<input type="number" value="{{$cart->jumlah}}" class="text-center" name="jumlah" style="width: 80px; border: none; background-color: whitesmoke">&ensp; 
					<span style="font-size: 18px; font-weight: bold">Kg</span>
				</div>
					
				<button type="submit" class="btn btn-outline-warning fw-bold btn-add" style="width: 225px;">Simpan</button>
			</form>
			</div>
		</div>
	</div>
	
<!-- end detail shop -->
</div>

@endsection