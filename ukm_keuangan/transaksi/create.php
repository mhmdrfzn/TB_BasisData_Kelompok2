<?php
include '../db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $jenis = $_POST['jenis'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $conn->query("INSERT INTO transaksi (user_id, jenis, tanggal, deskripsi, jumlah) VALUES ('$user_id', '$jenis', '$tanggal', '$deskripsi', '$jumlah')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Tambah Transaksi</div>
        <div class="card-body">
            <form method="post">
                
        <div class="form-group">
            <label>User ID</label>
            <input type="number" name="user_id" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Jenis</label>
            <input type="text" name="jenis" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required value="">
        </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
