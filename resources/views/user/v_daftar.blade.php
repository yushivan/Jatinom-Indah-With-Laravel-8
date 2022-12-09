 <!-- header -->
  @include('user/layout/v_header')
  <!-- /.header -->

  <!-- Navbar -->
  @include('user/layout/v_navbar')
  <!-- /.navbar -->

<body class="daftar" style="background-image: url({{asset('template-user/img/carousel2.jpg')}});">

<!-- daftar -->
  <div class="container login-form ">
    <div class="row justify-content-center">
	      <div class="col-12 kotak-daftar ">
	        <div class="card card-signin my-5">
	          <div class="card-body ">
	          	<div class="">
	          		<img src="{{asset('template-user/img/ji_group_header.png')}}" width="80%" class="mx-auto mb-2" align="center">
	          	</div>
	            <span>Buat akun dan bergabung dengan kami untuk melakukan pembelian</span>
	            <hr>
	            <form class="form-signin text-center" method="POST" action="{{ route('simpan-registrasi-user') }}">
        		@csrf
        		
	              <div class="form-label-group mb-3">
	                <input type="email" name="email" class="form-control" placeholder="Email" required>
	                @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>
	              
	              <div class="form-label-group mb-3">
	                <input type="password" name="password" class="form-control" placeholder="Password" minLength="8"required>
	                @error('password')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
	                @error('name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="no_telp" class="form-control" placeholder="No. Telp" required minLength="6">
	                @error('no_telp')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" required>
	                @error('provinsi')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="kab_kota" class="form-control" placeholder="Kota/Kabupaten" required>
	                @error('kab_kota')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required>
	                @error('kecamatan')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required>
	                @error('kelurahan')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
	                @error('alamat')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <button class="btn btn-lg btn-warning btn-block text-uppercase mb-3" type="submit">DAFTAR</button>

	              <div class="form-label-group mb-3">
	                <span>Sudah Punya Akun? <a href="login-user" style="text-decoration: none;">Masuk</a></span>
	              </div>

	            </form>
	          </div>
	        </div>
	      </div>
    </div>
  </div>
<!-- end daftar -->


