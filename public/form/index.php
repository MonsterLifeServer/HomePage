<?php
    $config = include('./../assets/config.php');
    $TITLE = "お問い合わせ";
    $URL = $conf["url"] . '/form/';
    $DESCRIPTION = "MonsterLifeServerへのお問い合わせはこちらから";
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
        <?php echo $html["common_head"]; ?>
        <title><?php echo $TITLE; ?> | MonsterLifeServer</title>
        <meta property="og:url" content="<?php echo $URL; ?>/" />
        <meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
        <meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />

        <meta http-equiv="refresh" content="5;URL=<?php echo $conf["url"]; ?>/support/form/">
        <style>
            body {
                background: #fff;
            }
        </style>
    </head>
    <body>
        <h1>リダイレクト</h1>
        <p>
            本サイトは移転しました。5秒後にジャンプします。<br>
            ジャンプしない場合は、以下のURLをクリックしてください。
        </p>
        <p><a href="<?php echo $conf["url"]; ?>/support/form/">移転先のページ</a></p>
    </body>
</html>
