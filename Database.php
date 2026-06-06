<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "db_showroom";
    public $conn;

    // Constructor otomatis dijalankan saat objek kelas dibuat
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}
?>