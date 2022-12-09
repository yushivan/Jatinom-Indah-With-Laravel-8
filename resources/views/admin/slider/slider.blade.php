@extends('admin/layout-admin/v_template')

@section('title','Slider')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            <a class="btn btn-success m-2" href="/admin/slider/create" role="button">Tambah slider</a>
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                    {{ session('pesan') }}
                </div>
            @endif
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Gambar Slider</th>
                        <th>Judul Slider</th>
                        <th>Caption Slider</th>
                        <th>Link Slider</th>
                        <th style="width: 180px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                      @foreach ($slider as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ asset('/upload/slider/'.$item->gambar_slider) }}" class="product-image" style="width: 200px; height: 120px" alt="Slider Image"></td>
                            <td>{{ $item->judul_slider }}</td>
                            <td>{!! $item->caption_slider !!}</td>
                            <td>{{ $item->link_slider }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm mr-1" href="/admin/slider/{{ $item->id_slider }}/edit" role="button"> Edit</a>
                                <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#hapus{{ $item->id_slider }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    {{ $slider->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

  @foreach ($slider as $item)
    <div class="modal fade" id="hapus{{ $item->id_slider }}">
        <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
            <p>Apakah data <span style="font-weight: bold">{{ $item->judul_slider }}</span> ini yakin dihapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                <a class="btn btn-light" href="/admin/slider/{{ $item->id_slider }}" role="button">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach

  </div>
  <!-- /.content-wrapper -->
@endsection
