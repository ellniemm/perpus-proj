@extends('pages.layouts.siswa')
@extends('pages.components.siswa.navbar')

@section('title', 'Peminjaman - Siswa')

@section('main')
<div class="container mt-5">
    <h1>Peminjaman</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3 custom-card text-white">
                <div class="card-header">
                    <h2>Data Peminjaman</h2>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped text-white custom-table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Books</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $peminjaman->peminjaman_id }}</td>
                                    <td>{{ $peminjaman->user->user_nama }}</td>
                                    <td>{{ $peminjaman->peminjaman_notes }}</td>
                                    <td>
                                        @foreach ($peminjaman->details as $detail)
                                            <span>{{ $detail->buku->buku_nama }}</span><br>
                                        @endforeach
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>