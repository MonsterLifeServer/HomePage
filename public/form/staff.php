<?php

    $config = include('./../assets/config.php');
    $TITLE = "スタッフ応募フォーム";
    $URL = $func->getUrl() . '/form/staff';
    $DESCRIPTION = "スタッフになりたい方はこちらから";
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
        <?php echo $html["common_head"]; ?>
        <title><?php echo $TITLE; ?> | MonsterLifeServer</title>
        <meta property="og:url" content="<?php echo $URL; ?>/" />
        <meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
        <meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />

        <meta http-equiv="refresh" content="5;URL=<?php echo $func->getUrl(); ?>/support/form/staff">
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
        <p><a href="<?php echo $func->getUrl(); ?>/support/form/staff">移転先のページ</a></p>
    </body>
</html>
