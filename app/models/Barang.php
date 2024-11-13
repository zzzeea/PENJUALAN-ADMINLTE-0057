<?php
class Barang {
    private $table = 'barang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->query("SELECT * FROM $this->table WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->db->query("INSERT INTO $this->table (kd_barang, nm_barang, harga, stok) 
                                    VALUES (:kd_barang, :nm_barang, :harga, :stok)");
        $stmt->bindParam(':kd_barang', $data['kd_barang'], PDO::PARAM_STR);
        $stmt->bindParam(':nm_barang', $data['nm_barang'], PDO::PARAM_STR);
        $stmt->bindParam(':harga', $data['harga'], PDO::PARAM_INT);
        $stmt->bindParam(':stok', $data['stok'], PDO::PARAM_INT);
        
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Insert Error: " . $e->getMessage());
            return false;
        }
    }

    public function update($id, $data) {
        $stmt = $this->db->query("UPDATE $this->table SET nm_barang = :nm_barang, harga = :harga, stok = :stok WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':nm_barang', $data['nama'], PDO::PARAM_STR);
        $stmt->bindParam(':harga', $data['harga'], PDO::PARAM_INT);
        $stmt->bindParam(':stok', $data['stok'], PDO::PARAM_INT);
        $stmt->bindParam(':kd_barang', $id, PDO::PARAM_STR);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Update Error: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        $stmt = $this->db->query("DELETE FROM $this->table WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $id, PDO::PARAM_STR);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Delete Error: " . $e->getMessage());
            return false;
        }
    }
}
