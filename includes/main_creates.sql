CREATE TABLE main_creates (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category` VARCHAR(20) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `repo_name` VARCHAR(30) NOT NULL,
  `description` TEXT NOT NULL,
  `creativity` TEXT NOT NULL,
  `note1` TEXT,
  `note2` TEXT,
  `note3` TEXT,
  `dev_time` INT(10) NOT NULL,
  `root_pass` VARCHAR(100) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

TRUNCATE TABLE `main_creates`;
INSERT INTO `main_creates`(`id`, `category`, `title`, `repo_name`, `description`, `creativity`, `note1`, `note2`, `dev_time`, `root_pass`) VALUES 
(1,'Game', 'RPG Battle System', 'RPG', 'Javascript演習開始直後の自主制作ゲーム1。\nエンカウントと戦闘ロジックを実装', '戦闘画面を基礎的なJavascriptで記述後、STGのロジックを応用してキャラクターの移動とエンカウント判定に使用', '※制作補助としてAIを使用', '※戦闘画面はAIでデザイン', '25', '../RPG/RPG/index.html'),
(2,'Game','Shooting Game', 'STG', 'Javascript演習開始直後の自主制作ゲーム2', 'Canvasを用いた描画処理の軽量化と、PHP演習後にスコア保持ロジックを実装', '※制作補助としてAIを使用', '', '20','../STG/index.html'),
(3,'デモHP', 'How To Drive?', 'HowToDrive', '演習開始直後の自主制作サイト', 'Web制作学習の初期段階で、基本タグのレイアウト検証用に制作', '※レスポンシブ未対応', '', '15', '../HowToDrive/index.html'),
(4,'デモHP', '新作映画', 'Movie', '演習初期の自主制作サイト', '映画告知風のデザインと内容を0から作成。CSS装飾の練習として制作', '※レスポンシブ未対応', '', '15', '../movie/index.html'),
(5,'デモHP', 'Design House Renovation', 'DesignHouseRenovation', 'HTML/CSS個人製作課題', 'Flexbox/Gridを用いたレスポンシブ配置と、カンプファイルに忠実なデザインの再現', '', '', '50', '../DesignHouseRenovation/index.html'),
(6,'デモHP', 'C.C.Donuts', 'ccdonuts', 'PHP個人製作課題', 'EC風ショッピングサイト機能の構築', '※制作補助としてAIを使用', '', '80', '../ccdonuts/index.php');
