<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>テスト | MonsterLifeServer</title>
    </head>
    <body>
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/test">
                                <span itemprop="name">tesuto</span> 
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <a href="http://www.stripjs.com/images/default/index/dorhoutmees/dm1.jpg"
                        class="strip"
                        data-strip-group="shared-options"
                        data-strip-group-options="loop: false, maxWidth: 500">This group</a>
                    <a href="http://www.stripjs.com/images/default/index/dorhoutmees/dm2.jpg"
                        class="strip"
                        data-strip-group="shared-options">has shared options</a>

                    <p>ここからしたキャンバス</p>

                    <a href="#"><canvas id="board" width="560" height="95"></canvas></a>
                    <div id="imageFrame"></div>
                </div>
            </div>
        </div>

        <script>
            window.onload = ()=>{
                // canvas準備
                const board = document.querySelector("#board");  //getElementById()等でも可。オブジェクトが取れれば良い。
                const ctx = board.getContext("2d");

                // 画像読み込み
                const chara = new Image();
                chara.src = "https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e/banner/3/560x95.png";  // 画像のURLを指定
                chara.onload = () => {
                    ctx.drawImage(chara, 0, 0);
                };
                var data = board.toDataURL();
                console.log(data);
                
                var img_element = document.createElement('img');
                img_element.src = data; 
                img_element.width = 560; 
                img_element.height = 95; 
                var frame = document.getElementById("imageFrame");
                frame.appendChild(img_element);
                console.log("完了");
            };
        </script>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>