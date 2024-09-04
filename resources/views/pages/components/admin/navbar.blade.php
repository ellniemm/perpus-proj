<nav class="navbar navbar-custom fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.dashboard')}}">
            Admin Dashboard
        </a>
        <div class="d-flex align-items-center justify-content-around">
            <div class="dropdown profile-btn ms-3">
                <button class="btn btn-dark" type="button" id="profileDropdown" aria-expanded="false">
                    <img src="https://i.pinimg.com/564x/01/2b/eb/012beb281483ef878d32279cd5f3a6d7.jpg" alt="user photo" class="rounded-circle" width="30" height="30">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="profileDropdown">
                    <li class="dropdown-item text-white">{{ $user->user_nama }}</li>
                    <li class="dropdown-item text-gray">{{ $user->user_email }}</li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('profileAdmin')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="offcanvas offcanvas-start offcanvas-custom text-bg-white" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu.</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard')}}">
                            <i class="bi bi-house"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminbuku') }}">
                            <i class="bi bi-book-half"></i>
                            Buku.
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminkategori') }}">
                            <i class="bi bi-bookshelf"></i>
                            Kategori.
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminpenulis') }}">
                            <i class="bi bi-bookmark-heart"></i>
                            Penulis.
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminpenerbit') }}">
                            <i class="bi bi-person-badge"></i>
                            Penerbit.
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminrak') }}">
                            <i class="bi bi-person-badge"></i>
                            Rak.
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminUserIndex') }}">
                            <i class="bi bi-person-badge"></i>
                            User.
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminPeminjamanIndex') }}">
                            <i class="bi bi-link-45deg"></i>
                            Peminjaman.
                        </a>
                    </li>
                    
                </ul>
                
            </div>
        </div>
    </div>
</nav>
