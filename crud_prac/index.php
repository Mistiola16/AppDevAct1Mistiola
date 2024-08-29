<?php
$pdo = new PDO('mysql:host=localhost;dbname=simple_crud', 'root', '');
$sql = 'SELECT * FROM product';
$statement = $pdo->query($sql);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product List</h1>
        <a href="create.php" class="btn btn-primary mb-3">Add New Product</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Barcode</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['Name']) ?></td>
                    <td><?= htmlspecialchars($product['Description']) ?></td>
                    <td><?= htmlspecialchars($product['Price']) ?></td>
                    <td><?= htmlspecialchars($product['Quantity']) ?></td>
                    <td><?= htmlspecialchars($product['Barcode']) ?></td>
                    <td><?= htmlspecialchars($product['Created_at']) ?></td>
                    <td><?= htmlspecialchars($product['Updated_at']) ?></td>
                    <td>
                        <a href="read.php?id=<?= $product['Id'] ?>" class="btn btn-info btn-sm">View</a>
                        <a href="update.php?id=<?= $product['Id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $product['Id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
