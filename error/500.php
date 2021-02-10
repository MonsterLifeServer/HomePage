<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>500エラー | MonsterLifeServer</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/error.min.css">
    </head>
    <body class="error_500">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="full-screen">
                <div class='container'>
                    <span class="error-num">5</span>
                    <div class='eye'></div>
                    <div class='eye'></div>

                    <p class="sub-text">あら？なにかがうまく動かなかったみたい...現在<span class="italic">調査中</span>だからちょっと待ってね...</p>
                    <a href="<?php echo $conf["url"]; ?>">あ、ここから戻れるよ...</a>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
    <script>
        $(".full-screen").mousemove(function(event) {
            var eye = $(".eye");
            var x = (eye.offset().left) + (eye.width() / 2);
            var y = (eye.offset().top) + (eye.height() / 2);
            var rad = Math.atan2(event.pageX - x, event.pageY - y);
            var rot = (rad * (180 / Math.PI) * -1) + 180;
            eye.css({
                '-webkit-transform': 'rotate(' + rot + 'deg)',
                '-moz-transform': 'rotate(' + rot + 'deg)',
                '-ms-transform': 'rotate(' + rot + 'deg)',
                'transform': 'rotate(' + rot + 'deg)'
            });
        });
    </script>
</html>