-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 31 Eki 2019, 17:47:33
-- Sunucu sürümü: 10.3.18-MariaDB
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yazili20_kompas_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `personnel_name` varchar(255) DEFAULT NULL,
  `tc` varchar(20) DEFAULT NULL,
  `registration_number` int(11) DEFAULT NULL,
  `personnel_phone` varchar(25) DEFAULT NULL,
  `iban` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `sub_branch_id` int(11) DEFAULT NULL,
  `sub_branch` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `insurance_status` tinyint(4) DEFAULT NULL,
  `net_salary` varchar(100) DEFAULT NULL,
  `official_salary` varchar(100) DEFAULT NULL,
  `copy_of_identity_card` varchar(255) DEFAULT NULL,
  `criminal_record` varchar(255) DEFAULT NULL,
  `place_of_residence` varchar(255) DEFAULT NULL,
  `health_report` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `diploma` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `customer_status` tinyint(4) DEFAULT NULL,
  `reason_for_rejection` text DEFAULT NULL,
  `black_list` tinyint(4) DEFAULT NULL,
  `black_list_description` text DEFAULT NULL,
  `isActivePersonnel` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`id`, `institution_id`, `institution_name`, `personnel_name`, `tc`, `registration_number`, `personnel_phone`, `iban`, `date_of_birth`, `branch`, `sub_branch_id`, `sub_branch`, `entry_date`, `insurance_status`, `net_salary`, `official_salary`, `copy_of_identity_card`, `criminal_record`, `place_of_residence`, `health_report`, `contract`, `diploma`, `image`, `gender`, `rank`, `isActive`, `customer_status`, `reason_for_rejection`, `black_list`, `black_list_description`, `isActivePersonnel`) VALUES
(1, 1, 'Bayi 1', 'ENES EROL', '164164646', 2147483647, '55555555', NULL, NULL, NULL, NULL, NULL, '2019-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 0),
(2, 1, 'Bayi 1', 'ZDGD ZDGFX', '45646', 53656, '5365346', NULL, NULL, NULL, NULL, NULL, '2011-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, NULL, NULL, NULL, NULL, 0),
(3, 2, 'Bayi 2', 'DGFDFG FDGF', '5645645', 5654654, '6546456', NULL, NULL, NULL, NULL, NULL, '2019-10-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, NULL, NULL, 0),
(4, 2, 'Bayi 2', 'DFGDFG ZDFG', '1565', 165654, '446546', NULL, NULL, NULL, NULL, NULL, '2019-11-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, NULL, NULL, NULL, NULL, 0),
(5, 3, 'Bayi 3', 'FCGXCF GHGFXH', '5151', 551515, '1556151', NULL, NULL, NULL, NULL, NULL, '2015-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5, NULL, NULL, NULL, NULL, 0),
(6, 3, 'Bayi 3', 'FGX GHG', '154165', 4654654, '46546', NULL, NULL, NULL, NULL, NULL, '2016-05-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 6, NULL, NULL, NULL, NULL, 0),
(7, 3, 'Bayi 3', 'FGHCFG TFHG', '4654564', 56465465, '646654', NULL, NULL, NULL, NULL, NULL, '1997-04-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 7, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `phone_1` varchar(25) DEFAULT NULL,
  `phone_2` varchar(25) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `administrator_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `institutions`
--

INSERT INTO `institutions` (`id`, `title`, `url`, `phone_1`, `phone_2`, `email`, `administrator_name`, `address`, `description`, `isActive`, `rank`, `createdAt`) VALUES
(1, 'Bayi 1', 'bayi-1', '5555555555', '', 'bayi1@bayi.com', 'bayi 1', '', '', 1, 0, '2019-10-27 18:48:32'),
(2, 'Bayi 2', 'bayi-2', '5555555555', '', 'bayi2@bayi.com', 'bayi 2', '', '', 1, 0, '2019-10-27 18:48:54'),
(3, 'Bayi 3', 'bayi-3', '5555555555', '', 'bayi3@bayi.com', 'bayi 3', '', '', 1, 0, '2019-10-27 18:49:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institution_report`
--

CREATE TABLE `institution_report` (
  `id` int(11) NOT NULL,
  `institution_user_id` int(11) DEFAULT NULL,
  `institution_user_name` varchar(255) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institution_users`
--

CREATE TABLE `institution_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_role_id` int(11) NOT NULL DEFAULT 2,
  `institution_id` int(11) NOT NULL,
  `institution_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `institution_users`
--

INSERT INTO `institution_users` (`id`, `user_name`, `full_name`, `email`, `password`, `permissions`, `user_role_id`, `institution_id`, `institution_name`, `isActive`, `createdAt`) VALUES
(1, 'bayi1', 'Bayi 1', 'bayi1@bayi.com', 'd5881ca81312d6003cf3e83d6672d14a', '{\"1\":{\"read\":\"on\"}}', 4, 0, '', 1, '2019-10-27 18:51:56'),
(2, 'bayi2', 'Bayi 2', 'bayi2@bayi.com', '0e03b10c4a63e2b825120dbfe4592195', '{\"2\":{\"read\":\"on\"}}', 4, 0, '', 1, '2019-10-27 18:52:23'),
(3, 'bayi3', 'Bayi 3', 'bayi3@bayi.com', 'dec9d65b4fa36fd7fc43f86bd04ccad4', '{\"3\":{\"read\":\"on\"}}', 4, 0, '', 1, '2019-10-27 18:52:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institution_user_roles`
--

CREATE TABLE `institution_user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `institution_user_roles`
--

INSERT INTO `institution_user_roles` (`id`, `title`, `permissions`, `institution_id`, `isActive`, `createdAt`) VALUES
(4, 'Admin', '{\"customers\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', NULL, 1, '2019-10-31 16:35:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_report`
--

CREATE TABLE `system_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_role_id` int(11) NOT NULL DEFAULT 2,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `system_users`
--

INSERT INTO `system_users` (`id`, `user_name`, `full_name`, `email`, `password`, `permissions`, `user_role_id`, `isActive`, `createdAt`) VALUES
(3, 'enesserol7', 'Enes Erol', 'enesserol7@gmail.com', '232e8540842a61631dbf74fca879e286', '{\"brands\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"courses\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"emailsettings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"galleries\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"news\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"popups\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"product\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"references\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"services\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"settings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"slides\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"testimonials\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"', 1, 1, '2018-06-07 16:57:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_user_roles`
--

CREATE TABLE `system_user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `system_user_roles`
--

INSERT INTO `system_user_roles` (`id`, `title`, `permissions`, `isActive`, `createdAt`) VALUES
(1, 'Admin', '{\"advance_payment\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"customers\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institutions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_payments\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2018-09-21 23:57:09'),
(2, 'Kullanıcı', '{\"branch\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"institution_users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_exit\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"personnel_permissions\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2018-09-21 23:57:19');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institution_report`
--
ALTER TABLE `institution_report`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institution_users`
--
ALTER TABLE `institution_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `institution_user_roles`
--
ALTER TABLE `institution_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_report`
--
ALTER TABLE `system_report`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_user_roles`
--
ALTER TABLE `system_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `institution_report`
--
ALTER TABLE `institution_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `institution_users`
--
ALTER TABLE `institution_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `institution_user_roles`
--
ALTER TABLE `institution_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `system_report`
--
ALTER TABLE `system_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `system_user_roles`
--
ALTER TABLE `system_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
