<?php
$category=$title=$description=$dev_time='';
?>
<div class="container my-3 d-flex justify-content-center">
  <div class="row w-100 justify-content-center">
    <div class="col-12 col-md-10">
      
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
              <label class="form-label fw-bold small text-secondary">作品タイトル</label>
              <input type="text" name="title" class="form-control" placeholder="作品タイトルを入力">
            </div>

            <!-- 説明文 -->
            <div class="mb-3 text-start">
              <label class="form-label fw-bold small text-secondary">作品概要</label>
              <textarea name="description" class="form-control" rows="3" placeholder="作品概要を入力">description</textarea>
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
