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
                        <label for="editPenulisDesc" class="form-label">Biografi Penulis</label>
                        <input type="text" class="form-control" id="editPenulisDesc" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
