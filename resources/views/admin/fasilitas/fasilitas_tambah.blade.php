@extends('admin/layout-admin/v_template')

@section('title','Tambah Fasilitas')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menambahkan Fasilitas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/fasilitas" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_fasilitas">Masukkan Nama Fasilitas</label>
                            <input type="text" class="form-control" value="{{ old('nama_fasilitas') }}" id="nama_fasilitas" class="@error('nama_fasilitas') is-invalid @enderror" name="nama_fasilitas" placeholder="Masukkan Nama Fasilitas">
                            <div class="text-danger">
                                @error('nama_fasilitas')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_fasilitas">Masukkan Foto Fasilitas</label>
                            <input type="file" class="form-control" value="{{ old('gambar_fasilitas') }}" id="gambar_fasilitas" class="@error('gambar_fasilitas') is-invalid @enderror" name="gambar_fasilitas" placeholder="Masukkan Nama Dusun">
                            <div class="text-danger">
                                @error('gambar_fasilitas')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/fasilitas" role="button">Kembali</a>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
    </form>
  </div>




@endsection
