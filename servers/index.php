<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
$TITLE = "サーバー";
$URL = $conf["url"] . '/servers/';
$DESCRIPTION = " ";

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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/servers/">
                                <span itemprop="name"><?php echo $TITLE; ?></span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <p>次のアップデートまで:<span id="elapsedTime"></span></p>
                    <div class="status-box">
                        <div class="status first" id="bungee">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/">中継サーバー (BungeeCord)</a><span></span></p>
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
                        <div class="status" id="survival">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/survival">サバイバルサーバー</a><span></span></p>
                                <p class="description">オリジナルシステムを駆使したサバイバルサーバーです。</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div>
                        <div class="status" id="minigame">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/minigame">ミニゲームサーバー</a><span></span></p>
                                <p class="description">あらゆるミニゲーム企画を開催するときに利用しているサーバーです。</p>
                            </div>
                            <div class="right"><img src="https://i.gyazo.com/b25eb582f5dd767853c60103201b8f63.gif" width="24px"></div>
                        </div>
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
            updateStatus("play.mlserver.xyz", "bungee");
            updateStatus("jp.mlserver.xyz:25566", "lobby");
            updateStatus("jp.mlserver.xyz:25566", "survival");
            updateStatus("jp.mlserver.xyz:25564", "minigame");
            updateStatus("www.mlserver.xyz", "web");
        }
    </script>
</html>