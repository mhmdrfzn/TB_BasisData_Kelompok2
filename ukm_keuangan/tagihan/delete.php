<?php
include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM tagihan WHERE tagihan_id = $id");
header("Location: index.php");
?>