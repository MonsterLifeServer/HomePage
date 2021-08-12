<?php

$config = include('./../assets/config.php');
$TITLE = "サーバー";
$URL = $conf["url"] . '/servers/';
$DESCRIPTION = " ";

date_default_timezone_set('Asia/Tokyo');

$now = new DateTime();

$res = file_get_contents('./../assets/dont-touch-area/status.json');
$json = mb_convert_encoding($res, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);

$array = array();
$update = false;
foreach ($arr as $item) {
    $date = new DateTime(str_replace("-", " ", $item["final_date"]));
    array_push($array, 
        array(
            "final_date"=>$date->format("Y/m/d H:i"),
            "res"=> array(
                "name"=>$item["res"]["name"],
                "status"=>$item["res"]["status"],
                "player"=>$item["res"]["player"],
                "max_player"=>$item["res"]["max_player"]
            )
        )
    );
}

if (isset($date)) {
    $temp = ($now->getTimestamp() - $date->getTimestamp()) / 60;
} else {
    $temp = 5;
}

if ($temp > 4) {
    $array = array();
    //'Host or IP', 'User', 'Pass', 'DBName'
    $mysqli_mls = new mysqli($conf["sql"]["host"], $conf["sql"]["user"], $conf["sql"]["password"], $conf["sql"]["db"], $conf["sql"]["port"]);
    if($mysqli_mls->connect_error) {
        echo $mysqli_mls->connect_error;
        exit;
    } else {
        $mysqli_mls->set_charset("utf8");
    }
    $sql = "SELECT * FROM server_status;";
    if ($result = $mysqli_mls->query($sql)) {
        $date = "";
        while ($row = $result->fetch_assoc()) {
            array_push($array, 
                array(
                    "final_date"=>$now->format("Y/m/d H:i"),
                    "res"=> array(
                        "name"=>$row["name"],
                        "status"=>$row["status"],
                        "player"=>$row["player"],
                        "max_player"=>$row["max_player"]
                    )
                )
            );
        }
        $result->close();
    }
}
$json = fopen('./../assets/dont-touch-area/status.json', 'w+b');
fwrite($json, json_encode($array, JSON_UNESCAPED_UNICODE));
fclose($json);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/status.min.css">
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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/">
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
                                echo '<span class="date">'.date('Y/m/d ', $filetime).'</span>';
                                echo '<span class="time">'.date('H時i分', $filetime).'</span>'; 
                            ?></p>
                        </div>
                    </div>
                    <!-- パンくずリスト&最終更新日 -->
                    <p>次のアップデートまで:<span id="elapsedTime"></span></p>
                    <div class="status-box">
                        <div class="status first" id="bungee">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/">入口サーバー (BungeeCord)</a><span></span></p>
                                <p class="description">このサーバーが落ちているときはサーバーにアクセスできません。</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div>
                        <div class="status" id="lobby">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/lobby">ロビーサーバー</a><span></span></p>
                                <p class="description">ロビーサーバーです。いろいろなサーバーにアクセスしたりミニゲームをしたりできます。</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div>
                        <div class="status" id="skyblock">
                            <div class="left">
                                <p class="server-name"><!--<a href="<?php echo $conf["url"]; ?>/servers/survival">-->SkyBlock<!--</a>--><span></span></p>
                                <p class="description">SkyBlockサーバーです。</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div><!--
                        <div class="status" id="minigame">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/minigame">ミニゲームサーバー</a><span></span></p>
                                <p class="description">あらゆるミニゲーム企画を開催するときに利用しているサーバーです。</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div>-->
                        <div class="status last" id="web">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/">ウェブサーバー</a></p>
                                <p class="description">もしここが✕だった場合あなたが見ているページはなんなのでしょう...</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
    <?php 

        console_log($json2);


    ?>
    <script>
        function updateStatus(ip, id) {
            setTimeout(function() {
                if (id != "web") {
                    $.ajax({
                        type: 'GET',
                        url: "https://mcstatus.snowdev.com.br/api/query/" + ip,
                    }).done(function(response){
                        var online = response.Online;
                        var onlinePlayers = response.PlayersOnline;
                        var maxPlayers = response.MaxPlayers;
                        if (online) {
                            document.querySelector("#" + id + " .right img").setAttribute("src", "https://i.gyazo.com/95a3478acc1b549e90f664ff9dad0927.png");
                            document.querySelector("#" + id + " .server-name span").textContent = onlinePlayers + "/" + maxPlayers;
                        } else {
                            document.querySelector("#" + id + " .right img").setAttribute("src", "https://i.gyazo.com/673453bc3f73389e0205afbfa79fc4a6.png");
                            document.querySelector("#" + id + " .server-name span").textContent = "";
                        }
                    });
                } else { document.querySelector("#" + id + " .right img").setAttribute("src", "https://i.gyazo.com/95a3478acc1b549e90f664ff9dad0927.png"); }
            }, 1000);
        }

        function updateStatusJson(id, status, player, max_player) {
            setTimeout(function() {
                if (id != "web") {
                    if (status > -1) {
                        document.querySelector("#" + id + " .right img").setAttribute("src", "https://i.gyazo.com/95a3478acc1b549e90f664ff9dad0927.png");
                        document.querySelector("#" + id + " .server-name span").textContent = player + "/" + max_player;
                    } else {
                        document.querySelector("#" + id + " .right img").setAttribute("src", "https://i.gyazo.com/673453bc3f73389e0205afbfa79fc4a6.png");
                        document.querySelector("#" + id + " .server-name span").textContent = "";
                    }
                } else { document.querySelector("#" + id + " .right img").setAttribute("src", "https://i.gyazo.com/95a3478acc1b549e90f664ff9dad0927.png"); }
            }, 1000);
        }

		var elapsedTime = document.getElementById("elapsedTime");

		function Time_exchange() {
            now_time = new Date();
            s = 60 - now_time.getSeconds();
            time = s + "秒";
            elapsedTime.innerHTML = time;
            if (now_time.getSeconds() == 0) {
                updateAllStatus(time);
            }
		};

		function timer() {
            updateAllStatus()
			setInterval(Time_exchange,1000);
		}

        function updateAllStatus() {
            <?php 
                foreach ($array as $item) {
                    $id = strtolower(explode(" ",$item["res"]["name"])[0]);
                    $status = $item["res"]["status"];
                    $player = $item["res"]["player"];
                    $max_player = $item["res"]["max_player"];
                    echo 'updateStatusJson("'.$id.'",'.$status.','.$player.','.$max_player.');'."\n";
                }
                $res2 = file_get_contents("https://api.mcsrvstat.us/2/".$conf["ip"]);
                $json2 = json_decode($res2);
                $id = "bungee";
                $status = $json2->online;
                $player = $json2->players->online;
                $max_player = $json2->players->max;
                echo 'updateStatusJson("'.$id.'",'.$status.','.$player.','.$max_player.');'."\n";
            ?>
            updateStatus("www.mlserver.xyz", "web");
        }
    </script>
</html>