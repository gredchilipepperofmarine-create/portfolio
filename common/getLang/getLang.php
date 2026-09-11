<div class="container text-center my-5">
  <!-- 一番大きなカード(outWrap)の直上にh2を配置 -->
  <h2 class="fw-bold mb-4 text-dark">制作実績・ギャラリー</h2>
  <div class="outWrap p-4 p-md-5 bg-white bg-opacity-75 rounded-4 shadow-custom">
    <div class="row g-4 justify-content-center text-start">

      <?php require 'common/creates/db_system.php'; ?>
    

      <!--  RPG Battle System  -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-hover-wrapper h-100">
          <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-rpg">
            <img src="images/battle.png" class="card-img-top img-fluid rounded-top-3" alt="RPG Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3">Game</span>
              <h5 class="card-title fw-bold text-dark mb-3">RPG Battle System</h5>
              <p>使用言語</p>
              <div id="RPGLangDetail" class="barCharaArea"></div>
            </div>
          </button>
        </div>
      </div>

      <!--  Shooting Game  -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-hover-wrapper h-100">
          <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-shooting">
            <img src="images/shooting.png" class="card-img-top img-fluid rounded-top-3" alt="Shooting Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3">Game</span>
              <h5 class="card-title fw-bold text-dark mb-3">Shooting Game</h5>
              <p>使用言語</p>
              <div id="STGLangDetail" class="barCharaArea"></div>
            </div>
          </button>
        </div>
      </div>

      <!--  How To Drive?  -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-hover-wrapper h-100">
          <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-howtodrive">
            <img src="images/howToDrive.png" class="card-img-top img-fluid rounded-top-3" alt="How To Drive Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-info-subtle text-info-emphasis fs-6 py-2 px-3 fw-semibold mb-3">デモHP</span>
              <h5 class="card-title fw-bold text-dark mb-3">How To Drive? (デモ)</h5>
              <p>使用言語</p>
              <div id="HowToDriveLangDetail" class="barCharaArea"></div>
            </div>
          </button>
        </div>
      </div>

      <!--  新作映画  -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-hover-wrapper h-100">
          <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-movie">
            <img src="images/movie.png" class="card-img-top img-fluid rounded-top-3" alt="Movie Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-info-subtle text-info-emphasis fs-6 py-2 px-3 fw-semibold mb-3">デモHP</span>
              <h5 class="card-title fw-bold text-dark mb-3">新作映画 (デモ)</h5>
              <p>使用言語</p>
              <div id="MovieLangDetail" class="barCharaArea"></div>
            </div>
          </button>
        </div>
      </div>

      <!--  HTML/CSS個人製作課題  -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-hover-wrapper h-100">
          <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-lesson">
            <img src="images/lesson.png" class="card-img-top img-fluid rounded-top-3" alt="Lesson Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-info-subtle text-info-emphasis fs-6 py-2 px-3 fw-semibold mb-3">デモHP</span>
              <h5 class="card-title fw-bold text-dark mb-3">HTML/CSS個人製作課題</h5>
              <p>使用言語</p>
              <div id="DesignHouseRenovationLangDetail" class="barCharaArea"></div>
            </div>
          </button>
        </div>
      </div>

      <!--  PHP個人製作課題  -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card-hover-wrapper h-100">
          <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3" data-bs-toggle="modal" data-bs-target="#modal-donuts">
            <img src="images/donuts.png" class="card-img-top img-fluid rounded-top-3" alt="PHP Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-info-subtle text-info-emphasis fs-6 py-2 px-3 fw-semibold mb-3">デモHP</span>
              <h5 class="card-title fw-bold text-dark mb-3">PHP個人製作課題 (C.C.Donuts)</h5>
              <p>使用言語</p>
              <div id="ccdonutsLangDetail" class="barCharaArea"></div>
            </div>
          </button>
        </div>
      </div>

      <div class="p-2 mt-2 bg-light rounded-2">
        <div class="techArea mb-1 d-flex align-items-center gap-1 fw-bold">
          <span style="background: linear-gradient(transparent 65%, rgba(255, 220, 0, 0.6) 65%);">
            Tech Note
          </span>
        </div>
        <p class="lh-sm mb-3 text-start fw-bold text-dark fs-6">
          GitHub API連携でリポジトリ内の言語使用率(バイト数)を取得し、JavaScriptで自動計算してプログレスバー(作品詳細内)に表示。
        </p>
        <div class="bg-white border rounded-2 p-2 shadow-sm">
          <div class="small fw-bold mb-1 border-bottom pb-1">
            <i class="bi bi-shield-check me-1 text-success"></i>表示崩れ防止の2重対策
          </div>
          <p class="mb-1 small text-body-secondary d-flex align-items-top">
            <span class="badge bg-secondary me-2 align-self-start mt-1">1</span>
            <span>通信エラーの場合にはローカルストレージから情報を取得</span>
          </p>
          <p class="mb-0 small text-body-secondary d-flex align-items-top">
            <span class="badge bg-secondary me-2 align-self-start mt-1">2</span>
            <span>タイムスタンプ機能を利用して最初の通信から24時間以内はローカルストレージから情報を取得</span>
          </p>
        </div>
      </div>
      

    </div>
  </div>
</div>



<!-- モーダルエリア -->
<!-- RPG -->
<div class="modal fade" id="modal-rpg" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">RPG Battle System</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/battle.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="RPG">
            <div id="RPG" class="languageBar mt-2 mb-2"></div>
            <div id="RPGLang" class="langCharaArea row row-cols-2 g-2 m-0"></div>
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
              <a href="https://github.com/gredchilipepperofmarine-create/RPG.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
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

<!-- Shooting -->
<div class="modal fade" id="modal-shooting" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">Shooting Game</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/shooting.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="Shooting">
            <div id="STG" class="languageBar mt-2 mb-2"></div>
            <div id="STGLang" class="langCharaArea row row-cols-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作時間：</strong> 20h</p>
              <p class="mb-2"><strong>対応端末：</strong> ※PCのみ動作</p>
              <p class="mb-2"><strong>制作概要：</strong> Javascript演習開始直後の自主制作ゲーム2 <br><small class="text-muted">※制作補助としてAIを使用</small></p>
              <p class="mb-2"><strong>工夫した点：</strong><br>
                <span class="text-danger fw-bold">Canvasを用いた描画処理の軽量化と、PHP演習後にスコア保持ロジックを実装</span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/STG.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="http://www.gredchilipepper.shop/creates/STG/index.php" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
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

<!-- How To Drive? -->
<div class="modal fade" id="modal-howtodrive" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">How To Drive? (デモ)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/howToDrive.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="How To Drive">
            <div id="HowToDrive" class="languageBar mt-2 mb-2"></div>
            <div id="HowToDriveLang" class="langCharaArea row row-cols-2 g-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作期間：</strong> 15時間</p>
              <p class="mb-2"><strong>制作概要：</strong> 演習開始直後の自主制作サイト <small class="text-muted">※レスポンシブ未対応</small></p>
              <p class="mb-2"><strong>工夫した点：</strong><br>
                <span class="text-danger fw-bold">Web制作学習の初期段階で、基本タグのレイアウト検証用に制作</span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/HowToDrive.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="../howtodrive/index.html" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
                サイトを見る
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

<!-- 新作映画 -->
<div class="modal fade" id="modal-movie" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">新作映画 (デモ)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/movie.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="Movie">
            <div id="Movie" class="languageBar mt-2 mb-2"></div>
            <div id="MovieLang" class="langCharaArea row row-cols-2 g-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作期間：</strong> 15時間</p>
              <p class="mb-2"><strong>制作概要：</strong> 演習初期の自主制作サイト <small class="text-muted">※レスポンシブ未対応</small></p>
              <p class="mb-2"><strong>工夫した点：</strong><br>
                <span class="text-danger fw-bold">映画告知風のデザインと内容を0から作成。CSS装飾の練習として制作</span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/Movie.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="../movie/index.html" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
                サイトを見る
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

<!-- HTML/CSS個人製作課題 -->
<div class="modal fade" id="modal-lesson" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">HTML/CSS個人製作課題 (デモ)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/lesson.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="Lesson">
            <div id="DesignHouseRenovation" class="languageBar mt-2 mb-2"></div>
            <div id="DesignHouseRenovationLang" class="langCharaArea row row-cols-2 g-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作期間：</strong> 50時間</p>
              <p class="mb-2"><strong>制作概要：</strong> 架空のリフォーム施工業者サイト</p>
              <p class="mb-2"><strong>工夫した点・こだわり：</strong><br>
                <span class="text-danger fw-bold">Flexbox/Gridを用いたレスポンシブ配置と、カンプファイルに忠実なデザインの再現</span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/DesighHouseRenovation.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="../DesignHouseRenovation/index.html" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
                サイトを見る
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

<!-- PHP個人製作課題 -->
<div class="modal fade" id="modal-donuts" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-start rounded-4 border-0 shadow-custom">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold">PHP個人製作課題 (C.C.Donuts)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="row g-4 align-items-start">
          <div class="col-12 col-md-5">
            <img src="images/donuts.png" class="img-fluid rounded-3 w-100 shadow-sm" alt="Donuts">
            <div id="ccdonuts" class="languageBar mt-2 mb-2"></div>
            <div id="ccdonutsLang" class="langCharaArea row row-cols-2 g-2 m-0"></div>
          </div>
          <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
            <div>
              <p class="mb-2"><strong>制作期間：</strong> 80時間</p>
              <p class="mb-2"><strong>制作概要：</strong> EC風ショッピングサイト機能の構築 <small class="text-muted">※制作補助としてAIを使用</small></p>
              <p class="mb-2"><strong>内容：</strong>
                <span class="text-danger fw-bold">セッション管理とDB接続・カート機能の構築</span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/ccdonuts.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
                <img src="images/GitHub_Invertocat_Black.png" alt="GitHub Logo" style="height: 20px; width: auto;">
                <span class="fw-bold">コードを見る</span>
              </a>
              <a href="http://www.gredchilipepper.shop/creates/ccdonuts/index.php" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 flex-fill d-inline-flex align-items-center justify-content-center">
                サイトを見る
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