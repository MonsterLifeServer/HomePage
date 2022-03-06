<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '作業状況');
$func->setPageUrl($func->getUrl().'/api/project-progress');
$func->setDescription('作業状況を確認できます。');

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

function getProjectPercent($url, $user, $token, $open_issues_count) {
    $result = getGitHubContents($url, $user, $token);
    $all = substr_count($result, "- [ ]") + substr_count($result, "- [x] ") + $open_issues_count;
    $clear = substr_count($result, "- [x]");
    if ($all > 0) {
        if ($clear <= 0) {
            $per = 0;
        } else {
            $per = floor ($clear/$all*100);
        }
    } else {
        $per = -1;
    }
    return $per;
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
                    <div class="softprogress">
                    <?php
                        $progress_array = array();
                        foreach ($func->getProgressProjects() as $key => $value) {
                            $project_name = $value['name'];
                            $project_owner = $value['owner'];
                            $data_url = $func->getGitHubAPIUrl() . "repos/" . $project_owner . "/" . $project_name;
                            
                            $json_string = getGitHubContents($data_url, $func->getProgressUser(), $func->getProgressToken());
                            $data = json_decode($json_string);
                            $open_issues_count = $data->open_issues_count;
                            $updated_at = $data->updated_at;
                            $pushed_at = $data->pushed_at;
                            $default_branch = $data->default_branch;

                            $url = $func->getGitHubSorceUrl() . $project_owner . "/" . $project_name . "/" . $default_branch . "/README.md";

                            $per = getProjectPercent($url, $func->getProgressUser(), $func->getProgressToken(), $open_issues_count);
                            if ($per != -1) {
                                $time = strtotime($updated_at);
                                if ($time < strtotime($pushed_at)) {
                                    $time = strtotime($pushed_at);
                                }
                                $text = '<label for="'.$key.'" class="project-label"><span class="title">『'.$key.'』の進捗</span> <span class="updated_at">最終更新:'.date("Y/m/d H:i:s",$time).'</span></label>';
                                $text = $text . '<div id="'.$key.'" code-softprogress="'.$per.'"></div>';
                                $temp = [
                                    (string)$time=>$text,
                                ];
                                if (sizeof($progress_array) > 0) {
                                    $progress_array = $progress_array + $temp;
                                } else {
                                    $progress_array = $temp;
                                }
                                
                            }
                        }
                        if (sizeof($progress_array) > 0) {
                            krsort($progress_array);
                            foreach ($progress_array as $key => $value) {
                                echo $value;
                            }
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
            }
        };
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
