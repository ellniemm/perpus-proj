<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Rak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editRakId">
                    <div class="mb-3">
                        <label for="editRakNama" class="form-label">Nama Rak</label>
                        <input type="text" class="form-control" id="editRakNama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRakLokasi" class="form-label">Lokasi Rak</label>
                        <input type="text" class="form-control" id="editRakLokasi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
