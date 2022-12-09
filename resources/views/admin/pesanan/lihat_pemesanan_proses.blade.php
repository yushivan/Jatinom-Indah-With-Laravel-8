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
            <h1>Pesanan Diproses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/pesanan-diproses/">Home</a></li>
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
                        <b>Pemesanan untuk : </b>
                        <br>
                        {{ $daftar_pemesanan->nama }} <br>
                        {{ $daftar_pemesanan->no_telp }} <br>
                        {{ $daftar_pemesanan->alamat }} <br>
                        <br>
                        <b>Tanggal pemesanan : </b>
                        <br>
                        Tanggal pesan : {{ $daftar_pemesanan->tgl_pesan }} <br>
                        Tanggal kirim : {{ $daftar_pemesanan->tgl_kirim }} <br>
                        <br>
                    </div>
                    <table class="table bg-white text-center">
                        <tr class=" ">
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                                @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->jumlah }} ({{$item->satuan}})</td>
                                    <td>{{ $item->harga }}</td>
                                    <td> @currency($item->total) </td>
                                </tr>
                                @endforeach
                        <tr class="fw-bold">
                            <td colspan="3" align="center"><b>Total</b></td>
                            <td>@currency($daftar_pemesanan->total)</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-light" href="/admin/pesanan-diproses/" role="button"></a>
                <a class="btn btn-outline-danger" href="/admin/pesanan-diproses/" role="button">Kembali</a>
            </div>
            </div>

          </div>
        </div>
    </section>



  </div>
  <!-- /.content-wrapper -->
@endsection
