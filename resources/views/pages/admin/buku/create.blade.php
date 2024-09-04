@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Tambah Buku - Admin')

@section('main')
    <div class="container mt-5">
        <div class="card p-3 custom-card text-white">
            <div class="card-header">
                <h3>Tambah Buku Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('adminBukuStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="buku_kategori_id" class="form-label">Kategori</label>
                            <select class="form-select" id="buku_kategori_id" name="buku_kategori_id" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="buku_penerbit_id" class="form-label">Penerbit</label>
                            <select class="form-select" id="buku_penerbit_id" name="buku_penerbit_id" required>
                                <option value="" selected disabled>Pilih Penerbit</option>
                                @foreach($penerbit as $p)
                                    <option value="{{ $p->penerbit_id }}">{{ $p->penerbit_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="buku_rak_id" class="form-label">Rak</label>
                            <select class="form-select" id="buku_rak_id" name="buku_rak_id" required>
                                <option value="" selected disabled>Pilih Rak</option>
                                @foreach($rak as $r)
                                    <option value="{{ $r->rak_id }}">{{ $r->rak_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="buku_penulis_id" class="form-label">Penulis</label>
                            <select class="form-select" id="buku_penulis_id" name="buku_penulis_id" required>
                                <option value="" selected disabled>Pilih Penulis</option>
                                @foreach($penulis as $pen)
                                    <option value="{{ $pen->penulis_id }}">{{ $pen->penulis_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="buku_stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="buku_stok" name="buku_stok" required>
                        </div>

                        <div class="col">
                            <label for="buku_isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="buku_isbn" name="buku_isbn" maxlength="16" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="buku_nama" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" id="buku_nama" name="buku_nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="buku_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="buku_deskripsi" name="buku_deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="buku_img" class="form-label">Gambar Buku</label>
                        <input type="file" class="form-control" id="buku_img" name="buku_img" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
