<?php
session_start();
include 'db.php';

// Hanya admin yang bisa mendaftarkan user baru
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    header("Location: users/index.php");
}
?>
<h2>Registrasi User Baru</h2>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Role:
    <select name="role" required>
        <option value="pemilik">Pemilik</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type="submit">Daftar</button>
</form>
