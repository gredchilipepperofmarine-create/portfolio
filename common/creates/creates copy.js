const confirmForm = document.getElementById('confirmForm');
const stepConfirm = document.getElementById('stepConfirm');
const btnToConfirm = document.getElementById('btnToConfirm');
const workForm = document.getElementById('workForm');

let repoDataBox = {}

btnToConfirm.addEventListener('click', () => {
  stepConfirm.classList.remove('d-none');

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


confirmForm.addEventListener('submit', (e) => {
  // 標準機能でページ遷移するのを止める
  e.preventDefault();

  // 送信するための空の箱を定義
  const confirmFormData = new FormData(confirmForm);

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



// get_creates.phpの下部
// <?php foreach($data_all as $product): ?>
//   <div class="container text-center py-3">
//     <div style="border: 1px solid #E6CCB2;">
//       <div><?= $product['id'] ?></div>
//       <div><?= $product['category'] ?></div>
//       <div><?= $product['title'] ?></div>
//       <div><?= $product['description'] ?></div>
//       <div><?= $product['dev_time'] ?></div>
//       <div><?= $product['is_guest'] ?></div>
//       <div><?= $product['created_at'] ?></div>
//     </div>
//   </div>


// <?php endforeach; ?>