(() => {

  // コンフィグエリア
  const config = {
    result: 3000 // おみくじ結果を表示するまでの時間(ms)
  }
  // 上記おみくじ結果表示タイマーのID保存場所
  let timeoutId;

  const ufoFontArea = document.getElementById('ufoFontArea');

  // ufo要素生成
  const ufoArea = document.getElementById('ufoArea');
  const imgUfo = document.createElement('img');
  // おみくじを表示する場所を生成
  const fortuneArea = document.createElement('div');
  const countArea = document.createElement('div');
  // ufoに必要な属性等・各種付与
  ufoArea.style.pointerEvents = 'none';
  imgUfo.style.transform = `translate(0, 0)`;
  imgUfo.style.cursor = 'pointer';
  imgUfo.src = 'images/ufo.png';

  // 画面に表示
  ufoArea.appendChild(imgUfo);

  // 画面に画像が表示されてから、CSSより画像の大きさの値を取り出して利用
  // CSSの画像サイズを変えればjavascriptに反映される
  const rect = imgUfo.getBoundingClientRect();
  const ufoWidth = rect.width;
  const ufoHeight = rect.height;

  // ufo表示エリア情報取得
  const mainWidth = window.innerWidth;
  const mainHeight = window.innerHeight;
  // const height = document.documentElement.scrollHeight; サイト全体の高さ用
  let x;
  let y;

  // 画像の動きの状態を指定しておく
  let isUfoActive = true;

  // 動いているかどうか判断してから次の動作
  const moveUfo = () => {
    // すでに停止しているなら動かない
    if(!isUfoActive) return;

    // 動いてるなら次の座標を決めて動く
    x = Math.floor(Math.random() * (mainWidth - ufoWidth));
    y = Math.floor(Math.random() * (mainHeight - ufoHeight));
    imgUfo.style.transform = `translate(${x}px, ${y}px)`; 
  }

  // 一番最初の画面表示で画像の読み込みが終わったらufoを動かす
  window.addEventListener('load', () => {
    moveUfo();
  })

  // cssのtransitionが終わったら、また次の動きをセットして無限ループ
  imgUfo.addEventListener('transitionend', moveUfo);

  // imgUfoがクリックされた場合のイベント登録
  imgUfo.addEventListener('click', () => {
    // ufoの動きを止める
    isUfoActive = false;
    // ボタン連打防止のためクリックできないように
    imgUfo.style.pointerEvents = 'none';
    // 後ろが触れないようにpointerevents
    ufoArea.style.pointerEvents = 'auto';
    ufoArea.className = 'ufoArea bg-black bg-opacity-75';
    // 所定の位置へ
    imgUfo.style.transform = `translate(20vw, 80vh)`;

    omikuji();
    count();

    // 戻るボタンが押された場合のイベント登録
    returnBtn.addEventListener('click', () => {
      // おみくじ関係
        // 最初に生成した要素を削除する
        fortuneArea.remove();
        ufoFontArea.classList.remove('fadein');
        ufoArea.className = 'ufoArea';
        imgUfo.style.pointerEvents = 'auto';
        ufoArea.style.pointerEvents = 'none';

        // 場所情報がvwとvhになっているのでpx位置に変更
        imgUfo.style.transform = `translate(${x}px, ${y}px)`;

        // ５秒後にテキスト変更させるためのタイマーを破棄
        clearTimeout(timeoutId);

        // ufoの状態を更新して再開
        isUfoActive = true;
    })
  })

  // ufoクリックでカウント発火
  const count = () => {
    // php呼び出し
    fetch('common/ufo/ufo_count.php')
    // 開封
    .then(response => {
      if(!response.ok) {
        throw new Error (`HTMLエラー:${response.status}`)
      }
      return response.json();
    })
    // 使用
    .then(data => {
      countArea.innerHTML = `UFOがクリックされた総回数${data.countUfo.count}`;
      console.log(`${data.countUfo.count}`);
      ufoArea.appendChild(countArea);
    })
  }

  // ufoクリックで占い発火
  const omikuji = () => {

    // phpからデータ呼び出して開封
    fetch('common/ufo/omikuji.php')

    // レスポンスが返ってこないならエラーを返し、問題なければjsonでデータ呼び出し
    .then(response => {
      if(!response.ok) {
        throw new Error (`HTMLエラー： ${response.status}`)
      }
      return response.json();
    })

    // 開封したデータを使用
    .then(data => {
      // htmlをそのまま入れ込む
      fortuneArea.innerHTML =`
      <div class="ufoFont fs-2 w-100 position-fixed top-25 start-50 translate-middle-x p-4 text-center text-white">
        ▼　サーバーと通信中
      </div>
      <div></div>
      `;
      // 通信終了してテキスト上書きのためのタイマー(タイマーIDはファンクションの外)
      const timeout = () => {
        timeoutId = setTimeout(() => {
        ufoFontArea.classList.add('fadein');
        fortuneArea.innerHTML = `
        <div class="ufoFont fs-2 w-100 position-fixed top-25 start-50 translate-middle-x p-4 text-center text-white">
          ▼　通信完了 <br>
          今日の運勢は<span class="text-warning">${data.fortune}</span>
        </div>
        `;
        },config.result);
        return timeoutId;
      }
      // ファンクションの外にあるtimeoutIdに保存される
      timeoutId = timeout();
      ufoArea.appendChild(fortuneArea); // ボタン
    })
    .catch(error => {
      console.error('通信エラー', error);
    });
  }

})();
