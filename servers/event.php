<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "ミニゲーム企画鯖";
$URL = $conf["url"] . '/servers/event';
$DESCRIPTION = "ミニゲーム企画を開催するサーバーについて";

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
                    <!-- パンくずリスト -->
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/">
                                <span itemprop="name">サーバー</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>

                        <li itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/event">
                                <span itemprop="name"><?php echo $TITLE; ?></span>
                            </a>
                            <meta itemprop="position" content="3" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->

					<h1 class="design">ミニゲーム企画鯖</h1>
					<h2 class="design">できること</h2>
                    <div class="box">
						<ul>
							<li>1.12.2でミニゲームが遊ぶことができる。</li>
						</ul>
					</div>

					<h2 class="design">禁止事項</h2>
					<div class="box">
						<ul>
							<li><a href="<?php echo $conf["url"]; ?>/terms">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
                            <li>企画ごとに細かいルールが存在します。詳細は<a href="<?php echo $conf["url"]; ?>/game/">ミニゲーム企画一覧</a>からご確認ください。</li>
						</ul>
					</div>

                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>