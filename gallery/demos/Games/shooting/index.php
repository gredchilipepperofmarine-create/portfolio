<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="common/reset.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet">
    <title>SHOOTING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <!-- ゲームオーバーで出てくるエリア -->
    <div class="gameoverArea text-center position-fixed w-100 h-100 bg-dark bg-opacity-75 d-none" id="gameoverArea">
      <div class="position-absolute top-50 start-50 translate-middle text-center bg-white rounded-3 p-md-5">
        <div class="container">
          <div class="row p-2">
            <p class="fs-3 p-2">スコア送信</p>
            <label class="form-label">お名前</label>
            <input type="text" id="player_name" class="form-control mb-2" placeholder="好き名前を入力">
          </div>
          <div class="row">
            <div class="col-12 col-md-6 mb-2">
              <button type="button" class="sendBtn btn btn-primary" data-btn="送信">送信</button>
            </div>
            <div class="col-12 col-md-6 mb-2">
              <button type="button" class="sendBtn btn btn-secondary" data-btn="キャンセル">キャンセル</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center pt-5">
      <div class="row">
        <div class="col-12 col-md-6">
          <div>
            <canvas id="drawArea" width="300" height="400" class="p-0"></canvas>
            <div class="d-flex justify-content-center">
              <div>移動：WASD</div>
              <div class="ps-4">猫パンチ：スペース</div>
            </div>
            <div class="numberArea d-flex justify-content-center">
              <div class="scoreArea">Score: <span class="scoreNo">0</span></div>
              <div class="lifeArea">Life: <span class="lifeNo">0</span></div>
            </div>
            <div class="reStart">
              <a href="index.php" class="btn btn-warning">スタート</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 text-center">
          <!-- ランキングエリア -->
          <div>
            <table class="table w-100">
              <thead>
                <tr>
                  <th>順位</th>
                  <th>名前</th>
                  <th>スコア</th>
                </tr>
              </thead>
              <tbody id="ranking-body"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script src="script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>