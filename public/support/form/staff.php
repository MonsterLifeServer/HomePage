<?php
	//処理内容を定義

    include('./../../assets/function.php');
    $func = new HomePageFunction('./../../assets/config.php', 'スタッフ応募フォーム');
    $func->setPageUrl($func->getUrl().'/support/form/staff');
    $func->setDescription('MonsterLifeServerのスタッフになりたい方はこちらから');

    include($func->getDiscordLibPath());
    $disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
    
    $disLib->initDiscordOAuth();

    $staff_lib = "./../../assets/lib/staff-form.php";
    include_once($staff_lib);

    $post_all_set = (isset($_POST["msg"]) && isset($_POST["username"]) && isset($_POST["mcid"]) && isset($_POST["roles"]) && is_array($_POST["roles"]));
    if ($post_all_set) {
        send_system_of_staff_form($func);
    }
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/staff-form.min.css">
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/support/">
                                        <span itemprop="name">サポート</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
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
                            $discord_name = "";
                            if($disLib->isLogin()) {
                                $user = $disLib->apiRequest($disLib->apiURLBase);
                                if (property_exists($user, "username") and property_exists($user, "id") and property_exists($user, "discriminator")) {
                                    $discord_name = $user->username . '#' . $user->discriminator . ' | (' . $user->id . ')';
                                }
                            }
                            display_staff_form_contents($discord_name, $disLib->loginButton()); 
                        }  
                    ?>
                </div>
            </div>
        </div>
        <?php 
            get_script_staff();
        ?>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>
