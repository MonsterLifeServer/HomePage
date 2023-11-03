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
                    <section class="first-section text-center px-10">
                        <span class="title-level color-white">『死と隣り合わせのかくれんぼ』をMinecraftで...</span>
                        <div class="title-description">
                            <span class="color-white">忍び寄った獲物に襲いかかり、贄として捧げる怪物のごとき殺人鬼。団結して脱出を図る、手練れの生存者達。『DeadByDaylight in MC』の世界で殺人鬼または生存者になりましょう。</span>
                        </div>
                    </section>
                    <section class="next-section team-section px-10">
                        <div class="killer-field">
                            <div class="img-field">
                                <img src="../../assets/img/dbd/dbd-trapper-image.png" alt="">
                            </div>
                            <div class="text-field">
                                <h2>殺人鬼としてプレイする</h2>
                                <p>(ソロ)</p>
                            </div>
                        </div>
                        <div class="survivor-field">
                            <div class="img-field">
                                <img src="../../assets/img/dbd/dbd-survivor-image.png" alt="">
                            </div>
                            <div class="text-field">
                                <h2>生存者としてプレイする</h2>
                                <p>(協力プレイ)</p>
                            </div>
                        </div>
                    </section>
                    <section class="next-section team-description px-10">
                        <div class="pt-16 text-center">
                            <div class="team-switch">
                                <div class="team-switch-content margin-center">
                                    <button class="killer-button active-button" value="killer" id="killer-button">殺人鬼</button>
                                    <button class="survivor-button" value="survivor" id="survivor-button">生存者</button>
                                </div>
                            </div>
                            <div class="killer-description text-center margin-center color-white" id="killer-description">
                                <h2>殺人鬼の基本プレイ</h2>
                                <p>それぞれの個性がある殺人鬼たちですが、目指すところは皆同じ。生存者を一人ずつ狙い撃ちして、エンティティに捧げることです。まずは基本を抑えておきましょう。</p>
                            </div>
                            <div class="survivor-description text-center margin-center color-white inactive" id="survivor-description">
                                <h2>生存者の基本プレイ</h2>
                                <p>生存者たちがチームの中で果たす役割はそれぞれ異なるかもしれませんが、共通の目標が変わることは決してありません。それは殺人鬼を回避し、儀式から脱出すること。まずは基本を抑えておきましょう。</p>
                            </div>
                        </div>
                    </section>
                    <section class="next-section team-description px-10">
                        <div class="pt-16 text-center">
                            <span class="title-level color-white">参考ページ</span>
                            <div class="flex-box1">

                                <div class="l-wrapper">
                                    <article class="card">
                                        <div class="card__header">
                                            <h3 class="card__title">パーク一覧</h3>
                                            <figure class="card__thumbnail">
                                                <img src="https://i.gyazo.com/01268330411abec72eabfd0e35b5b34c.png" alt="DeadbyDaylightをマイクラで遊べるようにしたミニゲーム企画「DeadbyDaylight in MC」のパーク一覧ページです。" class="card__image">
                                            </figure>
                                        </div>
                                        <div class="card__body">
                                            <p class="card__text">DeadbyDaylightをマイクラで遊べるようにしたミニゲーム企画「DeadbyDaylight in MC」のパーク一覧ページです。</p>
                                        </div>
                                        <div class="card__footer">
                                            <p class="card__text"><a href="<?php echo $func->getUrl(); ?>/game/dbd/parks" class="button -primary">ページを見る</a></p>
                                        </div>
                                    </article>
                                </div>
                                <div class="l-wrapper">
                                    <article class="card">
                                        <div class="card__header">
                                            <h3 class="card__title">非公式WIKI</h3>
                                            <figure class="card__thumbnail">
                                                <img src="https://i.gyazo.com/6859da6fc26b248d9de816fe2ba4c871.png" alt="DeadbyDaylightをマイクラで遊べるようにしたミニゲーム企画「DeadbyDaylight in MC」の情報ページです。" class="card__image">
                                            </figure>
                                        </div>
                                        <div class="card__body">
                                            <p class="card__text">DeadbyDaylightをマイクラで遊べるようにしたミニゲーム企画「DeadbyDaylight in MC」の情報ページです。</p>
                                        </div>
                                        <div class="card__footer">
                                            <p class="card__text"><a href="https://wiki.mlserver.xyz/?p=9" class="button -primary">ページを見る</a></p>
                                        </div>
                                    </article>
                                </div>
                            </div>
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
        $('.killer-field').click(
            function() {
                ClickKillerButton();
            }
        );
        $('.survivor-field').click(
            function() {
                ClickSurvivorButton();
            }
        );
        $('#killer-button').click(
            function() {
                ClickKillerButton();
            }
        );
        $('#survivor-button').click(
            function() {
                ClickSurvivorButton();
            }
        );
        function ClickKillerButton(){
            if (!$("#survivor-description").hasClass("inactive")) {
                $("#survivor-description").addClass("inactive");
            }
            $("#killer-description").removeClass("inactive");

            if (!$("#killer-button").hasClass("active-button")) {
                $("#killer-button").addClass("active-button");
            }
            $("#survivor-button").removeClass("active-button");
        }
        function ClickSurvivorButton(){
            if (!$("#killer-description").hasClass("inactive")) {
                $("#killer-description").addClass("inactive");
            }
            $("#survivor-description").removeClass("inactive");
            
            if (!$("#survivor-button").hasClass("active-button")) {
                $("#survivor-button").addClass("active-button");
            }
            $("#killer-button").removeClass("active-button");
        }
    </script>
    <?php $func->printFootScript(); ?>
</html>