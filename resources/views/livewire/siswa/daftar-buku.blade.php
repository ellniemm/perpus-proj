<div class="container">
    <div class="row">
        @foreach ($bukus as $buku)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/' . $buku->buku_img) }}" class="card-img-top p-3" alt="{{ $buku->buku_nama }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bolder text-center">{{ $buku->buku_nama }}</h5>
                    <p class="card-text text-muted text-center">{{ Str::limit($buku->buku_deskripsi, 100) }}</p>
                    <p class="card-text text-center"><strong>Stok: {{ $buku->buku_stok }}</strong></p>
                    <div class="mt-auto text-center">
                        @if (in_array($buku->buku_id, $cart))
                            <button class="btn btn-secondary" disabled>In Cart</button>
                        @else
                            <button class="btn custom-button" wire:click="addToCart({{ $buku->buku_id }})">Add to Cart</button>
                        @endif
                    </div>  
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <script>
        Livewire.on('cartUpdated', () => {
            alert('Buku telah ditambahkan ke keranjang!');
        });
    </script>
    
</div>
