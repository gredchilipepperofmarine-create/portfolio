const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

// 自機データ
let playerX = 180;
let playerY = 440;
const playerWidth = 40;
const playerHeight = 40;
const playerSpeed = 7;

// 残機データ
let life = 3;

// 敵データ
const enemies = [];
const enemyWidth = 40;
const enemyHeight = 40;
const enemySpeed = 7;
let enemyTimer = 0;

// 弾丸データ
const bullets = [];
const bulletWidth = 4;
const bulletHeight =10;
const bulletSpeed = 10;

// キーボード初期設定
const keys = {
  ArrowLeft: false,
  ArrowRight: false,
  ArrowUp: false,
  ArrowDown: false,
  Space: false
}

// スコア管理
let count = 0;
const score = document.getElementById("scoreText");
console.log(life);

let isGameover = false;

// キーを押したときの判定と書き換え
window.addEventListener("keydown", (e) => {
  if(e.key === "ArrowLeft") keys.ArrowLeft = true;
  if(e.key === "ArrowRight") keys.ArrowRight = true;
  if(e.key === "ArrowUp") keys.ArrowUp = true;
  if(e.key === "ArrowDown") keys.ArrowDown = true;
  if(e.key === " " || e.key === "Spacebar"){
    if(!keys.Space){
      bullets.push({
        x: playerX + playerWidth / 2 - bulletWidth / 2,
        y: playerY
      })
    }
    keys.Space = true;
  }
})

// キーを離したときの判定を書き換え
window.addEventListener("keyup", (e) => {
  if(e.key === "ArrowLeft") keys.ArrowLeft = false;
  if(e.key === "ArrowRight") keys.ArrowRight = false;
  if(e.key === "ArrowUp") keys.ArrowUp = false;
  if(e.key === "ArrowDown") keys.ArrowDown = false;
  if(e.key === " " || e.key === "Spacebar") keys.Space = false;  
})

// キーのアップデート
const update = () => {
  if(isGameover) return;
  if(keys.ArrowLeft) playerX -= playerSpeed;
  if(keys.ArrowRight) playerX += playerSpeed;
  if(keys.ArrowUp) playerY -= playerSpeed;
  if(keys.ArrowDown) playerY += playerSpeed;

  if(playerX <= 0) playerX = 0;
  if(playerX >= canvas.width - playerWidth) playerX = canvas.width - playerWidth;
  if(playerY <= 0) playerY = 0;
  if(playerY >= canvas.height - playerHeight) playerY = canvas.height - playerHeight;

  // 弾丸がy軸0(画面上部)から出たら削除
  for(let i = bullets.length -1; i >= 0; i--){
    bullets[i].y -= bulletSpeed;
    if(bullets[i].y < 0){
      bullets.splice(i, 1);
    }
  }

  //  敵の出現タイマーセット
  enemyTimer++;
  if(enemyTimer >= 60) {
    enemies.push({
      x: Math.random() * (canvas.width - enemyWidth),
      y: -enemyHeight
    })
    enemyTimer = 0;
  }

  // 敵が画面外にいったら削除
  for(let j = enemies.length - 1; j >= 0; j--) {
    enemies[j].y += enemySpeed;
    if(enemies[j].y > canvas.height){
      enemies.splice(j, 1);
    }
  }

  // 敵と自機攻撃弾丸のあたり判定
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
      count++;
      score.textContent = count;
      break;
      }
    }
  }

  // 自機と敵の当たり判定
  for(let j = enemies.length - 1; j >= 0; j--){
    if(
      playerX < enemies[j].x + enemyWidth &&
      playerX + playerWidth > enemies[j].x &&
      playerY < enemies[j].y + enemyHeight &&
      playerY + playerHeight > enemies[j].y
    ){
      if(life > 0) {
        enemies.splice(j, 1);
        life--;
      } else {
        isGameover = true;
      }
      break;
    }
  }
  
}

// 描画
const draw = () => {
  // 背景の描画
  ctx.fillStyle = "black";
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  // 自機の描画
  ctx.fillStyle = "white";
  ctx.fillRect(playerX, playerY, playerWidth, playerHeight);
  // 敵の描画
  ctx.fillStyle = "red";
  enemies.forEach((enemy) => {
    ctx.fillRect(enemy.x, enemy.y, enemyWidth, enemyHeight);
  })
  // 弾丸の描画
  ctx.fillStyle = "yellow";
  bullets.forEach((bullet) => {
    ctx.fillRect(bullet.x, bullet.y, bulletWidth, bulletHeight);
  })
  // GAME OVERの描画
  if(isGameover){
    ctx.fillStyle = "red";
    ctx.font = "bold 40px sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText("GAME OVER", canvas.width / 2, canvas.height / 2);
  }
}

const gameLoop = () => {
  update();
  draw();
  requestAnimationFrame(gameLoop);
}
gameLoop();
