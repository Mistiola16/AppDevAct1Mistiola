<?php
$pdo = new PDO('mysql:host=localhost;dbname=simple_crud', 'root', '');

$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$product = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
</head>
<body>
    <h1>View Product</h1>
    <p>Name: <?= htmlspecialchars($product['Name']) ?></p>
    <p>Description: <?= htmlspecialchars($product['Description']) ?></p>
    <p>Price: <?= htmlspecialchars($product['Price']) ?></p>
    <p>Quantity: <?= htmlspecialchars($product['Quantity']) ?></p>
    <p>Barcode: <?= htmlspecialchars($product['Barcode']) ?></p>
    <p>Created At: <?= htmlspecialchars($product['Created_at']) ?></p>
    <p>Updated At: <?= htmlspecialchars($product['Updated_at']) ?></p>
    <a href="index.php">Back to list</a>
</body>
</html>
