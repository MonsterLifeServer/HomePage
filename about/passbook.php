<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
include($_SERVER["DOCUMENT_ROOT"] . '/api/google_sp.php');

$TITLE = "通帳 | MonsterLifeServer";
$URL = $conf["url"] . '/about/passbook';
$DESCRIPTION = "MonsterLifeServerの通帳";

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
            table.money {
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #333;
            }
            th.money, td.money {
                align:right;
            }
            th.category, td.category {
                align:center;
            }
        </style>
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
                    <table class="money">
                    <?php
                        $url = "https://script.googleusercontent.com/macros/echo?user_content_key=mXNbqOdjYhP346UlNZh_k4isCuL4v6BTffFwd262Bx0cgprjyFGU-WiiTjS5-_v-duwm0hooHsXmnjplCSMMwj9Oa4c2GBxmm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnGR5wcTN8utUeS7dmVAdIXAa7o0oeV0MZzqg2lrK6gc--Bl87-So7VTTse_FA3OsMyIGwWHlnM332oyt-B8fuD_IiDxyL2IaL9z9Jw9Md8uu&lib=MBf7QrCj5NxFWTjxlEDueo2Z7ZfRoycn3";
                        $json = file_get_contents($url);
                        $arr = json_decode($json,true);
                        $temp = 0;

                        foreach($arr as $data){
                            echo "<tr>";
                            $date   = $data['0'];
                            $cates  = $data['1'];
                            $comment= $data['2'];
                            $amazon = $data['3'];
                            $kyash  = $data['4'];
                            $all    = $data['5'];
                            if ($temp === 0) {
                                echo "<th colspan='3'>".$comment."</th>";
                                echo "<th class='money'>" . number_format($amazon) . "円" . "</th>";
                                echo "<th class='money'>" . number_format($kyash) . "円" . "</th>";
                                echo "<th class='money'>" . number_format($all) . "円" . "</th>";
                            } elseif ($temp === 1) {
                                echo "<th>".$date."</th>";
                                echo "<th>".$cates."</th>";
                                echo "<th>".$comment."</th>";
                                echo "<th>".$amazon."</th>";
                                echo "<th>".$kyash."</th>";
                                echo "<th>".$all."</th>";
                            } else {
                                $fixed = date('Y/m/d', strtotime($date));
                                echo "<td>" . $fixed . "</td>";
                                echo "<td class='category'>" . $cates . "</td>";
                                echo "<td>" . $comment . "</td>";
                                echo "<td class='money'>" . number_format($amazon) . "円" . "</td>";
                                echo "<td class='money'>" . number_format($kyash) . "円" . "</td>";
                                echo "<td class='money'>" . number_format($all) . "円" . "</td>";
                            }
                            echo "</tr>";
                            $temp = $temp + 1;
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