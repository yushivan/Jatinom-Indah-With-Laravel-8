@extends('admin/layout-admin/v_template')

@section('title','Pesanan')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bukti Transfer pembeli</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/pesanan-belumbayar/">Home</a></li>
              <li class="breadcrumb-item active">Pesanan</li>
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

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="header-detail">
                        <div class="form-group col-md-4">
                            <img src="{{url('upload/bukti-tf/'.$daftar_pemesanan->bukti_pembayaran)}}" alt="Tidak ada bukti Transfer" class="img-thumbnail" style="width: 400px; height: 400px;">
                        </div>
                        <a href="{{ url('upload/bukti-tf/'.$daftar_pemesanan->bukti_pembayaran) }}" download data-gall="portfolioGallery" class=" btn btn-primary venobox preview-link" title="App 1">Download Bukti transfer pembeli</a>
                        {{-- <a class="btn btn-primary" href="{{ url('upload/admin-galeri/'.$daftar_pemesanan->bukti_pembayaran) }}" role="button">Download Bukti transfer pembeli</a> --}}
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/pesanan-belumbayar/" role="button"></a>
                <a class="btn btn-outline-danger" href="/admin/pesanan-belumbayar/" role="button">Kembali</a>

            </div>
            </div>

          </div>
        </div>
    </section>



  </div>
  <!-- /.content-wrapper -->
@endsection
