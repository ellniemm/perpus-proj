@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Buku - Admin')

@section('style')
    <style>
        .image-cell {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-cell img {
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('main')
    <div class="container mt-5">
        <h1 class="fw-bolder">Buku.</h1>
        <br>
        <div class="row">
            <div class="card p-3 custom-card text-white">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">data Buku.</h2>
                    <a class="btn custom-button fw-bold" href="{{ route('adminBukuCreate') }}">Tambah Buku</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped text-white table-responsive custom-table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Gambar</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Kategori</th>
                                <th class="text-center" scope="col">Penerbit</th>
                                <th class="text-center" scope="col">Rak</th>
                                <th class="text-center" scope="col">Penulis</th>
                                <th class="text-center" scope="col">ISBN</th>
                                <th class="text-center" scope="col">Stok</th>
                                <th class="text-center" scope="col">Deskripsi</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukus as $buku)
                                <tr>
                                    <td class="text-center">{{ $buku->buku_id }}</td>
                                    <td class="image-cell"><img src="{{ asset('images/' . $buku->buku_img) }}"
                                            alt="{{ $buku->buku_nama }}" width="70" class="book-img"></td>
                                    <td>{{ $buku->buku_nama }}</td>
                                    <td class="text-center">{{ $buku->kategori->kategori_nama }}</td>
                                    <td class="text-center">{{ $buku->penerbit->penerbit_nama }}</td>
                                    <td class="text-center">{{ $buku->rak->rak_nama }}</td>
                                    <td class="text-center">{{ $buku->penulis->penulis_nama }}</td>
                                    <td class="text-center">{{ $buku->buku_isbn }}</td>
                                    <td class="text-center">{{ $buku->buku_stok }}</td>
                                    <td>{{ $buku->buku_deskripsi }}</td>
                                    <td>
                                        <div class="flex justify-center-item">
                                            <button type="button" class="btn btn-warning edit-btn"
                                                data-id="{{ $buku->buku_id }}">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Edit Buku -->
        @include('pages.admin.buku.edit')

    </div>

    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var id = $(this).data('id');

                $.get('/admin/buku/edit/' + id, function(data) {
                    $('#editBukuId').val(data.buku_id);
                    $('#editBukuNama').val(data.buku_nama);
                    $('#editBukuKategori').val(data.buku_kategori_id);
                    $('#editBukuPenerbit').val(data.buku_penerbit_id);
                    $('#editBukuRak').val(data.buku_rak_id);
                    $('#editBukuPenulis').val(data.buku_penulis_id);
                    $('#editBukuIsbn').val(data.buku_isbn);
                    $('#editBukuStok').val(data.buku_stok);
                    $('#editBukuDeskripsi').val(data.buku_deskripsi);
                    $('#currentFileName').text(data.buku_img);
                    $('#editModal').modal('show');
                });
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();
                var id = $('#editBukuId').val();


                // Mengirim data buku yang telah diubah ke server
                $(document).ready(function() {
                    $('#editForm').submit(function(e) {
                        e.preventDefault();
                        var id = $('#editBukuId').val();

                        $.ajax({
                            url: '/admin/buku/update/' + id,
                            method: 'PUT',
                            data: {
                                buku_nama: $('#editBukuNama').val(),
                                buku_kategori_id: $('#editBukuKategori').val(),
                                buku_penerbit_id: $('#editBukuPenerbit').val(),
                                buku_rak_id: $('#editBukuRak').val(),
                                buku_penulis_id: $('#editBukuPenulis').val(),
                                buku_isbn: $('#editBukuIsbn').val(),
                                buku_stok: $('#editBukuStok').val(),
                                buku_deskripsi: $('#editBukuDeskripsi').val(),
                                buku_img: $('#editBukuImg').val(),
                                _token: '{{ csrf_token() }}'
                            },
                            processData: false, // Jangan proses data menjadi query string
                            contentType: false, // Jangan set konten tipe otomatis
                            success: function(response) {
                                $('#editModal').modal('hide');
                                location.reload();
                            },
                            error: function(xhr) {
                                console.log(xhr
                                    .responseText); // Untuk debugging
                            }
                        });
                    });
                });
            });
        });
    </script>

@endsection
