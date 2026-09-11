const confirmForm = document.getElementById('confirmForm');
const stepConfirm = document.getElementById('stepConfirm');
const btnToConfirm = document.getElementById('btnToConfirm');
const btnBackToInput = document.getElementById('btnBackToInput');
const workForm = document.getElementById('workForm');
const currentTitle = document.getElementById('currentTitle');
const mordalArea = document.getElementById('mordalArea');

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
    console.log(data[0].description);/*この状態だと個別*/
    currentTitle.innerHTML = cardArea(data[0].title);
    mordalArea.innerHTML = mordalTimeDes(data[0].dev_time, data[0].description);

  
  })
  
})

const cardArea = (title) => {
  return `<h5 class="card-title fw-bold text-dark mb-3">${title}</h5>`
}

const mordalTimeDes = (devTime, description) => {
  return `
      <p class="mb-2"><strong>制作時間：</strong> ${devTime}h</p>
      <p class="mb-2"><strong>対応端末：</strong> ※PCのみ動作</p>
      <p class="mb-2"><strong>制作概要：</strong> ${description}</p>
      <p class="mb-2"><strong>工夫した点：</strong><br>
        <span class="text-danger fw-bold">戦闘画面を基礎的なJavascriptで記述後、STGのロジックを応用してキャラクターの移動とエンカウント判定に使用</span>
      </p>
  `
}