<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'DeadByDaylight in MC');
$func->setPageUrl($func->getUrl().'/game/dbd');
$func->setDescription('DeadByDaylightをマイクラで遊べるようにした企画「DeadByDaylight in MC」のルール紹介ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/dbd.min.css">
    </head>
    <body class="dbd">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <main>
            <div class="top-background">
                <video src="<?php echo $func->getUrl(); ?>/assets/img/dbd/dbd-background.mp4" poster="<?php echo $func->getUrl(); ?>/assets/img/dbd/dbd-samune.jpg" autoplay muted loop></video>

                <div class="main-contents">
                    <div class="check">
                        aaa
                    </div>
                    <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
                </div>
                
            </div>
        </main>
    </body>
    <?php $func->printFootScript(); ?>
</html>