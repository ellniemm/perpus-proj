@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Rak - Admin')

@section('main')
<div class="container mt-5">
  <div class="row">
      <!-- Table Column -->
      <div class="col-md-6">
        <div class="card p-3 custom-card text-white">
            <div class="card-header">
                <h2>Data Rak</h2>
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
                              <th scope="col">Nama</th>
                              <th scope="col">Lokasi</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody id="dataTable">
                         @foreach ($raks as $item)
                             <tr>
                                <td>{{ $item->rak_id }}</td>
                                <td>{{ $item->rak_nama }}</td>
                                <td>{{ $item->rak_lokasi }}</td>
                                <td>
                                    <div class="flex justify-center-item">
                                        <button class="btn btn-warning edit-btn" data-id="{{ $item->rak_id }}"><i class="bi bi-pen"></i></button>
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
        @include('pages.admin.rak.create')
    
        @include('pages.admin.rak.edit')

    <script>
        $(document).ready(function(){
            $('.edit-btn').click(function(){
                var id = $(this).data('id');
                $.get('/admin/rak/edit/' + id, function(data){
                    $('#editRakId').val(data.rak_id);
                    $('#editRakNama').val(data.rak_nama);
                    $('#editRakLokasi').val(data.rak_lokasi);
                    $('#editModal').modal('show');
                });
            });

            $('#editForm').submit(function(e){
                e.preventDefault();
                var id = $('#editRakId').val();
                $.ajax({
                    url: '/admin/rak/update/' + id,
                    method: 'PUT',
                    data: {
                        rak_nama: $('#editRakNama').val(),
                        rak_lokasi: $('#editRakLokasi').val(),
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
