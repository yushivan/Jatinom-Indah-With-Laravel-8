@extends('user/layout/v_template')

@section('title','Blog')

@section('content')

<div class="blog">
<!-- blog -->
	<div class="container p-5 mb-5 daftar-blog">
		<h3 class="text-center">Daftar</h3>
		<h1 class="title-content mb-4">Blog</h1>
		<div class="row ">
			@foreach ($blog as $item)
			<div class="row align-items-center ">
				<div class="col-lg-4 col-12 text-center">
					<img src="{{ asset('upload/blog/'.$item->gambar_blog) }}" class="img-thumbnail">
				</div>
				<div class="col-lg-8 col-12 content-blog">
					<h4>{{$item->judul_blog}}</h4>
					<p align="justify">{!!Str::limit($item->isi_blog, 300, '....')!!}</p>
					<a href="/blog/{{$item->id_blog}}"><button class="btn btn-outline-dark">Read More</button></a>
				</div>
			</div>
			<hr class="container mt-5 mb-5">
			@endforeach
		</div>
	</div>
<!-- end blog -->
</div>

@endsection