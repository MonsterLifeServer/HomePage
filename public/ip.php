<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php', 'IP');
$func->setPageUrl($func->getUrl().'/ip');
$func->setDescription('MonsterLifeServerのIPアドレス');

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

                    <h1 class="design">IPアドレス</h1>
					<h2 class="design">利用規約・ガイドライン</h2>
                    <p>
                        サーバーIPを取得した時点で，<a href="<?php echo $func->getUrl(); ?>/terms">利用規約・ガイドライン</a>に同意したものとみなします。これは第三者から禁止されている順序でIPアドレスを取得していても同様です。
                    </p>
                    <p>
                        サーバーに参加する際場合によっては<a href="https://discord.mlserver.xyz/" target="_blank">Discordサーバー</a>へ参加を必要とされる場合があり，これはDiscordアカウントとMinecraftアカウントを連携するためです。
                    </p>
                    <p>
                        Java版のプレイヤーのバージョンについて，サーバーは基本的に1.12.2で動作しています。1.12.2以外のバージョンでの動作は保証されません。
                    </p>
                    <p>
                        統合版のプレイヤーについて，サーバーは基本的にJava版1.12.2で動作しています。そのため統合版のプレイヤーは最大限プレイを楽しむことができないかもしれません。
                        その場合は，<a href="https://discord.mlserver.xyz/" target="_blank">Discordサーバー</a>の提案・報告フォーラムの「統合版用」を使用して現象を報告・対応の提案をすることで改善されるかもしれません。
                    </p>
                    <p>
                        前述したとおりIPアドレスを運営の許可なく第三者に伝えることは禁止されています。ただしこのページのURLを伝えることは禁止されていません。
                    </p>
                    <div class="ip_show">
                        <div class="ip_show_table">
                            <div class="ip_show_check_box_field">
                                <input type="checkbox" id="ip_show_check" name="ip_show_check" value="1" />
                                <label for="ip_show_check">これらに同意してIPアドレスを取得しますか？</label>
                            </div>
                        </div>
                        <div id="ip_show_box">
                            <p>
                                <h5>Java版</h5>
                                IPアドレス: <?php echo $func->getJavaIp(); ?><br />ポート: 25565
                            </p>
                            <p>
                                <h5>統合版</h5>
                                IPアドレス: <?php echo $func->getBeIp(); ?><br />ポート: 40012
                            </p>
                            <p>※ポートを入力しないといけない場合のみポート番号を入力してください。</p>
                        </div>
                        <script>
                            $('#ip_show_check').click(function() {
                                //クリックイベントで要素をトグルさせる
                                $("#ip_show_box").slideToggle(this.checked);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>