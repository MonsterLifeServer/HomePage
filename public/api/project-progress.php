<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '作業状況');
$func->setPageUrl($func->getUrl().'/api/project-progress');
$func->setDescription('作業状況を確認できます。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
	</head>
	<body>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
		<div class="wrapper">
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
                                <a itemprop="item" href="<?php echo $func->getUrl(); ?>/api/">
                                    <span itemprop="name">API</span>
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

                <iframe name="ifrm6" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTFaCcU8OdA40DiS6j9uw4Ht9XoFQhy52BR7HbMZa7Y6-urw1Wjn8p0GUlxDJzV4bI4WBxxL5jfwxXt/pubhtml" 
                        width="100" height="100" 
                        scrolling="no" frameborder="0"
                        align="left"
                        marginwidth="10"
                        marginheight="10"
                        style='margin-right:1em;'
                        class='fullframe'>
                インラインフレーム対応のブラウザでご覧下さい。
                </iframe>
            </div>
		</div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>
