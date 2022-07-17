<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'ミニゲーム企画鯖');
$func->setPageUrl($func->getUrl().'/servers/event');
$func->setDescription('ミニゲーム企画を開催するサーバーについて');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/event.min.css">
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト -->
                    <div class="top-label">
                        <div class="item-left">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/servers/">
                                        <span itemprop="name">サーバー</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
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

					<h1 class="design">ミニゲーム企画鯖</h1>
					<h2 class="design">できること</h2>
                    <div class="box text-left">
						<ul>
                            <li>PCゲーム『青鬼』の館をマイクラで再現した鬼ごっこ型のミニゲームやスマホゲーム『青鬼ONLINE』をマイクラで再現したミニゲーム，増え鬼などあらゆるミニゲーム企画を開催・現在進行形で開発しております。当鯖に参加して遊べるミニゲームは<a href="<?php echo $func->getUrl(); ?>/game/" target="_blank">ミニゲーム一覧</a>より確認できます。</li>
                            <li>1.12.2でミニゲームが遊ぶことができる。<br>※他バージョンの場合は開催時に連絡いたします。</li>
						</ul>
					</div>
					<h2 class="design">禁止事項</h2>
					<div class="box text-left">
						<ul>
							<li><a href="<?php echo $func->getUrl(); ?>/terms">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
                            <li>企画ごとに細かいルールが存在します。詳細は<a href="<?php echo $func->getUrl(); ?>/game/">ミニゲーム企画一覧</a>からご確認ください。</li>
						</ul>
					</div>
                    <h2 class="design">企画の動画</h2>
                    <div class="aooni_youtube_cm">
                        <div class="aooni_title_logo"><span class="aooni-logo-style">青鬼ゲーム</span></div>
                        <div class="flex-box">
                            <div class="aooni_description"><span class="text-blue text-25px">青</span>い化け物が出るという噂の館に来た<ruby><span class="text-25px">ひろし</span><rt>プレイヤー</rt></ruby>たちは，突如広い部屋に集められた。そして謎のカウントダウンが終わると一緒に来た友人が一人消えた。？！さっきまで空っぽだった牢屋に何かがいる...？あれは<span class="text-blue text-25px">青</span>い...化け物か？！果たして<ruby><span class="text-25px">ひろし</span><rt>プレイヤー</rt></ruby>たちは，欠けた鍵を修復して館から脱出できるのか？！<span class="text-blue text-25px">青</span>い化け物から逃げて脱出せよ！！</div>
                            <div class="aooni_movie">
                                <a href="https://www.youtube.com/watch?v=hZvyzitiUOo&list=PL_0GzODUwYMA-BibQjLkQAFW4otbFgSE3&index=5" target="_blank">
                                    <img class="aooni_movie_img" src="https://i.gyazo.com/c3d3f38fcd7998574015db187502a2bd.png" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>