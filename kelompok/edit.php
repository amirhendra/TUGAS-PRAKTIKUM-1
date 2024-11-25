<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM absensi WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $query = "UPDATE absensi SET tanggal='$tanggal', status='$status' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: data_absensi.php");
    } else {
        $error = "Gagal mengupdate data.";
    }
}
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #74ebd5, #acb6e5);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 100%;
        max-width: 400px;
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input[type="date"], select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        transition: border-color 0.3s;
    }

    input[type="date"]:focus, select:focus {
        border-color: #74ebd5;
        outline: none;
    }

    button {
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 10px;
        background-color: #74ebd5;
        color: #ffffff;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #56c9d4;
    }

    .error-message {
        color: #d9534f;
        font-size: 14px;
        text-align: center;
        margin-top: -10px;
        margin-bottom: 15px;
    }
</style>

<div class="container">
    <h1>Update Absensi</h1>

    <?php if (isset($error)) { echo "<div class='error-message'>$error</div>"; } ?>

    <form method="POST" action="">
        <input type="date" name="tanggal" value="<?= htmlspecialchars($data['tanggal']); ?>" required>
        <select name="status" required>
            <option value="Hadir" <?= $data['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
            <option value="Izin" <?= $data['status'] == 'Izin' ? 'selected' : ''; ?>>Izin</option>
            <option value="Sakit" <?= $data['status'] == 'Sakit' ? 'selected' : ''; ?>>Sakit</option>
            <option value="Alfa" <?= $data['status'] == 'Alfa' ? 'selected' : ''; ?>>Alfa</option>
        </select>
        <button type="submit">Update</button>
    </form>
</div>