<div class="container text-center" id="technotes">
  <div class="row">
    <div class="col-12 tubArea">
      <h2 class="techArea">Tech Notes</h2>
      <div class="listArea">
        <ul class="tubs">
          <li><button type="button" class="tubBtn isOpen" data-btn=".note1">背景画像</button></li>
          <li><button type="button" class="tubBtn" data-btn=".cssArea">UFO</button></li>
          <!-- <li><button type="button" class="tubBtn" data-btn=".jsArea">Note3</button></li> -->
          <li><button type="button" class="tubBtn" data-btn=".phpArea">サイト全体</button></li>
        </ul>
      </div>
    </div>
    <div class="col-12 tub note1">
      <div class="tubInner">
        <ul class="skills">
          <li>Javascriptで自動生成。発生位置や画像の大きさ、流れるスピードなどランダムに設定</li>
          <li>メモリ負担にならないよう画面外で削除</li>
          <li>footer部分はCSSアニメーションのみ。万が一流れる画像が生成されなくても、RPG独特の冒険感を表現</li>
        </ul>
      </div>
    </div>
    <div class="col-12 tub cssArea isHide">
      <div class="tubInner">
        <ul class="skills">
          <li>ランダムな移動はJavascriptとCSSアニメーションで制御</li>
          <li>その他装飾で活用</li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
    <!-- <div class="col-12 tub jsArea isHide">
      <div class="tubInner">
        <ul class="skills">
          <li>ローディング画面</li>
          <li>背景画像の自動生成</li>
          <li>トップへ戻るボタンの発生制御</li>
        </ul>
      </div>
    </div> -->
    <div class="col-12 tub phpArea isHide">
      <div class="tubInner">
        <ul class="skills">
          <li>コードはマジックナンバーを排除し保守性を向上</li>
          <li>Webアクセシビリティの向上のため、画像クリックが必要なローディング画面では5秒で自動遷移する仕組みを実装</li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
</div>
