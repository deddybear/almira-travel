-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2025 at 03:54 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almira_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel_images`
--

CREATE TABLE `carousel_images` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_photos_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_banner` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_banner` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousel_images`
--

INSERT INTO `carousel_images` (`id`, `collection_photos_id`, `jenis`, `judul_banner`, `desc_banner`, `created_at`, `updated_at`) VALUES
('2b8566f5-0c0a-43e0-9667-d47da8a105f1', '9a756fb3-d55b-4570-9670-0b826aa2c151', 'tour', 'Discovery Your Next Journey With Almira Travel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.', '2025-01-16 15:30:27', '2025-01-16 15:30:27'),
('319f149f-4e3b-4032-b6d9-adae0d85e185', '2c41f959-814c-4ae5-930b-8d3ddfe512b2', 'gallery', 'Discovery Your Next Journey With Almira Travel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.', '2025-01-16 15:31:43', '2025-01-16 15:31:43'),
('6ddb0e75-441a-47fd-a2ea-301303b6c90d', '971ff579-bed6-45db-b0f4-02e55c801081', 'home', 'Discovery Your Next Journey With Almira Travel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.', '2025-01-16 15:09:12', '2025-01-16 15:09:12'),
('a70dae00-b450-4d2c-b05e-bdf2a28e5088', 'dd47ee47-61b4-4af8-ae6c-5751005a6a8b', 'contact', 'Discovery Your Next Journey With Almira Travel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.', '2025-01-16 15:32:05', '2025-01-16 15:32:05'),
('e2f87361-d858-4aa0-9b68-3b786e1f2f33', '910e8911-fdf0-4bf7-85ac-1918055b35a6', 'sewa', 'Discovery Your Next Journey With Almira Travel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis  bibendum diam, ac commodo arcu. Nullam rutrum fermentum lorem bibendum placerat.', '2025-01-16 15:30:55', '2025-01-16 15:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `collection_photos`
--

CREATE TABLE `collection_photos` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collection_photos`
--

INSERT INTO `collection_photos` (`id`, `path`, `created_at`, `updated_at`) VALUES
('8043248f-9b59-47be-89f8-ac7820e0514c', '67QUtp8F5H0qOptoI7tPHOGw7tAROBm7zviu0cLc.png', '2022-09-20 05:18:47', '2022-09-20 05:18:47'),
('8043248f-9b59-47be-89f8-ac7820e0514c', 'WS9EQo7PaJsGFfHP9oPHKkO2NJw6F1CM6YCizqV9.png', '2022-09-20 05:18:47', '2022-09-20 05:18:47'),
('8043248f-9b59-47be-89f8-ac7820e0514c', 'xnSOhRAsOjahsbpT0mTUAFHibXkYuKnYsKTTnPFh.jpg', '2022-09-20 05:18:47', '2022-09-20 05:18:47'),
('51b939f4-a4d8-4110-b58b-28cf8021482d', 'DMFoBPxq4nXDt1BUyb68RnE0w2lxKXSDxX2ZUTQh.png', '2022-09-26 13:21:02', '2022-09-26 13:21:02'),
('51b939f4-a4d8-4110-b58b-28cf8021482d', 'tX9GDnnfT6l755sIAnAIZ7ZWY114A0ncpgmglCyO.png', '2022-09-26 13:21:02', '2022-09-26 13:21:02'),
('51b939f4-a4d8-4110-b58b-28cf8021482d', '8osekSB3Mf5HHjMd5qAXeHgpEuMUVX0EgklEraud.jpg', '2022-09-26 13:21:02', '2022-09-26 13:21:02'),
('fc52feeb-4020-4326-bcce-75bb15c9920a', 'GMVFb8XFhviqZObcqDQAHlIn4w82bw93eBkhtr2W.jpg', '2022-09-26 13:44:35', '2022-09-26 13:44:35'),
('fc52feeb-4020-4326-bcce-75bb15c9920a', 'wkFTN4jEvy6SOYsfXGkmHwCAlJM80Um1eOPi9VL0.jpg', '2022-09-26 13:44:35', '2022-09-26 13:44:35'),
('fc52feeb-4020-4326-bcce-75bb15c9920a', 'ogmofk9gis4J75WLaNAB9qoFtGj0OzYc86e3xFW0.jpg', '2022-09-26 13:44:35', '2022-09-26 13:44:35'),
('5300cca6-c077-4edc-8b11-f08c78fe75c6', 's7ERUjMeiKoGvsdcnx0ZZfyT1Mpmf1xWQocBTM6k.jpg', '2022-09-26 14:33:31', '2022-09-26 14:33:31'),
('5300cca6-c077-4edc-8b11-f08c78fe75c6', 'JEaabAxvOQPVgFwwd6b3q6dc5VcxcoYQOTfbNusW.jpg', '2022-09-26 14:33:31', '2022-09-26 14:33:31'),
('5300cca6-c077-4edc-8b11-f08c78fe75c6', 'n3J3iD0dwuq8bTQZIfgm1oHJXD8zCvv2P1AfXh8t.jpg', '2022-09-26 14:33:31', '2022-09-26 14:33:31'),
('93516151-cc03-4073-96db-20bcfb0ce7dc', 'zuNJJTFPTzGJQdUOMU1WcZ7LigG4Dsc3X1JOdHB9.jpg', '2022-09-26 14:39:58', '2022-09-26 14:39:58'),
('93516151-cc03-4073-96db-20bcfb0ce7dc', 'SMV9AHxGL6BJo30gnGRmgYUuezCe3Tbv6CKTKdkx.jpg', '2022-09-26 14:39:58', '2022-09-26 14:39:58'),
('93516151-cc03-4073-96db-20bcfb0ce7dc', 'F2DtZL3Q6dzhuYWk69BE9IOOgGEZwPwTWvMTpbnN.jpg', '2022-09-26 14:39:58', '2022-09-26 14:39:58'),
('fa513cb3-3efc-4ee1-b02a-39d207628e62', '0H9CDJQWJxHwkOaSmAowRCbP1DD9naVUlLJumnnR.jpg', '2022-09-26 14:43:57', '2022-09-26 14:43:57'),
('fa513cb3-3efc-4ee1-b02a-39d207628e62', 'RScr6mYRQ18a2og3avoXtFrdSY2wZQxjU8skuaBp.jpg', '2022-09-26 14:43:57', '2022-09-26 14:43:57'),
('fa513cb3-3efc-4ee1-b02a-39d207628e62', '5ZJUPuFWRRQmJCHnieP4zE7bTcmd5PEjK8g3d2Z1.jpg', '2022-09-26 14:43:57', '2022-09-26 14:43:57'),
('fb0eaf80-3916-410e-95e2-64ce5ac45fde', 'dvpxeUk71NM1Z0gJtvNsLzyHGAdI74hSL100XC8A.jpg', '2022-10-03 14:05:30', '2022-10-03 14:05:30'),
('fb0eaf80-3916-410e-95e2-64ce5ac45fde', 'b7YORMy6hrTVEI3cp0CKpX02QtoQEblU8o7DyEZp.jpg', '2022-10-03 14:05:30', '2022-10-03 14:05:30'),
('fb0eaf80-3916-410e-95e2-64ce5ac45fde', 'YxIMon2XSDwiaCYf2qIHgTwk1amM3K3qurBzzE5a.jpg', '2022-10-03 14:05:30', '2022-10-03 14:05:30'),
('a16e5ed2-03d4-4b51-8ee1-856d80ba5436', 'MEGQ3RPCqjoP9sPA43Uc85x51R8TEMPlOW7vI1E2.jpg', '2022-10-05 14:09:03', '2022-10-05 14:09:03'),
('a16e5ed2-03d4-4b51-8ee1-856d80ba5436', 'R9tvzZtl0tbgH7M7I4Ms07bSodE7twF6nCsvCsWu.jpg', '2022-10-05 14:09:03', '2022-10-05 14:09:03'),
('a16e5ed2-03d4-4b51-8ee1-856d80ba5436', 'Crr8ADwfae2VKrnZGC5JcAaUHtZWbjiZQ5nNeJPP.jpg', '2022-10-05 14:09:03', '2022-10-05 14:09:03'),
('24d5beff-9373-4633-b24e-49ad67fbf8aa', 'dqVNG4u5txhxGhB628Eu883ZlTUxlCcky0KyeIST.png', '2022-10-05 14:22:15', '2022-10-05 14:22:15'),
('24d5beff-9373-4633-b24e-49ad67fbf8aa', '0sRZPtBoMeXFkUz9XG3k9iTEBHOTMwxXxOWQNVha.png', '2022-10-05 14:22:15', '2022-10-05 14:22:15'),
('24d5beff-9373-4633-b24e-49ad67fbf8aa', 'pUEz6gZsunYHdcLDH1TqstZrXXxcnoHgVH454xIH.png', '2022-10-05 14:22:15', '2022-10-05 14:22:15'),
('2f0ad08e-7427-4657-896c-e422036e5e65', 'Xpa94ZTPXefWiuCZx7EKRmcRTY8j85acp2y3idHj.png', '2022-10-05 14:29:45', '2022-10-05 14:29:45'),
('2f0ad08e-7427-4657-896c-e422036e5e65', 'XJaAGPxZw9xb2itS6xTKnBKmKwOnjsuG0fBnbmgI.png', '2022-10-05 14:29:45', '2022-10-05 14:29:45'),
('2f0ad08e-7427-4657-896c-e422036e5e65', 'lo986ALTt5wITXSxKuNVx4gsryMSHT6KbJnvp1Vv.png', '2022-10-05 14:29:45', '2022-10-05 14:29:45'),
('99742a61-8850-4272-b77b-155a3dfaec3e', '4wYMxnYHW0jSxsu1Snnh80Dkvd6SmZ0nybV3yFE9.png', '2022-10-05 14:41:35', '2022-10-05 14:41:35'),
('99742a61-8850-4272-b77b-155a3dfaec3e', 'WfsFYYpbzf2zdpAj4LDweUHSMB84s3Zg8c0Dn2bQ.png', '2022-10-05 14:41:35', '2022-10-05 14:41:35'),
('99742a61-8850-4272-b77b-155a3dfaec3e', 'rUkw2psOeo2L1nHVDGmXMMmoGcRIbNnUGiLVz7Je.png', '2022-10-05 14:41:35', '2022-10-05 14:41:35'),
('7e093cd0-c6b2-4526-8562-7b0a53c93ba9', 'WxByGpsRauphZL2fSPRHfkd2Prkocj7MFmyczAO1.png', '2022-10-05 14:43:21', '2022-10-05 14:43:21'),
('7e093cd0-c6b2-4526-8562-7b0a53c93ba9', 'Nl46GRl8e1CwrXBcZmiCuKNmzRkOmVIIxAtl6vJm.png', '2022-10-05 14:43:21', '2022-10-05 14:43:21'),
('7e093cd0-c6b2-4526-8562-7b0a53c93ba9', 'cq2xNj3BsQcFuvKcj0U3LerJsoGnHKQTZE1cQUrU.png', '2022-10-05 14:43:21', '2022-10-05 14:43:21'),
('25a2f479-c680-4ca1-a32c-e011842c6afa', 'HTgDFqHfuv5sxXHZaDDoWpMUH29d4C59oaOOBpB0.png', '2022-10-05 14:51:56', '2022-10-05 14:51:56'),
('9e6a57af-095b-4a75-92c8-5ef0f31501be', 'BwhvI7sSm6HSPmmIe8XGT1DFolVUBYI3TYKwc3kO.png', '2022-10-05 14:56:29', '2022-10-05 14:56:29'),
('9e6a57af-095b-4a75-92c8-5ef0f31501be', '2Ny8m0OEsGwvab1WdbA3aB6IAScV8TPjZ02tV6Gb.png', '2022-10-05 14:56:29', '2022-10-05 14:56:29'),
('9e6a57af-095b-4a75-92c8-5ef0f31501be', 'ik73ihtOhkXLtBn12kRVfcwEqdzarHWGhgU2W5GL.png', '2022-10-05 14:56:29', '2022-10-05 14:56:29'),
('8a8f287d-8554-478a-81c0-3be538f48fce', 'e9GOargl7R5bluHW6PtLgVWIROgyhV05LDFkOdRF.jpg', '2025-01-16 15:08:25', '2025-01-16 15:08:25'),
('971ff579-bed6-45db-b0f4-02e55c801081', 'FQSGJt3l7G4uCpTDxzaRQcDtibE0hF37XgoNkHcD.jpg', '2025-01-16 15:09:12', '2025-01-16 15:09:12'),
('7f913bbc-b631-4c8c-8f38-876f7ba3506a', 't43ZPvSJnJdimrYM0HHw1aK16wv6ArtrgM0vWNHj.png', '2025-01-16 15:23:03', '2025-01-16 15:23:03'),
('275a2f74-b41c-4084-86c1-06d58f94a47d', '7YpBDva0xLYM9jBzb6oJO64eeyU6E4VGpg8Lto26.png', '2025-01-16 15:23:11', '2025-01-16 15:23:11'),
('1e05f18d-6e56-40bc-9e32-fb364fcf7c97', 'MQDQYafrnQso3GDceZIrppMPBGyrSaB9il2TwqdH.png', '2025-01-16 15:25:44', '2025-01-16 15:25:44'),
('9a756fb3-d55b-4570-9670-0b826aa2c151', 'zHQyZqYXx5Okk1e8k9XO6ZIuWjnZ9ato3qy52W8O.jpg', '2025-01-16 15:30:27', '2025-01-16 15:30:27'),
('910e8911-fdf0-4bf7-85ac-1918055b35a6', 'E5QRTfD5lZjWgc4hpYvtwi2LHDuBq4NsEdEdhWqr.png', '2025-01-16 15:30:55', '2025-01-16 15:30:55'),
('2c41f959-814c-4ae5-930b-8d3ddfe512b2', 'PqIuHbcXOkYzxVHvY7M35OM4Y8P1LdOdbNzgftZ6.jpg', '2025-01-16 15:31:43', '2025-01-16 15:31:43'),
('dd47ee47-61b4-4af8-ae6c-5751005a6a8b', 'FML80WjetgK9NAI1N4BBg1mp6rvM6kXN3xnSA8wp.jpg', '2025-01-16 15:32:05', '2025-01-16 15:32:05'),
('4d6b34aa-8da5-4cc0-bdda-0ed8d6ecad3e', 'dLthvm8mbgJOIgxGlLgL9uOR3DE0GKTRrMj9sQq8.png', '2025-02-07 14:24:53', '2025-02-07 14:24:53'),
('4d6b34aa-8da5-4cc0-bdda-0ed8d6ecad3e', 'wybaR6LejYxxYBYYbpnUHiNMma0mpsdvUnT03X9W.png', '2025-02-07 14:24:53', '2025-02-07 14:24:53'),
('4d6b34aa-8da5-4cc0-bdda-0ed8d6ecad3e', 'lGqgqB2aZuJ85hhhC8ZvxkAeGzh1RCswOG9mwEId.png', '2025-02-07 14:24:53', '2025-02-07 14:24:53'),
('3cdbd231-3798-4118-a0b4-468bfb4c5947', '80T5GSSUESx24Lg4BaPD4A57OTF5HWieNdET7gTf.png', '2025-02-07 14:25:34', '2025-02-07 14:25:34'),
('3cdbd231-3798-4118-a0b4-468bfb4c5947', 'pH7A2uOWXaZUTYMrv8LadQLQ1I9tU4OL0TWyERfB.png', '2025-02-07 14:25:34', '2025-02-07 14:25:34'),
('3cdbd231-3798-4118-a0b4-468bfb4c5947', 'qAtlRhwKmvR1E2bNay5u3rQLYgmkkJ2SB7M8KLqb.png', '2025-02-07 14:25:34', '2025-02-07 14:25:34'),
('c480b6a6-ce6d-4a90-a5c1-9ecc5641dd00', '93QQcCMSEzeyxBLZ3gJnZp3c0pXluhpK7hgDRlUt.png', '2025-02-07 14:25:46', '2025-02-07 14:25:46'),
('c480b6a6-ce6d-4a90-a5c1-9ecc5641dd00', 'oZlsa24gbGbNJhIx74nAXt1KcgSmGwDvSGrEOOYD.png', '2025-02-07 14:25:46', '2025-02-07 14:25:46'),
('c480b6a6-ce6d-4a90-a5c1-9ecc5641dd00', 'BUqZugLcQSjaQBr95hZk5cmySXzCNnDPcqYI9BNS.png', '2025-02-07 14:25:46', '2025-02-07 14:25:46'),
('863f0d60-ed4b-43ac-8fba-fee79cbf0914', 'pzWIZyMj9MmYB4CCQM29R5VelJdueb3lCVtedRbT.png', '2025-02-07 14:26:07', '2025-02-07 14:26:07'),
('863f0d60-ed4b-43ac-8fba-fee79cbf0914', 'JUEG8Q3cXfD9heZKJUFRQLmk1izgSMwhyV6wpIaW.png', '2025-02-07 14:26:07', '2025-02-07 14:26:07'),
('863f0d60-ed4b-43ac-8fba-fee79cbf0914', 'HUGAYuu2P2XdsMsKyzbm24ewmj7ybCnOWXnJIBQY.png', '2025-02-07 14:26:07', '2025-02-07 14:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `wa`, `email`, `address`, `gps`, `created_at`, `updated_at`) VALUES
('d10a7e1e-1cb6-4a0a-ba9d-33fa89c63649', '6288805844337', 'test1234@gmail.com', 'Jalan Pandean Kidul RT.03/RW01 Banjarkemantren Kecamatan Buduran Kabupaten Sidoarjo Jawa Timur 61252 Indonesia\r\n\r\nxxxxxx', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7912.8569649695955!2d112.70658766429683!3d-7.417739313364049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e32a3bea0fd7%3A0xae75042fce1d66da!2sCV.Almira%20Trans%20Tour%20%26%20Rent%20Car!5e0!3m2!1sen!2sid!4v1664806128324!5m2!1sen!2sid', '2022-09-09 20:19:42', '2022-10-03 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messaging`
--

INSERT INTO `messaging` (`id`, `name`, `email`, `wa`, `msg`, `created_at`, `updated_at`) VALUES
('3c1cc69e-3749-455b-942a-94132510a73f', 'operatorgudang', 'nva3.vaaa@gmail.com', '+6287859267656', 'lorem ipsum dolor si amet haushdasdas;lda', '2022-09-30 15:25:32', '2022-09-30 15:25:32'),
('8b5cda68-4f85-46e8-9034-ae29f1084963', 'Bagus Sitompul S.H.', 'emil00@gmail.co.id', '+6222222222222', 'lorem_ipsum dolor si amet', '2022-09-30 06:07:08', '2022-09-30 06:07:08'),
('fe2ff3d0-771a-4b16-8822-d74954b3716e', 'Dr. Daija Spinka DVM', 'doyle.lyda@hotmail.com', '+6211111111111', 'lorem_ipsum dolor si amet', '2022-09-30 06:06:07', '2022-09-30 06:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2022_08_25_141545_create_paket_tour', 1),
(28, '2022_08_25_141947_create_travel_reguler', 1),
(29, '2022_08_25_141958_create_sewa_mobil', 1),
(30, '2022_08_25_142206_create_carousel_images', 1),
(31, '2022_08_25_142231_create_contact', 1),
(32, '2022_08_25_144330_create_collection_photos', 1),
(33, '2022_09_29_165141_create_messaging', 2),
(34, '2022_10_05_125957_create_photos', 3);

-- --------------------------------------------------------

--
-- Table structure for table `paket_tour`
--

CREATE TABLE `paket_tour` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_photos_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int UNSIGNED NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_plan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_offer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepare` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_tour`
--

INSERT INTO `paket_tour` (`id`, `collection_photos_id`, `review_id`, `name`, `category`, `lokasi`, `price`, `detail`, `trip_plan`, `best_offer`, `prepare`, `slug`, `created_at`, `updated_at`) VALUES
('0cfeb566-5d8e-4329-af97-5ae392357158', 'fa513cb3-3efc-4ee1-b02a-39d207628e62', 'f5472ea6-1d03-440c-acca-8317d1898f21', 'Paket Kawah Ijen', 'Tour', 'Banyuwangi', 750000, '<p>Liburan dengan menikmati hawa sejuk yang jarang didapatkan di kota? Tentu saja sangat menarik! Jika Anda menginginkannya, bertamasya dengan Paket ini adalah solusi terbaik. Dengan biaya terjangkau, dalam 2 hari Anda bisa menikmati kesejukan kawasan Gunung Ijen yang sangat terkenal indahnya.</p><p>&nbsp;</p><p>Bersama ArjunoTrans, liburan Anda lebih nyaman dan aman.</p>', '<h3>Hari Ke 2</h3><ul><li>12:00 Jemput di Surabaya / Malang ( Airport / Stasiun )</li><li>12:30 Goes to Ijen</li><li>18:00 Check in Hotel / Penginapan</li></ul><p>&nbsp;</p><h3>Hari ke 2</h3><ul><li>24.00 Peserta dibangunkan dan bersiap menuju Pos Paltuding</li><li>02.00 Sampai di Pos Paltuding dan melakukan proses perijinan</li><li>02.30 Trekking menuju Kawah Ijen estimasi perjalanan dengan berjalan kaki 1 jam 30 menit</li><li>04.00 Sampai di kawah Ijen. Menikmati indahnya api biru (blue fire) &amp; sunrise gunung Ijen</li><li>05.00 Melihat kegiatan para penambang belerang dari atas gunung Ijen, selanjutnya menuju Pos Paltuding</li><li>06.30 Sampai di Pos Paltuding, perjalanan menuju Hotel Ijen</li><li>08.30 Breakfast di Hotel dan persiapan Chek out</li><li>09.30 Kembali menuju Surabaya / Malang (Airport / Stasiun / Terminal)</li><li>16.30 Diperkirakan sampai Surabaya / Malang</li></ul>', '<p>Penawaran Menarik untuk tour group (lebih dari satu orang):<br>6 org: Rp 645.000,- / pax<br>5 org: Rp 760.000,- / pax<br>4 org: Rp 8550.000,- / pax<br>3 org: Rp 1.125.000,- / pax<br>2 org: Rp 1.475.000,- / pax</p><p><strong>Note</strong> :</p><ul><li>Lebih dari 6 orang harap hubungi Customer service kami.</li><li>Untuk high session (hari besar, lebaran, xmas, tahun baru dan long weekend) ada additional charge 25%.</li><li>Harga ini berlaku untuk WNI (Warga Negara Indonesia), Jika WNA additional 150rb / Pax.</li><li>Harga Tiket dapat berubah sewaktu-waktu tanpa pemberitahuan.<br>&nbsp;</li><li>Ketersediaan Hotel / pilihan hotel sesuai dengan ketersediaan room pada saat pemberian DP.</li><li>Down Payment 50% untuk Tanda Jadi / Booking Fee<br>&nbsp;</li><li>Untuk pembatalan sepihak, down payment tidak dapat di refund.</li></ul>', '<p><strong>Beberapa hal yang perlu anda persiapkan!</strong></p><p>Untuk bisa menikmati liburan Bromo, Batu Malang dan Ijen dengan nyaman sebaiknya Anda menyiapkan beberapa perlengkapan :</p><ul><li>Jaket</li><li>Sepatu Tracking</li><li>Masker</li><li>Topi Gunung</li><li>Kaca mata [sun glasses]</li><li>Obat Anti Nyamuk</li><li>Jas Hujan</li><li>Obat – obatan pribadi</li><li>Snack dan air mineral</li><li>Dll</li></ul>', 'paket-kawah-ijen', '2022-09-26 14:43:57', '2022-09-26 14:43:57'),
('73d811e0-c25f-4be2-a1fd-48db79a1e780', 'fc52feeb-4020-4326-bcce-75bb15c9920a', 'f5472ea6-1d03-440c-acca-8317d1898f2c', 'Gunung Bromo - Gunung Semeru', 'Tour', 'Brama', 850000, '<p>Tour menikmati matahari tenggelam di kawasan Bromo ini cocok bagi Anda yang hanya ingin berwisata dalam waktu singkat dengan tetap mendapatkan kesan menarik. Suasana Bromo selalu menjadi daya tarik, terlebih ketika matahari tenggelam. Kita bisa menikmatinya dari Kawah sambil jalan kaki maupun berkuda, atau menikmatinya dari pasir berbisik dan bukit teletubis. Refreshing maksimal untuk jiwa raga kita sehingga lebih siap menghadapi padatnya hari esok.</p><p>&nbsp;</p><p>ArjunoTrans siap mengantar dan menjadi saksi indahnya matahari tenggelam di pegununan Bromo</p>', '<ul><li>11:00 Jemput di Bandara / Stasiun / Terminal di Surabaya / Malang</li><li>11:15 Perjalanan menuju ke Bromo</li><li>14:00 Perkiraan tiba di Transit Point di Bromo</li><li>14:15 Tour Bromo Sunset by Jeep</li><li>14:45 Perkiraan tiba parkiran jeep di Kawah Gunung Bromo</li><li>15:00 Menikmati keindahan Kawah Bromo dengan jalan kaki atau naik kuda.</li><li>15:45 Perjalanan menuju Bukit Teletubbies</li><li>16:00 Berfoto ria di area savana Bukit Teletubbies</li><li>16:15 Menuju ke kawasan Pasir Berbisik.</li><li>16:30 Menikmati hamparan Lautan Pasir yang berbisik</li><li>16:45 Menuju Penanjakan</li><li>17:00 Perkiraan tiba di penanjakan dan menunggu saat matahari tenggelam.</li><li>17:10 Berselfie ria di latar belakangi matahari tenggelam</li><li>17:30 Persiapan kembali ke Transit Point</li><li>18:00 Perkiraan tiba di Transit Point</li><li>18:30 Perjalanan kembali ke Surabaya / Malang</li><li>21:00 Perkiraan tiba di Bandara / Terminal / Stasiun.</li><li>21:30 Tour selesai sampai jumpa di Paket Wisata selanjutnya.</li></ul>', '<p>Penawaran Menarik untuk tour group (lebih dari satu orang):<br>6 org: Rp 350.000,- / pax<br>5 org: Rp 400.000,- / pax<br>4 org: Rp 500.000,- / pax<br>3 org: Rp 640.000,- / pax<br>2 org: Rp 935.000,- / pax</p>', '<p><strong>Beberapa hal yang perlu anda persiapkan!</strong></p><p>Untuk bisa menikmati liburan Bromo, Batu Malang dan Ijen dengan nyaman sebaiknya Anda menyiapkan beberapa perlengkapan :</p><ul><li>Jaket</li><li>Sepatu Tracking</li><li>Masker</li><li>Topi Gunung</li><li>Kaca mata [sun glasses]</li><li>Obat Anti Nyamuk</li><li>Jas Hujan</li><li>Obat – obatan pribadi</li><li>Snack dan air mineral</li><li>Dll</li></ul>', 'gunung-bromo-gunung-semeru', '2022-09-26 13:44:35', '2022-09-26 13:44:35'),
('c9dec1b1-6f1c-40af-9d62-d3c4b6fab92e', 'fb0eaf80-3916-410e-95e2-64ce5ac45fde', 'f5472ea6-1d03-440c-acca-8317d1898f2x', 'Bali', 'Beach', 'Bali', 1000000, '<p>lorem ipsum</p><p>&nbsp;</p><ul><li>1aslda;sl</li></ul><ol><li>asdklajsd</li><li>akjdljkasd</li></ol><p><strong>asjdhaksd</strong><i><strong>asdasd</strong></i></p><p>&nbsp;</p><h2>Besar</h2><p>&nbsp;</p>', '<p>lorem ipsum dolor si amet</p>', '<p>best offer</p>', '<ul><li>bawa raket</li><li>baju&nbsp;</li><li>gulling</li></ul>', 'bali', '2022-10-03 14:05:30', '2022-10-03 14:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_photos_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `collection_photos_id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
('f735dd83-241f-48d3-a225-cbeccd9c3d82', '9e6a57af-095b-4a75-92c8-5ef0f31501be', 'Test', 'asdasdasdad123123', '2022-10-05 14:56:29', '2022-10-05 14:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` char(36) NOT NULL,
  `data_id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `star` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `data_id`, `name`, `msg`, `email`, `star`, `created_at`, `updated_at`) VALUES
('0602b0cc-f59c-4fb4-85a8-9434203fde8f', 'f5472ea6-1d03-440c-acca-8317d1898fcc', 'Dedi', 'Kendaraan enak tapi ban', 'dedi.suharman05@gmail.com', 4, '2022-11-26 15:59:33', '2022-11-26 15:59:33'),
('3df5bcb6-ecfd-4cbe-82b0-68d6f157b023', 'f5472ea6-1d03-440c-acca-8317d1898fcc', 'Alan', 'kendaraan nyaman dan bagus', 'kuldiKuah@gmail.com', 5, '2022-11-26 15:59:14', '2022-11-26 15:59:14'),
('55269b19-44dc-4452-8410-facaff9954dc', 'f5472ea6-1d03-440c-acca-8317d1898f2z', 'heuhuehe', 'asdasdasdadsasd', 'inallonebear@gmail.com', 5, '2022-10-12 13:17:43', '2022-10-12 13:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `sewa_mobil`
--

CREATE TABLE `sewa_mobil` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_photos_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_mobil` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kursi` int UNSIGNED NOT NULL,
  `cc` int UNSIGNED NOT NULL,
  `price` int UNSIGNED NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sewa_mobil`
--

INSERT INTO `sewa_mobil` (`id`, `collection_photos_id`, `review_id`, `name`, `tipe_mobil`, `kursi`, `cc`, `price`, `detail`, `slug`, `created_at`, `updated_at`) VALUES
('716e7320-c26d-4073-9bc9-5a2722ed8a73', '51b939f4-a4d8-4110-b58b-28cf8021482d', 'f5472ea6-1d03-440c-acca-8317d1898f2z', 'agya 2022', 'Mini', 4, 2800, 500000, '<p>Sewa mobil/ rent car bulanan adalah solusi tepat bagi Anda yang butuh diantarkan selama hari dan jam kerja dalam satu bulan penuh. Sopir berpengalaman kami siap mengantar kemanapun dengan pilihan mobil nyaman terawat. Anda tinggal duduk, dan sampai ditempat tujuan dengan nyaman.</p><p><strong>Sewa mobil/ Rent Car bulanan ArjunoTrans adalah:</strong></p><ul><li>All New Xenia 2015 dan Great New Xenia 2017.</li><li>Harga : Rp. 7.700.000,- / Bulan</li><li>22 Hari Kerja (Senin – Jum’at, dalam sebulan 4 Minggu)</li></ul><p><strong>Harga Sudah Termasuk :</strong></p><ul><li>Mobil All New Xenia 1 Unit mobil</li><li>Driver</li><li>Jam Kerja dari 07.30 sampai 16.30 (Ruang Lingkup Jawa Timur).</li><li>Service Rutin (Preventive Maintenance)</li></ul><p><strong>Harga Belum Termasuk :</strong></p><ul><li>Fuel/ Bahan Bakar Minyak (BBM)/ Bensin</li><li>Toll Fee &amp; Parking area</li><li>Makan Driver</li><li>Asuransi Jiwa</li><li>Biaya perbaikan dari Kerusakan Mobil Yang disebabkan Pemakaian yang di luar kewajaran.</li><li>Overtime Mobil &amp; Driver : (Rp 25.000 /Jam di Hari Kerja) &amp; (Rp 50.000 / jam Di Sabtu Minggu)</li></ul><p><strong>Cara Pembayaran :</strong></p><ul><li>100% Pembayaran di Muka, dan Untuk Overtime di bayarkan 4 hari sebelum Akhir Bulan.</li></ul>', 'agya-2022', '2022-09-26 13:21:02', '2022-09-26 13:21:02'),
('7ded4283-2e79-4266-a17a-bbd21cdd21c3', '8043248f-9b59-47be-89f8-ac7820e0514c', 'f5472ea6-1d03-440c-acca-8317d1898fcc', 'Avanza Tahun 2021', 'SUV', 5, 3500, 850000, '<p>Sewa mobil/ rent car bulanan adalah solusi tepat bagi Anda yang butuh diantarkan selama hari dan jam kerja dalam satu bulan penuh. Sopir berpengalaman kami siap mengantar kemanapun dengan pilihan mobil nyaman terawat. Anda tinggal duduk, dan sampai ditempat tujuan dengan nyaman.</p><p><strong>Sewa mobil/ Rent Car bulanan ArjunoTrans adalah:</strong></p><ul><li>All New Xenia 2015 dan Great New Xenia 2017.</li><li>Harga : Rp. 7.700.000,- / Bulan</li><li>22 Hari Kerja (Senin – Jum’at, dalam sebulan 4 Minggu)</li></ul><p><strong>Harga Sudah Termasuk :</strong></p><ul><li>Mobil All New Xenia 1 Unit mobil</li><li>Driver</li><li>Jam Kerja dari 07.30 sampai 16.30 (Ruang Lingkup Jawa Timur).</li><li>Service Rutin (Preventive Maintenance)</li></ul><p><strong>Harga Belum Termasuk :</strong></p><ul><li>Fuel/ Bahan Bakar Minyak (BBM)/ Bensin</li><li>Toll Fee &amp; Parking area</li><li>Makan Driver</li><li>Asuransi Jiwa</li><li>Biaya perbaikan dari Kerusakan Mobil Yang disebabkan Pemakaian yang di luar kewajaran.</li><li>Overtime Mobil &amp; Driver : (Rp 25.000 /Jam di Hari Kerja) &amp; (Rp 50.000 / jam Di Sabtu Minggu)</li></ul><p><strong>Cara Pembayaran :</strong></p><ul><li>100% Pembayaran di Muka, dan Untuk Overtime di bayarkan 4 hari sebelum Akhir Bulan.</li></ul><p>&nbsp;</p>', 'avanza-tahun-2021', '2022-09-06 00:33:35', '2022-09-20 05:18:47'),
('a8c90f6c-a0a7-41fb-9c4c-a16cefb15e43', '25a2f479-c680-4ca1-a32c-e011842c6afa', 'f5472ea6-1d03-440c-acca-8317d1898fuu', 'niviana', 'Kijang', 6, 5000, 850000, '<p>asdasd123123123</p>', 'niviana', '2022-10-05 14:51:56', '2022-10-05 14:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('31dc1d0a-0e73-470c-92d2-e3fd5fd3b505', 'Luettgen Kailey', 'admin@almiratravel.com', '2022-09-12 22:21:30', '$2y$10$fRcMHCU7IAavbkiNzKZE2OvWLXiKOTP84OCSiakaxv0sb7R9e90vS', 'cgH5RADDDFAWmGAAa4vL8KokAtyinl7tfCUqBR5T5ZicepzlCRf37DBeYIjG', '2022-09-12 22:21:30', '2022-09-15 00:03:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel_images`
--
ALTER TABLE `carousel_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carousel_images_collection_photos_id_index` (`collection_photos_id`);

--
-- Indexes for table `collection_photos`
--
ALTER TABLE `collection_photos`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `messaging_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_tour`
--
ALTER TABLE `paket_tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_tour_collection_photos_id_index` (`collection_photos_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_collection_photos_id_index` (`collection_photos_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_id` (`data_id`);

--
-- Indexes for table `sewa_mobil`
--
ALTER TABLE `sewa_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sewa_mobil_collection_photos_id_index` (`collection_photos_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
