<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>UKM Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .menu {
            margin-top: 30px;
            display: inline-block;
            text-align: left;
        }
        .menu a {
            display: block;
            background: #007bff;
            color: white;
            padding: 12px 20px;
            margin: 10px 0;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .menu a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang, <?= $_SESSION['username'] ?>!</h1>
    <div class="menu">
        <a href="dashboard.php">📊 Dashboard Keuangan</a>
        <a href="users/">👤 Manajemen Users</a>
        <a href="transaksi/">💰 Manajemen Transaksi</a>
        <a href="tagihan/">🧾 Manajemen Tagihan</a>
        <a href="piutang/">📥 Manajemen Piutang</a>
        <a href="logout.php">🚪 Logout</a>
    </div>
</body>
</html>
