<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "API一覧";
$URL = $conf["url"] . '/api/';
$DESCRIPTION = " ";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
		<?php echo $html["common_head"]; ?>
		<style>

			.l-wrapper {
				width: 320px;
				margin: 3rem auto;
			}

			.card {
				text-decoration: none;
				background-color: #fff;
				box-shadow: 0 0 8px rgba(0, 0, 0, 0.16);
				color: #212121;
			}

			.card__title {
				padding: 1rem 1rem 0;
				font-size: 1.25rem;
			}

			.card__thumbnail {
				margin: 0;
			}

			.card__image {
				width: 100%;
				max-width: 100%;
				vertical-align: bottom;
			}

			.card__body {
				padding: 1rem;
			}

			.card__text {
				font-size: .75rem;
			}

			.card__text + .card__text {
				margin-top: .5rem;
			}

			.card__footer {
				border-top: 1px solid #ddd;
				padding: 1rem;
			}

			.button {
				display: inline-block;
				text-decoration: none;
				transition: background-color .3s ease-in-out;
			}

			.button.-primary {
				background-color: #26a69a;
				padding: .5rem 1rem;
				border-radius: .25rem;
				color: #fff;
				font-weight: bold;
			}

			.button.-primary:hover,
			.button.-primary:focus {
				background-color: #80cbc4;
			}
		</style>
	</head>
	<body>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
		<div class="wrapper">
			<div class="mainBox">
				<div class="contents">
                    <p class="fileupdate right">最終更新日時:<?php echo date('Y/m/d H時i分', filemtime(basename(__FILE__))); ?></p>
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
							<a itemprop="item" href="<?php echo $conf["url"]; ?>/api/">
								<span itemprop="name"><?php echo $TITLE; ?></span>
							</a>
							<meta itemprop="position" content="2" />
                        </li>
					</ol>
					<!-- パンくずリスト終 -->

					<!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
					<h1 class="design">API一覧</h1>

					<div class="flex-box1">

					<div class="l-wrapper">
							<article class="card">
								<div class="card__header">
									<h3 class="card__title">サーバー資料保管場所</h3>
									<figure class="card__thumbnail">
										<img src="https://i.gyazo.com/00397d0140142c83458289ba94ea1988.png" alt="運営会議の一般向け報告書やその他資料のリンクページです。" class="card__image">
									</figure>
								</div>
								<div class="card__body">
									<p class="card__text">運営会議の一般向け報告書やその他資料のリンクページです。</p>
								</div>
								<div class="card__footer">
									<p class="card__text"><a href="<?php echo $conf["url"]; ?>/api/pdf" class="button -primary">ページを見る</a></p>
								</div>
							</article>
						</div>

						<div class="l-wrapper">
							<article class="card">
								<div class="card__header">
									<h3 class="card__title">配信コメント</h3>
									<figure class="card__thumbnail">
										<img src="https://i.gyazo.com/5ee3230f8fca0f8ec12fecda0edcbfa8.png" alt="配信時のコメントを表示します。" class="card__image">
									</figure>
								</div>
								<div class="card__body">
									<p class="card__text">配信時のコメントを表示します。</p>
								</div>
								<div class="card__footer">
									<p class="card__text"><a href="<?php echo $conf["url"]; ?>/api/coment" class="button -primary">ページを見る</a></p>
								</div>
							</article>
						</div>

					</div>
					
				</div>
			</div>
			<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
		</div>
		<?php echo $html["common_foot"]; ?>
	</body>
</html>
