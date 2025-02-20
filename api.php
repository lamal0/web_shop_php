<?php
require 'env.php'; // Подключение к БД через PDO

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'date_desc';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Базовый SQL-запрос
$query = "SELECT * FROM products WHERE 1";

// Фильтр по категории
if (!empty($category)) {
    $query .= " AND category = :category";
}

// Поиск по названию и описанию
if (!empty($search)) {
    $query .= " AND (name LIKE :search OR description LIKE :search)";
}

// Сортировка
$sort_options = [
    'price_asc' => 'price ASC',
    'price_desc' => 'price DESC',
    'name_asc' => 'name ASC',
    'name_desc' => 'name DESC',
    'date_asc' => 'created_at ASC',
    'date_desc' => 'created_at DESC'
];

$query .= " ORDER BY " . ($sort_options[$sort] ?? 'created_at DESC');

$stmt = $pdo->prepare($query);

// Привязка параметров
if (!empty($category)) {
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
}
if (!empty($search)) {
    $searchParam = "%$search%";
    $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
}

// Выполняем запрос
$stmt->execute();

// Формируем HTML-вывод
$output = '';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $output .= '
        <div class="product">
            <img src="' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['name']) . '">
            <h3>' . htmlspecialchars($row['name']) . '</h3>
            <p>' . htmlspecialchars($row['description']) . '</p>
            <span class="price">' . number_format($row['price'], 2) . ' грн</span>
            <button class="add-to-cart" data-id="' . $row['id'] . '">В корзину</button>
        </div>
    ';
}

echo $output;
?>
