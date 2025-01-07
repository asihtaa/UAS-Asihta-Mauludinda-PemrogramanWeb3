<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown mr-2">
            <a class="d-flex align-items-center nav-link" data-toggle="dropdown" href="#">
                @if (auth()->user()->foto == null)
                    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2 mr-2"
                        alt="Foto Profile" width="35px">
                @else
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="rounded-circle thumb-xl profile-image mr-2"
                        alt="Foto Profile" style="width: 35px; height: 35px;">
                @endif
                <span class="text-black"><strong>{{ auth()->user()->name }}</strong></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('profile.edit-password') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>Edit Password
                </a>
                
            </div>
        </li>

    </ul>
</nav>
