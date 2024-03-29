<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'API一覧');
$func->setPageUrl($func->getUrl().'/api/');
$func->setDescription(' ');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
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


                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
                                    </a>
                                    <meta itemprop="position" content="2" />
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
									<p class="card__text"><a href="<?php echo $func->getUrl(); ?>/api/pdf" class="button -primary">ページを見る</a></p>
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
									<p class="card__text"><a href="<?php echo $func->getUrl(); ?>/api/comment" class="button -primary">ページを見る</a></p>
								</div>
							</article>
						</div>
						<div class="l-wrapper">
							<article class="card">
								<div class="card__header">
									<h3 class="card__title">作業進捗</h3>
									<figure class="card__thumbnail">
										<img src="https://i.gyazo.com/80001e10965c8303fb7ae0258ca41e72.png" alt="作業進捗を表示します。" class="card__image">
									</figure>
								</div>
								<div class="card__body">
									<p class="card__text">作業進捗を表示します。</p>
								</div>
								<div class="card__footer">
									<p class="card__text"><a href="<?php echo $func->getUrl(); ?>/api/project-progress" class="button -primary">ページを見る</a></p>
								</div>
							</article>
						</div>

					</div>
					
				</div>
			</div>
		</div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>
