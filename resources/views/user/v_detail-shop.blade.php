@extends('user/layout/v_template')

@section('title','Detail Shop')

@section('content')

<div class="detail-shop">
<!-- detail shop -->
	<div class="container p-5 mb-5">
		<div class="row mb-4">
			<span class="">
				<a class="btn btn-outline-dark back-shop col-md-2 col-6" href="{{route('shop')}}">< Back to Shop</a>
				<a class="btn btn-outline-dark back-shop col-md-2 col-6 float-end" href="{{route('daftar-pemesanan')}}">Daftar Pemesanan</a>
			</span>
		</div>
		<div class="row align-items-center mb-3">
			<div class="col-lg-6 col-12 text-center">
				<img src="{{ asset('upload/produk/'.$shop->gambar_produk) }}" class="content-img">
			</div>
			<div class="row col-lg-6 col-12 p-5 content-desc">
			<form method="POST" action="{{route('masukkecart')}}" enctype="multipart/form-data">
        	@csrf
        		<input type="hidden" name="id_pelanggan" value="{{ Auth::user()->id }}">
				<input type="hidden" name="id_produk" value="{{$shop->id_produk}}">
				{{-- <input type="hidden" name="harga_produk" value="{{$shop->harga}}"> --}}

				<h2 class="mb-3 col-12" style="color: orange">{{$shop->nama_produk}}</h2>

				{{-- <h3 class="mb-3 col-12">Rp {{$shop->harga}}/kg</h3> --}}
                <h5>Daftar Harga : </h5>
                <ul >
                    @foreach ($harga as $item)
                        <li><h5>Rp. {{ $item->harga }} /{{ $item->satuan }}</h5></li>
                    @endforeach
                </ul>

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
					<input type="number" value="0" class="text-center" name="jumlah" style="width: 60px; border: none; background-color: whitesmoke">&ensp;
						<select name="satuan" >
						@foreach ($harga as $item)
							<option value="{{$item->satuan}}">{{$item->satuan}}</option>
						@endforeach
						</select>
				</div>

				<button type="submit" class="btn btn-outline-warning fw-bold btn-add" style="width: 225px;">Add to cart</button>
            </form>
			</div>
		</div>
	</div>
	<a class="btn btn-warning text-white btn-cart" href="/pemesanan-user"><label class="bg-danger value-cart">&ensp;{{$cart}}&ensp;</label><i class="fa fa-shopping-cart"></i></a>

<!-- end detail shop -->
</div>

@endsection
