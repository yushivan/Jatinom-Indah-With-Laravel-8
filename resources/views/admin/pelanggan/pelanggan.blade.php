@extends('admin/layout-admin/v_template')

@section('title','Pelanggan')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
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
                <div class="card-header">
                    <div class="card-tools">
                        <form action="/admin/pelanggan/pencarian/cari" method="GET">
                            <div class="input-group" style="width: 300px;">
                            <input type="text" name="cari" placeholder="Masukkan nama pelanggan" class="form-control" />
                            <div class="input-group-append">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                      <i class="fas fa-search"></i>
                                    </button>
                                  </div>
                            </div>
                            </div>
                      </form>
                    </div>
                  </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th style="width: 100px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                      @foreach ($pelanggan as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td> {{ $item->alamat }}, Desa/Kelurahan {{ $item->kelurahan }}, Kec. {{ $item->kecamatan }}, Kab. {{ $item->kab_kota }}, {{ $item->provinsi }}</td>
                            <td>
                                {{-- <a class="btn btn-warning btn-sm mr-1" href="/admin/pelanggan/{{ $item->id_pelanggan }}/edit" role="button"><i class="fas fa-pencil-alt">
                                </i> Edit</a> --}}
                                <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#hapus{{ $item->id }}">
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
                    {{ $pelanggan->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

  @foreach ($pelanggan as $item)
    <div class="modal fade" id="hapus{{ $item->id }}">
        <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
            <p>Apakah data <span style="font-weight: bold">{{ $item->name }}</span> ini yakin dihapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                <a class="btn btn-light" href="/admin/pelanggan/{{ $item->id }}" role="button">Hapus</a>
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
