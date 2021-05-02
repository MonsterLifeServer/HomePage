<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "テスト";
$URL = $conf["url"] . '/test';
$DESCRIPTION = "　";

$images = [
	"https://i.gyazo.com/d5e3fe57a5718d72f538e2e9690a1abe.png",
	"https://i.gyazo.com/419a033caf3d2fa57c0dc1558a57e54c.png",
	"https://i.gyazo.com/2575a25f1ccfbd4c37a0d517e0d211b3.png",
	"https://i.gyazo.com/b34e6f3356881fc2a3e9a4606c8c0039.png"
];

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
			.slider-wrapper {
				width: calc(100%-100px);
			}
			.slider {
				width: calc(100%-100px);
				border: 1px solid #000;
			}

			.slider img {
				max-width: 100%;
				max-height: 100%;
				width: auto; /* ie8 */
				margin: 0 auto;
			}

			.slick-arrow {
				position: absolute;
				top: 0;
				bottom: 0;
				margin: auto;
			}
			.prev-arrow {
				left: 0;
				z-index: 10;
			}
			.next-arrow {
				right: 0;
			}

			.slide {
				width: calc(100%-100px);
				background: #ccc;
			}
			#slick-1 .slick-dots li {
				width: 40px;
				height: 5px;
				background: #ccc;
			}
			#slick-1 .slick-dots li button {
				width: 40px;
				height: 5px;
			}
			#slick-1 .slick-dots li.slick-active,
			#slick-1 .slick-dots li:hover {
				background: #777;
			}
			#slick-1 .slick-dots li button, 
			#slick-1 .slick-dots li button:before {
				color: transparent;
				opacity: 0;
			}

			/* progress bar */
			.slider-progress {
				width: 100%;
				height: 3px;
				background: #eee;
			}
			.slider-progress .progress {
				width: 0%;
				height: 3px;
				background: #000;
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
					<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/carousel.php"); ?>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>