@extends('admin/layout-admin/v_template')

@section('title','Edit Produk')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mengedit Produk</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/produk/{{ $produk->id_produk }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_produk">Masukkan Nama Produk</label>
                            <input type="text" class="form-control" value="{{ $produk->nama_produk }}" id="nama_produk" class="@error('nama_produk') is-invalid @enderror" name="nama_produk" placeholder="Masukkan Nama Produk">
                            <div class="text-danger">
                                @error('nama_produk')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori Produk</label>
                            <select name="id_kategori" class="form-control" value="{{ $produk->nama_kategori }}" id="id_kategori" class="@error('id_kategori') is-invalid @enderror" >
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_kategori')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="deskripsi_produk">Masukkan Deskripsi Produk</label>-->
                        <!--    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="deskripsi_produk" class="@error('deskripsi_produk') is-invalid @enderror" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk">{{ $produk->deskripsi_produk }}</textarea>-->
                        <!--    <div class="text-danger">-->
                        <!--        @error('deskripsi_produk')-->
                        <!--            {{ $message }}-->
                        <!--        @enderror-->
                        <!--      </div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="deskripsi_produk">Masukkan Deskripsi Produk</label>
                            <textarea id="summernote" value="{{ old('deskripsi_produk') }}" class="form-control" class="@error('deskripsi_produk') is-invalid @enderror" name="deskripsi_produk">
                             {{ $produk->deskripsi_produk }}
                            </textarea>
                            <div class="text-danger">
                                @error('deskripsi_produk')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="tampil">Menampilkan Produk di Toko</label>
                            <select name="tampil" class="form-control" value="{{ old('tampil') }}" id="tampil" class="@error('tampil') is-invalid @enderror" >
                                <option selected value="{{ $produk->tampil }}">{{ $produk->tampil }}</option>
                                <option value="Iya">Iya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                            <div class="text-danger">
                                @error('tampil')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gambar_produk">Foto Produk (Sebelumnya)</label>
                            <img src="{{ asset('/upload/produk/'.$produk->gambar_produk) }}" class="img-thumbnail" style="width: 600px; height: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="gambar_produk">Masukkan Foto Produk (Jika ingin diganti)</label>
                            <input type="file" class="form-control" value="{{ old('gambar_produk') }}" id="gambar_produk" class="@error('gambar_produk') is-invalid @enderror" name="gambar_produk" placeholder="Masukkan Nama Dusun">
                            <div class="text-danger">
                                @error('gambar_produk')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/produk" role="button">Kembali</a>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
    </form>
  </div>




@endsection

@section('js')
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@endsection
