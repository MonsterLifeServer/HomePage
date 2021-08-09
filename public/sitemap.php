<?php

$config = include('./assets/config.php');

$TITLE = "サイトマップ";
$URL = $conf["url"] . '/sitemap';
$DESCRIPTION = "MonsterLifeServerのあらゆるリンクを確認できます。";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <title><?php echo $TITLE; ?> | MonsterLifeServer</title>
        <?php echo $html["common_head"]; ?>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?>" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/sitemap.min.css">
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
                                    <a itemprop="item" href="<?php echo $URL; ?>">
                                        <span itemprop="name"><?php echo $TITLE; ?></span>
                                    </a>
                                    <meta itemprop="position" content="2" />
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
                    
                    <div class="sitemap">
                        <ul>
                        <li><a href="<?php echo $conf["url"]; ?>">ホーム</a>
                                <ul>
                                    <li><a href="<?php echo $conf["url"]; ?>/terms">利用規約・ガイドライン</a></li>
                                    <li><a href="<?php echo $conf["url"]; ?>/terms">プライバシーポリシー</a></li>
                                    <li>About
                                        <ul>
                                            <li><a href="<?php echo $conf["url"]; ?>/about/asmins">運営一覧</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/about/donation">寄付について</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/about/passbook">通帳</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/about/news">ニュース</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">○○○○○</a>
                                        <ul>
                                            <li><a href="#">○○○○○</a></li>
                                            <li><a href="#">○○○○○</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $conf["url"]; ?>/game/">ミニゲーム企画</a>
                                        <ul>
                                            <li><a href="<?php echo $conf["url"]; ?>/game/aooni">青鬼ゲーム</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/game/online">青鬼ONLINE in MC</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/game/hueoni">増え鬼ごっこ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $conf["url"]; ?>/servers/">サーバー</a>
                                        <ul>
                                            <li><a href="<?php echo $conf["url"]; ?>/game/aooni">青鬼ゲーム</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/game/online">青鬼ONLINE in MC</a></li>
                                            <li><a href="<?php echo $conf["url"]; ?>/game/hueoni">増え鬼ごっこ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $conf["url"]; ?>/surpport">○○○○○</a>
                                        <ul>
                                            <li><a href="#">○○○○○</a></li>
                                            <li><a href="#">○○○○○</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>