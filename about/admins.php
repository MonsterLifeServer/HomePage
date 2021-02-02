<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

$bgi = [
    "https://cdn.pixabay.com/photo/2017/01/11/04/57/minecraft-1970876_960_720.jpg",
    "https://cdn.pixabay.com/photo/2017/02/10/00/03/minecraft-2053882_1280.jpg",
    "https://i.pinimg.com/originals/62/47/73/6247736609a214bb2fff26f5ed745be5.jpg",
    "https://cdn.pixabay.com/photo/2015/03/01/19/32/minecraft-655163_960_720.jpg",
    "https://cdn.pixabay.com/photo/2014/05/26/12/05/minecraft-354458_960_720.png",
    "https://cdn.pixabay.com/photo/2014/11/13/15/23/minecraft-529459_960_720.jpg"
]

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>運営一覧 | MonsterLifeServer</title>
        <style>
            <?php $rand_keys = array_rand($bgi, 1); ?>
            .mask-style {
                background-image: url(<?php echo $rand_keys[0]; ?>);
                background-color: rgba(0,0,0,0.4);
            }
        </style>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            
            <div class="mainBox"><div class="contents">

                <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo $conf["url"]; ?>/">
                            <span itemprop="name">ホーム</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>

                    <li itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo $conf["url"]; ?>/about/admins">
                            <span itemprop="name">運営一覧</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>

                <div class="flex-box1">

                    <div class="mask-style">
                        <img src="https://minotar.net/armor/body/1c2b6991e8ce4e5db4d8ec3f0cdc5f8e" />
                        <div class="mask1"></div>
                        <div class="mask2"></div>
                        <div class="caption">
                            <span class="name">もんすたぁ</span>
                            <p class="explanation">オーナーの一人。サーバーの多くのシステムを開発している。よく企画で叫び苦情が出ている。</p>
                        </div>
                        <div class="sns">
                            <a href="https://twitter.com/meoto2408"><i class="fab fa-twitter" style="color: #1DA1F2;"></i></a>
                        </div>
                    </div>

                    <div class="mask-style">
                        <img src="<?php echo $conf["url"]; ?>/assets/img/web/nagisa.png" />
                        <div class="mask1"></div>
                        <div class="mask2"></div>
                        <div class="caption">
                            <span class="name">なぎさ</span>
                            <p class="explanation">オーナーの一人。運営陣で唯一Minecraftをやっていない人。主に鯖のお金管理をしている。</p>
                        </div>
                        <div class="sns">
                            <a href="https://twitter.com/nagisa2408"><i class="fab fa-twitter" style="color: #1DA1F2;"></i></a>
                        </div>
                    </div>

                    <div class="mask-style">
                        <img src="https://minotar.net/armor/body/95593263edef4f07a6bbefd7a05e2652" />
                        <div class="mask1"></div>
                        <div class="mask2"></div>
                        <div class="caption">
                            <span class="name">ぎんあれ</span>
                            <p class="explanation">MonsterLifeServerの鯖主。動画編集の長。</p>
                        </div>
                        <div class="sns">
                            <a href="https://www.youtube.com/channel/UCfXYSFo-unvTihFOjRiADgA" style="color: #c4302b;"><i class="fab fa-youtube"></i></a>
                            <a href="https://twitter.com/gingerale10_YT"><i class="fab fa-twitter" style="color: #1DA1F2;"></i></a>
                        </div>
                    </div>

                </div>

            </div></div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>