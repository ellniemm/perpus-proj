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
                            <div class="card mb-3" id="cart-item-{{ $item['id'] }}">
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
                                                    data-id="{{ $item['id'] }}" value="{{ $item['quantity'] }}"
                                                    min="1">
                                                <button class="btn btn-danger me-2 btn-delete"
                                                    data-id="{{ $item['id'] }}">Hapus</button>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
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

        // Script untuk menghapus item dari keranjang
        $(document).on('click', '.btn-delete', function() {
            var itemId = $(this).data('id');
            // Implementasi logika penghapusan item dari keranjang
        });

        // Script untuk mengubah kuantitas item di keranjang
        $(document).on('change', '.update-quantity', function() {
            var itemId = $(this).data('id');
            var newQuantity = $(this).val();
            // Implementasi logika pengubahan kuantitas item
        });
    });
</script>
