<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
include($_SERVER["DOCUMENT_ROOT"] . '/api/google_sp.php');

$TITLE = "通帳 | MonsterLifeServer";
$URL = $conf["url"] . '/about/passbook';
$DESCRIPTION = "通帳";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?></title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?>" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <p class="fileupdate right">最終更新日時:<?php echo date('Y/m/d H時i分', filemtime(basename(__FILE__))); ?></p>
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/about/passbook">
                                <span itemprop="name">通帳</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <?php
                        $credentials_path = $_SERVER["DOCUMENT_ROOT"] . "/assets/key/credentials.json";
                        $client = new \Google_Client();
                        $client->setScopes([
                            \Google_Service_Sheets::SPREADSHEETS
                        ]);
                        $client->setAuthConfig($credentials_path);
                        $spreadsheet_service = new \Google_Service_Sheets($client);

                        $spreadsheet_id = '1GMapdhAIRWCbcBsJ2398oSs57hrxya1MzqxZbVsrEPg';
                        $range = '新通帳!A2:F2'; // 取得する範囲
                        $response = $spreadsheet_service->spreadsheets_values->get($spreadsheet_id, $range);
                        $values = $response->getValues();
                        echo $values;
                    ?>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>