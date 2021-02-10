<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

$blog_rss = false;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
		<title>MonsterLifeServer</title>
		<?php 
			if ($blog_rss === true) {
				echo '<script type="text/javascript" src="{$conf["url"]}/assets/js/rss_reader.js"></script>';
			}
		?>
		<style>
			.slider{
				margin: 0 auto;
				width: 80%;
				height: auto;
				background: #000;
			}
			.slider img{
				height: 30vw; 
				max-height: 400px; 
				min-height: 247.22px; 
			}
			/*slick setting*/
			.slick-prev:before,
			.slick-next:before {
				color: #000;
			}
			#elapsedTime {
				font-weight: bold;
			}
		</style>
    </head>
    <body onload="timer()">
		<?php
			$month = date('m') . '月'; // strpos($month, "4月") 
			if (strpos($month, "11月") or strpos($month, "12月")) {
				echo '<script type="text/javascript" src="'.$conf["url"].'/assets/js/winter.js"></script>';
			} elseif (strpos($month, "4月")) {
				echo '<script type="text/javascript" src="'.$conf["url"].'/assets/js/spring.js"></script>';
			} elseif (strpos($month, "10月")) {
				echo '<script type="text/javascript" src="'.$conf["url"].'/assets/js/fall.js"></script>';
			}
		?>
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
					</ol>
					<ul class="slider">
						<li><a href="<?php echo $conf["url"]; ?>/"><img src="https://i.gyazo.com/d5e3fe57a5718d72f538e2e9690a1abe.png" alt="image01"></a></li>
						<li><a href="<?php echo $conf["url"]; ?>/game/aooni"><img src="https://i.gyazo.com/2575a25f1ccfbd4c37a0d517e0d211b3.png" alt="image02"></a></li>
						<li><a href="<?php echo $conf["url"]; ?>/24h/"><img src="https://i.gyazo.com/419a033caf3d2fa57c0dc1558a57e54c.png" alt="image03"></a></li>
					</ul>

					<h1 class="design" id="about">MonsterLifeServer</h1>
					<h2>サービス</h2>
					<div class="server-about-box">

						<div class="server-about first">
							<h3>ミニゲーム企画</h3>
							<p>週に一度以上のペースで鬼ごっこやPvPなどの企画を開催しています。最近は企画がバグっちゃって減っていますが、現在も新企画を開発中です！！</p>
						</div>
						<div class="server-about">
							<h3>サーバー</h3>
							<p>365日24時間開放されているサーバーがあります。そこではミニゲームやサバイバル、建築、アスレチックなどいろいろなことができます。</p>
							<p>MLSが始動してから <span id="elapsedTime"></span> 経過(2018/9/10)</p>					</div>
						<div class="server-about last">
							<h3>システム</h3>
							<p>サーバーの多くのシステムが当鯖の開発者が作り、所有権は当鯖に帰属しております。企画を参考にしたい場合は事前にご連絡をいただいたうえでこのシステム参考にしたいなどあればしっかりとご連絡ください。無断の利用は固く禁止しております。</p>
						</div>

					</div>
                
					<h2>新着情報</h2>
					<div class="read-more"><a href="<?php echo $conf["url"]; ?>/about/news">すべて見る</a></div>
					<?php
						$xml = $_SERVER["DOCUMENT_ROOT"] . "/assets/data/news.xml";//ファイルを指定
						$xmlData = simplexml_load_file($xml);
						$_i = 0;
						foreach ($xmlData->blog->item as $data) { 
					?>
					<?php

						if ($_i === 3) {
							break;
						}

					?>
					<a href="<?php echo $data->link; ?>" <?php  
						if (strpos($data->link,'mlserver.php.xdomain.jp') === false) {
							echo 'target="_blank"';
						}
					?> class="news-ca">
						<div class="card">
							<div class="textbox">
								<div class="date">
									<?php 
										$_i++;
										$text = (string)$data->date;
										if (isNearDate($text)) {
											$text = "<span class='blinking'><span style='color: red;'>New</span></span>" . $text;
										}
										echo $text; 
									?>
								</div>
								<div class="text"><?php echo $data->title;?></div>
							</div>
						</div>
					</a>
					<?php } ?>
					<?php
						if ($blog_rss === true) {
							echo '<h2>ブログ最新記事</h2>';
							echo '<div class="read-more"><a href="http://www.mlserver.xyz/blog/">すべて見る</a></div>';
							echo '<div class="card-box" id="blogs"></div>';
						}
					?>
				</div>
            </div>
            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
	</body>
    <script>
        $('.slider').slick({
            autoplay:true,
            autoplaySpeed:3000,
			dots:true,
			centerMode: true,
			pauseOnHover: true,
			variableWidth: true, // 追加
		});

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
    <?php echo $html["common_foot"]; ?>
</html>