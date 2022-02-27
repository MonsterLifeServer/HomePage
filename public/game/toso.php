<?php

$config = include('./../assets/config.php');
$TITLE = "逃走中";
$URL = $func->getUrl() . '/game/toso';
$DESCRIPTION = "逃走中をマイクラで遊べるようにした企画「逃走中」のルール紹介ページです。";

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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/game/">
                                        <span itemprop="name">ミニゲーム企画</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/game/toso">
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

                    <h1 class="design">逃走中</h1>

                    <div class="flex-box2">

                        <div class="sub-box">
                            <h2>ルール</h2>
                            <p></code>/report ＜テキスト＞</code>で運営にメッセージを送信。</code>/global ＜テキスト＞</code>でチーム関係なくメッセージを送信。</code>/oni</code>で青鬼抽選期間中なら青鬼抽選に参加/離脱。</p>
                        </div>

                        <div class="radius-box">
                            <h2>企画詳細</h2>

                            <h3>ゲーム時間</h3>
                            <p>15分</p><hr />
                            <h3>最低参加人数</h3>
                            <p>5人</p><hr />
                            <h3>バージョン</h3>
                            <p>1.12.2</p><hr />
                            <h3>カテゴリ</h3>
                            <span class="category">鬼ごっこ</span><span class="category">謎解き</span>
                            <hr />
                            <h3>テクスチャ</h3>
                            <p><a href="<?php echo $conf['tex']['toso']; ?>" download>ダウンロード</a></p>
                        </div>

                    </div>

                </div>
            </div>

            <?php $func->printFootScript(); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>