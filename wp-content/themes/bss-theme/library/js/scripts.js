/*
 * Bones スクリプトファイル
 *
 * ここには多くの例やツールが含まれています。必要ない場合は削除してください。
 * これらはヘルパーとして意図されており、必須ではありません。
*/


/*
 * ビューポートの寸法を取得
 * ビューポートの寸法をオブジェクトとして返し、CSSの幅と高さのプロパティに一致させます
 * ( 出典: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
  var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
  return { width:x,height:y };
}
// ビューポートの幅を設定
var viewport = updateViewportDimensions();


/*
* リサイズトリガーイベントのスロットル
* この関数内にアクションをラップして、発火頻度をスロットルし、特にモバイルでのパフォーマンスを向上させます。
* ( 出典: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
      if (!uniqueId) { uniqueId = "一意のIDなしでこれを2回呼び出さないでください"; }
      if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
      timers[uniqueId] = setTimeout(callback, ms);
  };
})();

// リサイズが停止したと判断するまでの待機時間（ミリ秒）。50〜100程度が適切です。
var timeToWaitForLast = 100;


/*
* ここに上記の関数を使用する例があります
*
* これはコメントアウトされているので動作しませんが、コピーして
* コメントを削除することができます。
*
*
*
* 特定のページでのみ実行したい場合、チェックを設定して
* できるだけ効率的に実行します。
*
* if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
*
* これはボディクラスに基づいてホームページにいるかどうかを確認します
* そのチェックを使用して、ホームページでのみアクションを実行できます
*
* ウィンドウがリサイズされたとき、この関数を実行します
* $(window).resize(function () {
*
*    // ホームページにいる場合、設定された時間を待ってから関数を発火します
*    if( is_home ) { waitForFinalEvent( function() {
*
*	// ウィンドウサイズが変更された場合に備えてビューポートを更新します
*	viewport = updateViewportDimensions();
*
*      // 768以上の場合、これを発火します
*      if( viewport.width >= 768 ) {
*        console.log('ホームページにいて、ウィンドウサイズが幅768以上です。');
*      } else {
*        // それ以外の場合、これを実行します
*        console.log('ホームページではないか、ウィンドウサイズが幅768未満です。');
*      }
*
*    }, timeToWaitForLast, "your-function-identifier-string"); }
* });
*
* かなりクールですね？このような関数を作成して、ビューポートに依存する
* コンテンツやその他のものを条件付きでロードできます。
* モバイルデバイスとJavaScriptはあまり相性が良くないことを覚えておいてください。
* 軽量に保ち、常に大きなビューポートが重い作業を行うようにしてください。
*
*/

/*
* グラバターを交換します。
* functions.phpファイルでは、帯域幅を節約するためにモバイルでグラバター画像を読み込んでいません。
* 受け入れ可能なビューポートに達したら、データ属性にあるこれらの画像を交換できます。
*/
function loadGravatars() {
// 上記の関数を使用してビューポートを設定
viewport = updateViewportDimensions();
// ビューポートがタブレット以上の場合、グラバターを読み込みます
if (viewport.width >= 768) {
jQuery('.comment img[data-gravatar]').each(function(){
  jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
});
  }
} // 関数の終了


/*
* すべての通常のjQueryをここに入れます。
*/
jQuery(document).ready(function($) {

/*
 * グラバター関数を発火させます
 * 必要ない場合はこれを削除できます
*/
loadGravatars();


}); /* ページロードスクリプトの終了 */