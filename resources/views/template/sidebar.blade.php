
<aside class="main-sidebar elevation-4" style="background-color: #32c6c3;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://majoo.putrirembulan.com/assets/img/takemori.jpg" alt="AdminLTE Logo"
            class="brand-image image-center elevation-3" style="opacity: .8">
        <h5 class="text-light text-lg">Takemori</h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2 text-light">
            <ul class="nav nav-pills nav-sidebar flex-column text-light" data-widget="treeview" role="menu" data-accordion="false">           
                
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}">
                            <a href="{{ route('produk') }}"
                                class="nav-link">
                                <p>Daftar Produk</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Opname</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="{{ route('stokProduk') }}"
                                class="nav-link">
                                <p>Stok Produk</p>
                            </a>
                        </li>                    
                                       
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-light">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Penjualan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Penjualan Produk</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Daftar Penjualan Produk</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Invoice Penjualan</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Void</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Komisi Penjualan</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Laporan Penjualan</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <p>Komisi Target</p>
                            </a>
                        </li>                    
                                       
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-light">
                        <i class="nav-icon fas fa-caret-square-down"></i>
                        <p>
                            More
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('user') }}"
                                class="nav-link">
                                <p>Table Users</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="{{ route('kategoriSatuan') }}"
                                class="nav-link">
                                <p>Kategori & Satuan</p>
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a href="{{ route('karyawan') }}"
                                class="nav-link">
                                <p>Waitress</p>
                            </a>
                        </li>                    
                                       
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
