<nav class="navbar navbar-custom fixed-top">
    <div class="container-fluid">
        <div class="d-flex align-items-left justify-content-center">
            <a class="navbar-brand ms-3 me-5" href="{{ route('siswaDashboard')}}">
                <h4>Siswa Dashboard</h4>
            </a>
            <a class="btn custom-button me-3 text-center" href="{{ route('siswaDashboard') }}">
                Dashboard.
            </a>
            <a class="btn custom-button me-3 text-center" href="/siswa/buku">
                Buku.
            </a>
            <a class="btn custom-button text-center" href="{{ route('siswaPinjam') }}">
                Peminjaman.
            </a>
        </div>

        <div class="d-flex align-items-center justify-content-around">

            <div class="dropdown cart-btn pe-3" data-bs-toggle="modal" data-bs-target="#cartModal">
                <a class="btn btn-dark" type="button" id="cartDropdown">
                    <i class="bi bi-cart"></i>
                    <span class="cart-count">{{ count(Session::get('cart', [])) }}</span>
                </a>
                <ul class="dropdown-menu custom-cart-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                    <div id="cart-items">
                        @forelse(Session::get('cart', []) as $item)
                            <li class="dropdown-item">
                                {{ $item['nama'] }} - {{ $item['quantity'] }} pcs
                            </li>
                        @empty
                            <li class="dropdown-item">Keranjang Anda kosong.</li>
                        @endforelse
                    </div>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div>
                            <a href="" class="custom-button dropdown-item" data-bs-toggle="modal" data-bs-target="#cartModal">
                                <i class="bi bi-cart"></i>Lihat Keranjang
                            </a>
                        </div>
                    </li>
                </ul>
            </div>            
            <div class="dropdown profile-btn ms-3">
                <button class="btn btn-dark" type="button" id="profileDropdown" aria-expanded="false">
                    <img src="https://i.pinimg.com/736x/63/55/23/63552303ec399f77fc47d3378b1bc4a0.jpg" alt="user photo"
                        class="rounded-circle" width="30" height="30">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="profileDropdown">
                    <li class="dropdown-item text-white">{{ $user->user_nama }}</li>
                    <li class="dropdown-item text-gray">{{ $user->user_email }}</li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('profileSiswa')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
