<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '新着情報');
$func->setPageUrl($func->getUrl().'/about/news');
$func->setDescription('新着情報が見れます。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
        <script>
            $(function(){
                
                //分割したい個数を入力
                var division = 10;
                
                //要素の数を数える
                var divlength = $('#news-list .news-ca').length;
                //分割数で割る
                dlsizePerResult = divlength / division;
                //分割数 刻みで後ろにmorelinkを追加する
                for(i=1;i<=dlsizePerResult;i++){
                    $('#news-list .news-ca').eq(division*i-1)
                            .after('<span class="morelink link'+i+'">もっと読む</span>');
                }
                //最初のli（分割数）と，morelinkを残して他を非表示
                $('#news-list .news-ca,.morelink').hide();
                for(j=0;j<division;j++){
                    $('#news-list .news-ca').eq(j).show();
                }
                $('.morelink.link1').show();
                
                //morelinkにクリック時の動作
                $('.morelink').click(function(){
                    //何個目のmorelinkがクリックされたかをカウント
                    index = $(this).index('.morelink');
                    //(クリックされたindex +2) * 分割数 = 表示数
                    for(k=0;k<(index+2)*division;k++){
                        $('#news-list .news-ca').eq(k).fadeIn();
                    }
                    
                    //一旦全てのmorelink削除
                    $('.morelink').hide();
                    //次のmorelink(index+1)を表示
                    $('.morelink').eq(index+1).show();
                
                });
                
            });
        </script>
        <style>
            /* morelinkボタンのスタイル（お好みで） */
            .morelink{
                display:block;
                max-width:240px;
                margin:20px auto;
                padding:10px 20px;
                background:#ff9900;
                border:2px solid #fff;
                color:#fff;
                text-align:center;
                border-radius:5px;
            }
            .morelink:hover{
                cursor:pointer;
                border:2px solid #ff9900;
                background:#fff;
                color:#ff9900;
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

                    <!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
                    <h1 class="design">新着情報</h1>
                    <div id="news-list">
                        <?php
                            //$xml = $_SERVER["DOCUMENT_ROOT"] . "/assets/data/news.xml";//ファイルを指定
                            $xml = "https://raw.githubusercontent.com/MonsterLifeServer/HomePage/master/public/assets/data/news.xml";//ファイルを指定
                            $xmlData = simplexml_load_file($xml);
                            foreach ($xmlData->blog->item as $data) { 
                        ?>
                        <a href="<?php echo $data->link; ?>" <?php  
                            if (!(strpos($data->link,'mlserver.jp.net') === true || strpos($data->link,'www.mlserver.xyz') === true)) {
                                echo 'target="_blank"';
                            }
                        ?> class="news-ca">
                            <div class="card">
                                <div class="textbox">
                                    <div class="date">
                                        <?php 
                                            $text = (string)$data->date;
                                            if ($func->isNearDate($text)) {
                                                $text = "<span class='blinking'><span style='color: red;'>New</span></span>" . $text;
                                            }
                                            echo $text; 
                                        ?>
                                    </div>
                                    <div class="text"><?php echo $data->title;?></div>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>