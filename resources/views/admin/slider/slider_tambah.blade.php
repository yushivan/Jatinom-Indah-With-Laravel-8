@extends('admin/layout-admin/v_template')

@section('title','Tambah Slider')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menambahkan Slider</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/slider" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul_slider">Masukkan Judul Slider</label>
                            <input type="text" class="form-control" value="{{ old('judul_slider') }}" id="judul_slider" class="@error('judul_slider') is-invalid @enderror" name="judul_slider" placeholder="Masukkan Judul Slider">
                            <div class="text-danger">
                                @error('judul_slider')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="caption_slider">Masukkan Konten Slider</label>-->
                        <!--    <input type="text" class="form-control" value="{{ old('caption_slider') }}" id="caption_slider" class="@error('caption_slider') is-invalid @enderror" name="caption_slider" placeholder="Masukkan Konten Slider">-->
                        <!--    <div class="text-danger">-->
                        <!--        @error('caption_slider')-->
                        <!--            {{ $message }}-->
                        <!--        @enderror-->
                        <!--      </div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="caption_slider">Masukkan Konten Slider</label>
                            <textarea id="summernote" value="{{ old('caption_slider') }}" class="form-control" class="@error('caption_slider') is-invalid @enderror" name="caption_slider">
                             {{ old('caption_slider') }}
                            </textarea>
                            <div class="text-danger">
                                @error('caption_slider')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="link_slider">Masukkan Link Slider</label>
                            <input type="text" class="form-control" value="{{ old('link_slider') }}" id="link_slider" class="@error('link_slider') is-invalid @enderror" name="link_slider" placeholder="Masukkan Link Slider">
                            <div class="text-danger">
                                @error('link_slider')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_slider">Masukkan Foto Slider</label>
                            <input type="file" class="form-control" value="{{ old('gambar_slider') }}" id="gambar_slider" class="@error('gambar_slider') is-invalid @enderror" name="gambar_slider" placeholder="Masukkan Nama Dusun">
                            <div class="text-danger">
                                @error('gambar_slider')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/slider" role="button">Kembali</a>
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