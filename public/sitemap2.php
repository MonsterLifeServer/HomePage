<?php

$config = include('./assets/config.php');

$TITLE = "サイトマップ";
$URL = $conf["url"] . '/sitemap2';
$DESCRIPTION = "MonsterLifeServerのあらゆるリンクを確認できます。";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <title><?php echo $TITLE; ?> | MonsterLifeServer</title>
        <?php echo $html["common_head"]; ?>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?>" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/slickmap.min.css">
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="primaryNav">
                <ul>
                    <li id="home"><a href="<?php echo $conf["url"]; ?>">ホーム</a></li>
                    <li><a href="<?php echo $conf["url"]; ?>/terms">利用規約・ガイドライン</a></li>
                    <li><a href="<?php echo $conf["url"]; ?>/terms">プライバシーポリシー</a></li>
                    <li><a href="<?php echo $conf["url"]; ?>/#about">About</a>
                        <ul>
                            <li><a href="<?php echo $conf["url"]; ?>/about/admins">運営一覧</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/about/donation">寄付について</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/about/passbook">通帳</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/about/news">ニュース</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/blog/">ブログ</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $conf["url"]; ?>/game/">ミニゲーム企画</a>
                        <ul>
                            <li><a href="<?php echo $conf["url"]; ?>/game/aooni">青鬼ゲーム</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/game/online">青鬼ONLINE in MC</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/game/hueoni">増え鬼ごっこ</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $conf["url"]; ?>/servers/">サーバー</a>
                        <ul>
                            <li><a href="<?php echo $conf["url"]; ?>/game/aooni">青鬼ゲーム</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/game/online">青鬼ONLINE in MC</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/game/hueoni">増え鬼ごっこ</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $conf["url"]; ?>/support/">サポート</a>
                        <ul>
                            <li><a href="<?php echo $conf["url"]; ?>/support/faq/">よくある質問</a>
                                <ul>
                                    <li><a href="<?php echo $conf["url"]; ?>/support/faq/mcid">MCIDについて</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a>
                        <ul>
                            <li><a href="<?php echo $conf["url"]; ?>/support/form/">問い合わせフォーム</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/support/form/staff">スタッフ応募フォーム</a></li>
                            <li><a href="twitter.mlserver.xyz">Twitter</a></li>
                            <li><a href="discord.mlserver.xyz">Discord</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo $conf["url"]; ?>/api/">API</a>
                        <ul>
                            <li><a href="<?php echo $conf["url"]; ?>/api/image">画像のやつ</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/api/pdf">サーバー資料</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/api/project-progress">プロジェクト進捗</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/api/comment">コメント</a></li>
                            <li><a href="<?php echo $conf["url"]; ?>/api/covid">コロナ情報</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>