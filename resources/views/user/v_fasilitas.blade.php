@extends('user/layout/v_template')

@section('title','Fasilitas')

@section('content')

<div class="fasilitas">

<!-- fasilitas -->
	<div class="container p-3 mb-5 ">
		<h1 class="title-content mb-4 text-center">Fasilitas</h1>
		<div class="row justify-content-center text-center">
			@foreach ($fasilitas as $item)
			<div class="col-md-4 col-sm-6 col-12 p-2 ">
				<div class="card text-white">
				  <a class="example-image-link text-white" href="{{ asset('upload/fasilitas/'.$item->gambar_fasilitas) }}" data-lightbox="example-set" data-title="Click the right half of the image to move forward." >
				  <img src="{{ asset('upload/fasilitas/'.$item->gambar_fasilitas) }}" class="card-img example-image">
				  <div class="card-img-overlay nama-fasilitas ">
				  </div>
				  <h5 class="card-img-overlay row align-items-center justify-content-center nama-fasilitas-text">{{$item->nama_fasilitas}}</h5>
				  </a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
<!-- end fasilitas -->
    
</div>


<script src="{{ asset('template-user/js/lightbox-plus-jquery.js') }}"></script>


@endsection