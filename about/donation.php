<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "寄付について";
$URL = $conf["url"] . '/about/donation';
$DESCRIPTION = "MonsterLifeServerの寄付について";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <style>
        iframe {
            height:500px;
            width:100%;
        }
        </style>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <p class="fileupdate right">最終更新日時:<?php echo date('Y/m/d H時i分', filemtime(basename(__FILE__))); ?></p>
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/about/donation">
                                <span itemprop="name"><?php echo $TITLE; ?></span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <h1 class="design">寄付について</h1>
                    <p>
                        当サーバーでは寄付をしてくれた方に金額に合わせた特典を与えるようにしています。

                    </p>
                    <h2 class="design">特典</h2>
                    <div class="plancards">
                        <h3>VIP</h3>
                        <h4>400</h4>
                        <div>yen/月</div>
                        <h4>4000</h4>
                        <div>yen/年</div>
                        <p>ロビーなどで空を飛べたり，表示色を変更できたりします。</p>
                    </div>
                    <h2 class="design">通帳</h2>
                    <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=2062672440&range=A1:F1000&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
                    <!-- パンくずリスト -->
                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>