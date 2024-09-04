@extends('pages.layouts.admin')
@extends('pages.components.admin.navbar')

@section('title', 'Penulis - Admin')

@section('main')
<div class="container mt-5">
  <div class="row">
      <!-- Table Column -->
      <div class="col-md-6">
        <div class="card p-3 custom-card text-white">
            <div class="card-header">
                <h2>data Penulis.</h2>
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
                      <tbody id="dataTable">
                         @foreach ($penuliss as $item)
                             <tr>
                                <td>{{ $item->penulis_id }}</td>
                                <td>{{ $item->penulis_nama }}</td>
                                <td>{{ $item->penulis_desc }}</td>
                                <td>
                                    <div class="flex justify-center-item">
                                        <button class="btn btn-warning edit-btn" data-id="{{ $item->penulis_id }}"><i class="bi bi-pen"></i></button>
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
      @include('pages.admin.penulis.create')
    

      <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Penulis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editPenulisId">
                        <div class="mb-3">
                            <label for="editPenulisNama" class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control" id="editPenulisNama" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPenulisDesc" class="form-label">Deskripsi Penulis</label>
                            <input type="text" class="form-control" id="editPenulisDesc" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.edit-btn').click(function(){
                var id = $(this).data('id');
                $.get('/admin/penulis/edit/' + id, function(data){
                    $('#editPenulisId').val(data.penulis_id);
                    $('#editPenulisNama').val(data.penulis_nama);
                    $('#editPenulisDesc').val(data.penulis_desc);
                    $('#editModal').modal('show');
                });
            });

            $('#editForm').submit(function(e){
                e.preventDefault();
                var id = $('#editPenulisId').val();
                $.ajax({
                    url: '/admin/penulis/update/' + id,
                    method: 'PUT',
                    data: {
                        penulis_nama: $('#editPenulisNama').val(),
                        penulis_desc: $('#editPenulisDesc').val(),
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
