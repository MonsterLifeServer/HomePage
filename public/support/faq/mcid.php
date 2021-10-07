<?php

$config = include('./../../assets/config.php');
$TITLE = "リダイレクト→よくある質問";
$URL = $conf["url"] . '/surpport/faq/mcid';
$DESCRIPTION = "MonsterLifeServerではマイクラのプレイヤー名のことをMCID（エムシーアイディー）と言います。";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
    </head>
    <body>
        <p>リダイレクトします。[<a href="https://wiki.mlserver.xyz/?p=81" target="_blank">FAQ | よくある質問</a>]</p>
    </body>
</html>