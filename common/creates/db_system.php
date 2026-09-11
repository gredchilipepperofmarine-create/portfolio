  <div class="col-12">
    <div class="p-4 p-md-5 bg-light rounded-4 shadow-sm border">
      
      <div class="row g-4 align-items-stretch">
        
        <div class="col-12 col-md-7 col-lg-8">
          <div>
            <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3">デモ</span>
            <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">DB登録システム</h5>
            
            <div class="mb-3">
              <p class="lh-lg mb-0">
                PHP演習成果確認のため制作実績をDB管理に変更し、DB登録体験として「さわれる仕組み」を構築しました。
                登録された情報はDB接続を通して反映されます。
                <br><small class="text-muted">※１件のみ登録可能。以降は上書きされます</small>
              </p>
            </div>

            <!-- ボタンエリア -->
            <div class="row g-3 mt-2 text-center">
              <div class="col-12">

                <button type="button" class="btn btn-primary btn-lg px-4 py-2 rounded-3 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#experienceModal">
                  <i class="bi bi-play-circle-fill me-2"></i>体験する
                </button>

              </div>
              <div class="col-sm-6">

              </div>
            </div>

          </div>

          <!-- 下部メッセージ -->
          <div class="pt-3 mt-3 border-top text-start">
            <small class="text-muted">※体験用のDBを使用。登録から24hでDBから削除されます</small>
          </div>
        </div>

        <!-- 左側カラム -->
        <div id="currentData" class="col-12 col-md-5 col-lg-4">
          <div class="card-hover-wrapper h-100">
            <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3 overflow-hidden" data-bs-toggle="modal" data-bs-target="#modal-rpg">
              <img src="images/demoPicCat.png" class="card-img-top img-fluid rounded-top-3" alt="Demo Pic">
              <div class="card-body p-3 p-md-4 w-100 bg-white">
                <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3"></span>
                <h5 class="card-title fw-bold text-dark mb-3">Demo</h5>
                <p class="text-muted small mb-1">使用言語</p>
                <div class="barCharaArea"></div>
              </div>
            </button>
          </div>
        </div>



      </div>

    </div>
  </div>

<!-- モーダルエリア -->
<!-- DEMO -->
<div class="modal fade" id="modal-demo" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">RPG Battle System</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="" class="img-fluid rounded-3 w-100 shadow-sm" alt="Demo Pic">
            <div class=" mt-2 mb-2"></div>
            <div class=" row row-cols-2 g-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作時間：</strong> 25h</p>
              <p class="mb-2"><strong>対応端末：</strong> ※PCのみ動作</p>
              <p class="mb-2"><strong>制作概要：</strong> Javascript演習開始直後の自主制作ゲーム1。エンカウントと戦闘ロジックを実装 <small class="text-muted"><br>※制作補助としてAIを使用</small><br><small class="text-muted">※戦闘画面はAIでデザイン</small></p>
              <p class="mb-2"><strong>工夫した点：</strong><br>
                <span class="text-danger fw-bold">戦闘画面を基礎的なJavascriptで記述後、STGのロジックを応用してキャラクターの移動とエンカウント判定に使用</span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="../RPG/RPG/index.html" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
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