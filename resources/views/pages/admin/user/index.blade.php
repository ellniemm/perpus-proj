@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Users - Admin')

@section('main')
    <div class="container mt-5">
        <h1>Users</h1>
        <br>
        <div class="row">
            <!-- Table Column -->
            <div class="card p-3 custom-card text-white">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Data Users</h2>
                    <a class="btn custom-button fw-bold" href="{{ route('adminUserCreate') }}" class="btn btn-primary">Tambah
                        User</a>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">No. Telp</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->user_id }}</td>
                                    <td>{{ $user->user_nama }}</td>
                                    <td>{{ $user->user_alamat }}</td>
                                    <td>{{ $user->user_username }}</td>
                                    <td>{{ $user->user_email }}</td>
                                    <td>{{ $user->user_notelp }}</td>
                                    <td>{{ $user->user_level }}</td>
                                    <td>
                                        <div class="flex justify-center-item">
                                            <button class="btn btn-warning edit-btn" data-id="{{ $user->user_id }}"><i
                                                    class="bi bi-pen"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Modal -->
            @include('pages.admin.user.edit')

            <script>
                $(document).ready(function() {
                    // Event handler for the edit button
                    $('.edit-btn').click(function() {
                        var id = $(this).data('id');
                        $.get('/admin/user/edit/' + id + '/edit', function(data) {
                            $('#editUserId').val(data.user_id);
                            $('#editUserNama').val(data.user_nama);
                            $('#editUserAlamat').val(data.user_alamat);
                            $('#editUserUsername').val(data.user_username);
                            $('#editUserEmail').val(data.user_email);
                            $('#editUserNotelp').val(data.user_notelp);
                            $('#editUserLevel').val(data.user_level);
                            $('#editModal').modal('show');
                        });
                    });

                    // Event handler for the form submission
                    $('#editForm').submit(function(e) {
                        e.preventDefault();
                        var id = $('#editUserId').val();
                        $.ajax({
                            url: '/admin/user/update/' + id,
                            method: 'PUT',
                            data: {
                                user_id: $('#editUserId').val(),
                                user_nama: $('#editUserNama').val(),
                                user_alamat: $('#editUserAlamat').val(),
                                user_username: $('#editUserUsername').val(),
                                user_email: $('#editUserEmail').val(),
                                user_notelp: $('#editUserNotelp').val(),
                                user_level: $('#editUserLevel').val(),
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $('#editModal').modal('hide');
                                location.reload();
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
@endsection
