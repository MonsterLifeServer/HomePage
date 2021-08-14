<?php

$config = include('./../assets/config.php');
$TITLE = "ミニゲーム企画一覧";
$URL = $conf["url"] . '/game/';
$DESCRIPTION = "MonsterLifeServerの企画一覧ページです。";

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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/toso">
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

                    <div class="game_box">
                        <a href="<?php echo $conf["url"]; ?>/game/aooni">
                            <h4>青鬼ゲームシリーズ</h4>
                            <p>minecraft game</p>
                            <span class="update"><?php echo date('Y/m/d H時i分', filemtime(basename("./aooni.php"))); ?></span>
                            <span class="fun_level"></span>
                        </a>
                    </div>

                    <div class="game_box">
                        <a href="<?php echo $conf["url"]; ?>/game/online">
                            <h4>青鬼ONLINE in MC</h4>
                            <p>minecraft game</p>
                            <span class="update"><?php echo date('Y/m/d H時i分', filemtime(basename("./online.php"))); ?></span>
                            <span class="fun_level"></span>
                        </a>
                    </div>

                    <div class="game_box">
                        <a href="<?php echo $conf["url"]; ?>/game/hueoni">
                            <h4>増え鬼</h4>
                            <p>minecraft game</p>
                            <span class="update"><?php echo date('Y/m/d H時i分', filemtime(basename("./hueoni.php"))); ?></span>
                            <span class="fun_level"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>