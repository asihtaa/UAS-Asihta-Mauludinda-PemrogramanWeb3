<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/Logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-6" style="opacity: .8">
        <span class="brand-text font-weight-light">PT.RBJ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}"
                        class="nav-link {{ isset($active) && $active == 'menu-dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ (isset($active) && $active == 'menu-batubara') || (isset($active) && $active == 'menu-barang') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ (isset($active) && $active == 'menu-batubara') || (isset($active) && $active == 'menu-barang') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Master Data 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.batubara.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-batubara' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batu Bara</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kendaraan.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-kendaraan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kendaraan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.pelanggan.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-pelanggan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.gudang.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-gudang' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gudang</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>
                <li class="nav-item">
                            <a href="{{ route('dashboard.suratjalan.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-suratjalan' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>Transaksi</p>
                            </a>
                 </li>
                <li class="nav-header">PENGATURAN</li>
                <li
                    class="nav-item {{ (isset($active) && $active == 'menu-user') || (isset($active) && $active == 'menu-role') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ (isset($active) && $active == 'menu-user') || (isset($active) && $active == 'menu-role') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manajemen User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.user.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-user' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.role.index') }}"
                                class="nav-link {{ isset($active) && $active == 'menu-role' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
