<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'MLSラジオ背景作成ツール');
$func->setPageUrl($func->getUrl().'/tools/radio-bg');
$func->setDescription('えむえるえすラジオの背景生成ツールです。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/event.min.css">
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト -->
                    <div class="top-label">
                        <div class="item-left">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/tools/">
                                        <span itemprop="name">ツール類</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
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

					<h1 class="design">えむえるえすラジオ背景作成ツール</h1>
                    <div>
                        <p>このツールを使うためには以下の素材が必ず必要です。</p>
                        <p>フォント素材はインストール後フォントをPCにダウンロードするようにしてください。</p>
                        <p>画像素材は必ず名前を変更せずに同じディレクトリに保存してください。</p>
                        <img src="./items/kabe.jpg" alt="">
                        <img src="./items/whiteboard.png" alt=""><br>
                        <a href="http://s2g.jp/font/index.htm" target="_blank">フォント配布サイト</a><br>
                        <a href="http://s2g.jp/dat/dcn/lime.cgi?down=http://s2g.jp/font/zip/moonp.zip&amp;name=S2GP月フォントzip&amp;hp=http://s2g.jp/">S2GＰ月フォント Ver1.66</a>
                    </div>
                    <form action="<?php echo $func->getUrl(); ?>/api/ragio-bg" method="post" name="input" id="form-area">
                        <label for="date">配信日情報</label><br />
                        <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>" required><br />
                        <label for="part">配信パート数</label><br />
                        <input type="number" name="part" id="part" required><br />
                        <label for="path">素材フォルダの絶対パス</label><br />
                        <input type="text" name="path" id="path" required><br /> <!-- "E:\動画\動画素材\画像\ラジオ企画\sozai" -->
                        <?php
                            for($i = 1; $i < 5; $i++){
                                $tag = "member" . strval($i);
                                $text = "メンバー" . strval($i);
                                if ($i === 1) { $text = $text . " ※必須"; }
                                echo '<label for="'.$tag.'">'.$text.'</label><br />';
                                echo '<input type="text" name="'.$tag.'" id="'.$tag.'"';
                                if ($i === 1) { echo ' required'; }
                                if (!empty($_GET[$tag])) { echo 'value="'.$_GET[$tag].'"'; }
                                echo '><br />';
                            }
                        ?>
                        <input type="submit" value="送信する">
                    </form>
                    
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>