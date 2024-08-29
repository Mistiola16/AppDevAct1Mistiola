<?php
$pdo = new PDO('mysql:host=localhost;dbname=simple_crud', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the barcode already exists
    $sql = "SELECT COUNT(*) FROM product WHERE barcode = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$_POST['barcode']]);
    $barcodeExists = $statement->fetchColumn();

    if ($barcodeExists > 0) {
        $error = "Error: The barcode already exists. Please use a unique barcode.";
    } else {
        // Insert the new product
        $sql = "INSERT INTO product (name, description, price, quantity, barcode) VALUES (?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute([$_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['barcode']]);
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Description: <textarea name="description"></textarea></label><br>
        <label>Price: <input type="number" step="0.01" name="price" required></label><br>
        <label>Quantity: <input type="number" name="quantity" required></label><br>
        <label>Barcode: <input type="text" name="barcode" required></label><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
