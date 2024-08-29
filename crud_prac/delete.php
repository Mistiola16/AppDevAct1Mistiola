<?php
$pdo = new PDO('mysql:host=localhost;dbname=simple_crud', 'root', '');

$id = $_GET['id'];
$sql = 'DELETE FROM product WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->execute([$id]);

header('Location: index.php');
?>
