<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'ImageAPI');
$func->setPageUrl($func->getUrl().'/api/image');
$func->setDescription('Gyazoの画像を表示します');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
        <style>
            #center {
                text-align: center;
                margin-top: 20px;
            }
            .frame {
                display: inline-block;
                position: relative;
                width: 500px;
            }
            .frame img {
                width: 500px;
            }
            .frame:after {
                position: absolute;
                display: block;
                content: "";
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                transform: rotate(3deg); /* 回転させる */
                background: #fff;
                z-index: -1;
            }
            @media screen and (max-width:540px) {
                .frame {
                    width: 100%;
                }
                .frame img {
                    width: 100%;
                }
            }
        </style>
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/api/">
                                        <span itemprop="name">API</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                                
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
                                    </a>
                                    <meta itemprop="position" content="3" />
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
                    <?php 
                        if(isset($_GET['id'])) {
                            $url = 'https://gyazo.com/' . $_GET['id'] . '.png'; 
                        } else {
                            $url = 'https://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png';
                        }
                    ?>
                    <div id="center">
                        <div class="frame"><img src="<?php echo $url; ?>"></div>
                    </div>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>