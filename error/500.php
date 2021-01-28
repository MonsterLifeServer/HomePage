<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>500エラー | MonsterLifeServer</title>
        <style>
            body {
                background: rgb(51, 51, 51);
            }

            .full-screen {
                width: 100vw;
                height: 100vh;
                color: white;
                font-family: 'Arial Black';
                text-align: center;
            }

            #page_top {
                display: none;
            }

            .container {
                padding-top: 4em;
                width: 50%;
                display: block;
                margin: 0 auto;
            }

            .error-num {
                font-size: 8em;
            }

            .eye {
                background: #fff;
                border-radius: 50%;
                display: inline-block;
                height: 100px;
                position: relative;
                width: 100px;
            }

            .eye::after {
                background: #000;
                border-radius: 50%;
                bottom: 56.1px;
                content: ' ';
                height: 33px;
                position: absolute;
                right: 33px;
                width: 33px;
            }

            .italic {
                font-style: italic;
            }

            p {
                margin-bottom: 4em;
            }

            a {
                color: white;
                text-decoration: none;
                text-transform: uppercase;
            }

            a:hover {
                color: lightgray;
            }
        </style>
    </head>
    <body>
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