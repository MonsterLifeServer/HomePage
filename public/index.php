<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php', 'MonsterLifeServer');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
		<link rel="stylesheet" href="<?php echo $func->getUrl(); ?>/assets/css/carousel.min.css" type="text/css">
		<script type="text/javascript" src="<?php echo $func->getUrl(); ?>/assets/js/rss_reader.js"></script>
		<style>
			#elapsedTime {
				font-weight: bold;
			}

			#blogs img {
				width: 250px;
				height: 250px;
				object-fit: cover; /* この一行を追加するだけ！ */
			}
		</style>
    </head>
    <body onload="timer()">
		<?php
			$month = date('m') . '月'; // strpos($month, "4月") 
			if (strpos($month, "11月") or strpos($month, "12月")) {
				echo '<script type="text/javascript" src="'.$func->getUrl().'/assets/js/winter.js"></script>';
			} elseif (strpos($month, "4月")) {
				echo '<script type="text/javascript" src="'.$func->getUrl().'/assets/js/spring.js"></script>';
			} elseif (strpos($month, "10月")) {
				echo '<script type="text/javascript" src="'.$func->getUrl().'/assets/js/fall.js"></script>';
			}
		?>
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

					<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/carousel.php"); ?>

					<h1 class="design">MonsterLifeServer</h1>
                    <h2 id="4649">ご利用の参加者様へ</h2>
                    <p>現在運営・開発・動画編集をほぼ一人で行っているので，新企画の開発まで手が回っていない状況にあります。</p>
                    <p>動画編集を無償(有償の場合は要相談)で行ってくれる方を募集しています。</p>
                    <p>スタッフ応募は<a href="<?php echo $func->getUrl(); ?>/support/form/staff">コチラ</a>から可能です。</p>
					<h2 id="about">サービス</h2>
					<div class="server-about-box">

						<div class="server-about first">
							<h3>ミニゲーム企画</h3>
							<p>週に一度以上のペースで鬼ごっこやPvPなどの企画を開催しています。最近は企画がバグっちゃって減っていますが，現在も新企画を開発中です！！</p>
						</div>
						<div class="server-about">
							<h3>サーバー</h3>
							<p>365日24時間開放されているサーバーがあります。そこではミニゲームやサバイバル，建築，アスレチックなどいろいろなことができます。</p>
							<p><div class="text-center">MLSが始動してから</div><div class="text-center"><span id="elapsedTime"></span></div><div class="text-center">経過(2018/9/10)</div></p>
						</div>
						<div class="server-about last">
							<h3>システム</h3>
							<p>サーバーの多くのシステムが当鯖の開発者が作り，所有権は当鯖に帰属しております。企画を参考にしたい場合は事前にご連絡をいただいたうえでこのシステム参考にしたいなどあればしっかりとご連絡ください。無断の利用は固く禁止しております。</p>
						</div>

					</div>
                
					<h2>新着情報</h2>
					<div class="read-more"><a href="<?php echo $func->getUrl(); ?>/about/news">すべて見る</a></div>
					<?php
						$xml = "https://raw.githubusercontent.com/MonsterLifeServer/HomePage/master/public/assets/data/news.xml";//ファイルを指定
						$xmlData = simplexml_load_file($xml);
						$_i = 0;
						foreach ($xmlData->blog->item as $data) { 
							if ($_i === 3) { break; }
					?>
					<a href="<?php echo $data->link; ?>" <?php  
							if (strpos($data->link,'www.mlserver.xyz') === false) {
								echo 'target="_blank"';
							}
					?> class="news-ca"><div class="card"><div class="textbox"><div class="date">
						<?php 
							$_i++;
							$text = (string)$data->date;
							if ($func->isNearDate($text)) {
								$text = "<span class='blinking'><span style='color: red;'>New</span></span>" . $text;
							}
							echo $text; 
						?>
						</div><div class="text"><?php echo $data->title;?></div></div></div></a>
					<?php 
						} 
						if (empty($_GET['debug'])) echo "<!--";
					?>
					<ins class="adsbygoogle"
						style="display:block; text-align:center;"
						data-ad-layout="in-article"
						data-ad-format="fluid"
						data-ad-client="ca-pub-1928305720436804"
						data-ad-slot="8813759985">
					</ins>
					<script> 
						(adsbygoogle = window.adsbygoogle || []).push({}); 
					</script>
					<?php 
						if (empty($_GET['debug'])) echo "-->";
					?>
					<h2>ブログ最新記事</h2>
					<div class="read-more"><a href="<?php echo $func->getUrl(); ?>/blog/">すべて見る</a></div>
					<div class="card-box" id="blogs"></div>
				</div>
            </div>
		</div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
    <script>
		var elapsedTime = document.getElementById("elapsedTime");


		function Time_exchange() {
			now_time = new Date();
			sec_present = (now_time.getTime()/1000).toFixed(0);
			sec_start = (Date.parse("2018/9/10")/1000).toFixed(0);
			sec_time = sec_present - sec_start;

			sec = sec_time % 60;
			time = (sec_time - sec)/60;
			min = time % 60;
			time = (time - min)/60;
			hour = time % 24;
			time = (time - hour)/24;
			days = time % 365;
			time = (time - days)/365;
			years = time;
			elapsedTime.innerHTML = years + " 年 " + days + " 日 " + hour + " 時間 " + min + " 分 " + sec + " 秒 " ;
		};

		function timer(){
			setInterval(Time_exchange,1000);
		}
	</script>
</html>