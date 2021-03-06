<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "DeadByDaylight in MC";
$URL = $conf["url"] . '/game/dbd';
$DESCRIPTION = "DeadByDaylightをマイクラで遊べるようにした企画「DeadByDaylight in MC」のルール紹介ページです。";

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
            
            <div class="mainBox"><div class="contents">
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
                        <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/">
                            <span itemprop="name">ミニゲーム企画</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>

                    <li itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/dbd">
                            <span itemprop="name"><?php echo $TITLE; ?></span>
                        </a>
                        <meta itemprop="position" content="3" />
                    </li>
                </ol>
                <!-- パンくずリスト -->

                <h1 class="design">DeadbyDaylight in MC</h1>

                <div class="flex-box2">

                    <div class="sub-box">
                        <h2>ルール</h2>
                        <p>DeadbyDaylightがマイクラで遊べるミニゲーム企画。</p>
                        <p></code>/report ＜テキスト＞</code>で運営にメッセージを送信。</code>/global ＜テキスト＞</code>でチーム関係なくメッセージを送信。</code>/oni</code>で青鬼抽選期間中なら青鬼抽選に参加/離脱。</p>
                    </div>

                    <div class="radius-box">
                        <h2>企画詳細</h2>

                        <h3>現在中止中</h3>
                        <p>バグ発生のため</p><hr />
                        <h3>ゲーム時間</h3>
                        <p>10分</p><hr />
                        <h3>最低参加人数</h3>
                        <p>4人</p><hr />
                        <h3>バージョン</h3>
                        <p>1.12.2</p><hr />
                        <h3>カテゴリ</h3>
                        <span class="category">鬼ごっこ</span>
                        <hr />
                        <h3>テクスチャ</h3>
                        <p><a href="<?php echo $conf['tex']['dbd']; ?>" download>ダウンロード</a></p>

                    </div>

                </div>

            </div></div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>