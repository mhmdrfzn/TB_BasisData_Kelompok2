
<?php
include '../db.php';
session_start();

$tagihan_id = $_GET['id'];
$user_id = $_SESSION['user_id']; // pastikan user login
$tanggal = date('Y-m-d');

$q = $conn->query("SELECT * FROM tagihan WHERE tagihan_id = $tagihan_id AND status = 'belum'");
if ($q->num_rows === 1) {
    $t = $q->fetch_assoc();
    $jumlah = $t['jumlah'];
    $deskripsi = "Pelunasan tagihan dari " . $t['nama_pelanggan'];

    $conn->query("UPDATE tagihan SET status = 'lunas' WHERE tagihan_id = $tagihan_id");

    $stmt = $conn->prepare("INSERT INTO transaksi (user_id, jenis, tanggal, deskripsi, jumlah) VALUES (?, 'pemasukan', ?, ?, ?)");
    $stmt->bind_param("issd", $user_id, $tanggal, $deskripsi, $jumlah);
    $stmt->execute();

    echo "<script>alert('Tagihan berhasil dilunasi.'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Tagihan tidak ditemukan atau sudah lunas.'); window.location='index.php';</script>";
}
?>
