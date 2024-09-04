@extends('pages.layouts.siswa')
@extends('pages.components.siswa.navbar')

@section('title', 'Dashboard - Siswa')

@section('main')
    <div class="container mt-4">
        <h1>selamat datang, {{ $user->user_nama }}</h1>
        <br>
        <div class="container-">
            <div class="row gap-4">
                <div class="card text-bg-secondary mb-3 col" style="max-width: 18rem;" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <h5 class="card-title">Buku pinjaman</h5>
                        <p class="card-text">jumlah buku yang sedang dipinjam : -/10</p>
                    </div>
                </div>
                <div class="card text-bg-light mb-3 col" style="max-width: 18rem;" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <h5 class="card-title">Tenggat Peminjaman</h5>
                        <p class="card-text">tgl :</p>
                    </div>
                </div>
                <div class="card text-bg-dark mb-3 col" style="max-width: 18rem;" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
