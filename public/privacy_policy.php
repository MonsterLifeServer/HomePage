<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php', 'プライバシーポリシー');
$func->setPageUrl($func->getUrl().'/privacy_policy');
$func->setDescription('MonsterLifeServerのプライバシーポリシー');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
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

                    <h1 class="design">プライバシーポリシー</h1>
					<h2 class="design">アクセス解析ツールについて</h2>
                    <p>
                        当サイトでは，Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。 
                        このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。
                        このトラフィックデータは匿名で収集されており，個人を特定するものではありません。
                        この機能はCookieを無効にすることで収集を拒否することが出来ますので，お使いのブラウザの設定をご確認ください。 
                        この規約に関して，詳しくは <a href="https://policies.google.com/privacy" target="_blank">こちら</a> を御覧ください。
                    </p>
                    <h2 class="design">ChannelSubCheckerについて</h2>
                    <p>
                        当サイトでは，YouTubeAPIによるあなたのチャンネルに対する「読み込み専用アクセス」を利用しています。
                        このYouTubeAPIはチャンネル登録者限定ミニゲーム企画を開催するために利用しています。
                        このデータは登録しているかのみを収集しており，個人を特定するものではありません。
                        この機能は収集前にあなたの許可を必ず得て収集されており，それを拒否することが出来ますので，収集の許可を聞かれた際にはご注意ください。
                    </p>
                    <h2 class="design">DiscordAPIについて</h2>
                    <p>
                        当サイトでは，DiscordAPIによるあなたの所有するDiscordアカウントの情報を取得しています。
                        このDiscordAPIは，あなたがMonsterLifeServerの運営であるかを判断するために使用しており，個人を特定するものではありません。
                        この機能は収集前にあなたの許可を必ず得て収集されており，それを拒否することが出来ますので，収集の許可を聞かれた際にはご注意ください。
                        収集している情報は <a href="https://discord.com/developers/docs/game-sdk/users" target="_blank">こちら</a> に記載されている情報だけですので御覧ください。
                    </p>
                    <h2 class="design">免責事項</h2>
                    <p>
                        当サイトからリンクやバナーなどによって他のサイトに移動された場合，移動先サイトで提供される情報，サービス等について一切の責任を負いません。
                        当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。
                    </p>
                    <h2 class="design">プライバシーポリシーの変更について</h2>
                    <p>
                        当サイトは，個人情報に関して適用される日本の法令を遵守するとともに，本ポリシーの内容を適宜見直しその改善に努めます。
                        修正された最新のプライバシーポリシーは常に本ページにて開示されます。
                    </p>

                    <div class="box text-center">
                        令和　三年　０７月０９日　策定<br>
                        令和　四年　０５月０４日　改定
                    </div>
                </div>
            </div>
        </div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>