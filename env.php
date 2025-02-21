<?php
$pdo = new PDO("mysql:host=localhost;dbname=web_shop;charset=utf8", "root", "");//Строка создания подключения к бд. Для запуска моего проэкта у себя поменяйте параметры
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

