<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '作業状況');
$func->setPageUrl($func->getUrl().'/api/project-progress');
$func->setDescription('作業状況を確認できます。');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

function getGitHubContents($url, $user, $token) {
    $ch = curl_init();
    $headers = array(
        "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0",
        'Content-Type:application/json'
    );
    curl_setopt($ch, CURLOPT_URL, $url); // URLを叩くおまじない？
    curl_setopt($ch, CURLOPT_USERPWD, $user.":".$token); // ユーザー名とトークン
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 変数に保存する設定
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
        <link href="<?php echo $func->getUrl(); ?>/assets/css/project-progress.min.css" rel="stylesheet" type="text/css">
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/api/">
                                        <span itemprop="name">API</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                                
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
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

                    <div id="softprogress_loading">
                        <?php  
                            for ($i = 0; $i < 10; $i++) {
                                echo '<p class="loading_text"><i class="fa-solid fa-spinner fa-spin"></i> 読み込み中...</p>';
                            }
                        ?>
                    </div>
                    <div id="softprogress_output" class="softprogress"></div>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <script type="text/javascript">
        $(document).ready( function() {
            // 読み込み中を表示
            $("#softprogress_loading").show();

            var xhr = new XMLHttpRequest();

            xhr.open('GET', "<?php echo $func->getUrl(); ?>/api/v1/github-progress.php");
            xhr.send();

            xhr.onreadystatechange = function() {
                if(xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr)
                    const data = JSON.parse(xhr.response);
                    console.log(data)
                    var test3 = data.data;
                    test3.sort(function(me, you) {
                        return you['time'] - me['time'];
                    });
                    $.each(test3, function(index, value) {
                        var html = '<label for="'+value.key+'" class="project-label"><span class="title">『'+value.key+'』の進捗  '+value.checked+'/' + value.all +'</span>';
                        html = html + '<div class="data-contents"><span class="updated_at">最終更新:'+value.date+'</span>';
                        html = html + '<br /><span class="author">最終更新者:'+value.author+'</span></div></label>';
                        html = html + '<div id="'+value.key+'" code-softprogress="'+value.per+'"></div>';
                        $("#softprogress_output").append(html);
                    });
                    // 読み込み中を非表示
                    $("#softprogress_loading").hide();
                    if (
                        document.querySelectorAll(".softprogress").length > 0 &&
                        document.querySelectorAll(".softprogress [code-softprogress]").length > 0
                    ) {
                        document
                        .querySelectorAll(".softprogress [code-softprogress]")
                        .forEach((x) => runsoftprogress(x));
                    }
                    //データを取得後の処理を書く
                } else {
                    console.log("error: " + xhr.status)
                }
            }
        });

        function runsoftprogress(el) {
            el.className = "run-softprogress";
            el.setAttribute(
                "style",
                `--run-softprogress:${el.getAttribute("code-softprogress")}%;`
            );
        }
    </script>
    <?php $func->printFootScript(); ?>
</html>