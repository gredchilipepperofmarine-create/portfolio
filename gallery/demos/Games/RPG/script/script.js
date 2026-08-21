(() => {
  const canvas = document.getElementById('canvas');
  const ctx = canvas.getContext('2d');

  //ゲーム全体config
  let gameState = 'map';

  // プレイヤーconfig
  let playerX = 200;
  let playerY = 200;
  if(localStorage.getItem('px') !== null) {
    playerX = Number(localStorage.getItem('px'));
    playerY = Number(localStorage.getItem('py'));
  } 
  const playerWidth = 20;
  const playerHeight = 20;
  const playerSpeed = 5;
  const playerImg = new Image();
  playerImg.src = 'images/heishi.png'; 

  // 敵config
  const enemyWidth = 20;
  const enemyHeight = 20;
  const enemySpeed = 5;
  const enemies = [];
  const enemyNum = 20;
  let enemyCount = 0;

  // マップconfig
const mapData = [
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4, 4, 4, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4, 4, 4, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4, 4, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
  [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2]
];
  const tileSize = 20;
  const imagesGroup = {
    'yama': 'images/yama.png',
    'sougen': 'images/sougen.png',
    'shiro': 'images/shiro.png',
    'umi': 'images/umi.png',
    'doku': 'images/doku.png'
  }
  const assetGroup = {
    1: {name: 'yama', isWall: true},
    2: {name: 'sougen', isWall: false},
    3: {name: 'shiro', isWall: true},
    4: {name: 'umi', isWall: true},
    5: {name: 'doku', isWall: false}
  }
  const loadImages = {}
  for(const key in imagesGroup){
    loadImages[key] = new Image();
    loadImages[key].src = imagesGroup[key];
  }

  let keys = {
    ArrowUp: false,
    ArrowDown: false,
    ArrowLeft: false,
    ArrowRight: false,
  }

  document.addEventListener('keydown', (e) => {
    if(e.key === 'ArrowUp') keys.ArrowUp = true;
    if(e.key === 'ArrowDown') keys.ArrowDown = true;
    if(e.key === 'ArrowLeft') keys.ArrowLeft = true;
    if(e.key === 'ArrowRight') keys.ArrowRight = true;
  })

  document.addEventListener('keyup', (e) => {
    if(e.key === 'ArrowUp') keys.ArrowUp = false;
    if(e.key === 'ArrowDown') keys.ArrowDown = false;
    if(e.key === 'ArrowLeft') keys.ArrowLeft = false;
    if(e.key === 'ArrowRight') keys.ArrowRight = false;
  })

  const update = () => {

    // 進む先を仮の座標に代入
    let nextX = playerX;
    let nextY = playerY;

    // 仮で移動させるための計算(実際にはまだ移動していない)
    if(keys.ArrowUp) nextY -= playerSpeed;
    if(keys.ArrowDown) nextY += playerSpeed;
    if(keys.ArrowLeft) nextX -= playerSpeed;
    if(keys.ArrowRight) nextX += playerSpeed;

    // 周りが壁かどうかを判定するためのファンクション
    const isWall = (checkY, checkX) => {
      // tilesizeで割って、座標を(1,1)のような形で取得
      let mapX;
      let mapY;
      // 座標を小数点なく取得するためにMath.floor
      mapX = Math.floor(checkX / tileSize);
      mapY = Math.floor(checkY / tileSize);

      // マップ外に飛び出さないための設定
      if(
        nextX < 0 ||
        canvas.width - playerWidth <= nextX - 1 ||
        nextY < 0 ||
        canvas.height- playerHeight <= nextY - 1
      ){
        return true;
      }
      // マップ上の「true」の場所には侵入不可
      // for(const key in assetGroup){
      //   console.log(assetGroup[key].isWall);
        if(assetGroup[mapData[mapY][mapX]].isWall) {
          return true;
        } else {
          return false;
        }
      // }
    }

    // 当たり判定のための準備。仮想の自分の体の当たり判定場所を定義
    let top = nextY + 1;
    let bottom = nextY + playerHeight - 1;
    let left = nextX + 1;
    let right = nextX + playerWidth - 1;
    

    // 進む先が壁かどうか判定
    if(
      !isWall(top, left) &&
      !isWall(top, right) &&
      !isWall(bottom, left) &&
      !isWall(bottom, right)
    ){
      // 全てが触れてないなら進めるので、仮(nextX/Y)を実際に代入
      playerX = nextX;
      playerY = nextY;
    }


    // プレイヤー移動
    // if(keys.ArrowUp) playerY -= playerSpeed;
    // if(keys.ArrowDown) playerY += playerSpeed;
    // if(keys.ArrowLeft) playerX -= playerSpeed;
    // if(keys.ArrowRight) playerX += playerSpeed;

    // 枠外に行かないように制御
    // if(playerY <= 0) playerY = 0;
    // if(canvas.height - playerHeight <= playerY) playerY = canvas.height - playerHeight;
    // if(playerX <= 0) playerX = 0;
    // if(canvas.width - playerWidth <= playerX) playerX = canvas.width - playerWidth;

    // 敵生成
    if(enemyCount <= 0){
      enemyCount = enemyNum;
      for(let i = 0; i < enemyNum; i++){
        enemies.push({
          x: Math.floor(Math.random() * (canvas.width / tileSize)) * tileSize,
          y: Math.floor(Math.random() * (canvas.height / tileSize)) * tileSize,
        });
      };
    }

    // プレイヤーと敵の当たり判定
    for(let i = enemies.length - 1; i >= 0; i--){
      if(
        enemies[i].x < playerX + playerWidth &&
        enemies[i].x + enemyWidth > playerX &&
        enemies[i].y < playerY + playerHeight &&
        enemies[i].y + enemyHeight > playerY
      ) {
        gameState = 'battle';
        localStorage.setItem('px', playerX);
        localStorage.setItem('py', playerY);

        enemies.splice(i, 1);
        enemyCount--;
      }
    }
  }

  const draw = () => {
    // マップ描画
    ctx.fillStyle = 'rgba(8, 247, 8, 0.64)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // マップ上の画像描画
    for(let y = 0; y < mapData.length; y++){
      for(let x = 0; x < mapData[y].length; x++){
        const target = assetGroup[mapData[y][x]].name;
        ctx.drawImage(loadImages[target], x * tileSize, y * tileSize, tileSize, tileSize);
      }
    }

    // プレイヤー描画
    // ctx.fillStyle = 'red';
    ctx.drawImage(playerImg, playerX, playerY, playerWidth, playerHeight);

    // 敵描画
    ctx.fillStyle = 'rgba(0,0,0,0)';
    // ctx.fillRect(250, 250, enemyWidth, enemyHeight);
    enemies.forEach((enemy) => {
      ctx.fillRect(enemy.x, enemy.y, enemyWidth, enemyHeight);
    });
  };

  const loop = () => {
    if(gameState === 'map'){
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      draw();
      update();
    }
    if(gameState === 'battle'){
      location.href = '../battleMonster/index.html';
    }
    requestAnimationFrame(loop);
  }
  loop();

})();

