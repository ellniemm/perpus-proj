<div class="col-md-6">
    <div class="card p-3 custom-card text-white">
        <div class="card-header">
            <h2>Tambah Rak</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.admin.rak.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rak_nama" class="form-label">Nama Rak</label>
                    <input type="text" class="form-control" id="rak_nama" name="rak_nama" required maxlength="20">
                </div>
                <div class="mb-3">
                    <label for="rak_lokasi" class="form-label">Lokasi Rak</label>
                    <textarea class="form-control" id="rak_lokasi" name="rak_lokasi" rows="3" required maxlength="50"></textarea>
                </div>
                <button type="submit" class="fw-bolder btn custom-button">Tambah Rak</button>
            </form>
        </div>
    </div>
</div>
