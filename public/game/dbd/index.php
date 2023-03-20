<?php

include('./../../assets/function.php');
$func = new HomePageFunction('./../../assets/config.php', 'DeadByDaylight in MC');
$func->setPageUrl($func->getUrl().'/game/dbd/');
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
                    <section class="first-section text-center">
                        <span class="title-level color-white">『死と隣り合わせのかくれんぼ』をMinecraftで...</span>
                        <div class="title-description">
                            <span class="color-white">忍び寄った獲物に襲いかかり、贄として捧げる怪物のごとき殺人鬼。団結して脱出を図る、手練れの生存者4人。『DeadByDaylight in MC』の世界で殺人鬼または生存者になりましょう。</span>
                        </div>
                    </section>
                    <section class="next-section team-section">
                        <div class="killer-field">
                            <div class="img-field">
                                <img src="../../assets/img/dbd/dbd-trapper-image.png" alt="">
                            </div>
                            <div class="text-field">
                                <h2>キラー</h2>
                                <p>ソロプレイ</p>
                            </div>
                        </div>
                        <div class="survivor-field">
                            <div class="img-field">
                                <img src="../../assets/img/dbd/dbd-survivor-image.png" alt="">
                            </div>
                            <div class="text-field">
                                <h2>サバイバー</h2>
                                <p>協力プレイ</p>
                            </div>
                        </div>
                    </section>
                    <section class="next-section team-description">
                        <div class="pt-16">
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <script>
        $('.killer-field').hover(
            function() {
                $(".survivor-field img").addClass("gray-scale");
            },
            function() {
                $(".survivor-field img").removeClass("gray-scale");
            }
        );
        $('.survivor-field').hover(
            function() {
                $(".killer-field img").addClass("gray-scale");
            },
            function() {
                $(".killer-field img").removeClass("gray-scale");
            }
        );
    </script>
    <?php $func->printFootScript(); ?>
</html>