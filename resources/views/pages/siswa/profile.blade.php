@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Profile - Admin')

@section('main')
    <div class="container">
        <h2>Profil Saya</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="user_nama">Nama Lengkap</label>
                        <input type="text" name="user_nama" id="user_nama" class="form-control"
                            value="{{ old('user_nama', Auth::user()->user_nama) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="user_alamat">Alamat</label>
                        <input type="text" name="user_alamat" id="user_alamat" class="form-control"
                            value="{{ old('user_alamat', Auth::user()->user_alamat) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="user_username">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control"
                            value="{{ old('user_username', Auth::user()->user_username) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control"
                            value="{{ old('user_email', Auth::user()->user_email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="user_notelp">No. Telepon</label>
                        <input type="text" name="user_notelp" id="user_notelp" class="form-control"
                            value="{{ old('user_notelp', Auth::user()->user_notelp) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="user_level">Level Pengguna</label>
                        <select name="user_level" id="user_level" class="form-control" disabled>
                            <option value="admin" {{ Auth::user()->user_level == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="siswa" {{ Auth::user()->user_level == 'siswa' ? 'selected' : '' }}>Siswa
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
