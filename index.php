<?php
require 'vendor/autoload.php';
require 'env.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>Магазин</h1>
        <div class="cart-icon" id="cart-count">0</div>
    </header>
    
    <input type="text" id="search" placeholder="Поиск...">
    <select id="sort">
        <option value="price_asc">Цена ↑</option>
        <option value="price_desc">Цена ↓</option>
        <option value="name_asc">Название ↑</option>
        <option value="name_desc">Название ↓</option>
    </select>
    
    <div id="products"></div>
    <script src="js/ajax.js"></script>

</body>
</html>
