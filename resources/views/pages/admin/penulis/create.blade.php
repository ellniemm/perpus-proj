<div class="col-md-6">
    <div class="card p-3 custom-card  text-white">
        <div class="card-header">
            <h2>tambah Penerbit.</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.admin.penulis.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="penulis_nama" class="form-label">Nama Penulis</label>
                    <input type="text" class="form-control" id="penulis_nama" name="penulis_nama" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="penulis_desc" class="form-label">Deskripsi Penulis</label>
                    <textarea class="form-control" id="penulis_desc" name="penulis_desc" rows="3" required maxlength="150"></textarea>
                </div>
                <button type="submit" class="fw-bolder  btn custom-button">Tambah Penerbit</button>
            </form>
        </div>
    </div>
</div>