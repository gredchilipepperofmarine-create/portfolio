
const shooting = () => {

  const canvas = document.getElementById("drawArea");
  const ctx = canvas.getContext("2d");

  // 自機config
  let playerX = 130; // 自機初期位置x
  let playerY = 450; // 自機初期位置y
  let playerPosition = {
    x:playerX,
    y:playerY
  }
  let isgameOver = false;
  const playerWidth = 40;
  const playerHeight = 40;
  const playerSpeed = 5;
  const playerImage = new Image();
  playerImage.src = 'images/catIcon.png';

  // Lifeconfig
  let life = 3;
  const lifeNo = document.querySelector('.lifeNo');
  lifeNo.textContent = life;

  // スコアconfig
  let score = 0;
  const scoreNo = document.querySelector('.scoreNo');

  // 敵config
  let enemies = [];
  let enemyCreate = 0; // 今何周しているかの確認カウント。enemyCreateTiming周したら0にしている
  const enemyCreateTiming =  15; // 何周に1回敵を生成するか※１秒に60周を基本の考えとしている
  const enemyWidth = 30;
  const enemyHeight = 25;
  const enemySpeed = 4;
  const enemyImg = new Image();
  enemyImg.src = 'images/kanFishClose.png';

  // 弾丸config
  let bullets = [];
  const bulletWidth = 20;
  const bulletHeight = 15;
  const bulletSpeed = 5;
  let bulletCreate = 0; // 今何周しているかの確認カウント。
  const bulletCreateTiming = 13; // 何周に1回弾丸を生成するか※１秒に60周を基本の考えとしている
  const bulletImg = new Image();
  bulletImg.src = 'images/ashiatoBlack.png';

  // キーボード初期設定
  let key = {
    ArrowUp: false,
    ArrowDown: false,
    ArrowLeft: false,
    ArrowRight: false,
    X: false
  }

  document.addEventListener('keydown', (e)=> {
    console.log('押されたキー：', e.key);
    if(e.key === "ArrowUp" || e.key === "w" || e.key === "W") key.ArrowUp = true;
    if(e.key === "ArrowDown" || e.key === "s" || e.key === "S") key.ArrowDown = true;
    if(e.key === "ArrowLeft" || e.key === "a" || e.key === "A") key.ArrowLeft = true;
    if(e.key === "ArrowRight" || e.key === "d" || e.key === "D") key.ArrowRight = true;
    if(e.key === " " || e.key === "Spacebar" || e.key === "x" || e.key === "X") key.X = true;
  })

  document.addEventListener('keyup', (e) => {
    if(e.key === "ArrowUp" || e.key === "w" || e.key === "W") key.ArrowUp = false;
    if(e.key === "ArrowDown" || e.key === "s" || e.key === "S") key.ArrowDown = false;
    if(e.key === "ArrowLeft" || e.key === "a" || e.key === "A") key.ArrowLeft = false;
    if(e.key === "ArrowRight" || e.key === "d" || e.key === "D") key.ArrowRight = false;
    if(e.key === " " || e.key === "Spacebar" || e.key === "x" || e.key === "X") {
      key.X = false;
      // キーアップしたらカウントを0にして連打できるように
      bulletCreate = 0;
    }
  })

  const update = () => {
    if(isgameOver) return; // ゲームオーバーなら以降の処理が走らない
    if(key.ArrowUp) playerPosition.y -= playerSpeed;
    if(key.ArrowDown) playerPosition.y += playerSpeed;
    if(key.ArrowLeft) playerPosition.x -= playerSpeed;
    if(key.ArrowRight) playerPosition.x += playerSpeed;
    if(key.X) {
      // カウントが0の時だけ発射
      if(bulletCreate === 0){
        bullets.push({
          x: playerPosition.x + playerWidth / 2 - bulletWidth / 2,
          y: playerPosition.y - playerHeight / 2
        })
      }
      // 押し続けでカウントアップして連射
      bulletCreate++;
      if(bulletCreate >= bulletCreateTiming) {
        // 既定のカウントがたまったらカウントを0に戻して発射
        bulletCreate = 0;
      }
    }

    // 自機がフレームの外に出ないように
    if(playerPosition.y <= 0) playerPosition.y = 0;
    if(playerPosition.y >= canvas.height - playerHeight) playerPosition.y = canvas.height - playerHeight;
    if(playerPosition.x <= 0) playerPosition.x = 0;
    if(playerPosition.x >= canvas.width - playerWidth) playerPosition.x = canvas.width - playerWidth;
    
    // 弾丸動きと削除
    if(bullets.length > 0){
      for(let i = bullets.length - 1; i >= 0; i--){
        bullets[i].y -= bulletSpeed;
        if(bullets[i].y < 0){
          // spliceは配列にのみ使用できるからbullets[i].spliceとは記述しない
          bullets.splice(i, 1);
        }
      }
    }

    // 敵生成
    enemyCreate++; // 生成のためのカウント
    if(enemyCreate >= enemyCreateTiming) {
      enemyCreate = 0; // 1回敵を生成したらカウントを0にする
      enemies.push({
        x: Math.random() * (canvas.width - enemyWidth),
        y: 0 - enemyHeight
      })
    }
    // 敵動きと削除
    for(let j = enemies.length - 1; j >= 0; j--){
      enemies[j].y += enemySpeed;
      if(enemies[j].y > canvas.height + enemyHeight) {
        enemies.splice(j, 1);
      }
    }

    // 敵と弾丸の当たり判定
    for(let i = bullets.length - 1; i >= 0; i--) {
      for(let j = enemies.length - 1; j >= 0; j--){
        if(
          enemies[j].x < bullets[i].x + bulletWidth &&
          enemies[j].x + enemyWidth > bullets[i].x &&
          enemies[j].y < bullets[i].y &&
          enemies[j].y + enemyHeight > bullets[i].y
        ) {
          score++;
          scoreNo.textContent = score;
          enemies.splice(j, 1);
          bullets.splice(i, 1);
          break;
        }
      }
    }

    // 敵と自機の当たり判定
    // for(let k = life; k >= 0; k--) {
    for(let j = enemies.length - 1; j >= 0; j--){
      if(
        enemies[j].x < playerPosition.x + playerWidth &&
        enemies[j].x + enemyWidth > playerPosition.x &&
        enemies[j].y < playerPosition.y + playerHeight &&
        enemies[j].y + enemyHeight > playerPosition.y
      ) {
      // まだ体力がある場合
      if(life > 1) {
        enemies.splice(j, 1);
        playerPosition.x = playerX;
        playerPosition.y = playerY;
        life--;
        lifeNo.textContent = life;
        break;
      }
      // ゲームオーバーの場合
      life--;
      lifeNo.textContent = life;
      isgameOver = true;
      // bootstrupでモーダルを表示
      const gameover = document.getElementById('gameoverArea');
      gameover.classList.remove('d-none');
      return;
      }
    }
  }

  // 「登録」ボタンを押下でイベント発火(addeventlistenerは繰り返しの中に入れない)
  const btn = document.querySelectorAll('.sendBtn').forEach(button => {
    button.addEventListener('click', event => {
      const action = event.currentTarget.dataset.btn;
      if(action === '送信'){
        const sentName = document.getElementById('player_name').value;
        const player_name = (sentName === "") ? 'Player' : sentName;
        sendScore(player_name, score);
      }
      if(action=== 'キャンセル'){
      const gameover = document.getElementById('gameoverArea');
      gameover.classList.add('d-none');
      }
    })
  });

  function sendScore (nameToSend, currentScore) {
    const gameover = document.getElementById('gameoverArea');
    const scoreData = new URLSearchParams();
    scoreData.append('player_name', nameToSend);
    scoreData.append('score', currentScore);
    fetch('../shooting/php/save_score.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: scoreData
    })
    .then(response => response.text())
    .then( () => {
      alert('スコアが保存された！');
      gameover.classList.add('d-none');
      updateRanking();
      })
    .catch(error => {
      console.error('通信エラー・・・',error);
      gameover.classList.add('d-none');
    });
  }

  

  const updateRanking = () => {
    fetch('../shooting/php/get_ranking.php')
    .then(rankResponse => rankResponse.json())
    .then(data => {
      const rankingBody = document.getElementById('ranking-body');
      rankingBody.innerHTML = data.map((result, index) => `
        <tr>
          <th>${index+1}</th>
          <th>${result.player_name}</th>
          <th>${result.score}</th>
        </tr>
        `).join('');
    })
    .catch(error => console.error('ランキング取得エラー・・・',error));
  }
  updateRanking();






  const draw = () => {
    // 背景の描画
    ctx.fillStyle = "white"
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // 自機描画
    // ctx.fillStyle = 'white';
    // ctx.fillRect(playerPosition.x, playerPosition.y, playerWidth, playerHeight);
    ctx.drawImage(playerImage, playerPosition.x, playerPosition.y, playerWidth, playerHeight);
    // 敵描画
    // ctx.fillStyle = 'red';
    // enemies.forEach((enemy) => {
    //   ctx.fillRect(enemy.x, enemy.y, enemyWidth, enemyHeight);
    // })
    enemies.forEach((enemy) => {
      ctx.drawImage(enemyImg, enemy.x, enemy.y, enemyWidth, enemyHeight);
    })
    // 弾丸描画
    ctx.fillStyle = 'yellow';
    bullets.forEach((bullet) => {
      ctx.drawImage(bulletImg, bullet.x, bullet.y, bulletWidth, bulletHeight);
    })
    // GAMEOVER
    if(isgameOver){
      ctx.fillStyle = 'red';
      ctx.font = '30px serif';
      ctx.textBaseline = 'middle';
      ctx.textAlign = 'center';
      ctx.fillText('Game Over', 150, 250);
    }
  }


  // javascriptは1回実行して終わってしまうから、
  // 描画を何度も実行させるためにこのループが必要
  const gameLoop = () => {
    update();
    draw();
    requestAnimationFrame(gameLoop);
  }
  gameLoop();

}
shooting();
