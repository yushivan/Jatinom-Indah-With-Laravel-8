@extends('admin/layout-admin/v_template')

@section('title','Edit Kategori Produk')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mengedit Kategori Produk</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/kategori-produk/{{ $kategori->id_kategori }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kategori">Masukkan Nama Kategori Produk</label>
                            <input type="text" class="form-control" value="{{ $kategori->nama_kategori }}" id="nama_kategori" class="@error('nama_kategori') is-invalid @enderror" name="nama_kategori" placeholder="Masukkan Nama Produk">
                            <div class="text-danger">
                                @error('nama_kategori')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/kategori-produk" role="button">Kembali</a>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
    </form>
  </div>




@endsection
