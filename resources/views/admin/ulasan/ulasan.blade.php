@extends('admin/layout-admin/v_template')

@section('title','Ulasan')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Ulasan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Ulasan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Ulasan Masuk</h3>

                <div class="card-tools">
                    <form action="/admin/ulasan/pencarian/cari" method="GET">
                        <div class="input-group" style="width: 300px;">
                        <input type="text" name="cari" placeholder="Masukkan nama" class="form-control" />
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
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 mt-4">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php $i=1 ?>
                      @foreach ($ulasan as $item)
                        <tr>
                            <td class="mailbox-name">{{ $i++ }}</td>
                            <td class="mailbox-name"><a href="/admin/ulasan/{{ $item->id_ulasan }}/detail">{{ $item->nama_ulasan }}</a></td>
                            <td class="mailbox-subject">{!! \Illuminate\Support\Str::limit($item->isi_ulasan, 60) !!}</td>
                            <td class="mailbox-date">{{ $item->tgl_ulasan }}</td>
                            <td class="mailbox-star">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $item->id_ulasan }}">
                                    <i class="fas fa-trash"> </i>
                                </button>
                                {{-- <a class="btn btn-danger btn-sm" href="/admin/ulasan/{{ $item->id_ulasan }}" role="button"><i class="far fa-trash-alt"></i></a> --}}
                            </td>
                        </tr>
                      @endforeach

                  </tbody>
                </table>
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $ulasan->links() }}
                  </ul>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  @foreach ($ulasan as $item)
  <div class="modal fade" id="hapus{{ $item->id_ulasan }}">
      <div class="modal-dialog">
      <div class="modal-content bg-danger">
          <div class="modal-body">
          <p>Apakah data <span style="font-weight: bold">{{ $item->nama_ulasan }}</span> ini yakin dihapus ?</p>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a class="btn btn-light" href="/admin/ulasan/{{ $item->id_ulasan }}" role="button">Hapus</a>
          </div>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  @endforeach
@endsection
