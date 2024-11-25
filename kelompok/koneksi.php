<?php
$host = "localhost"; // Nama host (biasanya localhost)
$user = "root";      // Username database (default: root)
$password = "";      // Password database (kosong jika default)
$db = "absensi_bank"; // Nama database yang digunakan

$conn = mysqli_connect($host, $user, $password, $db);

// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>