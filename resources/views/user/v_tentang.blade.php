@extends('user/layout/v_template')

@section('content')

<div class="tentang">


      @if (session('pesan'))
        <div class="container">
            <div class="alert alert-success" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" mr-3></button>
                {{ session('pesan') }}
            </div>
        </div>
     @endif

<!-- tentang kami -->
	<div class="container-fluid p-5 mb-3 tentang-kami">
		<h1 class="title-content mb-4">Jatinom Indah Group</h1>
		<div class="row">
			<div class="col-lg-8">
				<img src="{{ asset('template-user/img/example2.jpg') }}" class="mb-4">
				<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p align="justify">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>

				<p align="justify">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. </p>
			</div>
			<div class="col-lg-4 d-none d-md-block d-lg-block">
				<div class="p-5 rounded-0" style="background-color: whitesmoke;">
    		    <form class="form-ulasan row" method="POST" action="/tentang-user">
                    @csrf
    		    	<h3 class="text-center mb-4"><b>Ulasan</b></h3>
    		    	<div class="col-md-12 mb-3">
    		    		<input type="text" name="nama" class="form-control fs-6" id="" placeholder="Nama..." value="{{ old('nama') }}" id="nama" class="@error('nama') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                          </div>
    		    	</div>
    		    	<div class="col-md-12 mb-3">
    		    		<input type="email" name="email" class="form-control fs-6" id="" placeholder="Email..." value="{{ old('email') }}" id="email" class="@error('email') is-invalid @enderror">
                        <div class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                          </div>
    		    	</div>
    		    	<div class="col-md-12 mb-3">
    		    		<textarea class="form-control fs-6" name="ulasan" placeholder="Ulasan..." rows="5" value="{{ old('ulasan') }}" id="ulasan" class="@error('ulasan') is-invalid @enderror">{{ old('ulasan') }}</textarea>
                        <div class="text-danger">
                            @error('ulasan')
                                {{ $message }}
                            @enderror
                          </div>
    		    	</div>
    		    	<div class="col-md-12 mb-3">
    		    		<button type="submit" class="btn btn-warning text-white col-12">Kirim</button>
    		    	</div>
    		    </form>
    		  </div>
			</div>
		</div>
	</div>
<!-- end tentang kami -->

<!-- jajaran direksi -->
    <div class="container-fluid p-3 mb-3 mt-3 direksi" style="background-color:ghostwhite;">
        <div class="container">
    		<h1 class="title-content mb-4 fw-bold text-center" style="color:orange">Jajaran Direksi</h1>
    		<div class="row justify-content-center text-center">
    		    <center>
    		    <div class="owl-carousel owl-theme justify-content-center">
    			@foreach ($direksi as $item)
    			<div class="item p-2 justify-content-center">
    			    <div class="card card-direksi mb-3">
                      <img src="{{ asset('upload/direksi/'.$item->gambar_direksi) }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title fs-6" style="font-weight:bold">{{$item->nama_direksi}}</h5>
                        <p class="card-text fs-6" style="color:orange">{{$item->jabatan_direksi}}</p>
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
<!-- end -->

<!--video profil-->
<div class="container p-3 mb-5 mt-5 text-center">
    <iframe src="https://www.youtube.com/embed/A4DjHR0b3n8" style="width:720px; height:350px; max-width:100%; max-height:50%"></iframe>
</div>
<!--end-->

<!--ulasan-->
    <div class="container-fluid p-5 mb-3 tentang-kami">
            <div class="col-sm-12 col-12 d-md-none d-lg-none">
				<div class="p-4 rounded-0" style="background-color: whitesmoke;">
    		    <form class="form-ulasan row" method="POST" action="/tentang-user">
                    @csrf
    		    	<h3 class="text-center mb-4"><b>Ulasan</b></h3>
    		    	<div class="col-md-12 mb-3">
    		    		<input type="text" name="nama" class="form-control fs-6" id="" placeholder="Nama..." value="{{ old('nama') }}" id="nama" class="@error('nama') is-invalid @enderror">
                        <div class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                          </div>
    		    	</div>
    		    	<div class="col-md-12 mb-3">
    		    		<input type="email" name="email" class="form-control fs-6" id="" placeholder="Email..." value="{{ old('email') }}" id="email" class="@error('email') is-invalid @enderror">
                        <div class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                          </div>
    		    	</div>
    		    	<div class="col-md-12 mb-3">
    		    		<textarea class="form-control fs-6" name="ulasan" placeholder="Ulasan..." rows="5" value="{{ old('ulasan') }}" id="ulasan" class="@error('ulasan') is-invalid @enderror">{{ old('ulasan') }}</textarea>
                        <div class="text-danger">
                            @error('ulasan')
                                {{ $message }}
                            @enderror
                          </div>
    		    	</div>
    		    	<div class="col-md-12 mb-3">
    		    		<button type="submit" class="btn btn-warning text-white col-12">Kirim</button>
    		    	</div>
    		    </form>
    		  </div>
			</div>
	</div>
<!--end ulasan-->

</div>

@endsection
