
const countDownTimer = (countDownSec) => {

  const config = {
    readInterval: 10, // 何%おきに読み上げるか
    maxWidth: 100, // プログレスバーの最大
    // 〇秒/1回繰り返す(数値はcountDown()の下)
  }

  let currentWidth = 0;
  let currentValueNow = 0;
  let timerId = null;

  const addwidth = 10/countDownSec; // (100% / countDoownSec(s)) / 10(0.1sに進む量を出す)
  const prgPlace = document.querySelector('.progress-bar');
  const progress = document.querySelector('.progress');
  if(!prgPlace || !progress) return;

  const countDown = () => {
    timerId = setTimeout(() => {
      currentWidth += addwidth;
      prgPlace.style.width = `${currentWidth}%`;
      // 四捨五入して余計な端数を消す
      const roundedWidth = Math.round(currentWidth);
      // 10で割り切れるか、かつすでに読み上げた数値でないことを確認
      if(roundedWidth % config.readInterval === 0 && roundedWidth !== currentValueNow){
        // 読み上げた最新の数値を更新
        currentValueNow = roundedWidth;
        // 数値を代入する
        progress.setAttribute('aria-valuenow', roundedWidth);
      }
      if(currentWidth > config.maxWidth){
        clearTimeout(timerId);
        return;
      }
      countDown();
    }, 100); // 0.1sに1回繰り返す
  }
  countDown();
}
// countDownTimer(10);
window.countDownTimer = countDownTimer;

