<?php
class PelangganController extends Controller
{
    public function index()
    {
        $data['pelanggan'] = $this->model('Pelanggan')->getAll();
        $data['title'] = 'Daftar Pelanggan';
        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/footer');
    }

    public function getPelangganById($id)
    {
        $pelanggan = $this->model('Pelanggan')->getById($id);
        echo json_encode($pelanggan);  
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_pelanggan' => $_POST['id_pelanggan'],
                'nm_pelanggan' => $_POST['nm_pelanggan'],
                'alamat' => $_POST['alamat']
            ];

            $this->model('Pelanggan')->insert($data);

            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_pelanggan'];
            $data = [
                'nm_pelanggan' => trim($_POST['nm_pelanggan']),
                'alamat' => trim($_POST['alamat']),
            ];
            $this->model('Pelanggan')->update($id, $data);
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }

    public function delete($id)
    {
        if ($id) {
            $this->model('Pelanggan')->delete($id);
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            echo "Gagal menghapus barang.";
        }
        
    }
}
