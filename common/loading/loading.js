
// オープニングからサイト本編へ戻る起動スイッチ
// setTimeoutとは「タイマーセットと同時に、識別IDを発行してreturnで返す」

const loading = () => {

  const config = {
    FirstBtnClickTime: 8000, // ms　自動で次に進むまでの時間
    frontAreaFadeout: 5000, // ms
    loadAreaFadeout: 3000, // ms
    countDownTimer: 5 // s　100%になるまでの時間
  }

  const loadArea = document.getElementById('loadArea');
  const frontArea = document.querySelector('.frontArea');
  const fukidashiArea = document.querySelector('.fukidashiArea');
  const openBox = document.querySelector('.openBtn');
  const textArea = document.querySelector('.textArea');
  const imgArea = document.querySelector('.imgArea');
  
  if (
    !loadArea || !frontArea || !fukidashiArea ||
    !openBox || !textArea || !imgArea
  ) return;

  // addeventlistenerは2重登録しないよう注意
  imgArea.addEventListener('animationend', () => {
    textArea.classList.remove('isHide');
  })

  // 宝箱クリック後右下に移動してテキスト表示
  // openBox.onclick = () => {
  //   openBox.classList.add('openBoxAction');
  //   openBox.src = "images/treasureRedOpen.png";
  //   window.countDownTimer(5);
  // }
  // openIntro.addEventListener('animationend', () => {
  //   textArea.classList.remove('isHide');
  // })

  // 自動で進むタイマーを作成してクリックしなくても進む
  // const timeOutで戻り値(setTimeoutの固有ID)を捕まえる
  const timeOut = setTimeout(() => {
    openBox.click();
    // setTimeout(() => {
    //   frontArea.classList.add('loaded');
    //   setTimeout(() => {
    //     loadArea.classList.add('loaded');
    //   }, 7000);
    // }, 5000);
  }, config.FirstBtnClickTime);

  // クリックされたら
  // 画像差し替えて動かし、テキストとプログレスバーを表示
  // かつ裏のタイマーを止めて、サイトへ行く
  openBox.addEventListener('click', () => {
    // ボタン連打で崩れるのをガード
    const check = imgArea.classList.contains('openIntro');
    if(check) return;
    imgArea.classList.add('openIntro');
    fukidashiArea.classList.add('delete');
    openBox.classList.add('openBoxAction');
    openBox.src = "images/treasureRedOpen.png";
    window.countDownTimer(config.countDownTimer);
    // addeventlistenerの２重登録していたので移動
    // openIntro.addEventListener('animationend', () => {
    //   textArea.classList.remove('isHide');
    // })

    setTimeout(() => {
      frontArea.classList.add('loaded');
      setTimeout(() => {
        loadArea.classList.add('loaded');
      }, config.loadAreaFadeout);
    }, config.frontAreaFadeout);
    clearTimeout(timeOut);
    return;
  })

  // // ユーザーがクリックしたら裏のタイマーを止める
  // openBox.addEventListener('click', () => {
  //     imgArea.classList.add('openIntro');
  //     fukidashiArea.classList.add('delete');
  //     setTimeout(() => {
  //       frontArea.classList.add('loaded');
  //       setTimeout(() => {
  //         loadArea.classList.add('loaded');
  //       }, 6000)
  //     }, 5000);
  //     clearTimeout(timeOut);
  //     return;
  // })

}
loading();

// const openBox = document.querySelector('.openBtn');
// openBox.onclick = () => {
//   openBox.classList.add('openBoxAction');
//   openBox.src = "images/treasureRedOpen.png";
//   window.countDownTimer(5);
// }
// const openIntro = document.querySelector('.imgArea');
// const textArea = document.querySelector('.textArea');
// openIntro.addEventListener('animationend', () => {
//   textArea.classList.remove('isHide');
// })


// うまくいかなかったときのためのコピー　7/3
// // オープニングの宝箱クリックでイントロへ

// const openBox = document.querySelector('.openBtn');
// openBox.onclick = () => {
//   console.log('クリックされた');
//   openBox.classList.add('openBoxAction');
//   openBox.src = "images/treasureRedOpen.png";
// }

// // オープニングからサイト本編へ戻る起動スイッチ
// // setTimeoutとは「タイマーセットと同時に、識別IDを発行してreturnで返す」

// const loading = () => {
//   const loadArea = document.getElementById('loadArea');
//   const frontArea = document.querySelector('.frontArea');
//   const clickMe = document.querySelector('.clickMe');
//   const fukidashiArea = document.querySelector('.fukidashiArea')


//   if (!loadArea || !frontArea) return;

//   // 自動で進むタイマーを作成してクリックしなくても進む
//   // returnで戻り値(setTimeoutの固有ID)を捕まえる
//   const timeOut = () => {
//     return setTimeout(() => {
//       frontArea.classList.add('loaded');
//       setTimeout(() => {
//       loadArea.classList.add('loaded');
//       }, 13000)
//     }, 10000);
//   }
//   // ユーザーがクリックしたかどうかの判定前にタイマーをセットして実行。戻り値を捕まえておく
//   const setTimeoutId = timeOut();

//   loadArea.addEventListener('click', (e) => {
//     const imgArea = e.target.closest(".imgArea");
//     if(imgArea){
//       frontArea.classList.add('loaded');
//       fukidashiArea.classList.add('delete');
//       // clickMe.classList.add('delete');
//       setTimeout(() => {
//         loadArea.classList.add('loaded');
//       }, 5000);
//       clearTimeout(setTimeoutId);
//       return;
//     } 
//   })
// }
// loading();

