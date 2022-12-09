@extends('admin/layout-admin/v_template')

@section('title','Tambah Partner')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menambahkan Partner</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/partner" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_partner">Masukkan Nama Partner</label>
                            <input type="text" class="form-control" value="{{ old('nama_partner') }}" id="nama_partner" class="@error('nama_partner') is-invalid @enderror" name="nama_partner" placeholder="Masukkan Nama Partner">
                            <div class="text-danger">
                                @error('nama_partner')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="link_partner">Masukkan Link Partner</label>
                            <input type="text" class="form-control" value="{{ old('link_partner') }}" id="link_partner" class="@error('link_partner') is-invalid @enderror" name="link_partner" placeholder="Masukkan Link Partner">
                            <div class="text-danger">
                                @error('link_partner')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_partner">Masukkan Foto Partner</label>
                            <input type="file" class="form-control" value="{{ old('gambar_partner') }}" id="gambar_partner" class="@error('gambar_partner') is-invalid @enderror" name="gambar_partner" placeholder="Masukkan Nama Dusun">
                            <div class="text-danger">
                                @error('gambar_partner')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/partner" role="button">Kembali</a>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
    </form>
  </div>




@endsection
