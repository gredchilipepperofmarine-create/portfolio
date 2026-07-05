'use strict';

// enemyステータス
const enemyMaxHP = 50;
const enemyMinHP = 20;
const enemyMaxAtc = 15;
const enemyMaxMagic = 1.2;
const EnemyMaxSpeed = 20;
const enemySpeed = Math.floor((Math.random() * EnemyMaxSpeed) + 1);

// charaステータス
const charaMaxHP = 20;
const charaMaxAtc = 15;
const charaMaxSpeed = 20;
const charaSpeed = Math.floor((Math.random() * charaMaxSpeed) + 1);
// chara魔法攻撃力(通常攻撃に対して何倍にするか設定)
const fire = 1.2;
const ice = 1.2;
const wind = 1.1;

// 関数内ステータス管理
let battleState = {
  enemyHP : 0,
  charaHP : charaMaxHP,
  phase : 'フェーズチェック',
  msgGroup : [],
  textSend : 3
}

// ステータス表示確認用
console.log(`モンスタースピード:${enemySpeed}`);
console.log(`自分のスピード:${charaSpeed}`);

// メッセージ表示・積み重ねて一気に表示
const msgView = (text) => {
  document.getElementById('message01').textContent = text;
}

// メッセージ表示・積み重ねて一気に表示
const msgLine = (text) => {
  document.getElementById('message01').textContent += text;
}

// プッシュ用テキスト
// battleState.msgGroup.push()

// メッセージ表示・一括変更
const mainMsg = (text) => {
  document.getElementById('message01').textContent = text;
}

// テキスト送り
const msgStock = () => {
  if(battleState.msgGroup.length === 0){
    return;
  }
  let conbineMsg = '';
    for(let i = 1; i <= battleState.textSend; i++){
      const nextMsg = battleState.msgGroup.shift(); 
      if(nextMsg === undefined){
        break;
      }
    conbineMsg += `${nextMsg}\n`;
    }
  msgView(conbineMsg);
}

// 戦闘開始時ステータス表示
const statusView = (targetStatus, status) => {
  document.getElementById(targetStatus).textContent = status;
}

// ボタンの追加削除
const toggleButtons = (targetClass, isHide) => {
  document.querySelectorAll(targetClass).forEach(btn => {
    isHide ? btn.classList.add('hidden') : btn.classList.remove('hidden');
  })
}

// 決着ルート
const BattleEnd = () => {
  if(battleState.enemyHP <= 0 && battleState.charaHP > 0){
    toggleButtons('.btnSec', true);
    return;
  } else {
    toggleButtons('.btnSec', true);
    return;
  }
}

// 先制を決めて攻撃開始
// 残りHPに応じて出口変化
const attackTurn = (charaAtc, enemyAtc, action) => {
  const isEnemyFirst = enemySpeed >= charaSpeed;
  if(isEnemyFirst) {
    msgStock();
    excuteEnemyTurn(enemyAtc, action);
    if(battleState.charaHP > 0) {
      msgStock();
      excutePlayerTurn(charaAtc, action);
    }
  } else {
    msgStock();
    excutePlayerTurn(charaAtc, action);
    if(battleState.enemyHP > 0){
      msgStock();
      excuteEnemyTurn(enemyAtc, action);
    }
  }
  const charaViewHP = Math.max(0, battleState.charaHP);
  const enemyViewHP = Math.max(0, battleState.enemyHP);
  statusView('charaStatusHP', `HP:${charaViewHP}/${charaMaxHP}`);
  statusView('enemyStatusHP', `HP:${enemyViewHP}`);
}


// 決着判定か継続か
const mainBattle = (action) => {
  if(battleState.enemyHP > 0 && battleState.charaHP > 0){
    const charaAtc = calcCharaDamage(action);
    const enemyAtc = calcEnemyDamage(action);
    attackTurn(charaAtc, enemyAtc, action);
  } else {
    BattleEnd();
  }
}

// 自分の攻撃によるダメージ計算
const calcCharaDamage = (action) => {
  if(action === '攻撃') return Math.floor(Math.random() * charaMaxAtc);
  if(action === 'ファイア') return Math.floor(((Math.random() * charaMaxAtc) + 1) * fire);
  if(action === 'アイス') return Math.floor(((Math.random() * charaMaxAtc) + 1) * ice);
  if(action === 'ウィンド') return Math.floor(((Math.random() * charaMaxAtc) + 1) * wind);
  if(action === '防御') return 0;
  return 0;
}

// モンスターの攻撃によるダメージ計算
// ※今は敵の攻撃は一種類のみ。今後増えること予想して作ってみる
const calcEnemyDamage = (action) => {
  const enemyAtc =  Math.floor(Math.random() * enemyMaxAtc);
  if(action === '防御'){
    return Math.floor(enemyAtc / 2);
  }
  return enemyAtc;
}

// 1-1.攻撃による自分のHPを減らし各種結果を返す
const applyEnemyAction = (damage, action) => {
  battleState.charaHP = Math.max(0, battleState.charaHP - damage);
  return {
    actionType : action,
    damageDefault : damage,
    remainingHP : battleState.charaHP,
    isMissed : (damage === 0)
  }
}

// 2-1.敵攻撃によるHP計算された数値やその他returnを受け取った先のメッセージ 
const generateEnemyMessage = (result) => {
  battleState.msgGroup.push(`モンスターの攻撃！\n`);
  if(result.actionType === '防御'){
    battleState.msgGroup.push(`僕は身を守って大ダメージを避けた!\n${result.damageDefault}のダメージ！\n`);
    if(result.remainingHP <= 0){
      battleState.msgGroup.push(`僕は力尽きてしまった・・・\n`);
      BattleEnd();
      return;
    }
    battleState.msgGroup.push(`僕の残り体力は${result.remainingHP}だ!\n`);
    return;
  }
  if(result.isMissed){
    battleState.msgGroup.push(`モンスターの攻撃をかわした!\n`);
    battleState.msgGroup.push(`僕の残り体力は${result.remainingHP}だ!\n`);
    return;
  }
  battleState.msgGroup.push(`${result.damageDefault}のダメージ！\n`);
  if(result.remainingHP <= 0){
    battleState.msgGroup.push(`僕は力尽きてしまった・・・\n`);
    BattleEnd();
    return;
  }
  battleState.msgGroup.push(`僕の残り体力は${result.remainingHP}だ!\n`);
}
// 1-1.と2-1.を合わせる関数
const excuteEnemyTurn = (damage, action) => {
  const turnResult = applyEnemyAction(damage, action);
  generateEnemyMessage(turnResult);
}

// 1-2.敵のHPを減らし各種結果を返す
const applyPlayerAction = (damage, action) => {
  battleState.enemyHP = Math.max(0, battleState.enemyHP - damage);
  return {
    actionType : action,
    damageDefault : damage,
    remainingHP : battleState.enemyHP,
    isMissed : (damage === 0)
  }
}

// 2-2.敵の攻撃によるHP計算された数値やその他returnを受け取った先のメッセージ 
const generatePlayerMessage = (result) => {
  if(result.actionType === '防御'){
    battleState.msgGroup.push(`僕は攻撃せず身を守っている!\n`);
    return;
  }
  battleState.msgGroup.push(`僕の攻撃！\n`);
  if(result.isMissed){
    battleState.msgGroup.push(`くそぅ！攻撃をかわされた!\n`);
    battleState.msgGroup.push(`モンスターの残り体力は${result.remainingHP}だ!\n`);
    return;
  }
  battleState.msgGroup.push(`${result.damageDefault}のダメージを与えた！\n`);
  if(result.remainingHP <= 0){
    battleState.msgGroup.push(`モンスターを倒した！\n`);
    BattleEnd();
    return;
  } else {
    battleState.msgGroup.push(`モンスターの残り体力は${result.remainingHP}だ!\n`);
  }
}
// 1-1.と2-2.を合わせる関数
const excutePlayerTurn = (damage, action) => {
  const turnResult = applyPlayerAction(damage, action);
  generatePlayerMessage(turnResult);
}

// 初期状態
const initBattle = () => {
  battleState.enemyHP = Math.floor((Math.random() * enemyMaxHP) + 1);
  statusView('charaStatusHP', `HP:${battleState.charaHP}/${charaMaxHP}`);
  statusView('enemyStatusHP', `HP:${battleState.enemyHP}`);
  msgLine(`モンスターが現れた！\n`);
  msgLine(`モンスターの体力は${battleState.enemyHP}だ!\n`);
  toggleButtons('.mainBattleBtn', true);
  toggleButtons('.magic', true);
  toggleButtons('.arrow', true);
  if(battleState.enemyHP < enemyMinHP) {
    msgLine('無害なモンスターだ。\n逃がしてあげた。');
    toggleButtons('.btnSec', true);
    return;
  }
}



// ボタンを押したときの変化
document.querySelectorAll('.battleBtn').forEach(button => {
  button.addEventListener('click', event => {
    const action = event.currentTarget.dataset.btn;
    console.log(`押されたボタン：${action} 押される直前のフェーズ:${battleState.phase}`);
    // 「逃げる」を選んだコマンド
    if(action === '逃げる'){
      mainMsg(`一生懸命逃げた!\n`);
      toggleButtons('.btnSec', true);
      return;
    }
    if(action === 'arrow'){
      if(battleState.phase !== 'テキスト送り中') return;
      if(battleState.msgGroup.length > 0){
        msgStock();
        return;
      }
      if(battleState.charaHP > 0 && battleState.enemyHP > 0){
        battleState.phase = '通常戦闘';
        toggleButtons('.btnSec', false);
        toggleButtons('.arrow', true);
        return;
      }
      battleState.phase = '通常戦闘';
      toggleButtons('.arrow', true);
      BattleEnd();
      return;
    }
    // 「戦う」を選んだ時のボタンとフェーズ変化
    if(battleState.phase === 'フェーズチェック'){
      if(action === '戦う'){
        battleState.phase = '通常戦闘';
        toggleButtons('.initBtn', true);
        toggleButtons('.mainBattleBtn', false);
        return;
      }
    }
    // 「戦う」を選んだあとのコマンド
    if(battleState.phase === '通常戦闘'){
      switch(action){
        case '攻撃':
        case '防御':
          battleState.phase = 'テキスト送り中';
          toggleButtons('.arrow', false);
          toggleButtons('.btnSec', true);
          mainBattle(action);
          return;
        case '魔法':
          battleState.phase = '魔法選択中';
          toggleButtons('.magic', false)
          toggleButtons('.mainBattleBtn', true);
          return;
      }
    }
    // 「魔法」を選んだあとのコマンド
    if(battleState.phase === '魔法選択中'){
      // 魔法が今後増えても、このリストに追加するだけでOK
      const magicList = ['ファイア', 'アイス', 'ウィンド'];
      if(action !== '戻る' && !magicList.includes(action)){
        return;
      }
      // .includesは、対象の配列の中をチェックした結果を返すメソッド
      if(magicList.includes(action)) {
        battleState.phase = 'テキスト送り中';
        toggleButtons('.mainBattleBtn', false);
        toggleButtons('.magic', true);
        toggleButtons('.arrow', false);
        toggleButtons('.btnSec', true);
        mainBattle(action);
        return;
      }
      if(action === '戻る'){
        battleState.phase = '通常戦闘';
        toggleButtons('.initBtn', true);
        toggleButtons('.mainBattleBtn', false);
        toggleButtons('.magic', true);
        return;
      }
    }
  })
})

// ここから戦闘スタート
initBattle();


