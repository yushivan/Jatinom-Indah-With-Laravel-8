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
            <h1>Pesanan Belum Bayar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <div class="card-header">
                    <div class="card-tools">
                        <form action="/admin/pesanan-belumbayar/pencarian/cari" method="GET">
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
                        <th>Nomor Faktur</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Belanja</th>
                        <th>Pembayaran</th>
                        <th>Verifikasi Pembayaran</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                      @foreach ($pesanan as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->kode_verifikasi }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>@currency($item->total)</td>
                            <td align="center">
                                @if($item->bukti_pembayaran == "Belum dibayar.png")
                                <span class="badge badge-danger">
                                    {{\Illuminate\Support\Str::limit($item->bukti_pembayaran, 5, $end=' ')}}
                                </span>
                                @else
                                <span class="badge badge-success">
                                    {{\Illuminate\Support\Str::limit($item->bukti_pembayaran, 5, $end=' ')}}
                                </span>
                                @endif
                                 </td>
                            <td align="center"><button type="button" class="btn btn-success btn-sm mr-1" data-toggle="modal" data-target="#verifikasi{{ $item->id_pemesanan }}">
                                Klik Verifikasi
                           </button></td>
                            <td align="center">
                                <a href="/admin/pesanan-belumbayar/detail-pesanan/{{ $item->id_pemesanan }}" class="btn btn-sm btn-outline-primary"  style="color: blue" >Detail Pemesanan</a>
                                <a href="/admin/pesanan-belumbayar/bukti-pembayaran/{{ $item->id_pemesanan }}" class="btn btn-sm btn-primary" style="color: white">Bukti Transfer</a>
                                <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#hapus{{ $item->id_pemesanan }}">
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
                    {{ $pesanan->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

  @foreach ($pesanan as $item)
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="hapus{{ $item->id_pemesanan }}">
        <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
            <p>Apakah pemesanan dari <span style="font-weight: bold">{{ $item->nama }}</span> ini yakin dihapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                <a class="btn btn-light" href="/admin/pesanan-belumbayar/{{ $item->id_pemesanan }}" role="button">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach

  @foreach ($pesanan as $item)
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="verifikasi{{ $item->id_pemesanan }}">
        <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-body">
            <p>Verifikasi pembayaran dari <span style="font-weight: bold">{{ $item->nama }}</span> ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                <a class="btn btn-light" href="/admin/pesanan-belumbayar/{{ $item->id_pemesanan }}/verifikasi" role="button">Verifikasi</a>
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
