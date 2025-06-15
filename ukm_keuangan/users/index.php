<?php
include '../auth.php';
include '../db.php';
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Users</title>
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
        .table-container {
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle !important;
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
        <div class="header-bar d-flex justify-content-between">
            <h4>Manajemen Users</h4>
            <a href="create.php" class="btn btn-primary">+ Tambah User</a>
        </div>
        <div class="table-container">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-dark">
                    <tr><th>ID</th><th>Username</th><th>Role</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['user_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $row['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
