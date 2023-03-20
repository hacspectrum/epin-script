-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2023 at 06:28 PM
-- Server version: 10.2.41-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpscrip_epin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankalar`
--

CREATE TABLE `bankalar` (
  `id` int(11) NOT NULL,
  `banka_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `banka_gorsel` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `banka_type` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'normal',
  `adsoyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `iban` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `hesapno` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `subeno` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `bankalar`
--

INSERT INTO `bankalar` (`id`, `banka_adi`, `banka_gorsel`, `banka_type`, `adsoyad`, `iban`, `hesapno`, `subeno`) VALUES
(33, 'PTT (11.00--17.00 SAATLERİ ARASINDA)', 'MTVhYmI4N2M1YzExMTY.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', '10093523', '10093523', '10093523'),
(32, 'TEB', 'MTVhYmI4NzkzYjY1ZDQ.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR39 0003 2000 0000 0036 0488 81', '36048881', '157'),
(23, 'ZİRAAT BANKASI', 'MTVhYmI3MGM0ZGU0Mjg.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR31 0001 0013 3362 7295 4850 05', '62729548-5005', '1333'),
(24, 'AKBANK', 'MTVhYmI4M2VlMWYxZDQ.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR28 0004 6001 7188 8000 1251 40', '0125140', '0171'),
(26, 'FİNANS BANK', 'MTVhYmI4NjAwMzgxOWI.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR79 0011 1000 0000 0057 2447 03', '57244703', '00937'),
(27, 'YAPI KREDİ (09.00--22.45 SAATLERİNDE ÖDEME KABUL EDİLİR)', 'MTVhYmI4NjM0NTBkY2M.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR57 0006 7010 0000 0043 9911 91', '43991191', '039'),
(28, 'İŞBANK', 'MTVhYmI4NjY5NWMyY2M.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR24 0006 4000 0013 4350 5661 70', '0566170', '3435'),
(29, 'DENİZBANK', 'MTVhYmI4NmY0MDJjOTY.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR02 0013 4000 0040 0880 7000 20', '4008807-364', '1895'),
(30, 'HALKBANK', 'MTVhYmI4NzFhNjI0ZjU.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR73 0001 2009 4300 0010 2608 92', '10260892', '9430'),
(31, 'VAKIFBANK', 'MTVhYmI4NzQwNGU1Mzg.png', 'paytr', 'PAYTR ÖDEME HİZMETLERİ AŞ', 'TR02 0001 5001 5800 7303 8783 58', '00158007303878358', 'S00363');

-- --------------------------------------------------------

--
-- Table structure for table `bayi_kategori_indirimleri`
--

CREATE TABLE `bayi_kategori_indirimleri` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `indirim` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bize_sat`
--

CREATE TABLE `bize_sat` (
  `id` int(11) NOT NULL,
  `bayi` int(11) NOT NULL DEFAULT 0,
  `urun_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `verilecek_tutar` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cekim_bildirimleri`
--

CREATE TABLE `cekim_bildirimleri` (
  `id` int(11) NOT NULL,
  `banka_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adsoyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `iban` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `hesapno` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `subeno` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `miktar` float NOT NULL DEFAULT 0,
  `durum` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uye_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chip_kategoriler`
--

CREATE TABLE `chip_kategoriler` (
  `id` int(11) NOT NULL,
  `siralama` int(11) NOT NULL DEFAULT 0,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `gorsel` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_gorunumu` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `chip_kategoriler`
--

INSERT INTO `chip_kategoriler` (`id`, `siralama`, `kategori_adi`, `aciklama`, `gorsel`, `anasayfa_gorunumu`) VALUES
(59, 0, 'Netflix', '<p>Sipariş sonrası &quot;Siparişlerim&quot; b&ouml;l&uuml;m&uuml;ne girerek size &ouml;zel oluşturulan Netflix Kullanıcı ve Şifresiyle 1 Aylık Netflix aboneliğine sahip olucaksınız.&nbsp;</p>\r\n\r\n<p>1 Aylık s&uuml;re sonrası tekrar &uuml;yelik almak isterseniz yeniden bir sipariş ge&ccedil;erek yeni bir kullanıcı ve şifresi edinmelisiniz.</p>', 'MTVkMDdhMWQ0YmVhZTg.jpg', 1),
(60, 0, 'Spotify', '', 'MTVkMDdhMWVhY2RlZmE.jpg', 1),
(61, 0, 'Blu Tv', '', 'MTVkMDdhMWY0M2UzNjk.jpg', 1),
(62, 0, 'League Of Legends', '', 'MTVkMDdhMjEzNTIzNGE.jpg', 1),
(63, 0, 'PUBG Mobile UC (Unknown Cash)', '', 'MTVkMDdhMjIxNDc0Y2Q.jpg', 1),
(64, 0, 'Steam Cüzdan Kodu', '', 'MTVkMDdhMjJjZGEwZmU.jpg', 1),
(65, 0, 'Wolfteam Nakit - Joypara', '', 'MTVkMDdhMjM4MmIxNzQ.png', 1),
(70, 0, 'Zula Altın', '', 'MTVkMDdhMmQ5NWFjZmE.jpg', 1),
(71, 0, 'Metin2 EP', '', 'MTVkMDdhMmU3MDJmYTQ.jpg', 1),
(72, 0, 'Metin2 Yang', '', 'MTVkMDdhMmZjZTJjNzU.png', 1),
(73, 0, 'Knight Online Cash (NTTGame)', '', 'MTVkMDdhMzBjNWE2MDE.jpg', 1),
(74, 0, 'Knight Online GB', '', 'MTVkMDdhMzE3MjkxMTI.png', 1),
(75, 0, 'Point Blank TG', '', 'MTVkMDdhMzI1ZTdjYTI.jpg', 1),
(76, 0, 'İstanbul Kıyamet Vakti (Akçe)', '', 'MTVkMDdhMzMxMWNhMDE.jpg', 1),
(77, 0, 'Legend Online', '', 'MTVkMDdhMzNiMjQ4ZDI.jpg', 1),
(79, 0, 'OGame Karanlık Madde', '', 'MTVkMDdhMzUwMjBlOWU.jpg', 1),
(80, 0, 'Skill Cash', '', 'MTVkMDdhMzViNzIxOTA.jpg', 1),
(81, 0, 'Rigor Z Premium Gc', '', 'MTVkMDdhMzY1NDQ1MTk.jpg', 1),
(85, 0, 'First Blood Altın', '', 'MTVkMDdhM2VhOWE3Mzg.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chip_urunler`
--

CREATE TABLE `chip_urunler` (
  `id` int(11) NOT NULL,
  `urun_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seourl` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `makale` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` float DEFAULT 0,
  `bizesat_durum` int(11) DEFAULT 0,
  `bizesat_fiyat` float DEFAULT 0,
  `kategori_id` int(11) NOT NULL,
  `stok` int(11) DEFAULT 1,
  `aciklama` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `siralama` int(11) NOT NULL DEFAULT 0,
  `chip_miktar` varchar(255) COLLATE utf8_turkish_ci DEFAULT '0',
  `api_amount` varchar(255) COLLATE utf8_turkish_ci DEFAULT '0',
  `api_id` int(11) DEFAULT 0,
  `api_type` int(11) DEFAULT 0,
  `api_chipcin` int(11) DEFAULT 0,
  `api_chipcin_id` int(11) DEFAULT NULL,
  `api_chipcin_cat_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `chip_urunler`
--

INSERT INTO `chip_urunler` (`id`, `urun_adi`, `seourl`, `makale`, `fiyat`, `bizesat_durum`, `bizesat_fiyat`, `kategori_id`, `stok`, `aciklama`, `siralama`, `chip_miktar`, `api_amount`, `api_id`, `api_type`, `api_chipcin`, `api_chipcin_id`, `api_chipcin_cat_id`) VALUES
(411, '400 Riot Points (RP)', '400-riot-points-rp', '', 12, 0, 0, 62, 1, NULL, 1, '0', '0', 0, 0, 0, 0, 0),
(412, '800 Riot Points (RP)', '800-riot-points-rp', '', 24, 0, 0, 62, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(413, '1.780 Riot Points (RP)', '1-780-riot-points-rp', '', 48, 0, 0, 62, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(414, '3.620 Riot Points (RP)', '3-620-riot-points-rp', '', 96, 0, 0, 62, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(415, '6.450 Riot Points (RP)', '6-450-riot-points-rp', '', 162, 0, 0, 62, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(416, '12.800 Riot Points (RP)', '12-800-riot-points-rp', '', 300, 0, 0, 62, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(417, '35 + 2 PUBG Mobile UC', '35-2-pubg-mobile-uc', '', 3.1, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(418, '70 + 4 PUBG Mobile UC', '70-4-pubg-mobile-uc', '', 6.2, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(419, '210 + 11 PUBG Mobile UC', '210-11-pubg-mobile-uc', '', 18.6, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(420, '420 + 20 PUBG Mobile UC', '420-20-pubg-mobile-uc', '', 36, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(421, '700 + 70 PUBG Mobile UC', '700-70-pubg-mobile-uc', '', 61.5, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(422, '1750 + 263 PUBG Mobile UC', '1750-263-pubg-mobile-uc', '', 154, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(423, '3500 + 700 PUBG Mobile UC', '3500-700-pubg-mobile-uc', '', 307.5, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(424, '7000 + 1750 PUBG Mobile UC', '7000-1750-pubg-mobile-uc', '', 615, 0, 0, 63, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(425, '3 TL Stem Kodu', '3-tl-stem-kodu', '', 3, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(426, '5 TL Stem Kodu', '5-tl-stem-kodu', '', 5, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(427, '10 TL Stem Kodu', '10-tl-stem-kodu', '', 10, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(428, '25 TL Stem Kodu', '25-tl-stem-kodu', '', 25, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(429, '50 TL Stem Kodu', '50-tl-stem-kodu', '', 50, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(430, '100 TL Stem Kodu', '100-tl-stem-kodu', '', 100, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(431, '200 TL Stem Kodu', '200-tl-stem-kodu', '', 200, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(432, '250 TL Stem Kodu', '250-tl-stem-kodu', '', 250, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(433, '300 TL Stem Kodu', '300-tl-stem-kodu', '', 300, 0, 0, 64, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(434, '1.000 Joypara (350 Wolfteam Nakit)', '1-000-joypara-350-wolfteam-nakit', '<p><span style=\"color:#ffffff\">.</span></p>', 1.18, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(435, '2.750 Joypara (1.000 Wolftteam Nakit)', '2-750-joypara-1-000-wolftteam-nakit', '', 3.25, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(436, '5.000 Joypara (1.875 Wolfteam Nakit)', '5-000-joypara-1-875-wolfteam-nakit', '', 5.9, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(437, '10.000 Joypara (3.850 Wolfteam Nakit)', '10-000-joypara-3-850-wolfteam-nakit', '', 11.8, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(438, '12.750 Joypara (5.000 Wolfteam Nakit)', '12-750-joypara-5-000-wolfteam-nakit', '', 15.05, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(439, '20.000 Joypara (8.000 Wolfteam Nakit)', '20-000-joypara-8-000-wolfteam-nakit', '', 23.6, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(440, '30.000 Joypara (12.250 Wolfteam Nakit)', '30-000-joypara-12-250-wolfteam-nakit', '', 35.4, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(441, '50.000 Joypara (21.250 Wolfteam Nakit)', '50-000-joypara-21-250-wolfteam-nakit', '', 59, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(442, '80.000 Joypara (35.000 Wolfteam Nakit)', '80-000-joypara-35-000-wolfteam-nakit', '', 94.4, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(443, '100.000 Joypara (45.000 Wolfteam Nakit)', '100-000-joypara-45-000-wolfteam-nakit', '', 118, 0, 0, 65, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(444, '2.450 + 245 Zula Altını', '2-450-245-zula-altini', '', 6, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(445, '5.000 + 500 Zula Altını', '5-000-500-zula-altini', '', 12, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(446, '10.500 + 1.050 Zula Altını', '10-500-1-050-zula-altini', '', 24, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(447, '26.500 + 2.650 Zula Altını', '26-500-2-650-zula-altini', '', 60, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(448, '54.000 + 5.400 Zula Altını', '54-000-5-400-zula-altini', '', 120, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(449, '100.000 + 10.000 Zula Altını', '100-000-10-000-zula-altini', '', 205, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(450, '180.000 + 18.000 Zula Altını', '180-000-18-000-zula-altini', '', 300, 0, 0, 70, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(451, 'Metin2 30 EP (Gameforge 6 TL)', 'metin2-30-ep-gameforge-6-tl', '', 6, 0, 0, 71, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(452, 'Metin2 60 EP (Gameforge 12 TL)', 'metin2-60-ep-gameforge-12-tl', '', 12, 0, 0, 71, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(453, 'Metin2 180 EP (Gameforge 29 TL)', 'metin2-180-ep-gameforge-29-tl', '', 29, 0, 0, 71, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(454, 'Metin2 450 EP (Gameforge 59 TL)', 'metin2-450-ep-gameforge-59-tl', '', 59, 0, 0, 71, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(455, 'Metin2 1.275 EP (Gameforge 149 TL)', 'metin2-1-275-ep-gameforge-149-tl', '', 149, 0, 0, 71, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(456, 'Metin2 3.000 EP (Gameforge 299 TL)', 'metin2-3-000-ep-gameforge-299-tl', '', 299, 0, 0, 71, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(457, 'Point Blank 900 TG', 'point-blank-900-tg', '<p><span style=\"color:#ffffff\">.</span></p>', 5, 0, 0, 75, 0, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(458, 'Point Blank 1.800 TG', 'point-blank-1-800-tg', '<p><span style=\"color:#ffffff\">.</span></p>', 10, 0, 0, 75, 0, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(459, 'Point Blank 4.500 TG', 'point-blank-4-500-tg', '<p><span style=\"color:#ffffff\">..</span></p>', 25, 0, 0, 75, 0, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(460, 'Point Blank 10.000 + 400 Bonus TG', 'point-blank-10-000-400-bonus-tg', '<p><span style=\"color:#ffffff\">.</span></p>', 55, 0, 0, 75, 0, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(461, 'Point Blank 20.000 + 1.000 Bonus TG', 'point-blank-20-000-1-000-bonus-tg', '<p><span style=\"color:#ffffff\">.</span></p>', 110, 0, 0, 75, 0, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(462, 'İKV 500 Akçe', 'ikv-500-akce', '', 7, 0, 0, 76, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(463, 'İKV 1.000 Akçe', 'ikv-1-000-akce', '', 13, 0, 0, 76, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(464, 'İKV 2.500 Akçe', 'ikv-2-500-akce', '', 30, 0, 0, 76, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(465, 'İKV 5.500 Akçe', 'ikv-5-500-akce', '', 57, 0, 0, 76, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(466, 'İKV Çemberlitaş Paketi', 'ikv-cemberlitas-paketi', '', 35, 0, 0, 76, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(467, '150 + 15 Legend Online Elmas', '150-15-legend-online-elmas', '', 11.8, 0, 0, 77, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(468, '300 + 30 Legend Online Elmas', '300-30-legend-online-elmas', '', 23.6, 0, 0, 77, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(469, '600 + 60 Legend Online Elmas', '600-60-legend-online-elmas', '', 47.2, 0, 0, 77, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(470, '1.500 + 150 Legend Online Elmas', '1-500-150-legend-online-elmas', '', 118, 0, 0, 77, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(471, '3.000 + 300 Legend Online Elmas', '3-000-300-legend-online-elmas', '', 236, 0, 0, 77, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(472, '7.500 + 750 Legend Online Elmas', '7-500-750-legend-online-elmas', '', 590, 0, 0, 77, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(473, '30.000 Karanlık Madde (Gameforge 6 TL)', '30-000-karanlik-madde-gameforge-6-tl', '', 6, 0, 0, 79, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(474, '60.000 Karanlık Madde (Gameforge 12 TL)', '60-000-karanlik-madde-gameforge-12-tl', '', 12, 0, 0, 79, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(475, '180.000 Karanlık Madde (Gameforge 29 TL)', '180-000-karanlik-madde-gameforge-29-tl', '', 29, 0, 0, 79, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(476, '450.000 Karanlık Madde (Gameforge 59 TL)', '450-000-karanlik-madde-gameforge-59-tl', '', 59, 0, 0, 79, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(477, '1.275.000 Karanlık Madde (Gameforge 149 TL)', '1-275-000-karanlik-madde-gameforge-149-tl', '', 149, 0, 0, 79, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(479, '25 Skill Cash (Gameforge 6 TL)', '25-skill-cash-gameforge-6-tl', '', 6, 0, 0, 80, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(480, '50 Skill Cash (Gameforge 12 TL)', '50-skill-cash-gameforge-12-tl', '', 12, 0, 0, 80, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(481, '150 Skill Cash (Gameforge 29 TL)', '150-skill-cash-gameforge-29-tl', '', 29, 0, 0, 80, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(482, '350 Skill Cash (Gameforge 59 TL)', '350-skill-cash-gameforge-59-tl', '', 59, 0, 0, 80, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(483, '1.000 Skill Cash (Gameforge 149 TL)', '1-000-skill-cash-gameforge-149-tl', '', 149, 0, 0, 80, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(484, '2.500 Skill Cash (Gameforge 299 TL)', '2-500-skill-cash-gameforge-299-tl', '', 299, 0, 0, 80, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(485, 'RigorZ 2.000 GC', 'rigorz-2-000-gc', '', 10, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(486, 'RigorZ 6.000 GC', 'rigorz-6-000-gc', '', 20, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(487, 'RigorZ 10.000 GC', 'rigorz-10-000-gc', '', 30, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(488, 'RigorZ 14.000 GC', 'rigorz-14-000-gc', '', 40, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(489, 'RigorZ 18.000 GC', 'rigorz-18-000-gc', '', 50, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(490, 'RigorZ 36.000 GC', 'rigorz-36-000-gc', '', 100, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(491, 'RigorZ 1 Günlük VIP Kartı', 'rigorz-1-gunluk-vip-karti', '', 2, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(492, 'RigorZ 7 Günlük Premium + 2.500 GC', 'rigorz-7-gunluk-premium-2-500-gc', '', 10, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(493, 'RigorZ 30 Günlük Premium + 15.000 GC', 'rigorz-30-gunluk-premium-15-000-gc', '', 30, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(494, 'RigorZ 7 Günlük VIP Kartı', 'rigorz-7-gunluk-vip-karti', '', 11, 0, 0, 81, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(495, '20 First Blood Altını', '20-first-blood-altini', '', 1.18, 0, 0, 85, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(496, '100 First Blood Altını', '100-first-blood-altini', '', 5.9, 0, 0, 85, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(497, '200 First Blood Altını', '200-first-blood-altini', '', 11.8, 0, 0, 85, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(498, '400 First Blood Altını', '400-first-blood-altini', '', 23.6, 0, 0, 85, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(499, '1.000 First Blood Altını', '1-000-first-blood-altini', '', 59, 0, 0, 85, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(500, '2.000 First Blood Altını', '2-000-first-blood-altini', '', 118, 0, 0, 85, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(501, 'Netflix 1 Aylık Üyelik', 'netflix-1-aylik-uyelik', '<p>Sipariş sonrası &quot;Siparişlerim&quot; b&ouml;l&uuml;m&uuml;ne girerek size &ouml;zel oluşturulan Netflix Kullanıcı ve Şifresiyle 1 Aylık Netflix aboneliğine sahip olucaksınız.&nbsp;</p>\r\n\r\n<p>1 Aylık s&uuml;re sonrası tekrar &uuml;yelik almak isterseniz yeniden bir sipariş ge&ccedil;erek yeni bir kullanıcı ve şifresi edinmelisiniz.</p>', 5, 0, 0, 59, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(502, 'Spotify 3 Aylık Premium Üyeliği', 'spotify-3-aylik-premium-uyeligi', '<p>Sipariş sonrası &quot;Siparişlerim&quot; b&ouml;l&uuml;m&uuml;ne girerek size &ouml;zel oluşturulan Spotify Kullanıcı ve Şifresiyle 1 Aylık Spotify aboneliğine sahip olucaksınız.&nbsp;</p>\r\n\r\n<p>3 Aylık s&uuml;re sonrası tekrar &uuml;yelik almak isterseniz yeniden bir sipariş ge&ccedil;erek yeni bir kullanıcı ve şifresi edinmelisiniz.</p>', 5, 0, 0, 60, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(503, '3 Aylık BluTv Üyelik', '3-aylik-blutv-uyelik', '', 49, 0, 0, 61, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0),
(504, '6 Aylık BluTv Üyelik', '6-aylik-blutv-uyelik', '', 86, 0, 0, 61, 1, NULL, 0, '0', '0', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` text COLLATE utf8_turkish_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diger_ayarlar`
--

CREATE TABLE `diger_ayarlar` (
  `id` int(11) NOT NULL,
  `PAYTR_MERCHANT_ID` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `PAYTR_MERCHANT_KEY` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `PAYTR_MERCHANT_SALT` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `GPAY_USERNAME` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `GPAY_KEY` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `BAYII_INDIRIMI` int(11) NOT NULL,
  `EKSTRA_SCRIPT` text COLLATE utf8_turkish_ci NOT NULL,
  `TEMPO_POKER_API_KEY` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `TURN_POKER_API_KEY` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `ENJOY_POKER_API_KEY` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `FACEBOOK_APP_GRAPH_VERSION` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `FACEBOOK_API_SECRET` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `FACEBOOK_API_ID` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `MAIL_ADRES` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `MAIL_SIFRE` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CHIPCIN_EMAIL` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CHIPCIN_SIFRE` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SHOPIER_API_KEY` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `SHOPIER_API_SECRET` text COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `diger_ayarlar`
--

INSERT INTO `diger_ayarlar` (`id`, `PAYTR_MERCHANT_ID`, `PAYTR_MERCHANT_KEY`, `PAYTR_MERCHANT_SALT`, `GPAY_USERNAME`, `GPAY_KEY`, `BAYII_INDIRIMI`, `EKSTRA_SCRIPT`, `TEMPO_POKER_API_KEY`, `TURN_POKER_API_KEY`, `ENJOY_POKER_API_KEY`, `FACEBOOK_APP_GRAPH_VERSION`, `FACEBOOK_API_SECRET`, `FACEBOOK_API_ID`, `MAIL_ADRES`, `MAIL_SIFRE`, `CHIPCIN_EMAIL`, `CHIPCIN_SIFRE`, `SHOPIER_API_KEY`, `SHOPIER_API_SECRET`) VALUES
(1, '136751', 'NpuCmXQLZKkMnBF5', 'C7A9RtBZhCNLnhor', '', '', 3, '<!--Start of Tawk.to Script-->', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `duyuru` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `duyurular`
--

INSERT INTO `duyurular` (`id`, `duyuru`) VALUES
(18, 'Önce ÜYE OL - Sonrasında GİRİŞ YAP - BAKİYE YÜKLE ve Yüklediğin Bakiye Kadar Alışveriş Yap'),
(17, 'Alışveriş yapabilmek için öncelikle ÜYE OL \'manız ve sonrasında ÜYE GİRİŞİ yapmanız gerekmektedir');

-- --------------------------------------------------------

--
-- Table structure for table `genel_ayarlar`
--

CREATE TABLE `genel_ayarlar` (
  `id` int(11) NOT NULL,
  `hakkimizda_metni` text COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_kategori_listeleme_basligi` text COLLATE utf8_turkish_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `masabulucu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adres` text CHARACTER SET latin1 NOT NULL,
  `anasayfa_yazi_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_yazi` text COLLATE utf8_turkish_ci NOT NULL,
  `meta_description` text COLLATE utf8_turkish_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '#',
  `instagram_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '#',
  `twitter_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '#'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `genel_ayarlar`
--

INSERT INTO `genel_ayarlar` (`id`, `hakkimizda_metni`, `anasayfa_kategori_listeleme_basligi`, `skype`, `telefon`, `masabulucu`, `adres`, `anasayfa_yazi_baslik`, `anasayfa_yazi`, `meta_description`, `meta_keywords`, `site_title`, `facebook_url`, `instagram_url`, `twitter_url`) VALUES
(1, '<p><a href=\"https://www.uyegram.com/hakkimizda\"><span style=\"color:#ffffff\">Hakkımızda</span></a></p>\r\n\r\n<p><a href=\"https://www.uyegram.com/iade\"><span style=\"color:#ffffff\">İade Ve Değişim</span></a></p>\r\n\r\n<p><a href=\"https://www.uyegram.com/sifremi-unuttum\"><span style=\"color:#ffffff\">Şifremi Unuttum</span></a></p>\r\n\r\n<p><a href=\"https://www.uyegram.com/iletisim\"><span style=\"color:#ffffff\">İletişim</span></a></p>', 'ÇOK SATANLAR', '#', '0850 123 45 67', '#', '2019', '', '', 'Türkiye \'nin En İyi Dijital Üyelik ve Epin Satış Platformu', 'Türkiye \'nin En İyi Dijital Üyelik ve Epin Satış Platformu', 'Türkiye \'nin En İyi Dijital Üyelik ve Epin Satış Platformu', 'https://www.facebook.com/#', 'https://www.instagram.com/#', 'https://twitter.com/#');

-- --------------------------------------------------------

--
-- Table structure for table `hareketler`
--

CREATE TABLE `hareketler` (
  `id` int(11) NOT NULL,
  `hareket_tipi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uye_id` int(11) NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ek` text COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `hareketler`
--

INSERT INTO `hareketler` (`id`, `hareket_tipi`, `uye_id`, `tarih`, `ek`) VALUES
(1, 'giris', 10, '16.03.2019 02:39', '{\"giris_tarihi\":\"16.03.2019 02:39\"}'),
(2, 'giris', 10, '16.03.2019 02:51', '{\"giris_tarihi\":\"16.03.2019 02:51\"}'),
(3, 'giris', 10, '16.03.2019 02:51', '{\"giris_tarihi\":\"16.03.2019 02:51\"}'),
(4, 'giris', 10, '16.03.2019 23:42', '{\"giris_tarihi\":\"16.03.2019 23:42\"}'),
(5, 'giris', 10, '16.03.2019 23:42', '{\"giris_tarihi\":\"16.03.2019 23:42\"}'),
(6, 'siparis', 10, '16.03.2019 23:59', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(7, 'siparis', 10, '16.03.2019 23:59', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(8, 'siparis', 10, '17.03.2019 00:01', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(9, 'giris', 10, '17.03.2019 00:35', '{\"giris_tarihi\":\"17.03.2019 00:35\"}'),
(10, 'siparis', 10, '17.03.2019 00:38', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(11, 'giris', 10, '17.03.2019 18:52', '{\"giris_tarihi\":\"17.03.2019 18:52\"}'),
(12, 'siparis', 10, '17.03.2019 18:53', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(13, 'giris', 617, '17.03.2019 19:16', '{\"giris_tarihi\":\"17.03.2019 19:16\"}'),
(14, 'giris', 10, '17.03.2019 19:18', '{\"giris_tarihi\":\"17.03.2019 19:18\"}'),
(15, 'siparis', 10, '17.03.2019 20:02', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(16, 'giris', 10, '17.03.2019 20:22', '{\"giris_tarihi\":\"17.03.2019 20:22\"}'),
(17, 'giris', 10, '17.03.2019 22:26', '{\"giris_tarihi\":\"17.03.2019 22:26\"}'),
(18, 'giris', 618, '17.03.2019 22:50', '{\"giris_tarihi\":\"17.03.2019 22:50\"}'),
(19, 'giris', 619, '18.03.2019 00:31', '{\"giris_tarihi\":\"18.03.2019 00:31\"}'),
(20, 'giris', 619, '19.03.2019 09:56', '{\"giris_tarihi\":\"19.03.2019 09:56\"}'),
(21, 'giris', 619, '19.03.2019 15:58', '{\"giris_tarihi\":\"19.03.2019 15:58\"}'),
(22, 'giris', 10, '19.03.2019 17:14', '{\"giris_tarihi\":\"19.03.2019 17:14\"}'),
(23, 'giris', 619, '19.03.2019 20:22', '{\"giris_tarihi\":\"19.03.2019 20:22\"}'),
(24, 'giris', 619, '19.03.2019 20:38', '{\"giris_tarihi\":\"19.03.2019 20:38\"}'),
(25, 'giris', 10, '19.03.2019 20:39', '{\"giris_tarihi\":\"19.03.2019 20:39\"}'),
(26, 'giris', 10, '19.03.2019 20:39', '{\"giris_tarihi\":\"19.03.2019 20:39\"}'),
(27, 'siparis', 10, '19.03.2019 20:53', '{\"urun_id\":\"354\",\"urun_tipi\":\"Game Card\",\"adet\":\"1\",\"toplam_fiyat\":12}'),
(28, 'siparis', 619, '19.03.2019 20:55', '{\"urun_id\":\"354\",\"urun_tipi\":\"Game Card\",\"adet\":\"1\",\"toplam_fiyat\":12}'),
(29, 'siparis', 619, '19.03.2019 21:22', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(30, 'giris', 619, '20.03.2019 09:11', '{\"giris_tarihi\":\"20.03.2019 09:11\"}'),
(31, 'giris', 619, '20.03.2019 12:47', '{\"giris_tarihi\":\"20.03.2019 12:47\"}'),
(32, 'giris', 619, '20.03.2019 12:48', '{\"giris_tarihi\":\"20.03.2019 12:48\"}'),
(33, 'giris', 10, '20.03.2019 12:48', '{\"giris_tarihi\":\"20.03.2019 12:48\"}'),
(34, 'giris', 619, '20.03.2019 12:48', '{\"giris_tarihi\":\"20.03.2019 12:48\"}'),
(35, 'giris', 10, '20.03.2019 12:48', '{\"giris_tarihi\":\"20.03.2019 12:48\"}'),
(36, 'giris', 619, '20.03.2019 12:49', '{\"giris_tarihi\":\"20.03.2019 12:49\"}'),
(37, 'payment_paytr', 10, '20.03.2019 12:50', '{\"status\":\"success\",\"amount\":200}'),
(38, 'payment_paytr', 619, '20.03.2019 12:51', '{\"status\":\"success\",\"amount\":50}'),
(39, 'giris', 10, '20.03.2019 12:53', '{\"giris_tarihi\":\"20.03.2019 12:53\"}'),
(40, 'payment_paytr', 10, '20.03.2019 13:37', '{\"status\":\"success\",\"amount\":50}'),
(41, 'giris', 619, '20.03.2019 14:42', '{\"giris_tarihi\":\"20.03.2019 14:42\"}'),
(42, 'payment_paytr', 619, '20.03.2019 15:00', '{\"status\":\"success\",\"amount\":50}'),
(43, 'giris', 619, '21.03.2019 10:03', '{\"giris_tarihi\":\"21.03.2019 10:03\"}'),
(44, 'giris', 10, '21.03.2019 12:21', '{\"giris_tarihi\":\"21.03.2019 12:21\"}'),
(45, 'giris', 619, '21.03.2019 15:11', '{\"giris_tarihi\":\"21.03.2019 15:11\"}'),
(46, 'siparis', 619, '21.03.2019 15:33', '{\"urun_id\":\"355\",\"urun_tipi\":\"Game Card\",\"adet\":\"1\",\"toplam_fiyat\":1}'),
(47, 'siparis', 619, '21.03.2019 15:35', '{\"urun_id\":\"355\",\"urun_tipi\":\"Game Card\",\"adet\":\"1\",\"toplam_fiyat\":1}'),
(48, 'giris', 619, '22.03.2019 13:53', '{\"giris_tarihi\":\"22.03.2019 13:53\"}'),
(49, 'giris', 619, '23.03.2019 21:05', '{\"giris_tarihi\":\"23.03.2019 21:05\"}'),
(50, 'giris', 10, '25.03.2019 12:42', '{\"giris_tarihi\":\"25.03.2019 12:42\"}'),
(51, 'giris', 619, '25.03.2019 23:48', '{\"giris_tarihi\":\"25.03.2019 23:48\"}'),
(52, 'siparis', 619, '26.03.2019 00:03', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":50}'),
(53, 'siparis', 619, '26.03.2019 00:04', '{\"urun_id\":\"353\",\"urun_tipi\":\"Normal\",\"adet\":\"3\",\"toplam_fiyat\":150}'),
(54, 'giris', 619, '26.03.2019 00:24', '{\"giris_tarihi\":\"26.03.2019 00:24\"}'),
(55, 'giris', 10, '26.03.2019 14:14', '{\"giris_tarihi\":\"26.03.2019 14:14\"}'),
(56, 'giris', 618, '26.03.2019 18:12', '{\"giris_tarihi\":\"26.03.2019 18:12\"}'),
(57, 'giris', 10, '26.03.2019 18:53', '{\"giris_tarihi\":\"26.03.2019 18:53\"}'),
(58, 'giris', 10, '27.03.2019 15:39', '{\"giris_tarihi\":\"27.03.2019 15:39\"}'),
(59, 'siparis', 10, '27.03.2019 15:39', '{\"urun_id\":\"361\",\"urun_tipi\":\"Game Card\",\"adet\":\"1\",\"toplam_fiyat\":0.1000000000000000055511151231257827021181583404541015625}'),
(60, 'giris', 619, '27.03.2019 22:11', '{\"giris_tarihi\":\"27.03.2019 22:11\"}'),
(61, 'giris', 618, '27.03.2019 22:11', '{\"giris_tarihi\":\"27.03.2019 22:11\"}'),
(62, 'giris', 10, '27.03.2019 23:53', '{\"giris_tarihi\":\"27.03.2019 23:53\"}'),
(63, 'giris', 619, '28.03.2019 10:01', '{\"giris_tarihi\":\"28.03.2019 10:01\"}'),
(64, 'giris', 618, '28.03.2019 10:40', '{\"giris_tarihi\":\"28.03.2019 10:40\"}'),
(65, 'giris', 618, '28.03.2019 12:28', '{\"giris_tarihi\":\"28.03.2019 12:28\"}'),
(66, 'giris', 619, '28.03.2019 13:09', '{\"giris_tarihi\":\"28.03.2019 13:09\"}'),
(67, 'giris', 618, '28.03.2019 17:15', '{\"giris_tarihi\":\"28.03.2019 17:15\"}'),
(68, 'giris', 10, '01.04.2019 11:36', '{\"giris_tarihi\":\"01.04.2019 11:36\"}'),
(69, 'giris', 619, '03.04.2019 18:18', '{\"giris_tarihi\":\"03.04.2019 18:18\"}'),
(70, 'giris', 619, '07.04.2019 20:14', '{\"giris_tarihi\":\"07.04.2019 20:14\"}'),
(71, 'giris', 10, '23.04.2019 17:39', '{\"giris_tarihi\":\"23.04.2019 17:39\"}'),
(72, 'giris', 10, '29.04.2019 01:09', '{\"giris_tarihi\":\"29.04.2019 01:09\"}'),
(73, 'giris', 620, '29.04.2019 01:36', '{\"giris_tarihi\":\"29.04.2019 01:36\"}'),
(74, 'giris', 620, '29.04.2019 12:48', '{\"giris_tarihi\":\"29.04.2019 12:48\"}'),
(75, 'giris', 620, '29.04.2019 13:20', '{\"giris_tarihi\":\"29.04.2019 13:20\"}'),
(76, 'giris', 620, '29.04.2019 13:21', '{\"giris_tarihi\":\"29.04.2019 13:21\"}'),
(77, 'giris', 620, '29.04.2019 13:28', '{\"giris_tarihi\":\"29.04.2019 13:28\"}'),
(78, 'giris', 10, '29.04.2019 14:25', '{\"giris_tarihi\":\"29.04.2019 14:25\"}'),
(79, 'giris', 620, '29.04.2019 14:31', '{\"giris_tarihi\":\"29.04.2019 14:31\"}'),
(80, 'giris', 620, '29.04.2019 18:54', '{\"giris_tarihi\":\"29.04.2019 18:54\"}'),
(81, 'giris', 620, '30.04.2019 03:14', '{\"giris_tarihi\":\"30.04.2019 03:14\"}'),
(82, 'siparis', 620, '30.04.2019 03:16', '{\"urun_id\":\"401\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":13}'),
(83, 'giris', 620, '03.05.2019 03:01', '{\"giris_tarihi\":\"03.05.2019 03:01\"}'),
(84, 'siparis', 620, '03.05.2019 03:06', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":22}'),
(85, 'payment_paytr', 620, '03.05.2019 03:34', '{\"status\":\"error\",\"amount\":null}'),
(86, 'giris', 620, '06.05.2019 17:09', '{\"giris_tarihi\":\"06.05.2019 17:09\"}'),
(87, 'giris', 620, '06.05.2019 17:13', '{\"giris_tarihi\":\"06.05.2019 17:13\"}'),
(88, 'giris', 620, '06.05.2019 17:14', '{\"giris_tarihi\":\"06.05.2019 17:14\"}'),
(89, 'giris', 620, '06.05.2019 18:13', '{\"giris_tarihi\":\"06.05.2019 18:13\"}'),
(90, 'giris', 10, '13.05.2019 14:02', '{\"giris_tarihi\":\"13.05.2019 14:02\"}'),
(91, 'giris', 10, '13.05.2019 16:20', '{\"giris_tarihi\":\"13.05.2019 16:20\"}'),
(92, 'giris', 10, '13.05.2019 16:25', '{\"giris_tarihi\":\"13.05.2019 16:25\"}'),
(93, 'siparis', 10, '13.05.2019 16:29', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":22}'),
(94, 'siparis', 10, '13.05.2019 17:45', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(95, 'giris', 10, '13.05.2019 17:54', '{\"giris_tarihi\":\"13.05.2019 17:54\"}'),
(96, 'giris', 10, '13.05.2019 20:46', '{\"giris_tarihi\":\"13.05.2019 20:46\"}'),
(97, 'giris', 10, '13.05.2019 23:02', '{\"giris_tarihi\":\"13.05.2019 23:02\"}'),
(98, 'siparis', 10, '13.05.2019 23:13', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(99, 'siparis', 10, '13.05.2019 23:52', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(100, 'siparis', 10, '13.05.2019 23:52', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(101, 'siparis', 10, '13.05.2019 23:54', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(102, 'siparis', 10, '13.05.2019 23:55', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(103, 'siparis', 10, '13.05.2019 23:55', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(104, 'siparis', 10, '13.05.2019 23:55', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(105, 'siparis', 10, '13.05.2019 23:56', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(106, 'siparis', 10, '13.05.2019 23:57', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(107, 'siparis', 10, '13.05.2019 23:58', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(108, 'siparis', 10, '14.05.2019 00:00', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(109, 'giris', 10, '14.05.2019 00:04', '{\"giris_tarihi\":\"14.05.2019 00:04\"}'),
(110, 'siparis', 10, '14.05.2019 00:04', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(111, 'siparis', 10, '14.05.2019 00:05', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(112, 'siparis', 10, '14.05.2019 00:05', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(113, 'siparis', 10, '14.05.2019 00:06', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(114, 'siparis', 10, '14.05.2019 00:10', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(115, 'siparis', 10, '14.05.2019 00:11', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(116, 'siparis', 10, '14.05.2019 00:12', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(117, 'siparis', 10, '14.05.2019 00:12', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(118, 'siparis', 10, '14.05.2019 00:12', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(119, 'siparis', 10, '14.05.2019 00:13', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(120, 'siparis', 10, '14.05.2019 00:13', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(121, 'siparis', 10, '14.05.2019 00:14', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(122, 'siparis', 10, '14.05.2019 00:14', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(123, 'siparis', 10, '14.05.2019 00:14', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(124, 'siparis', 10, '14.05.2019 00:15', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(125, 'siparis', 10, '14.05.2019 00:16', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(126, 'siparis', 10, '14.05.2019 00:16', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(127, 'siparis', 10, '14.05.2019 00:18', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(128, 'giris', 10, '13.06.2019 15:13', '{\"giris_tarihi\":\"13.06.2019 15:13\"}'),
(129, 'siparis', 10, '13.06.2019 15:42', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(130, 'siparis', 10, '13.06.2019 15:42', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(131, 'siparis', 10, '13.06.2019 15:46', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(132, 'giris', 10, '13.06.2019 16:07', '{\"giris_tarihi\":\"13.06.2019 16:07\"}'),
(133, 'giris', 10, '13.06.2019 16:29', '{\"giris_tarihi\":\"13.06.2019 16:29\"}'),
(134, 'giris', 10, '13.06.2019 16:44', '{\"giris_tarihi\":\"13.06.2019 16:44\"}'),
(135, 'giris', 10, '13.06.2019 19:38', '{\"giris_tarihi\":\"13.06.2019 19:38\"}'),
(136, 'siparis', 10, '13.06.2019 19:39', '{\"urun_id\":\"406\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":20}'),
(137, 'giris', 10, '14.06.2019 00:24', '{\"giris_tarihi\":\"14.06.2019 00:24\"}'),
(138, 'giris', 10, '14.06.2019 00:46', '{\"giris_tarihi\":\"14.06.2019 00:46\"}'),
(139, 'giris', 10, '14.06.2019 00:47', '{\"giris_tarihi\":\"14.06.2019 00:47\"}'),
(140, 'giris', 10, '14.06.2019 01:53', '{\"giris_tarihi\":\"14.06.2019 01:53\"}'),
(141, 'giris', 621, '14.06.2019 18:44', '{\"giris_tarihi\":\"14.06.2019 18:44\"}'),
(142, 'giris', 10, '14.06.2019 20:01', '{\"giris_tarihi\":\"14.06.2019 20:01\"}'),
(143, 'giris', 627, '17.06.2019 15:15', '{\"giris_tarihi\":\"17.06.2019 15:15\"}'),
(144, 'giris', 10, '17.06.2019 16:44', '{\"giris_tarihi\":\"17.06.2019 16:44\"}'),
(145, 'giris', 10, '17.06.2019 18:03', '{\"giris_tarihi\":\"17.06.2019 18:03\"}'),
(146, 'giris', 10, '17.06.2019 21:25', '{\"giris_tarihi\":\"17.06.2019 21:25\"}'),
(147, 'giris', 10, '17.06.2019 21:38', '{\"giris_tarihi\":\"17.06.2019 21:38\"}'),
(148, 'giris', 10, '18.06.2019 00:34', '{\"giris_tarihi\":\"18.06.2019 00:34\"}'),
(149, 'giris', 10, '18.06.2019 00:35', '{\"giris_tarihi\":\"18.06.2019 00:35\"}'),
(150, 'giris', 10, '18.06.2019 13:24', '{\"giris_tarihi\":\"18.06.2019 13:24\"}'),
(151, 'giris', 10, '18.06.2019 13:32', '{\"giris_tarihi\":\"18.06.2019 13:32\"}'),
(152, 'giris', 10, '18.06.2019 15:10', '{\"giris_tarihi\":\"18.06.2019 15:10\"}'),
(153, 'giris', 10, '19.06.2019 13:27', '{\"giris_tarihi\":\"19.06.2019 13:27\"}'),
(154, 'payment_paytr', 10, '19.06.2019 13:47', '{\"status\":\"success\",\"amount\":1}'),
(155, 'giris', 10, '19.06.2019 14:21', '{\"giris_tarihi\":\"19.06.2019 14:21\"}'),
(156, 'giris', 10, '19.06.2019 14:24', '{\"giris_tarihi\":\"19.06.2019 14:24\"}'),
(157, 'payment_paytr', 10, '19.06.2019 14:29', '{\"status\":\"success\",\"amount\":1}'),
(158, 'giris', 10, '19.06.2019 15:50', '{\"giris_tarihi\":\"19.06.2019 15:50\"}'),
(159, 'giris', 10, '19.06.2019 17:03', '{\"giris_tarihi\":\"19.06.2019 17:03\"}'),
(160, 'giris', 10, '19.06.2019 17:51', '{\"giris_tarihi\":\"19.06.2019 17:51\"}'),
(161, 'giris', 10, '19.06.2019 19:48', '{\"giris_tarihi\":\"19.06.2019 19:48\"}'),
(162, 'giris', 10, '20.06.2019 02:19', '{\"giris_tarihi\":\"20.06.2019 02:19\"}'),
(163, 'giris', 10, '20.06.2019 12:57', '{\"giris_tarihi\":\"20.06.2019 12:57\"}'),
(164, 'giris', 10, '20.06.2019 20:47', '{\"giris_tarihi\":\"20.06.2019 20:47\"}'),
(165, 'giris', 10, '30.07.2019 17:55', '{\"giris_tarihi\":\"30.07.2019 17:55\"}'),
(166, 'giris', 623, '03.10.2019 11:07', '{\"giris_tarihi\":\"03.10.2019 11:07\"}'),
(167, 'siparis', 623, '03.10.2019 11:07', '{\"urun_id\":\"503\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":49}'),
(168, 'giris', 623, '03.10.2019 11:08', '{\"giris_tarihi\":\"03.10.2019 11:08\"}'),
(169, 'giris', 623, '03.10.2019 11:09', '{\"giris_tarihi\":\"03.10.2019 11:09\"}'),
(170, 'giris', 10, '03.10.2019 11:15', '{\"giris_tarihi\":\"03.10.2019 11:15\"}'),
(171, 'siparis', 10, '03.10.2019 11:15', '{\"urun_id\":\"503\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":49}'),
(172, 'giris', 10, '03.10.2019 11:47', '{\"giris_tarihi\":\"03.10.2019 11:47\"}'),
(173, 'giris', 623, '16.11.2019 10:15', '{\"giris_tarihi\":\"16.11.2019 10:15\"}'),
(174, 'giris', 10, '05.12.2019 20:58', '{\"giris_tarihi\":\"05.12.2019 20:58\"}'),
(175, 'siparis', 10, '05.12.2019 20:58', '{\"urun_id\":\"502\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":5}'),
(176, 'giris', 628, '05.12.2019 22:28', '{\"giris_tarihi\":\"05.12.2019 22:28\"}'),
(177, 'siparis', 628, '05.12.2019 22:28', '{\"urun_id\":\"425\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":3}'),
(178, 'siparis', 628, '05.12.2019 22:29', '{\"urun_id\":\"453\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":29}'),
(179, 'giris', 623, '31.01.2020 12:40', '{\"giris_tarihi\":\"31.01.2020 12:40\"}'),
(180, 'giris', 10, '31.01.2020 12:41', '{\"giris_tarihi\":\"31.01.2020 12:41\"}'),
(181, 'giris', 10, '31.01.2020 12:55', '{\"giris_tarihi\":\"31.01.2020 12:55\"}'),
(182, 'giris', 10, '10.07.2020 09:27', '{\"giris_tarihi\":\"10.07.2020 09:27\"}'),
(183, 'giris', 623, '13.07.2020 15:35', '{\"giris_tarihi\":\"13.07.2020 15:35\"}'),
(184, 'siparis', 623, '13.07.2020 15:36', '{\"urun_id\":\"502\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":5}'),
(185, 'giris', 10, '13.07.2020 15:37', '{\"giris_tarihi\":\"13.07.2020 15:37\"}'),
(186, 'giris', 10, '13.07.2020 15:40', '{\"giris_tarihi\":\"13.07.2020 15:40\"}'),
(187, 'giris', 623, '13.07.2020 15:43', '{\"giris_tarihi\":\"13.07.2020 15:43\"}'),
(188, 'siparis', 623, '13.07.2020 15:43', '{\"urun_id\":\"495\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":1.18}'),
(189, 'siparis', 623, '13.07.2020 15:43', '{\"urun_id\":\"411\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":12}'),
(190, 'giris', 623, '22.07.2020 22:07', '{\"giris_tarihi\":\"22.07.2020 22:07\"}'),
(191, 'giris', 623, '05.10.2020 08:19', '{\"giris_tarihi\":\"05.10.2020 08:19\"}'),
(192, 'siparis', 623, '05.10.2020 08:20', '{\"urun_id\":\"417\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":3.1}'),
(193, 'giris', 10, '05.10.2020 08:21', '{\"giris_tarihi\":\"05.10.2020 08:21\"}'),
(194, 'giris', 10, '05.10.2020 08:33', '{\"giris_tarihi\":\"05.10.2020 08:33\"}'),
(195, 'giris', 10, '05.10.2020 08:40', '{\"giris_tarihi\":\"05.10.2020 08:40\"}'),
(196, 'giris', 10, '13.11.2020 21:40', '{\"giris_tarihi\":\"13.11.2020 21:40\"}'),
(197, 'siparis', 10, '13.11.2020 21:54', '{\"urun_id\":\"498\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":23.6}'),
(198, 'giris', 623, '02.12.2020 12:58', '{\"giris_tarihi\":\"02.12.2020 12:58\"}'),
(199, 'giris', 623, '02.12.2020 15:31', '{\"giris_tarihi\":\"02.12.2020 15:31\"}'),
(200, 'giris', 629, '22.05.2021 15:32', '{\"giris_tarihi\":\"22.05.2021 15:32\"}'),
(201, 'siparis', 629, '22.05.2021 15:52', '{\"urun_id\":\"503\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":49}'),
(202, 'giris', 10, '20.08.2021 23:34', '{\"giris_tarihi\":\"20.08.2021 23:34\"}'),
(203, 'giris', 10, '10.12.2021 10:56', '{\"giris_tarihi\":\"10.12.2021 10:56\"}'),
(204, 'siparis', 10, '10.12.2021 10:57', '{\"urun_id\":\"502\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":5}'),
(205, 'giris', 10, '10.12.2021 14:05', '{\"giris_tarihi\":\"10.12.2021 14:05\"}'),
(206, 'giris', 10, '10.12.2021 14:20', '{\"giris_tarihi\":\"10.12.2021 14:20\"}'),
(207, 'giris', 10, '10.12.2021 15:07', '{\"giris_tarihi\":\"10.12.2021 15:07\"}'),
(208, 'giris', 10, '23.12.2021 23:06', '{\"giris_tarihi\":\"23.12.2021 23:06\"}'),
(209, 'giris', 623, '24.12.2021 15:00', '{\"giris_tarihi\":\"24.12.2021 15:00\"}'),
(210, 'giris', 10, '24.12.2021 15:00', '{\"giris_tarihi\":\"24.12.2021 15:00\"}'),
(211, 'giris', 10, '19.02.2022 02:57', '{\"giris_tarihi\":\"19.02.2022 02:57\"}'),
(212, 'giris', 10, '19.02.2022 02:58', '{\"giris_tarihi\":\"19.02.2022 02:58\"}'),
(213, 'giris', 623, '19.02.2022 02:59', '{\"giris_tarihi\":\"19.02.2022 02:59\"}'),
(214, 'giris', 10, '20.03.2023 01:58', '{\"giris_tarihi\":\"20.03.2023 01:58\"}'),
(215, 'giris', 630, '20.03.2023 02:37', '{\"giris_tarihi\":\"20.03.2023 02:37\"}'),
(216, 'siparis', 630, '20.03.2023 02:37', '{\"urun_id\":\"503\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":49}'),
(217, 'giris', 631, '20.03.2023 04:33', '{\"giris_tarihi\":\"20.03.2023 04:33\"}'),
(218, 'siparis', 631, '20.03.2023 04:38', '{\"urun_id\":\"495\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":1.18}'),
(219, 'giris', 632, '20.03.2023 07:53', '{\"giris_tarihi\":\"20.03.2023 07:53\"}'),
(220, 'giris', 633, '20.03.2023 10:42', '{\"giris_tarihi\":\"20.03.2023 10:42\"}'),
(221, 'siparis', 633, '20.03.2023 10:42', '{\"urun_id\":\"502\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":5}'),
(222, 'giris', 634, '20.03.2023 17:04', '{\"giris_tarihi\":\"20.03.2023 17:04\"}'),
(223, 'siparis', 634, '20.03.2023 17:04', '{\"urun_id\":\"503\",\"urun_tipi\":\"Normal\",\"adet\":\"1\",\"toplam_fiyat\":49}');

-- --------------------------------------------------------

--
-- Table structure for table `makaleler`
--

CREATE TABLE `makaleler` (
  `id` int(11) NOT NULL,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `seourl` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi` text COLLATE utf8_turkish_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `odeme_bildirimleri`
--

CREATE TABLE `odeme_bildirimleri` (
  `id` int(11) NOT NULL,
  `banka_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `odeme_yapan_kisi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `miktar` float NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_api`
--

CREATE TABLE `pay_api` (
  `id` int(11) NOT NULL,
  `trade_code` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `uye_id` int(11) NOT NULL DEFAULT 0,
  `tutar` float NOT NULL DEFAULT 0,
  `komisyon` int(11) NOT NULL DEFAULT 0,
  `durum` int(11) NOT NULL DEFAULT 2,
  `api_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `pay_api`
--

INSERT INTO `pay_api` (`id`, `trade_code`, `uye_id`, `tutar`, `komisyon`, `durum`, `api_type`, `created_at`) VALUES
(1, '554618a9b4', 10, 1, 0, 0, 'paytr', '2019-06-19 10:28:48'),
(2, '51ffb14eeb', 10, 1, 0, 1, 'paytr', '2019-06-19 10:46:50'),
(3, '758cd49ee2', 10, 1, 0, 1, 'paytr', '2019-06-19 11:26:12'),
(4, '3ac7aea348', 10, 5, 0, 0, 'paytr', '2019-10-03 08:48:03'),
(5, 'f5613e1899', 10, 100, 0, 0, 'paytr', '2019-10-03 08:51:04'),
(6, '86e4d99a39', 10, 100, 0, 0, 'paytr', '2019-10-03 08:52:25'),
(7, 'e7c3e13816', 10, 100, 0, 0, 'paytr', '2019-10-03 09:00:53'),
(8, '3606cf6236', 628, 5, 0, 0, 'paytr', '2019-12-05 19:30:10'),
(9, 'f46c8de5ee', 10, 54, 2, 0, 'paytr', '2020-11-13 18:41:27'),
(10, '3805f5e76f', 629, 5, 0, 0, 'paytr', '2021-05-22 12:32:48'),
(11, '613a59c1f4', 631, 10, 0, 2, 'paytr', '2023-03-20 01:33:55'),
(12, 'cdd08b5238', 632, 5, 0, 2, 'paytr', '2023-03-20 04:54:04'),
(13, '5284579d45', 634, 5, 0, 2, 'paytr', '2023-03-20 14:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `islem_no` varchar(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `bayi` int(11) NOT NULL DEFAULT 0,
  `urun_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `chipcin_pid` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adet` int(11) NOT NULL,
  `odenen_tutar` float NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `api_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_aciklama` text COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `siparisler`
--

INSERT INTO `siparisler` (`id`, `islem_no`, `bayi`, `urun_id`, `uye_id`, `chipcin_pid`, `adet`, `odenen_tutar`, `yorum`, `durum`, `created_at`, `email`, `password`, `api_code`, `aciklama`, `musteri_aciklama`) VALUES
(7, '417995', 0, 503, 623, NULL, 1, 49, NULL, 0, '2019-10-03 08:07:19', '', '', NULL, NULL, ''),
(8, '780281', 1, 503, 10, NULL, 1, 49, NULL, 0, '2019-10-03 08:15:37', '', '', NULL, NULL, ''),
(9, '809018', 0, 502, 10, NULL, 1, 5, NULL, 0, '2019-12-05 17:58:24', '', '', NULL, NULL, ''),
(10, '519825', 0, 425, 628, NULL, 1, 3, NULL, 0, '2019-12-05 19:28:45', '', '', NULL, NULL, ''),
(11, '266887', 0, 453, 628, NULL, 1, 29, NULL, 0, '2019-12-05 19:29:47', '', '', NULL, NULL, ''),
(12, '497438', 0, 502, 623, NULL, 1, 5, NULL, 0, '2020-07-13 12:36:18', '', '', NULL, NULL, 'merhaba'),
(13, '972007', 1, 495, 623, NULL, 1, 1.18, NULL, 0, '2020-07-13 12:43:37', '', '', NULL, NULL, ''),
(14, '538221', 1, 411, 623, NULL, 1, 12, NULL, 0, '2020-07-13 12:43:53', '', '', NULL, NULL, ''),
(15, '302059', 1, 417, 623, NULL, 1, 3.1, NULL, 0, '2020-10-05 05:20:12', '', '', NULL, NULL, '...'),
(16, '548231', 0, 498, 10, NULL, 1, 23.6, NULL, 0, '2020-11-13 18:54:56', '', '', NULL, NULL, 'asd'),
(17, '334633', 0, 503, 629, NULL, 1, 49, NULL, 0, '2021-05-22 12:52:05', '', '', NULL, NULL, '554'),
(18, '859933', 0, 502, 10, NULL, 1, 5, NULL, 0, '2021-12-10 07:57:16', '', '', NULL, NULL, ''),
(19, '446600', 0, 503, 630, NULL, 1, 49, NULL, 0, '2023-03-19 23:37:29', '', '', NULL, NULL, ''),
(20, '443097', 0, 495, 631, NULL, 1, 1.18, NULL, 0, '2023-03-20 01:38:17', '', '', NULL, NULL, ''),
(21, '373608', 0, 502, 633, NULL, 1, 5, NULL, 0, '2023-03-20 07:42:21', '', '', NULL, NULL, ''),
(22, '596930', 0, 503, 634, NULL, 1, 49, NULL, 0, '2023-03-20 14:04:56', '', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `gorsel` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gorsel`) VALUES
(10, 'MTVkMDhiZTg2NzlhM2E.jpg'),
(11, 'MTVkMDhiZjIwODcwNWM.jpg'),
(12, 'MTVkMDhiZmIzYmQ3NjQ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Yok',
  `tc` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `adsoyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `bakiye` float NOT NULL DEFAULT 0,
  `vgbakiye` float NOT NULL DEFAULT 0,
  `rutbe` int(11) NOT NULL DEFAULT 0,
  `bayi` int(11) NOT NULL DEFAULT 0,
  `bayi_indirim` float NOT NULL DEFAULT 0,
  `siparis_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `trade_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook_login_token` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`id`, `email`, `password`, `phone_number`, `tc`, `created_at`, `adsoyad`, `bakiye`, `vgbakiye`, `rutbe`, `bayi`, `bayi_indirim`, `siparis_code`, `trade_code`, `facebook_login_token`, `api_key`, `last_login_ip`) VALUES
(10, 'admin@test.com', '4297f44b13955235245b2497399d7a93', '5351234567', '0', '2017-12-22 21:05:41', 'Uye Gram', 31.3, 110, 1, 0, 0, 'a1cf0a95ffb33adfb0aebc03add17a6e', 'a4da27431e', 'EAAEYTatZAISUBALuym87m2C6xvT1tRJxbZBkKbEVbdVnbZCQdcaebUkiaUNZCghp0rhPmZBAyF1P8Q1UzPpch9NDVxn6s9iugYZBZCHtnnocqBVBndZArqE9tzt3Vt9iq2uvfZBpTkS6STeT7hbssZASTW1Cy2vt4RsmYZD', '36578f9679068ab94fe1a2f314605639', '24.133.85.100'),
(623, 'uye@test.com', 'e10adc3949ba59abbe56e057f20f883e', '02131231231', '11111111111', '2019-06-14 20:33:03', 'Ahmet TEST', -71.28, 0, 0, 1, 0, '86fd320490700e33c044b4955982f379', NULL, NULL, 'b11249f69717bff0638cb8c56a0b3f51', '178.233.242.143'),
(628, 'akocak2568@gmail.com', '3d186804534370c3c817db0563f0e461', '5552344323', '11111111111', '2019-12-05 19:28:13', 'ihsan koçak', -32, 0, 0, 0, 0, '9df411058ead7fc0453a06d67362b147', NULL, NULL, '89fce95749b8ab65db70b1ff9e2cb59a', '78.176.107.242'),
(629, 'cevdetaydin5879.ca@gmail.com', '0967611fa949958749ac4aea8aef6f62', '5556665544', '11111111111', '2021-05-22 12:31:58', 'Emre Şeker', -49, 0, 0, 0, 0, '3133d62af2985fcdb1bc0b36ed396a9c', NULL, NULL, '4b4e1c55a916cf0d909303560eb24151', '178.246.230.3'),
(630, 'keremorer2017@gmail.com', '89480e573f04bddbee9db287144ee0e8', '05076789195', '11111111111', '2023-03-19 23:37:08', 'Kerem Emre Örer', -49, 0, 0, 0, 0, '1d72840fe4a3dc143cfd9bd47c4c0b1e', NULL, NULL, '4a68ec03d1ab28058940bbc35031ce53', '95.70.245.35'),
(631, 'hdsunucu@gmail.com', '12d1a2a9637c4dce205d7df26da39c70', '05322893900', '11111111111', '2023-03-20 01:33:32', 'ahmet deniz', -1.18, 0, 0, 0, 0, '71ab39f34db0d8d266178f63d4d28343', NULL, NULL, '84d9ffe7a4ea31c11fc9f4815595c1da', '195.33.247.236'),
(632, 'attila@gmail.com', '1ece337364bf81d8aa15a6c9eb8a62e3', '05445555556', '11111111111', '2023-03-20 04:53:15', 'Atilla', 0, 0, 0, 0, 0, 'f22c3fc15ec75ff43e41c03a2d776d40', NULL, NULL, 'a4733d3c627fbd66310fe5a54e04f974', '31.155.249.12'),
(633, 'bybaskanofficial@gmail.com', 'c4e73cc8a6d2147f9ed7d067b8e3220d', '05357728112', '11111111111', '2023-03-20 07:41:35', 'akmed2121', -5, 0, 0, 0, 0, '821934e9107b5f46697d17eec01a2b30', NULL, NULL, 'a76d767889519e704b65d856ec6fafa2', '37.155.148.251'),
(634, 'denemex@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '05555555555', '11111111111', '2023-03-20 14:04:06', 'denemex', -49, 0, 0, 0, 0, 'c309cbc6954e8fa748b0cc9d8170b8d8', NULL, NULL, 'd920860077c26a8c0bd6c8621e4666ae', '81.215.213.60');

-- --------------------------------------------------------

--
-- Table structure for table `yardim`
--

CREATE TABLE `yardim` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `yardim`
--

INSERT INTO `yardim` (`id`, `baslik`, `yazi`) VALUES
(1, 'test', 'testt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankalar`
--
ALTER TABLE `bankalar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayi_kategori_indirimleri`
--
ALTER TABLE `bayi_kategori_indirimleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bize_sat`
--
ALTER TABLE `bize_sat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cekim_bildirimleri`
--
ALTER TABLE `cekim_bildirimleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chip_kategoriler`
--
ALTER TABLE `chip_kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chip_urunler`
--
ALTER TABLE `chip_urunler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diger_ayarlar`
--
ALTER TABLE `diger_ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genel_ayarlar`
--
ALTER TABLE `genel_ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hareketler`
--
ALTER TABLE `hareketler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makaleler`
--
ALTER TABLE `makaleler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odeme_bildirimleri`
--
ALTER TABLE `odeme_bildirimleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_api`
--
ALTER TABLE `pay_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `islem_no` (`islem_no`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `yardim`
--
ALTER TABLE `yardim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankalar`
--
ALTER TABLE `bankalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bayi_kategori_indirimleri`
--
ALTER TABLE `bayi_kategori_indirimleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bize_sat`
--
ALTER TABLE `bize_sat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cekim_bildirimleri`
--
ALTER TABLE `cekim_bildirimleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chip_kategoriler`
--
ALTER TABLE `chip_kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `chip_urunler`
--
ALTER TABLE `chip_urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diger_ayarlar`
--
ALTER TABLE `diger_ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `genel_ayarlar`
--
ALTER TABLE `genel_ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hareketler`
--
ALTER TABLE `hareketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `makaleler`
--
ALTER TABLE `makaleler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `odeme_bildirimleri`
--
ALTER TABLE `odeme_bildirimleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pay_api`
--
ALTER TABLE `pay_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;

--
-- AUTO_INCREMENT for table `yardim`
--
ALTER TABLE `yardim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
