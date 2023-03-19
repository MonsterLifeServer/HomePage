<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'DeadByDaylight in MC');
$func->setPageUrl($func->getUrl().'/game/dbd');
$func->setDescription('DeadByDaylightをマイクラで遊べるようにした企画「DeadByDaylight in MC」のルール紹介ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/dbd.min.css">
    </head>
    <body class="dbd">
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
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
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
                    <section>
                        
                    </section>
                    <section class="park-section">
                        <span class="park-title">サバイバーパーク</span>
                        <div class="park-wrap">
                            <?php
                                require_once "../assets/lib/spyc.php";
                                $yaml = spyc_load_file("../assets/data/park.yml");
                            ?>
                            <p><img src="" alt="下筌ダム" id="SurvivorParkMainPhoto"></p>
                            <ul>
                                <li><img src="img/01.jpg" width="72" alt="下筌ダム" class="SurvivorParkChangePhoto"></li>
                            </ul>
                            <!-- 参考 <https://klutche.org/archives/460/> -->
                        </div>
                    </section>  
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>