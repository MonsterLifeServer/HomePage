<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php');

$func->setTitle('MonsterLifeServer');

$images = [
	"https://i.gyazo.com/80076d5d3f59660d7480569f58264c8b.png",
	"https://i.gyazo.com/419a033caf3d2fa57c0dc1558a57e54c.png",
	"https://i.gyazo.com/2575a25f1ccfbd4c37a0d517e0d211b3.png",
	"https://i.gyazo.com/b34e6f3356881fc2a3e9a4606c8c0039.png",
    "https://i.gyazo.com/d5e3fe57a5718d72f538e2e9690a1abe.png"
];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
		<?php $func->printMetaData(); ?>
    </head>
    <body>
        <?php include('./assets/include/header.php'); ?>
        <div class="contents">
            <div class="main">
                <div class="carousel">
                    <div class="carousel-inner">
                        <?php
                            $first = true;
                            foreach ($images as $image) {
                                echo '<div class="carousel-item' . ($first ? ' active' : '') . '">';
                                echo '<img src="' . $image . '" alt="carousel">';
                                echo '</div>';
                                $first = false;
                            }
                        ?>
                    </div>
                </div>
                <div class="main-inner">
                </div>
            </div>
        </div>
        <?php include('./assets/include/footer.php'); ?>
    </body>
</html>