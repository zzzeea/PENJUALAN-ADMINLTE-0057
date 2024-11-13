<?php
class BarangController extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Barang';
        $data['barang'] = $this->model('Barang')->getAll();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function getBarangById($id)
    {
        $barang = $this->model('Barang')->getById($id);
        echo json_encode($barang);  
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kd_barang' => $_POST['kd_barang'],
                'nm_barang' => $_POST['nm_barang'],
                'harga' => $_POST['harga'],
                'stok' => $_POST['stok']
            ];
            $this->model('Barang')->insert($data);
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['kd_barang'];
            $data = [
                'nama' => trim($_POST['nm_barang']),
                'harga' => trim($_POST['harga']),
                'stok' => trim($_POST['stok']),
            ];
            $this->model('Barang')->update($id, $data);
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Barang')->delete($id)) {
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            echo "Gagal menghapus barang.";
        }
    }
}
