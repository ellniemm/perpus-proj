<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editKategoriId">
                    <div class="mb-3">
                        <label for="editKategoriNama" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="editKategoriNama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKategoriDesc" class="form-label">Deskripsi Kategori</label>
                        <input type="text" class="form-control" id="editKategoriDesc" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>