@extends('user/layout/v_template')

@section('title','Detail Anak Perusahaan')

@section('content')

<div class="detail-anak-perusahaan">
<!-- detail anak perusahaan -->
	<div class="container p-5 mb-5">
		<h1 class="title-content text-center fs-2 mb-5">{{ $anak_perusahaan->nama_ap }}</h1>
		<div class="row">
			<div class="row  mb-5">
				<a href="{{$anak_perusahaan->link_ap}}" class="text-center"><img src="{{ asset('upload/anak_perusahaan/'.$anak_perusahaan->gambar_ap) }}" width="200px" class="img-detail-anak-perusahaan"></a>
			</div>
			<div class="row">
				<p >{!! $anak_perusahaan->deskripsi_ap !!}</p>
			</div>
			<div class="row mt-4">
				<div class="col-6">
					<a href="../../beranda" class="btn btn-outline-dark col-lg-5 col-8">< Back</a>
				</div>
				<div class="col-6">
					<span class="float-end"></span>
				</div>
			</div>
		</div>
	</div>
<!-- end detail anak perusahaan -->

</div>

@endsection