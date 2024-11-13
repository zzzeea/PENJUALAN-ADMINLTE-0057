<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'dbpenjualan_0057';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
    }

    public function query($query) {
        return $this->conn->prepare($query);
    }
}
