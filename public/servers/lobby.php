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

					<h1 class="design">ロビー鯖</h1>
					<h2 class="design">できること</h2>
                    <div class="box text-left">
						<ul>
							<li>1.8-1.21でサーバーにアクセスできる。</li>
							<li>MLSのいろいろの鯖に移動できる。</li>
							<li>あらゆるアスレチックで遊ぶことができる。</li>
                            <li>あなたがボッチじゃなければミニゲームができる。</li>
						</ul>
					</div>

					<h2 class="design">禁止事項</h2>
					<div class="box text-left">
						<ul>
							<li><a href="https://wiki.mlserver.xyz/?p=51">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
						</ul>
					</div>
                    
					<h2 class="design">その他，ルールや特徴</h2>
                    <p>当鯖では使用できるMODとできないMODが存在します。詳細は<a href="https://wiki.mlserver.xyz/?p=20" target="_blank">非公式WIKI</a>をご覧ください。</p>

                    <h2 class="design">コマンド</h2>
                    <table class="cmd">
                        <tr><th>/discordlink</th><td>マインクラフトアカウントをDiscordアカウントと連携ができる。</td></tr>
                        <tr><th>/sponsor</th><td>自分がスポンサーかどうかを確認できる。また，スポンサーなら失効期限がわかる。</td></tr>
                        <tr><th>*/displaycolor</th><td>スポンサー限定コマンド。自分の表示カラーを変更できる。</td></tr>
                        <tr><th>/jp on</th><td>ローマ字変換機能をONにする。</td></tr>
                        <tr><th>/jp off</th><td>ローマ字変換機能をOFFにする。</td></tr>
                        <tr><th>/jp toggle</th><td>ローマ字変換機能を切り替える。</td></tr>
                        <tr><th>/lobby</th><td>ロビーへ戻れます(一部エリアでは制限されています)</td></tr>
                        <tr><th>/spawn</th><td>スポーンポイントへ戻れます(一部エリアでは制限されています)</td></tr>
                    </table>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>