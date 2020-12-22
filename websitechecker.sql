-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 05 Eyl 2019, 12:41:52
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `websitechecker`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `websites_ids` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `subscription` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `expirationdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `name`, `surname`, `email`, `password`, `websites_ids`, `subscription`, `expirationdate`) VALUES
(5, 'west', 'west', 'westQ', 'westQ', '', '', '2020-09-04 12:43:13'),
(6, 'Yeni', 'Yeni', 'Yeni', 'Yeni', NULL, 'Premium', '2020-09-05 12:36:28'),
(4, 'test', 'test', 'Wegfs', 'testss', '4,5,6,7', 'Premium', '2020-09-04 12:43:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_websites`
--

DROP TABLE IF EXISTS `tbl_websites`;
CREATE TABLE IF NOT EXISTS `tbl_websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email_id` int(11) NOT NULL,
  `added_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `today_changed_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `today_success` int(11) DEFAULT '0',
  `today_error` int(11) DEFAULT '0',
  `weekly_changed_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `weekly_success` int(11) DEFAULT '0',
  `weekly_error` int(11) DEFAULT '0',
  `monthly_changed_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `monthly_success` int(11) DEFAULT '0',
  `monthly_error` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_websites`
--

INSERT INTO `tbl_websites` (`id`, `url`, `email_id`, `added_date`, `today_changed_date`, `today_success`, `today_error`, `weekly_changed_date`, `weekly_success`, `weekly_error`, `monthly_changed_date`, `monthly_success`, `monthly_error`) VALUES
(4, 'test4ok', 4, '2019-09-04 17:53:15', '2019-09-04 17:53:15', 0, 0, '2019-09-04 17:53:15', 0, 0, '2019-09-04 17:53:15', 0, 0),
(5, 'testingmatris', 4, '2019-09-04 20:31:35', '2019-09-04 20:31:35', 0, 0, '2019-09-04 20:31:35', 0, 0, '2019-09-04 20:31:35', 0, 0),
(6, 'fftest', 4, '2019-09-04 20:32:57', '2019-09-04 20:32:57', 0, 0, '2019-09-04 20:32:57', 0, 0, '2019-09-04 20:32:57', 0, 0),
(7, 'test42', 4, '2019-09-04 20:33:25', '2019-09-04 20:33:25', 0, 0, '2019-09-04 20:33:25', 0, 0, '2019-09-04 20:33:25', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
