<?php
include '../db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM piutang WHERE piutang_id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $nama_supplier = $_POST['nama_supplier'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];
    $conn->query("UPDATE piutang SET user_id='$user_id', nama_supplier='$nama_supplier', deskripsi='$deskripsi', jumlah='$jumlah', status='$status', tanggal_jatuh_tempo='$tanggal_jatuh_tempo' WHERE piutang_id = $id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Piutang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Edit Piutang</div>
        <div class="card-body">
            <form method="post">
                
        <div class="form-group">
            <label>User ID</label>
            <input type="number" name="user_id" class="form-control" required value="<?= $row['user_id'] ?>">
        </div>
        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control" required value="<?= $row['nama_supplier'] ?>">
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
