<div class="modal fade" id="experienceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="experienceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 border-0 shadow-lg">
      
      <!-- モーダルヘッダー -->
      <div class="modal-header border-bottom-0 pb-0 pt-4 px-4">
        <h5 class="modal-title fw-bold text-dark fs-5" id="experienceModalLabel">
          <i class="bi bi-pencil-square text-primary me-2"></i>作品登録フォーム
        </h5>
        <!-- ヘッダーの閉じるボタン (x) -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>

      <!-- モーダルボディ -->
      <div class="modal-body p-2 p-md-4">
        
        <?php
        $category=$title=$description=$dev_time='';
        ?>

        <div class="container my-3 d-flex justify-content-center">
          <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
              
              <div class="card border border-secondary-subtle rounded-3 shadow-sm">
                <div class="card-body p-4">
                  
                  <form action="common/creates/add_confirm.php" method="post">
                    <!-- カテゴリー選択 -->
                    <div class="mb-3 text-start">
                      <label class="form-label fw-bold small text-secondary">category</label>
                      <select name="category" class="form-select">
                        <option selected disabled>--選択してください--</option>
                        <option value="Game">Game</option>
                        <option value="DemoHP">DemoHP</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>

                    <!-- リポジトリ名 -->
                    <div class="mb-3 text-start">
                      <label class="form-label fw-bold small text-secondary">リポジトリ名</label>
                      <input type="text" name="title" class="form-control" placeholder="GitHubの対象リポジトリ名を入力">
                    </div>

                    <!-- 説明文 -->
                    <div class="mb-3 text-start">
                      <label class="form-label fw-bold small text-secondary">説明文</label>
                      <textarea name="description" class="form-control" rows="3" placeholder="モーダル内の説明文を入力">description</textarea>
                    </div>

                    <!-- 制作時間 -->
                    <div class="mb-3 text-start">
                      <label class="form-label fw-bold small text-secondary">制作時間</label>
                      <div class="input-group">
                        <input type="number" name="dev_time" class="form-control">
                        <span class="input-group-text bg-body-secondary text-secondary">時間</span>
                      </div>
                    </div>

                    <!-- フォーム送信ボタン -->
                    <div class="d-grid gap-2 mt-4">
                      <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm">登録する</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

      <!-- モーダルフッター -->
      <div class="modal-footer border-top-0 pt-0 pb-4 px-4 justify-content-center">
        <button type="button" class="btn btn-outline-secondary px-4 fw-bold rounded-2" data-bs-dismiss="modal">
          <i class="bi bi-x-lg me-1"></i>閉じる
        </button>
      </div>

    </div>
  </div>
</div>