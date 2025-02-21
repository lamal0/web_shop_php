-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 02:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `price`, `description`, `category`, `name`, `img`) VALUES
(1, 199.99, 'Мощный игровой ноутбук с видеокартой RTX 3060', 'electronics', 'Игровой ноутбук MSI', 'https://storage-asset.msi.com/global/picture/news/2024/nb/nb-20240103-1.jpg'),
(2, 49.99, 'Беспроводные наушники с шумоподавлением', 'electronics', 'Наушники Sony', 'https://musicmag.com.ua/media/catalog/product/cache/1/image/736x460/22a9d8b2f8ff66ee1bdc58028baf4f69/6/2/62_4000.jpg'),
(3, 9.99, 'Классическая белая футболка из хлопка', 'clothing', 'Футболка белая', 'https://img.freepik.com/premium-vector/3d-t-shirt-white-mockup_596877-188.jpg'),
(4, 69.99, 'Умные часы с датчиком сердечного ритма', 'electronics', 'Смарт-часы Apple', 'https://mobilike.net.ua/image/cache/catalog/easyphoto/5199/smart-chasy-apple-watch-series-10-gps-42mm-silver-aluminium-case-with-denim-sport-band-s-m-mwwa3qh-a-3-600x315.jpg'),
(5, 25.99, 'Спортивные кроссовки для бега', 'clothing', 'Кроссовки Adidas', 'https://ua-opt.com/images/catalogs/adidas/krossovki/krossovki-adidas-optom-5.jpg'),
(6, 399.99, 'Смартфон с AMOLED экраном и 128 ГБ памяти', 'electronics', 'Смартфон Samsung', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJnwiVqeQdj5bvntmMG7tbEY5D6m2nZzoIxg&s'),
(7, 14.99, 'Стильная кожаная сумка для ноутбука', 'accessories', 'Сумка для ноутбука', 'https://babak.in.ua/imgs/b1298.jpg'),
(8, 5.99, 'Настольная лампа с регулируемой яркостью', 'home', 'Лампа настольная', 'https://assets.leoceramika.com/product/705x450/9228.jpg'),
(9, 59.99, 'Кофемашина с капсульной системой', 'home', 'Кофемашина Philips', 'https://www.express-service.com.ua/upload/iblock/8f0/4tz14wuhvyont2w0x1d5yhq00b1ictcd/65ce0bdc620a7_1692338997_357605944.jpg'),
(10, 1200, 'Профессиональный фотоаппарат с объективом 50мм', 'electronics', 'Фотоаппарат Canon', 'https://a-techno.com.ua/assets/images/items/242590/0878638001632308287.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
