<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>サバイバル鯖 | MonsterLifeServer</title>
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
							<a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/survival">
								<span itemprop="name">サバイバル鯖</span>
							</a>
							<meta itemprop="position" content="3" />
						</li>
					</ol>
					<!-- パンくずリスト -->
					<h1 class="design">サバイバル鯖</h1>
					<h2 class="design">できること</h2>
					<div class="box">
						<ul>
							<li>1.16.2のサバイバルが楽しめる</li>
							<li>独自経済システム等で買い物や土地の保護などができる</li>
							<li>建築ワールドにてクリエイティブ建築ができる(一部のユーザーのみ)</li>
						</ul>
					</div>
					<h2 class="design">禁止事項</h2>
					<div class="box">
						<ul>
							<li><a href="<?php echo $conf["url"]; ?>/terms">利用規約</a>に反すること。</li>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
							<li>他人が作った建築物を破壊しない。</li>
							<li>他人の設置したチェストを操作する行為</li>
							<li>通常プレイで再現不可能なチート行為は禁止です。<br>
								建築物やチェスト等は荒らされないように保護することをおススメします。</li>
						</ul>
					</div>
					<h2 class="design">その他、ルールや特徴</h2>
					<p>24H鯖ではMODの使用が禁止されています。ですが、以下のMODは使用許可が出ています。また、これらのMODを使用する前提では鯖は開発されていません。これらに関するバグはサポート外です。</p>
					<div class="box">
						<ul>
							<li>Optifine</li>
							<li>InventoryTweaks</li>
						</ul>
					</div>
					<h2 class="design">サバイバルワールドでのルールや説明</h2>
					<div class="box">
						<ul>
							<li>採掘や伐採は好き放題にしてもらって構いません。</li>
							<li>人の建築物やチェストを勝手に壊したり開けたりしないでください。</li>
							<li>一日１回サーバーログインするとガチャチケットが手に入ります</li>
							<li>ガチャチケットを持ってガチャブロックに対して右クリックするとガチャを引くことができます。</li>
							<li>ドット絵や文字などの建物でない建築物の建設は禁止です</li>
							<li>ロックしたいものやその上などに看板を設置するとそれを自分のものにできます。<br>
								※自分のものでもないのにロックしたりする行為は荒らしとして対応します。</li>
							<li>BANされた人、鯖から抜けて戻ってこないと判断された方のロックされたチェストなどはロックを解除します。</li>
						</ul>
					</div>
					<h2 class="design">通報方法</h2>
					<p>/co inspect（または/co i）と入力し、インスペクターモードを有効にします。</p>
					<a href="https://i.gyazo.com/9254dc4261cbe436a8c2e8afde0f6948.png"
                        class="strip"
                        data-strip-group="coreprotect"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/9254dc4261cbe436a8c2e8afde0f6948.png">
					</a>
					<p>そして、ログを確認したいブロックを右クリックするか、確認したい空間に手持ちのブロックを設置します（インスペクターモードが有効の状態ではブロックを設置、破壊はできません。）</p>
					<p>しばらくすると、ログが表示されます。<br>
						（荒らしのログなどを発見した場合、スクリーンショットを撮影し管理者へ報告してください。）</p>
					<a href="https://i.gyazo.com/e48a4d4bdf911b2b62459658f4372b19.png"
                        class="strip"
                        data-strip-group="coreprotect"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/e48a4d4bdf911b2b62459658f4372b19.png">
					</a>
					<p>ログが複数ページにわたる場合/co l <ページ番号>で指定したページに移動することができます。</p>
					<p>/co inspect（または/co i）を再び入力し、インスペクターモードを解除します。</p>
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
					<h2 class="design">ロックの使用例</h2>
					<p>チェストや扉に看板をつけるとロックすることができます。また、扉においては真上のブロックに設置することでもロックできます。</p>
					<a href="https://i.gyazo.com/e998cc16b8c8d1f4e5f9cc664f3f6bbe.png"
						class="strip"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/e998cc16b8c8d1f4e5f9cc664f3f6bbe.png">
					</a>
					<h2 class="design">ショップ使用方法（QuickShopPlugin）</h2>
					<a href="https://i.gyazo.com/b3418272b3e72d46900e98e5587b3423.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/b3418272b3e72d46900e98e5587b3423.png">
					</a>
					<a href="https://i.gyazo.com/a36682d869cdd66762f0cec68228b101.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/a36682d869cdd66762f0cec68228b101.png">
					</a>
					<a href="https://i.gyazo.com/b210031da822b7f6fd17e6bb2bc9ced3.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/b210031da822b7f6fd17e6bb2bc9ced3.png">
					</a>
					<a href="https://i.gyazo.com/eee00105a03bf20c6597b36639657631.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/eee00105a03bf20c6597b36639657631.png">
					</a>
					<a href="https://i.gyazo.com/4f4d54a25a3fb0e11e669c388d914829.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/4f4d54a25a3fb0e11e669c388d914829.png">
					</a>
					<a href="https://i.gyazo.com/e50d26af2e737c84764f771e58709dbb.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/e50d26af2e737c84764f771e58709dbb.png">
					</a>
					<a href="https://i.gyazo.com/5075fac3bf4de5067883b858066c6f73.png"
						class="strip"
						data-strip-group="shop"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/5075fac3bf4de5067883b858066c6f73.png">
					</a>
					<h2 class="design">ガチャガチャ</h2>
					<a href="https://i.gyazo.com/3d8193cee6c878393e263a175aac4b5c.png"
						class="strip"
						data-strip-group="gatya"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/3d8193cee6c878393e263a175aac4b5c.png">
					</a>
					<a href="https://i.gyazo.com/6811b6a214d889fa83f68be9a93836bd.png"
						class="strip"
						data-strip-group="gatya"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/6811b6a214d889fa83f68be9a93836bd.png">
					</a>
					<a href="https://i.gyazo.com/eb13897101c0192c3f231296ff69fe91.png"
						class="strip"
						data-strip-group="gatya"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/eb13897101c0192c3f231296ff69fe91.png">
					</a>
					<a href="https://i.gyazo.com/145c2221c7f61a5afec6dfeb95221729.png"
						class="strip"
						data-strip-group="gatya"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/145c2221c7f61a5afec6dfeb95221729.png">
					</a>
					<a href="https://i.gyazo.com/d331c934a4ce4aec0bc81d38e5bffa18.png"
						class="strip"
						data-strip-group="gatya"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/d331c934a4ce4aec0bc81d38e5bffa18.png">
					</a>
					<a href="https://i.gyazo.com/620f28f3ffd55b2c74ece3f970b21522.png"
						class="strip"
						data-strip-group="gatya"
                        data-strip-group-options="loop: false, maxWidth: 500">
						<img src="https://i.gyazo.com/620f28f3ffd55b2c74ece3f970b21522.png">
					</a>
					<h2 class="design">保護フラグ一覧</h2>
					<p>/hogo create <土地の名前>で土地を保護することができます。その後、/hogo flag <FLAG> <土地の名前>で土地の設定をすることができます。</p>
					<iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=1770321307&range=A1:B12&amp;single=true&amp;widget=true&amp;headers=false" height="370px"></iframe>
				</div>
			</div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>