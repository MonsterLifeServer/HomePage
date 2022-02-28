<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'サーバー資料');
$func->setPageUrl($func->getUrl().'/api/pdf');
$func->setDescription('過去の運営会議やその他資料を公開しています。');

/// Access-Control-Allow-Originエラーを回避する
header("Access-Control-Allow-Origin: *");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
		<style>
            table.pdf {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                background-color: #fff;
                border: 1px solid black;
            }

            table.pdf th,
            table.pdf td {
                padding: 10px 0;
                text-align: center;
            }

            table.pdf th {
                min-width: 150px;
            }

            table.pdf tr:nth-child(odd) {
                background-color: #eee;
            }

            @media screen and (max-width:750px) {
                table.pdf {
                    width: 100%;
                }
                table.pdf th {
                    width:100%;
                    display:block;
                    background-color: #eee;
                }
                table.pdf td {
                    width:100%;
                    display:block;
                    background-color: #fff;
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

					<!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
					<h1 class="design">サーバー資料</h1>
					<h2 class="design">運営会議報告書</h2>
                    <?php
                        echo '<table class="pdf" border="1">';
                        $url_latest = 'https://api.github.com/repos/MonsterLifeServer/public-documents/contents/documents/';

                        $context = stream_context_create(array('http' => array(
                            'method' => 'GET',
                            'header' => 'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
                        )));
                        $res = file_get_contents($url_latest, false, $context);
                        $json = json_decode($res);
                        $assets = (array) $json;

                        $temp3 = '';

                        foreach ($assets as $item) {
                            $name = $item->name; /* Filename */
                            echo '<tr><th>'.$name.'</th><td>';
                            $url_latest2 = 'https://api.github.com/repos/MonsterLifeServer/public-documents/contents/documents/'.$name;

                            $context2 = stream_context_create(array('http' => array(
                                'method' => 'GET',
                                'header' => 'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
                            )));
                            $res2 = file_get_contents($url_latest2, false, $context2);
                            $json2 = json_decode($res2);
                            $assets2 = (array) $json2;
                            $str = '';
                            $url = 'https://document.mlserver.jp/web/?file=https://document.mlserver.jp/';
                            $num = 0;
                            foreach ($assets2 as $item2) {
                                $display_name = $item2->name;
                                $display_name = str_replace(".pdf","",$display_name);
                                $str = $str . "<a href='".$url.$item2->path."' target='_blank'>".$display_name."</a>";
                                if ($num > 2) {
                                    $num = 0;
                                    $str = $str . "<br />";
                                } else {
                                    $num .= 1;
                                    $str = $str . " ";
                                }
                            }
                            echo $str.'</td></tr>';
                        }
                        echo '</table>';
                    ?>
                    </div>
				</div>
			</div>
		</div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>
