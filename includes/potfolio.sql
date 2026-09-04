drop database if exists `portfolio`;
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
drop user if exists 'portfolioUser'@'localhost';
create user 'portfolioUser'@'localhost' identified by 'portfolioPassword';
grant all on portfolio.* to 'portfolioUser'@'localhost';
USE `portfolio`;

CREATE TABLE creates (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category` VARCHAR(20) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT,
  `dev_time` VARCHAR(50),
  `is_guest` TINYINT(1) DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- カウント保存用テーブルを作成
CREATE TABLE IF NOT EXISTS `ufo_counter` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `count` INT UNSIGNED NOT NULL DEFAULT 0
)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT IGNORE INTO `ufo_counter` (`id`, `count`) VALUES (1, 0);