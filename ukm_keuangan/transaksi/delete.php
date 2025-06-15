<?php
include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM transaksi WHERE transaksi_id = $id");
header("Location: index.php");
?>