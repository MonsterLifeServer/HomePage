<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "サーバー資料";
$URL = $conf["url"] . '/api/pdf';
$DESCRIPTION = "過去の運営会議やその他資料を公開しています。";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>


                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/api/">
                                        <span itemprop="name">API</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                                
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/api/pdf">
                                        <span itemprop="name"><?php echo $TITLE; ?></span>
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

                    <table class="pdf" border="1">
					
                    <?php
                        $xml = $_SERVER["DOCUMENT_ROOT"] . "/assets/data/pdf.xml";//ファイルを指定
                        $xmlData = simplexml_load_file($xml);

                        $i = 0;

                        foreach ($xmlData->items->item as $data) {


                            echo '<tr><th>'.(string)$data->date.'</th><td>';

                            //print_r($x);
                            $str = '';
                            $i = 0;
                            foreach ($data->values->group as $y) {
                                if ($i < 2) {
                                    $i++;
                                    $str = $str . "<a href='".(string)$y->url."' target='_blank'>".(string)$y->title."</a> ";
                                } else {
                                    $i = 0;
                                    $str = $str . "<a href='".(string)$y->url."' target='_blank'>".(string)$y->title."</a><br>";
                                }
                            }
                            echo $str.'</td></th>';
                        }
                    ?>
                    </tr></table>
				</div>
			</div>
			<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
		</div>
		<?php echo $html["common_foot"]; ?>
	</body>
</html>
