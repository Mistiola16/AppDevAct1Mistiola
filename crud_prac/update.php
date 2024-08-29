<?php
$pdo = new PDO('mysql:host=localhost;dbname=simple_crud', 'root', '');

$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$product = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE product SET name = ?, description = ?, price = ?, quantity = ?, barcode = ? WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['barcode'], $id]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post">
        <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($product['Name']) ?>" required></label><br>
        <label>Description: <textarea name="description"><?= htmlspecialchars($product['Description']) ?></textarea></label><br>
        <label>Price: <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['Price']) ?>" required></label><br>
        <label>Quantity: <input type="number" name="quantity" value="<?= htmlspecialchars($product['Quantity']) ?>" required></label><br>
        <label>Barcode: <input type="text" name="barcode" value="<?= htmlspecialchars($product['Barcode']) ?>" required></label><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
