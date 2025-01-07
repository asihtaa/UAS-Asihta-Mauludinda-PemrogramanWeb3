<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('assets/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Batu Bara</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('assets/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo e(route('profile.edit')); ?>" class="d-block"><?php echo e(auth()->user()->name); ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(url('/dashboard')); ?>"
                        class="nav-link <?php echo e(isset($active) && $active == 'menu-dashboard' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item <?php echo e((isset($active) && $active == 'menu-kategori') || (isset($active) && $active == 'menu-barang') ? 'menu-is-opening menu-open' : ''); ?>">
                    <a href="#"
                        class="nav-link <?php echo e((isset($active) && $active == 'menu-kategori') || (isset($active) && $active == 'menu-barang') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Master Data 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('dashboard.kategori.index')); ?>"
                                class="nav-link <?php echo e(isset($active) && $active == 'menu-kategori' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('dashboard.barang.index')); ?>"
                                class="nav-link <?php echo e(isset($active) && $active == 'menu-barang' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard.pabrik.index')); ?>"
                        class="nav-link <?php echo e(isset($active) && $active == 'menu-pabrik' ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Data Pabrik
                        </p>
                    </a>
                </li>
                <li class="nav-header">PENGATURAN</li>
                <li
                    class="nav-item <?php echo e((isset($active) && $active == 'menu-user') || (isset($active) && $active == 'menu-role') ? 'menu-is-opening menu-open' : ''); ?>">
                    <a href="#"
                        class="nav-link <?php echo e((isset($active) && $active == 'menu-user') || (isset($active) && $active == 'menu-role') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manajemen User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('dashboard.user.index')); ?>"
                                class="nav-link <?php echo e(isset($active) && $active == 'menu-user' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('dashboard.role.index')); ?>"
                                class="nav-link <?php echo e(isset($active) && $active == 'menu-role' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item <?php echo e((isset($active) && $active == 'menu-laporan-perhari') || (isset($active) && $active == 'menu-laporan-perbulan') ? 'menu-is-opening menu-open' : ''); ?>">
                    <a href="#"
                        class="nav-link <?php echo e((isset($active) && $active == 'menu-laporan-perhari') || (isset($active) && $active == 'menu-laporan-perbulan') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('dashboard.laporan-perhari.index')); ?>"
                                class="nav-link <?php echo e(isset($active) && $active == 'menu-laporan-perhari' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perhari</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('dashboard.laporan-perbulan.index')); ?>"
                                class="nav-link <?php echo e(isset($active) && $active == 'menu-laporan-perbulan' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Perbulan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('logout')); ?>" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH C:\laragon\www\inventory\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>