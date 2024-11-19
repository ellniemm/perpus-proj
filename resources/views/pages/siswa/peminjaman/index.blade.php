@extends('pages.layouts.siswa')
@extends('pages.components.siswa.navbar')

@section('title', 'Peminjaman - Siswa')

@section('main')
    <div class="container mt-5">
        <h1>Daftar Peminjaman</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamans as $index => $peminjaman)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $peminjaman->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if ($peminjaman->peminjaman_status == 1)
                                Belum Mengembalikan
                            @else
                                Sudah Mengembalikan
                            @endif
                        </td>
                        <td>{{ $peminjaman->peminjaman_notes ?? 'Tidak ada catatan' }}</td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#detailModal-{{ $peminjaman->peminjaman_id }}">
                                Lihat Detail
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="detailModal-{{ $peminjaman->peminjaman_id }}" tabindex="-1"
                                aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">Detail Peminjaman</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach ($peminjaman->details as $detail)
                                                <div class="card mb-3">
                                                    <img src="{{ asset('images/' . $detail->buku->buku_img) }}"
                                                        class="card-img-top" alt="{{ $detail->buku->buku_nama }}">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $detail->buku->buku_nama }}</h5>
                                                        <p class="card-text">Jumlah: {{ $detail->quantity }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
