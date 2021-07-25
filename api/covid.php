<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

$TITLE = "コロナウイルスの県ごとの情報 | MonsterLifeServer";
$URL = $conf["url"] . '/api/covid';
$DESCRIPTION = "コロナウイルスの県ごとの情報";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?></title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?>" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <style>
            table.covid {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #333;
            }
        </style>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                <p class="fileupdate right">最終更新日時:<?php echo date('Y/m/d H:i:s', filemtime(basename(__FILE__))); ?></p>
                    <!-- パンくずリスト -->
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/api/covid">
                                <span itemprop="name">コロナウイルスの県ごとの情報</span>
                            </a>
                            <meta itemprop="position" content="3" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <table class="covid">
                        <tr><th>都道府県</th><th>発生件数</th><th>死者数</th><th>PCR件数</th></tr>
                        <?php
                            $url="https://covid19-japan-web-api.now.sh/api/v1/prefectures";
                            $json=file_get_contents($url);
                            $arr=json_decode($json,true);
                            foreach($arr as $data){
                                echo "<tr><td>".$data['name_ja']."</td><td>".$data['cases']."件</td><td>".$data['deaths']."人</td><td>".$data['pcr']."件</td></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>