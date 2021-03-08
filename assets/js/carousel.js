//////////////////////////// 【必要な変数を定義】////////////////////////////
//////////  スライドリストの合計幅を計算→CSSでエリアに代入
let width = $('.carousel-list').outerWidth(true); // .carousel-listの1枚分の幅
let length = $('.carousel-list').length; // .carousel-listの数
let slideArea = width * length; // レール全体幅 = スライド1枚の幅 × スライド合計数
$('.carousel-area').css('width', slideArea); // カルーセルレールに計算した合計幅を指定

//////////  スライド現在値と最終スライド 
let slideCurrent = 0; // スライド現在値（1枚目のスライド番号としての意味も含む）
let lastCurrent = $('.carousel-list').length - 1; // スライドの合計数＝最後のスライド番号



////////////////////////////【スライドの動き方+ページネーションに関する関数定義】////////////////////////////
////////// スライドの切り替わりを「changeslide」として定義 
function changeslide() {
    $('.carousel-area').stop().animate({ // stopメソッドを入れることでアニメーション1回毎に止める
    left: slideCurrent * -width // 代入されたスライド数 × リスト1枚分の幅を左に動かす
    });

    ////////// ページネーションの変数を定義（＝スライド現在値が必要）
    let pagiNation = slideCurrent + 1; // nth-of-typeで指定するため0に＋1をする
    $('.pagination-circle').removeClass('target'); // targetクラスを削除
    $(".pagination-circle:nth-of-type(" + pagiNation + ")").addClass('target'); // 現在のボタンにtargetクラスを追加
};



/////////////////////////【自動スライド切り替えのタイマー関数定義】/////////////////////////
let Timer;
////////// 一定時間毎に処理実行する「startTimer」として関数を定義
function startTimer() {
    // 変数Timerに下記関数内容を代入する
    Timer = setInterval(function () { // setInterval・・・指定した時間ごとに関数を実行
        if (slideCurrent === lastCurrent) { // 現在のスライドが最終スライドの場合
            slideCurrent = 0;
            changeslide(); // スライド初期値の値を代入して関数実行（初めのスライドに戻す）
        } else {
            slideCurrent++;
            changeslide(); // そうでなければスライド番号を増やして（次のスライドに切り替え）関数実行
        };
    }, 3000); // 上記動作を3秒毎に
}

////////// 「startTimer」関数を止める「stopTimer」関数を定義
function stopTimer() {
    clearInterval(Timer); // clearInterval・・・setIntervalで設定したタイマーを取り消す
}
//////// 自動スライド切り替えタイマーを発動
startTimer();

/////////////////////////【ボタンクリック時関数を呼び出し】/////////////////////////
// NEXTボタン
$('.arrow-right').click(function () {
    // 動いているタイマーをストップして再度タイマーを動かし直す（こうしないとページ送り後の秒間隔がズレる）
    stopTimer();
    startTimer();
    if (slideCurrent === lastCurrent) { // 現在のスライドが最終スライドの場合
    slideCurrent = 0;
        changeslide(); // スライド初期値の値を代入して関数実行（初めのスライドに戻す）
    } else {
    slideCurrent++;
        changeslide(); // そうでなければスライド番号を増やして（次のスライドに切り替え）関数実行
    };
});

// BACKボタン
$('.arrow-left').click(function () {
    // 動いているタイマーをストップして再度タイマーを動かし直す（こうしないとページ送り後の時間間隔がズレる）
    stopTimer();
    startTimer();
    if (slideCurrent === 0) { // 現在のスライドが初期スライドの場合
    slideCurrent = lastCurrent;
        changeslide(); // 最終スライド番号を代入して関数実行（最後のスライドに移動）
    } else {
    slideCurrent--;
        changeslide(); // そうでなければスライド番号を減らして（前のスライドに切り替え）関数実行
    };
});

// ページネーションのクリックによるスライドの動作
$('.pagination-circle').click(function () {
    // 動いているタイマーをストップして再度タイマーを動かし直す（こうしないとページ送り後の時間間隔がズレる）
    stopTimer();
    startTimer();
    slideCurrent = $('.pagination-circle').index(this);
    changeslide();
});

$('.carousel-list')
.mouseover(function(e) {
    stopTimer();
})
.mouseout(function(e) {
    startTimer();
});

/*
$('.pagination-circle')
.mouseover(function(e) {
    stopTimer();
})
.mouseout(function(e) {
    startTimer();
});
*/

$('.arrow-left')
.mouseover(function(e) {
    $('.arrow-left .arrow-btn').css('background-color', 'rgb(51, 79, 216)');
    $('.arrow-left .arrow-btn').css('box-shadow', '0px 1px 10px -2px rgba(0, 0, 0, 0.8)');
})
.mouseout(function(e) {
    $('.arrow-left .arrow-btn').css('background-color', '');
    $('.arrow-left .arrow-btn').css('box-shadow', '');
});

$('.arrow-right')
.mouseover(function(e) {
    $('.arrow-right .arrow-btn').css('background-color', 'rgb(51, 79, 216)');
    $('.arrow-right .arrow-btn').css('box-shadow', '0px 1px 10px -2px rgba(0, 0, 0, 0.8)');
})
.mouseout(function(e) {
    $('.arrow-right .arrow-btn').css('background-color', '');
    $('.arrow-right .arrow-btn').css('box-shadow', '');
});

$(window).resize(function() {
    stopTimer();
    let width = $('.carousel-list').outerWidth(true); // .carousel-listの1枚分の幅
    let length = $('.carousel-list').length; // .carousel-listの数
    let slideArea = width * length; // レール全体幅 = スライド1枚の幅 × スライド合計数
    $('.carousel-area').css('width', slideArea); // カルーセルレールに計算した合計幅を指定

    //////////  スライド現在値と最終スライド 
    let slideCurrent = 0; // スライド現在値（1枚目のスライド番号としての意味も含む）
    let lastCurrent = $('.carousel-list').length - 1; // スライドの合計数＝最後のスライド番号
    startTimer();
});