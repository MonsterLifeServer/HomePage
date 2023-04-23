<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '作業状況');

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

$progress_array = array();
$json_text = '{"data":[';
$is_first = true;
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

    $json_commits = getGitHubContents($data_url . "/commits", $func->getProgressUser(), $func->getProgressToken());
    $data_commits = json_decode($json_commits);
    $last_commit_user = $data_commits[0]->commit->author->name;

    $url = $func->getGitHubSorceUrl() . $project_owner . "/" . $project_name . "/" . $default_branch . "/README.md";

    $per = getProjectPercent($url, $func->getProgressUser(), $func->getProgressToken(), $open_issues_count);
    if ($per != -1) {
        $time = strtotime($updated_at);
        if ($time < strtotime($pushed_at)) {
            $time = strtotime($pushed_at);
        }

        if ($is_first === false) {
            $json_text = $json_text . ',';
        }
        $json_text = $json_text . '{"key":"'.$key.'","date":"'.date("Y/m/d H:i:s",$time).'","author":"' . 'Monster2408' .'","per":"'.$per.'"}';
        
        $is_first = false;
    }
}
echo $json_text . ']}';