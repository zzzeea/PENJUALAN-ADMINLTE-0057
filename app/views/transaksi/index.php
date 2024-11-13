<section class="content">
    <a href="<?= BASEURL; ?>/transaksi/add" class="btn btn-dark mb-3" data-toggle="modal" data-target="#addTransaksiModal">Tambah Data</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Transaksi</h3>

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
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Kode Barang</th>
                                <th>ID Pelanggan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data['transaksi'] as $transaksi): ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($transaksi['id_transaksi']) ?></td>
                                    <td><?= htmlspecialchars($transaksi['kd_barang']) ?></td>
                                    <td><?= htmlspecialchars($transaksi['id_pelanggan']) ?></td>
                                    <td><?= htmlspecialchars($transaksi['jumlah']) ?></td>
                                    <td><?= htmlspecialchars($transaksi['total_harga']) ?></td>
                                    <td><?= htmlspecialchars($transaksi['tanggal']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info" onclick="openTransactionModal(<?= $transaksi['id_transaksi'] ?>)">
                                            Detail
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
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
    </div>

    <!-- Modal Form Tambah Transaksi -->
    <div class="modal fade" id="addTransaksiModal" tabindex="-1" aria-labelledby="addTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= BASEURL; ?>/transaksi/add" method="POST" id="transaksiForm">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="addTransaksiModalLabel">Tambah Transaksi</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kd_barang" class="form-label">Barang</label>
                            <select class="form-control" id="kd_barang" name="kd_barang" required>
                                <option value="">Pilih Barang</option>
                                <?php foreach ($data['barang'] as $barang): ?>
                                    <option value="<?= htmlspecialchars($barang['kd_barang']) ?>" data-harga="<?= htmlspecialchars($barang['harga']) ?>">
                                        <?= htmlspecialchars($barang['nm_barang']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_pelanggan" class="form-label">Pelanggan</label>
                            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                                <option value="">Pilih Pelanggan</option>
                                <?php foreach ($data['pelanggan'] as $pelanggan): ?>
                                    <option value="<?= htmlspecialchars($pelanggan['id_pelanggan']) ?>"><?= htmlspecialchars($pelanggan['nm_pelanggan']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
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

    <!-- Modal Detail Transaksi -->
    <div class="modal fade" id="detailTransactionModal" tabindex="-1" aria-labelledby="detailTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="detailTransactionModalLabel">Detail Transaksi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th>ID Transaksi</th>
                            <td id="modal-id-transaksi"></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td id="modal-tanggal"></td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td id="modal-total-harga"></td>
                        </tr>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <td id="modal-nama-pelanggan"></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td id="modal-nama-barang"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</section>
</div>

<!-- Script untuk menghitung total harga -->
<script>
    const barangSelect = document.getElementById('kd_barang');
    const jumlahInput = document.getElementById('jumlah');
    const totalInput = document.getElementById('total_harga');

    function updateTotal() {
        const selectedBarang = barangSelect.options[barangSelect.selectedIndex];
        const harga = parseFloat(selectedBarang.getAttribute('data-harga'));
        const jumlah = parseFloat(jumlahInput.value);
        if (!isNaN(harga) && !isNaN(jumlah)) {
            totalInput.value = harga * jumlah;
        } else {
            totalInput.value = '';
        }
    }

    barangSelect.addEventListener('change', updateTotal);
    jumlahInput.addEventListener('input', updateTotal);

    function openTransactionModal(id) {
        $.ajax({
            url: '<?= BASEURL ?>/transaksi/detail/' + id,
            method: 'GET',
            success: function(response) {
                var transaksi = JSON.parse(response);

                document.getElementById("modal-id-transaksi").innerText = transaksi.id_transaksi;
                document.getElementById("modal-tanggal").innerText = transaksi.tanggal;
                document.getElementById("modal-total-harga").innerText = transaksi.total_harga;
                document.getElementById("modal-nama-pelanggan").innerText = transaksi.nm_pelanggan;
                document.getElementById("modal-nama-barang").innerText = transaksi.nm_barang;

                var myModal = new bootstrap.Modal(document.getElementById('detailTransactionModal'));
                myModal.show();
            },
            error: function() {
                alert("Gagal memuat detail transaksi.");
            }
        });
    }
</script>