<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'Among Us Craft');
$func->setPageUrl($func->getUrl().'/game/amongus');
$func->setDescription('企画「Among Us Craft」のルール紹介ページです。');

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Among Us</title>
    <meta property="og:image" content="https://directg.diskn.com/27bISle0tO">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Among Us">
    <meta property="og:site_name" content="Among Us">
    <meta property="og:description" content="協力と裏切りのパーティゲーム開幕！宇宙人狼系ゲーム「Among Us」に豪華特典が付いたパッケージ版が登場！">
    <meta property="og:url" content="http://www.h2int.com/games/among-us/">

    <?php $func->printMetaData(); ?>

    <link rel="stylesheet" href="<?php echo $func->getUrl(); ?>/assets/css/amongus.min.css">
        
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        
    <!--자바스크립트 추가-->
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">
    <link rel="icon" type="image/png" href="/android-icon-192x192.png">

</head>
	
<body>
    <div id="page-conteiner">
        <div id="content-wrap">

            <header>
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
                            <a itemprop="item" href="<?php echo $func->getUrl(); ?>/game/">
                                <span itemprop="name">ミニゲーム企画</span>
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
            </header>

            <section id="main">
                <section id="main_m">
                    <div class="inner">
                        <div class="game_logo">
                            <img src="https://i.gyazo.com/5d1f8dd6c2c272d618b099f3adbe7a96.png" alt="Among Us">
                        </div>
                        <div id="character_wrap">
                            <div class="Character">
                                <img src="https://i.gyazo.com/16767ff1ede06ed52d762e0d2ca857d4.png" alt="img" />
                            </div>
                        </div>
                    </div><!--inner-->
                </section> <!--mainm-->
            </section>
                
            <section id="Game">
                <div class="inner">
                    <div class="title">
                        <div class="title_line">GAME</div>
                    </div>
                    <div class="inner">
                        <h3>協力と裏切りのパーティゲームがMinecraftで開幕！</h3>
                        <h3>遊び方</h3>
                        <p>プレイヤーは舞台となる宇宙船の中で「クルー（乗組員）」と「インポスター（詐欺師）」に分かれる。<br />クルーは船内のタスクを完了するかインポスターを全員追放すると勝利！インポスターはクルーを殺害・追放することが目的となる。言葉だけでなく、作業フェーズの動き方で仲間の信頼を得たりアリバイを作ることが重要だ！</p>
                    </div>
                </div>
            </section>
            
            
            <section id="TheCrew">
                <div class="inner">
                    <div class="small_header"><img src="https://directg.diskn.com/1SLXK5A7r4" alt="thecrew"></div>
                    <div class="small_bo">
                        <div class="small_1">
                            <div class="small_img"><img src="https://directg.diskn.com/17igvdvma4" alt="crew1"></div>
                            <div class="small_p"><p>船を修理してタスクを完了させよう<br />インポスターの妨害にもひるまないで！</p></div>
                        </div>
                        <div class="small_1">
                            <div class="small_img"><img src="https://directg.diskn.com/2mquveInfG" alt="crew2"></div>
                            <div class="small_p"><p>怪しいクルーはいないかチェック！<br />インポスターを見つけたら緊急会議を開こう</p></div>
                        </div>
                        <div class="small_1">
                            <div class="small_img"><img src="https://directg.diskn.com/17igwaPFJs" alt="crew3"></div>
                            <div class="small_p"><p>死体を見つけたら通報！<br />嘘を見破るアリバイも準備しよう</p></div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="TheCrew" style="padding-bottom:5%;">
                <div class="inner">
                    <div class="small_header"><img src="https://directg.diskn.com/37Tm8OYHwm" alt="thecrew"></div>
                    <div class="small_bo">
                        <div class="small_1">
                            <div class="small_img"><img src="https://i.gyazo.com/fb6a7d43d7319a8b5ec1912e12f83f8a.png" alt="crew1"></div>
                            <div class="small_star"><img src="http://www.h2int.com/games/among-us/images/Red_star.svg" alt="star" /></div>
                            <div class="small_p"><p>クルーに紛れ込み船内を混乱させよう<br />タスクを実行するフリも大事！</p></div>
                        </div>
                        <div class="small_1">
                            <div class="small_img"><img src="https://directg.diskn.com/1SLY9coT4K" alt="crew2"></div>
                            <div class="small_star"><img src="http://www.h2int.com/games/among-us/images/Red_star.svg" alt="star" /></div>
                            <div class="small_p"><p>サボタージュ（妨害）を起こし<br />ジャマをしよう！</p></div>
                        </div>
                        <div class="small_1">
                            <div class="small_img"><img src="https://directg.diskn.com/2SE5LSkpje" alt="crew3"></div>
                            <div class="small_star"><img src="http://www.h2int.com/games/among-us/images/Red_star.svg" alt="star" /></div>
                            <div class="small_p"><p>クルーを全滅させよう！<br />くれぐれも見つからないように</p></div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="movie">
                <div class="inner">
                    <div class="title">
                        <div class="title_line">MOVIE</div>
                    </div>
                    <div class="movie_if">
                        <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://www.youtube.com/embed/P9a318LUC7M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- <div class="movie_if_2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/d_QNt1KgG94" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div> -->
                </div>
            </section>
        </div> <!--content-wrap-->	
    </div> 
    <script>
            $( document ).ready( function() {
                $( '.Character' ).animate( { opacity: '2' }, 2000 );
            });
                
            //infor
            function isElementUnderBottom(elem, triggerDiff) {
                const { top } = elem.getBoundingClientRect();
                const { innerHeight } = window;
                return top > innerHeight + (triggerDiff || 0);
            }
            
            $( document ).ready( function() {
                $( '.Character_m' ).animate( { opacity: '2' }, 2000 );
            });
            //infor
            function isElementUnderBottom(elem, triggerDiff) {
                const { top } = elem.getBoundingClientRect();
                const { innerHeight } = window;
                return top > innerHeight + (triggerDiff || 0);
            }
    </script>

    </body>
</html>