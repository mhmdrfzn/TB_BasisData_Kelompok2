<?php
include '../db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE user_id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $conn->query("UPDATE users SET username='$username', role='$role' WHERE user_id = $id");
    header("Location: index.php");
}
?>
<h2>Edit User</h2>
<form method="post">
    Username: <input type="text" name="username" value="<?= $row['username'] ?>" required><br><br>
    Role:
    <select name="role">
        <option value="pemilik" <?= $row['role'] == 'pemilik' ? 'selected' : '' ?>>Pemilik</option>
        <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select><br><br>
    <button type="submit">Update</button>
</form>
