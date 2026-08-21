drop database if exists `ufo_counter`;
CREATE DATABASE IF NOT EXISTS `ufo_counter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
drop user if exists 'ufoUser'@'localhost';
create user 'ufoUser'@'localhost' identified by 'ufo_counter';
grant all on ufo_counter.* to 'ufoUser'@'localhost';
USE `ufo_counter`;

CREATE TABLE ufo_counter (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  count INT UNSIGNED NOT NULL DEFAULT 0
);
-- 今回はINSERTではなくUPDATEでcountを増やす。
-- UPDATEはすでに存在する行にしか効かないので、最初のcount0の行を作っておく
INSERT INTO ufo_counter (id, count) VALUES (1, 0);