@extends('admin/layout-admin/v_template')

@section('title','Produk')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            <a class="btn btn-success m-2" href="/admin/produk/create" role="button">Tambah produk</a>
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
                        <form action="/admin/produk/pencarian/cari" method="GET">
                            <div class="input-group" style="width: 300px;">
                            <input type="text" name="cari" placeholder="Masukkan nama produk" class="form-control" />
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
                        <th>Nama Produk</th>
                        <th>Kategori Produk</th>
                        <th>Tersedia di toko</th>
                        <th>Harga produk</th>
                        <th style="width: 250px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                      @foreach ($produk as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            {{-- <td>{{ $item->tampil }}</td> --}}
                            <td>
                                @if($item->tampil == "Iya")
                                <span class="badge badge-success">
                                {{$item->tampil}}
                                </span>
                                @else
                                <span class="badge badge-danger">
                                {{$item->tampil}}
                                </span>
                                @endif
                            </td>
                            <td><a class="btn btn-success btn-sm mr-1" href="/admin/produk/{{ $item->id_produk }}/harga" role="button">Tambah Harga</a></td>
                            <td>
                                {{-- <a class="btn btn-primary btn-sm mr-1" href="/admin/potensi/produk/{{ $item->id }}" role="button">Lihat</a> --}}
                                <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#lihat{{ $item->id_produk }}">
                                     Lihat
                                </button>
                                <a class="btn btn-warning btn-sm mr-1" href="/admin/produk/{{ $item->id_produk }}/edit" role="button">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#hapus{{ $item->id_produk }}">
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
                    {{ $produk->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
    @foreach ($produk as $item)
    <div class="modal fade" id="lihat{{ $item->id_produk }}">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
               <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="col-12">
                  <img src="{{ asset('/upload/produk/'.$item->gambar_produk) }}" class="product-image" style="width: 500px; height: 500px" alt="Product Image">
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-4">
                <br>
                <h4>Nama Produk</h4>
                <h5 class="my-3"><b>{{ $item->nama_produk }}</b></h5>
                <hr>
                <h4>Kategori Produk</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-default text-center active">
                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                    {{ $item->nama_kategori }}
                  </label>
                </div>

                <h4 class="mt-3">Tersedia di Toko</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                    {{ $item->tampil}}
                  </label>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi Produk</a>
                </div>
              </nav>
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {!! $item->deskripsi_produk !!} </div>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  @endforeach

  @foreach ($produk as $item)
    <div class="modal fade" id="hapus{{ $item->id_produk }}">
        <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-body">
            <p>Apakah data <span style="font-weight: bold">{{ $item->nama_produk }}</span> ini yakin dihapus ?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                <a class="btn btn-light" href="/admin/produk/{{ $item->id_produk }}" role="button">Hapus</a>
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
