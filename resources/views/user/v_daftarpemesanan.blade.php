@extends('user/layout/v_template')

@section('title','Home')

@section('content')

<div class="pemesanan"> 
<!-- pemesanan -->
	<div class="container p-5 mb-5">
		<div class="row">
			<div class=" mb-5">
				<span class="">
					<a class="btn btn-outline-dark back-shop col-md-2 col-6" href="{{route('shop')}}">< Back to Shop</a>
					<a class="btn btn-outline-dark back-shop col-md-2 col-6 float-end" href="{{route('daftar-pemesanan')}}">Daftar Pemesanan</a>
				</span>
			</div>
			@foreach ($daftar_pemesanan as $item)
			<div class="card p-0 mb-3">
			  <h5 class="card-header">Kode Pemesanan : {{$item->kode_verifikasi}}</h5>
			  <div class="card-body">
			    <h5 class="card-title">Nama Pemesan : {{$item->nama}}</h5>
			    <p class="card-text">Tanggal Pemesanan : {{$item->tgl_pesan}}<br>
			    Status : {{$item->status}}</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
			@endforeach
		</div>
	</div>
<!-- end pemesanan -->
</div>

@endsection