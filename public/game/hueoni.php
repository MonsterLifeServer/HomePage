<?php

$config = include('./../assets/config.php');
$TITLE = "増え鬼";
$URL = $conf["url"] . '/game/hueoni';
$DESCRIPTION = "企画「増え鬼」のルール紹介ページです。";

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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/hueoni">
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

                    <h1 class="design">増え鬼</h1>

                    <div class="flex-box2">

                        <div class="sub-box">
                            <h2>ルール</h2>
                            <p>色々なマップで増え鬼ができます。</p>
                            <p>鬼は配布される本を右クリックで初期地点にTPできます。</p>
                            <p></code>/report ＜テキスト＞</code>で運営にメッセージを送信。</code>/oni</code>で鬼抽選期間中なら鬼抽選に参加/離脱。</p>
                        </div>

                        <div class="radius-box">
                            <h2>企画詳細</h2>

                            <h3>ゲーム時間</h3>
                            <p>10分</p><hr />
                            <h3>最低参加人数</h3>
                            <p>4人</p><hr />
                            <h3>バージョン</h3>
                            <p>1.12.2</p><hr />
                            <h3>カテゴリ</h3>
                            <span class="category">鬼ごっこ</span>
                            <h3>専用テクスチャパック</h3>
                            <p><a href="https://packs.mlserver.xyz/" target="_blank">コチラ</a></p>

                        </div>

                    </div>

                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>