@include('pages.layouts.siswa')
@include('pages.components.siswa.navbar')
@include('pages.components.siswa.cart')

@section('title', 'Buku - Siswa')

<div class="container mt-5">
    <div class="container">
        <input type="text" id="search" class="form-control" placeholder="Cari buku...">
        <div id="search-results" class="row mt-3">
            @foreach ($bukus as $buku)
                <div class="col-md-4 mb-4">
                    <div id="{{ $buku->buku_id }}" class="card h-100 shadow-sm book-item">
                        <img src="{{ asset('images/' . $buku->buku_img) }}" class="card-img-top p-3"
                            alt="{{ $buku->buku_nama }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bolder text-center">{{ $buku->buku_nama }}</h5>
                            <p class="card-text text-muted text-center">{{ Str::limit($buku->buku_deskripsi, 100) }}</p>
                            <p class="card-text text-center"><strong>Stok: {{ $buku->buku_stok }}</strong></p>
                            <div class="mt-auto text-center">
                                @if (in_array($buku->buku_id, $cartIds))
                                    <button class="btn btn-secondary" disabled>In Cart</button>
                                @else
                                    <button class="btn custom-button add-to-cart" data-id="{{ $buku->buku_id }}">
                                        Add to Cart
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Fungsi untuk menambahkan buku ke keranjang
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var bukuId = $(this).data('id');

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        buku_id: bukuId
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#cart-items').load(location.href +
                            ' #cart-items'); // Update cart items
                            $('.cart-count').text(response.cartCount); // Update cart count
                            // Disable the button and change text
                            $('button[data-id="' + bukuId + '"]').prop('disabled', true).text(
                                'In Cart');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });




        // Fungsi untuk mencari buku
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: "{{ route('siswaBukuSearch') }}",
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function(data) {
                        $('#search-results').empty(); // Kosongkan hasil sebelumnya

                        if (data.books.length > 0) {
                            $.each(data.books, function(index, buku) {
                                // Periksa apakah ID buku ada di array cartIds
                                var inCart = data.cartIds.includes(buku.buku_id);

                                var bookItem = '<div class="col-md-4 mb-4 book-item">' +
                                    '<div class="card h-100 shadow-sm">' +
                                    '<img src="/images/' + buku.buku_img +
                                    '" class="card-img-top p-3" alt="' + buku
                                    .buku_nama + '">' +
                                    '<div class="card-body d-flex flex-column">' +
                                    '<h5 class="card-title fw-bolder text-center">' +
                                    buku.buku_nama + '</h5>' +
                                    '<p class="card-text text-muted text-center">' +
                                    buku.buku_deskripsi.substring(0, 100) + '</p>' +
                                    '<p class="card-text text-center"><strong>Stok: ' +
                                    buku.buku_stok + '</strong></p>' +
                                    '<div class="mt-auto text-center">' +
                                    (inCart ?
                                        '<button class="btn btn-secondary" disabled>In Cart</button>' :
                                        '<button class="btn custom-button add-to-cart" data-id="' +
                                        buku.buku_id + '">Add to Cart</button>') +
                                    '</div></div></div></div>';

                                $('#search-results').append(bookItem);
                            });
                        } else {
                            $('#search-results').append(
                                '<p class="text-center">Buku tidak ditemukan.</p>');
                        }
                    }

                });
            });
        });
    </script>
