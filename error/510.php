<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>510 Not Extended | MonsterLifeServer</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/error.min.css">
    </head>
    <body class="error_510">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <div class="text-left">
                        <!-- パンくずリスト始 -->
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
                                <a itemprop="item" href="#">
                                    <span itemprop="name">510 Not Extended</span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>
                        </ol>
                        <!-- パンくずリスト終 -->
                    </div>
                    <h1>510 Not Extended</h1>
                    <h2>現在、当サイトへのアクセスが集中しております。しばらく待ってから再度アクセスしてください。</h2>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>