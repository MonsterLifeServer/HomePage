<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>403エラー | MonsterLifeServer</title>
        <style>
            @import url("https://fonts.googleapis.com/css?family=Bungee");

            body {
                background: #1b1b1b;
                margin-top: 50px;
                text-align: center;
            }
            h1, h2 {
                color: white;
                font-family: "Bungee", cursive;
            }
            #page_top {
                display: none;
            }
            a {
                color: #2aa7cc;
                text-decoration: none;
            }
            a:hover {
                color: white;
            }
            svg {
                width: 50vw;
            }
            .lightblue {
                fill: #444;
            }
            .eye {
                cx: calc(115px + 30px * var(--mouse-x));
                cy: calc(50px + 30px * var(--mouse-y));
            }
            #eye-wrap {
                overflow: hidden;
            }
            .error-text {
                font-size: 120px;
            }
            .alarm {
                animation: alarmOn 0.5s infinite;
            }

            @keyframes alarmOn {
                to {
                    fill: darkred;
                }
            }
        </style>
    </head>
    <body class="404">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
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
            <h1>You are not allowed to enter here</h1>
            <h2>Go <a href="<?php echo $conf["url"]; ?>">Home!</a></h2>

        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
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