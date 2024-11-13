<section class="content">
    <a href="<?= BASEURL; ?>/pelanggan/add" class="btn btn-dark mb-3" data-toggle="modal" data-target="#modalTambahPelanggan">Tambah Data</a>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pelanggan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data['pelanggan'] as $pelanggan): ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($pelanggan['id_pelanggan']) ?></td>
                                    <td><?= htmlspecialchars($pelanggan['nm_pelanggan']) ?></td>
                                    <td><?= htmlspecialchars($pelanggan['alamat']) ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>/pelanggan/edit/<?= htmlspecialchars($pelanggan['id_pelanggan']) ?>" class="btn btn-outline-warning btn-sm btnEditPelanggan" data-id="<?= $pelanggan['id_pelanggan']; ?>" data-toggle="modal" data-target="#editPelangganModal">Edit</a>
                                        <a href="<?= BASEURL; ?>/pelanggan/delete/<?= htmlspecialchars($pelanggan['id_pelanggan']) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal Form Tambah Pelanggan -->
    <div class="modal fade" id="modalTambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="modalTambahPelangganLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="modalTambahPelangganLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= BASEURL; ?>/pelanggan/add" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_pelanggan">ID Pelanggan</label>
                            <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                        </div>
                        <div class="form-group">
                            <label for="nm_pelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-dark">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pelanggan -->
    <div class="modal fade" id="editPelangganModal" tabindex="-1" aria-labelledby="editPelangganLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="editPelangganLabel">Edit Pelanggan</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditPelanggan" method="POST" action="<?= BASEURL; ?>/pelanggan/edit">
                    <div class="modal-body">
                        <input type="hidden" id="editIdPelanggan" name="id_pelanggan">
                        <div class="form-group">
                            <label for="editNmPelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="editNmPelanggan" name="nm_pelanggan" required>
                        </div>
                        <div class="form-group">
                            <label for="editAlamat">Alamat</label>
                            <input type="text" class="form-control" id="editAlamat" name="alamat" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-dark">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
</div>