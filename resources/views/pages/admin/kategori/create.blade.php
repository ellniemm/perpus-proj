<div class="col-md-6">
    <div class="card p-3 custom-card  text-white">
        <div class="card-header">
            <h2>tambah Kategori.</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.admin.kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kategori_nama" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="kategori_desc" class="form-label">Deskripsi Kategori</label>
                    <textarea class="form-control" id="kategori_desc" name="kategori_desc" rows="3" required maxlength="150"></textarea>
                </div>
                <button type="submit" class="fw-bolder  btn custom-button">Tambah Kategori</button>
            </form>
        </div>
    </div>
</div>