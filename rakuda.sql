-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 10 月 09 日 14:04
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `rakuda`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `constructions`
--

CREATE TABLE `constructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '工事名',
  `order_value` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '発注額',
  `cost_price` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '原価',
  `PDF` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comp_day` date NOT NULL COMMENT '工事完了日',
  `mansion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `constructions`
--

INSERT INTO `constructions` (`id`, `room_number`, `name`, `order_value`, `cost_price`, `PDF`, `comp_day`, `mansion_id`, `created_at`, `updated_at`) VALUES
(1, 101, '原状回復工事', '35,000', '25,000', 'S0Kcx9CbKTcr7b4ix0tWvkKkyCG7H5WvkAZbkk4F.pdf', '2022-10-01', 1, '2022-10-06 03:07:56', '2022-10-06 03:07:56');

-- --------------------------------------------------------

--
-- テーブルの構造 `contractors`
--

CREATE TABLE `contractors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mansion_id` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL COMMENT '号室',
  `start` date DEFAULT NULL COMMENT '契約開始日',
  `end` date DEFAULT NULL COMMENT '契約終了日',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '契約者名',
  `birth` date DEFAULT NULL COMMENT '生年月日',
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '性別',
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '住所',
  `tel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電話番号',
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'メールアドレス',
  `work` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '勤務先',
  `work_adress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '勤務先住所',
  `work_tel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '勤務先連絡先\r\n勤務先電話番号',
  `help` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '緊急連絡先or連帯保証人',
  `help_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '緊急連絡先・連帯保証人名',
  `help_position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '続柄',
  `help_tel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '緊急連絡先・連帯保証人連絡先',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PDF` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '詳細',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `contractors`
--

INSERT INTO `contractors` (`id`, `mansion_id`, `roomnumber`, `start`, `end`, `name`, `birth`, `gender`, `adress`, `tel`, `mail`, `work`, `work_adress`, `work_tel`, `help`, `help_name`, `help_position`, `help_tel`, `password`, `PDF`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 101, '2022-10-01', '2024-09-30', '豊臣秀吉', '1996-02-20', '男性', '大阪城', '09012345678', 'keiyaku@gmail.com', '大阪城', '大阪城', '1234567890', '連帯保証人', '織田', '父', '1234567890', 'root', 'public/OzRaJyWoWaSBUDqLYHaC8W6wPGeuQEFyWR99tt66.pdf', '大阪城', '2022-10-06 03:07:19', '2022-10-06 03:07:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `imgs`
--

CREATE TABLE `imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imgpass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '画像パス',
  `report_id` int(11) DEFAULT NULL,
  `report_inner_id` int(11) DEFAULT NULL,
  `mansion_id` int(11) NOT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `imgs`
--

INSERT INTO `imgs` (`id`, `imgpass`, `report_id`, `report_inner_id`, `mansion_id`, `contractor_id`, `created_at`, `updated_at`) VALUES
(1, 'JtU4dJ7xGIhnlGYmnSQmYIfOneNA9YTG2dfHyk5d.jpg', 1, 3, 1, NULL, '2022-10-06 03:08:51', '2022-10-06 03:08:51'),
(2, 'x1JlkfdxbsOl6dxzBBgc5rn2HeZ30h8FtfZHQPJS.jpg', 1, 3, 1, NULL, '2022-10-06 03:08:51', '2022-10-06 03:08:51'),
(3, 'N4LW7JArCrpt295AGyTJ5xkeBYruGDVED2RcIXt2.jpg', 1, 3, 1, NULL, '2022-10-06 03:08:51', '2022-10-06 03:08:51'),
(4, 'I1OenopIrDKors20kFP9tcRI6FX1yuPPsJ8USRuL.jpg', NULL, NULL, 1, 1, '2022-10-06 03:10:59', '2022-10-06 03:10:59'),
(5, 'Nf2X5bHWpGvNrMOZWsYtmH84wd6tnaQfseDaKl0h.webp', NULL, NULL, 1, 1, '2022-10-06 03:10:59', '2022-10-06 03:10:59'),
(6, 'HhtWd1yB65gAT6LRoUqgSKuqUQT1P2SbqxDcfpwx.webp', NULL, NULL, 1, 1, '2022-10-06 03:10:59', '2022-10-06 03:10:59');

-- --------------------------------------------------------

--
-- テーブルの構造 `mansions`
--

CREATE TABLE `mansions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '物件名',
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '所在地',
  `total` int(11) DEFAULT NULL COMMENT '総戸数',
  `age` date NOT NULL COMMENT '築年数',
  `PDF` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ファイルパス',
  `owner_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `mansions`
--

INSERT INTO `mansions` (`id`, `name`, `adress`, `total`, `age`, `PDF`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, '織田マンション', '岐阜県岐阜市', 50, '2010-01-01', '1xdrGm5Qv8OOCGO5PrEKxYMIlt8K5rxPmBKw8ve1.pdf', 1, '2022-10-06 03:05:54', '2022-10-06 03:05:54');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '家主名',
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '住所',
  `tel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電話番号',
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'パスワード',
  `body` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '詳細',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `owners`
--

INSERT INTO `owners` (`id`, `name`, `adress`, `tel`, `mail`, `password`, `body`, `created_at`, `updated_at`) VALUES
(1, '織田信長', '名古屋市中村区', '09012345678', 'owner@gmail.com', 'root', '本能寺', '2022-10-06 03:05:21', '2022-10-06 03:05:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '報告箇所',
  `day` date NOT NULL COMMENT '報告書作成日',
  `mansion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `reports`
--

INSERT INTO `reports` (`id`, `point`, `day`, `mansion_id`, `created_at`, `updated_at`) VALUES
(1, '外壁・共用', '2022-10-01', 1, '2022-10-06 03:08:51', '2022-10-06 03:08:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `report_inners`
--

CREATE TABLE `report_inners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '報告詳細',
  `report_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `report_inners`
--

INSERT INTO `report_inners` (`id`, `body`, `report_id`, `created_at`, `updated_at`) VALUES
(1, '外壁', 1, '2022-10-06 03:08:51', '2022-10-06 03:08:51'),
(2, 'オートロック', 1, '2022-10-06 03:08:51', '2022-10-06 03:08:51'),
(3, '屋上', 1, '2022-10-06 03:08:51', '2022-10-06 03:08:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `starts`
--

CREATE TABLE `starts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `mansion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `starts`
--

INSERT INTO `starts` (`id`, `body`, `contractor_id`, `mansion_id`, `created_at`, `updated_at`) VALUES
(1, '洋室壁にカビあり', 1, 1, '2022-10-06 03:10:59', '2022-10-06 03:10:59'),
(2, '浴室の床汚れあり', 1, 1, '2022-10-06 03:10:59', '2022-10-06 03:10:59'),
(3, '玄関壁に傷あり', 1, 1, '2022-10-06 03:10:59', '2022-10-06 03:10:59');

-- --------------------------------------------------------

--
-- テーブルの構造 `tels`
--

CREATE TABLE `tels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tel1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel1_inner` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel2_inner` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_inner` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '管理会社住所',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date DEFAULT NULL,
  `kanri_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `adress`, `email`, `password`, `birth`, `kanri_id`, `contractor_id`, `owner_id`, `role`, `created_at`, `updated_at`) VALUES
(1, '株式会社田代', '名古屋市中村区', 'kanri@gmail.com', '$2y$10$dk.2LqJv8wH61CXOR.BafelltQ7uSZy5.5Rxo/k1C0H2z2Lbp5Zvm', NULL, NULL, NULL, NULL, 2, '2022-10-06 03:04:34', '2022-10-06 03:04:34'),
(2, '織田信長', NULL, 'owner@gmail.com', '$2y$10$IDQ3pMPTJjVW2RwAJ3drHeq5JbOYTLx0H3HH6mHPND4YzWpR1aqpS', '1996-02-20', 1, NULL, 1, 1, '2022-10-06 03:05:21', '2022-10-06 03:05:21'),
(3, '豊臣秀吉', NULL, 'keiyaku@gmail.com', '$2y$10$uPeN278mO1lBWRxaPQ8c1OQC1BnlA/7eDvhvBe47fg4ocNgyOK5Bi', '1996-02-20', 1, 1, NULL, 0, '2022-10-06 03:07:19', '2022-10-06 03:07:19');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `constructions`
--
ALTER TABLE `constructions`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mansions`
--
ALTER TABLE `mansions`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `report_inners`
--
ALTER TABLE `report_inners`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `starts`
--
ALTER TABLE `starts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `tels`
--
ALTER TABLE `tels`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `constructions`
--
ALTER TABLE `constructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `mansions`
--
ALTER TABLE `mansions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `report_inners`
--
ALTER TABLE `report_inners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `starts`
--
ALTER TABLE `starts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `tels`
--
ALTER TABLE `tels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
