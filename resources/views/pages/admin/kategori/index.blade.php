@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'kategori - Admin')

@section('main')
    <div class="container mt-5">
        <h1 class="fw-bolder">Kategori.</h1>
        <br>
        <div class="row">
            <!-- Table Column -->
            <div class="col-md-6">
                <div class="card p-3 custom-card text-white">
                    <div class="card-header">
                        <h2 class="fw-bold">data Kategori.</h2>
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
                                @foreach ($kategoris as $items)
                                    <tr>
                                        <td>{{ $items->kategori_id }}</td>
                                        <td>{{ $items->kategori_nama }}</td>
                                        <td>{{ $items->kategori_desc }}</td>
                                        <td>
                                            <div class="flex justify-center-item">
                                                <button class="btn btn-warning edit-btn" data-id="{{ $items->kategori_id }}"><i class="bi bi-pen"></i></button>
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
            @include('pages.admin.kategori.create')

            <!-- Modal -->
            @include('pages.admin.kategori.edit')
        
            <script>
                $(document).ready(function(){
                    $('.edit-btn').click(function(){
                        var id = $(this).data('id');
                        $.get('/admin/kategori/edit/' + id, function(data){
                            $('#editKategoriId').val(data.kategori_id);
                            $('#editKategoriNama').val(data.kategori_nama);
                            $('#editKategoriDesc').val(data.kategori_desc);
                            $('#editModal').modal('show');
                        });
                    });
        
                    $('#editForm').submit(function(e){
                        e.preventDefault();
                        var id = $('#editKategoriId').val();
                        $.ajax({
                            url: '/admin/kategori/update/' + id,
                            method: 'PUT',
                            data: {
                                kategori_nama: $('#editKategoriNama').val(),
                                kategori_desc: $('#editKategoriDesc').val(),
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
