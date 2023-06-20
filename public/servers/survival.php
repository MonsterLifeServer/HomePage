<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'サバイバル鯖');
$func->setPageUrl($func->getUrl().'/servers/survival');
$func->setDescription('サバイバルサーバーについて');

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
					<h1 class="design">サバイバル鯖</h1>
					<p>1.20.xのサバイバルを遊ぶだけのサーバーです。プラグインなどは最低限の荒らし対策や投票サービスの通知など大きくプレイに影響の出ないものとなっており99%バニラ鯖となっています。</p>
					<h2 class="design">禁止事項</h2>
					<div class="box text-left">
						<ul>
							<li><a href="<?php echo $func->getUrl(); ?>/terms">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
							<li>他人が作った建築物を破壊する行為</li>
							<li>他人の設置したチェストを操作する行為</li>
							<li>通常プレイで再現不可能なチート行為</li>
							<li>人の建築物やチェストを勝手に壊したり開けたりする行為</li>
						</ul>
					</div>
					<h2 class="design">その他，ルールや特徴</h2>
					<p>24H鯖ではMODの使用が禁止されています。ですが，以下のMODは使用許可が出ています。また，これらのMODを使用する前提では鯖は開発されていません。これらに関するバグはサポート外です。</p>
					<div class="box text-left">
						<ul>
							<li>Optifine</li>
							<li>InventoryTweaks</li>
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
					<h2 class="design">通報方法</h2>
					<p>/co inspect（または/co i）と入力し，インスペクターモードを有効にします。</p>
					<a href="https://i.gyazo.com/9254dc4261cbe436a8c2e8afde0f6948.png"
                        class="strip"
                        data-strip-group="coreprotect"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/9254dc4261cbe436a8c2e8afde0f6948.png">
					</a>
					<p>そして，ログを確認したいブロックを右クリックするか，確認したい空間に手持ちのブロックを設置します（インスペクターモードが有効の状態ではブロックを設置，破壊はできません。）</p>
					<p>しばらくすると，ログが表示されます。<br>
						（荒らしのログなどを発見した場合，スクリーンショットを撮影し管理者へ報告してください。）</p>
					<a href="https://i.gyazo.com/e48a4d4bdf911b2b62459658f4372b19.png"
                        class="strip"
                        data-strip-group="coreprotect"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/e48a4d4bdf911b2b62459658f4372b19.png">
					</a>
					<p>ログが複数ページにわたる場合/co l <ページ番号>で指定したページに移動することができます。</p>
					<p>/co inspect（または/co i）を再び入力し，インスペクターモードを解除します。</p>
					<a href="https://i.gyazo.com/b400179dbaf242c8a4934cd500f09be6.png"
                        class="strip"
                        data-strip-group="coreprotect"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/b400179dbaf242c8a4934cd500f09be6.png">
					</a>
					<p>/report 通報内容で通報できます。<br>
						※もし証拠の提出を要求されたときに提出できるように画像などでデータを残しておいてください。</p>
					<a href="https://i.gyazo.com/6fc5de6e4fd637ca243680ceb4e69f6f.png"
                        class="strip"
                        data-strip-group="coreprotect"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/6fc5de6e4fd637ca243680ceb4e69f6f.png">
					</a>
					<h2 class="design">ロックについて</h2>
					<p>チェストや竈門などインベントを持つブロックを設置するとそのブロックは自動的に保護されます。</p>
					<p>扉などは設置してもロックできないため<code>/lock</code>とコマンドを実行した後扉を右クリックすることで扉をロックできます。これはあらゆるブロックに対してできますが第三者の所有物や共有財産に対して行うと処罰対象です。(詳細はサバイバル鯖ルールへ)</p>
					<p>ロックの解除は<code>/unlock</code>実行後対象ブロックを右クリックで可能です。</p>
				</div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>