<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $nama_supplier = $_POST['nama_supplier'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];
    
    //insert ke tabel piutang
    $insert_piutang = $conn->query("INSERT INTO piutang (user_id, nama_supplier, deskripsi, jumlah, status, tanggal_jatuh_tempo) VALUES ('$user_id', '$nama_supplier', '$deskripsi', '$jumlah', '$status', '$tanggal_jatuh_tempo')");

    if ($insert_piutang) {
        $piutang_id = $conn->insert_id;

        // Jika status = lunas, juga simpan ke tabel transaksi
        if ($status === 'lunas') {
            $tanggal = date('Y-m-d');
            $jenis = 'pengeluaran';
            $deskripsi_transaksi = $deskripsi; // Atau bisa kamu ubah sesuai kebutuhan
            $tanggal = date('Y-m-d');

            $stmt = $conn->prepare("INSERT INTO transaksi (user_id, jenis, tanggal, deskripsi, jumlah) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isssd", $user_id, $jenis, $tanggal, $deskripsi_transaksi, $jumlah);
            $stmt->execute();

        }

        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan Piutang.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Piutang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Tambah Piutang</div>
        <div class="card-body">
            <form method="post">
                
        <div class="form-group">
            <label>User ID</label>
            <input type="number" name="user_id" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required value="">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="lunas">lunas</option>
                <option value="belum">belum</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Jatuh Tempo</label>
            <input type="date" name="tanggal_jatuh_tempo" class="form-control" required value="">
        </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
