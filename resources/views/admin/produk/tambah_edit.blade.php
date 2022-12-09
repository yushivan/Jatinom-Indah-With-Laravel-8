@extends('admin/layout-admin/v_template')

@section('title','Edit Harga Produk')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mengedit Harga Produk</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/produk/{{ $harga_id->id_produk }}/harga/{{ $harga->id }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <input type="hidden" name="id_produk" value="{{ $harga->id_produk }}">
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="number" disabled  class="form-control" placeholder="{{ $harga_id->nama_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="harga">Masukkan Harga Produk</label>
                            <input type="number" class="form-control" value="{{ $harga->harga }}" id="harga" class="@error('harga') is-invalid @enderror" name="harga" placeholder="Masukkan Harga Produk">
                            <div class="text-danger">
                                @error('harga')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" class="form-control" value="{{ old('satuan') }}" id="satuan" class="@error('satuan') is-invalid @enderror" >
                                <option selected value="{{ $harga->satuan }}">{{ $harga->satuan }}</option>
                                <option value="Ekor">Ekor</option>
                                <option value="Potong">Potong</option>
                                <option value="Kg">Kg</option>
                                <option value="Box">Box</option>
                                <option value="Pcs">Pcs</option>
                                <option value="Karton">Karton</option>
                                <option value="Zak">Zak</option>
                                <option value="Minggu">Minggu</option>
                                <option value="Butir">Butir</option>
                                <option value="Pack">Pack</option>
                            </select>
                            <div class="text-danger">
                                @error('satuan')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/produk/{{ $harga->id_produk }}/harga" role="button">Kembali</a>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
    </form>
  </div>

@endsection