 <section class="content">
     <a href="<?= BASEURL; ?>/barang/add" class="btn btn-dark mb-3" data-toggle="modal" data-target="#modalTambahBarang">Tambah Data</a>
     <!-- Default box -->
     <div class="card">
         <div class="card-header">
             <h3 class="card-title">Data Barang</h3>

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
                                 <th>Kode Barang</th>
                                 <th>Nama Barang</th>
                                 <th>Harga</th>
                                 <th>Stok</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1; ?>
                             <?php foreach ($data['barang'] as $barang): ?>
                                 <tr>
                                     <th><?= $no++ ?></th>
                                     <td><?= htmlspecialchars($barang['kd_barang']) ?></td>
                                     <td><?= htmlspecialchars($barang['nm_barang']) ?></td>
                                     <td><?= htmlspecialchars($barang['harga']) ?></td>
                                     <td><?= htmlspecialchars($barang['stok']) ?></td>
                                     <td>
                                         <a href="<?= BASEURL; ?>/barang/edit/<?= htmlspecialchars($barang['kd_barang']) ?>" class="btn btn-outline-warning btn-sm btnEditBarang" data-id="<?= $barang['kd_barang']; ?>" data-toggle="modal" data-target="#editBarangModal">Edit</a>
                                         <a href="<?= BASEURL; ?>/barang/delete/<?= htmlspecialchars($barang['kd_barang']) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
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

     <!-- Modal Form Tambah Barang -->
     <div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="modalTambahBarangLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-dark">
                     <h5 class="modal-title" id="modalTambahBarangLabel">Tambah Barang</h5>
                     <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form action="<?= BASEURL; ?>/barang/add" method="POST">
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="kd_barang">Kode Barang</label>
                             <input type="text" class="form-control" id="kd_barang" name="kd_barang" required>
                         </div>
                         <div class="form-group">
                             <label for="nm_barang">Nama Barang</label>
                             <input type="text" class="form-control" id="nm_barang" name="nm_barang" required>
                         </div>
                         <div class="form-group">
                             <label for="harga">Harga</label>
                             <input type="number" class="form-control" id="harga" name="harga" required>
                         </div>
                         <div class="form-group">
                             <label for="stok">Stok</label>
                             <input type="number" class="form-control" id="stok" name="stok" required>
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

     <!-- Modal Edit Barang -->
     <div class="modal fade" id="editBarangModal" tabindex="-1" aria-labelledby="editBarangLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header bg-dark">
                     <h5 class="modal-title" id="editBarangLabel">Edit Barang</h5>
                     <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form id="formEditBarang" method="POST" action="<?= BASEURL; ?>/barang/edit">
                     <div class="modal-body">
                         <input type="hidden" id="editKdBarang" name="kd_barang">
                         <div class="form-group">
                             <label for="editNmBarang">Nama Barang</label>
                             <input type="text" class="form-control" id="editNmBarang" name="nm_barang" required>
                         </div>
                         <div class="form-group">
                             <label for="editHarga">Harga</label>
                             <input type="number" class="form-control" id="editHarga" name="harga" required>
                         </div>
                         <div class="form-group">
                             <label for="editStok">Stok</label>
                             <input type="number" class="form-control" id="editStok" name="stok" required>
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

 