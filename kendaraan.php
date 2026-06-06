<?php
require_once 'Database.php';

class KendaraanManager extends Database {
    
    // Fungsi CREATE: Menginput data kendaraan
    public function tambahKendaraan($jenis, $brand, $model, $tahun, $harga) {
        $sql = "INSERT INTO kendaraan (jenis_kendaraan, brand, model, tahun, harga_dasar) 
                VALUES ('$jenis', '$brand', '$model', $tahun, $harga)";
        return $this->conn->query($sql);
    }

    // Fungsi READ: Mengambil data dengan LEFT JOIN agar data anak tampil
    public function getSemuaKendaraan() {
        $sql = "SELECT k.*, mk.kapasitas_mesin, ml.kapasitas_baterai, mb.tipe_rantai 
                FROM kendaraan k
                LEFT JOIN mobil_konvensional mk ON k.id_kendaraan = mk.id_kendaraan
                LEFT JOIN mobil_listrik ml ON k.id_kendaraan = ml.id_kendaraan
                LEFT JOIN motor_besar mb ON k.id_kendaraan = mb.id_kendaraan";
        return $this->conn->query($sql);
    }

    // Fungsi DELETE: Menghapus data
    public function hapusKendaraan($id) {
        $sql = "DELETE FROM kendaraan WHERE id_kendaraan = $id";
        return $this->conn->query($sql);
    }
}
?>