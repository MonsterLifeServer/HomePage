<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'サーバー管理');
$func->setPageUrl($func->getUrl().'/admin/server-panel');
$func->setDescription('MonsterLifeServerのサーバー管理ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

set_include_path('../assets/lib/phpseclib/');

include("../assets/lib/phpseclib/Crypt/RSA.php");
include("../assets/lib/phpseclib/Net/SSH2.php");



// ログイン情報
$host = $func->getSSHIp();
$username = $func->getSSHUser();
$key_file = "../assets/.ssh/mlserver.pem";

$kuso_yaro = [
	"[0;30;22m",
	"[0;34;22m",
	"[0;32;22m",
	"[0;36;22m",
	"[0;31;22m",
	"[0;35;22m",
	"[0;33;22m",
	"[0;37;22m",
	"[0;30;1m",
	"[0;34;1m",
	"[0;32;1m",
	"[0;36;1m",
	"[0;31;1m",
	"[0;35;1m",
	"[0;33;1m",
	"[0;37;1m",
	"[m"
];

function is_utf8($str) {
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        $c = ord($str[$i]);
        if ($c > 128) {
            if (($c > 247)) {
                return false;
            } elseif ($c > 239) {
                $bytes = 4;
            } elseif ($c > 223) {
                $bytes = 3;
            } elseif ($c > 191) {
                $bytes = 2;
            } else {
                return false;
            }
            if (($i + $bytes) > $len) {
                return false;
            }
            while ($bytes > 1) {
                $i++;
                $b = ord($str[$i]);
                if ($b < 128 || $b > 191) {
                    return false;
                }
                $bytes--;
            }
        }
    }
    return true;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/server-panel.min.css">
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/admin/">
                                        <span itemprop="name">運営専用ページ</span>
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
					<?php
                        // if($disLib->isLogin()) {
                        //     $user = $disLib->apiRequest($disLib->apiURLBase);
                        //     if (property_exists($user, "username") === TRUE) {
                        //         echo '<h3>ログイン完了</h3>';
                        //         echo '<h4>Welcome, ' . $user->username . "#" . $user->discriminator . '</h4>';
                        //         if (property_exists($user, "id") === TRUE) {
                        //             if ($func->isAdmin($user->id)) {
                                        
                        //             }
                        //         } else {
                        //             echo '<p>あなたには閲覧権限がありません。</p>';
                        //         }
                        //     } else {
                        //         echo '<p>あなたには閲覧権限がありません。</p>';
                        //     }
                        // } else {
                        //     echo '<h3>運営専用ページです。</h3>';
                        // }
                        // echo $disLib->loginButton();
                        try {

                            $key = new Crypt_RSA();
                            //$key->setPassword('whatever');
                            $key->loadKey(file_get_contents($key_file));
                            
                            $ssh = new Net_SSH2($host);
                            if (!$ssh->login($username, $key)) {
                                exit('Login Failed');
                            }
                            $text = $ssh->read('username@username:~$');
                        
                            $ssh->write("cd /home/servers/bungeecord/\n");
                            $ssh->write("sh bc_script.sh status\n");
                            $text = $ssh->read('username@username:~$');
                            echo "<pre>";
                            if (is_utf8($text) !== TRUE) {
                                mb_convert_encoding($text, "utf-8", "sjis-win");
                            } else {
                                echo $text;
                            }
                            echo "</pre>";

                            if (strpos($text, ".jar is already running!") !== false) {
                                echo "サーバーは起動済みです。";
                            } else {
                                echo "サーバーを起動します。";
                            }
                        } catch (Exception $e) {
                            echo "エラー発生\r\n";
                            echo $e->getMessage() . "\r\n";
                        }
                    ?>
				</div>
            </div>
		</div>
		<?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>