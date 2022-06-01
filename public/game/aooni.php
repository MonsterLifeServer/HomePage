<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '青鬼ゲーム');
$func->setPageUrl($func->getUrl().'/game/aooni');
$func->setDescription('フリーゲーム「青鬼」をマイクラで遊べるようにした企画「青鬼ゲーム」のルール紹介ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/aooni.min.css">
    </head>
    <body class="aooni">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト&最終更新日 -->
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/game/">
                                        <span itemprop="name">ミニゲーム企画</span>
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
					
                    <div class="tab-wrap">
						<input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">青鬼ゲーム6.23</label>
						<div class="tab-content">
							<div class="flex-box2">

								<div class="sub-box">
									<h2>ルール</h2>
									<p>青鬼6.23の館に閉じ込められたひろしたちが青色の化け物，青鬼から逃げ，脱出するゲーム。</p>
									<p>チェストの中にはお肉とは別にランダムで石の感圧板と木の感圧板が入っています。それぞれの感圧板は次の館への鉄扉を開放することができます。</p>
									<p>マップ内には特別な感圧板があり，それを踏むことで鍵のかけらを取得することができます。鍵のかけらは3つ集めて作業台でクラフトすることで脱出の鍵を作ることができます。</p>
									<p>青鬼には「普通の青鬼」と「フワッティー」が居ます。青鬼は足の速さが遅いが殴られるだけで食べられてしまい，フワッティーは足の速さが少し早く溜めダッシュができます。フワッティーに体当たりされると食べられてしまいます。</p>
									<p>フワッティーはパークを持って右クリックすることで前方にダッシュします。</p>
									<p>青鬼側と逃側のチャットは分かれているため，敵チーム所属プレイヤーにどうしても伝えたいことがある場合はコマンドを利用する必要があります。</p>
									<p></code>/report ＜テキスト＞</code>で運営にメッセージを送信。</code>/global ＜テキスト＞</code>でチーム関係なくメッセージを送信。</code>/oni</code>で青鬼抽選期間中なら青鬼抽選に参加/離脱。</p>
									<p>逃側には役職があり，それぞれの役職によって脱出の力になる能力があります。</p>
									<iframe 
										name="ifrm6" 
										src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=304694679&range=A1:F7&amp;single=true&amp;widget=true&amp;headers=false" 
										width="100" height="100" 
										scrolling="no" frameborder="0"
										align="left"
										marginwidth="10"
										marginheight="10"
										style='margin-right:1em;'
										class='fullframe'>表示されない方は<a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=304694679&range=A1:F7&amp;single=true&amp;widget=true&amp;headers=false" target="_blank">コチラ</a>
									</iframe>
								</div>

								<div class="radius-box">
									<h2>企画詳細</h2>

									<h3>ゲーム時間</h3>
									<p>20分</p><hr />
									<h3>最低参加人数</h3>
									<p>5人</p><hr />
									<h3>バージョン</h3>
									<p>1.12.2</p><hr />
									<h3>カテゴリ</h3>
									<span class="category">鬼ごっこ</span>
									<hr />
									<h3>テクスチャ(低スペック向け)</h3>
									<p><a href="<?php echo $func->getTexture('aooni'); ?>" download>ダウンロード</a></p>
									<h3>3Dテクスチャ</h3>
									<p><a href="<?php echo $func->getTexture('aooni3d'); ?>" download>ダウンロード</a></p>
								</div>

							</div>
						</div>
						<input id="TAB-02" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-02">青鬼ゲーム3.0</label>
						<div class="tab-content">
							<div class="flex-box2">

								<div class="sub-box">
									<h2>ルール</h2>
									<p>青鬼3.0の館に閉じ込められたひろしたちが青色の化け物，青鬼から逃げ，脱出するゲーム。</p>
									<p>チェストの中にはお肉が入っています。空腹になったら食べましょう。</p>
									<p>チェストを開けると脱出の鍵の欠片を手に入れることができます。これを10個集めたら作業台を探しましょう。</p>
									<p>脱出の鍵の欠片を集めて作業台に対して右クリックすると脱出の鍵が手に入りますが，少し破損しているため使い物になりません。最上階のエンダーチェストを右クリックして有効化しましょう。</p>
									<p>鍵を有効化すると玄関の鍵を手に入れることができます。玄関の鍵は脱出可能時間になると玄関に設置できます。</p>
									<p>青鬼には「普通の青鬼」と「フワッティー」が居ます。青鬼は足の速さが遅いが殴られるだけで食べられてしまい，フワッティーは足の速さが少し早く溜めダッシュができます。フワッティーに体当たりされると食べられてしまいます。</p>
									<p>フワッティーはパークを持って右クリックすることで前方にダッシュします。</p>
									<p>青鬼側と逃側のチャットは分かれているため，敵チーム所属プレイヤーにどうしても伝えたいことがある場合はコマンドを利用する必要があります。</p>
									<p></code>/report ＜テキスト＞</code>で運営にメッセージを送信。</code>/global ＜テキスト＞</code>でチーム関係なくメッセージを送信。</code>/oni</code>で青鬼抽選期間中なら青鬼抽選に参加/離脱。</p>
									<p>逃側には役職があり，それぞれの役職によって脱出の力になる能力があります。</p>
									<iframe 
										name="ifrm6" 
										src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=1838801207&range=A1:F7&amp;single=true&amp;widget=true&amp;headers=false" 
										width="100" height="100" 
										scrolling="no" frameborder="0"
										align="left"
										marginwidth="10"
										marginheight="10"
										style='margin-right:1em;'
										class='fullframe'>表示されない方は<a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=1838801207&range=A1:F7&amp;single=true&amp;widget=true&amp;headers=false" target="_blank">コチラ</a>
									</iframe>
								</div>

								<div class="radius-box">
									<h2>企画詳細</h2>

									<h3>ゲーム時間</h3>
									<p>15分</p><hr />
									<h3>最低参加人数</h3>
									<p>5人</p><hr />
									<h3>バージョン</h3>
									<p>1.12.2</p><hr />
									<h3>カテゴリ</h3>
									<span class="category">鬼ごっこ</span>
									<hr />
									<h3>テクスチャ(低スペック向け)</h3>
									<p><a href="<?php echo $func->getTexture('aooni'); ?>" download>ダウンロード</a></p>
									<h3>3Dテクスチャ</h3>
									<p><a href="<?php echo $func->getTexture('aooni3d'); ?>" download>ダウンロード</a></p>
								</div>

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