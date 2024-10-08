<?php

$bgi = array(
    "https://cdn.pixabay.com/photo/2017/01/11/04/57/minecraft-1970876_960_720.jpg",
    "https://cdn.pixabay.com/photo/2017/02/10/00/03/minecraft-2053882_1280.jpg",
    "https://cdn.pixabay.com/photo/2015/03/01/19/32/minecraft-655163_960_720.jpg",
    "https://cdn.pixabay.com/photo/2014/05/26/12/05/minecraft-354458_960_720.png",
    "https://cdn.pixabay.com/photo/2014/11/13/15/23/minecraft-529459_960_720.jpg"
);

$WOMAN_IMG = "https://i.gyazo.com/ddd129b38500a643dd5f5a749e6abc89.png";
$MAN_IMG = "https://i.gyazo.com/a0c7a0ab4655d8b9fd228190b4e813f8.png";

$STAFF_LIST = [
    "もんすたぁ" => [
        "DESCRIPTION"=>"運営の一人。サーバーの多くのシステムを開発している。よく企画で叫び苦情が出ている。",
        "IMG"=>"https://minotar.net/armor/body/1c2b6991e8ce4e5db4d8ec3f0cdc5f8e",
        "SNS"=>[
            "TWITTER"=>"https://x.com/monster_2408",
            "GITHUB"=>"https://github.com/Monster2408",
            "WEB"=>"https://monster2408.com/"
        ]
    ],
    "ぎんあれ" => [
        "DESCRIPTION"=>"運営の一人。MonsterLifeServerの元鯖主。動画編集の長。",
        "IMG"=>"https://minotar.net/armor/body/95593263edef4f07a6bbefd7a05e2652",
        "SNS"=>[
            "YOUTUBE"=>"https://www.youtube.com/channel/UCfXYSFo-unvTihFOjRiADgA",
            "TWITTER"=>"https://x.com/gingerale10_YT"
        ]
    ],
    "かいじ" => [
        "DESCRIPTION"=>"運営の一人。撮影メンバー。",
        "IMG"=>"https://minotar.net/armor/body/bf72eed1c52249c4ace3975eb806471b",
        "SNS"=>[]
    ],
    "番人" => [
        "DESCRIPTION"=>"運営の一人。動画編集やテクスチャ作成をしている。",
        "IMG"=>"https://minotar.net/armor/body/52fd9d3ed9f542c1b883867dfbd76b0e",
        "SNS"=>[]
    ],
    "メアリー" => [
        "DESCRIPTION"=>"開発者の一人。元々Skript専門だったがPluginやシェルスクリプトなどを組んでくれていたりする。現在活動率低下中。",
        "IMG"=>"{$WOMAN_IMG}",
        "SNS"=>[]
    ],
];

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '運営一覧');
$func->setPageUrl($func->getUrl().'/about/admins');
$func->setDescription('運営やスタッフ一覧ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト&最終更新日 -->
                    <div class="top-label">
                        <div class="item-left">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                        <div class="item-right">
                            <p class="fileupdate right"><span class="title">最終更新日時: </span>
                            <?php
                                $filetime = filemtime(basename(__FILE__));
                                echo '<span class="date">'.date('Y/m/d ', $filetime).'</span>';
                                echo '<span class="time">'.date('H時i分', $filetime).'</span>'; 
                            ?></p>
                        </div>
                    </div>
                    <!-- パンくずリスト&最終更新日 -->

                    <div class="flex-box1">

                        <?php
                            foreach($STAFF_LIST as $key => $value) {
                                $rand_keys = array_rand($bgi, 2);
                                $bg_img = $bgi[$rand_keys[0]];
                                if (isset($before_bg_img) and $before_bg_img == $bg_img) $bg_img = $bgi[$rand_keys[1]];
                                $before_bg_img = $bg_img;
                                echo '<div class="mask-style" style="background: url('.$bg_img.');">';
                                echo '<img src="'.$value["IMG"].'" />';
                                echo '<div class="mask1"></div><div class="mask2"></div>';
                                echo '<div class="caption"><span class="name">'.$key.'</span>';
                                echo '<p class="explanation">'.$value["DESCRIPTION"].'</p></div>';
                                echo '<div class="sns">';
                                if (!empty($value["SNS"])) {
                                    if (isset($value["SNS"]["YOUTUBE"])) echo '<a href="'.$value["SNS"]["YOUTUBE"].'" style="color: #c4302b;"><i class="fa-brands fa-youtube"></i></a>';
                                    if (isset($value["SNS"]["TWITTER"])) echo '<a href="'.$value["SNS"]["TWITTER"].'"><i class="fa-brands fa-twitter" style="color: #1DA1F2;"></i></a>';
                                    if (isset($value["SNS"]["GITHUB"])) echo '<a href="'.$value["SNS"]["GITHUB"].'"><i class="fa-brands fa-github" style="color: #000000;"></i></a>';
                                    if (isset($value["SNS"]["WEB"])) echo '<a href="'.$value["SNS"]["WEB"].'"><i class="fa-solid fa-globe" style="color: #000000;"></i></a>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>

                    </div>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>