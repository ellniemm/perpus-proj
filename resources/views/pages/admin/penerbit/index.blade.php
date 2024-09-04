@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'penerbit - Admin')

@section('main')
    <div class="container mt-5">
        <h1>Penerbit.</h1>
        <br>
        <div class="row">
            <!-- Table Column -->
            <div class="col-md-6">
                <div class="card p-3 custom-card text-white">
                    <div class="card-header">
                        <h2>data Penerbit.</h2>
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
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerbits as $penerbit)
                                    <tr>
                                        <td>{{ $penerbit->penerbit_id }}</td>
                                        <td>{{ $penerbit->penerbit_nama }}</td>
                                        <td>{{ $penerbit->penerbit_desc }}</td>
                                        <td>
                                            <div class="flex justify-center-item">
                                                <button class="btn btn-warning edit-btn" data-id="{{ $penerbit->penerbit_id }}"><i class="bi bi-pen"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Form Column -->
            @include('pages.admin.penerbit.create')

            <!-- Modal -->
            @include('pages.admin.penerbit.edit')

    <script>
        $(document).ready(function(){
            $('.edit-btn').click(function(){
                var id = $(this).data('id');
                $.get('/admin/penerbit/edit/' + id , function(data){
                    $('#editPenerbitId').val(data.penerbit_id);
                    $('#editPenerbitNama').val(data.penerbit_nama);
                    $('#editPenerbitDesc').val(data.penerbit_desc);
                    $('#editModal').modal('show');
                });
            });

            $('#editForm').submit(function(e){
                e.preventDefault();
                var id = $('#editPenerbitId').val();
                $.ajax({
                    url: '/admin/penerbit/update/' + id,
                    method: 'PUT',
                    data: {
                        penerbit_nama: $('#editPenerbitNama').val(),
                        penerbit_desc: $('#editPenerbitDesc').val(),
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

        </div>
    </div>

@endsection
