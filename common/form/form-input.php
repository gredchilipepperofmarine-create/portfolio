<div class="position-fixed top-0 p-2 formSendArea" style="z-index: 3;" id="formArea">
  <div class="mb-2">
    <button id="focusBtn" class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
      <img style="height: 35px; width: auto;" src="images/GitHub_Invertocat_Black.png">
    </button>
  </div>
  <div>
    <div class="collapse collapse-horizontal position-absolute" id="collapseWidthExample">
      <div class="card card-body border-0 shadow-lg rounded-3" style="width: 320px;">
        <form id="form" action="common/form/php/form.php" method="post">
          <div class="mb-3">
            <label class="form-label d-flex align-items-center justify-content-between">
              お名前
            </label>
            <input class="form-control bg-white" type="text" name="name" placeholder="ゲスト">
          </div>
          <div class="mb-3">
            <label class="form-label">お問い合わせ内容</label>
            <select class="form-select" name="category">
              <option selected value="codes">コードを見る(GitHub)</option>
              <option value="other">その他</option>
            </select>
          </div>
          <div class="d-grid mt-4">
            <button id="formBtn" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              送信する
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>