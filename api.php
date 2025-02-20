<?php
require 'env.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'date_desc';
$category = isset($_GET['category']) ? $_GET['category'] : '';

$query = "SELECT * FROM products WHERE 1";

// Фильтр по категории
if (!empty($category)) {
    $query .= " AND category = :category";
}

if (!empty($search)) {
    $query .= " AND (name LIKE :search OR description LIKE :search)";
}

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

if (!empty($category)) {
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
}
if (!empty($search)) {
    $searchParam = "%$search%";
    $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
}

$stmt->execute();

$output = '';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $output .= '
        
        <div class="product">
            <a href="product.php?id=' . $row['id'] . '">
                <img src="' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['name']) . '">
                <h3>' . htmlspecialchars($row['name']) . '</h3>
                <p>' . htmlspecialchars($row['description']) . '</p>
                <span class="price">' . number_format($row['price'], 2) . ' грн</span>
            </a>
            <button class="add-to-cart" 
                data-id="' . $row['id'] . '" 
                data-name="' . htmlspecialchars($row['name']) . '" 
                data-price="' . $row['price'] . '" 
                data-img="' . htmlspecialchars($row['img']) . '">
                В корзину
            </button>

        </div>
        
        
    ';
}
echo $output;
?>
