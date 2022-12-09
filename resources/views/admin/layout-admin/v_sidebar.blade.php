  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="admin" class="brand-link bg-light">
      <center><img src="{{asset('template-user/img/ji_group_header.png')}}" alt="Jatinom Indah" class="brand-image" style="opacity: .8"><span>&ensp;</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active':''}}">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pemesanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    {{-- <a href="{{ route('pesanan') }}" class="nav-link {{ request()->is('admin/pesanan-belumbayar') ? 'active':''}}"> --}}
                    <a href="{{ route('pesanan') }}" class="nav-link {{ request()->is('admin/pesanan-belumbayar') ? 'active':''}} ">
                        <i class="fas fa-shoppingg-cart nav-icon"></i>
                        <p>Belum Bayar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pesanan-proses') }}" class="nav-link  {{ request()->is('admin/pesanan-diproses') ? 'active':''}}">
                        <i class="fas fa-shoppingg-cart nav-icon"></i>
                        <p>Diproses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pesanan-selesai') }} " class="nav-link  {{ request()->is('admin/pesanan-selesai') ? 'active':''}}">
                        <i class="fas fa-shoppingg-cart nav-icon"></i>
                        <p>Selesai</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('pelanggan') }}" class="nav-link {{ request()->is('admin/pelanggan') ? 'active':''}}">
              <i class="fas fa-user-tag nav-icon"></i>
              <p>Pelanggan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('produk') }}" class="nav-link {{ request()->is('admin/produk') ? 'active':''}}">
              <i class="fas fa-shopping-bag nav-icon"></i>
              <p>Produk</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('kategori-produk') }}" class="nav-link {{ request()->is('admin/kategori-produk') ? 'active':''}}">
              <i class="fas fa-sitemap nav-icon"></i>
              <p>Kategori Produk</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('direksi') }}" class="nav-link {{ request()->is('admin/direksi') ? 'active':''}}">
              <i class="fas fa-users nav-icon"></i>
              <p>Jajaran Direksi</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('anak-perusahaan') }}" class="nav-link {{ request()->is('admin/anak-perusahaan') ? 'active':''}}">
              <i class="fas fa-warehouse nav-icon"></i>
              <p>Anak Perusahaan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('partner') }}" class="nav-link {{ request()->is('admin/partner') ? 'active':''}}">
              <i class="fas fa-user-tie nav-icon"></i>
              <p>Partner</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('fasilitas') }}" class="nav-link {{ request()->is('admin/fasilitas') ? 'active':''}}">
              <i class="fas fa-wrench nav-icon"></i>
              <p>Fasilitas</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('expertise') }}" class="nav-link {{ request()->is('admin/expertise') ? 'active':''}}">
              <i class="fas fa-clipboard-list nav-icon"></i>
              <p>Expertise</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blog') }}" class="nav-link {{ request()->is('admin/blog') ? 'active':''}}">
              <i class="fas fa-file nav-icon"></i>
              <p>Blog</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('ulasan') }}" class="nav-link {{ request()->is('admin/ulasan') ? 'active':''}}">
              <i class="fas fa-keyboard nav-icon"></i>
              <p>Ulasan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('slider') }}" class="nav-link {{ request()->is('admin/slider') ? 'active':''}}">
              <i class="fas fa-images nav-icon"></i>
              <p>Slider</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
