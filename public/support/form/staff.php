<?php
	//処理内容を定義

    $config = include('./../../assets/config.php');

    $TITLE = "スタッフ応募フォーム";
    $URL = $conf["url"] . '/support/form/staff';
    $DESCRIPTION = "スタッフになりたい方はこちらから";

    $staff_lib = $_SERVER["DOCUMENT_ROOT"] . "/assets/lib/staff-form.php";
    include_once($staff_lib);

    $post_all_set = (isset($_POST["msg"]) && isset($_POST["username"]) && isset($_POST["mcid"]) && isset($_POST["roles"]) && is_array($_POST["roles"]));
    if ($post_all_set) {
        send_system_of_staff_form();
    }
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
        <?php echo $html["common_head"]; ?>
        <title><?php echo $TITLE; ?> | MonsterLifeServer</title>
        <meta property="og:url" content="<?php echo $URL; ?>/" />
        <meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
        <meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/staff-form.min.css">
    </head>
    <body class="form_page">
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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/support/">
                                        <span itemprop="name">サポート</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $URL; ?>">
                                        <span itemprop="name"><?php echo $TITLE; ?></span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                        <div class="item-right">
                            <p class="fileupdate right"><span class="title">最終更新日時: </span>
                            <?php
                                $filetime = filemtime(basename(__FILE__));
                                $libtime = filemtime($staff_lib);
                                $updatetime = $filetime;
                                if ($filetime < $libtime) {
                                    $updatetime = $libtime;
                                }
                                echo '<span class="date">'.date('Y/m/d ', $updatetime).'</span>';
                                echo '<span class="time">'.date('H時i分', $updatetime).'</span>'; 
                            ?></p>
                        </div>
                    </div>
                    <!-- パンくずリスト&最終更新日 -->

                    <!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
                    <h1 class="design">スタッフ応募フォーム</h1>
                    <?php 
                        $get_all_set = (isset($_GET["msg"]) && isset($_GET["username"]) && isset($_GET["mcid"]) && isset($_GET["roles"]) && is_array($_GET["roles"]));
                        if($get_all_set) { // url?username=monster2408#0000&
                            if (isset($_GET["CHECK_FOR"]) && $_GET["CHECK_FOR"] == "FAILED") { // 失敗したため時間をおいてから送信してねというメッセージ
                                display_staff_form_failed();
                            } else { // 送信後に送った内容を保存したい人向け(できるならtinyurlとかで短くしたものをコピーできるシステムを...)
                                display_staff_form_check();
                            }
                        } elseif (isset($_GET["why"]) && $_GET["why"] == "denylist") { 
                            display_staff_form_error("denylist");
                        } else {
                            display_staff_role_contents();
                            echo '<hr />';
                            display_staff_form_contents(); 
                        }  
                    ?>
                </div>
            </div>
            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
        <?php 
            echo $html["common_foot"];
            get_script_staff();
        ?>
    </body>
</html>
