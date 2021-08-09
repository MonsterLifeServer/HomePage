<?php

$config = include('./../assets/config.php');
$TITLE = "青鬼ONLINE in MC";
$URL = $conf["url"] . '/game/online';
$DESCRIPTION = "スマホゲーム「青鬼ONLINE」をマイクラで遊べるようにした企画「青鬼ONLINE in MC」のルール紹介ページです。";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト&最終更新日 -->
                    <div class="top-label">
                        <div class="item-left">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/">
                                        <span itemprop="name">ミニゲーム企画</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/online">
                                        <span itemprop="name"><?php echo $TITLE; ?></span>
                                    </a>
                                    <meta itemprop="position" content="3" />
                                </li>
                            </ol>
                        </div>
                        <div class="item-right">
                            <p class="fileupdate right"><span class="title">最終更新日時: </span>
                            <?php
                                $filetime = filemtime(basename(__FILE__));
                                echo '<span class="date">'.date('Y/m/d ', $filetime).'</span>';
                                echo '<span class="time">'.date('H時i分', $filetime).'</span>'; 
                            ?></p>
                        </div>
                    </div>
                    <!-- パンくずリスト&最終更新日 -->

                    <h1 class="design">青鬼ONLINE in MC</h1>

                    <div class="flex-box2">

                        <div class="sub-box">
                            <div class="text-center">
                                <h2>ルール</h2>
                                <p>「史上最恐の鬼ごっこ」，</p>
                                <p>人間VS青鬼・・・！</p>
                                <p>閉鎖された部屋に閉じ込められたプレイヤーたち，</p>
                                <p>生き残れるのは最後の一人のみ・・・ｶﾞﾀｶﾞﾀ</p>
                                <p>あなたは最後の一人になり，無事青逃（アオニゲ）できるのか！？</p>
                            </div>
                            <p>という，スマホゲーム「青鬼ONLINE」をマインクラフトで遊べるようにしたミニゲーム</p>
                            <ul>
                                <li>時間経過とともに青霧(苔むした丸石)が少しずつ侵食していく。</li>
                                <li>苔むした丸石の上に立つと青霧耐性が減っていき，0秒になると青霧に飲み込まれてしまう。</li>
                                <li>一定間隔で青鬼(ゾンビ)がランダムでスポーンして，近くの逃走者に襲い掛かる。</li>
                                <li>マップ内にはチェストが設置されており，開けると特殊アイテムや能力が付与される。</li>
                            </ul>
                            <img src="https://i.gyazo.com/2ff39bd38169ff05fc1cc67d4b91b781.png" style="max-width:600px;width=100%" /> 
                        </div>

                        <div class="radius-box">
                            <h2>企画詳細</h2>

                            <h3>ゲーム時間</h3>
                            <p>10分</p><hr />
                            <h3>最低参加人数</h3>
                            <p>2人</p><hr />
                            <h3>バージョン</h3>
                            <p>1.12.2</p><hr />
                            <h3>カテゴリ</h3>
                            <span class="category">鬼ごっこ</span><span class="category">PVE</span>
                            <hr />
                            <h3>テクスチャ(低スペック向け)</h3>
                            <p><a href="<?php echo $conf['tex']['aooni']; ?>" download>ダウンロード</a></p>
                            <h3>3Dテクスチャ</h3>
                            <p><a href="<?php echo $conf['tex']['aooni3d']; ?>" download>ダウンロード</a></p>

                        </div>

                    </div>

                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>