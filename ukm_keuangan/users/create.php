<?php
include '../auth.php';
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
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
            <h4>Tambah User</h4>
        </div>
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Role:</label>
                    <select name="role" class="form-control">
                        <option value="Pemilik">Pemilik</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
