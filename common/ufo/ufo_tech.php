<div class="mx-auto m-3 bg-white bg-opacity-75 text-center p-3 rounded z-3 shadow-sm" style="max-width: 340px;">
  <div>
    UFOがクリックされた総回数
  </div>
  <div class="fs-2 fw-bold" id="countArea">
    <?php
    require_once 'common/ufo/ufo_getcount.php';
    if(isset($getcount)){
      echo htmlspecialchars($getcount, ENT_QUOTES, 'UTF-8');
    } else {
      echo '0';
    }
    ?>回
  </div>
  <div class="p-2 mt-2 bg-light rounded-2">
    <div class="techArea mb-1 d-flex align-items-center gap-1 fw-bold">
      <span style="background: linear-gradient(transparent 65%, rgba(255, 220, 0, 0.6) 65%);">
        Tech Note
      </span>
    </div>
    <p class="lh-sm mb-0 text-start">
      画面更新と同時にDB接続することで最新情報表示にも対応。
      データ取得とカウント追加処理を切り離すことで実現。
    </p>
  </div>
</div>
