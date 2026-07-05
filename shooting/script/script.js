const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

// 自機描画データ
let playerX = 180;
let playerY = 440;
const playerWidth = 40;
const playerHeight = 40;
const playerSpeed = 7;

// 自機弾丸描画データ
const bullets = [];
const bulletWidth = 4;
const bulletHeight = 10;
const bulletSpeed = 7;

// 敵描画データ
const enemies = [];
const enemyWidth = 30;
const enemyHeight = 30;
const enemySpeed = 2;
let enemyTimer = 0;

// キーボード初期設定
const keys = {
  ArrowLeft: false,
  ArrowRight: false,
  ArrowUp: false,
  ArrowDown: false,
  Space: false
}
let isGameover = false;

// キーを押したときの判定と書き換え
window.addEventListener("keydown", (e) => {
  if(e.key === "ArrowLeft") keys.ArrowLeft = true;
  if(e.key === "ArrowRight") keys.ArrowRight = true;
  if(e.key === "ArrowUp") keys.ArrowUp = true; // jibundekaita
  if(e.key === "ArrowDown") keys.ArrowDown = true; // jibundekaita
  if(e.key === " " || e.key === "Spacebar"){
    if(!keys.Space) {
      bullets.push({
        x: playerX + playerWidth / 2 - bulletWidth / 2,
        y: playerY
      })
    }
    keys.Space = true;
  }
})

// キーを離したときの判定と書き換え
window.addEventListener("keyup", (e) => {
  if(e.key === "ArrowLeft") keys.ArrowLeft = false;
  if(e.key === "ArrowRight") keys.ArrowRight = false;
  if(e.key === "ArrowUp") keys.ArrowUp = false; // jibundekaita
  if(e.key === "ArrowDown") keys.ArrowDown = false; // jibundekaita
  if(e.key === " " || e.key === "Spacebar") keys.Space = false;
})

// キーのアップデート
const update = () => {
  // ifは中身がtrueの時のみ実行されるので、初期falseの時はスルーされて次へ行く
  if(isGameover) return;
  if(keys.ArrowLeft) playerX -= playerSpeed;
  if(keys.ArrowRight) playerX += playerSpeed;
  if(keys.ArrowUp) playerY -= playerSpeed;
  if(keys.ArrowDown) playerY += playerSpeed;

  // jibundekaitabubun
  if(playerX <= 0) playerX = 0;
  if(playerX >= canvas.width - playerWidth) playerX = canvas.width - playerWidth;
  if(playerY <= 0) playerY = 0;
  if(playerY >= canvas.height - playerHeight) playerY = canvas.height - playerHeight;


  // 弾丸がy軸0(画面上部)からでたら削除
  for(let i = bullets.length - 1; i >= 0; i--){
    bullets[i].y -= bulletSpeed;
    if(bullets[i].y < 0){
      bullets.splice(i, 1);
    }
  }
  // 敵の出現タイマーセット
  enemyTimer++;
  if(enemyTimer >= 60) {
    enemies.push({
      x: Math.random() * (canvas.width - enemyWidth),
      y: -enemyHeight
    })
    enemyTimer = 0;
  }
  // キャンバスの外へ出たら削除
  for(let j = enemies.length - 1; j >= 0; j--){
    enemies[j].y += enemySpeed;
    if(enemies[j].y > canvas.height) {
      enemies.splice(j, 1);
    }
  }
  // 自機の攻撃＆敵の当たり判定
  for(let i = bullets.length - 1; i >= 0; i--){
    for(let j = enemies.length - 1; j >= 0; j--){
      if(
        bullets[i].x < enemies[j].x + enemyWidth &&
        bullets[i].x + bulletWidth > enemies[j].x &&
        bullets[i].y < enemies[j].y + enemyHeight &&
        bullets[i].y + bulletHeight > enemies[j].y
      ){
        bullets.splice(i, 1);
        enemies.splice(j, 1);
        break;
      }
    }
  }
  // 自機＆敵の当たり判定
  for(let j = enemies.length - 1; j >= 0; j--){
    if(
      playerX < enemies[j].x + enemyWidth &&
      playerX + playerWidth > enemies[j].x &&
      playerY < enemies[j].y + enemyHeight &&
      playerY + playerHeight > enemies[j].y
    ){
      isGameover = true;
      break;
    }
  }
};

const draw = () => { 
  // 画面描画
  ctx.fillStyle = "black";
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  // 自機描画
  ctx.fillStyle = "white";
  ctx.fillRect(playerX, playerY, playerWidth, playerHeight);

  // 弾丸描画
  ctx.fillStyle = "yellow";
  bullets.forEach((bullet) => {
    ctx.fillRect(bullet.x, bullet.y, bulletWidth, bulletHeight);
  })

  // 敵描画
  ctx.fillStyle = "red";
  enemies.forEach((enemy) => {
    ctx.fillRect(enemy.x, enemy.y, enemyWidth, enemyHeight);
  })

  // ifは中身がtrueの時のみ実行される
  if(isGameover) {
    ctx.fillStyle = "red";
    ctx.font = "bold 40px sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText("GAME OVER", canvas.width / 2, canvas.height / 2);
  }
}

// ループ作成
const gameLoop = () => {
  update();
  draw();
  requestAnimationFrame(gameLoop);
}
gameLoop();


















// 解説付き↓
// // HTMLのCanvas要素を取得する
// const canvas = document.getElementById("gameCanvas");
// const ctx = canvas.getContext("2d");

// // 自機の位置情報(データ)
// // ｘ画面左端が0、右端が400。letなのはこの後動かす予定があるから
// let playerX = 180;
// // y画面上部が0，下部が500。letなのはこの後動かす予定があるから
// let playerY = 440;
// const playerWidth = 40;
// const playerHeight = 40;
// const playerSpeed = 5;

// // 弾丸のデータ
// const bullets = [];
// const bulletWidth = 4;
// const bulletHeight = 10;
// const bulletSpeed = 7;

// // 敵のデータ
// const enemies = [];
// const enemyWidth = 30;
// const enemyHeight = 30;
// const enemySpeed = 2; // 降りてくるスピード
// let enemyTimer = 0; // 定期的に出現させるためのタイマー

// // キーボードの左右が押されているかを記録するメモ帳
// const keys = {
//   ArrowLeft: false,
//   ArrowRight: false,
//   Space: false
// };

// // キーボードが押された瞬間をイベントをキャッチ
// window.addEventListener("keydown", (e) => {
  // e.keyとは、javascriptの指定のデータのこと。e.typeやe.targetなどもある。
  // e.keyとは実際に押されたボタンのことを指す
//   if(e.key === "ArrowLeft") keys.ArrowLeft = true;
//   if(e.key === "ArrowRight") keys.ArrowRight = true;
//   if(e.key === " " || e.key === "Spacebar") {

//       // スペースを押した瞬間の判定はまだ「false」なので、この「!keys.Space」の条件にあう
//       // そのため1発だけ発射される。押した瞬間にkeys.spaceでtrueに書き換わるので、
//       // 弾丸は連射されない
//     if(!keys.Space) {

//       // pushを使い、bullets[]の中に描画した弾丸をしまう
//       bullets.push({
//         // playerx=自機の場所(左上基準)　playerWidth=自機の大きさ
//         // playerXで自機の左上の位置+playerWidthで自機の真ん中へ合わせる
//         // bulletwidthを足すと弾丸に左端が真ん中になってしまうので、1/2分ずらして真ん中にする
//         x: playerX + playerWidth / 2 - bulletWidth / 2,
//         y: playerY // これはつまりy(縦)の座標データ
//         // ここまでのコードで、スペースを押すたびにbullets[]のかっこの中に、座標ｘと座標yを放り込んでる！
//       });
//     }
//     keys.Space = true;
//   }
// });

// // キーボードが離された瞬間をキャッチ
// window.addEventListener("keyup",(e) => {
//   if(e.key === "ArrowLeft") keys.ArrowLeft = false;
//   if(e.key === "ArrowRight") keys.ArrowRight = false;
//   // スペースキーが離された瞬間に、またfalseに書き換わるので、押した回数だけ弾丸が発射される
//   if(e.key === " " || e.key === "Spacebar") keys.Space = false;
// })

// // データ更新
// const update = () => {
//   // 左キーが押されていたらｘ座標を減らす(左に動く)
//   if(keys.ArrowLeft) {playerX -= playerSpeed;}
//   // 右キーが押されていたらｘ座標を増やす(右に動く)
//   if(keys.ArrowRight) {playerX += playerSpeed;}
  
//   // splice()とは、配列の中から指定した中身を切り取って捨てるということ
//   // splice(消し始めの背番号,消す個数)
//   for(let i = bullets.length - 1; i >= 0; i--){
//     bullets[i].y -= bulletSpeed;
//     // bullets[i].yとは、bullets[]の中に放り込んだy軸の座標データのこと
//     if(bullets[i].y < 0) { // y軸が0以下(画面の外に出たら)
//       bullets.splice(i, 1); // spliceで消す
//     }
//   }

//   // 敵の自動出現(1秒に1回出現)
//   enemyTimer++;
//   if(enemyTimer >= 60) { // 1秒間に60回ループするので60カウント(=1秒)
//     enemies.push({
//       x: Math.random() * (canvas.width -enemyWidth), // 画面の横幅の中でランダムな位置
//       y: -enemyHeight // 画面のすぐ外(上端)に出現させて登場
//     })
//     enemyTimer = 0;
//   }

//   // 敵の移動と管理
//   for(let j = enemies.length - 1; j >= 0; j--){
//     enemies[j].y += enemySpeed;

//     if(enemies[j].y > canvas.height) {
//       enemies.splice(j, 1);
//     }
//   }

//   // 当たり判定
//   for(let i = bullets.length - 1; i >= 0; i--){
//     for(let j = enemies.length - 1; j >= 0; j--){
//       if(
//         bullets[i].x < enemies[j].x + enemyWidth &&
//         bullets[i].x + bulletWidth > enemies[j].x &&
//         bullets[i].y < enemies[j].y + enemyHeight &&
//         bullets[i].y + bulletHeight > enemies[j].y
//       ){
//         bullets.splice(i, 1);
//         enemies.splice(j, 1);
//         break;
//       }
//     }
//   }
// }


// // 描画する関数
// const draw = () => {

//   // 画面全体を黒で塗りつぶす
//   ctx.fillStyle = "black";
//   // 画面左上(0,0)からcanvasの横幅・縦幅いっぱいに塗る
//   // ctx.fillRectでブラウザに絵が描かれる
//   // ctx.fillRect(塗はじめのスタート地点x, 塗はじめのスタート地点y, 横幅, 縦幅)
//   // canvas.width=HTMLで設定したCanvasの横幅(今回はwidth:400, height:500)
//   ctx.fillRect(0, 0, canvas.width, canvas.height);

//   // 自機を描く
//   ctx.fillStyle = "white";
//   ctx.fillRect(playerX, playerY, playerWidth, playerHeight);

//   // 全ての弾丸の描画
//   ctx.fillStyle = "yellow";
//   // 自機と違って弾丸は何個も(ランダムで)画面上に存在することになる
//   // そのためbullet[]で箱の中にpushしている
//   // その都合上、forEachで「弾丸のすべてをとりだして描画して」というコードが必要になる
//   bullets.forEach((bullet) => {
//     ctx.fillRect(bullet.x, bullet.y, bulletWidth, bulletHeight);
//   })

//   // 全ての敵の描画(赤)
//   ctx.fillStyle = "red";
//   enemies.forEach((enemy) => {
//     ctx.fillRect(enemy.x, enemy.y, enemyWidth, enemyHeight);
//   });
// }

// // ゲームループ(自動パラパラ漫画の仕組み)
// const gameLoop = () => {
//   update();
//   draw();
//   // requestAnimationFrame=ブラウザにとって最適なタイミングで呼び出す
//   // 最適なタイミング=リフレッシュレート。1秒間に60回画面を書き換えるモニター能力なら1秒間に60回書き換えるし、
//   // 144Hzのゲーミングモニターなら1秒間に144回書き換えることになる
//   // 世の中のほとんどの標準的なパソコンやスマホ画面が1秒間に60回(60Hz)を基準に作られてる
//   requestAnimationFrame(gameLoop);
// }
// gameLoop();