<?php

include('./../../assets/function.php');
$func = new HomePageFunction('./../../assets/config.php', 'DeadByDaylight in MC | パーク一覧');
$func->setPageUrl($func->getUrl().'/game/dbd/parks');
$func->setDescription('DeadByDaylightをマイクラで遊べるようにした企画「DeadByDaylight in MC」のルール紹介ページです。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php $func->printMetaData(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $func->getUrl(); ?>/assets/css/dbd.min.css">
        <script src="https://cdn.jsdelivr.net/npm/yamljs@0.3.0/dist/yaml.min.js"></script>
    </head>
    <body class="dbd">
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/game/">
                                        <span itemprop="name">ミニゲーム企画</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/game/dbd/">
                                        <span itemprop="name">DeadByDaylight in MC</span>
                                    </a>
                                    <meta itemprop="position" content="3" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name">パーク一覧</span>
                                    </a>
                                    <meta itemprop="position" content="4" />
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
                    <section class="park-section">
                        <span class="park-title">全パーク一覧</span>
                        <div class="filter-wrap">
                            <div class="filter-controls">
                                <div class="filter-control color-white">
                                    <div class="filter-description">所持分類</div>
                                    <div class="filter-button-3 text-center">
                                        <div class="filter-buttons">
                                            <input type="radio" name="park-type" id="select1" value="all" checked="">
                                            <label for="select1">全て</label>
                                            <input type="radio" name="park-type" id="select2" value="survivor">
                                            <label for="select2">サバイバー</label>
                                            <input type="radio" name="park-type" id="select3" value="killer">
                                            <label for="select3">キラー</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="park-wrap color-white">
                            <span id="park-size"></span>
                            <table class="margin-center" style="border-collapse: collapse">
                                <thead>
                                    <tr>
                                        <th class="park-th text-center">パーク</th>
                                        <th class="text-center">詳細</th>
                                    </tr>
                                </thead>
                                <tbody id="park-table">
                                    
                                </tbody>
                            </table>
                        </div>
                    </section>  
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        <script>

            // 

            // type: 
            //   1: サバイバー
            //   2: キラー
            //   その他: すべて
            function DisplayFilter(type) {
                if (type != 1 && type != 2) type = 3;
                console.log("type: " + type);
                // 親要素
                const park_table = document.getElementById('park-table');
                
                // 子要素を全て削除
                while (park_table.firstChild) {
                    park_table.removeChild(park_table.firstChild);
                }
                nativeObject = YAML.load("../../assets/data/park.yml");

                // id属性で要素を取得
                var element = document.getElementById('park-table');
                var name = null;
                var url = null;
                var desc = null;
                var text = null;
                var size = 0;
                // 新しいHTML要素を作成
                var itemObject;
                var keyId;
                var temp;

                var url = new URL(window.location.href);
                var params = url.searchParams;

                var id = null;
                var newId = null;

                if (params.has('id[]')) {
                    id = params.getAll('id[]');
                    console.log(id);
                }

                if (params.has('new[]')) {
                    newId = params.getAll('new[]');
                    console.log(newId);
                }
                for (let s = 1; s < 3; s++) {
                    console.log("s" + s);
                    if (type == 2 && s == 1) {
                        console.log("aaa");
                        continue;
                    }
                    if (type == 1 && s == 2) {
                        console.log("bbb");
                        break;
                    }
                    
                    if (s == 1) {
                        itemObject = nativeObject["survivor-parks"];
                        keyId = "s";
                    }
                    else {
                        itemObject = nativeObject["killer-parks"];
                        keyId = "k";
                    }

                    nLoop: for (let n = 0; n < 300; n++) {
                        text = "";
                        desc = "";
                        if (n in itemObject) {
                            temp = keyId + n;
                            if (id != null && id.indexOf(temp) === -1) {
                                console.log("temp: " + temp);
                                continue nLoop;
                            }
                            console.log("n" + n + ": " + itemObject[n]);
                            name = itemObject[n]["name"];
                            img = itemObject[n]["url"];
                            text = text + '<tr><td class="text-center p-10px"><span class="icon_tiny">';
                            text = text + '<div class="icon_relative">';
                            text = text + '<img src="' + img + '" alt="" srcset="" class="icon_park"/>';
                            if (newId != null && newId.indexOf(temp) !== -1) text = text + '<img src="https://3.bp.blogspot.com/-UlDXAyWmT9U/WD_cWO3xMNI/AAAAAAABAD0/fFIbC4x0Pq8iE3-PzPCPYoChZinGELPpQCLcB/s800/pop_new.png" alt="" srcset="" class="new_icon"/>';
                            text = text + '</div>';
                            text = text + '<br />' + name + '</span></td><td class="p-10px"><p>';
                            mLoop : for (let m = 0; m < 100; m++) {
                                if (m in itemObject[n]["desc"]) {
                                    if (desc.length > 0) desc = desc + '<br />';
                                    desc = desc + itemObject[n]["desc"][m];
                                } else {
                                    break mLoop;
                                }
                            }
                            text = text + desc + '</p></td></tr>';
                        } else {
                            break nLoop;
                        }
                        element.insertAdjacentHTML('beforeend', text);
                        size = size +1;
                    }
                }
                document.getElementById('park-size').textContent = size + ' 件';
            }
            DisplayFilter(3);

            $(function () {
                // ラジオボタンを選択変更したら実行
                $('input[name="park-type"]').change(function () {
                    var val = $(this).val();
                    console.log(val);
                    if (val == "survivor") {
                        DisplayFilter(1);
                    } else if (val == "killer") {
                        DisplayFilter(2);
                    } else if (val == "all") {
                        DisplayFilter(3);
                    } 
                });
            });


        </script>
    </body>
    <?php $func->printFootScript(); ?>
</html>