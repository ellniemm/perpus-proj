<div class="col-md-6">
    <div class="card p-3 custom-card  text-white">
        <div class="card-header">
            <h2>tambah Penerbit.</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.admin.penerbit.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="penerbit_nama" class="form-label">Nama Penerbit</label>
                    <input type="text" class="form-control" id="penerbit_nama" name="penerbit_nama" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="penerbit_desc" class="form-label">Deskripsi Penerbit</label>
                    <textarea class="form-control" id="penerbit_desc" name="penerbit_desc" rows="3" required maxlength="150"></textarea>
                </div>
                <button type="submit" class="fw-bolder  btn custom-button">Tambah Penerbit</button>
            </form>
        </div>
    </div>
</div>