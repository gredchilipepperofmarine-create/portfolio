const confirmForm = document.getElementById('confirmForm');
const stepConfirm = document.getElementById('stepConfirm');
const btnToConfirm = document.getElementById('btnToConfirm');
const btnBackToInput = document.getElementById('btnBackToInput');
const workForm = document.getElementById('workForm');
const currentData = document.getElementById('currentData');

let repoDataBox = {}

btnToConfirm.addEventListener('click', () => {
  stepConfirm.classList.remove('d-none');
  document.getElementById('stepInput').classList.add('d-none');

  const repoData = Object.fromEntries(new FormData(workForm));

  repoDataBox = {
    category: repoData.category || 'テスト',
    title: repoData.title || 'テスト追加',
    description: repoData.description || 'DBへの追加体験テスト',
    dev_time: repoData.dev_time || 100
  }
  document.getElementById('confirmCategory').textContent = repoDataBox.category;
  document.getElementById('confirmTitle').textContent = repoDataBox.title;
  document.getElementById('confirmDescription').textContent = repoDataBox.description;
  document.getElementById('confirmDevTime').textContent = repoDataBox.dev_time;
})

btnBackToInput.addEventListener('click', () => {
  stepConfirm.classList.add('d-none');
  document.getElementById('stepInput').classList.remove('d-none');
})


confirmForm.addEventListener('submit', (e) => {
  // 標準機能でページ遷移するのを止める
  e.preventDefault();

  stepConfirm.classList.add('d-none');
  document.getElementById('stepInput').classList.remove('d-none');

  workForm.reset();

  console.log(repoDataBox);
  const confirmFormData = new FormData();
  confirmFormData.append('category', repoDataBox.category);
  confirmFormData.append('title', repoDataBox.title);
  confirmFormData.append('description', repoDataBox.description);
  confirmFormData.append('dev_time', repoDataBox.dev_time);
  // php呼び出し
  fetch('common/creates/insert.php',{
    method: 'POST',
    body: confirmFormData
  })
  .then(response => {
    if(!response.ok) {
      throw new Error ('レスポンスエラー:'`${response.status}`)
    }
    return response.json();
  })
  .then(data => {
    console.log(data);/*この状態だと配列 */
    console.log(data[0].category);/*この状態だと個別*/
    currentData.innerHTML = cardArea(data[0].title);
    

  
  })
  
})

const cardArea = (title) => {
  return `
    <!-- 左側カラム -->
    <div id="currentData" class="col-12 col-md-5 col-lg-4">
      <div class="card-hover-wrapper h-100">
        <button type="button" class="btn text-start p-0 w-100 h-100 card border-0 shadow-custom card-hover-inner rounded-3 overflow-hidden" data-bs-toggle="modal" data-bs-target="#modal-rpg">
          <img src="images/demoPicCat.png" class="card-img-top img-fluid rounded-top-3" alt="Demo Pic">
          <div class="card-body p-3 p-md-4 w-100 bg-white">
            <span class="badge bg-secondary-subtle text-secondary-emphasis fs-6 py-2 px-3 fw-semibold mb-3"></span>
            <h5 class="card-title fw-bold text-dark mb-3">${title}</h5>
            <p class="text-muted small mb-1">使用言語</p>
            <div class="barCharaArea"></div>
          </div>
        </button>
      </div>
    </div>
  `
}

const mordalArea = () => {
  return `
  <!-- モーダルエリア -->
  <!-- DEMO -->
  <div class="modal-header border-bottom-0 pb-0">
    <h5 class="modal-title fw-bold">RPG Battle System</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body p-4">
    <div class="row g-4 align-items-start">
      <div class="col-12 col-md-5">
        <img src="" class="img-fluid rounded-3 w-100 shadow-sm" alt="Demo Pic">
        <div class=" mt-2 mb-2"></div>
        <div class=" row row-cols-2 g-2 m-0"></div>
      </div>
      <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
        <div>
          <p class="mb-2"><strong>制作時間：</strong> ${data[0].dev_time}h</p>
          <p class="mb-2"><strong>対応端末：</strong> ※PCのみ動作</p>
          <p class="mb-2"><strong>制作概要：</strong> ${data[0].description} <small class="text-muted"><br>※制作補助としてAIを使用</small><br><small class="text-muted">※戦闘画面はAIでデザイン</small></p>
          <p class="mb-2"><strong>工夫した点：</strong><br>
            <span class="text-danger fw-bold">戦闘画面を基礎的なJavascriptで記述後、STGのロジックを応用してキャラクターの移動とエンカウント判定に使用</span>
          </p>
        </div>
      </div>
    </div>
  `
}