{{-- <div>
    <h4>Keranjang Anda</h4>
    <ul class="list-group">
        @forelse($cart as $item)
            <li class="list-group-item">
                Buku ID: {{ $item->buku_id }}
            </li>
        @empty
            <li class="list-group-item">Keranjang Anda kosong.</li>
        @endforelse
    </ul>
</div> --}}

<div class="dropdown cart-btn pe-3">
    <a class="btn btn-dark" type="button" id="cartDropdown" href="" aria-expanded="false">
        <i class="bi bi-cart"></i>
        <span class="cart-count">{{ count(Session::get('cart', [])) }}</span>
    </a>
    <ul class="dropdown-menu custom-cart-menu dropdown-menu-end" aria-labelledby="cartDropdown">
        <div id="cart-items">
            @forelse(Session::get('cart', []) as $item)
                @if (is_array($item) && isset($item['nama'], $item['quantity']))
                    <li class="dropdown-item">
                        {{ $item['nama'] }} - {{ $item['quantity'] }} pcs
                    </li>
                @else
                    <li class="dropdown-item">Item tidak valid.</li>
                @endif
            @empty
                <li class="dropdown-item">Keranjang Anda kosong.</li>
            @endforelse
        </div>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <div>
                <button class="custom-button dropdown-item" data-bs-toggle="modal" data-bs-target="#cartModal">
                    Lihat Keranjang
                </button>
            </div>
        </li>
    </ul>
</div>
