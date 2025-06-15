<?php
include '../db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM piutang WHERE piutang_id = $id");
header("Location: index.php");
?>