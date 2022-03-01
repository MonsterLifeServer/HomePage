<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '作業状況');
$func->setPageUrl($func->getUrl().'/api/project-progress');
$func->setDescription('作業状況を確認できます。');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
        <style>
            /* softprogress bar CSS */
            .softprogress *:not([code-softprogress]) {
                margin: 5px 0;
                font-size: 16px;
            }
            .softprogress {
                width: 100%;
                padding: 15px;
                box-sizing: border-box;
            }
            .softprogress [code-softprogress] {
                height: 25px;
                box-shadow: 0 0 1px 1px rgba(0, 20, 0, 0.35) inset;
                border-radius: 15px;
                margin: 5px 0 10px 0;
                overflow: hidden;
                background-color: #ddd;
            }
            [code-softprogress]::after {
                content: "";
                display: flex;
                justify-content: flex-end;
                align-items: center;
                background: #2f8d46;
                width: 0;
                height: 100%;
                box-sizing: border-box;
                font-size: 16px;
                color: #fff;
                border-radius: 15px;
                padding: 0 3px;
                transition: 2s;
            }
            [code-softprogress].run-softprogress::after {
                content: attr(code-softprogress) "%";
                width: var(--run-softprogress);
            }
            /* End softprogress bar CSS */
        </style>
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
                    <div class="softprogress">
                    <?php
                        

                        foreach ($func->getProgressProjects() as $key => $value) {
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $value); // URLを叩くおまじない？
                            curl_setopt($ch, CURLOPT_USERPWD, $func->getProgressUser().":".$func->getProgressToken()); // ユーザー名とトークン
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 変数に保存する設定
                            $result = curl_exec($ch);
                            curl_close($ch);
                            $all = substr_count($result, "- [ ]") + substr_count($result, "- [x] ");
                            $clear = substr_count($result, "- [x]");
                            if ($all > 0) {
                                $per = floor ($clear/$all*100);
                            } else {
                                $per = 0;
                            }
                            
                            echo '<label for="'.$key.'">『'.$key.'』の進捗</label><br/>';
                            echo '<div id="'.$key.'" code-softprogress="'.$per.'"></div>';
                        }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <script type="text/javascript">
        window.onload = function () {
            if (
                document.querySelectorAll(".softprogress").length > 0 &&
                document.querySelectorAll(".softprogress [code-softprogress]").length > 0
            ) {
                document
                .querySelectorAll(".softprogress [code-softprogress]")
                .forEach((x) => runsoftprogress(x));
            }};
            function runsoftprogress(el) {
            el.className = "run-softprogress";
            el.setAttribute(
                "style",
                `--run-softprogress:${el.getAttribute("code-softprogress")}%;`
        );}
    </script>
    <?php $func->printFootScript(); ?>
</html>
