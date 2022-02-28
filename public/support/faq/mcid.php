<?php

$include('./../../assets/function.php');
$func = new HomePageFunction('./../../assets/config.php', 'リダイレクト→よくある質問(MCID)');
$func->setPageUrl($func->getUrl().'/surpport/faq/mcid');
$func->setDescription('MonsterLifeServerではマイクラのプレイヤー名のことをMCID（エムシーアイディー）と言います。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
    </head>
    <body>
        <p>リダイレクトします。[<a href="https://wiki.mlserver.xyz/?p=81" target="_blank">FAQ | よくある質問</a>]</p>
    </body>
</html>