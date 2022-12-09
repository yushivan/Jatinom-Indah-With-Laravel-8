@extends('admin/layout-admin/v_template')

@section('title','Tambah Blog')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menambahkan Blog</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/blog" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul_blog">Masukkan Judul Blog</label>
                            <input type="text" class="form-control" value="{{ old('judul_blog') }}" id="judul_blog" class="@error('judul_blog') is-invalid @enderror" name="judul_blog" placeholder="Masukkan Judul Blog">
                            <div class="text-danger">
                                @error('judul_blog')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="isi_blog">Masukkan Isi Blog</label>
                            <textarea id="summernote" value="{{ old('isi_blog') }}" class="form-control"@error('isi_blog') is-invalid @enderror" name="isi_blog">
                             {{ old('isi_blog') }}
                            </textarea>
                            <div class="text-danger">
                                @error('isi_blog')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_blog">Masukkan Foto Blog</label>
                            <input type="file" class="form-control" value="{{ old('gambar_blog') }}" id="gambar_blog" class="@error('gambar_blog') is-invalid @enderror" name="gambar_blog" placeholder="Masukkan Foto Blog">
                            <div class="text-danger">
                                @error('gambar_blog')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/blog" role="button">Kembali</a>
                <button type="submit" class="btn btn-success">Tambah</button>
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
