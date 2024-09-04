<div>
    <input type="text" wire:model="search" placeholder="Cari buku..." class="form-control mb-3">

    @if(!empty($bukus)) <!-- Menggunakan empty() untuk memeriksa apakah array kosong -->
        <ul class="list-group">
            @foreach($bukus as $buku)
                <li class="list-group-item">
                    <h5>{{ $buku->buku_nama }}</h5>
                    <p>{{ Str::limit($buku->buku_deskripsi, 100) }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Tidak ada buku yang ditemukan.</p>
    @endif
</div>
