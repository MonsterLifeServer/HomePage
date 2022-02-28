<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '403 Forbidden');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/error.min.css">
    </head>
    <body class="error_403">
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
                                        <span itemprop="name">403 Forbidden</span>
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

                    <!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
                    <svg xmlns="http://www.w3.org/2000/svg" id="robot-error" viewBox="0 0 260 118.9">
                        <defs>
                            <clipPath id="white-clip"><circle id="white-eye" fill="#cacaca" cx="130" cy="65" r="20" /> </clipPath>
                            <text id="text-s" class="error-text" y="106"> 403 </text>
                        </defs>
                        <path class="alarm" fill="#e62326" d="M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6" />
                        <use xlink:href="#text-s" x="-0.5px" y="-1px" fill="black"></use>
                        <use xlink:href="#text-s" fill="#2b2b2b"></use>
                        <g id="robot">
                            <g id="eye-wrap">
                                <use xlink:href="#white-eye"></use>
                                <circle id="eyef" class="eye" clip-path="url(#white-clip)" fill="#000" stroke="#2aa7cc" stroke-width="2" stroke-miterlimit="10" cx="130" cy="65" r="11" />
                                <ellipse id="white-eye" fill="#2b2b2b" cx="130" cy="40" rx="18" ry="12" />
                            </g>
                            <circle class="lightblue" cx="105" cy="32" r="2.5" id="tornillo" />
                            <use xlink:href="#tornillo" x="50"></use>
                            <use xlink:href="#tornillo" x="50" y="60"></use>
                            <use xlink:href="#tornillo" y="60"></use>
                        </g>
                    </svg>
                    <h1>403 Forbidden</h1>
                    <h2>You are not allowed to enter here</h2>
                    <h2>Go <a href="<?php echo $func->getUrl(); ?>">Home!</a></h2>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
    <script>
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

        var root = document.documentElement;
        var eyef = document.getElementById('eyef');
        var cx = document.getElementById("eyef").getAttribute("cx");
        var cy = document.getElementById("eyef").getAttribute("cy");

        document.addEventListener("mousemove", evt => {
            let x = evt.clientX / innerWidth;
            let y = evt.clientY / innerHeight;

            root.style.setProperty("--mouse-x", x);
            root.style.setProperty("--mouse-y", y);
            
            cx = 115 + 30 * x;
            cy = 50 + 30 * y;
            eyef.setAttribute("cx", cx);
            eyef.setAttribute("cy", cy);
        
        });

        document.addEventListener("touchmove", touchHandler => {
            let x = touchHandler.touches[0].clientX / innerWidth;
            let y = touchHandler.touches[0].clientY / innerHeight;

            root.style.setProperty("--mouse-x", x);
            root.style.setProperty("--mouse-y", y);
        });
    </script>
</html>