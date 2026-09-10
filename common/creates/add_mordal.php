<div class="modal fade" id="experienceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="experienceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 border-0 shadow-lg">
      
      <!-- モーダルヘッダー -->
      <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
        <h5 class="modal-title fw-bold text-dark fs-5" id="experienceModalLabel">
          <i class="bi bi-pencil-square text-primary me-2"></i><span id="modalHeaderTitle">作品登録フォーム</span>
        </h5>
        <!-- 閉じるボタン (x) -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>

      <!-- モーダルボディ -->
      <div class="modal-body p-2 p-md-4">
        
        <div class="container my-2 d-flex justify-content-center">
          <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
              
              <div class="card border border-secondary-subtle rounded-3 shadow-sm">
                
                <!-- 入力画面フォーム -->
                <div id="stepInput" class="card-body p-4">
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
                      <textarea id="inputDescription" name="description" class="form-control" rows="3" placeholder="モーダル内の説明文を入力"></textarea>
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
                        確認画面へ進む <i class="bi bi-arrow-right ms-1"></i>
                      </button>
                    </div>
                  </form>
                </div>

                <!-- 確認画面 -->
                <div id="stepConfirm" class="card-body p-4 d-none">
                  <div class="text-start mb-3">
                    <p class="small text-secondary mb-0">以下の内容で登録します。よろしければ「登録する」を押してください。</p>
                  </div>

                  <!-- 入力内容表示エリア -->
                  <div class="bg-body-tertiary rounded-3 p-3 mb-4 text-start border border-light-subtle">
                    <!-- カテゴリー -->
                    <div class="mb-3 border-bottom pb-2">
                      <div class="text-secondary small fw-bold mb-1">カテゴリー</div>
                      <div id="confirmCategory" class="fw-semibold text-dark fs-6"></div>
                    </div>

                    <!-- リポジトリ名 -->
                    <div class="mb-3 border-bottom pb-2">
                      <div class="text-secondary small fw-bold mb-1">リポジトリ名</div>
                      <div id="confirmTitle" class="fw-semibold text-dark fs-6"></div>
                    </div>

                    <!-- 説明文 -->
                    <div class="mb-3 border-bottom pb-2">
                      <div class="text-secondary small fw-bold mb-1">説明文</div>
                      <div id="confirmDescription" class="text-dark fs-6 text-break lh-sm"></div>
                    </div>

                    <!-- 制作時間 -->
                    <div class="mb-1">
                      <div class="text-secondary small fw-bold mb-1">制作時間</div>
                      <div class="fw-semibold text-dark fs-6">
                        <span id="confirmDevTime"></span> 時間
                      </div>
                    </div>
                  </div>

                  <!-- 最終送信フォーム -->
                  <form id="confirmForm" >
                    <div class="row g-2">
                      <!-- 修正する -->
                      <div class="col-6">
                        <button type="button" id="btnBackToInput" class="btn btn-outline-secondary w-100 fw-bold py-2">
                          <i class="bi bi-arrow-left me-1"></i>修正する
                        </button>
                      </div>

                      <!-- 登録実行 -->
                      <div class="col-6" data-bs-dismiss="modal">
                        <button id="registeredBtn" type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                          登録する
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

      <!-- モーダルフッター -->
      <!-- <div class="modal-footer border-top-0 pt-0 pb-4 px-4 justify-content-center">
        <button type="button" class="btn btn-outline-secondary px-4 fw-bold rounded-2" data-bs-dismiss="modal">
          <i class="bi bi-x-lg me-1"></i>閉じる
        </button>
      </div> -->

    </div>
  </div>
</div>