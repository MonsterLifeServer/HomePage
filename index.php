<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
echo include($_SERVER["DOCUMENT_ROOT"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
		<title>MonsterLifeServer</title>
		<script>

			$(document).ready(function () {


				$i = 0
				$.ajax({
				type: "get",
				url: "<?php echo $conf["url"]; ?>/blog/?feed=rss2"
				}).done(function(result) {
					$(result).find("item").each(function() {
						if ($i >= 3) {
							return
						}
						$title = $(this).find('title').text()
						$link = $(this).find('link').text()
						$date = $(this).find('pubDate').text()
						$content = $(this).find('description').text()
                        $encoded = $(this).find('content\\:encoded').text()
                        //$startUrl = 'https://livedoor.blogimg.jp/meoto2408/imgs/';
                        //$url = 'https://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png';
                        //if (~$encoded.indexOf($startUrl)) {
                        //    $splits = $encoded.split($startUrl);
                        //    $split = $splits[1].split('"')[0];
                        //    $url = $startUrl + $split;
                        //} 
						$("#blogs").append('<a href="' + $link + '" target="_blank" class="ca"><div class="card"><div class="imgframe"></div><div class="textbox"><div class="title">' + $title + '</div><div class="text">' + $content + '</div></div></div></a>');
						$i++
					});
				});
			});

		</script>
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
		</style>
    </head>
    <body>
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

					<h1 class="design">MonsterLifeServer</h1>
					<table class="simple">
						<tr class="title">
							<td colspan="3">サービス</td>
						</tr>
						<tr class="subtitle">
							<td>ミニゲーム企画</td><td>サーバー</td><td>システム</td>
						</tr>
						<tr>
							<td>
								週に一度以上のペースで鬼ごっこやPvPなどの企画を開催しています。最近は企画がバグっちゃって減っていますが、現在も新企画を開発中です！！
							</td>
							<td>
								365日24時間開放されているサーバーがあります。そこではミニゲームやサバイバル、建築、アスレチックなどいろいろなことができます。
							</td>
							<td>
								サーバーの多くのシステムが当鯖の開発者が作り、所有権は当鯖に帰属しております。企画を参考にしたい場合は事前にご連絡をいただいたうえでこのシステム参考にしたいなどあればしっかりとご連絡ください。無断の利用は固く禁止しております。
							</td>
						</tr>
					</table>
                
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
					<h2>ブログ最新記事</h2>
					<div class="read-more"><a href="http://www.mlserver.xyz/blog/">すべて見る</a></div>
					<div class="card-box" id="blogs"></div>
					
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

    </script>
    <?php echo $html["common_foot"]; ?>
</html>