<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '404 Not Found');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/error.min.css">
    </head>
    <body class="error_404">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <div class="top-label">
                        <div class="text-left">
                            <!-- パンくずリスト始 -->
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
                                    <a itemprop="item" href="#">
                                        <span itemprop="name">404 Not Found</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                            <!-- パンくずリスト終 -->
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
                    <section class="page_404">
                        <div class="container">
                            <div class="row"> 
                                <div class="col-sm-12 ">
                                    <div class="col-sm-10 col-sm-offset-1  text-center">
                                        <div class="four_zero_four_bg">
                                            <h1 class="text-center ">404 Not Found</h1>    
                                        </div>
                                        <img src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif" />
                                        <div class="contant_box_404">
                                            <h3 class="h2">
                                                ありゃ？そんなページがないような...
                                            </h3>
                                            
                                            <p>あなたが求めているページは見つかりませんでした...</p>
                                            <?php
                                                if (!empty($_SERVER['REQUEST_URI'])) {
                                                    echo "<p>URL: <span>" . $func->getUrl() . $_SERVER['REQUEST_URI'] . "</span></p>";
                                                }
                                            ?>
                                            <a href="<?php echo $func->getUrl(); ?>" class="link_404">ここから戻れます</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
    <script>

        $(function() {
            $('.menu-btn').on('click', function(){
                $('.menu').toggleClass('is-active');
                $('.menu-btn').toggleClass('is-active');
                return false;
            });
            $('.js-menu__item__link').each(function(){
                $(this).on('click',function(){
                    if (window.matchMedia('(max-width:750px)').matches) {
                        $(this).toggleClass('on');
                        $("+.submenu",this).slideToggle();
                        return false;
                    }
                });
            });
            var nav = $('.nav');
            $('li', nav)
            .mouseover(function(e) {
                if (window.matchMedia('(max-width:750px)').matches) return false;
                $('ul', this).stop().slideDown('fast');
            })
            .mouseout(function(e) {
                if (window.matchMedia('(max-width:750px)').matches) return false;
                $('ul', this).stop().slideUp('fast');
            });

            var $ftr = $('.footer');
            
            if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
                $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
            }
        });

    </script>
</html>