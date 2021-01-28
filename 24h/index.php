<?php


$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<style>
			div.text_box table{
				width: 100%;
			}

			div.text_box th.id {
				width: 30%;
				height: 50px;
				text-align: center;
				background-color: #848484;
				color: #F7F8E0;
				vertical-align: middle;
			}
			div.text_box th.value {
				width: 70%;
				height: 50px;
				text-align: center;
				background-color: #848484;
				color: #F7F8E0;
				vertical-align: middle;
			}
			
			div.text_box td {
				height: 30px;
				text-align: left;
				background-color: #FFF;
				color: #000;
				vertical-align: middle;
			}

			div.text_box table,
			div.text_box th,
			div.text_box td {
				border: solid 1px black;
				border-spacing: 0;
				padding: 5px;
			}
		</style>
		<title>24H鯖 | MonsterLifeServer</title>
	</head>

	<body>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
		<div class="wrapper">
			<div class="mainBox">
				<div class="contents">
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
							<a itemprop="item" href="<?php echo $conf["url"]; ?>/24h">
								<span itemprop="name">24H鯖</span>
							</a>
							<meta itemprop="position" content="2" />
						</li>
					</ol>
					<h1 class="design">24H鯖</h1>
					<!-- 目次 -->
						<ul class="mokuji">
							<li><a href="#24h_1">24H鯖でできること。</a></li>
							<li><a href="#rule">24H鯖基本ルール</a></li>
							<li><a href="#mods">MODに関して...</a></li>
							<li><a href="#24h_2">サバイバルワールドでのルールや説明</a></li>
							<li><a href="#24h_3">通報方法</a></li>
							<li><a href="#24h_4">ロックの使用例</a></li>
							<li><a href="#24h_5">ショップ使用方法（QuickShopPlugin）</a></li>
							<li><a href="#gatya">ガチャガチャの遊び方</a>
							<li><a href="#24h_6">24Hで使用できるコマンド一覧</a></li>
							<li><a href="#24h_61">建築保護フラグ一覧</a></li>
							<li><a href="#24h_7">24H鯖で使用できる特殊文字</a></li>
							<li><a href="#24h_9">導入Plugin</a></li>
						</ul>
					<!-- 目次 -->
					<h2 class="design" id="24h_1">24H鯖でできること。</h2>
					<div class="or_box">
						<ul>
							<li>サバイバルワールドに行ける</li>
							<li>ロビーにアスレがある</li>
							​<li>ミニゲームができる</li>
							<li>建築ワールドに行ける（認められた人間のみ）</li>
						</ul>
					</div>

					<h2 class="design" id="rule">24H鯖基本ルール</h2>
					<div class="or_box">
						<ul>
							<li>故意に負荷を鯖にかける行為は禁止です。</li>
							<li>不具合を利用する行為は禁止です。見つけ次第ご報告をお願いします。</li>
							​<li>他人が作った建築物を破壊しない。</li>
							<li>他人の設置したチェストを操作する行為</li>
							<li>通常プレイで再現不可能なチート行為は禁止です。</li>
						</ul>
						<div style="text-align: right;">建築物やチェスト等は荒らされないように保護することをおススメします。</div>
					</div>

					<h2 class="design" id="mods">MODに関して...</h2>
					<p>24H鯖ではMODの使用が禁止されています。ですが、以下のMODは使用許可が出ています。また、これらのMODを使用する前提では鯖は開発されていません。これらに関するバグはサポート外です。</p>
					<div class="or_box">
						<ul>
							<li>Optifine</li>
							<li>InventoryTweaks</li>
						</ul>
					</div>

					<h2 class="design" id="24h_2">サバイバルワールドでのルールや説明</h2>
					<div class="or_box">
						<ul>
							<li>スポーンポイント周辺（半径２０ブロック程度）は建築禁止です。</li>
							<li>採掘や伐採は好き放題にしてもらって構いません。</li>
							<li>人の建築物やチェストを勝手に壊したり開けたりしないでください。</li>
							​<li>ドット絵や文字などの建物でない建築物の建設は禁止です。</li>
							<li>サバイバルワールドでは死ぬとインベントリー内のアイテムを約半分失います</li>
							<li>一日１回サーバーログインするとガチャチケットが手に入ります<br>
								※サバイバルワールドで配布されます</li>
							<li>ガチャチケットを持ってスニークするとガチャを引けます。</li>
							<li>ロックしたいものやその上などに看板を設置するとそれを自分のものにできます。<br>
								※自分のものでもないのにロックしたりする行為は荒らしとして対応します。</li>
							<li>BANされた人、鯖から抜けて戻ってこないと判断された方のロックされたチェストなどはロックを解除します。</li>
						</ul>
					</div>
						
					<h2 class="design" id="24h_3">通報方法</h2>
					<div class="or_box">
						建築物を壊されたときは、(扉が片方壊されたとする。)<br>
						<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/1.png" data-lightbox="demo"><img src="<?php echo $conf["url"]; ?>/assets/img/coreprotect/1.png" width="100%"></img></a><br>
						<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/2.png" data-lightbox="demo"><img src="<?php echo $conf["url"]; ?>/assets/img/coreprotect/2.png" width="100%"></img></a><br>
						<code>/co i</code>と実行する。<br>
						<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/3.png" data-lightbox="demo"><img src="<?php echo $conf["url"]; ?>/assets/img/coreprotect/3.png" width="100%"></img></a><br>
						壊されたブロックの場所にブロックをなんでもいいので設置する。<br>※設置したブロックは消えてインベントリに戻ってきます。<br>
						<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/4.png" data-lightbox="demo"><img src="<?php echo $conf["url"]; ?>/assets/img/coreprotect/4.png" width="100%"></img></a><br>
						その時に表示されたログで壊した人が犯人となります。<br>
						<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/5.png" data-lightbox="demo"><img src="<?php echo $conf["url"]; ?>/assets/img/coreprotect/5.png" width="100%"></img></a><br>
						<code>/report 通報内容</code>で通報できます。<br>※もし証拠の提出を要求されたときに提出できるように画像などでデータを残しておいてください。<br>
						<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/6.png" data-lightbox="demo"><img src="<?php echo $conf["url"]; ?>/assets/img/coreprotect/6.png" width="100%"></img></a><br>
					</div>

					<h2 class="design" id="24h_4">ロックの使用例</h2>
					<a href="<?php echo $conf["url"]; ?>/assets/img/lockette.png" data-lightbox="1"><img src="<?php echo $conf["url"]; ?>/assets/img/lockette.png" width="100%"></img></a>
						
					<h2 class="design" id="24h_5">ショップ使用方法（QuickShopPlugin）</h2>
					<div class="or_box">
						<a href="https://image02.seesaawiki.jp/m/r/monsterlifeserver/SSp6jNRj68.png" data-lightbox="shop"><img src="https://image02.seesaawiki.jp/m/r/monsterlifeserver/SSp6jNRj68.png" width="100%"></img></a><br>
						<a href="https://image01.seesaawiki.jp/m/r/monsterlifeserver/LyHbpS5iIP.png" data-lightbox="shop"><img src="https://image01.seesaawiki.jp/m/r/monsterlifeserver/LyHbpS5iIP.png" width="100%"></img></a><br>
						<a href="https://image02.seesaawiki.jp/m/r/monsterlifeserver/6CxI4IWUHb.png" data-lightbox="shop"><img src="https://image02.seesaawiki.jp/m/r/monsterlifeserver/6CxI4IWUHb.png" width="100%"></img></a><br>
						<a href="https://image01.seesaawiki.jp/m/r/monsterlifeserver/fCF6Ar8fhB.png" data-lightbox="shop"><img src="https://image01.seesaawiki.jp/m/r/monsterlifeserver/fCF6Ar8fhB.png" width="100%"></img></a><br>
						<a href="https://image01.seesaawiki.jp/m/r/monsterlifeserver/fCF6Ar8fhB.png" data-lightbox="shop"><img src="https://image01.seesaawiki.jp/m/r/monsterlifeserver/fCF6Ar8fhB.png" width="100%"></img></a><br>
						<a href="https://image02.seesaawiki.jp/m/r/monsterlifeserver/uZyfo0F78E.png" data-lightbox="shop"><img src="https://image02.seesaawiki.jp/m/r/monsterlifeserver/uZyfo0F78E.png" width="100%"></img></a><br>
						<a href="https://image02.seesaawiki.jp/m/r/monsterlifeserver/JpVc1B8uLp.png" data-lightbox="shop"><img src="https://image02.seesaawiki.jp/m/r/monsterlifeserver/JpVc1B8uLp.png" width="100%"></img></a><br>
						<a href="https://image02.seesaawiki.jp/m/r/monsterlifeserver/LiSxxn0xap.png" data-lightbox="shop"><img src="https://image02.seesaawiki.jp/m/r/monsterlifeserver/LiSxxn0xap.png" width="100%"></img></a><br>
						<a href="https://image02.seesaawiki.jp/m/r/monsterlifeserver/0zjCZLxZDz.png" data-lightbox="shop"><img src="https://image02.seesaawiki.jp/m/r/monsterlifeserver/0zjCZLxZDz.png" width="100%"></img></a>
					</div>
						
					<h2 class="design" id="gatya">ガチャガチャの遊び方</h2>
					<div class="or_box">
						<a href="https://cdn.discordapp.com/attachments/672017404863315969/676809032014757918/unknown.png" data-lightbox="gatya"><img src="https://cdn.discordapp.com/attachments/672017404863315969/676809032014757918/unknown.png" width="100%"></img></a><br>
						<a href="https://cdn.discordapp.com/attachments/672017404863315969/676810251885871144/unknown.png" data-lightbox="gatya"><img src="https://cdn.discordapp.com/attachments/672017404863315969/676810251885871144/unknown.png" width="100%"></img></a><br>
						<a href="https://cdn.discordapp.com/attachments/672017404863315969/676809186977251356/unknown.png" data-lightbox="gatya"><img src="https://cdn.discordapp.com/attachments/672017404863315969/676809186977251356/unknown.png" width="100%"></img></a><br>
						<a href="https://cdn.discordapp.com/attachments/672017404863315969/676809417617965056/unknown.png" data-lightbox="gatya"><img src="https://cdn.discordapp.com/attachments/672017404863315969/676809417617965056/unknown.png" width="100%"></img></a><br>
						<a href="https://cdn.discordapp.com/attachments/672017404863315969/676809836088000542/unknown.png" data-lightbox="gatya"><img src="https://cdn.discordapp.com/attachments/672017404863315969/676809836088000542/unknown.png" width="100%"></img></a><br>
						<a href="https://cdn.discordapp.com/attachments/672017404863315969/676815087691890699/unknown.png" data-lightbox="gatya"><img src="https://cdn.discordapp.com/attachments/672017404863315969/676815087691890699/unknown.png" width="100%"></img></a>
					</div>
						
					<h2 class="design" id="24h_6">24Hで使用できるコマンド一覧</h2>
					<table id="content_block_1" style="width: 100%;">
						<tbody>
							<tr>
								<th class="id">コマンド</th>
								<th class="value">説明<br>使用例</th>
							</tr>
							<tr>
								<th colspan="2" class="id">経済（お金）</td>
							</tr>
							<tr>
								<td>/money</td>
								<td>所持金を確認可能</td>
							</tr>
							<tr>
								<td>/money pay &lt;プレイヤー&gt; &lt;金額&gt;</td>
								<td>所持金から選択したプレイヤーにお金を渡すことができます。<br>/money pay Monster2408 500</td>
							</tr>
							<tr>
								<th colspan="2" class="id">経済（SHOP）</td>
							</tr>
							<tr>
								<td>/shop price &lt;金額&gt;</td>
								<td>目の前のショップの金額を変更する。<br>/shop price 500</td>
							</tr>
							<tr>
								<td>/shop buy</td>
								<td>目の前のショップを販売専用ようにする。</td>
							</tr>
							<tr>
								<td>/shop sell</td>
								<td>目の前のショップを買い取り専用ようにする。</td>
							</tr>
							<tr>
								<td>/shop find &lt;アイテム&gt;</td>
								<td>周囲のショップから特定のアイテムを探す。<br>/shop find wool</td>
							</tr>
							<tr>
								<th colspan="2" class="id">MLS コマンド</td>
							</tr>
							<tr>
								<td>/mls [help] [&lt;int&gt;]</td>
								<td>専用コマンドのヘルプを表示します。<br>/mls help 1</td>
							</tr>
							<tr>
								<td>/mls afk</td>
								<td>放置中であれば解除を、そうでなければ放置モードにします。</td>
							</tr>
							<tr>
								<td>/mls gatya ticket</td>
								<td>ガチャチケットを受け取ります。</td>
							</tr>
							<tr>
								<td>/mls lobby</td>
								<td>ロビーにテレポートします。</td>
							</tr>
							<tr>
								<td>/mls survival</td>
								<td>サバイバルワールドにテレポートします。</td>
							</tr>
							<tr>
								<td>/mls home set</td>
								<td>自宅の座標を設定する。</td>
							</tr>
							<tr>
								<td>/mls home tp</td>
								<td>自宅の座標にテレポートする</td>
							</tr>
							<tr>
								<td>/mls menu</td>
								<td>メニューを開く</td>
							</tr>
							<tr>
								<td>/mls sidebar</td>
								<td>情報バーの表示を切り替える。</td>
							</tr>
							<tr>
								<td>/report &lt;text&gt;</td>
								<td>レポートを送信します。<br>/report ○○に荒らされました。<a href="<?php echo $conf["url"]; ?>/assets/img/coreprotect/5.png" class="outlink">証拠画像url</a></td>
							</tr>
							<tr>
								<th colspan="2" class="id">建築保護</td>
							</tr>
							<tr>
								<td>/hogo list</td>
								<td>自分が所有する土地リストを表示します。</td>
							</tr>
							<tr>
								<td>/hogo create &lt;AreaName&gt;</td>
								<td>選択した範囲を購入します。<br>/hogo create MyHome</td>
							</tr>
							<tr>
								<td>/hogo remove &lt;AreaName&gt;</td>
								<td>所持する土地を売却します。<br>/hogo create MyHome</td>
							</tr>
							<tr>
								<td>/hogo flags [&lt;int&gt;]</td>
								<td>土地設定一覧を表示します。</td>
							</tr>
							<tr>
								<td>/hogo flag &lt;Option&gt; &lt;AreaName&gt;</td>
								<td>指定した土地の設定をします。<br>/hogo flag BREAK MyHome</td>
							</tr>
							<tr>
								<td>/hogo flag list &lt;AreaName&gt;</td>
								<td>指定した土地の設定項目一覧を表示します。<br>/hogo flag list MyHome</td>
							</tr>
							<tr>
								<td>/hogo member add &lt;Player&gt; &lt;AreaNeme&gt;</td>
								<td>プレイヤーを指定した土地のメンバーに追加します。<br>/hogo member add aki_28 MyHome</td>
							</tr>
							<tr>
								<td>/hogo member remove &lt;Player&gt; &lt;AreaNeme&gt;</td>
								<td>プレイヤーを指定した土地のメンバーから削除します。<br>/hogo member add aki_28 MyHome</td>
							</tr>
							<tr>
								<td>/hogo member delete &lt;AreaNeme&gt;</td>
									<td>指定した土地のメンバーを削除します。<br>/hogo member delete MyHome</td>
							</tr>
							<tr>
								<td>/hogo member list &lt;AreaNeme&gt;</td>
								<td>指定した土地のメンバー一覧を表示します。<br>/hogo member list MyHome</td>
							</tr>
							<tr>
								<th colspan="2" class="id">運営専用コマンド</td>
							</tr>
							<tr>
								<td>/mls reload</td>
								<td>プラグイン再起動（OP専用）</td>
							</tr>
						</tbody>
					</table>
						
					<h2 class="design" id="24h_61">建築保護フラグ一覧</h2>
					<table border="1" width="100%">
						<tr>
							<th class="id"><h3>フラグ</h3></th>
							<th class="value"><h3>概要</h3></th>
						</tr>
						<tr>
							<td>BREAK</td>
							<td>ブロックの破壊</td>
						</tr>
						<tr>
							<td>PLACE</td>
							<td>ブロックの設置</td>
						</tr>
						<tr>
							<td>EXPLODE</td>
							<td>爆発による土地の破壊</td>
						</tr>
						<tr>
							<td>DOOR</td>
							<td>扉の開閉</td>
						</tr>
						<tr>
							<td>TRAP_DOOR</td>
							<td>トラップドアの開閉</td>
						</tr>
						<tr>
							<td>FRAME</td>
							<td>額縁の破壊</td>
						</tr>
						<tr>
							<td>PAINT</td>
							<td>絵画の破壊</td>
						</tr>
						<tr>
							<td>PISTON</td>
							<td>ピストンの使用</td>
						</tr>
						<tr>
							<td>MONSTER</td>
							<td>敵MOBの存在</td>
						</tr>
						<tr>
							<td>ARMOR_STAND</td>
							<td>防具立ての使用</td>
						</tr>
						<tr>
							<td>FENCE_GATE</td>
							<td>フェンスゲートの使用</td>
						</tr>
					</table>
						
					<h2 class="design" id="24h_7">24H鯖で使用できる特殊文字</h2>
					<table border="1" cellpadding="5" width="100%">
						<tr>
							<th class="id"><b>特殊文字</b></th>
							<th class="value"><b>説明</b></th>
						</tr>
						<tr>
							<td>&0~f | &r...</td>
							<td>色やフォーマットを変更したいところの頭にこれをつけることでそのあとの文字に適応させることができます。<br>※詳しいコードは<a href="http://seesaawiki.jp/monsterlifeserver/d/%a5%c1%a5%e3%a5%c3%a5%c8%a4%ce%bb%c8%a4%a4%ca%fd%20%7c%2024H%bb%aa">コチラ</a>をご覧ください。</td>
						</tr>
						<tr>
							<td>!</td>
							<td>文字の頭にこれをつけて送信すると一切の翻訳をしなくなります。</td>
						</tr>
						<tr>
							<td>#</td>
							<td>文字の頭にこれをつけて送信すると匿名でメッセージを送信できます。<br>※OPには送信者がわかります。</td>
						</tr>
					</table>
						
					<h2 class="design" id="24h_9">導入Plugin</h2>
					<table border="5" cellpadding="5" width="100%">
						<tr>
							<th class="id"><b>Plugin</b></th>
							<th class="value"><b>概要</b></th>
						</tr>
						<tr>
							<td>AngelChest</td>
							<td>死ドロップ一時保護</td>
						</tr>
						<tr>
							<td>AutoSaveWorld</td>
							<td>データ定期保存</td>
						</tr>
						<tr>
							<td>BetterChairs</td>
							<td>階段に座れる。</td>
						</tr>
						<tr>
							<td>BungeePortals</td>
							<td>24H鯖と企画鯖をつなげる。</td>
						</tr>
						<tr>
							<td>ChangeSkin</td>
							<td>スキン変更をする。</td>
						</tr>
						<tr>
							<td>ChangeSkin</td>
							<td>スキン変更をする。</td>
						</tr>
						<tr>
							<td>Citizens</td>
							<td>NPCを追加する。</td>
						</tr>
						<tr>
							<td>CoreProtect</td>
							<td>荒らし対策</td>
						</tr>
						<tr>
							<td>ModBlocker</td>
							<td>荒らし・不正対策</td>
						</tr>
						<tr>
							<td>HolographicDisplays</td>
							<td>ホログラムを生成する。</td>
						</tr>
						<tr>
							<td>ImageOnMap</td>
							<td>画像マップ作成</td>
						</tr>
						<tr>
							<td>Jecon</td>
							<td>経済要素の追加</td>
						</tr>
						<tr>
							<td>LocketPro</td>
							<td>盗難・不法侵入防止</td>
						</tr>
						<tr>
							<td>LuckPerms</td>
							<td>権限管理</td>
						</tr>
						<tr>
							<td>MCBans</td>
							<td>荒らし対策</td>
						</tr>
						<tr>
							<td>MLSPlugin</td>
							<td>独自機能。MonsterEconomyPlus と統合済み。</td>
						</tr>
						<tr>
							<td>Multiverse-Core</td>
							<td>ワールド複数管理</td>
						</tr>
						<tr>
							<td>Multiverse-Inventory</td>
							<td>各ワールドごとのインベントリ管理</td>
						</tr>
						<tr>
							<td>Multiverse-Portals</td>
							<td>各ワールドへの接続</td>
						</tr>
						<tr>
							<td>ProtocolLib</td>
							<td>いろいろなプラグインの前提</td>
						</tr>
						<tr>
							<td>QuickShop</td>
							<td>経済要素の追加</td>
						</tr>
						<tr>
							<td>Skript</td>
							<td>独自要素の追加</td>
						</tr>
						<tr>
							<td>TNTRun_reloaded</td>
							<td>TNTRunの追加</td>
						</tr>
						<tr>
							<td>Vault</td>
							<td>一部Pluginの前提Plugin</td>
						</tr>
						<tr>
							<td>nuVotifier</td>
							<td>投票機能追加</td>
						</tr>
						<tr>
							<td>WorldBorder</td>
							<td>ワールド管理</td>
						</tr>
						<tr>
							<td>WorldEdit</td>
							<td>建築補助</td>
						</tr>
					</table>
				</div>
			</div>
			<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
		</div>
		<?php echo $html["common_foot"]; ?>
	</body>
</html>
