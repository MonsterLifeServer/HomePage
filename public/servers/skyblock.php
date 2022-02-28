<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'スカイブロック鯖');
$func->setPageUrl($func->getUrl().'/servers/skyblock');
$func->setDescription('スカイブロックサーバーについて');

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

					<h1 class="design">スカイブロック鯖</h1>
					<h2 class="design">できること</h2>
                    <div class="box text-left">
						<ul>
							<li>1.12.2でサーバーにアクセスできる。</li>
                            <li>11個の浮遊島があります。</li>
						</ul>
					</div>

                    <h2 class="design">ミッション</h2>
					<div class="box text-left">
						<ul>
							<li>丸石製造機を作る。</li>
							<li>植林場を作る。</li>
							<li>小麦畑を作る。</li>
                            <li>人参畑を作る。</li>
                            <li>ジャガイモ畑を作る。</li>
                            <li>全種類の原木を集める。</li>
                            <li>村人ゾンビを治癒する。</li>
                            <li>村を作る。</li>
                            <li>プレイヤーの家を建てる。</li>
                            <li>全色のベッドを作る。</li>
                            <li>パンを1スタック作る。</li>
                            <li>スノーゴーレムを10体作る。</li>
                            <li>エンドラを倒す。</li>
						</ul>
					</div>

					<h2 class="design">禁止事項</h2>
					<div class="box text-left">
						<ul>
							<li><a href="<?php echo $func->getUrl(); ?>/terms">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
						</ul>
					</div>

                    <h2 class="design">コマンド</h2>
                    <table class="cmd">
                        <tr><th>/discordlink</th><td>マインクラフトアカウントをDiscordアカウントと連携ができる。</td></tr>
                        <tr><th>/sponsor</th><td>自分がスポンサーかどうかを確認できる。また，スポンサーなら失効期限がわかる。</td></tr>
                        <tr><th>*/displaycolor</th><td>スポンサー限定コマンド。自分の表示カラーを変更できる。</td></tr>
                        <tr><th>/jp on</th><td>ローマ字変換機能をONにする。</td></tr>
                        <tr><th>/jp off</th><td>ローマ字変換機能をOFFにする。</td></tr>
                        <tr><th>/jp toggle</th><td>ローマ字変換機能を切り替える。</td></tr>
                    </table>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>