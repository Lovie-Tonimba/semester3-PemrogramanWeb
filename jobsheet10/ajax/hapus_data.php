<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id = $_POST['id'];

$query = "DELETE FROM anggota WHERE id = ?";
$sql = $db1->prepare(query: $query);
$sql->execute(params: [$id]);

echo json_decode(value: ['success' => 'Sukses']);

$db1 = null;
?>