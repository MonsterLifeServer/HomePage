jQuery(document).snowfall({
    flakeColor : '#fff',
    maxSize : 10,				// 要素の最大サイズ
    flakeCount : 100,			// 要素の数
    flakeIndex : 99,		    // 要素のz-index
    minSize : 5,				// 要素の最小サイズ
    minSpeed : 2,				// 要素の最小落下スピード
    maxSpeed : 5,				// 要素の最大落下スピード
    round : true,				// 要素に丸みを持たせる？
    //collection : 'footer',   	// 要素を指定の要素に積もらせる設定(画像を設定してもflakeColorで指定した要素の色が積もります)
    shadow : false  			// 要素に影をつける？
});