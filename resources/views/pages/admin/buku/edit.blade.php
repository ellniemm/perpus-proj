<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editBukuId" name="buku_id">
                    <div class="mb-3">
                        <label for="editBukuNama" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" id="editBukuNama" name="buku_nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuKategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="editBukuKategori" name="buku_kategori_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuPenerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="editBukuPenerbit" name="buku_penerbit_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuRak" class="form-label">Rak</label>
                        <input type="text" class="form-control" id="editBukuRak" name="buku_rak_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuPenulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="editBukuPenulis" name="buku_penulis_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuIsbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="editBukuIsbn" name="buku_isbn" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuStok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="editBukuStok" name="buku_stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuDeskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editBukuDeskripsi" name="buku_deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editBukuImg" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="editBukuImg" name="buku_img">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
