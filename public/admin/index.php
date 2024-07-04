<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '運営専用ページ');
$func->setPageUrl($func->getUrl().'/admin/');
$func->setDescription('MonsterLifeServerの運営専用ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

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
					<?php
                        if($disLib->isLogin()) {
                            $user = $disLib->apiRequest($disLib->apiURLBase);
                            if (property_exists($user, "username") === TRUE) {
                                echo '<h3>ログイン完了</h3>';
                                echo '<h4>Welcome, ' . $user->username . "#" . $user->discriminator . '</h4>';
                                if (property_exists($user, "id") === TRUE) {
                                    if ($func->isAdmin($user->id)) {
                                        foreach ($ban_user_data["mc"] as $uuid => $value) {
                                            echo "BAN時刻: " . $ban_user_data["mc"][$uuid]["date"];
                                            echo '<br />';
                                            if (isset($ban_user_data["mc"][$uuid]["mcid"])) 
                                            echo "BAN時, MCID: " . $ban_user_data["mc"][$uuid]["mcid"] . '<br />';
                                            echo "MCIDs: <a href='./mc-api?uuid=" . $uuid . "' target='_blank'>コチラ</a>";
                                            echo '<br />';
                                            echo "理由: ";
                                            echo "<p>" . $ban_user_data["mc"][$uuid]["reason"] . "</p>";
                                            if (is_array($ban_user_data["mc"][$uuid]["imgs"])) {
                                                foreach ($ban_user_data["mc"][$uuid]["imgs"] as $key => $img) {
                                                    echo '<img src="' . $img . '"></img>';
                                                }
                                            }
                                            echo "<hr />";
                                        }
                                        foreach ($ban_user_data["discord"] as $key => $value) {
                                            echo $key; // 
                                            echo '<br />';
                                            echo $value;
                                            echo '<br />';
                                        }
                                    }
                                } else {
                                    echo '<p>あなたには閲覧権限がありません。</p>';
                                }
                            } else {
                                echo '<p>あなたには閲覧権限がありません。</p>';
                            }
                        } else {
                            echo '<h3>運営専用ページです。</h3>';
                        }
                        echo $disLib->loginButton();
                    ?>
				</div>
            </div>
		</div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>