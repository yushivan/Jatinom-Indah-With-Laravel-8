@extends('admin/layout-admin/v_template')

@section('title','Blog')

@section('content')

<main class="content-wrapper"">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blog</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                <li class="breadcrumb-item active">Blog Detail</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <hr>

    <section class="content">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="blog-post">
                        <div class="d-flex justify-content-center">
                            <h2 class="blog-post-title">{{ $blog->judul_blog }}</h2>
                        </div>
                        <p class="blog-post-meta">{{ $blog->tanggal_blog }}</p>

                    <hr>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('/upload/blog/'.$blog->gambar_blog) }}" class="product-image" style="width: 500px; height: 500px" alt="Partner Image">
                    </div>
                    <br><br>
                    <p>{!! $blog->isi_blog !!}</p>


                    <nav class="d-flex justify-content-end">
                        <a class="btn btn-outline-primary" href="{{ route('blog') }}">Kembali</a>
                    </nav>

                </div><!-- /.blog-main -->
            </div>
        </div><!-- /.row -->
    </section>
  </main><!-- /.container -->


@endsection
