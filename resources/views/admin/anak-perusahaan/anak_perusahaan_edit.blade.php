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
            <h1 class="m-0">Mengedit Anak Perusahaan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/anak-perusahaan/{{ $anakPerusahaan->id_ap }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_ap">Masukkan Nama Anak Perusahaan</label>
                            <input type="text" class="form-control" value="{{ $anakPerusahaan->nama_ap }}" id="nama_ap" class="@error('nama_ap') is-invalid @enderror" name="nama_ap" placeholder="Masukkan Nama Anak Perusahaan">
                            <div class="text-danger">
                                @error('nama_ap')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="link_ap">Masukkan Link Anak Perusahaan</label>
                            <input type="text" class="form-control" value="{{ $anakPerusahaan->link_ap }}" id="link_ap" class="@error('link_ap') is-invalid @enderror" name="link_ap" placeholder="Masukkan Nama Anak Perusahaan">
                            <div class="text-danger">
                                @error('link_ap')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        
                        <!--<div class="form-group">-->
                        <!--        <label for="deskripsi_ap">Masukkan Deskripsi Anak Perusahaan</label>-->
                        <!--        <textarea id="summernote" value="{{ $anakPerusahaan->deskripsi_ap }}" class="form-control class="@error('deskripsi_ap') is-invalid @enderror" name="deskripsi_ap" rows="5">{{ $anakPerusahaan->deskripsi_ap }}</textarea>-->
                        <!--        <div class="text-danger">-->
                        <!--            @error('deskripsi_ap')-->
                        <!--                {{ $message }}-->
                        <!--            @enderror-->
                        <!--          </div>-->
                        <!--    </div>-->
                        
                        <div class="form-group">
                            <label for="deskripsi_ap">Masukkan Deskripsi Anak Perusahaan</label>
                            <textarea id="summernote" value="{{ old('deskripsi_ap') }}" class="form-control" class="@error('deskripsi_ap') is-invalid @enderror" name="deskripsi_ap">
                             {{ $anakPerusahaan->deskripsi_ap }}
                            </textarea>
                            <div class="text-danger">
                                @error('deskripsi_ap')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="gambar_ap">Foto Anak Perusahaan (Sebelumnya)</label>
                            <img src="{{ asset('/upload/anak_perusahaan/'.$anakPerusahaan->gambar_ap) }}" class="img-thumbnail" style="width: 600px; height: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="gambar_ap">Masukkan Foto Anak Perusahaan (Jika ingin diganti)</label>
                            <input type="file" class="form-control" value="{{ old('gambar_ap') }}" id="gambar_ap" class="@error('gambar_ap') is-invalid @enderror" name="gambar_ap" placeholder="Masukkan Nama Dusun">
                            <div class="text-danger">
                                @error('gambar_ap')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/anak-perusahaan" role="button">Kembali</a>
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