<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editUserId" name="user_id">
                    <div class="mb-3">
                        <label for="editUserNama" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="editUserNama" name="user_nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserAlamat" class="form-label">Alamat User</label>
                        <input type="text" class="form-control" id="editUserAlamat" name="user_alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUserUsername" name="user_username" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="user_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserNotelp" class="form-label">No. Telp</label>
                        <input type="text" class="form-control" id="editUserNotelp" name="user_notelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserLevel" class="form-label">Level</label>
                        <select class="form-select" id="editUserLevel" name="user_level" required>
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>