<?php
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$dev_time = $_POST['dev_time'];
?>
<div>
  <form action="insert.php" method="POST">
    <input type="hidden" name="category" value="<?= $category ?>">
    <input type="hidden" name="title" value="<?= $title ?>">
    <input type="hidden" name="description" value="<?= $description ?>">
    <input type="hidden" name="dev_time" value="<?= $dev_time ?>">

    <div>
      <!-- カテゴリー選択 -->
      <div class="mb-3 text-start">
        <?= $category ?>
    </div>

    <!-- リポジトリ名 -->
    <div class="mb-3 text-start">
      <?= $title ?>
    </div>

    <!-- 説明文 -->
    <div class="mb-3 text-start">
      <?= $description ?>
    </div>

    <!-- 制作時間 -->
    <div class="mb-3 text-start">
      <?= $dev_time ?>
    </div>

    <button type="submit" class="btn btn-primary w-50 rounded-0" style="border: none; background-color: #7F5539;">登録する</button>
  </form>
  <!-- ボタン仮置き。今は戻れるけどロード画面からはじまってしまう -->
  <a href="../../index.php">
    <p class="btn btn-primary w-50 rounded-0" style="border: none; background-color: #FFD233;">前のページに戻る</p>
  </a>

</div>
