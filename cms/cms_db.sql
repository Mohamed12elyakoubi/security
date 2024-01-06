-- -- phpMyAdmin SQL Dump
-- -- version 5.2.0
-- -- https://www.phpmyadmin.net/
-- --
-- -- Host: 127.0.0.1
-- -- Gegenereerd op: 26 dec 2023 om 09:58
-- -- Serverversie: 10.4.27-MariaDB
-- -- PHP-versie: 8.2.0

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Database: `cms_db`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Tabelstructuur voor tabel `roles`
-- --

-- CREATE TABLE `roles` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(255) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Gegevens worden geëxporteerd voor tabel `roles`
-- --

-- INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
-- (1, 'beheerder', NULL, NULL),
-- (2, 'editor', NULL, NULL);

-- -- --------------------------------------------------------

-- --
-- -- Tabelstructuur voor tabel `users`
-- --

-- CREATE TABLE `users` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `username` varchar(255) NOT NULL,
--   `admin` tinyint(1) DEFAULT 0,
--   `email` varchar(255) NOT NULL,
--   `email_verified_at` timestamp NULL DEFAULT NULL,
--   `password` varchar(255) NOT NULL,
--   `remember_token` varchar(100) DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Gegevens worden geëxporteerd voor tabel `users`
-- --

-- INSERT INTO `users` (`id`, `username`, `admin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
-- (18, '', 0, 'jam@jam.nl', NULL, '$2y$10$V6dHvJZPArYbVvxZXuBTdO8SsCCXq1HLlnjsVfrmyq89lK3Q1etNi', NULL, NULL, NULL),
-- (28, '', 0, 'tak@tak.nl', NULL, '$2y$10$J1bNAOov3d/rgr0fGStZROqhZGNTS/sX2d0U90vDIr.YFghPjoRJG', NULL, NULL, NULL),
-- (29, '', 0, 'test', NULL, '$2y$10$tgnKpqINFXr6gPPJ8.PSSemRIlEatZIGlW4TLlcTH88lH68WU9PpW', NULL, NULL, NULL),
-- (30, '', 1, 'admin@test.nl', NULL, '$2y$10$vPdvBeaHoDINKhWoBQI1Kuv6H1l082xfi4LpQNnIb5qD35N/55fUO', NULL, NULL, NULL);

-- --
-- -- Indexen voor geëxporteerde tabellen
-- --

-- --
-- -- Indexen voor tabel `roles`
-- --
-- ALTER TABLE `roles`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexen voor tabel `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `users_email_unique` (`email`);

-- --
-- -- AUTO_INCREMENT voor geëxporteerde tabellen
-- --

-- --
-- -- AUTO_INCREMENT voor een tabel `roles`
-- --
-- ALTER TABLE `roles`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --
-- -- AUTO_INCREMENT voor een tabel `users`
-- --
-- ALTER TABLE `users`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
