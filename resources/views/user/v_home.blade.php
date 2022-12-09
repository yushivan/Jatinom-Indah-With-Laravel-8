@extends('user/layout/v_template')



@section('content')

<div class="home">  

<!-- slider -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">   
    <div class="carousel-inner">
      @foreach ($slider as $item)
      <div class="carousel-item">
        <img src="{{asset('upload/slider/'.$item->gambar_slider)}}" class="d-block w-100" alt="...">
        <div class="carousel-caption slider-title" >
          <h1 class="mb-4"><a href="{{ $item->link_slider }}" class="text-decoration-none text-white">{{ $item->judul_slider }}</a></h1>
          
          <div class="d-none d-md-block">
          <p>{{ $item->caption_slider }}</p>
          <a href="{{ $item->link_slider }}" class="btn btn-lg btn-warning text-white mt-4">Selengkapnya</a></div>
          
          <div class="d-normal-none">
          <a href="{{ $item->link_slider }}"  class="text-decoration-none">selengkapnya...</a></div>
        </div>
        
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<!-- end slider -->

<!-- tentang -->
  <div class="container p-5 mb-5 tentang">
    <h1 class="title-content text-center mb-3">Jatinom Indah Group</h1>
    <div class="row align-items-center">
      <div class="col-12 text-center d-block d-sm-none">
        <img src="{{ asset('img/tentang.png') }}" class="rounded-circle mb-3" width="250px">
      </div>
      <div class="col-md-8">
        <p align="right">Didirikan pada 1970 oleh sang pionir H. M. Siswojo dengan visi menjadikan kampung halamannya Jatinom sebagai daerah yang maju nan indah. Kami selalu menjaga dengan serius  integritas dan kualitas demi menjadi mitra yang terbaik. Kami memiliki fokus kompetensi di pemeliharaan produksi ayam petelur, produksi pullet, DOC, DOD, DOQ, produksi pakan, penjualan bahan baku pakan dan pakan pabrikan, serta pemotongan ayam.</p>
      </div>
      <div class="col-md-4 text-center d-none d-md-block">
        <img src="{{ asset('img/tentang.png') }}" class="rounded-circle img-tentang" >
      </div>
    </div>
  </div>
<!-- end tentang -->
<!--expertise-->
    <div class="container-fluid mb-3 mt-3 expertise" style="background-color:ghostwhite;">
        <div class="container p-5 ">
    		<h1 class="title-content mb-4 text-center">Keunggulan Kami</h1>
    		<div class="row justify-content-center text-center">
    			@foreach ($expertise as $item)
    			<div class="col-md-3 col-sm-4 col-6 p-2">
    			    <div class="card rounded-3 p-3">
                      <div class="card-body">
                        <h5 class="card-title"><img src="{{ asset('upload/expertise/'.$item->gambar_expertise) }}" class="card-img-top img-expertise" alt="..." ></h5>
                        <h6 class="card-subtitle mt-3 mb-2 fw-bold fs-6">{!!$item->nama_expertise!!}</h6>
                        <p class="card-text d-none d-md-block d-lg-block">{!!$item->deskripsi_expertise!!}</p>
                      </div>
                    </div>
    			</div>
    			@endforeach
    		</div>
    	</div>
	</div>
<!--end expertise-->
<!-- anak perusahaan -->
  <div class="container p-5 mb-3 anak-perusahaan">
    <h1 class="title-content text-center mb-5">Subsidiaries</h1>
    <div class="row justify-content-center">
      @foreach ($anak_perusahaan as $item)
      <div class="col-md-3 col-4 mb-3 text-center">
        <a href="/anak-perusahaan/{{$item->id_ap}}" class="text-decoration-none">
          <img src="{{ asset('upload/anak_perusahaan/'.$item->gambar_ap) }}" class="">
          <h3 class="name-item fs-5 mt-4">{{$item->nama_ap}}</h3>
        </a>
      </div>
      @endforeach
    </div>
  </div>
<!-- end anak perusahaan -->
<!-- menu dan harga -->
  <div class="container-fluid p-5 mb-3 menu-harga" style="background-color:ghostwhite;">
    <div class="container">
        <h1 class="title-content text-center mb-5">Produk Kami</h1>
        <div class="row justify-content-center">
          @foreach ($produk as $item)
          <div class="col-md-3 col-6 mb-3 text-center">
            <img src="{{ asset('upload/produk/'.$item->gambar_produk) }}" class="rounded-circle">
            <h3 class="name-item mt-4">{{$item->nama_produk}}</h3>
          </div>
          @endforeach
        </div>
        <div class="text-center mt-5">
          <a href="produk-user" class="text-decoration-none"><button class="btn btn-warning btn-lg text-white">Selengkapnya</button></a>
        </div>
    </div>
  </div>
<!-- end menu dan harga -->
<!-- partner -->
  <div class="container p-5 mb-3 partner">
    <h1 class="title-content text-center mb-5">Partner</h1>
    <div class="row justify-content-center">
      @foreach ($partner as $item)
      <div class="col-md-2 col-4 p-2 text-center">
        <img src="{{ asset('upload/partner/'.$item->gambar_partner) }}" class="">        
      </div>
      @endforeach
    </div>
  </div>
<!-- end partner -->
<!--ulasan-->
    <div class="container-fluid p-3 mb-3 mt-3" style="background-color:ghostwhite;">
        <div class="container">
            <h1 class="title-content mb-4  text-center">Ulasan</h1>
    		<div class="row justify-content-center text-center">
    		    <center>
    		    <div class="owl-carousel owl-theme">
    			@foreach ($ulasan as $item)
    			<div class="item p-2">
    			    <div class="card mb-3">
                      <div class="card-body">
                        <img src="{{ asset('template-user/img/profil.jpg') }}" class="rounded-circle text-center mb-2 d-none d-md-block d-lg-block d-sm-block" style="width:80px;display:inline" alt="...">
                        <h5 class="card-title fs-6" style="font-weight:bold">{{$item->nama_ulasan}}</h5>
                        <p class="card-text text-muted fs-6" >{{$item->isi_ulasan}}</p>
                        <!--<p class="card-text"></p>-->
                      </div>
                    </div>
    			</div>
    			@endforeach
    			</div>
    			</center>
    		</div>
		</div>
	</div>
<!--end ulasan-->
<!-- kontak kami -->
  <div class="container p-5 mb-5">
    <div class="card text-center" style="border:0px">
      <div class="card-body text-white kontak-card" style="background-color:ghostwhite ;">
        <h5 class="card-title text-dark">Lebih Dekat dengan Kami</h5>
        <p class="card-text text-dark">Tersambung dengan customer service kami untuk informasi lebih lanjut</p>
        <a target="_blank" href="https://wa.me/+6281233110326" class="btn btn-warning text-white">Contact Us</a>
      </div>
    </div>
  </div>
<!-- end kontak kami --> 

</div>


@endsection