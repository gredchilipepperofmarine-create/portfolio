const getLang = (targetRepo) => {

  const githubUser = 'gredchilipepperofmarine-create';
  const repo = targetRepo;
  const repoUrl = `https://api.github.com/repos/${githubUser}/${repo}/languages`;
  const storageKey = targetRepo;
  let cachedData = null;

  // 言語ごとの表示カラー(GitHubらしく)
  const LangColors = {
    JavaScript: '#f1e05a',
    CSS: '#563d7c',
    HTML: '#e34c26',
    PHP: '#4f5d95'
  };

  const fetchLanguages = async () => {
    const cachedDataStr = localStorage.getItem(storageKey);       

    if(cachedDataStr){
      try {
        const parsed = JSON.parse(cachedDataStr);
        const now = Date.now();
        const oneDay = 24 * 60 * 60 * 1000;
        if(parsed.timestamp && (now - parsed.timestamp < oneDay)){
          cachedData = parsed.data;
          draw(cachedData);
          console.log('前回の通信から24時間以内なのでキャッシュデータを使用します');
          return;
        }
      } catch (e) {
        console.error('キャッシュデータ読み込み失敗', e);
      }
    }

    try{
      const response = await fetch(repoUrl);
      const data = await response.json();

      if(data.message || !response.ok) {
        throw new Error(data.message || 'API取得失敗');
      }

      cachedData = {
        timestamp: Date.now(),
        data: data
      }

      localStorage.setItem(storageKey, JSON.stringify(cachedData));

      draw(data);

    } catch (error) {
      console.warn('API取得に失敗', error.message);
      if(cachedData) {
        draw(cachedData);
        notice('※一時的に最新データの取得に失敗したため、前回取得したデータを表示しています');
      } else {
        console.warn('データの取得に失敗しました');
      }
    }
  };

  const draw = (data) => {
    // jsonで取得される連想配列の中から数値だけをObject.values(data)で配列として取得
    const getArray = Object.values(data);
    // .reduce()の第一引数にはコールバック関数が必須。そのためのルールがaddBytes
    const addBytes = (sum, bytes) => {
      return sum + bytes;
    }
    // コールバック関数の引数もルール有。第一引数：累積、第二引数：次の配列の数値
    // 一番最初の計算時は累積がないので、reduceの第二引数(初期値)0が入りaddBytes(0,配列の先頭の数値)となる
    const totalBytes = getArray.reduce(addBytes, 0);

    // 言語バー出力先
    const languageBar = document.getElementById('repo');
    // バー補足情報出力先
    const barCharaArea = document.getElementById('langDetail');
    const langCharaArea = document.getElementById('lang');
    // 必要なクラス名付与
    languageBar.classList.add = targetRepo;
    barCharaArea.classList.add = `${targetRepo}Lang`;
    langCharaArea.classList.add = `${targetRepo}LangDetail`;

    // 中身を一度リセット
    languageBar.innerHTML = '';
    barCharaArea.innerHTML = '';
    langCharaArea.innerHTML = '';

    for(const[lang, bytes] of Object.entries(data)) {
      // .toFixed(1)は小数点第一位まで残して四捨五入
      // const[lang, bytes]で分割代入している。object.entries(data)は、
      // 連想配列であるdataをキー(例：Javascript)とバリュー(例：9520)を別々に使用できるようにする
      // だから「(bytes / totalBytes) * 100」で、「各キーのバリュー/トータル＝使用率」が出せる
      const percentage = ((bytes / totalBytes) * 100).toFixed(1);

      // 色を取得(未定義ならグレー)
      const color = LangColors[lang] || '#ccc';

      // バーの要素を作成して各種指定
      const barSegment = document.createElement('div');
      barSegment.style.width = `${percentage}%`;
      barSegment.style.backgroundColor = color;
      barSegment.style.height = `${10}px`;
      languageBar.appendChild(barSegment);

      // バーの補足文字情報要素を作成して各種指定
      const barChara = document.createElement('div');
      const langChara = document.createElement('div');
      barChara.className ='langSeg';
      langChara.className ='langSeg';
      barChara.innerHTML =`
      <span class="langDot" style="background-color: ${color};"></span>
      <span>${lang}: ${percentage}%</span>
      `;
      langChara.innerHTML =`
      <span class="langDot" style="background-color: ${color};"></span>
      <span>${lang}</span>
      `;
      barCharaArea.appendChild(barChara);
      langCharaArea.appendChild(langChara);
    }
  }

  const notice = (msg) => {
    console.log(msg);
  }

  document.addEventListener('DOMContentLoaded', fetchLanguages);

}
// getLang('STG', 'STGLang', 'STGLangDetail');
// getLang('HowToDrive', 'HowToDriveLang', 'HowToDriveLangDetail');
getLang('STG');
// getLang('DesignHouseRenovation', 'DesignHouseRenovationLang', 'DesignHouseRenovationLangDetail');
// getLang('Movie', 'MovieLang', 'MovieLangDetail');
// getLang('ccdonuts', 'ccdonutsLang', 'ccdonutsLangDetail');

// document.addEventListener('focusin', () => {
//   console.log('【フォーカス移動】現在の要素:', document.activeElement);
// });
