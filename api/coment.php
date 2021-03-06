<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "配信コメント";
$URL = $conf["url"] . '/api/comment';
$DESCRIPTION = "MonsterLifeServerのライブ配信のコメントを見れるページ";

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
            iframe {
                width: 100%;
                height: 700px;
                background: #000;
            }
        </style>
	</head>
	<body>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
		<div class="wrapper">
			<div class="mainBox">
				<div class="contents">
					<!-- パンくずリスト始 -->
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
							<a itemprop="item" href="<?php echo $conf["url"]; ?>/api/">
								<span itemprop="name">API</span>
							</a>
							<meta itemprop="position" content="2" />
                        </li>
                        
                        <li itemprop="itemListElement" itemscope
							itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="<?php echo $conf["url"]; ?>/api/coment">
								<span itemprop="name"><?php echo $TITLE; ?></span>
							</a>
							<meta itemprop="position" content="3" />
						</li>
					</ol>
					<!-- パンくずリスト終 -->

					<!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
					<h1 class="design">配信コメント</h1>
                    <iframe src="https://chat.restream.io/embed?token=1079227b-6d9b-4563-a39f-2a79f4d9ad0b" scrolling="no" frameborder="no" width="100%" height="600px"></iframe>
				</div>
			</div>
			<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
		</div>
		<?php echo $html["common_foot"]; ?>
	</body>
</html>
