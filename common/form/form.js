const form = document.getElementById('form');
const targetArea =document.getElementById('targetArea');
const staticBackdrop = document.querySelector('#staticBackdrop');
const focusBtn = document.getElementById('focusBtn');
const myCollapse = new bootstrap.Collapse(document.getElementById('collapseWidthExample'), {
  toggle : false
});
// フォーカスの位置を戻すための空の箱
let focusTarget = null;

// 最初のモーダルAを開くときに、ここへモーダルのゴールを設定
focusBtn.addEventListener('click', (e) => {
  focusTarget = e.currentTarget;
})

form.addEventListener('submit', (e) => {
  // formの標準機能でページ遷移されるのを止める
  e.preventDefault();
  // モーダルAの中のformボタンが押されたら、モーダルAを閉じる
  myCollapse.hide();

  // モーダルBが現れたら、モーダルB内に確実にフォーカス移動させる
  // 勝手にbodyにフォーカスが落ちることを防ぐ
  staticBackdrop.addEventListener('shown.bs.modal', () => {
    const closeBtn = staticBackdrop.querySelector('.closeBtn');
    if(closeBtn) {
      closeBtn.focus();
    }
  });

  // formを使用した場合に中身を送信するための空の箱
  const formData = new FormData(form);
  
  // php呼び出し
  fetch('common/form/get-name.php',{
    method: 'POST',
    body: formData
  })

  // データが返ってこないならエラーを返し、問題がなければ開封して.thenに入れる
  .then(response => {
  if(!response.ok){
    throw new Error ('HTMLエラー：' `${response.status}`)
  }
  return response.json();
  })
  .then(data => {
    targetArea.innerHTML = `
      ${data.result}さん
    `;
  })
})

// モーダルBが閉じられる瞬間(hide.bs.modal)に、
staticBackdrop.addEventListener('hide.bs.modal', () => {
  // 今フォーカスが当たっている要素(activeElementがあるなら)から
  if(document.activeElement instanceof HTMLElement) {
    // フォーカスをはずす(blurして浮かせる)
    document.activeElement.blur();
  }
});

// モーダルBが完全に閉じられたら(hidden.bs.modal)
staticBackdrop.addEventListener('hidden.bs.modal', () => {
  // フォーカスをfocusTargetに戻す
if(focusTarget) {
  // requestAnimationFrameを挟むことで、確実に「完全に閉じられた瞬間」に実行される
    requestAnimationFrame(() => {
      focusTarget.focus();
      // console.log('フォーカス戻した後のActiveElement:', document.activeElement);
      // focusTargetを初期状態に戻して次回の誤作動防止
      focusTarget = null;
    })
  }
})

document.addEventListener('focusin', () => {
  console.log('【フォーカス移動】現在の要素:', document.activeElement);
});
