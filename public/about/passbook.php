<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '通帳');
$func->setPageUrl($func->getUrl().'/about/passbook');
$func->setDescription('MonsterLifeServerの通帳');

setlocale(LC_MONETARY, 'ja_JP');

function sortByKey($key_name, $sort_order, $array_temp) {
    foreach ($array_temp as $key => $value) {
        $standard_key_array[$key] = $value[$key_name];
    }

    array_multisort($standard_key_array, $sort_order, $array_temp);

    return $array_temp;
}

if (isset($_GET["sort"]) && intval($_GET["sort"])) {
    $sort_down = TRUE;
} else {
    $sort_down = false;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
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
                    <a href="./<?php 
                        $path = __FILE__;
                        if ($sort_down) {
                            echo basename($path, '.php');
                        } else {
                            echo basename($path, '.php')."?sort=1";
                        }
                    ?>">並び順を入れ替える</a>
                    <table class="passbook">
                        <tr class="passbook-total">
                            <th class="title">残高</th>
                            <?php 
                                $file = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=Loy7FR0MgW3_m7GGYCUhLGdoJmgkGW9vEwZPuC0IHfkVfIJBtCqXSEjzjuNWFZl5rj6_loP2tJ8q4astm5kTln9a-jYbpoECm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnGR5wcTN8utUeS7dmVAdIXAa7o0oeV0MZzqg2lrK6gc--Bl87-So7VTTse_FA3OsMyIGwWHlnM332oyt-B8fuD_IiDxyL2IaL9z9Jw9Md8uu&lib=MBf7QrCj5NxFWTjxlEDueo2Z7ZfRoycn3");
                                $temp = 0;
                                $array_normal = json_decode($file, true);
                                $total = 0;
                                $array = array();
                                foreach ($array_normal as $item) {
                                    if ($temp == 0) {
                                        $total = $item["5"];
                                    } else if ($temp > 1) {
                                        $size = strlen($item[0]) + strlen($item[1]) + strlen($item[2])+strlen($item[3])+strlen($item[4])+strlen($item[5]);
                                        if ($size > 0) {
                                            array_push($array, $item);
                                        }
                                    }
                                    $temp .= 1;
                                }
                                $array = array_reverse($array);
                                if ($sort_down === TRUE) {
                                    $array = array_reverse($array);
                                }
                            ?>
                            <th colspan="2" class="money"><?php echo number_format($total) . "円"; ?></th>
                        </tr>
                        <?php 
                            $year = "";
                            foreach ($array as $item) {
                                if (strpos($year, date('Y',  strtotime($item[0]))) === FALSE) {
                                    $year = date('Y年',  strtotime($item[0]));
                                    echo '<tr><td colspan="3" class="year">'.$year.'</td></tr>';
                                }
                                echo '<tr class="passbook-label">';
                                echo '<td class="date">'.date('m/d',  strtotime($item[0])).'</td>';
                                echo '<td class="description">'.$item[2].'</td>';
                                if ($item[5] < 0) {
                                    echo '<td class="money minus">'.number_format($item[5]).'円</td>';
                                } else {
                                    echo '<td class="money">'.number_format($item[5]).'円</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>