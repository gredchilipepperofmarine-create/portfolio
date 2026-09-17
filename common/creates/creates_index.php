<div class="container text-center my-5">
  <h2 class="fw-bold mb-4 text-dark">制作実績・ギャラリー</h2>
  <div class="outWrap p-4 p-md-5 bg-white bg-opacity-75 rounded-4 shadow-custom">
    <div class="row g-4 justify-content-center text-start">

      <?php require 'common/creates/db_system.php'; ?>
      
      <div class="p-3 mt-2 bg-light rounded-2">
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
    <div id="creates" class="row g-5 justify-content-center text-start"></div>
  </div>
</div>
