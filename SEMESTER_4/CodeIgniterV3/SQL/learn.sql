-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2023 pada 14.03
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_code` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `product_price`) VALUES
(2, 'Router', '300000'),
(6, 'laptop', '1000111111'),
(7, 'PC', '234974724'),
(8, 'Playstation 5', '9709234'),
(9, 'Smartphone', '20987490'),
(10, 'Keyboard', '9248'),
(11, 'Kaos', '14832904'),
(12, 'ichitan', '76699'),
(13, 'vscode', '100000'),
(14, 'tomat', '10000000'),
(15, 'Mouse', '40000'),
(16, 'Solid State D', '10000'),
(18, 'Joystick', '70000'),
(27, 'taroqqiuigyyg', '3423513'),
(28, 'App', '20000'),
(29, 'Kopi', '1000'),
(30, 'Laptop', '2000'),
(31, 'Motherboard', '3000'),
(32, 'Cooler', '4000'),
(33, 'Case', '5000'),
(34, 'Speaker', '6000'),
(35, 'Headphone', '7000'),
(36, 'Microphone', '8000'),
(37, 'Gaming Chair', '9000'),
(38, 'Desk', '10000'),
(39, 'Shelf', '11000'),
(40, 'Lighting', '12000'),
(41, 'Decoration', '13000'),
(42, 'Mousepad', '14000'),
(43, 'Speaker Stand', '15000'),
(44, 'Webcam', '16000'),
(45, 'Microphone Stand', '17000'),
(46, 'Laptop Stand', '18000'),
(47, 'Monitor Stand', '19000'),
(48, 'Cable Organizer', '20000'),
(49, 'USB Hub', '21000'),
(50, 'Docking Station', '22000'),
(51, 'Battery Charger', '23000'),
(52, 'Wireless Charger', '24000'),
(53, 'Power Bank', '25000'),
(54, 'Adapter', '26000'),
(55, 'Converter', '27000'),
(56, 'Connector', '28000'),
(57, 'Antivirus', '29000'),
(58, 'Firewall', '30000'),
(59, 'VPN', '31000'),
(60, 'Software', '32000'),
(61, 'Game', '33000'),
(62, 'Smartphone', '34000'),
(63, 'Tablet', '35000'),
(64, 'Smartwatch', '36000'),
(65, 'Fitness Tracker', '37000'),
(66, 'Bluetooth Earphones', '38000'),
(67, 'Wi-Fi Router', '39000'),
(68, 'Ethernet Cable', '40000'),
(69, 'HDMI Cable', '41000'),
(70, 'USB Cable', '42000'),
(71, 'Thunderbolt Cable', '43000'),
(72, 'DisplayPort Cable', '44000'),
(73, 'VGA Cable', '45000'),
(74, 'DVI Cable', '46000'),
(75, 'Printer', '47000'),
(76, 'Scanner', '48000'),
(77, 'External Hard Drive', '49000'),
(78, 'Internal Hard Drive', '50000'),
(79, 'Solid State Drive', '51000'),
(80, 'SD Card', '52000'),
(81, 'Micro SD Card', '53000'),
(82, 'USB Flash Drive', '54000'),
(83, 'External DVD Drive', '55000'),
(84, 'Internal DVD Drive', '56000'),
(85, 'Bluetooth Speaker', '57000'),
(86, 'Gaming Mouse', '58000'),
(87, 'Gaming Keyboard', '59000'),
(88, 'Gaming Headset', '60000'),
(89, 'Gaming Monitor', '61000'),
(90, 'Gaming Console', '62000'),
(91, 'VR Headset', '63000'),
(92, 'Digital Camera', '64000'),
(93, 'Action Camera', '65000'),
(94, 'Drone', '66000'),
(95, 'Air Purifier', '69000'),
(96, 'Electric Fan', '70000'),
(97, 'Air Conditioner', '71000'),
(98, 'Refrigerator', '72000'),
(99, 'Washing Machine', '73000'),
(100, 'Dryer', '74000'),
(101, 'Dishwasher', '75000'),
(102, 'Oven', '76000'),
(103, 'Microwave', '77000'),
(104, 'Coffee Maker', '78000'),
(105, 'Toaster', '79000'),
(106, 'Blender', '80000'),
(107, 'Juicer', '81000'),
(108, 'Food Processor', '82000'),
(109, 'Rice Cooker', '83000'),
(110, 'Slow Cooker', '84000'),
(111, 'Pressure Cooker', '85000'),
(112, 'Kitchen Scale', '86000'),
(113, 'Knife Set', '87000'),
(114, 'Cookware Set', '88000'),
(115, 'Dining Set', '89000'),
(116, 'Curtain', '90000'),
(117, 'Bed Sheet', '91000'),
(118, 'Pillow', '92000'),
(119, 'Blanket', '93000'),
(120, 'Towel', '94000'),
(121, 'Bath Mat', '95000'),
(122, 'Shower Curtain', '96000'),
(123, 'Soap Dispenser', '97000'),
(124, 'Toothbrush Holder', '98000'),
(125, 'Tissue Box', '99000'),
(126, 'Smart Home Device', '67000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
