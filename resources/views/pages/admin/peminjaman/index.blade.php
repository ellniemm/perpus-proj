@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Peminjaman - Admin')

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
                                @if (Auth::user()->user_level == 'admin')
                                    <th scope="col">Action</th>
                                @endif
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
                                    @if (Auth::user()->user_level == 'admin')
                                        <td>
                                            <button class="btn btn-warning edit-btn" data-id="{{ $peminjaman->peminjaman_id }}"><i class="bi bi-pen"></i></button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if (Auth::user()->user_level == 'admin')
            <!-- Modal -->
            @include('pages.admin.peminjaman.edit')

            <script>
                $(document).ready(function(){
                    $('.edit-btn').click(function(){
                        var id = $(this).data('id');
                        $.get('admin/peminjaman/edit' + id + '/edit', function(data){
                            $('#editPeminjamanId').val(data.peminjaman_id);
                            $('#editPeminjamanNotes').val(data.peminjaman_notes);
                            $('#editModal').modal('show');
                        });
                    });

                    $('#editForm').submit(function(e){
                        e.preventDefault();
                        var id = $('#editPeminjamanId').val();
                        $.ajax({
                            url: 'admin/peminjaman/update' + id,
                            method: 'PUT',
                            data: {
                                peminjaman_notes: $('#editPeminjamanNotes').val(),
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response){
                                $('#editModal').modal('hide');
                                location.reload();
                            }
                        });
                    });
                });
            </script>
        @endif
    </div>
</div>
@endsection
