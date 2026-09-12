<?php
require_once (__DIR__ . '/../../includes/portfolioDb.php');
$sql = $pdo->prepare('SELECT * FROM main_creates');
$sql->execute();
$data_all = $sql->fetch();
?>

<!-- デザインエリア -->
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
            <img src="images/<?= $data_all['title'] ?>.png" class="card-img-top img-fluid rounded-top-3" alt="RPG Demo Pic">
            <div class="card-body p-3 p-md-4 w-100">
              <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3"><?= $data_all['category']?></span>
              <h5 class="card-title fw-bold text-dark mb-3"><?= $data_all['title'] ?></h5>
              <p>使用言語</p>
              <div id="langDetail" class="barCharaArea"></div>
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
        <h5 class="modal-title fw-bold"><?= $data_all['title'] ?></h5>
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
              <p class="mb-2"><strong>制作時間：</strong> <?= $data_all['dev_time'] ?>h</p>
              <p class="mb-2"><strong>制作概要：</strong><?= $data_all['description'] ?><small class="text-muted"><br><?= $data_all['note'] ?></small><br><small class="text-muted">※戦闘画面はAIでデザイン</small></p>
              <p class="mb-2"><strong>工夫した点：</strong><br>
                <span class="text-danger fw-bold"><?= $data_all['creativity'] ?></span>
              </p>
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column flex-sm-row flex-md-column flex-lg-row gap-2">
              <a href="https://github.com/gredchilipepperofmarine-create/<?= $data_all['title'] ?>.git" target="_blank" rel="noopener noreferrer" class="btn btn-light border shadow-sm d-inline-flex align-items-center justify-content-center gap-2 rounded-3 px-3 py-2 flex-fill text-dark text-decoration-none">
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