<?php
class TransaksiController extends Controller {
    public function index() {
        $data['transaksi'] = $this->model('Transaksi')->getAll();
        $data['barang'] = $this->model('Transaksi')->getBarangList();
        $data['pelanggan'] = $this->model('Transaksi')->getPelangganList();
        
        $data['title'] = 'Daftar Transaksi';
        
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data); 
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['transaksi'] = $this->model('Transaksi')->getById($id);
        
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            echo json_encode($data['transaksi']); 
            exit;
        }
        
        $data['title'] = 'Detail Transaksi';
        $this->view('templates/header', $data);
        $this->view('transaksi/detail', $data);
    }
    
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jumlah = $_POST['jumlah'];
            $kd_barang = $_POST['kd_barang'];

            $harga = $this->model('Transaksi')->getHargaBarang($kd_barang);
            $total_harga = $harga * $jumlah;

            $data = [
                'kd_barang' => $kd_barang,
                'id_pelanggan' => $_POST['id_pelanggan'],
                'jumlah' => $jumlah,
                'total_harga' => $total_harga
            ];

            $this->model('Transaksi')->insert($data);

            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }
}
