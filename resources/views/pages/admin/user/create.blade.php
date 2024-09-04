@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Tambah User - Admin')

@section('main')
    <div class="container mt-5">
        <h1>Tambah User</h1>
        <br>
        <div class="row">
            <div class="card p-3 custom-card text-white">
                <div class="card-header">
                    <h2>Tambah User</h2>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('adminUserStore') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_nama" class="form-label">Nama User</label>
                            <input type="text" class="form-control" id="user_nama" name="user_nama" required
                                maxlength="50">
                        </div>
                        <div class="mb-3">
                            <label for="user_alamat" class="form-label">Alamat User</label>
                            <input type="text" class="form-control" id="user_alamat" name="user_alamat" required
                                maxlength="50">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="user_notelp" class="form-label">No. Telp</label>
                                <input type="text" class="form-control" id="user_notelp" name="user_notelp" required
                                    maxlength="13">
                            </div>
                            <div class="col">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" required
                                    maxlength="50">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="user_username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="user_username" name="user_username" required
                                    maxlength="50">
                            </div>
                            <div class="col">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="user_password" name="user_password" required
                                    maxlength="50">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="user_level" class="form-label">Level</label>
                            <select class="form-select" id="user_level" name="user_level" required>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        <button type="submit" class="fw-bolder btn custom-button">Tambah User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
