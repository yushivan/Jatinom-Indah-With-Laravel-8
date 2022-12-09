@extends('user/layout/v_template')

@section('title','Detail-Blog')

@section('content')

<div class="detail-blog"> 
<!-- detail blog -->
	<div class="container p-5 mb-5">
		<h1 class="title-content text-center mb-5">{{$blog->judul_blog}}</h1>
		<div class="row">
			<div class="row justify-content-center mb-5">
				<img src="{{ asset('upload/blog/'.$blog->gambar_blog) }}" class="img-detail-blog">
			</div>
			<div class="row">
				<p>{!! $blog->isi_blog !!}</p>
			</div>
			<div class="row mt-4">
				<div class="col-6">
					<a href="../../blog-user" class="btn btn-outline-dark col-lg-5 col-8">< Back</a>
				</div>
				<div class="col-6">
					<span class="float-end">{{$blog->tanggal_blog}}</span>
				</div>
			</div>
		</div>
	</div>
<!-- end detail blog -->
</div>

@endsection