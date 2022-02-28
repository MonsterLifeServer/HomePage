<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php', 'サイトマップ2 | MonsterLifeServer');
$func->setPageUrl($func->getUrl().'/sitemap2');
$func->setDescription('MonsterLifeServerのあらゆるリンクを確認できます。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/slickmap.min.css">
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="primaryNav">
                <ul>
                    <li id="home"><a href="<?php echo $func->getUrl(); ?>">ホーム</a></li>
                    <li><a href="<?php echo $func->getUrl(); ?>/terms">利用規約・ガイドライン</a></li>
                    <li><a href="<?php echo $func->getUrl(); ?>/terms">プライバシーポリシー</a></li>
                    <li><a href="<?php echo $func->getUrl(); ?>/#about">About</a>
                        <ul>
                            <li><a href="<?php echo $func->getUrl(); ?>/about/admins">運営一覧</a></li>
                            <li><a href="<?php echo $func->getUrl(); ?>/about/donation">寄付について</a></li>
                            <li><a href="<?php echo $func->getUrl(); ?>/about/passbook">通帳</a></li>
                            <li><a href="<?php echo $func->getUrl(); ?>/about/news">ニュース</a></li>
                            <li><a href="<?php echo $func->getUrl(); ?>/blog/">ブログ</a></li>
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
                    <li><a href="#">Contact</a>
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
            </div>
        </div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>