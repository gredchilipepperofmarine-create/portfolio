<?php
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$dev_time = $_POST['dev_time'];
?>
<div>
  <!-- <form action="insert.php" method="POST"> -->
    <!-- <input type="hidden" name="category" value="<?= $category ?>">
    <input type="hidden" name="title" value="<?= $title ?>">
    <input type="hidden" name="description" value="<?= $description ?>">
    <input type="hidden" name="dev_time" value="<?= $dev_time ?>"> -->

<?php
// XSS対策用ヘルパー関数（実務における標準記述）
function h($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!-- ====================================================
     作品登録＆確認画面（ステップ切替式コンポーネント）
     ==================================================== -->
<div class="card border border-secondary-subtle rounded-4 shadow-sm overflow-hidden">
  
  <!-- 【STEP 1】入力画面フォーム -->
  <div id="stepInput" class="card-body p-4">
    <h5 class="fw-bold mb-3 text-dark">
      <i class="bi bi-pencil-square text-primary me-2"></i>作品情報入力
    </h5>

    <form id="workForm">
      <!-- カテゴリー選択 -->
      <div class="mb-3 text-start">
        <label class="form-label fw-bold small text-secondary">カテゴリー</label>
        <select id="inputCategory" name="category" class="form-select">
          <option value="" selected disabled>--選択してください--</option>
          <option value="Game">Game</option>
          <option value="DemoHP">DemoHP</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <!-- リポジトリ名 -->
      <div class="mb-3 text-start">
        <label class="form-label fw-bold small text-secondary">リポジトリ名</label>
        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="GitHubの対象リポジトリ名を入力">
      </div>

      <!-- 説明文 -->
      <div class="mb-3 text-start">
        <label class="form-label fw-bold small text-secondary">説明文</label>
        <textarea id="inputDescription" name="description" class="form-control" rows="3" placeholder="説明文を入力"></textarea>
      </div>

      <!-- 制作時間 -->
      <div class="mb-3 text-start">
        <label class="form-label fw-bold small text-secondary">制作時間</label>
        <div class="input-group">
          <input type="number" id="inputDevTime" name="dev_time" class="form-control">
          <span class="input-group-text bg-body-secondary text-secondary">時間</span>
        </div>
      </div>

      <!-- 確認画面へ進むボタン -->
      <div class="d-grid gap-2 mt-4">
        <button type="button" id="btnToConfirm" class="btn btn-primary fw-bold py-2 shadow-sm">
          確認画面へ進む <i class="bi bi-arrow-right me-1"></i>
        </button>
      </div>
    </form>
  </div>


  <!-- 【STEP 2】確認画面 (初期状態は d-none で非表示) -->
  <div id="stepConfirm" class="card-body p-4 d-none">
    <h5 class="fw-bold mb-3 text-dark">
      <i class="bi bi-check-circle-fill text-success me-2"></i>登録内容の確認
    </h5>
    <p class="small text-secondary mb-4 text-start">以下の内容で登録します。よろしければ「登録する」を押してください。</p>

    <!-- 入力内容の確認リスト -->
    <div class="bg-body-tertiary rounded-3 p-3 mb-4 text-start border border-light-subtle">
      
      <!-- カテゴリー -->
      <div class="mb-3 border-bottom pb-2">
        <div class="text-secondary small fw-bold mb-1">カテゴリー</div>
        <div id="confirmCategory" class="fw-semibold text-dark fs-6">
          <?= h($category) ?>
        </div>
      </div>

      <!-- リポジトリ名 -->
      <div class="mb-3 border-bottom pb-2">
        <div class="text-secondary small fw-bold mb-1">リポジトリ名</div>
        <div id="confirmTitle" class="fw-semibold text-dark fs-6">
          <?= h($title) ?>
        </div>
      </div>

      <!-- 説明文 -->
      <div class="mb-3 border-bottom pb-2">
        <div class="text-secondary small fw-bold mb-1">説明文</div>
        <div id="confirmDescription" class="text-dark fs-6 text-break lh-sm">
          <?= nl2br(h($description)) ?>
        </div>
      </div>

      <!-- 制作時間 -->
      <div class="mb-1">
        <div class="text-secondary small fw-bold mb-1">制作時間</div>
        <div class="fw-semibold text-dark fs-6">
          <span id="confirmDevTime"><?= h($dev_time) ?></span> 時間
        </div>
      </div>

    </div>

    <!-- アクションボタンエリア -->
    <form action="common/creates/add_confirm.php" method="post">
      <!-- バックエンド送信用 hidden フィールド（JSで同期） -->
      <input type="hidden" name="category" id="hiddenCategory">
      <input type="hidden" name="title" id="hiddenTitle">
      <input type="hidden" name="description" id="hiddenDescription">
      <input type="hidden" name="dev_time" id="hiddenDevTime">

      <div class="row g-2">
        <!-- 前のページ（入力画面）に戻るボタン -->
        <div class="col-6">
          <button type="button" id="btnBackToInput" class="btn btn-outline-secondary w-100 fw-bold py-2">
            <i class="bi bi-arrow-left me-1"></i>修正する
          </button>
        </div>

        <!-- 最終送信ボタン -->
        <div class="col-6">
          <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
            登録する
          </button>
        </div>
      </div>
    </form>

  </div>

</div>
</div>
