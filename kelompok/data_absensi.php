<?php
include 'koneksi.php';

$query = "SELECT a.*, p.nama FROM absensi a JOIN pegawai p ON a.pegawai_id = p.id";
$result = mysqli_query($conn, $query);
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #74ebd5, #9face6);
        color: #333;
    }

    h1 {
        text-align: center;
        color: #fff;
        margin: 20px 0;
        font-size: 28px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    table {
        width: 90%;
        max-width: 1000px;
        margin: 20px auto;
        border-collapse: collapse;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
        font-size: 14px;
    }

    th {
        background: #4caf50;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 16px;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }

    tr:hover {
        background: #f1f1f1;
    }

    td {
        border-bottom: 1px solid #ddd;
    }

    td:last-child {
        text-align: center;
    }

    a {
        text-decoration: none;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 5px;
        transition: background 0.3s ease, color 0.3s ease;
    }

    a[href*="edit"] {
        background: #007bff;
        color: #fff;
    }

    a[href*="edit"]:hover {
        background: #0056b3;
    }

    a[href*="delete"] {
        background: #dc3545;
        color: #fff;
        margin-left: 5px;
    }

    a[href*="delete"]:hover {
        background: #c82333;
    }

    .button-group {
        text-align: center;
        margin: 20px;
    }

    .button-group a {
        margin: 0 10px;
        padding: 12px 20px;
        background: #007bff;
        color: #fff;
        font-size: 16px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .button-group a:hover {
        background: #0056b3;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        table {
            width: 100%;
        }

        th, td {
            font-size: 12px;
            padding: 10px;
        }

        .button-group a {
            font-size: 14px;
            padding: 10px 15px;
        }
    }
</style>

<h1>Data Absensi</h1>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['nama']); ?></td>
        <td><?= htmlspecialchars($row['tanggal']); ?></td>
        <td><?= htmlspecialchars($row['status']); ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data?');">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

<div class="button-group">
    <a href="logout.php">Logout</a>
</div>