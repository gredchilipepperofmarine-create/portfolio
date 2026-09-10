const confirmForm = document.getElementById('confirmForm');
const stepConfirm = document.getElementById('stepConfirm');
const btnToConfirm = document.getElementById('btnToConfirm');
const btnBackToInput = document.getElementById('btnBackToInput');
const workForm = document.getElementById('workForm');

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
    console.log(`呼び出しと取得はOK: ${data.result}`);
  })
  
})