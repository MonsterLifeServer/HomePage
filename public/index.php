<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php');

$func->setTitle('MonsterLifeServer');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
		<?php $func->printMetaData(); ?>
    </head>
    <body>
        <?php include('./assets/header.php'); ?>