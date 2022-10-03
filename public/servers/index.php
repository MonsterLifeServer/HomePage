<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', 'サーバー');
$func->setPageUrl($func->getUrl().'/servers/');
$func->setDescription(' ');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

include('./../assets/lib/mc/MinecraftPing.php');
include('./../assets/lib/mc/MinecraftPingException.php');

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

$enable_icon = "https://i.gyazo.com/95a3478acc1b549e90f664ff9dad0927.png";
$disable_icon = "https://i.gyazo.com/673453bc3f73389e0205afbfa79fc4a6.png";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/status.min.css">
    </head>
    <body onload="timer()">
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
                    <div class="status-box">
                        <div class="status first" id="bungee">
                            <?php 
                                $ip = $func->getServer()["bungeecord"]["ip"];
                                $port = $func->getServer()["bungeecord"]["port"];
                                $page = "";
                                $name = "入口サーバー (BungeeCord)";
                                $description = "このサーバーが落ちているときはサーバーにアクセスできません。";
                                try {
                                    $query = new MinecraftPing( $ip, $port );
                                    $icon = $enable_icon;
                                    $players = $query->Query()["players"];
                                    $players_text = " " . $players["online"] . "/" . $players["max"];
                                } catch( MinecraftPingException $e ) {
                                    // echo $e->getMessage();
                                    $icon = $disable_icon;
                                    $players_text = "";
                                } finally {
                                    if (isset($query)) {
                                        if( $query ) { $query->Close(); }
                                    }
                                } 
                                echo '<div class="left">';
                                echo '<p class="server-name"><a href="'.$func->getUrl().'/servers/'.$page.'">'.$name.'</a><span>'.$players_text.'</span></p>';
                                echo '<p class="description">'.$description.'</p></div>';
                                echo '<div class="right"><img src="' . $icon . '" width="24px"></div>';
                            ?>
                        </div>
                        <div class="status" id="lobby">
                            <?php 
                                $ip = $func->getServer()["lobby"]["ip"];
                                $port = $func->getServer()["lobby"]["port"];
                                $page = "lobby";
                                $name = "ロビーサーバー";
                                $description = "ロビーサーバーです。いろいろなサーバーにアクセスしたりミニゲームをしたりできます。";
                                try {
                                    $query = new MinecraftPing( $ip, $port );
                                    $icon = $enable_icon;
                                    $players = $query->Query()["players"];
                                    $players_text = " " . $players["online"] . "/" . $players["max"];
                                } catch( MinecraftPingException $e ) {
                                    // echo $e->getMessage();
                                    $icon = $disable_icon;
                                    $players_text = "";
                                } finally {
                                    if (isset($query)) {
                                        if( $query ) { $query->Close(); }
                                    }
                                } 
                                echo '<div class="left">';
                                echo '<p class="server-name"><a href="'.$func->getUrl().'/servers/'.$page.'">'.$name.'</a><span>'.$players_text.'</span></p>';
                                echo '<p class="description">'.$description.'</p></div>';
                                echo '<div class="right"><img src="' . $icon . '" width="24px"></div>';
                            ?>
                        </div>
                        <div class="status" id="skyblock">
                            <?php 
                                $ip = $func->getServer()["skyblock"]["ip"];
                                $port = $func->getServer()["skyblock"]["port"];
                                $page = "skyblock";
                                $name = "SkyBlock";
                                $description = "SkyBlockサーバーです。";
                                try {
                                    $query = new MinecraftPing( $ip, $port );
                                    $icon = $enable_icon;
                                    $players = $query->Query()["players"];
                                    $players_text = " " . $players["online"] . "/" . $players["max"];
                                } catch( MinecraftPingException $e ) {
                                    // echo $e->getMessage();
                                    $icon = $disable_icon;
                                    $players_text = "";
                                } finally {
                                    if (isset($query)) {
                                        if( $query ) { $query->Close(); }
                                    }
                                } 
                                echo '<div class="left">';
                                echo '<p class="server-name"><a href="'.$func->getUrl().'/servers/'.$page.'">'.$name.'</a><span>'.$players_text.'</span></p>';
                                echo '<p class="description">'.$description.'</p></div>';
                                echo '<div class="right"><img src="' . $icon . '" width="24px"></div>';
                            ?>
                        </div>
                        <div class="status last" id="web">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $func->getUrl(); ?>/">ウェブサーバー</a></p>
                                <p class="description">もしここが✕だった場合あなたが見ているページはなんなのでしょう...</p>
                            </div>
                            <div class="right"><img src="<?php echo $enable_icon; ?>" width="24px"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>