// ( () => {} )();　即時関数IIFE(Immediately Invoked Function Expression)
// 即座にその場で一回だけ実行される関数
// グローバル汚染を防ぐため囲ってある
// 最近は<script type="module" src="ファイル名.js"></script>をheadに記述することで
// グローバル汚染を防ぐ仕様になっているが、それが適用できない古いサイトなどでは
// 即時関数を使って記述する場合がある

(() => {
  const openBtn = document.querySelector(".creates");
  const createBox = document.querySelector(".subList");
  const overlay = document.querySelector(".overlay");

  // 各種クラスや要素が存在しないページでnullを返してエラーを起こさないための記述
  if(!openBtn || !createBox || !overlay) return;

  // トグル操作関数
  const toggleMenu = (isOpen) => {
    createBox.classList.toggle("open", isOpen);
    overlay.classList.toggle("open", isOpen);
  }

  // createsをクリックした際の動作
  // containを使って、createBoxにopenがついてるか真偽値で判定
  // 何かが起こってオーバーレイとのopenクラスつけ外しがずれてもエラーが起きないように
  // openクラスつけ外しを、createBoxの状態に合わせるための記述
  // falseなら今閉じているから、openを追加して開ける
  openBtn.addEventListener('click', () => {
    const isCurrentlyOpen = createBox.classList.contains("open");
    toggleMenu(!isCurrentlyOpen); 
  })

  overlay.addEventListener('click', (e) => {
    toggleMenu(false);
  })

  createBox.addEventListener('click', (e) => {
    const target = e.target.closest('a');
    if(target){
      toggleMenu(false);
    }
  })
})();


