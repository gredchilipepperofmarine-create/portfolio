<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="common/reset.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/93c8dbb3be.js" crossorigin="anonymous"></script>
    <link href="style/style.css" rel="stylesheet">
    <link href="common/createImages/createImages.css" rel="stylesheet">
    <link href="common/loading/loading.css" rel="stylesheet">
    <link href="common/progress/progress.css" rel="stylesheet">
    <link href="common/tub/tub.css" rel="stylesheet">
    <link href="common/ufo/ufo.css" rel="stylesheet">

    <title>ポートフォリオサイト</title>
  </head>
  <body>
    <div class="wrap" id="body">
      <div class="overlay"></div>

      <!-- フォーム関係呼び出し -->
      <?php require 'common/form/form-input.php'; ?>
      <?php require 'common/form/form-output.php'; ?>

      <!-- ローディング画面呼び出し -->
      <?php require 'common/loading/loading.php'; ?>
      
      <!-- ufoおみくじ呼び出し -->
      <?php require 'common/ufo/ufo-output.php'; ?>

      <!-- 背景生成場所 -->
      <div class="backArea" id="backArea"></div>

      <header>
        <div class="container text-center">
          <div class="row">
            <div class="col headerText">
              <h1 class="welcome">Welcome to my</h1>
              <h1 class="portfolio">Portfolio</h1>
              <nav class="headerNav">
                <ul class="headerList">
                  <li><a href="#introduction">About Me</a></li>
                  <li><a href="#introduction">Skills</a></li>
                  <li class="creatsList"><a href="#creates">Creates</a>
                    <!-- 自作モーダル -->
                    <!-- <button type="button" id="creates" class="creates">Creates</button>
                    <ul class="subList">
                      <li><a href="#RPG">Game: RPG</a></li>
                      <li><a href="#shooting">Game: Shooting</a></li>
                      <li><a href="#demoHps">Demo HP's</a></li>
                    </ul> -->
                  </li>
                  <li><a href="#technotes">Tech Notes</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

        <!-- UFOテックエリア -->
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
      </header>

      <main>
        <a href="#" class="toTopScroll">
          <span>..to Top</span>
          <img src="images/ship.png" alt="toTop">
        </a>
        <div class="scrollTargetArea">
          <div class="container text-center">
            <div class="row my-5 introduction" id="introduction">
              <div class="col-md-6 introCol">
                <div class="gy-3 gx-4 mx-auto">
                  <h2>About Me</h2>
                  <div class="inner">
                    <p class="intro">
                      職業訓練<br>Webエンジニアクラス受講
                      <br>各種基礎を学ぶ
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <h2>Skills</h2>
                <div class="inner">
                   <div style="width: 100%; margin: 0 auto;">
                    <canvas id="skillChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center" id="technotes">
            <div class="row">
              <div class="col-12 tubArea">
                <h2 class="techArea">Tech Notes</h2>
                <div class="listArea">
                  <ul class="tubs">
                    <li><button type="button" class="tubBtn isOpen" data-btn=".note1">Note1</button></li>
                    <li><button type="button" class="tubBtn" data-btn=".cssArea">Note2</button></li>
                    <li><button type="button" class="tubBtn" data-btn=".jsArea">Note3</button></li>
                    <li><button type="button" class="tubBtn" data-btn=".phpArea">Note4</button></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 tub note1">
                <div class="tubInner">
                  <ul class="skills">
                    <li>Bootstrapを使用してベース作成</li>
                    <li></li>
                    <li></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 tub cssArea isHide">
                <div class="tubInner">
                  <ul class="skills">
                    <li>フッターエリアのアニメーションと</li>
                    <li>その他装飾で活用</li>
                    <li></li>
                    <li></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 tub jsArea isHide">
                <div class="tubInner">
                  <ul class="skills">
                    <li>ローディング画面</li>
                    <li>背景画像の自動生成</li>
                    <li>トップへ戻るボタンの発生制御</li>
                    <li>タブの作成</li>
                  </ul>
                </div>
              </div>
              <div class="col-12 tub phpArea isHide">
                <div class="tubInner">
                  <ul class="skills">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li>PHP</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- 「体験する」起動ボタン -->
          <button type="button" class="btn btn-primary btn-lg px-4 py-2 rounded-3 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#experienceModal">
            <i class="bi bi-play-circle-fill me-2"></i>体験する
          </button>

          <!-- 入力モーダル -->
          <?php require 'common/creates/add_mordal.php'; ?>

          <!-- 制作実績エリア -->
          <div id="creates"></div>
          <?php require 'common/getLang/getLang.php'; ?>

          <!-- <div class="container text-center">
            <div class="outWrap px-4 bg-white bg-opacity-75" id="conntact">
              <div class="row mx-auto">
                  <h3>Contact</h3>
                  <ul class="containerList">
                    <li>Name:</li>
                    <li><input type="text" name="userName"></li>
                    <li>E-mail:</li>
                    <li><input type="email" name="userName"></li>
                    <li>Message:</li>
                    <li><input type="textarea" name="userMessage"></li>
                  </ul>
              </div>
            </div>
          </div> -->

          <div class="toTopArea">
            <div class="toTopInner">
              <a href="#">
                <span>..to Top</span>
                <img src="images/car.png">
              </a>
            </div>
          </div>
        </div>
      </main>
      <footer>
        <div class="moveArea">
          <ul class="riverObjects">
            <li class="riverItem isWolf" style="--i: 0"><img src="images/wolfChild.png"></li>
            <li class="riverItem isCloudSm" style="--i: 1"><img src="images/cloud.png"></li>
            <li class="riverItem isCloudLg" style="--i: 2"><img src="images/cloud01.png"></li>
            <li class="riverItem isCastle" style="--i: 3"><img src="images/castle.png"></li>
            <li class="riverItem isMashroomYellow" style="--i: 4"><img src="images/mashroomYellow.png"></li>
            <li class="riverItem isSun" style="--i: 5"><img src="images/sun.png"></li>
          </ul>
        </div>
      </footer>
    </div>

    <!-- UFOエリア -->
    <div class="ufoArea" id="ufoArea"></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <!-- 自作モーダル -->
    <!-- <script src="script/script.js"></script> -->
    <script src="common/createImages/createImages.js"></script>
    <script src="common/toTopScroll/toTopScroll.js"></script>
    <script src="common/loading/loading.js"></script>
    <script src="common/progress/progress.js"></script>
    <script src="common/tub/tub.js"></script>
    <script src="common/ufo/ufo.js"></script>
    <script src="common/form/form.js"></script>
    <script src="common/chart/skillChart.js"></script>
    <script src="script/getLangScript.js"></script>
    <script src="common/modalFocusCtl/modalFocusCtl.js"></script>
    <script src="common/creates/creates.js"></script>
    
  </body>
</html>