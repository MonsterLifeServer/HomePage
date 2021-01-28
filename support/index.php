<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>サポート | MonsterLifeServer</title>
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/support/">
                                <span itemprop="name">サポート</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <h1 class="design">サポート</h1>
                    <h2 class="design">FAQ</h2>
                    <p>よくある質問を掲載しています。アクセスは<a href="<?php echo $conf["url"]; ?>/support/faq">コチラ</a>からどうぞ。</p>
                    <h2 class="design">お問い合わせ</h2>
                    <p>バグ報告やサポートを受けたい方は<a href="<?php echo $conf["url"]; ?>/form">コチラ</a>から受けることができます。また、<a href="https://discord.gg/gaGB6Mm">Discordグループ</a>からもお問い合わせすることができ、返信が早い場合がございます。</p>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>