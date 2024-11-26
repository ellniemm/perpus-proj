<!-- Modal Detail Cart -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Detail Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="cart-items">
                    <!-- Isi detail keranjang akan dimuat secara dinamis -->
                    @if (is_array($cart) && count($cart) > 0)
                        @foreach ($cart as $item)
                            <div class="card mb-3" id="cart-item-{{ $item['buku_id'] }}">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="{{ asset('images/' . $item['image']) }}"
                                            class="img-fluid rounded-start" width="120" alt="{{ $item['nama'] }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['nama'] }}</h5>
                                            <p class="card-text">Stok: {{ $item['stok'] }}</p>
                                            <div class="d-flex align-items-center">
                                                <input type="number" class="form-control w-25 me-3 update-quantity"
                                                    data-id="{{ $item['buku_id'] }}" value="{{ $item['quantity'] }}"
                                                    min="1">
                                                <button class="btn btn-danger me-2 btn-delete"
                                                    data-id="{{ $item['buku_id'] }}">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">Keranjang kosong.</p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn custom-button" id="submit-peminjaman">Pinjam Buku</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script untuk memuat data keranjang -->
<script>
    $(document).ready(function() {
        // Memuat data keranjang ketika modal dibuka
        $('#cartModal').on('show.bs.modal', function() {
            $('#cart-items').load("{{ route('cart.details') }}", function(response, status, xhr) {
                if (status == "error") {
                    alert('Terjadi kesalahan saat memuat data keranjang.');
                }
            });
        });

        // Hapus item dari keranjang
        $(document).on('click', '.btn-delete', function() {
            var itemId = $(this).data('id');

            $.ajax({
                url: "{{ route('cart.remove') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    item_id: itemId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $('#cart-item-' + itemId).remove();
                        alert(response.message);
                        $('.cart-count').text(response.cartCount);
                    } else {
                        alert('Gagal menghapus item.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menghapus item.');
                }
            });
        });

        // Update kuantitas item di keranjang
        $(document).on('change', '.update-quantity', function() {
            var itemId = $(this).data('id');
            var newQuantity = $(this).val();

            $.ajax({
                url: "{{ route('cart.update') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    item_id: itemId,
                    quantity: newQuantity
                },
                success: function(response) {
                    if (response.status === 'success') {

                    } else {
                        alert('Gagal memperbarui kuantitas.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat memperbarui kuantitas.');
                }
            });
        });
    });

    document.getElementById('submit-peminjaman').addEventListener('click', function() {
        const cartItems = [];
        document.querySelectorAll('#cart-items .card').forEach(card => {
            const bukuId = card.querySelector('.update-quantity').getAttribute('data-id');
            const quantity = card.querySelector('.update-quantity').value;

            cartItems.push({
                buku_id: bukuId,
                quantity: parseInt(quantity, 10),
            });
        });

        // Kirim data keranjang ke server
        fetch('/siswa/peminjaman', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: JSON.stringify({
                    cart: cartItems
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);

                    // Hapus isi keranjang di frontend
                    const cartContainer = document.getElementById('cart-items');
                    cartContainer.innerHTML = '<p class="text-center">Keranjang kosong.</p>';

                    location.reload(); // Muat ulang halaman jika diperlukan
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses peminjaman.');
            });
    });
</script>
