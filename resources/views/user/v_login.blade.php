 <!-- header -->
  @include('user/layout/v_header')
  <!-- /.header -->

  <!-- Navbar -->
  @include('user/layout/v_navbar')
  <!-- /.navbar -->

<body class="login" style="background-image: url({{asset('template-user/img/bg-login.jpg')}});">
<!-- login -->
  <div class="container login-form pt-5">
    <div class="row justify-content-center">
    	  <div class="col-lg-5 d-none d-lg-block">
    	  	<div class="letak-logo text-center mt-5 pt-5">
    	  		<!-- <img src="{{asset('template-user/img/jia.png')}}" class="logo"><br>
    	  		<span class="text-white title-logo">Tradition of Excellence</span> -->
    	  	</div>
    	  </div>
    	  <div class="col-lg-2 d-none d-lg-block"></div>
	      <div class="col-lg-5 col-12 kotak-login ">
	        <div class="card card-signin my-5">
	          <div class="card-body ">
	          	<div class="d-sm-block d-lg-none">
	          		<!-- <img src="{{asset('template-user/img/jia.png')}}" width="40px" class="mx-auto mb-2" align="center"> -->
	          	</div>
	          	<img src="{{asset('template-user/img/ji_group_header.png')}}" width="90%" class="mx-auto mb-2" align="center">
	            <!-- <h2 class="card-title text-center"> JATINOM INDAH</h2> -->
	            <form class="form-signin text-center" method="POST" action="{{ route('postlogin-user') }}">
        		@csrf

	              <div class="form-label-group mb-3">
	                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
	                @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <div class="form-label-group mb-3">
	                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required value="{{ old('password') }}">
	                @error('password')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
	              </div>

	              <button class="btn btn-lg btn-warning btn-block text-uppercase mb-3" type="submit">MASUK</button>

	              <div class="form-label-group mb-3">
	                <span>Belum Punya Akun? <a href="daftar-user" style="text-decoration: none;">Daftar</a></span>
	              </div>

	            </form>
	          </div>
	        </div>
	      </div>
    </div>
  </div>
<!-- end login -->
</body>
