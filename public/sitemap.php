<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php', 'サイトマップ | MonsterLifeServer');
$func->setPageUrl($func->getUrl().'/sitemap');
$func->setDescription('MonsterLifeServerのあらゆるリンクを確認できます。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/sitemap.min.css">
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
                    
                    <div class="sitemap">
                        <ul>
                            <li><a href="<?php echo $func->getUrl(); ?>">ホーム</a>
                                <ul>
                                    <li><a href="<?php echo $func->getUrl(); ?>/terms">利用規約・ガイドライン</a></li>
                                    <li><a href="<?php echo $func->getUrl(); ?>/terms">プライバシーポリシー</a></li>
                                    <li><a href="<?php echo $func->getUrl(); ?>/#about">About</a>
                                        <ul>
                                            <li><a href="<?php echo $func->getUrl(); ?>/about/admins">運営一覧</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/about/donation">寄付について</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/about/passbook">通帳</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/about/news">ニュース</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $func->getUrl(); ?>/game/">ミニゲーム企画</a>
                                        <ul>
                                            <li><a href="<?php echo $func->getUrl(); ?>/game/aooni">青鬼ゲーム</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/game/online">青鬼ONLINE in MC</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/game/hueoni">増え鬼ごっこ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $func->getUrl(); ?>/servers/">サーバー</a>
                                        <ul>
                                            <li><a href="<?php echo $func->getUrl(); ?>/game/aooni">青鬼ゲーム</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/game/online">青鬼ONLINE in MC</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/game/hueoni">増え鬼ごっこ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $func->getUrl(); ?>/support/">サポート</a>
                                        <ul>
                                            <li><a href="<?php echo $func->getUrl(); ?>/support/faq/">よくある質問</a></li>
                                        </ul>
                                    </li>
                                    <li><span>Contact</span>
                                        <ul>
                                            <li><a href="<?php echo $func->getUrl(); ?>/support/form/">問い合わせフォーム</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/support/form/staff">スタッフ応募フォーム</a></li>
                                            <li><a href="twitter.mlserver.xyz">Twitter</a></li>
                                            <li><a href="discord.mlserver.xyz">Discord</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $func->getUrl(); ?>/api/">API</a>
                                        <ul>
                                            <li><a href="<?php echo $func->getUrl(); ?>/api/image">画像のやつ</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/api/pdf">サーバー資料</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/api/project-progress">プロジェクト進捗</a></li>
                                            <li><a href="<?php echo $func->getUrl(); ?>/api/comment">コメント</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>