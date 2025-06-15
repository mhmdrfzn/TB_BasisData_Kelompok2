<?php
include '../db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM tagihan WHERE tagihan_id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];
    $conn->query("UPDATE tagihan SET user_id='$user_id', nama_pelanggan='$nama_pelanggan', deskripsi='$deskripsi', jumlah='$jumlah', status='$status', tanggal_jatuh_tempo='$tanggal_jatuh_tempo' WHERE tagihan_id = $id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tagihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Edit Tagihan</div>
        <div class="card-body">
            <form method="post">
                
        <div class="form-group">
            <label>User ID</label>
            <input type="number" name="user_id" class="form-control" required value="<?= $row['user_id'] ?>">
        </div>
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" required value="<?= $row['nama_pelanggan'] ?>">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required value="<?= $row['deskripsi'] ?>">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required value="<?= $row['jumlah'] ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" required value="<?= $row['status'] ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="date" name="tanggal_jatuh_tempo" class="form-control" required value="<?= $row['tanggal_jatuh_tempo'] ?>">
        </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
