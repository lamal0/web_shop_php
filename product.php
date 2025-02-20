<?php
require 'env.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    die("Товар не найден!");
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Товар не найден!");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="css/style_product.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <a href="index.php"><h1>Магазин</h1></a>
        <a href="cart.php">
            <div class="cart-icon" id="cart-count">0</div>
        </a>
    </header>

    <div class="product-page">
        <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <span class="price"><?php echo number_format($product['price'], 2); ?> грн</span>
        <button class="add-to-cart" 
            data-id="<?php echo $product['id']; ?>" 
            data-name="<?php echo htmlspecialchars($product['name']); ?>" 
            data-price="<?php echo $product['price']; ?>" 
            data-img="<?php echo htmlspecialchars($product['img']); ?>">
            В корзину
        </button>
    </div>

    <script src="js/cart.js"></script>
</body>
</html>
