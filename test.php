<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "テスト";
$URL = $conf["url"] . '/test';
$DESCRIPTION = "　";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/test">
                                <span itemprop="name"><?php echo $TITLE; ?></span> 
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->

					<ul class="slider">
						<li><a href="<?php echo $conf["url"]; ?>/"><img src="https://i.gyazo.com/d5e3fe57a5718d72f538e2e9690a1abe.png" alt="image01"></a></li>
						<li><a href="<?php echo $conf["url"]; ?>/game/aooni"><img src="https://i.gyazo.com/2575a25f1ccfbd4c37a0d517e0d211b3.png" alt="image02"></a></li>
						<li><a href="<?php echo $conf["url"]; ?>/24h/"><img src="https://i.gyazo.com/419a033caf3d2fa57c0dc1558a57e54c.png" alt="image03"></a></li>
						<li><a href="<?php echo $conf["url"]; ?>/game/online"><img src="https://i.gyazo.com/b34e6f3356881fc2a3e9a4606c8c0039.png" alt="image04"></a></li>
					</ul>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>