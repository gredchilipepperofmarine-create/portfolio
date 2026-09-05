<!-- 【STEP 2】確認画面 (confirm) -->
<?php
// XSS対策用ヘルパー関数
if (!function_exists('h')) {
    function h($str) {
        return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
    }
}

// POST値の受け取り（未初期化警告を防ぐナル合体演算子）
$category    = $_POST['category'] ?? '';
$title       = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$dev_time    = $_POST['dev_time'] ?? '';
?>

<div id="stepConfirm" class="card-body p-4 d-none">
  <div class="text-start mb-3">
    <p class="small text-secondary mb-0">以下の内容で登録します。よろしければ「登録する」を押してください。</p>
  </div>

  <!-- 入力内容表示エリア -->
  <div class="bg-body-tertiary rounded-3 p-3 mb-4 text-start border border-light-subtle">
    <!-- カテゴリー -->
    <div class="mb-3 border-bottom pb-2">
      <div class="text-secondary small fw-bold mb-1">category</div>
      <div id="confirmCategory" class="fw-semibold text-dark fs-6"><?= h($category) ?></div>
    </div>

    <!-- リポジトリ名 -->
    <div class="mb-3 border-bottom pb-2">
      <div class="text-secondary small fw-bold mb-1">リポジトリ名</div>
      <div id="confirmTitle" class="fw-semibold text-dark fs-6"><?= h($title) ?></div>
    </div>

    <!-- 説明文 -->
    <div class="mb-3 border-bottom pb-2">
      <div class="text-secondary small fw-bold mb-1">説明文</div>
      <div id="confirmDescription" class="text-dark fs-6 text-break lh-sm"><?= h($description) ?></div>
    </div>

    <!-- 制作時間 -->
    <div class="mb-1">
      <div class="text-secondary small fw-bold mb-1">制作時間</div>
      <div class="fw-semibold text-dark fs-6">
        <span id="confirmDevTime"><?= h($dev_time) ?></span> 時間
      </div>
    </div>
  </div>

  <!-- 最終送信フォーム (insert.php へPOST送信) -->
  <form id="confirmForm" action="insert.php" method="post">
    <!-- POST送信用 hiddenフィールド -->
    <input type="hidden" name="category" id="hiddenCategory" value="<?= h($category) ?>">
    <input type="hidden" name="title" id="hiddenTitle" value="<?= h($title) ?>">
    <input type="hidden" name="description" id="hiddenDescription" value="<?= h($description) ?>">
    <input type="hidden" name="dev_time" id="hiddenDevTime" value="<?= h($dev_time) ?>">

    <div class="row g-2">
      <!-- 前のページに戻る（修正する）ボタン：JS制御でロードを挟まず戻る -->
      <div class="col-6">
        <button type="button" id="btnBackToInput" class="btn btn-outline-secondary w-100 fw-bold py-2">
          <i class="bi bi-arrow-left me-1"></i>修正する
        </button>
      </div>

      <!-- 登録実行ボタン -->
      <div class="col-6">
        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
          登録する
        </button>
      </div>
    </div>
  </form>
</div>

