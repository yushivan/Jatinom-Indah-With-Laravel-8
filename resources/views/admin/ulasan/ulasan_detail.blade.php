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
            <h1>Isi Ulasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('ulasan') }}">Ulasan</a></li>
              <li class="breadcrumb-item active">Membaca Ulasan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5><b>{{ $ulasan->nama_ulasan }}</b> </h5>
                <br>
                <h6>Email : {{ $ulasan->email_ulasan }}
                  <span class="mailbox-read-time float-right">{{ $ulasan->tgl_ulasan }}</span></h6>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>{{ $ulasan->isi_ulasan }}</p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $ulasan->id_ulasan }}">
                    <i class="fas fa-trash"> </i>
                </button>
              </div>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/ulasan" role="button">Kembali</a>
            </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="hapus{{ $ulasan->id_ulasan }}">
      <div class="modal-dialog">
      <div class="modal-content bg-danger">
          <div class="modal-body">
          <p>Apakah data <span style="font-weight: bold">{{ $ulasan->nama_ulasan }}</span> ini yakin dihapus ?</p>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a class="btn btn-light" href="/admin/ulasan/{{ $ulasan->id_ulasan }}" role="button">Hapus</a>
          </div>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
@endsection
