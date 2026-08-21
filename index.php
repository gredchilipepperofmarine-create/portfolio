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
                  <li class="creatsList">
                    <button type="button" id="creates" class="creates">Creates</button>
                    <ul class="subList">
                      <li><a href="#RPG">Game: RPG</a></li>
                      <li><a href="#shooting">Game: Shooting</a></li>
                      <li><a href="#demoHps">Demo HP's</a></li>
                    </ul>
                  </li>
                  <li><a href="#conntact">Contact</a></li>
                </ul>
              </nav>
            </div>
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
                  <!-- <ul class="skills">
                    <li>HTML : 基礎</li>
                    <li>CSS : 基礎</li>
                    <li>Javascript : 基礎</li>
                    <li>PHP : 基礎</li>
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center">
            <div class="row">
              <div class="col-12 tubArea">
                <h2>本サイト制作における使用</h2>
                <div class="listArea">
                  <ul class="tubs">
                    <li><button type="button" class="tubBtn isOpen" data-btn=".htmlArea">HTML</button></li>
                    <li><button type="button" class="tubBtn" data-btn=".cssArea">CSS</button></li>
                    <li><button type="button" class="tubBtn" data-btn=".jsArea">Javascript</button></li>
                    <li><button type="button" class="tubBtn" data-btn=".phpArea">PHP</button></li>
                  </ul>
                </div>
              </div>
              <div class="col-12 tub htmlArea">
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
          <div class="container text-center">
            <div class="outWrap px-4 bg-white bg-opacity-75" id="RPG">
              <div class="row g-4 text-center">
                  <div class="col-12">
                    <h3>RPG<br> Battle System</h3>
                  </div>               
                  <div class="col-12 col-md-6 explain">
                    <!-- <p>モンスターと戦うゲーム</p> -->
                  <ul>
                    <li><span>制作期間</span></li>
                    <li>10~20h</li>
                    <li><span>使用言語</span></li>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li><span>ゲーム内容</span></li>
                    <li>マップを歩き回ると・・・</li>
                    <li>※PCのみ動作</li>
                  </ul>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="hoverClass">
                      <div class="innerCol">
                        <a href="gallery/Games/RPG/index.html" target="_blank">
                          <img class="img-fluid" src="images/battle.png" alt="battleDemoPic">
                          <h4>RPG風戦うゲーム</h4>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="container text-center">
            <div class="outWrap px-4 bg-white bg-opacity-75" id="shooting">
              <div class="row g-4 text-center">
                <div class="col-12">
                  <h3>Shooting Game</h3>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="innerCol">
                      <a href="http://www.gredchilipepper.shop/shooting/index.php" target="_blank">
                        <img class="img-fluid" src="images/shooting.png" alt="shootingDemoPic">
                        <h4>最高記録を目指せ！</h4>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 explain">
                  <!-- <p>最高記録を目指せ！</p> -->
                   <canvas id="langSTGChart"></canvas>
                  <ul>
                    <li><span>制作期間</span></li>
                    <li>7h</li>
                    <li><span>使用言語</span></li>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li><span>ゲーム内容</span></li>
                    <li>※PCのみ動作</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center">
            <div class="outWrap px-4 bg-white bg-opacity-75" id="demoHps">
              <div class="row g-5 g-md-4 text-center ">
                <div class="col-12">
                  <h3>DemoHP's</h3>
                  <p>デモサイト</p>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="innerCol">
                      <a href="gallery/demos/howtodrive/index.html" target="_blank">
                        <img class="img-fluid" src="images/howToDrive.png" alt="battleDemoPic">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="textcol">
                      <h4>How To Drive?(デモ)</h4>
                      <p class="innerP">
                        <ul class="demoHP">
                          <li>訓練開始直後に作成</li>
                            <li>
                              使用言語
                              <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                              </ul>
                            </li>
                          <li>レスポンシブ未対応</li>
                        </ul>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="innerCol">
                      <a href="gallery/demos/movie/index.html" target="_blank">
                        <img class="img-fluid" src="images/movie.png" alt="battleDemoPic">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="textcol">
                        <h4>新作映画(デモ)</h4>
                        <p class="innerP">
                          <ul class="demoHP">
                            <li>訓練中期に作成</li>
                            <li>
                              使用言語
                              <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                              </ul>
                            </li>
                            <li>レスポンシブ未対応</li>
                          </ul>
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="innerCol">
                      <a href="gallery/demos/lessonPage/index.html" target="_blank">
                        <img class="img-fluid" src="images/lesson.png" alt="battleDemoPic">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="textcol">
                        <h4>HTML/CSS個人製作課題(デモ)</h4>
                        <p class="innerP">
                          <ul class="demoHP">
                            <li>HTML/CSS修了課題</li>
                            <li>
                              使用言語
                              <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                              </ul>
                            </li>
                            <li>レスポンシブ対応済</li>
                          </ul>
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="innerCol">
                      <a href="http://www.gredchilipepper.shop/ccdonuts/index.php" target="_blank">
                        <img class="img-fluid" src="images/donuts.png" alt="PHPPic">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hoverClass">
                    <div class="textcol">
                        <h4>PHP個人製作課題(デモ)</h4>
                        <p class="innerP">
                          <ul class="demoHP">
                            <li>PHP修了課題</li>
                            <li>制作補助としてAI使用</li>
                            <li>
                              制作期間
                              <ul>
                                <li>2週間</li>
                              </ul>
                            </li>
                            <li>
                              使用言語
                              <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>PHP</li>
                              </ul>
                            </li>
                            <li>レスポンシブ対応済</li>
                          </ul>
                        </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container text-center">
            <div class="outWrap px-4 bg-white bg-opacity-75" id="conntact">
              <div class="row mx-auto">
                <div class="col-12">
                  <h3>Contact</h3>
                </div>
                <div class="col-md-6">
                  <ul class="idArea">
                    <li>GitHub:</li>
                    <li><a href="#">ここにID</a></li>
                    <li></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="containerList">
                    <li>Name:</li>
                    <li><input type="text" name="userName"></li>
                    <li>E-mail:</li>
                    <li><input type="email" name="userName"></li>
                    <li>Message:</li>
                    <li><input type="textarea" name="userMessage"></li>
                  </ul>
                  <p></p>
                </div>
              </div>
            </div>
          </div>
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
    <div class="ufoArea" id="ufoArea"></div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
    <script src="common/createImages/createImages.js"></script>
    <script src="common/toTopScroll/toTopScroll.js"></script>
    <script src="common/loading/loading.js"></script>
    <script src="common/progress/progress.js"></script>
    <script src="common/tub/tub.js"></script>
    <script src="common/ufo/ufo.js"></script>
    <script src="common/form/form.js"></script>
    <script src="common/chart/skillChart.js"></script>
  </body>
</html>