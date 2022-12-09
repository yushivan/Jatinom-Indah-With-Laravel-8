<!-- navbar -->
	<nav class="navbar navbar-expand-lg" style="background-color: ghostwhite;">
	  <div class="container-fluid navbar-content">
	    <a class="navbar-brand" href="/"><img src="{{ asset('template-user/img/ji_group_header.png') }}"></a>
	    <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link" href="../../beranda">HOME</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="../../fasilitas-user">FASILITAS</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="../../produk-user">PRODUK</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="../../blog-user">BLOG</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="../../tentang-user">TENTANG</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link btn btn-md btn-warning text-center" href="../../shop-user">SHOP</a>
	        </li>

	        <li class="nav-item dropdown" style="margin-left: 10px;margin-right: -40px;padding-top: 8px;">
	        	<a class="text-decoration-none text-dark dropdown-toggle col-sm-8 col-md-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-user fs-3"></i>
				</a>

				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
					@if(!auth()->user())
					<li class="nav-link">
						<a href="{{ route('login-user') }}" class="dropdown-item text-end" > Login <i class="fa fa-arrow-circle-right"></i> </a>
					</li>
					@else()
					<li class="nav-link">
					    <span class="dropdown-item text-end">{{ Auth::user()->name }} <i class="fa fa-user-circle"></i> </span>
					</li>
					<li class="nav-link">
                        <a href="/pemesanan-user" class="dropdown-item text-end">Keranjang</a>
					</li>
					<li class="nav-link">
                        <a href="/pemesanan-user/daftar-pesanan-belumbayar" class="dropdown-item text-end">Pemesanan</a>
					</li>
					{{-- <li class="nav-link">
					    <a href="{{ route('logout-user') }}" class="dropdown-item text-end" > <i class="fa fa-arrow-circle-left"></i> Logout </a>
					</li> --}}
                    <li class="nav-link">
                        <a class="dropdown-item text-end" href="{{ route('logout-user') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout-user') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
					@endif
				</ul>
	        </li>

	      </ul>
	    </div>
	  </div>
	</nav>
<!-- end navbar -->
