<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>404エラー | MonsterLifeServer</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/error.min.css">
    </head>
    <body class="error_404">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <section class="page_404">
                    <div class="container">
                        <div class="row"> 
                            <div class="col-sm-12 ">
                                <div class="col-sm-10 col-sm-offset-1  text-center">
                                    <div class="four_zero_four_bg">
                                        <h1 class="text-center ">404</h1>    
                                    </div>
                                    <img src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif" />
                                    <div class="contant_box_404">
                                        <h3 class="h2">
                                            ありゃ？そんなページがないような...
                                        </h3>
                                        
                                        <p>あなたが求めているページは見つかりませんでした...</p>
                                        <p>URL: <span><?php #echo get_pagenum_link(); ?></span></p>
                                        
                                        <a href="<?php echo $conf["url"]; ?>" class="link_404">ここから戻れます</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
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