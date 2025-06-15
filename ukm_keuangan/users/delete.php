<?php
include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE user_id = $id");
header("Location: index.php");
?>