<footer class="main-footer text-center">
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Nur Rohmah Zahroh</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
     $(document).ready(function() {
         $('.btnEditBarang').on('click', function() {
             const id = $(this).data('id');
             $.ajax({
                 url: '<?= BASEURL; ?>/barang/getBarangById/' + id,
                 method: 'GET',
                 dataType: 'json',
                 success: function(data) {
                     $('#editKdBarang').val(data.kd_barang);
                     $('#editNmBarang').val(data.nm_barang);
                     $('#editHarga').val(data.harga);
                     $('#editStok').val(data.stok);
                 },
                 error: function() {
                     alert('Gagal mengambil data.');
                 }
             });
         });
     });

   $(document).ready(function() {
         $('.btnEditPelanggan').on('click', function() {
             const id = $(this).data('id');
             $.ajax({
                 url: '<?= BASEURL; ?>/pelanggan/getPelangganById/' + id,
                 method: 'GET',
                 dataType: 'json',
                 success: function(data) {
                     $('#editIdPelanggan').val(data.id_pelanggan);
                     $('#editNmPelanggan').val(data.nm_pelanggan);
                     $('#editAlamat').val(data.alamat);
                 },
                 error: function() {
                     alert('Gagal mengambil data.');
                 }
             });
         });
     });
 </script>
 
</body>
</html>