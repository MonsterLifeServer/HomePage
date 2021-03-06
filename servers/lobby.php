<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "ロビー鯖";
$URL = $conf["url"] . '/servers/lobby';
$DESCRIPTION = "ロビーサーバーについて";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/">
                                <span itemprop="name">サーバー</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>

                        <li itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/lobby">
                                <span itemprop="name"><?php echo $TITLE; ?></span>
                            </a>
                            <meta itemprop="position" content="3" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->

					<h1 class="design">ロビー鯖</h1>
					<h2 class="design">できること</h2>
                    <div class="box text-left">
						<ul>
							<li>1.8-1.16.3でサーバーにアクセスできる。</li>
							<li>MLSのいろいろの鯖に移動できる。</li>
							<li>あらゆるアスレチックで遊ぶことができる。</li>
                            <li>あなたがボッチじゃなければミニゲームができる。</li>
						</ul>
					</div>

					<h2 class="design">禁止事項</h2>
					<div class="box text-left">
						<ul>
							<li><a href="<?php echo $conf["url"]; ?>/terms">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
						</ul>
					</div>

                    <h2 class="design">コマンド</h2>
                    <table class="cmd">
                        <tr><th>/discordlink</th><td>マインクラフトアカウントをDiscordアカウントと連携ができる。</td></tr>
                        <tr><th>/sponsor</th><td>自分がスポンサーかどうかを確認できる。また、スポンサーなら失効期限がわかる。</td></tr>
                        <tr><th>*/displaycolor</th><td>スポンサー限定コマンド。自分の表示カラーを変更できる。</td></tr>
                        <tr><th>/jp on</th><td>ローマ字変換機能をONにする。</td></tr>
                        <tr><th>/jp off</th><td>ローマ字変換機能をOFFにする。</td></tr>
                        <tr><th>/jp toggle</th><td>ローマ字変換機能を切り替える。</td></tr>
                    </table>

                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>