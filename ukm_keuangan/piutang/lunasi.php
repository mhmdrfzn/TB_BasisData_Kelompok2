
<?php
include '../db.php';
session_start();

$tagihan_id = (int)$_GET['id'];
$user_id = $_SESSION['user_id']; // pastikan user login
$tanggal = date('Y-m-d');

$q = $conn->query("SELECT * FROM piutang WHERE piutang_id = $tagihan_id AND status = 'belum'");
if ($q->num_rows === 1) {
    $t = $q->fetch_assoc();
    $jumlah = $t['jumlah'];
    $deskripsi = "Pelunasan tagihan dari " . $t['nama_supplier'];

    $conn->query("UPDATE piutang SET status = 'lunas' WHERE piutang_id = $tagihan_id");

    $stmt = $conn->prepare("INSERT INTO transaksi (user_id, jenis, tanggal, deskripsi, jumlah) VALUES (?, 'pengeluaran', ?, ?, ?)");
    $stmt->bind_param("issd", $user_id, $tanggal, $deskripsi, $jumlah);
    $stmt->execute();

    echo "<script>alert('Piutang berhasil dilunasi.'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Piutang tidak ditemukan atau sudah lunas.'); window.location='index.php';</script>";
}
?>
