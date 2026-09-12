<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('SELECT * FROM main_creates');
$sql->execute();
$data_all = $sql->fetchAll();
?>

<!--  デザインエリア  -->
<!-- カード -->
 <?php foreach($data_all as $product): ?>
<div class="col-12 col-md-6 col-lg-4">
  <div class="card-hover-wrapper h-100">
    <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-<?= $product['repo_name'] ?>">
      <img src="images/<?= $product['repo_name'] ?>.png" class="card-img-top img-fluid rounded-top-3" alt="RPG Demo Pic">
      <div class="card-body p-3 p-md-4 w-100">
        <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3"><?= $product['category']?></span>
        <h5 class="card-title fw-bold text-dark mb-3"><?= $product['title'] ?></h5>
        <p>使用言語</p>
        <div id="langDetail" class="barCharaArea"></div>
      </div>
    </button>
  </div>
</div>

<!-- モーダルエリア -->
<!-- RPG -->
<div class="modal fade" id="modal-<?= $product['repo_name'] ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold"><?= $product['title'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/<?= $product['repo_name'] ?>.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="RPG">
            <div id="repo" class="languageBar mt-2 mb-2"></div>
            <div id="lang" class="langCharaArea row row-cols-2 g-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作時間：</strong> <?= $product['dev_time'] ?>h</p>
              <p class="mb-2"><strong>制作概要：</strong><?= $product['description'] ?><small class="text-muted"><br><?= $product['note1'] ?></small><br><?= $product['note2'] ?></small>
              <p class="mb-2"><strong>工夫した点：</strong><br>
                <span class="text-danger fw-bold"><?= $product['creativity'] ?></span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/<?= $product['repo_name'] ?>.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="<?= $product['root_pass'] ?>" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
                作品をプレイする
              </a>
              <button type="button" class="btn btn-secondary rounded-3 px-3 py-2 flex-fill" data-bs-dismiss="modal">
                閉じる
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>