<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>サーバー | MonsterLifeServer</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/status.min.css">
    </head>
    <body onload="timer()">
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            
            <div class="mainBox">
                <div class="contents">
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
                                <span itemprop="name">サーバー</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <p>最終アップデート:<span id="elapsedTime"></span></p>
                    <div class="status-box">
                        <div class="status first" id="bungee">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/">中継サーバー (BungeeCord)</a><span></span></p>
                                <p class="description">このサーバーが落ちているときはサーバーにアクセスできません。</p>
                            </div>
                            <div class="right"><img src="<?php echo $conf["url"]; ?>/assets/img/web/loading.gif" width="24px"></div>
                        </div>
                        <div class="status" id="lobby">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/lobby">ロビーサーバー</a><span></span></p>
                                <p class="description">ロビーサーバーです。いろいろなサーバーにアクセスしたりミニゲームをしたりできます。</p>
                            </div>
                            <div class="right"><img src="<?php echo $conf["url"]; ?>/assets/img/web/loading.gif" width="24px"></div>
                        </div>
                        <div class="status" id="survival">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/survival">サバイバルサーバー</a><span></span></p>
                                <p class="description">オリジナルシステムを駆使したサバイバルサーバーです。</p>
                            </div>
                            <div class="right"><img src="<?php echo $conf["url"]; ?>/assets/img/web/loading.gif" width="24px"></div>
                        </div>
                        <div class="status" id="minigame">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/servers/minigame">ミニゲームサーバー</a><span></span></p>
                                <p class="description">あらゆるミニゲーム企画を開催するときに利用しているサーバーです。</p>
                            </div>
                            <div class="right"><img src="<?php echo $conf["url"]; ?>/assets/img/web/loading.gif" width="24px"></div>
                        </div>
                        <div class="status last" id="web">
                            <div class="left">
                                <p class="server-name"><a href="<?php echo $conf["url"]; ?>/">ウェブサーバー</a></p>
                                <p class="description">もしここが✕だった場合あなたが見ているページはなんなのでしょう...</p>
                            </div>
                            <div class="right"><img src="<?php echo $conf["url"]; ?>/assets/img/web/loading.gif" width="24px"></div>
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
                            document.querySelector("#" + id + " .right img").setAttribute("src", "<?php echo $conf["url"]; ?>/assets/img/web/online.png");
                            document.querySelector("#" + id + " .server-name span").textContent = onlinePlayers + "/" + maxPlayers;
                        } else {
                            document.querySelector("#" + id + " .right img").setAttribute("src", "<?php echo $conf["url"]; ?>/assets/img/web/offline.png");
                            document.querySelector("#" + id + " .server-name span").textContent = "";
                        }
                    });
                } else { document.querySelector("#" + id + " .right img").setAttribute("src", "<?php echo $conf["url"]; ?>/assets/img/web/online.png"); }
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
            updateStatus("jp.mlserver.xyz", "bungee");
            updateStatus("jp.mlserver.xyz:25566", "lobby");
            updateStatus("jp.mlserver.xyz:25566", "survival");
            updateStatus("jp.mlserver.xyz:25564", "minigame");
            updateStatus("www.mlserver.xyz", "web");
        }
    </script>
</html>