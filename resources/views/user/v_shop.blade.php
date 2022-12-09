@extends('user/layout/v_template')

@section('title','Shop')

@section('content')

<div class="shop">
<!-- shop -->
	<div class="container-fluid p-5 mb-5 toko">
		<h3 class="text-center">Penyuplai Ayam</h3>
		<h1 class="title-content mb-4">Shop</h1>
		<div class="row">
		    @if (session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
				  <i class="icon fa fa-check"></i><strong> Berhasil !</strong>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  {{ session('pesan') }}
				</div>
            @endif
			<!-- kategori kiri -->
			<div class="col-lg-2 kategori-shop d-none d-lg-block">
				<div class="border-end">
					<h3 class="mb-3" style="padding-left: 13px; color:black;">Kategori</h3>
					<li class="nav-link"><a href="../../shop-user/">Semua</a></li>
					@foreach ($kategori as $item)
						<li class="nav-link"><a href="../../shop-kategori/{{$item->id_kategori}}">{{$item->nama_kategori}}</a></li>
					@endforeach
				</div>
			</div>
			<!-- end kategori kiri -->

			<!-- produk shop -->
			<div class="col-lg-10 mb-5 pt-3">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6 col-12">
						<div class="dropdown d-lg-none ">
						  <button class="btn btn-outline-warning dropdown-toggle col-sm-8 col-md-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						    Kategori
						  </button>
						  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
						      <li class="nav-link"><a href="../../shop-user/">Semua</a></li>
						    @foreach ($kategori as $item)
								<li class="nav-link"><a href="../../shop-kategori/{{$item->id_kategori}}" class="text-dark">{{$item->nama_kategori}}</a></li>
							@endforeach
						  </ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-5 d-none d-md-block float-end">
						<form class="d-flex" action="/shop-user/pencarian/cari" method="GET">
				        	<input class="form-control  me-2" name="cari" placeholder="Pencarian" aria-label="Search">
				        	<button class="btn btn-warning text-white" type="submit">Cari</button>
				    	</form>
				    </div>
				</div>
				<div class="row text-center">
					@foreach ($shop as $item)
					<div class="col-lg-3 col-md-4 col-12 text-center pt-5">
					    <a href="/shop/{{$item->id_produk}}">
						<img src="{{ asset('upload/produk/'.$item->gambar_produk) }}" class="rounded-circle gambar-produk">
						<h3 class="name-item mt-3">{{$item->nama_produk}}</h3>
						<!--{{-- <h6 class="nama-produk text-dark">Rp /kg</h6></a> --}}-->
						</a>
					</div>
					@endforeach
				</div>
			</div>
			<!-- end produk shop -->

		</div>
	</div>
<!-- end shop -->
</div>

@endsection
