CREATE TABLE creates (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category` VARCHAR(20) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `repo_name` VARCHAR(20) NOT NULL,
  `description` TEXT,
  `creativity` TEXT,
  `note` TEXT,
  `dev_time` VARCHAR(50),
  `is_guest` TINYINT(1) DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);