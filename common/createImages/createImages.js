(() => {

  // 生成する画像のコンフィグエリア
  const configCloud = {
    path: ["images/cloud.png", "images/cloud01.png"],
    className: ["cloud"],
    element: 'img',
    size: {min: 50, max: 150},
    positionY: {min: 10, max: 1000},
    speed: {min: 2, max: 20},
    interval: {min: 1000, max: 1500},
    lastTime: 0,
    currentInterval: 0,
    createInterval: 0
  }
  const configOther = {
    path: [
      "images/dragon.png",
      "images/purea.png",
      "images/skeleton.png",
      "images/usada.png"
    ],
    className: ["backItem", "shake"],
    element: 'img',
    size: {min: 50, max: 150},
    positionY: {min: 1000, max: 5000},
    speed: {min: 2, max: 20},
    interval: {min: 1000, max: 1500},
    lastTime: 0,
    createInterval: 0
  }
  const configUfo = {
    path: ["images/ufo.png"],
    className: ["ufo"],
    element: 'button',
    size: {min: 50, max: 150},
    positionY: {min: 1000, max: 5000},
    speed: {min: 0, max: 0},
    interval: {min: 6000, max: 6000},
    lastTime: 0,
    createInterval: 0
  }

  // 付与するアニメーションのコンフィグエリア
  // 各種最大の値をここで設定
  const configAnimation = {
    deg: 0, // 単位: deg
    x: 50,
    y: 50
  }

  // 読み込み完了と同時に生成開始
  window.addEventListener('DOMContentLoaded', () => {

    // コンフィグを追加したらここへファンクション呼び出しを追加
    timeCtl(configCloud);
    timeCtl(configOther);
    timeCtl(configUfo);
  })
  
  // 画像生成と制御ファンクション
  const createImages = (targetConfig) => {

    // HTMLにimgタグを生成して画像をセット
    const stage = document.getElementById('backArea');
    if(!stage) return;


    const element = document.createElement(targetConfig.element);

    // 画像パスとクラス名セット
    if(targetConfig === configUfo){
      // UFO専用
      const imgUfo = document.createElement('img');
      const randomImg = Math.floor(Math.random() * targetConfig.path.length);
      const randomClass = Math.floor(Math.random() * targetConfig.className.length);

      imgUfo.src = targetConfig.path[randomImg];
      imgUfo.className = targetConfig.className[randomClass];
      
      element.type = "button";

      element.appendChild(imgUfo);
    } else {
      const randomImg = Math.floor(Math.random() * targetConfig.path.length);
      const randomClass = Math.floor(Math.random() * targetConfig.className.length);

      element.src = targetConfig.path[randomImg];
      element.className = targetConfig.className[randomClass];
    }

    // アニメーション用の数値設定
    const randDeg = configAnimation.deg;
    const randX = configAnimation.x;
    const randY = configAnimation.y;
    element.style.setProperty('--randX', `${randX}px`);
    element.style.setProperty('--randY', `${randY}px`);
    element.style.setProperty('--randDeg', `${randDeg}deg`);

    // サイズをランダムに設定
    const size = Math.random() * (targetConfig.size.max - targetConfig.size.min) + targetConfig.size.min;
    element.style.width = `${size}px`;

    // 縦方向をランダムに設定
    const randomY = Math.random()*(targetConfig.positionY.max - targetConfig.positionY.min) + targetConfig.positionY.min;
    element.style.top = `${randomY}px`;
    
    // 流れるスピードをランダムに設定
    const speed = Math.random()*(targetConfig.speed.max - targetConfig.speed.min) + targetConfig.speed.min;
    element.style.setProperty('--duration', `${speed}s`);

    stage.appendChild(element);

    // アニメーションが終了と同時に削除
    element.addEventListener('animationend', () => {
      element.remove();
    })
    
  }
  const timeCtl = (targetConfig) => {
    // 今画面見て何秒経過したか
    const currentTime = performance.now();
    // まだcreateIntervalが0か0以下(残り時間の計算がない)なら
    if (targetConfig.createInterval <= 0){
      // 雲を生成してインターバルをランダムに決める
      createImages(targetConfig);
      const createInterval = Math.random() * (targetConfig.interval.max - targetConfig.interval.min) + targetConfig.interval.min;
      // インターバルを定数に入れて使いまわす。
      targetConfig.createInterval = createInterval;
    }
      // ifを通過して次のif判定をする
      // targetConfig.createIntervalを外の箱から持ってきて判定
      // 「今」の時間から「さっきまでの時間」を引いて差分を出す
      const deltaTime = currentTime - targetConfig.lastTime;
      // 「今の時間」を更新してまた外の箱に入れておく(繰り返し処理のため)
      targetConfig.lastTime = currentTime;
      // さっき定義した差分を、インターバルから引く
      targetConfig.createInterval -= deltaTime;
      // 次の予約をして繰り返す
      requestAnimationFrame( () => {
        timeCtl(targetConfig);
      });
    }
  
})();



// 画面の外にたまってしまう計算
  // 生成時間をランダムに設定して繰り返す
  // const timeCtl = (targetConfig) => {
  //   createImages(targetConfig);
  //   const createInterval = Math.random() * (targetConfig.interval.max - targetConfig.interval.min) + targetConfig.interval.min;
  //     setTimeout(() => {
  //       timeCtl(targetConfig);
  //     }, createInterval);
  // }
