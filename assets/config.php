<?php
$url = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
$url .= $_SERVER["HTTP_HOST"];

function isNearDate($text){
    $date = new DateTime();
    $date->setTimeZone( new DateTimeZone('Asia/Tokyo'));
    $str = $date->format('Y/m/d');
    for ($i = 1; $i <= 7; $i++) {
        if ($str === $text) {
            return true;
        }
        $str = date('Y/m/d', strtotime('+' . $i . ' day'));
    }
    return false; 
}

function getCategoryColorCode($text) {
    if (strpos($text, "青鬼ゲーム") !== false) {
        return "#6354A5";
    } 

    else if (strpos($text, "DbD") !== false) {
        return "#2D343B";
    }

    else if ("MonsterBOT" === $text || "Discord" === $text) {
        return "#7289DA";
    }
    else if ("重要" === $text) {
        return "#ff0000";
    }
    
    else { return "#F5A9A9; color: #000000";}
}

$conf = [
    "tex" => [
        "aooni" => "https://github.com/MonsterLifeServer/Textures/raw/main/MLServerAooni.zip",
        "dbd" => "https://github.com/Monster2408/texture/raw/master/DeadbyDaylight_in_MC.zip",
        "toso" => "https://github.com/MonsterLifeServer/Textures/raw/main/MLServerToso.zip"
    ],
    "url" => $url,
    "description" => "ミニゲーム企画鯖『MonsterLifeServer』のホームページです。",
    "keywords" => "minecraft,ミニゲーム,企画,青鬼,増え鬼,青鬼ONLINE,マルチ,サーバー"
];

$html["common_head"] = <<<__EOM__
    <!-- CSS -->
    <link rel="stylesheet" href="{$conf["url"]}/assets/css/header.min.css" media="print" type="text/css" onload="this.media='all'">
    <link rel="stylesheet" href="{$conf["url"]}/assets/css/footer.min.css" media="print" type="text/css" onload="this.media='all'">
    <link rel="stylesheet" href="{$conf["url"]}/assets/css/style.min.css" media="print" type="text/css" onload="this.media='all'">
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{$conf["url"]}/assets/js/main-top.js"></script>
    <!-- アイコン -->
    <link rel="icon" href="{$conf["url"]}/assets/img/web/favicon.ico">
    <link rel="apple-touch-icon" href="{$conf["url"]}/assets/img/web/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" type="image/png" href="{$conf["url"]}/assets/img/web/android-touch-icon.png" sizes="192x192">
    <!-- Twitter用カード設定 -->
    <meta name="twitter:card" content="summary_large_image" /> <!--①-->
    <meta name="twitter:site" content="@MLServer2408" /> <!--②-->
    <meta property="og:url" content="{$conf["url"]}/" /> <!--③-->
    <meta property="og:title" content="MonsterLifeServer" /> <!--④-->
    <meta property="og:description" content="{$conf["description"]}" /> <!--⑤-->
    <meta property="og:image" content="https://mineidea.net/storage/images/eHNLuswuMqZBet4jXgR0w9FrZdj4LYM8XqW8Fc0Z.png" /> <!--⑥-->
    <!-- プラグイン -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{$conf["url"]}/assets/strip/strip.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="{$conf["url"]}/assets/slick/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="{$conf["url"]}/assets/slick/slick.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{$conf["url"]}/assets/strip/strip.pkgd.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="{$conf["url"]}/assets/slick/slick.min.js"></script>
    <script type="text/javascript" src="{$conf["url"]}/assets/Snowfall/snowfall.jquery.min.js"></script>
    <!-- その他 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="keywords" content="{$conf["keywords"]}" />
    <!-- Google -->
    <script data-ad-client="ca-pub-1928305720436804" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
__EOM__;

$html["common_foot"] = <<<__EOM__
    
    <script src="{$conf["url"]}/assets/js/main-bottom.js"></script>
__EOM__;

?>