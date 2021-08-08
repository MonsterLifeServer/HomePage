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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/about/donation">
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
                    <h1 class="design">寄付について</h1>
                    <p>
                        当サーバーは、管理人が個人でありサーバー維持研究のため運営している非営利団体です。そのため、運営のための負担が非常に大きく、金銭面からサーバーが継続が困難になる可能性があります。大変心苦しいのですが、皆様のご協力をよろしくお願い申し上げます。
                    </p>
                    <p>
                        当サーバーでは寄付をしてくれた方に金額に合わせた期間特典を与えるようにしています。
                    </p>
                    <p>
                        特典の内容については、<a href="https://account.mojang.com/terms" target="_blank">Minecraft Terms and Conditions</a>、<a href="https://account.mojang.com/terms#commercial" target="_blank">Commercial usage guidelines</a>に基づき提供されます。
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
                    <p>寄付された金額などは当鯖の通帳より確認できます。通帳は<a href="<?php echo $conf["url"]; ?>/about/passbook">コチラ</a>です。</p>
                    <!-- パンくずリスト -->
                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>