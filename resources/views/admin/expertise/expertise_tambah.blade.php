@extends('admin/layout-admin/v_template')

@section('title','Tambah Expertise')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menambahkan Expertise</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form method="POST" action="/admin/expertise" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_expertise">Masukkan Nama Expertise</label>
                            <input type="text" class="form-control" value="{{ old('nama_expertise') }}" id="nama_expertise" class="@error('nama_expertise') is-invalid @enderror" name="nama_expertise" placeholder="Masukkan Nama Expertise">
                            <div class="text-danger">
                                @error('nama_expertise')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        
                        <!--<div class="form-group">-->
                        <!--    <label for="deskripsi_expertise">Masukkan Deskripsi Expertise</label>-->
                        <!--    <textarea id="summernote" row=5 value="{{ old('deskripsi_expertise') }}" class="form-control class="@error('deskripsi_expertise') is-invalid @enderror" name="deskripsi_expertise" rows="5">{{ old('deskripsi_expertise') }}</textarea>-->
                        <!--    <div class="text-danger">-->
                        <!--        @error('deskripsi_expertise')-->
                        <!--            {{ $message }}-->
                        <!--        @enderror-->
                        <!--      </div>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="deskripsi_expertise">Masukkan Deskripsi Expertise</label>
                            <textarea id="summernote" value="{{ old('deskripsi_expertise') }}" class="form-control" class="@error('deskripsi_expertise') is-invalid @enderror" name="deskripsi_expertise">
                             {{ old('deskripsi_expertise') }}
                            </textarea>
                            <div class="text-danger">
                                @error('deskripsi_expertise')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="gambar_expertise">Masukkan Gambar Expertise</label>
                            <input type="file" class="form-control" value="{{ old('gambar_expertise') }}" id="gambar_expertise" class="@error('gambar_expertise') is-invalid @enderror" name="gambar_expertise" placeholder="Masukkan Gambar">
                            <div class="text-danger">
                                @error('gambar_expertise')
                                    {{ $message }}
                                @enderror
                              </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/expertise" role="button">Kembali</a>
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
