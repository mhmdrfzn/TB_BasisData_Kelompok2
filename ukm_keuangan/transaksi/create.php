<?php
include '../auth.php';
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
    <style>
        body { background-color: #f8f9fa; margin: 0; }
        .nav-left {
            height: 100vh;
            background: #343a40;
            padding: 20px;
            color: white;
        }
        .nav-left a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .nav-left a:hover {
            background: #495057;
        }
        .header-bar {
            background: white;
            padding: 15px 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .form-container {
            padding: 30px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="nav-left">
        <h4>e-KAS</h4>
        <p><?= $_SESSION['username'] ?> - Online</p>
        <hr>
        <a href="../dashboard_admin.php">DASHBOARD</a>
        <a href="../users/">USERS</a>
        <a href="../transaksi/">TRANSAKSI</a>
        <a href="../tagihan/">TAGIHAN</a>
        <a href="../piutang/">PIUTANG</a>
        <a href="../logout.php">KELUAR</a>
    </div>
    <div class="flex-grow-1">
        <div class="header-bar">
            <h4>Tambah Transaksi</h4>
        </div>
        <div class="form-container">
            <form method="POST">        
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
