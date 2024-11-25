<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pegawai_id = $_POST['pegawai_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $query = "INSERT INTO absensi (pegawai_id, tanggal, status) VALUES ('$pegawai_id', '$tanggal', '$status')";
    if (mysqli_query($conn, $query)) {
        header("Location: simpan_data.php");
    } else {
        $error = "Gagal menambah data.";
    }
}

$queryPegawai = "SELECT * FROM pegawai";
$resultPegawai = mysqli_query($conn, $queryPegawai);
?>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    select, input[type="date"], button {
        padding: 10px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 5px;
        transition: border 0.3s ease;
    }

    select:focus, input[type="date"]:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        border: none;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
        text-align: center;
        font-size: 14px;
        margin-bottom: 15px;
    }

    option {
        padding: 10px;
    }
</style>

<div class="container">
    <?php if (isset($error)) { echo "<div class='error-message'>$error</div>"; } ?>

    <h1>Form Absensi Pegawai</h1>

    <form method="POST" action="">
        <select name="pegawai_id" required>
            <option value="">Pilih Pegawai</option>
            <?php while ($pegawai = mysqli_fetch_assoc($resultPegawai)) { ?>
                <option value="<?= $pegawai['id']; ?>"><?= $pegawai['nama']; ?></option>
            <?php } ?>
        </select>

        <input type="date" name="tanggal" required>

        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alfa">Alfa</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</div>