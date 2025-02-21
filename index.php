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

<div id="cookie-popup" class="cookie-popup">
    <p>Этот сайт использует cookies для работы с корзиной товарор. <a href="https://github.com/lamal0/web_shop_php">Подробнее</a></p>
    <button id="accept-cookies">ОК</button>
</div>

<body>
    <header>
        <h1>Магазин</h1>
        <a href="cart.php">
            <div class="cart-icon" id="cart-count">0</div>
        </a>
    </header>
    
    <input type="text" id="search" placeholder="Поиск...">
    <select id="sort">
        <option value="price_asc">Цена ↑</option>
        <option value="price_desc">Цена ↓</option>
        <option value="name_asc">Название ↑</option>
        <option value="name_desc">Название ↓</option>
    </select>

    <select id="category">
        <option value="">Все</option>
        <option value="electronics">Электроника</option>
        <option value="clothing">Одежда</option>
        <option value="accessories">Акссесуары</option>
        <option value="home">Дом</option>
    </select>
    
    <div id="products"></div>

    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>

    <div class="delete_cookies">
        <button id="delete-cookie">Удалить cookies</button>
    </div>

    <script src="js/ajax.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/cookie.js"></script>

</body>
</html>
